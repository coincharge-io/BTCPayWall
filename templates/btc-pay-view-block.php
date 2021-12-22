<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;


$help = filter_var(get_option('btcpw_pay_per_view_show_help_link', true), FILTER_VALIDATE_BOOLEAN);

$help_link = get_option('btcpw_pay_per_view_help_link', 'https://btcpaywall.com/how-to-pay-at-the-bitcoin-paywall/');
$help_text = get_option('btcpw_pay_per_view_help_link_text', 'Help');


$additional_help = filter_var(get_option('btcpw_pay_per_view_show_additional_help_link'), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = get_option('btcpw_pay_per_view_additional_help_link');
$additional_help_text = get_option('btcpw_pay_per_view_additional_help_link_text');
$background = get_option('btcpw_pay_per_view_background');
$width = get_option('btcpw_pay_per_view_width');
$height = get_option('btcpw_pay_per_view_height');
$header_color = get_option('btcpw_pay_per_view_header_color');
$info_color = get_option('btcpw_pay_per_view_info_color');
$button_color = get_option('btcpw_pay_per_view_button_color', '#f6b330');
$button_text_color = get_option('btcpw_pay_per_view_button_text_color');
$default_text = get_option('btcpw_pay_per_view_title', 'Pay now to unlock blogpost');
$default_button = get_option('btcpw_pay_per_view_button', 'Pay');
$default_info = get_option('btcpw_pay_per_view_info', 'For [price] [currency] you will have access to the post for [duration] [dtype]');
$preview_title_color = get_option('btcpw_pay_per_view_preview_title_color');
$preview_description_color = get_option('btcpw_pay_per_view_preview_description_color');
$collect_atts = array(
    'display_name' => empty($atts['display_name']) ? get_option('btcpw_default_pay_per_view_display_name', false) : $atts['display_name'],
    'display_email' => empty($atts['display_email']) ? get_option('btcpw_default_pay_per_view_display_email', false) : $atts['display_email'],
    'display_phone' => empty($atts['display_phone']) ? get_option('btcpw_default_pay_per_view_display_phone', false) : $atts['display_phone'],
    'display_address' => empty($atts['display_address']) ? get_option('btcpw_default_pay_per_view_display_address', false) : $atts['display_address'],
    'display_message' => empty($atts['display_message']) ? get_option('btcpw_default_pay_per_view_display_message', false) : $atts['display_message'],
    'mandatory_name' => empty($atts['mandatory_name']) ? get_option('btcpw_default_pay_per_view_mandatory_name', false) : $atts['mandatory_name'],
    'mandatory_email' => empty($atts['mandatory_email']) ? get_option('btcpw_default_pay_per_view_mandatory_email', false) : $atts['mandatory_email'],
    'mandatory_address' => empty($atts['mandatory_address']) ? get_option('btcpw_default_pay_per_view_mandatory_address', false) : $atts['mandatory_address'],
    'mandatory_phone' => empty($atts['mandatory_phone']) ? get_option('btcpw_default_pay_per_view_mandatory_phone', false) : $atts['mandatory_phone'],
    'mandatory_message' => empty($atts['mandatory_message']) ? get_option('btcpw_default_pay_per_view_mandatory_message', false) : $atts['mandatory_message']
);
$collect = btcpaywall_get_collect($collect_atts);

$collect_data = btcpaywall_display_is_enabled($collect);
$help = filter_var($atts['link'], FILTER_VALIDATE_BOOLEAN);

$image = wp_get_attachment_image_src($atts['preview']);

$preview_url = $image ? $image[0] : $atts['preview'];

?>
<style>
    .btcpw_revenue_view_container {
        background-color: <?php echo esc_html($background); ?>;
        width: <?php echo esc_html($width) . 'px'; ?>;
        height: <?php echo esc_html($height) . 'px'; ?>;
    }

    .btcpw_pay__content h2 {
        color: <?php echo esc_html($header_color); ?>;
    }

    .btcpw_pay__preview h3 {
        color: <?php echo esc_html($preview_title_color); ?>;
    }

    .btcpw_pay__content p {
        color: <?php echo esc_html($info_color); ?>;
    }

    .btcpw_pay__preview p {
        color: <?php echo esc_html($preview_description_color); ?>;
    }

    #btcpw_pay__button {
        background-color: <?php echo esc_html($button_color); ?>;
        color: <?php echo esc_html($button_text_color); ?>;
    }

    .btcpw_help_links {
        display: flex;
        flex-direction: <?php ($help === true && $additional_help === true) ? 'column' : ''; ?>;
        justify-content: space-between;
        gap: 1em;
    }
