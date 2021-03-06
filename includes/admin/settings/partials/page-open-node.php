<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$btcpw_opennode_auth_key = get_option('btcpw_opennode_auth_key');
?>
<div class="btcpw_general_settings">
    <div style="margin-top: 25px;">

        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_opennode_settings'); ?>
            <div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_btcpay_auth_key_view"><?php echo esc_html__('OpenNode API Key', 'btcpaywall'); ?></label>
                    </div>
                    <div class="col-80">
                        <input required type="text" placeholder="OpenNode Auth Key" name="btcpw_opennode_auth_key" id="btcpw_opennode_auth_key" value="<?php echo esc_attr($btcpw_opennode_auth_key); ?>" style="min-width: 500px;">
                    </div>
                </div>
                <div class="btcpw_general_settings_buttons" style="display: inline-block;">
                    <button class="button button-primary btcpw_button" type="submit">Save</button>
                </div>
        </form>

    </div>
</div>