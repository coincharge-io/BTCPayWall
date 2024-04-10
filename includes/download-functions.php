<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions/Download
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Get File Download Url
 *
 * @param int $payment_id Payment ID.
 *
 * @param int $file_url File URL.
 *
 * @param int $download_id Digital Download ID.
 *
 * @param string $email Optional. Customer email.
 *
 * @since 1.0
 *
 * @return string Download url
 */

function btcpaywall_get_download_url($payment_id, $download_id, $email, $download_file)
{
    if (!get_option('btcpw_secret_key')) {
        update_option('btcpw_secret_key', bin2hex(random_bytes(14)));
    }
    $secret_key = get_option('btcpw_secret_key');
    $date = strtotime("14 Jan 2038");

    $params = array(
        'payment_id'    => rawurlencode($payment_id),
        'download_id'   => (int)$download_id,
        'expire'        => rawurlencode($date),
        'email'         => rawurlencode($email),
        'download_file' => (int)($download_file)
    );
    $payment = new BTCPayWall_Payment($params['payment_id']);
    if (!$payment) {
        return false;
    }

    $args = array();

    if (!empty($payment->id)) {
        $args = array(
            'payment_id'  => $params['payment_id'],
            'download_id' => $params['download_id'],
            'email'       => $params['email'],
            'download_file' => $params['download_file']
        );

        if (isset($params['expire'])) {
            $args['ttl'] = $params['expire'];
        }
        $args['token'] = btcpaywall_generate_url_token($secret_key, $args);
    }
    $download_url = add_query_arg($args, site_url('index.php'));

    return $download_url;
}


function btcpaywall_process_download()
{
    $args = array(
        'download_id' => (isset($_GET['download_id'])) ? (int) $_GET['download_id'] : '',
        'payment_id' => (isset($_GET['payment_id'])) ? sanitize_text_field($_GET['payment_id']) : '',
        'email'    => (isset($_GET['email'])) ? sanitize_email($_GET['email']) : '',
        'ttl'      => (isset($_GET['ttl'])) ? sanitize_text_field($_GET['ttl']) : '',
        'token'    => (isset($_GET['token'])) ? sanitize_text_field($_GET['token']) : '',
        'download_file' => (isset($_GET['download_file'])) ? (int) $_GET['download_file'] : '',
    );

    if (!empty($args['download_file']) && !empty($args['payment_id']) && !empty($args['download_id']) && !empty($args['ttl']) && !empty($args['token'])) {
        $args['btcpw_file'] = wp_get_attachment_url($args['download_file']);
        $payment = new BTCPayWall_Payment($args['payment_id']);
        $download = new BTCPayWall_Digital_Download($args['download_id']);
        if ($download->get_download_is_allowed($payment->invoice_id) == false) {
            wp_die(__('You have reached download limit for this payment.', 'btcpaywall'), '', array(
                'response' => 403,
                'link_url' => '/',
                'link_text' => 'Go to the homepage.',
                'back_link' => true

            ));
        }

        $file = array();

        $download_args = btcpaywall_process_download_url($args);

        if ($download_args['valid_token'] === false) {
            return false;
        }

        $file['url'] = $download_args['btcpw_file'];
        //$id = btcpaywall_get_attachment_id($download_args['btcpw_file']);
        $id = $args['download_file'];
        $file_path = get_attached_file($id);

        $file['name'] = btcpaywall_get_file_name_from_path($download_args['btcpw_file']);


        $file['extension'] = btcpaywall_get_file_extension($download_args['btcpw_file']);

        $file['is_local'] = (int) btcpaywall_is_file_local($file_path);

        $file['content_type'] = btcpaywall_get_file_content_type($file['extension']);
        setcookie("btcpw_{$payment->invoice_id}{$download->ID}", isset($_COOKIE["btcpw_{$payment->invoice_id}{$download->ID}"]) ? ++$_COOKIE["btcpw_{$payment->invoice_id}{$download->ID}"] : 1, strtotime("14 Jan 2038"), '/');
        $headers = btcpaywall_get_all_headers();
        if (in_array($file['extension'], array('php', 'js'))) {
            wp_die(__('File extension is not supported.', 'btcpaywall'));
        }
        if (headers_sent()) {
            wp_die(__('Headers sent before download.', 'btcpaywall'));
        }
        if (isset($headers["Range"])) {
            btcpaywall_prepare_system_before_download_file();
            $file_read_is_success = btcpaywall_file_resume_download($file, $headers);
        } else {
            btcpaywall_prepare_system_before_download_file();

            btcpaywall_set_headers_for_file_download($file);

            $file_read_is_success = btcpaywall_readfile_by_parts($file['url']);
        }

        if (!$file_read_is_success) {
            wp_die(__('There is a problem with opening file', 'btcpaywall'));
        }

        return array('file' => $file, 'error' => 0);
    }
}

