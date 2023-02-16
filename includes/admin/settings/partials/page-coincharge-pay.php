<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
$btcpw_coincharge_store_name = get_option('btcpw_coincharge_pay_store_name');
$btcpw_coincharge_store_policy = get_option('btcpw_coincharge_pay_store_policy');
$btcpw_coincharge_email = get_option('btcpw_coincharge_pay_email');
$btcpw_coincharge_xPub = get_option('btcpw_coincharge_pay_xPub');
$btcpw_coincharge_lightning_address = get_option('btcpw_coincharge_pay_lightning_address');
$btcpw_coincharge_min_sendable = get_option('btcpw_coincharge_pay_min_sendable');
$btcpw_coincharge_max_sendable = get_option('btcpw_coincharge_pay_max_sendable');
$btcpw_coincharge_pay_key = get_option('btcpw_coincharge_pay_auth_key');
$button_text = $btcpw_coincharge_pay_key ? 'Save' : 'Create';
$is_disabled = $btcpw_coincharge_pay_key ? 'disabled' : '';

?>
<style>
  .btcpw_show_more {
    display: <?php echo empty($btcpw_coincharge_pay_key) ? '' : 'none'; ?>
  }

  .btcpw_show_fields {
    display: <?php echo empty($btcpw_coincharge_pay_key) ? 'none' : ''; ?>
  }

  #btcpw_coincharge_pay_create_store {
    width: 100%;
    background: #6193c9;
  }
</style>
<div class="btcpw_general_settings">
  <div style="margin-top: 25px;">
    <table class="general_settings_table">
      <tbody>
        <form id="btcpw_coincharge_pay_form" method="POST">
          <tr class="odd">
            <td>
              <label for="btcpw_coincharge_pay_email"><?php echo esc_html__('Email', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input required type="text" <?php echo $is_disabled; ?> name="btcpw_coincharge_pay_email" id="btcpw_coincharge_pay_email" value="<?php echo esc_attr($btcpw_coincharge_email); ?>">
              <div class="btcpw_show_more">
                <span>This email will be used for authentication on CoinchargePay and receiving payment notifications.</span>
              </div>
              <p class="btcpw_coincharge_pay_email_message" style="color:red;"></p>
            </td>
          </tr>
          <tr class="even btcpw_show_more">
            <td>
              <label for="btcpw_coincharge_pay_password"><?php echo esc_html__('Password', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input required type="password" <?php echo $is_disabled; ?> name="btcpw_coincharge_pay_password" id="btcpw_coincharge_pay_password" value="<?php echo esc_attr(""); ?>">
              <p class="btcpw_coincharge_pay_password_message" style="color:red;"></p>
              <div>
                <input type="checkbox" name="show_password" id="show_password" />
                <label for="show_password"> Show Password</label>
              </div>
            </td>
          </tr>
          <tr class="odd btcpw_show_more">
            <td></td>
            <td>
              <ul style="columns : 2; -webkit-columns : 2; -moz-columns : 2; list-style: inside;">
                <li> 8 characters minimum</li>
                <li> One number</li>
                <li> One special character</li>
                <li> One uppercase character</li>
                <li> One lowercase character</li>
              </ul>
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpw_coincharge_pay_store_name"><?php echo esc_html__('Store name', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input required type="text" <?php echo $is_disabled; ?> name="btcpw_coincharge_pay_store_name" id="btcpw_coincharge_pay_store_name" value="<?php echo esc_attr($btcpw_coincharge_store_name); ?>">
            </td>
          </tr>
          <tr class="odd">
            <td>
              <label for="btcpw_coincharge_pay_xPub"><?php echo esc_html__('xPub', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" name="btcpw_coincharge_pay_xPub" <?php echo $is_disabled; ?> id="btcpw_coincharge_pay_xPub" value="<?php echo esc_attr($btcpw_coincharge_xPub); ?>">
              <p class="btcpw_coincharge_pay_xPub_message" style="color:red;"></p>
            </td>
          </tr>
          <tr class="even">
            <td>
              <label for="btcpw_coincharge_pay_lightning_address"><?php echo esc_html__('Lightning Address', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" <?php echo $is_disabled; ?> name="btcpw_coincharge_pay_lightning_address" id="btcpw_coincharge_pay_lightning_address" value="<?php echo esc_attr($btcpw_coincharge_lightning_address); ?>">
              <p class="btcpw_coincharge_pay_lightning_address_message" style="color:red;"></p>
            </td>
          </tr>
          <tr class="btcpw_show_fields odd">
            <td>
              <label for="btcpw_coincharge_pay_min_sendable"><?php echo esc_html__('Minimum sendable (Sats)', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" <?php echo $is_disabled; ?> name="btcpw_coincharge_pay_min_sendable" id="btcpw_coincharge_pay_min_sendable" value="<?php echo esc_attr($btcpw_coincharge_min_sendable); ?>">
            </td>
          </tr>
          <tr class="btcpw_show_fields even">
            <td>
              <label for="btcpw_coincharge_pay_max_sendable"><?php echo esc_html__('Maximum sendable (Sats)', 'btcpaywall'); ?></label>
            </td>
            <td>
              <input type="text" <?php echo $is_disabled; ?> name="btcpw_coincharge_pay_max_sendable" id="btcpw_coincharge_pay_max_sendable" value="<?php echo esc_attr($btcpw_coincharge_max_sendable); ?>">
            </td>
          </tr>
          <tr class="odd">
            <td>
              <label for="btcpay_coincharge_pay_speed_policy">Consider the invoice settled when the payment transaction</label>
            </td>
            <td>
              <select <?php echo $is_disabled; ?> name="btcpw_coincharge_pay_speed_policy" id="btcpay_coincharge_pay_speed_policy">
                <option <?php echo $btcpw_coincharge_store_policy == 0 ? 'selected' : '' ?> value="0">
                  <?php echo esc_html('Is uncomfirmed', 'btcpaywall'); ?>
                </option>
                <option <?php echo $btcpw_coincharge_store_policy == 1 ? 'selected' : '' ?> value='1'>
                  <?php echo esc_html('Has at least 1 confirmation', 'btcpaywall'); ?>
                </option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan=2>
              <p class="btcpw_coincharge_pay_message" style="color:red;"></p>
            </td>
          </tr>
          <?php if (!empty($btcpw_coincharge_pay_key)) :; ?>
            <tr class="even">
              <td>
                <label for="btcpw_coincharge_pay_auth_key"><?php echo esc_html__('BTCPayWall API Key', 'btcpaywall'); ?></label>
              </td>
              <td>
                <input type="text" disabled name="btcpw_coincharge_pay_auth_key" id="btcpw_coincharge_pay_auth_key" value="<?php echo esc_attr($btcpw_coincharge_pay_key); ?>">
              </td>
            </tr>
          <?php endif; ?>
          <tr class="btcpw_show_more">
            <td> By clicking on create you are accepting <a href=" /terms-of-service"> Terms of Service</a></td>
          </tr>
          <tr class="odd btcpw_general_settings_buttons btcpw_show_more">
            <td colspan=2><button id="btcpw_coincharge_pay_create_store" class="button button-secondary btcpw_button" type="button">Create</button></td>
          </tr>
        </form>
      </tbody>
    </table>
    <div class="btcpw_show_more">
      <p> If you don't have a Lightning address yet. You will find all the information about Lightning address and a list of different providers where you can get a Lightning address here: <a href="https://coincharge.io/en/lightning-address/" target="_blank"> https://coincharge.io/en/lightning-address</a></p>
    </div>
  </div>
</div>
