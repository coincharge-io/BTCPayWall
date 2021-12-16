<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

$help = filter_var(get_option('btcpw_pay_per_post_show_help_link', true), FILTER_VALIDATE_BOOLEAN);
$help_link = get_option('btcpw_pay_per_post_help_link', 'https://btcpaywall.com/how-to-pay-at-the-bitcoin-paywall/');
$help_text = get_option('btcpw_pay_per_post_help_link_text', 'Help');
$additional_help = filter_var(get_option('btcpw_pay_per_post_show_additional_help_link'), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = get_option('btcpw_pay_per_post_additional_help_link');
$additional_help_text = get_option('btcpw_pay_per_post_additional_help_link_text');
$background = get_option('btcpw_pay_per_post_background');
$width = get_option('btcpw_pay_per_post_width');
$height = get_option('btcpw_pay_per_post_height');

$header_color = get_option('btcpw_pay_per_post_header_color');
$info_color = get_option('btcpw_pay_per_post_info_color');
$button_color = get_option('btcpw_pay_per_post_button_color');
$button_text_color = get_option('btcpw_pay_per_post_button_text_color');
$default_text = get_option('btcpw_pay_per_post_title', 'Pay now to unlock blogpost');
$default_button = get_option('btcpw_pay_per_post_button', 'Pay');
$default_info = get_option('btcpw_pay_per_post_info', 'For [price] [currency] you will have access to the post for [duration] [dtype]');
$collect_atts = array(
    'display_name' => empty($atts['display_name']) ? get_option('btcpw_default_pay_per_post_display_name', false) : $atts['display_name'],
    'display_email' => empty($atts['display_email']) ? get_option('btcpw_default_pay_per_post_display_email', false) : $atts['display_email'],
    'display_phone' => empty($atts['display_phone']) ? get_option('btcpw_default_pay_per_post_display_phone', false) : $atts['display_phone'],
    'display_address' => empty($atts['display_address']) ? get_option('btcpw_default_pay_per_post_display_address', false) : $atts['display_address'],
    'display_message' => empty($atts['display_message']) ? get_option('btcpw_default_pay_per_post_display_message', false) : $atts['display_message'],
    'mandatory_name' => empty($atts['mandatory_name']) ? get_option('btcpw_default_pay_per_post_mandatory_name', false) : $atts['mandatory_name'],
    'mandatory_email' => empty($atts['mandatory_email']) ? get_option('btcpw_default_pay_per_post_mandatory_email', false) : $atts['mandatory_email'],
    'mandatory_address' => empty($atts['mandatory_address']) ? get_option('btcpw_default_pay_per_post_mandatory_address', false) : $atts['mandatory_address'],
    'mandatory_phone' => empty($atts['mandatory_phone']) ? get_option('btcpw_default_pay_per_post_mandatory_phone', false) : $atts['mandatory_phone'],
    'mandatory_message' => empty($atts['mandatory_message']) ? get_option('btcpw_default_pay_per_post_mandatory_message', false) : $atts['mandatory_message']
);
$collect = getCollect($collect_atts);

$collect_data = display_is_enabled($collect);
/**<div class="btcpw_pay__loading">
            <p class="loading"></p>
        </div> */
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
</style>
<div class="btcpw_revenue_post_container">
    <form method="POST" action="" id="post_revenue_type">
        <fieldset>
            <div class="btcpw_pay__content paywall_header">
                <h2><?php echo esc_html(get_payblock_header_string()); ?></h2>

            </div>
            <div class="btcpw_pay__content paywall_info">
                <p>
                    <?php echo esc_html(get_post_info_string()); ?>
                </p>
            </div>
            <div class="btcpw_revenue_post_button" id="btcpw_revenue_post_button">
                <?php if (true === $collect_data) : ?>

                    <div>
                        <input type="button" name="next" class="revenue-post-next-form" value="<?php _e('Continue', 'btcpaywall'); ?>">
                    </div>
                <?php else : ?>

                    <div>
                        <button type="submit" id="btcpw_pay__button" data-post_id="<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_html(get_payblock_button_string()) ?></button>
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
        <?php if ($collect_data === true) : ?>
            <fieldset>
                <h2>Personal Info</h2>
                <div class="btcpw_revenue_post_customer_information">
                    <?php foreach ($collect as $key => $value) : ?>
                        <?php if ($collect[$key]['display'] === true) : ?>
                            <div class="<?php echo "btcpw_revenue_post_customer_{$collect[$key]['id']}_wrap"; ?>">

                                <input type="text" placeholder="<?php echo $collect[$key]['label']; ?>" id="<?php echo "btcpw_revenue_post_customer_{$collect[$key]['id']}"; ?>" name="<?php echo "btcpw_revenue_post_customer_{$collect[$key]['id']}"; ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="btcpw_revenue_post_button" id="btcpw_revenue_post_button_second_step">
                    <div>
                        <input type="button" name="previous" class="revenue-post-previous-form" value="<?php _e('< Previous', 'btcpaywall'); ?>" />
                    </div>

                    <div>
                        <button type="submit" id="btcpw_pay__button" data-post_id="<?php echo get_the_ID(); ?>"><?php echo get_payblock_button_string() ?></button>
                    </div>
                </div>
            </fieldset>
        <?php endif; ?>
    </form>
</div>
<?php
