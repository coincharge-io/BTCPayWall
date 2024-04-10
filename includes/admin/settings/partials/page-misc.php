<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$remove_data = get_option('btcpw_remove_data_on_uninstall');
$email = get_option('btcpw_invoices_email');

?>
<div id="btcpw_misc_options">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_misc_options'); ?>
            <div class="row">
                <div class="col-50">
                    <p><?php echo esc_html__('Email for invoices', 'btcpaywall'); ?> <span class="btcpaywall_helper_tip" title="Change it if you don't want to use website email for receiving invoices"></span></p>
                </div>
                <div class="col-50">
                    <input type="email" name="btcpw_invoices_email" value="<?php echo esc_attr($email); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p><?php echo esc_html__('Clear data on uninstall', 'btcpaywall'); ?> <span class="btcpaywall_helper_tip" title="Enable if you want to delete all plugin data upon uninstallation."></span></p>
                </div>
                <div class="col-50">

                    <input type="checkbox" name="btcpw_remove_data_on_uninstall" id="btcpw_remove_data_on_uninstall" <?php checked($remove_data); ?> value="true" />

                </div>
            </div>
    </div>

    <div class="btcpw__paywall_submit_button" style="display: inline-block;">
        <button class="button button-primary btcpw_button" type="submit">Save</button>
    </div>
    </form>
</div>
</div>
