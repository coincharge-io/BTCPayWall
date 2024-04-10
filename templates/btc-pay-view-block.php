<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}


/*$help = filter_var($atts['link'], FILTER_VALIDATE_BOOLEAN) ?? filter_var(get_option('btcpw_pay_per_view_show_help_link', true), FILTER_VALIDATE_BOOLEAN);

$help_link = !empty($atts['help_link']) ? $atts['help_link'] : get_option('btcpw_pay_per_view_help_link', 'https://btcpaywall.com/how-to-pay-at-the-bitcoin-paywall/');
$help_text = !empty($atts['help_text']) ? $atts['help_text'] : get_option('btcpw_pay_per_view_help_link_text', 'Help');


$additional_help = filter_var($atts['additional_link'], FILTER_VALIDATE_BOOLEAN) ?? filter_var(get_option('btcpw_pay_per_view_show_additional_help_link'), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = !empty($atts['additional_help_link']) ? $atts['additional_help_link'] : get_option('btcpw_pay_per_view_additional_help_link');
$additional_help_text = !empty($atts['additional_help_text']) ? $atts['additional_help_text'] : get_option('btcpw_pay_per_view_additional_help_link_text');
$background = !empty($atts['background_color']) ? $atts['background_color'] : get_option('btcpw_pay_per_view_background', '#ECF0F1');
$width = !empty($atts['width']) ? $atts['width'] : get_option('btcpw_pay_per_view_width', 500);
$height = !empty($atts['height']) ? $atts['height'] : get_option('btcpw_pay_per_view_height', 600);
$header_color = !empty($atts['header_color']) ? $atts['header_color'] : get_option('btcpw_pay_per_view_header_color', '#000000');
$info_color = !empty($atts['info_color']) ? $atts['info_color'] : get_option('btcpw_pay_per_view_info_color', '#000000');
$button_color = !empty($atts['button_color']) ? $atts['button_color'] : get_option('btcpw_pay_per_view_button_color', '#f6b330');
$button_text_color = !empty($atts['button_text_color']) ? $atts['button_text_color'] : get_option('btcpw_pay_per_view_button_text_color', '#FFFFFF');
$preview_title_color = !empty($atts['title_color']) ? $atts['title_color'] : get_option('btcpw_pay_per_view_preview_title_color', '#000000');
$preview_description_color = !empty($atts['description_color']) ? $atts['description_color'] : get_option('btcpw_pay_per_view_preview_description_color', '#000000');
*/


$help =  filter_var($atts['link'], FILTER_VALIDATE_BOOLEAN);
$help_link =  $atts['help_link'];
$help_text =  $atts['help_text'];
$additional_help = filter_var($atts['additional_link'], FILTER_VALIDATE_BOOLEAN);
$additional_help_link =  $atts['additional_help_link'];
$additional_help_text =  $atts['additional_help_text'];
$background = $atts['background_color'];


$width =  $atts['width'];
$height = $atts['height'];
$header_color =  $atts['header_color'];
$info_color = $atts['info_color'];
$button_color = $atts['button_color'];
$button_text_color = $atts['button_text_color'];
$preview_title_color = $atts['title_color'];
$preview_description_color =  $atts['description_color'];
$collect_atts = array(
    'display_name' =>  $atts['display_name'],
    'display_email' =>  $atts['display_email'],
    'display_phone' =>  $atts['display_phone'],
    'display_address' =>  $atts['display_address'],
    'display_message' =>  $atts['display_message'],
    'mandatory_name' =>  $atts['mandatory_name'],
    'mandatory_email' =>  $atts['mandatory_email'],
    'mandatory_address' =>  $atts['mandatory_address'],
    'mandatory_phone' =>  $atts['mandatory_phone'],
    'mandatory_message' =>  $atts['mandatory_message']
);
$collect = btcpaywall_get_collect($collect_atts);

$collect_data = btcpaywall_display_is_enabled($collect);
$help = filter_var($atts['link'], FILTER_VALIDATE_BOOLEAN);

$image = wp_get_attachment_image_src($atts['preview']);

