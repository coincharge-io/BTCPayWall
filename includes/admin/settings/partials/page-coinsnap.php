<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
update_option('btcpw_coinsnap_website_id', '2Cf1T9H7UDFgmdKSnBhhKc8QuFeHcmsUfBjUG9nVijfG');
update_option('btcpw_coinsnap_auth_key', '49f9e505c4786eebf22e8a8e069b7144269521d52774e221dcff7277ae41a0e0');
$btcpw_coinsnap_key = get_option('btcpw_coinsnap_auth_key');
$btcpw_coinsnap_website_id = get_option('btcpw_coinsnap_website_id');
$btcpw_coinsnap_secret = get_option('btcpw_coinsnap_secret');
$connection_status = $btcpw_coinsnap_website_id ? 'Connected' : '';

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
          <tr class="odd">
            <td>
              <label for="btcpw_coinsnap_auth_key"><?php echo esc_html__('API Key', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" name="btcpw_coinsnap_auth_key" id="btcpw_coinsnap_auth_key" value="<?php echo esc_attr($btcpw_coinsnap_key); ?>">
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpw_coinsnap_website_id"><?php echo esc_html__('Website ID', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" name="btcpw_coinsnap_website_id" id="btcpw_coinsnap_website_id" value="<?php echo esc_attr($btcpw_coinsnap_website_id); ?>">
            </td>
          </tr>
          <tr class="odd">
            <td>
              <label for="btcpw_coinsnap_secret"><?php echo esc_html__('Secret', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" name="btcpw_coinsnap_secret" id="btcpw_coinsnap_secret" value="<?php echo esc_attr($btcpw_coinsnap_secret); ?>">
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpw_coinsnap_connection_status"><?php echo esc_html__('Connection status', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" disabled id="btcpw_coinsnap_connection_status" value="<?php echo esc_attr($connection_status); ?>">
            </td>
          </tr>
          <tr class="even btcpw_general_settings_buttons">
            <td><button id="coinsnap-connect-website" class="button button-secondary btcpw_button"><?php echo esc_html('Connect', 'btcpaywall'); ?></button></td>
          </tr>
        </form>
      </tbody>
    </table>
  </div>
</div>
