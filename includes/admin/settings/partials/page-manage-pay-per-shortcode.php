<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$id = sanitize_text_field($_GET['id']);
$result = new BTCPayWall_Tipping_Pay_Per_Shortcode($id);
$type = !empty(sanitize_text_field($_GET['type'])) ? sanitize_text_field($_GET['type']) : $result->type;
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