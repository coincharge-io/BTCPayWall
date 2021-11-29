<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_section = null;
$section = isset($_GET['section']) ? $_GET['section'] : $default_section;
?>

<div class="wrap">
    <nav class="nav-tab-wrapper">
        <a href="?page=btcpw_general_settings&tab=gateways&section=" class="nav-tab <?php if ($section === null) : ?>nav-tab-active<?php endif; ?>">General</a>
        <a href="?page=btcpw_general_settings&tab=gateways&section=btcpayserver" class="nav-tab <?php if ($section === 'btcpayserver') : ?>nav-tab-active<?php endif; ?>">BTCPayServer</a>
        <a href="?page=btcpw_general_settings&tab=gateways&section=opennode" class="nav-tab <?php if ($section === 'opennode') : ?>nav-tab-active<?php endif; ?>">OpenNode</a>

    </nav>

    <div class="tab-content">
        <?php switch ($section):
            case 'opennode':
                require('page-open-node.php');
                break;
            case 'btcpayserver':
                require('page-btcpay-server.php');
                break;
            default:
                require('page-general-payment-gateways.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