</style>
<div id="btcpw_revenue_container">
    <div class="btcpw_revenue_view_container">
        <form method="POST" action="" id="view_revenue_type">
            <fieldset>
                <div class="btcpw_pay__content">
                    <h2><?php echo esc_html(btcpaywall_get_payblock_header_string()); ?></h2>

                </div>
                <div class="btcpw_pay__preview">
                    <div class="btcpw_pay__preview preview_img">
                        <img src=<?php echo esc_url($preview_url); ?> alt="Video preview">
                    </div>
                    <div class="btcpw_pay__preview preview_description">
                        <h3><?php echo esc_html($atts['title']); ?></h3>
                        <p><?php echo esc_html($atts['description']); ?></p>
                    </div>

                </div>
                <div class="btcpw_pay__content">
                    <p>
                        <?php echo esc_html(btcpaywall_get_post_info_string()); ?>
                    </p>
                </div>

                <div class="btcpw_revenue_view_button" id="btcpw_revenue_view_button">
                    <?php if (true === $collect_data) : ?>

                        <div>
                            <input type="button" name="next" class="revenue-view-next-form" value="<?php echo esc_html__('Continue', 'btcpaywall'); ?>">
                        </div>
                    <?php else : ?>
                        <div>
                            <button type="submit" id="btcpw_pay__button" data-post_id="<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_html(btcpaywall_get_payblock_button_string()); ?></button>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($help === true || $additional_help === true) : ?>
                    <div class="btcpw_help_links">
                        <?php if ($help === true) : ?>
                            <div class="btcpw_help">
                                <a class="btcpw_help__link" href="<?php echo esc_attr($help_link); ?>" target="_blank"><?php echo esc_html($help_text); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ($additional_help === true) : ?>
                            <div class="btcpw_additional_help">
                                <a class="btcpw_additional_help__link" href="<?php echo esc_attr($additional_help_link); ?>" target="_blank"><?php echo esc_html($additional_help_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </fieldset>
            <?php if (true === $collect_data) : ?>
                <fieldset>
                    <h2>Personal Info</h2>
                    <div class="btcpw_revenue_view_customer_information">
                        <?php foreach ($collect as $key => $value) : ?>
                            <?php if ($collect[$key]['display'] === true) : ?>

                                <?php $id = $collect[$key]['id'];
                                $label = $collect[$key]['label']; ?>
                                <div class="<?php echo esc_attr("btcpw_revenue_view_customer_{$id}_wrap"); ?>">

                                    <input type="text" placeholder="<?php echo esc_attr($label); ?>" id="<?php echo esc_attr("btcpw_revenue_view_customer_{$id}"); ?>" name="<?php echo esc_attr("btcpw_revenue_view_customer_{$id}"); ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="btcpw_revenue_view_button" id="btcpw_revenue_view_button_second_step">
                        <div>
                            <input type="button" name="previous" class="revenue-view-previous-form" value="<?php echo esc_html__('< Previous', 'btcpaywall'); ?>" />
                        </div>

                        <div>
                            <button type="submit" id="btcpw_pay__button" data-post_id="<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_html(btcpaywall_get_payblock_button_string()); ?></button>
                        </div>
                    </div>
                </fieldset>
            <?php endif; ?>
        </form>
    </div>
</div>

<?php
