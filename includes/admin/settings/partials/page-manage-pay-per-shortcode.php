<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$id = sanitize_text_field($_GET['id']);
/* $form = new BTCPayWall_Tipping_Form($id);
$result = json_decode(json_encode($form), true); */
$result = 'Pay-per-Post';
?>
<div class="btcpw_pay_per_shortcode">
    <?php switch ($result):
        case 'Pay-per-Post':
            require_once __DIR__ . '/shortcode-generator-pages/page-pay-per-post-shortcode-generator.php';
            break;
        case 'Pay-per-View':
            require_once __DIR__ . '/shortcode-generator-pages/page-pay-per-view-shortcode-generator.php';
            break;
        default:
            require_once __DIR__ . '/shortcode-generator-pages/page-pay-per-post-shortcode-generator.php';
            break;
    endswitch; ?>
</div>