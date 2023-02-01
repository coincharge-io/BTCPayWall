<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}

$lnbits_server_url = get_option('btcpw_lnbits_server_url');
$lnbits_auth_key = get_option('btcpw_lnbits_auth_key');
?>
<div class="btcpw_general_settings">
  <div style="margin-top: 25px;">

    <form method="POST" action="options.php">
      <?php settings_fields('btcpw_lnbits_settings'); ?>
      <div class="row">
        <div class="col-20">
          <label for="btcpw_lnbits_server_url"><?php echo esc_html__('LNBits Server Url', 'btcpaywall'); ?></label>
        </div>
        <div class="col-80">
          <input type="url" name="btcpw_lnbits_server_url" id="btcpw_lnbits_server_url" value="<?php echo esc_attr($lnbits_server_url); ?>" style="min-width: 335px;">
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label for="btcpw_lnbits_auth_key"><?php echo esc_html__('LNBits API Key', 'btcpaywall'); ?></label>
          <span class="btcpaywall_helper_tip" title="Invoice/read key"></span>
        </div>
        <div class="col-80">
          <input required type="text" name="btcpw_lnbits_auth_key" id="btcpw_lnbits_auth_key" value="<?php echo esc_attr($lnbits_auth_key); ?>" style="min-width: 500px;">
        </div>
      </div>
  </div>
  <p id="btcpw_btcpay_status_error" class="btcpw_btcpay_status" style="color: red;"></p>
  <div class="btcpw_general_settings_buttons" style="display: inline-block;">
    <button class="button button-primary btcpw_button" type="submit">Save</button>
  </div>
  </form>

</div>
</div>
