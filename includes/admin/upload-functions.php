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

function change_digital_downloads_upload_directory()
{
    global $pagenow;
    if (!empty($_REQUEST['post_id']) && ('async-upload.php' == $pagenow || 'media-upload.php' == $pagenow)) {
        if ('digital-download' == get_post_type($_REQUEST['post_id'])) {
            add_filter('upload_dir', 'btcpw_set_upload_dir');
        }
    }
}

add_action('admin_init', 'change_digital_downloads_upload_directory', 999);