add_action('init', 'btcpaywall_process_download', 500);


/**
 * Get File Extension
 *
 * @param string $ext File extension.
 *
 * @since 1.0
 *
 * @return string Extension
 */
function btcpaywall_get_file_content_type($ext)
{
    switch ($ext):
        case 'ac':
            $ctype = "application/pkix-attr-cert";
            break;
        case 'adp':
            $ctype = "audio/adpcm";
            break;
        case 'ai':
            $ctype = "application/postscript";
            break;
        case 'aif':
            $ctype = "audio/x-aiff";
            break;
        case 'aifc':
            $ctype = "audio/x-aiff";
            break;
        case 'aiff':
            $ctype = "audio/x-aiff";
            break;
        case 'air':
            $ctype = "application/vnd.adobe.air-application-installer-package+zip";
            break;
        case 'apk':
            $ctype = "application/vnd.android.package-archive";
            break;
        case 'asc':
            $ctype = "application/pgp-signature";
            break;
        case 'atom':
            $ctype = "application/atom+xml";
            break;
        case 'atomcat':
            $ctype = "application/atomcat+xml";
            break;
        case 'atomsvc':
            $ctype = "application/atomsvc+xml";
            break;
        case 'au':
            $ctype = "audio/basic";
            break;
        case 'aw':
            $ctype = "application/applixware";
            break;
        case 'avi':
            $ctype = "video/x-msvideo";
            break;
        case 'bcpio':
            $ctype = "application/x-bcpio";
            break;
        case 'bin':
            $ctype = "application/octet-stream";
            break;
        case 'bmp':
            $ctype = "image/bmp";
            break;
        case 'boz':
            $ctype = "application/x-bzip2";
            break;
        case 'bpk':
            $ctype = "application/octet-stream";
            break;
        case 'bz':
            $ctype = "application/x-bzip";
            break;
        case 'bz2':
            $ctype = "application/x-bzip2";
            break;
        case 'ccxml':
            $ctype = "application/ccxml+xml";
            break;
        case 'cdmia':
            $ctype = "application/cdmi-capability";
            break;
        case 'cdmic':
            $ctype = "application/cdmi-container";
            break;
        case 'cdmid':
            $ctype = "application/cdmi-domain";
            break;
        case 'cdmio':
            $ctype = "application/cdmi-object";
            break;
        case 'cdmiq':
            $ctype = "application/cdmi-queue";
            break;
        case 'cdf':
            $ctype = "application/x-netcdf";
            break;
        case 'cer':
            $ctype = "application/pkix-cert";
            break;
        case 'cgm':
            $ctype = "image/cgm";
            break;
        case 'class':
            $ctype = "application/octet-stream";
            break;
        case 'cpio':
            $ctype = "application/x-cpio";
            break;
        case 'cpt':
            $ctype = "application/mac-compactpro";
            break;
        case 'crl':
            $ctype = "application/pkix-crl";
            break;
        case 'csh':
            $ctype = "application/x-csh";
            break;
        case 'css':
            $ctype = "text/css";
            break;
        case 'cu':
            $ctype = "application/cu-seeme";
            break;
        case 'davmount':
            $ctype = "application/davmount+xml";
            break;
        case 'dbk':
            $ctype = "application/docbook+xml";
            break;
        case 'dcr':
            $ctype = "application/x-director";
            break;
        case 'deploy':
            $ctype = "application/octet-stream";
            break;
        case 'dif':
            $ctype = "video/x-dv";
            break;
        case 'dir':
            $ctype = "application/x-director";
            break;
        case 'dist':
            $ctype = "application/octet-stream";
            break;
        case 'distz':
            $ctype = "application/octet-stream";
            break;
        case 'djv':
            $ctype = "image/vnd.djvu";
            break;
        case 'djvu':
            $ctype = "image/vnd.djvu";
            break;
        case 'dll':
            $ctype = "application/octet-stream";
            break;
        case 'dmg':
            $ctype = "application/octet-stream";
            break;
        case 'dms':
            $ctype = "application/octet-stream";
            break;
        case 'doc':
            $ctype = "application/msword";
            break;
        case 'docx':
            $ctype = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
            break;
        case 'dotx':
            $ctype = "application/vnd.openxmlformats-officedocument.wordprocessingml.template";
            break;
        case 'dssc':
            $ctype = "application/dssc+der";
            break;
        case 'dtd':
            $ctype = "application/xml-dtd";
            break;
        case 'dump':
            $ctype = "application/octet-stream";
            break;
        case 'dv':
            $ctype = "video/x-dv";
            break;
        case 'dvi':
            $ctype = "application/x-dvi";
            break;
        case 'dxr':
            $ctype = "application/x-director";
            break;
        case 'ecma':
            $ctype = "application/ecmascript";
            break;
        case 'elc':
            $ctype = "application/octet-stream";
            break;
        case 'emma':
            $ctype = "application/emma+xml";
            break;
        case 'eps':
            $ctype = "application/postscript";
            break;
        case 'epub':
            $ctype = "application/epub+zip";
            break;
        case 'etx':
            $ctype = "text/x-setext";
            break;
        case 'exe':
            $ctype = "application/octet-stream";
            break;
        case 'exi':
            $ctype = "application/exi";
            break;
        case 'ez':
            $ctype = "application/andrew-inset";
            break;
        case 'f4v':
            $ctype = "video/x-f4v";
            break;
        case 'fli':
            $ctype = "video/x-fli";
            break;
        case 'flv':
            $ctype = "video/x-flv";
            break;
        case 'gif':
            $ctype = "image/gif";
            break;
        case 'gml':
            $ctype = "application/srgs";
            break;
        case 'gpx':
            $ctype = "application/gml+xml";
            break;
        case 'gram':
            $ctype = "application/gpx+xml";
            break;
        case 'grxml':
            $ctype = "application/srgs+xml";
            break;
        case 'gtar':
            $ctype = "application/x-gtar";
            break;
        case 'gxf':
            $ctype = "application/gxf";
            break;
        case 'hdf':
            $ctype = "application/x-hdf";
            break;
        case 'hqx':
            $ctype = "application/mac-binhex40";
            break;
        case 'htm':
            $ctype = "text/html";
            break;
        case 'html':
            $ctype = "text/html";
            break;
        case 'ice':
            $ctype = "x-conference/x-cooltalk";
            break;
        case 'ico':
            $ctype = "image/x-icon";
            break;
        case 'ics':
            $ctype = "text/calendar";
            break;
        case 'ief':
            $ctype = "image/ief";
            break;
        case 'ifb':
            $ctype = "text/calendar";
            break;
        case 'iges':
            $ctype = "model/iges";
            break;
        case 'igs':
            $ctype = "model/iges";
            break;
        case 'ink':
            $ctype = "application/inkml+xml";
            break;
        case 'inkml':
            $ctype = "application/inkml+xml";
            break;
        case 'ipfix':
            $ctype = "application/ipfix";
            break;
        case 'jar':
            $ctype = "application/java-archive";
            break;
        case 'jnlp':
            $ctype = "application/x-java-jnlp-file";
            break;
        case 'jp2':
            $ctype = "image/jp2";
            break;
        case 'jpe':
            $ctype = "image/jpeg";
            break;
        case 'jpeg':
            $ctype = "image/jpeg";
            break;
        case 'jpg':
            $ctype = "image/jpeg";
            break;
        case 'js':
            $ctype = "application/javascript";
            break;
        case 'json':
            $ctype = "application/json";
            break;
        case 'jsonml':
            $ctype = "application/jsonml+json";
            break;
        case 'kar':
            $ctype = "audio/midi";
            break;
        case 'latex':
            $ctype = "application/x-latex";
            break;
        case 'lha':
            $ctype = "application/octet-stream";
            break;
        case 'lrf':
            $ctype = "application/octet-stream";
            break;
        case 'lzh':
            $ctype = "application/octet-stream";
            break;
        case 'lostxml':
            $ctype = "application/lost+xml";
            break;
        case 'm3u':
            $ctype = "audio/x-mpegurl";
            break;
        case 'm4a':
            $ctype = "audio/mp4a-latm";
            break;
        case 'm4b':
            $ctype = "audio/mp4a-latm";
            break;
        case 'm4p':
            $ctype = "audio/mp4a-latm";
            break;
        case 'm4u':
            $ctype = "video/vnd.mpegurl";
            break;
        case 'm4v':
            $ctype = "video/x-m4v";
            break;
        case 'm21':
            $ctype = "application/mp21";
            break;
        case 'ma':
            $ctype = "application/mathematica";
            break;
        case 'mac':
            $ctype = "image/x-macpaint";
            break;
        case 'mads':
            $ctype = "application/mads+xml";
            break;
        case 'man':
            $ctype = "application/x-troff-man";
            break;
        case 'mar':
            $ctype = "application/octet-stream";
            break;
        case 'mathml':
            $ctype = "application/mathml+xml";
            break;
        case 'mbox':
            $ctype = "application/mbox";
            break;
        case 'me':
            $ctype = "application/x-troff-me";
            break;
        case 'mesh':
            $ctype = "model/mesh";
            break;
        case 'metalink':
            $ctype = "application/metalink+xml";
            break;
        case 'meta4':
            $ctype = "application/metalink4+xml";
            break;
        case 'mets':
            $ctype = "application/mets+xml";
            break;
        case 'mid':
            $ctype = "audio/midi";
            break;
        case 'midi':
            $ctype = "audio/midi";
            break;
        case 'mif':
            $ctype = "application/vnd.mif";
            break;
        case 'mods':
            $ctype = "application/mods+xml";
            break;
        case 'mov':
            $ctype = "video/quicktime";
            break;
        case 'movie':
            $ctype = "video/x-sgi-movie";
            break;
        case 'm1v':
            $ctype = "video/mpeg";
            break;
        case 'm2v':
            $ctype = "video/mpeg";
            break;
        case 'mp2':
            $ctype = "audio/mpeg";
            break;
        case 'mp2a':
            $ctype = "audio/mpeg";
            break;
        case 'mp21':
            $ctype = "application/mp21";
            break;
        case 'mp3':
            $ctype = "audio/mpeg";
            break;
        case 'mp3a':
            $ctype = "audio/mpeg";
            break;
        case 'mp4':
            $ctype = "video/mp4";
            break;
        case 'mp4s':
            $ctype = "application/mp4";
            break;
        case 'mpe':
            $ctype = "video/mpeg";
            break;
        case 'mpeg':
            $ctype = "video/mpeg";
            break;
        case 'mpg':
            $ctype = "video/mpeg";
            break;
        case 'mpg4':
            $ctype = "video/mpeg";
            break;
        case 'mpga':
            $ctype = "audio/mpeg";
            break;
        case 'mrc':
            $ctype = "application/marc";
            break;
        case 'mrcx':
            $ctype = "application/marcxml+xml";
            break;
        case 'ms':
            $ctype = "application/x-troff-ms";
            break;
        case 'mscml':
            $ctype = "application/mediaservercontrol+xml";
            break;
        case 'msh':
            $ctype = "model/mesh";
            break;
        case 'mxf':
            $ctype = "application/mxf";
            break;
        case 'mxu':
            $ctype = "video/vnd.mpegurl";
            break;
        case 'nc':
            $ctype = "application/x-netcdf";
            break;
        case 'oda':
            $ctype = "application/oda";
            break;
        case 'oga':
            $ctype = "application/ogg";
            break;
        case 'ogg':
            $ctype = "application/ogg";
            break;
        case 'ogx':
            $ctype = "application/ogg";
            break;
        case 'omdoc':
            $ctype = "application/omdoc+xml";
            break;
        case 'onetoc':
            $ctype = "application/onenote";
            break;
        case 'onetoc2':
            $ctype = "application/onenote";
            break;
        case 'onetmp':
            $ctype = "application/onenote";
            break;
        case 'onepkg':
            $ctype = "application/onenote";
            break;
        case 'opf':
            $ctype = "application/oebps-package+xml";
            break;
        case 'oxps':
            $ctype = "application/oxps";
            break;
        case 'p7c':
            $ctype = "application/pkcs7-mime";
            break;
        case 'p7m':
            $ctype = "application/pkcs7-mime";
            break;
        case 'p7s':
            $ctype = "application/pkcs7-signature";
            break;
        case 'p8':
            $ctype = "application/pkcs8";
            break;
        case 'p10':
            $ctype = "application/pkcs10";
            break;
        case 'pbm':
            $ctype = "image/x-portable-bitmap";
            break;
        case 'pct':
            $ctype = "image/pict";
            break;
        case 'pdb':
            $ctype = "chemical/x-pdb";
            break;
        case 'pdf':
            $ctype = "application/pdf";
            break;
        case 'pki':
            $ctype = "application/pkixcmp";
            break;
        case 'pkipath':
            $ctype = "application/pkix-pkipath";
            break;
        case 'pfr':
            $ctype = "application/font-tdpfr";
            break;
        case 'pgm':
            $ctype = "image/x-portable-graymap";
            break;
        case 'pgn':
            $ctype = "application/x-chess-pgn";
            break;
        case 'pgp':
            $ctype = "application/pgp-encrypted";
            break;
        case 'pic':
            $ctype = "image/pict";
            break;
        case 'pict':
            $ctype = "image/pict";
            break;
        case 'pkg':
            $ctype = "application/octet-stream";
            break;
        case 'png':
            $ctype = "image/png";
            break;
        case 'pnm':
            $ctype = "image/x-portable-anymap";
            break;
        case 'pnt':
            $ctype = "image/x-macpaint";
            break;
        case 'pntg':
            $ctype = "image/x-macpaint";
            break;
        case 'pot':
            $ctype = "application/vnd.ms-powerpoint";
            break;
        case 'potx':
            $ctype = "application/vnd.openxmlformats-officedocument.presentationml.template";
            break;
        case 'ppm':
            $ctype = "image/x-portable-pixmap";
            break;
        case 'pps':
            $ctype = "application/vnd.ms-powerpoint";
            break;
        case 'ppsx':
            $ctype = "application/vnd.openxmlformats-officedocument.presentationml.slideshow";
            break;
        case 'ppt':
            $ctype = "application/vnd.ms-powerpoint";
            break;
        case 'pptx':
            $ctype = "application/vnd.openxmlformats-officedocument.presentationml.presentation";
            break;
        case 'prf':
            $ctype = "application/pics-rules";
            break;
        case 'ps':
            $ctype = "application/postscript";
            break;
        case 'psd':
            $ctype = "image/photoshop";
            break;
        case 'qt':
            $ctype = "video/quicktime";
            break;
        case 'qti':
            $ctype = "image/x-quicktime";
            break;
        case 'qtif':
            $ctype = "image/x-quicktime";
            break;
        case 'ra':
            $ctype = "audio/x-pn-realaudio";
            break;
        case 'ram':
            $ctype = "audio/x-pn-realaudio";
            break;
        case 'ras':
            $ctype = "image/x-cmu-raster";
            break;
        case 'rdf':
            $ctype = "application/rdf+xml";
            break;
        case 'rgb':
            $ctype = "image/x-rgb";
            break;
        case 'rm':
            $ctype = "application/vnd.rn-realmedia";
            break;
        case 'rmi':
            $ctype = "audio/midi";
            break;
        case 'roff':
            $ctype = "application/x-troff";
            break;
        case 'rss':
            $ctype = "application/rss+xml";
            break;
        case 'rtf':
            $ctype = "text/rtf";
            break;
        case 'rtx':
            $ctype = "text/richtext";
            break;
        case 'sgm':
            $ctype = "text/sgml";
            break;
        case 'sgml':
            $ctype = "text/sgml";
            break;
        case 'sh':
            $ctype = "application/x-sh";
            break;
        case 'shar':
            $ctype = "application/x-shar";
            break;
        case 'sig':
            $ctype = "application/pgp-signature";
            break;
        case 'silo':
            $ctype = "model/mesh";
            break;
        case 'sit':
            $ctype = "application/x-stuffit";
            break;
        case 'skd':
            $ctype = "application/x-koan";
            break;
        case 'skm':
            $ctype = "application/x-koan";
            break;
        case 'skp':
            $ctype = "application/x-koan";
            break;
        case 'skt':
            $ctype = "application/x-koan";
            break;
        case 'sldx':
            $ctype = "application/vnd.openxmlformats-officedocument.presentationml.slide";
            break;
        case 'smi':
            $ctype = "application/smil";
            break;
        case 'smil':
            $ctype = "application/smil";
            break;
        case 'snd':
            $ctype = "audio/basic";
            break;
        case 'so':
            $ctype = "application/octet-stream";
            break;
        case 'spl':
            $ctype = "application/x-futuresplash";
            break;
        case 'spx':
            $ctype = "audio/ogg";
            break;
        case 'src':
            $ctype = "application/x-wais-source";
            break;
        case 'stk':
            $ctype = "application/hyperstudio";
            break;
        case 'sv4cpio':
            $ctype = "application/x-sv4cpio";
            break;
        case 'sv4crc':
            $ctype = "application/x-sv4crc";
            break;
        case 'svg':
            $ctype = "image/svg+xml";
            break;
        case 'swf':
            $ctype = "application/x-shockwave-flash";
            break;
        case 't':
            $ctype = "application/x-troff";
            break;
        case 'tar':
            $ctype = "application/x-tar";
            break;
        case 'tcl':
            $ctype = "application/x-tcl";
            break;
        case 'tex':
            $ctype = "application/x-tex";
            break;
        case 'texi':
            $ctype = "application/x-texinfo";
            break;
        case 'texinfo':
            $ctype = "application/x-texinfo";
            break;
        case 'tif':
            $ctype = "image/tiff";
            break;
        case 'tiff':
            $ctype = "image/tiff";
            break;
        case 'torrent':
            $ctype = "application/x-bittorrent";
            break;
        case 'tr':
            $ctype = "application/x-troff";
            break;
        case 'tsv':
            $ctype = "text/tab-separated-values";
            break;
        case 'txt':
            $ctype = "text/plain";
            break;
        case 'ustar':
            $ctype = "application/x-ustar";
            break;
        case 'vcd':
            $ctype = "application/x-cdlink";
            break;
        case 'vrml':
            $ctype = "model/vrml";
            break;
        case 'vsd':
            $ctype = "application/vnd.visio";
            break;
        case 'vss':
            $ctype = "application/vnd.visio";
            break;
        case 'vst':
            $ctype = "application/vnd.visio";
            break;
        case 'vsw':
            $ctype = "application/vnd.visio";
            break;
        case 'vxml':
            $ctype = "application/voicexml+xml";
            break;
        case 'wav':
            $ctype = "audio/x-wav";
            break;
        case 'wbmp':
            $ctype = "image/vnd.wap.wbmp";
            break;
        case 'wbmxl':
            $ctype = "application/vnd.wap.wbxml";
            break;
        case 'wm':
            $ctype = "video/x-ms-wm";
            break;
        case 'wml':
            $ctype = "text/vnd.wap.wml";
            break;
        case 'wmlc':
            $ctype = "application/vnd.wap.wmlc";
            break;
        case 'wmls':
            $ctype = "text/vnd.wap.wmlscript";
            break;
        case 'wmlsc':
            $ctype = "application/vnd.wap.wmlscriptc";
            break;
        case 'wmv':
            $ctype = "video/x-ms-wmv";
            break;
        case 'wmx':
            $ctype = "video/x-ms-wmx";
            break;
        case 'wrl':
            $ctype = "model/vrml";
            break;
        case 'xbm':
            $ctype = "image/x-xbitmap";
            break;
        case 'xdssc':
            $ctype = "application/dssc+xml";
            break;
        case 'xer':
            $ctype = "application/patch-ops-error+xml";
            break;
        case 'xht':
            $ctype = "application/xhtml+xml";
            break;
        case 'xhtml':
            $ctype = "application/xhtml+xml";
            break;
        case 'xla':
            $ctype = "application/vnd.ms-excel";
            break;
        case 'xlam':
            $ctype = "application/vnd.ms-excel.addin.macroEnabled.12";
            break;
        case 'xlc':
            $ctype = "application/vnd.ms-excel";
            break;
        case 'xlm':
            $ctype = "application/vnd.ms-excel";
            break;
        case 'xls':
            $ctype = "application/vnd.ms-excel";
            break;
        case 'xlsx':
            $ctype = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
            break;
        case 'xlsb':
            $ctype = "application/vnd.ms-excel.sheet.binary.macroEnabled.12";
            break;
        case 'xlt':
            $ctype = "application/vnd.ms-excel";
            break;
        case 'xltx':
            $ctype = "application/vnd.openxmlformats-officedocument.spreadsheetml.template";
            break;
        case 'xlw':
            $ctype = "application/vnd.ms-excel";
            break;
        case 'xml':
            $ctype = "application/xml";
            break;
        case 'xpm':
            $ctype = "image/x-xpixmap";
            break;
        case 'xsl':
            $ctype = "application/xml";
            break;
        case 'xslt':
            $ctype = "application/xslt+xml";
            break;
        case 'xul':
            $ctype = "application/vnd.mozilla.xul+xml";
            break;
        case 'xwd':
            $ctype = "image/x-xwindowdump";
            break;
        case 'xyz':
            $ctype = "chemical/x-xyz";
            break;
        case 'zip':
            $ctype = "application/zip";
            break;
        default:
            $ctype = "application/force-download";
    endswitch;

    if (wp_is_mobile()) {
        $ctype = 'application/octet-stream';
    }
    return $ctype;
}
function btcpaywall_readfile_by_parts($file_url, $file_seek_offset = false)
{
    $handle = @fopen($file_url, 'rb');
    if (false === $handle) {
        return false;
    }


    if ($file_seek_offset !== false) {
        $seek_result = @fseek($handle, $file_seek_offset);
    }

    $buffer = '';
    $part_size = '*';
    while (!@feof($handle)) {
        $buffer = @fread($handle, $part_size);
        echo $buffer;

        $status = @fclose($handle);

        return $status;
    }
}


