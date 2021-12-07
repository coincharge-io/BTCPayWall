<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_section = null;
$section = isset($_GET['section']) ? $_GET['section'] : $default_section;



?>

<div class="wrap">
    <nav class="btcpw nav-tab-wrapper">
        <ul class="btcpw subsub modules_sub_nav">
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-post" class="nav-tab <?php if ($section === null || $section === 'pay-post') : ?>nav-tab-active<?php endif; ?>">Pay-per-post</a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=content-store" class="nav-tab <?php if ($section === 'content-store') : ?>nav-tab-active<?php endif; ?>">Content Store</a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=tipping" class="nav-tab <?php if ($section === 'tipping') : ?>nav-tab-active<?php endif; ?>">Tipping</a>
            </li>
        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($section):
            case 'pay-post':
                require('page-pay-per-post.php');
                break;
            case 'content-store':
                require('page-content-store.php');
                break;
            case 'tipping':
                require('page-tipping.php');
                break;
            default:
                require('page-pay-per-post.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
