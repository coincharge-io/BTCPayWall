<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_subsection = null;
$subsection = isset($_GET['subsection']) ? $_GET['subsection'] : $default_subsection;


?>

<div class="wrap">

    <nav class="btcpw nav-tab-wrapper">
        <ul class="btcpw subsubsub modules_subsub_nav">
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-per-file&subsection=general" class="btcpw-nav-tab nav-tab <?php if ($subsection === null || $subsection === 'general') : ?>nav-tab-active<?php endif; ?>">General</a>
            </li>

            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-per-file&subsection=products" class="btcpw-nav-tab nav-tab <?php if ($subsection === 'products') : ?>nav-tab-active<?php endif; ?>">Products</a>
            </li>

        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($subsection):
            case 'general':
                require('page-content-store-file-general-settings.php');
                break;
            case 'products':
                require('page-download-products.php');
                break;

            default:
                require('page-content-store-file-general-settings.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
