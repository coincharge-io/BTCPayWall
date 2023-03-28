<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
$btcpw_coinsnap_key = get_option('btcpw_coinsnap_auth_key');

?>
<div class="btcpw_general_settings">
  <div style="margin-top: 25px;">
    <table class="general_settings_table">
      <tbody>
        <form method="POST" action="options.php" id="btcpw_coinsnap_form">
          <?php settings_fields('btcpw_coinsnap_settings'); ?>
          <tr class="even">
            <td>
              <label for="btcpw_coinsnap_auth_key"><?php echo esc_html__('API Key', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" name="btcpw_coinsnap_auth_key" id="btcpw_coinsnap_auth_key" value="<?php echo esc_attr($btcpw_coinsnap_key); ?>">
              <div>
                <span>Create account at <a href="https://app.coinsnap.io/register" target="_blank">Coinsnap</a></span>
              </div>
            </td>
          </tr>
          <tr class="even btcpw_general_settings_buttons">
            <td><button class="button button-primary btcpw_button" type="submit"><?php echo esc_html('Save', 'btcpaywall'); ?></button></td>
          </tr>
        </form>
      </tbody>
    </table>
  </div>
</div>
