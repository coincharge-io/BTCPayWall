<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_tab = null;
$tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : $default_tab;
?>

<div class="btcpw_settings_page wrap">

    <nav class="btcpw nav-tab-wrapper">
        <ul class="btcpw subsub modules_sub_nav">
            <li>
                <a href="?page=btcpw_general_settings&tab=gateways" class="nav-tab <?php if ($tab === null || $tab === 'gateways') : ?>nav-tab-active<?php endif; ?>">Payment Gateways</a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=modules" class="nav-tab <?php if ($tab === 'modules') : ?>nav-tab-active<?php endif; ?>">Modules</a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=misc" class="nav-tab <?php if ($tab === 'misc') : ?>nav-tab-active<?php endif; ?>">Misc</a>
            </li>
        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($tab):
            case 'gateways':
                require('page-gateways.php');
                break;
            case 'modules':
                require('page-modules.php');
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
<?php
