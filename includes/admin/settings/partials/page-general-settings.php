<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_tab = null;
$tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;



?>

<div class="wrap">

    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <nav class="nav-tab-wrapper">
        <a href="?page=btcpw_general_settings" class="nav-tab <?php if ($tab === null) : ?>nav-tab-active<?php endif; ?>">General settings</a>
        <a href="?page=btcpw_general_settings&tab=gateways" class="nav-tab <?php if ($tab === 'gateways') : ?>nav-tab-active<?php endif; ?>">Payment Gateways</a>
        <a href="?page=btcpw_general_settings&tab=design" class="nav-tab <?php if ($tab === 'design') : ?>nav-tab-active<?php endif; ?>">Design</a>
    </nav>

    <div class="tab-content">
        <?php switch ($tab):
            case 'gateways':
                require('page-gateways.php');
                break;
            case 'design':
                require('page-general-design.php');
                break;
            default:
                require('page-settings.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
