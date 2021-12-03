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
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-post&subsection=general" class="nav-tab <?php if ($subsection === null) : ?>nav-tab-active<?php endif; ?>">General Settings</a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=pay-post&subsection=design" class="nav-tab <?php if ($subsection === 'design') : ?>nav-tab-active<?php endif; ?>">Paywall Design</a>
            </li>
        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($subsection):
            case 'general':
                require('page-pay-per-post-settings.php');
                break;
            case 'design':
                require('page-pay-per-post-paywall-design.php');
                break;
            default:
                require('page-pay-per-post-settings.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
