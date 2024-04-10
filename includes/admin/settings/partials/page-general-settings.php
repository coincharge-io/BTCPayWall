<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_tab = null;
$tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : $default_tab;
?>

<div class="btcpw_settings_page wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <nav class="btcpw nav-tab-wrapper">
        <ul class="btcpw subsub modules_sub_nav">
            <li>
                <a href="?page=btcpw_general_settings&tab=gateways" class="nav-tab <?php if ($tab === null || $tab === 'gateways') : ?>nav-tab-active<?php endif; ?>"><?php echo esc_html__('Payment Gateways', 'btcpaywall'); ?></a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=misc" class="nav-tab <?php if ($tab === 'misc') : ?>nav-tab-active<?php endif; ?>"><?php echo esc_html__('Misc', 'btcpaywall'); ?></a>
            </li>
        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($tab):
            case 'gateways':
                require('page-gateways.php');
                break;
            case 'misc':
                require('page-misc.php');
                break;
            default:
                require('page-gateways.php');
                break;
        endswitch; ?>
    </div>
</div>