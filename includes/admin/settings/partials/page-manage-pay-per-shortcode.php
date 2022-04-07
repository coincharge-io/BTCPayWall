<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$id = sanitize_text_field($_GET['id']);
$type = sanitize_text_field($_GET['type']);
/* $form = new BTCPayWall_Tipping_Form($id);
$result = json_decode(json_encode($form), true); */
$result = new BTCPayWall_Tipping_Pay_Per_Shortcode();
?>
<div class="btcpw_pay_per_shortcode">
    <?php switch ($type):
        case 'pay-per-post':
            require_once __DIR__ . '/shortcode-generator-pages/page-pay-per-post-shortcode-generator.php';
            break;
        case 'pay-per-view':
            require_once __DIR__ . '/shortcode-generator-pages/page-pay-per-view-shortcode-generator.php';
            break;
        default:
            require_once __DIR__ . '/shortcode-generator-pages/page-pay-per-post-shortcode-generator.php';
            break;
    endswitch; ?>
</div>