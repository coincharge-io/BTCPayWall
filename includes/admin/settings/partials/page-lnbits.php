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
    <table class="general_settings_table">
      <tbody>
        <form method="POST" action="options.php">
          <?php settings_fields('btcpw_lnbits_settings'); ?>
          <tr class="odd">
            <td>
              <label for="btcpw_lnbits_server_url"><?php echo esc_html__('LNBits Server Url', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="url" name="btcpw_lnbits_server_url" id="btcpw_lnbits_server_url" value="<?php echo esc_attr($lnbits_server_url); ?>">
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpw_lnbits_auth_key"><?php echo esc_html__('LNBits API Key', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input required type="text" name="btcpw_lnbits_auth_key" id="btcpw_lnbits_auth_key" value="<?php echo esc_attr($lnbits_auth_key); ?>">
              <div>
                <span>LNBits Invoice/read key</span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan=2 id="btcpw_btcpay_status_error" class="btcpw_btcpay_status" style="color: red;"></td>
          </tr>
          <tr class="btcpw_general_settings_buttons odd">
            <td colspan=2><button class="button button-primary btcpw_button" type="submit">Save</button></td>
          </tr>
        </form>
      </tbody>
    </table>
  </div>
</div>
