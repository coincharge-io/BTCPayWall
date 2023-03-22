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
            case 'coinsnap':
                require('page-coinsnap.php');
                break;
            case 'lnbits':
                require('page-lnbits.php');
                break;
            default:
                require('page-general-payment-gateways.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
