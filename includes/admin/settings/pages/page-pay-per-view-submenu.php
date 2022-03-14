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
                <a href="?page=btcpw_pay_per_view&tab=demo" class="nav-tab <?php if ($tab === 'demo') : ?>nav-tab-active<?php endif; ?>">Demo</a>
            </li>
            <li>
                <a href="?page=btcpw_pay_per_view&tab=general" class="nav-tab <?php if ($tab === 'general') : ?>nav-tab-active<?php endif; ?>">General Settings</a>
            </li>
        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($tab):
            case "general":
                require("page-pay-per-view.php");
                break;
            default:
                require('page-donation-demo.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
