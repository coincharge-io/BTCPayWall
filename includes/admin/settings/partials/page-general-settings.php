<?php
$default_tab = null;
$tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
?>

<div class="wrap">

    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <nav class="nav-tab-wrapper">
        <a href="?page=btcpw_general_settings" class="nav-tab <?php if ($tab === null) : ?>nav-tab-active<?php endif; ?>">General settings</a>
        <a href="?page=btcpw_general_settings&tab=store" class="nav-tab <?php if ($tab === 'store') : ?>nav-tab-active<?php endif; ?>">Connect store</a>
        <a href="?page=btcpw_general_settings&tab=pay-post" class="nav-tab <?php if ($tab === 'pay-post') : ?>nav-tab-active<?php endif; ?>">Pay-per-post Paywall</a>
        <a href="?page=btcpw_general_settings&tab=pay-view" class="nav-tab <?php if ($tab === 'pay-view') : ?>nav-tab-active<?php endif; ?>">Pay-per-view Paywall</a>
        <a href="?page=btcpw_general_settings&tab=pay-file" class="nav-tab <?php if ($tab === 'pay-file') : ?>nav-tab-active<?php endif; ?>">Pay-per-file Paywall</a>
    </nav>

    <div class="tab-content">
        <?php switch ($tab):
            case 'store':
                require('page-connect-store.php');
                break;
            case 'pay-post':
                require('page-pay-per-post-paywall-design.php');
                break;
            case 'pay-view':
                require('page-pay-per-view-paywall-design.php');
                break;
            case 'pay-file':
                require('page-pay-per-file-paywall-design.php');
                break;
            default:
                require('page-settings.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