function btcpaywall_file_resume_download($file, $headers)
{
    @header($_SERVER['SERVER_PROTOCOL'] . ' 206 Partial content' . "\n");

    //nocache_headers();
    header("Robots: none" . "\n");
    header("Content-Type: " . $file['content_type'] . "\n");
    header("Content-Description: File Transfer" . "\n");
    header("Content-Disposition: attachment; filename=\"" . $file['name'] . "\"" . "\n");
    header("Content-Transfer-Encoding: binary" . "\n");


    list($size_unit, $range) = explode('=', $headers['Range'], 2);
    if ('bytes' === $size_unit) {
        if (strpos(',', $range)) {
            list($range) = explode(',', $range, 1);
        }
    } else {
        $range = '';
        header('HTTP/1.1 416 Requested Range Not Satisfiable');
        exit;
    }
    if (empty($range)) {
        $seek_start = null;
        $seek_end   = null;
    } else {
        list($seek_start, $seek_end) = explode('-', $range, 2);
    }
    $seek_end   = (empty($seek_end)) ? ($file['size'] - 1) : min(abs(intval($seek_end)), ($file['size'] - 1));
    $seek_start = (empty($seek_start) || $seek_end < abs(intval($seek_start))) ? 0 : max(abs(intval($seek_start)), 0);
    if ($seek_start > 0 || $seek_end < ($file['size'] - 1)) {
        header('HTTP/1.1 206 Partial Content');
        header('Content-Range: bytes ' . $seek_start . '-' . $seek_end . '/' . $file['size']);
        header('Content-Length: ' . ($seek_end - $seek_start + 1));
    } else {
        header("Content-Length: $file[size]");
    }
    header('Accept-Ranges: bytes');


    $file_read_status = btcpaywall_readfile_by_parts($file['url'], $seek_start);

    return $file_read_status;
}


