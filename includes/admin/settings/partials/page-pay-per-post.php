<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_subsection = null;
$subsection = isset($_GET['subsection']) ? $_GET['subsection'] : $default_subsection;



?>

<div class="wrap">

    <nav class="nav-tab-wrapper">
        <a href="?page=btcpw_general_settings&tab=modules&section=pay-post&subsection=general" class="nav-tab <?php if ($section === 'general') : ?>nav-tab-active<?php endif; ?>">General Settings</a>
        <a href="?page=btcpw_general_settings&tab=modules&section=pay-post&subsection=design" class="nav-tab <?php if ($section === 'content-store') : ?>nav-tab-active<?php endif; ?>">Content store</a>
    </nav>

    <div class="tab-content">
        <?php switch ($section):
            case 'design':
                require('page-pay-per-post-paywall-design.php');
                break;
            default:
                require('page-pay-per-post-paywall-design.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
