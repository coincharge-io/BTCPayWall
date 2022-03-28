<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

$help = filter_var(get_option('btcpw_pay_per_post_show_help_link', true), FILTER_VALIDATE_BOOLEAN);
$help_link = get_option('btcpw_pay_per_post_help_link', 'https://btcpaywall.com/how-to-pay-at-the-bitcoin-paywall/');
$help_text = get_option('btcpw_pay_per_post_help_link_text', 'Help');
$additional_help = filter_var(get_option('btcpw_pay_per_post_show_additional_help_link'), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = get_option('btcpw_pay_per_post_additional_help_link');
$additional_help_text = get_option('btcpw_pay_per_post_additional_help_link_text');
$background = get_option('btcpw_pay_per_post_background', '#ECF0F1');
$width = get_option('btcpw_pay_per_post_width', 400);
$height = get_option('btcpw_pay_per_post_height', 650);

$header_color = get_option('btcpw_pay_per_post_header_color', '#000000');
$info_color = get_option('btcpw_pay_per_post_info_color', '#000000');
$button_color = get_option('btcpw_pay_per_post_button_color', '#f6b330');
$button_text_color = get_option('btcpw_pay_per_post_button_text_color', '#FFFFFF');
$default_text = get_option('btcpw_pay_per_post_title', 'Pay now to unlock blogpost');
$default_button = get_option('btcpw_pay_per_post_button', 'Pay');
$default_info = get_option('btcpw_pay_per_post_info', 'For [price] [currency] you will have access to the post for [duration] [dtype]');


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
?>
<style>
    .btcpw_revenue_post_container {
        background-color: <?php echo esc_html($background); ?>;
        width: <?php echo esc_html($width) . 'px'; ?>;
        height: <?php echo esc_html($height) . 'px'; ?>;
    }

    .btcpw_pay__content h2 {
        color: <?php echo esc_html($header_color); ?>;
    }

    .btcpw_pay__content p {
        color: <?php echo esc_html($info_color); ?>;
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

    #btcpw_revenue_post_button input.revenue-post-next-form {
        color: <?php echo esc_html__($atts['continue_button_text_color'], 'btcpaywall'); ?>;
        background: <?php echo  esc_html($atts['continue_button_color'], 'btcpaywall'); ?>;
    }

    #btcpw_revenue_post_button_second_step input.revenue-post-previous-form {
        color: <?php echo  esc_html__($atts['previous_button_text_color'], 'btcpaywall'); ?>;
        background: <?php echo  esc_html($atts['previous_button_color'], 'btcpaywall'); ?>;

    }
</style>
<div id="btcpw_revenue_container">
    <div class="btcpw_revenue_post_container">
        <form method="POST" action="" id="post_revenue_type">
            <fieldset>
                <div class="btcpw_pay__content paywall_header">
                    <h2><?php echo esc_html__(btcpaywall_get_payblock_header_string(), 'btcpaywall'); ?></h2>

                </div>
                <div class="btcpw_pay__content paywall_info">
                    <p>
                        <?php echo esc_html__(btcpaywall_get_post_info_string(), 'btcpaywall'); ?>
                    </p>
                </div>
                <div class="btcpw_revenue_post_button" id="btcpw_revenue_post_button">
                    <?php if (true === $collect_data) : ?>

                        <div>
                            <input type="button" name="next" class="revenue-post-next-form" value="<?php echo esc_attr($atts['continue_button_text'], 'btcpaywall'); ?>">
                        </div>
                    <?php else : ?>

                        <div>
                            <button type="submit" id="btcpw_pay__button" data-post_id="<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_html(btcpaywall_get_payblock_button_string()) ?></button>
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
            <?php if ($collect_data === true) : ?>
                <fieldset>
                    <h2><?php echo esc_html__('Personal Information', 'btcpaywall'); ?></h2>
                    <div class="btcpw_revenue_post_customer_information">
                        <?php foreach ($collect as $key => $value) : ?>
                            <?php if ($collect[$key]['display'] === true) : ?>
                                <?php $id = $collect[$key]['id'];
                                $label = $collect[$key]['label'];
                                $type = $collect[$key]['type']; ?>
                                <div class="<?php echo esc_attr("btcpw_revenue_post_customer_{$id}_wrap"); ?>">
                                    <label for="<?php echo esc_attr("btcpw_revenue_post_customer_{$id}"); ?>"><?php echo esc_html__($label, 'btcpaywall'); ?></label>
                                    <input type="<?php echo esc_attr($type); ?>" id="<?php echo esc_attr("btcpw_revenue_post_customer_{$id}"); ?>" name="<?php echo esc_attr("btcpw_revenue_post_customer_{$id}"); ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="btcpw_revenue_post_button" id="btcpw_revenue_post_button_second_step">
                        <div>
                            <input type="button" name="previous" class="revenue-post-previous-form" value="<?php echo esc_attr($atts['previous_button_text'], 'btcpaywall'); ?>" />
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