function btcpaywall_process_download_url($args)
{
    $parts = parse_url(add_query_arg($args));

    wp_parse_str($parts['query'], $query_args);
    $secret_key = get_option("btcpw_secret_key");


    $providedToken = sanitize_text_field($_GET['token']);

    $verificationToken = btcpaywall_generate_url_token($secret_key, [
        'ttl' => rawurlencode($query_args['ttl']),
        'download_file' => (int)($query_args['download_file']),
        'payment_id' => rawurlencode($query_args['payment_id']),
        'download_id' => (int)$query_args['download_id'],
        'email' => rawurlencode($query_args['email']),
    ]);

    if (!hash_equals($providedToken, $verificationToken)) {
        $args['valid_token']    = false;
    }

    if (isset($query_args['ttl']) && current_time('timestamp') > $query_args['ttl']) {
        wp_die(__('Download link has expired.', 'btcpaywall'), array('response' => 403));
    }


    return $args;
}
function btcpaywall_generate_url_token($secret_key, $args)
{
    $tokenData = [
        'ttl' => sanitize_text_field($args['ttl']),
        'download_file' => (int)($args['download_file']),
        'payment_id' => sanitize_text_field($args['payment_id']),
        'download_id' => (int)($args['download_id']),
        'email' => sanitize_email($args['email']),
        'ip' => $_SERVER['REMOTE_ADDR'],
    ];
    $serialized = json_encode($tokenData);

    return hash_hmac('sha256', $serialized, $secret_key);
}
function btcpaywall_get_all_headers()
{
    $headers = array();
    foreach ((array) $_SERVER as $key => $value) {
        if (strncmp($key, "HTTP_", 5) == 0) {
            $key = strtr(ucwords(strtolower(strtr(substr($key, 5), "_", " "))), " ", "-");
            $headers[$key] = $value;
        }
    }
    return $headers;
}


