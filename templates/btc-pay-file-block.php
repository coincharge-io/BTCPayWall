<?php
$help = filter_var(get_option('btcpw_pay_per_file_show_help_link', true), FILTER_VALIDATE_BOOLEAN);
$help_link = get_option('btcpw_pay_per_file_help_link', 'https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/');
$help_text = get_option('btcpw_pay_per_file_help_link_text', 'Help');
$additional_help = filter_var(get_option('btcpw_pay_per_file_show_additional_help_link', false), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = get_option('btcpw_pay_per_file_additional_help_link');
$additional_help_text = get_option('btcpw_pay_per_file_additional_help_link_text');
$background = get_option('btcpw_pay_per_file_background', '#ECF0F1');
$width = get_option('btcpw_pay_per_file_width', 300);
$height = get_option('btcpw_pay_per_file_height', 300);

$header_color = get_option('btcpw_pay_per_file_header_color', '#000000');
$info_color = get_option('btcpw_pay_per_file_info_color', '#000000');
$button_color = get_option('btcpw_pay_per_file_button_color', '#000000');
$button_text_color = get_option('btcpw_pay_per_file_button_text_color', '#FFFFFF');
$default_text = get_option('btcpw_pay_per_file_title', 'Pay now to unlock blogpost');
$default_button = get_option('btcpw_pay_per_file_button', 'Pay');
$default_info = get_option('btcpw_pay_per_file_info', 'For [price] [currency] you will have access to the post for [duration] [dtype]');
$preview_title_color = get_option('btcpw_pay_per_view_preview_title_color', '#000000');
$preview_description_color = get_option('btcpw_pay_per_view_preview_description_color', '#000000');
$collect = getCollect($atts);

$collect_data = display_is_enabled($collect);
$image = wp_get_attachment_image_src($atts['preview']);

$preview_url = $image ? $image[0] : $atts['preview'];
?>
<style>
    .btcpw_pay_file {
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
</style>
<div class="btcpw_pay_file">
    <div class="btcpw_revenue_file_container">
        <form method="POST" action="" id="file_revenue_type">
            <fieldset>
                <div class="btcpw_pay__content">
                    <h2><?php echo get_payblock_header_string() ?></h2>

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
                        <?php echo get_post_info_string() ?>
                    </p>
                </div>
                    <?php if ($help === true) : ?>
                        <div class="btcpw_help">
                            <a class="btcpw_help__link" href="<?php echo esc_attr($help_link); ?>" target="_blank"><?php echo esc_html($help_text); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if ($additional_help === true) : ?>
                        <div class="btcpw_help">
                            <a class="btcpw_help__link" href="<?php echo esc_attr($additional_help_link); ?>" target="_blank"><?php echo esc_html($additional_help_text); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="btcpw_revenue_file_button" id="btcpw_revenue_file_button">
                        <?php if (true === $collect_data) : ?>

                            <div>
                                <input type="button" name="next" class="revenue-file-next-form" value="Continue">
                            </div>

                        <?php else : ?>
                            <div>
                                <button type="button" id="btcpw_pay__button" data-post_id="<?php echo get_the_ID(); ?>"><?php echo get_payblock_button_string() ?></button>
                            </div>
                        <?php endif; ?>
                </div>
            </fieldset>
            <?php if ($collect_data === true) : ?>
                <fieldset>
                    <div class="btcpw_revenue_file_customer_information">
                        <?php foreach ($collect as $key => $value) : ?>
                            <?php if ($collect[$key]['display'] === true) : ?>
                                <div class="<?php echo "btcpw_revenue_file_customer_{$collect[$key]['id']}_wrap"; ?>">

                                    <input type="text" placeholder="<?php echo $collect[$key]['label']; ?>" id="<?php echo "btcpw_revenue_file_customer_{$collect[$key]['id']}"; ?>" name="<?php echo "btcpw_revenue_file_customer_{$collect[$key]['id']}"; ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="btcpw_revenue_file_button" id="btcpw_revenue_file_button">
                        <div>
                            <input type="button" name="previous" class="revenue-file-previous-form" value="< Previous" />
                        </div>

                        <div>
                            <button type="button" id="btcpw_pay__button" data-post_id="<?php echo get_the_ID(); ?>"><?php echo get_payblock_button_string() ?></button>
                        </div>
                    </div>
                </fieldset>
            <?php endif; ?>
        </form>
    </div>
</div>
<?php
