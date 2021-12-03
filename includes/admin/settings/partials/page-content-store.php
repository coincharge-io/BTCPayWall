<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_subsection = null;
$subsection = isset($_GET['subsection']) ? $_GET['subsection'] : $default_subsection;



?>

<div class="wrap">

    <nav class="nav-tab-wrapper">
        <a href="?page=btcpw_general_settings&tab=modules&section=content-store&subsection=pay-per-view" class="nav-tab <?php if ($subsection === 'pay-per-view') : ?>nav-tab-active<?php endif; ?>">View</a>
        <a href="?page=btcpw_general_settings&tab=modules&section=content-store&subsection=pay-per-file" class="nav-tab <?php if ($subsection === 'pay-per-file') : ?>nav-tab-active<?php endif; ?>">File</a>
    </nav>

    <div class="tab-content">
        <?php switch ($subsection):
            case 'pay-per-view':
                require('page-pay-per-view.php');
                break;
            case 'pay-per-file':
                require('page-pay-per-file-paywall-design.php');
                break;
            default:
                require('page-pay-per-view.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
