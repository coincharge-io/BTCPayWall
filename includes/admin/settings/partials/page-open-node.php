<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
$btcpw_opennode_auth_key = get_option('btcpw_opennode_auth_key');
?>
<div class="btcpw_general_settings">
    <div style="margin-top: 25px;">
        <table class="general_settings_table">
            <tbody>
                <form method="POST" action="options.php">
                    <?php settings_fields('btcpw_opennode_settings'); ?>
                    <tr class="odd">
                        <td>
                            <label for="btcpw_btcpay_auth_key_view"><?php echo esc_html__('OpenNode API Key', 'btcpaywall'); ?></label>
                        </td>
                        <td>
                            <input required type="text" name="btcpw_opennode_auth_key" id="btcpw_opennode_auth_key" value="<?php echo esc_attr($btcpw_opennode_auth_key); ?>" style="min-width: 500px;">
                            <div>
                                <span>E-commerce Key</span>
                            </div>
                        </td>
                    </tr>
                    <tr class="even btcpw_general_settings_buttons">
                        <td colspan=2>
                            <button class="button button-primary btcpw_button" type="submit">Save</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>
