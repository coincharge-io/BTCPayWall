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
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-post" class="btcpw-nav-tab nav-tab <?php if ($section === null || $section === 'pay-post') : ?>nav-tab-active<?php endif; ?>">Pay-per-post</a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-per-view" class="btcpw-nav-tab nav-tab <?php if ($section === 'pay-per-view') : ?>nav-tab-active<?php endif; ?>">Pay-per-View</a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-per-file" class="btcpw-nav-tab nav-tab <?php if ($section === 'pay-per-file') : ?>nav-tab-active<?php endif; ?>">Download Store</a>
            </li>

        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($section):
            case 'pay-post':
                require('page-pay-per-post.php');
                break;
            case 'pay-per-view':
                require('page-pay-per-view.php');
                break;
            case 'pay-per-file':
                require('page-content-store-file-general-settings.php');
                break;
            default:
                require('page-pay-per-post.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