function btcpaywall_readable_format_seconds_to_words($seconds)
{
    $ret = "";

    $days = intval(intval($seconds) / (3600 * 24));
    if ($days > 0) {
        $ret .= $days . ' ' . (($days > 1) ? __('days', 'btcpaywall') : __('day', 'btcpaywall')) . ' ';
    }

    $hours = (intval($seconds) / 3600) % 24;
    if ($hours > 0) {
        $ret .= $hours . ' ' . (($hours > 1) ? __('hours', 'btcpaywall') : __('hour', 'btcpaywall')) . ' ';
    }

    $minutes = (intval($seconds) / 60) % 60;
    if ($minutes > 0) {
        $ret .= $minutes . ' ' . (($minutes > 1) ? __('minutes', 'btcpaywall') : __('minute', 'btcpaywall')) . ' ';
    }

    $seconds = intval($seconds) % 60;
    if ($seconds > 0) {
        $ret .= $seconds . ' ' . (($seconds > 1) ? __('seconds', 'btcpaywall') : __('second', 'btcpaywall')) . ' ';
    }

    return trim($ret);
}



function btcpaywall_set_headers_for_file_download($file)
{
    nocache_headers();
    header("Robots: none" . "\n");
    @header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK' . "\n");
    header("Content-Type: " . $file['content_type'] . "\n");
    header("Content-Description: File Transfer" . "\n");
    header("Content-Disposition: attachment; filename=\"" . $file['name'] . "\"" . "\n");
    header("Content-Transfer-Encoding: binary" . "\n");

    if ((int) $file['size'] > 0) {
        header("Content-Length: " . $file['size'] . "\n");
    }
}
function btcpaywall_prepare_system_before_download_file()
{
    // $disabled = explode(',', ini_get('disable_functions'));
    // $is_func_disabled = in_array('set_time_limit', $disabled);
    // if (!$is_func_disabled && !ini_get('safe_mode')) {
    //     @set_time_limit(0);
    // }

    @session_write_close();
    if (function_exists('apache_setenv')) {
        @apache_setenv('no-gzip', 1);
    }
    @ini_set('zlib.output_compression', 'Off');

    @ob_end_clean();
}
function btcpaywall_get_local_path_from_real_link($file_url)
{
    $file_local_path = str_replace(site_url(), '', $file_url);

    $file_local_path = trailingslashit(ABSPATH) . ltrim($file_local_path, '/\\');

    return $file_local_path;
}


/** Get file name from path or URL
 *
 * @param string $file_path - Local path or URL
 * @return string
 */
function btcpaywall_get_file_name_from_path($file_path)
{
    $file_name = str_replace('\\', '/', $file_path);
    $file_name = explode('/', $file_name);
    $file_name = end($file_name);

    return $file_name;
}



function btcpaywall_get_file_extension($file_name)
{
    $file_extension = explode('.', $file_name);
    $file_extension = end($file_extension);

    return $file_extension;
}


function btcpaywall_is_file_local($download_file)
{
    $file = strtolower($download_file);

    $is_found_url = preg_match('#https?://#', $file, $matches, PREG_OFFSET_CAPTURE);

    return !$is_found_url;
}
