<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
$btcpw_coinsnap_store_name = get_option('btcpw_coinsnap_store_name');
$btcpw_coinsnap_store_policy = get_option('btcpw_coinsnap_store_policy');
$btcpw_coinsnap_email = get_option('btcpw_coinsnap_email');
$btcpw_coinsnap_xPub = get_option('btcpw_coinsnap_xPub');
$btcpw_coinsnap_lightning_address = get_option('btcpw_coinsnap_lightning_address');
$btcpw_coinsnap_min_sendable = get_option('btcpw_coinsnap_min_sendable');
$btcpw_coinsnap_max_sendable = get_option('btcpw_coinsnap_max_sendable');
$btcpw_coinsnap_key = get_option('btcpw_coinsnap_auth_key');
$button_text = $btcpw_coinsnap_key ? 'Save' : 'Create';
/*foreach (wp_load_alloptions() as $option => $value) {
  if (strpos($option, 'btcp') !== false) {
    delete_option($option);
  }
}*/
//$is_disabled = $btcpw_coinsnap_key ? 'disabled' : '';
$is_disabled = '';

?>
<style>
  .btcpw_show_more {
    display: <?php echo empty($btcpw_coinsnap_key) ? '' : 'none'; ?>
  }

  .btcpw_show_fields {
    display: <?php echo empty($btcpw_coinsnap_key) ? 'none' : ''; ?>
  }

  #btcpw_coinsnap_connect_website {
    width: 100%;
    background: #6193c9;
  }
</style>
<div class="btcpw_general_settings">
  <div style="margin-top: 25px;">
    <table class="general_settings_table">
      <tbody>
        <form method="POST" action="options.php" id="btcpw_coinsnap_form">
          <?php settings_fields('btcpw_coinsnap_settings'); ?>
          <tr class="odd">
            <td>
              <label for="btcpw_coinsnap_email"><?php echo esc_html__('Email', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input required type="text" <?php echo $is_disabled; ?> name="btcpw_coinsnap_email" id="btcpw_coinsnap_email" value="<?php echo esc_attr($btcpw_coinsnap_email); ?>">
              <div class="btcpw_show_more">
                <span>This email will be used for authentication on Coinsnap and receiving payment notifications.</span>
              </div>
              <p class="btcpw_coinsnap_email_message" style="color:red;"></p>
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpw_coinsnap_password"><?php echo esc_html__('Password', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input required type="password" <?php echo $is_disabled; ?> name="btcpw_coinsnap_password" id="btcpw_coinsnap_password" value="<?php echo esc_attr(""); ?>">
              <div>
                <span>Use 8 or more characters with a mix of letters, numbers and symbols.</span>
              </div>
              <p class="btcpw_coinsnap_password_message" style="color:red;"></p>
              <div>
                <input type="checkbox" name="show_password" id="show_password" />
                <label for="show_password"> Show Password</label>
              </div>
            </td>
          </tr>
          <tr class="odd">
            <td>
              <label for="btcpw_coinsnap_store_name"><?php echo esc_html__('Name of the website:', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input required type="text" <?php echo $is_disabled; ?> name="btcpw_coinsnap_store_name" id="btcpw_coinsnap_store_name" value="<?php echo esc_attr($btcpw_coinsnap_store_name); ?>">
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpw_coinsnap_lightning_address"><?php echo esc_html__('Your Lightning payments will be paid to this Lightning address:', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" <?php echo $is_disabled; ?> name="btcpw_coinsnap_lightning_address" id="btcpw_coinsnap_lightning_address" value="<?php echo esc_attr($btcpw_coinsnap_lightning_address); ?>">
              <p class="btcpw_coinsnap_lightning_address_message" style="color:red;"></p>
            </td>
          </tr>
          <tr class="btcpw_show_fields odd">
            <td>
              <label for="btcpw_coinsnap_min_sendable"><?php echo esc_html__('Minimum sendable (Sats)', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" <?php echo $is_disabled; ?> name="btcpw_coinsnap_min_sendable" id="btcpw_coinsnap_min_sendable" value="<?php echo esc_attr($btcpw_coinsnap_min_sendable); ?>">
            </td>
          </tr>
          <tr class="btcpw_show_fields even">
            <td>
              <label for="btcpw_coinsnap_max_sendable"><?php echo esc_html__('Maximum sendable (Sats)', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" <?php echo $is_disabled; ?> name="btcpw_coinsnap_max_sendable" id="btcpw_coinsnap_max_sendable" value="<?php echo esc_attr($btcpw_coinsnap_max_sendable); ?>">
            </td>
          </tr>
          <tr class="odd">
            <td>
              <label for="btcpw_coinsnap_xPub"><?php echo esc_html__('Your Bitcoin payments will be paid to this xPub:', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" name="btcpw_coinsnap_xPub" <?php echo $is_disabled; ?> id="btcpw_coinsnap_xPub" value="<?php echo esc_attr($btcpw_coinsnap_xPub); ?>">
              <p class="btcpw_coinsnap_xPub_message" style="color:red;"></p>
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpay_coinsnap_speed_policy"><?php echo esc_html('Consider the invoice settled when the payment transaction:', 'btcpaywall'); ?></label>
            </td>
            <td>
              <select <?php echo $is_disabled; ?> name="btcpw_coinsnap_speed_policy" id="btcpay_coinsnap_speed_policy">
                <option <?php echo $btcpw_coinsnap_store_policy == 0 ? 'selected' : '' ?> value="0">
                  <?php echo esc_html('Is included in the Mempool:', 'btcpaywall'); ?>
                </option>
                <option <?php echo $btcpw_coinsnap_store_policy == 1 ? 'selected' : '' ?> value='1'>
                  <?php echo esc_html('Has at least 1 confirmation', 'btcpaywall'); ?>
                </option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan=2>
              <p class="btcpw_coinsnap_message" style="color:red;"></p>
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpw_coinsnap_auth_key"><?php echo esc_html__('BTCPayWall API Key', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" name="btcpw_coinsnap_auth_key" id="btcpw_coinsnap_auth_key" value="<?php echo esc_attr($btcpw_coinsnap_key); ?>">
            </td>
          </tr>
          <tr class="odd btcpw_general_settings_buttons">
            <td><button id="btcpw_coinsnap_connect_website" class="button button-secondary btcpw_button" type="button"><?php echo esc_html('Create', 'btcpaywall'); ?></button></td>
          </tr>
          <tr class="even btcpw_general_settings_buttons">
            <td><button class="button button-primary btcpw_button" type="submit"><?php echo esc_html('Save', 'btcpaywall'); ?></button></td>
          </tr>
        </form>
      </tbody>
    </table>
    <div class="btcpw_show_more">
      <p> By clicking on create you are accepting <a href=" /terms-of-service"> Terms of Service</a></p>
    </div>
    <div class="btcpw_show_more">
      <p> If you don't have a Lightning address yet. You will find all the information about Lightning address and a list of different providers where you can get a Lightning address here: <a href="https://coincharge.io/en/lightning-address/" target="_blank"> https://coincharge.io/en/lightning-address</a></p>
    </div>
  </div>
</div>