$preview_url = $image ? $image[0] : $atts['preview'];
$header = !empty($atts['header_text']) ? $atts['header_text'] : btcpaywall_get_payblock_header_string();
$info = !empty($atts['info_text']) ? btcpaywall_get_post_info_string_from_attributes($atts) : btcpaywall_get_post_info_string(null, 'video');
?>
<style>
    .btcpw_revenue_view_container {
        background-color: <?php echo esc_html($background); ?>;
        width: <?php echo esc_html($width) . 'px'; ?>;
        height: <?php echo esc_html($height) . 'px'; ?>;
    }

    .btcpw_pay__content h2,
    #view_revenue_type fieldset:nth-child(2) h2 {
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

    #btcpw_pay__button:hover {
        background-color: <?php echo esc_html($atts['button_color_hover']); ?>;
    }

    .btcpw_help_links {
        display: flex;
        flex-direction: <?php echo ($help === true && $additional_help === true) ? 'row' : 'column'; ?>;
        justify-content: center;
        gap: 1em;
        width: 100%;
        align-items: center;
    }

    .btcpw_help_links a {
        color: <?php echo esc_html($info_color); ?>;
    }

    #btcpw_revenue_view_button input.revenue-view-next-form {
        color: <?php echo esc_html($atts['continue_button_text_color']); ?>;
        background: <?php echo  esc_html($atts['continue_button_color']); ?>;
    }

    #btcpw_revenue_view_button input.revenue-view-next-form:hover {
        background: <?php echo  esc_html($atts['continue_button_color_hover']); ?>;
    }

    #btcpw_revenue_view_button_second_step input.revenue-view-previous-form {
        color: <?php echo  esc_html__($atts['previous_button_text_color'], 'btcpaywall'); ?>;
        background: <?php echo  esc_html($atts['previous_button_color'], 'btcpaywall'); ?>;
    }

    #btcpw_revenue_view_button_second_step input.revenue-view-previous-form:hover {
        background: <?php echo  esc_html($atts['previous_button_color_hover']); ?>;
    }
</style>
<div id="btcpw_revenue_container">
    <div class="btcpw_revenue_view_container">
        <form method="POST" action="" id="view_revenue_type">
            <fieldset>
                <div class="btcpw_pay__content">
                    <h2><?php echo esc_html__($header, 'btcpaywall'); ?></h2>

                </div>
                <div class="btcpw_pay__preview">
                    <?php if (!empty($preview_url)) : ?>
                        <div class="btcpw_pay__preview preview_img">
                            <img src=<?php echo esc_url($preview_url); ?> alt="Video preview">
                        </div>
                    <?php endif; ?>
                    <div class="btcpw_pay__preview preview_description">
                        <h3><?php echo esc_html__($atts['title'], 'btcpaywall'); ?></h3>
                        <p><?php echo esc_html__($atts['description'], 'btcpaywall'); ?></p>
                    </div>

                </div>
                <div class="btcpw_pay__content">
                    <p>
                        <?php echo esc_html__($info, 'btcpaywall'); ?>
                    </p>
                </div>

                <div class="btcpw_revenue_view_button" id="btcpw_revenue_view_button">
                    <?php if (true === $collect_data) : ?>

                        <div>
                            <input type="button" name="next" class="revenue-view-next-form" value="<?php echo esc_attr($atts['continue_button_text'], 'btcpaywall'); ?>">
                        </div>
                    <?php else : ?>
                        <div>
                            <button type="submit" id="btcpw_pay__button" data-post_id="<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_html__(btcpaywall_get_payblock_button_string($atts), 'btcpaywall'); ?></button>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($help === true || $additional_help === true) : ?>
                    <div class="btcpw_help_links">
                        <?php if ($help === true) : ?>
                            <div class="btcpw_help">
                                <a class="btcpw_help__link" href="<?php echo esc_attr($help_link); ?>" target="_blank"><?php echo esc_html__($help_text, 'btcpaywall'); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ($additional_help === true) : ?>
                            <div class="btcpw_additional_help">
                                <a class="btcpw_additional_help__link" href="<?php echo esc_attr($additional_help_link); ?>" target="_blank"><?php echo esc_html__($additional_help_text, 'btcpaywall'); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </fieldset>
            <?php if (true === $collect_data) : ?>
                <fieldset>
                    <h2><?php echo esc_html__('Personal Information', 'btcpaywall'); ?></h2>
                    <div class="btcpw_revenue_view_customer_information">
                        <?php foreach ($collect as $key => $value) : ?>
                            <?php if ($collect[$key]['display'] === true) : ?>

                                <?php $id = $collect[$key]['id'];
                                $label = $collect[$key]['label'];
                                $type = $collect[$key]['type']; ?>
                                <div class="<?php echo esc_attr("btcpw_revenue_view_customer_{$id}_wrap"); ?>">
                                    <label for="<?php echo esc_attr("btcpw_revenue_post_customer_{$id}"); ?>"><?php echo esc_html__($label, 'btcpaywall'); ?></label>
                                    <input type="<?php echo esc_attr($type); ?>" id="<?php echo esc_attr("btcpw_revenue_view_customer_{$id}"); ?>" name="<?php echo esc_attr("btcpw_revenue_view_customer_{$id}"); ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="btcpw_revenue_view_button" id="btcpw_revenue_view_button_second_step">
                        <div>
                            <input type="button" name="previous" class="revenue-view-previous-form" value="<?php echo esc_attr($atts['previous_button_text'], 'btcpaywall'); ?>" />
                        </div>

                        <div>
                            <button type="submit" id="btcpw_pay__button" data-post_id="<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_html__(btcpaywall_get_payblock_button_string($atts), 'btcpaywall'); ?></button>
                        </div>
                    </div>
                </fieldset>
            <?php endif; ?>
        </form>
    </div>
</div>
