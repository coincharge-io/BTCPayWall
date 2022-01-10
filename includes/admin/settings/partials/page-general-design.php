<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_section = null;
$section = isset($_GET['section']) ? sanitize_text_field($_GET['section']) : $default_section;
?>

<div class="wrap">

    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <nav class="nav-tab-wrapper">
        <a href="?page=btcpw_general_settings&tab=design&section=pay-post" class="nav-tab <?php if ($section === 'pay-post') : ?>nav-tab-active<?php endif; ?>">Pay-per-post Paywall</a>
        <a href="?page=btcpw_general_settings&tab=design&section=pay-view" class="nav-tab <?php if ($section === 'pay-view') : ?>nav-tab-active<?php endif; ?>">Pay-per-view Paywall</a>
        <a href="?page=btcpw_general_settings&tab=design&section=pay-file" class="nav-tab <?php if ($section === 'pay-file') : ?>nav-tab-active<?php endif; ?>">Pay-per-file Paywall</a>
    </nav>

    <div class="tab-content">
        <?php switch ($section):
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
                require('page-pay-per-post-paywall-design.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
