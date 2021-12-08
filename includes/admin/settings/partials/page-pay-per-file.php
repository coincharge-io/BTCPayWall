<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_subsection = null;
$subsection = isset($_GET['subsection']) ? $_GET['subsection'] : $default_subsection;


?>

<div class="wrap">

    <nav class="btcpw nav-tab-wrapper">
        <ul class="btcpw subsub modules_sub_nav">
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-per-file&subsection=design" class="nav-tab <?php if ($subsection === null || $subsection === 'design') : ?>nav-tab-active<?php endif; ?>">Design</a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-per-file&subsection=products" class="nav-tab <?php if ($subsection === 'products') : ?>nav-tab-active<?php endif; ?>">Products</a>
            </li>

        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($subsection):
            case 'products':
                require('page-download-products.php');
                break;
            case 'design':
                require('page-pay-per-file-paywall-design.php');
                break;
            default:
                require('page-pay-per-file-paywall-design.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
