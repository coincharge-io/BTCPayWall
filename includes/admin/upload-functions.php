<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Upload
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */


// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Change Upload Directory for Digital Downloads
 * 
 * @since 1.0
 * 
 * @global $pagenow
 * 
 * @return void
 */

function btcpaywall_change_digital_download_upload_dir()
{
    global $pagenow;

    if (!empty($_REQUEST['post_id']) && ('async-upload.php' == $pagenow || 'media-upload.php' == $pagenow)) {
        if ('digital_download' == get_post_type(sanitize_text_field($_REQUEST['post_id']))) {
            add_filter('upload_dir', 'btcpaywall_upload_dir');
        }
    }
}
add_action('admin_init', 'btcpaywall_change_digital_download_upload_dir', 999);
function btcpaywall_upload_dir($param)
{

    $mydir         = '/btcpaywall-uploads';
    $param['path'] = $param['basedir'] . $mydir;
    $param['url']  = $param['baseurl'] . $mydir;
    return $param;
}



function btcpaywall_get_protected_dir()
{

    $dir_level1 = 'btcpaywall-uploads';


    $upload_dir = wp_upload_dir();

    return $upload_dir['basedir'] . '/' . $dir_level1;
}
function btcpaywall_protect_upload_dir()
{

    $dir_level1 = 'btcpaywall-uploads';


    $upload_dir = wp_upload_dir();

    $files = array(
        array(
            'base'    => $upload_dir['basedir'] . '/' . $dir_level1,
            'file'    => '.htaccess',
            'content' =>  'Options -Indexes' . "\n"
                . 'deny from all'
        ), array(
            'base'    => $upload_dir['basedir'] . '/' . $dir_level1,
            'file'    => 'index.php',
            'content' => '<?php ' . "\n"
                . '// Silence is golden.'

        )
    );

    foreach ($files as $file) {

        if ((wp_mkdir_p($file['base']))
            && (!file_exists(trailingslashit($file['base']) . $file['file']))
        ) {
            if ($file_handle = @fopen(trailingslashit($file['base']) . $file['file'], 'w')) {
                fwrite($file_handle, $file['content']);
                fclose($file_handle);
            }
        }
    }
}
add_action('admin_init', 'btcpaywall_protect_upload_dir');
