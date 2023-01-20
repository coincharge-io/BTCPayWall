<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
$default_section = null;
$section = isset($_GET['section']) ? sanitize_text_field($_GET['section']) : $default_section;
?>
<div class="wrap">
    <div class="tab-content">
        <?php switch ($section):
            case 'opennode':
                require('page-open-node.php');
                break;
            case 'btcpayserver':
                require('page-btcpay-server.php');
                break;
            case 'coincharge_pay':
                require('page-coincharge-pay.php');
                break;
            default:
                require('page-general-payment-gateways.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
