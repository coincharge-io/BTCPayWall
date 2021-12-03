<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_section = null;
$section = isset($_GET['section']) ? $_GET['section'] : $default_section;



?>

<div class="wrap">

    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <nav class="nav-tab-wrapper">
        <a href="?page=btcpw_general_settings&tab=modules&section=pay-post" class="nav-tab <?php if ($section === 'pay-post') : ?>nav-tab-active<?php endif; ?>">Pay-per-post Paywall</a>
        <a href="?page=btcpw_general_settings&tab=modules&section=content-store" class="nav-tab <?php if ($section === 'content-store') : ?>nav-tab-active<?php endif; ?>">Content store</a>
        <a href="?page=btcpw_general_settings&tab=modules&section=tipping" class="nav-tab <?php if ($section === 'tipping') : ?>nav-tab-active<?php endif; ?>">Tipping</a>
    </nav>

    <div class="tab-content">
        <?php switch ($section):
            case 'pay-post':
                require('page-pay-per-post-paywall-design.php');
                break;
            case 'content-store':
                require('page-pay-per-view-paywall-design.php');
                break;
            case 'tipping':
                require('page-pay-per-file-paywall-design.php');
                break;
            default:
                require('page-pay-per-post-paywall-design.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
