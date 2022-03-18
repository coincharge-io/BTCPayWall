<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_section = null;
$section = isset($_GET['section']) ? sanitize_text_field($_GET['section']) : $default_section;
?>
<div class="wrap">
    <nav class="btcpw nav-tab-wrapper">
        <ul class="btcpw subsubsub modules_subsub_nav">
            <li>
                <a href="?page=btcpw_general_settings&tab=gateways&section=gateways" class="btcpw-nav-tab nav-tab <?php if ($section === null || $section === 'gateways') : ?>nav-tab-active<?php endif; ?>"><?php echo esc_html__('General', 'btcpaywall'); ?></a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=gateways&section=btcpayserver" class="btcpw-nav-tab nav-tab <?php if ($section === 'btcpayserver') : ?>nav-tab-active<?php endif; ?>"><?php echo esc_html__('BTCPayServer', 'btcpaywall'); ?></a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=gateways&section=opennode" class="btcpw-nav-tab nav-tab <?php if ($section === 'opennode') : ?>nav-tab-active<?php endif; ?>"><?php echo esc_html__('OpenNode', 'btcpaywall'); ?></a>
            </li>
        </ul>
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
