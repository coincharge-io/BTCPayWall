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
                <a href="edit.php?post_type=btcpw_donation" class="nav-tab"><?php echo esc_html__('All Donation Forms','btcpaywall');?></a>
            </li>
            <li>
                <a href="post-new.php?post_type=btcpw_donation" class="nav-tab"><?php echo esc_html__('Add Donation Form','btcpaywall');?></a>
            </li>
        </ul>
    </nav>
</div>
<?php
