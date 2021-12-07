<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_tab = null;
$tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

?>

<div class="btcpw_settings_page wrap">

    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <nav class="btcpw nav-tab-wrapper">

        <a href="?page=btcpw_general_settings&tab=gateways" class="nav-tab <?php if ($tab === 'gateways') : ?>nav-tab-active<?php endif; ?>">Payment Gateways</a>

        <a href="?page=btcpw_general_settings&tab=modules" class="nav-tab <?php if ($tab === 'modules') : ?>nav-tab-active<?php endif; ?>">Modules</a>

    </nav>

    <div class="tab-content">
        <?php switch ($tab):
            case 'gateways':
                require('page-gateways.php');
                break;
            case 'modules':
                require('page-modules.php');
                break;
            default:
                require('page-gateways.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
