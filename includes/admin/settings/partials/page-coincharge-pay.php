<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
$btcpw_coincharge_pay_key = get_option('btcpw_coincharge_pay_auth_key');
$button_text = $btcpw_coincharge_pay_key ? 'Save' : 'Create';
?>
<div class="btcpw_general_settings">
  <div style="margin-top: 25px;">
    <form method="POST" action="options.php">
      <?php settings_fields('btcpw_coincharge_settings'); ?>
      <div>
        <?php if (empty($btcpw_coincharge_pay_key)) :; ?>
          <div class="row">
            <div class="col-20">
              <label for="btcpw_coincharge_pay_email"><?php echo esc_html__('Email', 'btcpaywall'); ?></label>
              <span class="btcpaywall_helper_tip" title="This email will be used for authentication on CoinchargePay and receiving payment notifications."></span>
            </div>
            <div class="col-80">
              <input required type="text" placeholder="Email" name="btcpw_coincharge_pay_email" id="btcpw_coincharge_pay_email" value="<?php echo esc_attr(""); ?>" style="min-width: 500px;">
              <p class="btcpw_coincharge_pay_email_message" style="color:red;"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-20">
              <label for="btcpw_coincharge_pay_password"><?php echo esc_html__('Password', 'btcpaywall'); ?></label>
            </div>
            <div class="col-80">
              <input required type="password" placeholder="Password" name="btcpw_coincharge_pay_password" id="btcpw_coincharge_pay_password" value="<?php echo esc_attr(""); ?>" style="min-width: 500px;">
              <p class="btcpw_coincharge_pay_password_message" style="color:red;"></p>
              <input type="checkbox" name="show_password" id="show_password" />
              <label for="show_password"> Show Password</label>
              <ul style="columns : 2; -webkit-columns : 2; -moz-columns : 2; list-style: inside;">
                <li> 8 characters minimum</li>
                <li> One number</li>
                <li> One special character</li>
                <li> One uppercase character</li>
                <li> One lowercase character</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-20">
              <label for="btcpw_coincharge_pay_store_name"><?php echo esc_html__('Store name', 'btcpaywall'); ?></label>
            </div>
            <div class="col-80">
              <input required type="text" placeholder="Store name" name="btcpw_coincharge_pay_store_name" id="btcpw_coincharge_pay_store_name" value="<?php echo esc_attr(""); ?>" style="min-width: 500px;">
            </div>
          </div>
          <div class="row">
            <div class="col-20">
              <label for="btcpw_coincharge_pay_lightning_address"><?php echo esc_html__('Lightning Address', 'btcpaywall'); ?></label>
            </div>
            <div class="col-80">
              <input required type="text" placeholder="Lightning Address for receiving Sats" name="btcpw_coincharge_pay_lightning_address" id="btcpw_coincharge_pay_lightning_address" value="<?php echo esc_attr(""); ?>" style="min-width: 500px;">
              <p class="btcpw_coincharge_pay_lightning_address_message" style="color:red;"></p>
              <p class="btcpw_coincharge_pay_message" style="color:red;"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-20">
              <label for="btcpw_coincharge_pay_xPub"><?php echo esc_html__('xPub', 'btcpaywall'); ?></label>
            </div>
            <div class="col-80">
              <input required type="text" placeholder="XPub for receiving BTC" name="btcpw_coincharge_pay_xPub" id="btcpw_coincharge_pay_lightning_address" value="<?php echo esc_attr(""); ?>" style="min-width: 500px;">
              <p class="btcpw_coincharge_pay_xPub_message" style="color:red;"></p>
              <p class="btcpw_coincharge_pay_message" style="color:red;"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-20">
              <label for="btcpay_coincharge_pay_speed_policy">Consider the invoice settled when the payment transaction</label>
            </div>
            <div class="col-80">
              <select required name="btcpw_coincharge_pay_speed_policy" id="btcpay_coincharge_pay_speed_policy">
                <option value="0">
                  <?php echo esc_html('Is uncomfirmed', 'btcpaywall'); ?>
                </option>
                <option 'selected' value='1'>
                  <?php echo esc_html('Has at least 1 confirmation', 'btcpaywall'); ?>
                </option>
              </select>
            </div>
          </div>
          <div class="row">
            <p> By clicking on create you are accepting <a href="/terms-of-service"> Terms of Service</a></p>
          </div>
      </div>
      <div class="btcpw_general_settings_buttons" style="display: inline-block;">
        <button id="btcpw_coincharge_pay_create_store" class="button button-secondary btcpw_button" type="button">Create</button>
      </div>
      <div>
        <p> If you don't have a Lightning address yet. You will find all the information about Lightning address and a list of different providers where you can get a Lightning address here: <a href="https://coincharge.io/en/lightning-address/" target="_blank"> https://coincharge.io/en/lightning-address</a>
      </div>
    <?php else : ?>
      <div class="row">
        <div class="col-20">
          <label for="btcpw_coincharge_pay_auth_key"><?php echo esc_html__('API key', 'btcpaywall'); ?></label>
        </div>
        <div class="col-80">
          <input type="text" placeholder="API key" name="btcpw_coincharge_pay_auth_key" id="btcpw_coincharge_pay_auth_key" value="<?php echo esc_attr($btcpw_coincharge_pay_key); ?>" style="min-width: 500px;">
        </div>
      </div>
      <div class="btcpw_general_settings_buttons" style="display: inline-block;">
        <button class="button button-primary btcpw_button" type="submit">Save</button>
      </div>
    <?php endif; ?>
    </form>

  </div>
</div>