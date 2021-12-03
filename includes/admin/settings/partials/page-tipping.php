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
                <a href="?page=btcpw_general_settings&tab=modules&section=tipping&subsection=all" class="nav-tab <?php if ($subsection === null) : ?>nav-tab-active<?php endif; ?>">All forms</a>
            </li>
            <li>
                <a href="?page=btcpw_general_settings&tab=modules&section=tipping&subsection=new" class="nav-tab <?php if ($subsection === 'new') : ?>nav-tab-active<?php endif; ?>">Add new</a>
            </li>

        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($subsection):
            case 'new':
                require('page-add-form.php');
                break;
            default:
                require('page-form-listing.php');
                break;
        endswitch; ?>
    </div>
</div>
<?php
