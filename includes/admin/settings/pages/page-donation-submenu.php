<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$default_tab = null;
$tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : $default_tab;
?>

<div class="btcpw_settings_page wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <nav class="btcpw nav-tab-wrapper">
        <ul class="btcpw subsub modules_sub_nav">
            <li>
                <a href="?page=btcpw_donation_page&tab=all-donation-forms" class="nav-tab <?php if ($tab === 'all-donation-forms') : ?>nav-tab-active<?php endif; ?>">All Donation Forms</a>
            </li>
            <li>
                <a href="?page=btcpw_donation_page&tab=add-donation-form" class="nav-tab <?php if ($tab === 'add-donation-form') : ?>nav-tab-active<?php endif; ?>">Add Donation Form</a>
            </li>
        </ul>
    </nav>

    <div class="tab-content">
        <?php switch ($tab):
            case 'all-donation-forms':
                $url = admin_url() . 'edit.php?post_type=btcpw_donation';
        ?>
                <script>
                    location.href = '<?php echo $url; ?>';
                </script>
            <?php
                break;
            case 'add-donation-form':
                $url = admin_url() . 'post-new.php?post_type=btcpw_donation';
            ?>
                <script>
                    location.href = '<?php echo $url; ?>';
                </script>
        <?php
                break;
            default:
                return null;
        endswitch; ?>
    </div>
</div>
<?php
