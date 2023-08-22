<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
$btcpw_coinsnap_key = get_option('btcpw_coinsnap_auth_key');
$btcpw_coinsnap_website_id = get_option('btcpw_coinsnap_website_id');
?>
<style>
  .connected {
    height: 50px;
    color: #fff;
    background: green;
  }
</style>
<div class="btcpw_general_settings">
  <div style="margin-top: 25px;">
    <?php if (empty($btcpw_coinsnap_website_id)) : ?>
      <p>
        Create account at <a href="https://app.coinsnap.io/register" target="_blank">Coinsnap</a>
      </p>
    <?php endif; ?>
    <table class="general_settings_table">
      <tbody>
        <form method="POST" action="options.php" id="btcpw_coinsnap_form">
          <?php settings_fields('btcpw_coinsnap_settings'); ?>
          <tr class="odd">
            <td>
              <label for="btcpw_coinsnap_website_id"><?php echo esc_html__('Store ID', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" name="btcpw_coinsnap_website_id" id="btcpw_coinsnap_website_id" value="<?php echo esc_attr($btcpw_coinsnap_website_id); ?>">
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpw_coinsnap_auth_key"><?php echo esc_html__('API Key', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" name="btcpw_coinsnap_auth_key" id="btcpw_coinsnap_auth_key" value="<?php echo esc_attr($btcpw_coinsnap_key); ?>">
            </td>
          </tr>
          <tr class="odd btcpw_general_settings_buttons">
            <td colspan=2><button class="button button-primary btcpw_button" type="submit">Save</button></td>
          </tr>
        </form>
      </tbody>
    </table>
  </div>
</div>
