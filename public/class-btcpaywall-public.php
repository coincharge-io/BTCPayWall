<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package BTCPayWall
 * @subpackage BTCPayWall/public
 * @author BTCPayWall by Coincharge https://btcpaywall.com
 */
class BTCPayWall_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @access private
	 * @var string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @access private
	 * @var string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of this plugin.
	 *
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 */
	public function enqueue_styles()
	{

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/btc-paywall-public.css', array(), null, 'all');

		wp_enqueue_style('load-fa', 'https://use.fontawesome.com/releases/v5.12.1/css/all.css');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/btc-paywall-public.js', array('jquery'), null, false);

		wp_enqueue_script('btcpay', get_option('btcpw_btcpay_server_url', '') . '/modal/btcpay.js', array(), null, true);
	}

	private function is_paid_content($post_id = null)
	{

		if (empty($post_id)) {
			$post_id = get_the_ID();
		}

		if (empty($_COOKIE['btcpw_' . $post_id])) {
			return false;
		}

		$order = get_posts([
			'post_type' => 'btcpw_order',
			'fields' => 'ids',
			'no_found_rows' => true,
			'meta_query' => [
				'relation' => 'AND',
				[
					'key' => 'btcpw_post_id',
					'value' => $post_id,
					'type' => 'NUMERIC',
				],
				[
					'key' => 'btcpw_secret',
					'value' => sanitize_text_field($_COOKIE['btcpw_' . $post_id]),
				],
			],
		]);

		if (empty($order)) {
			return false;
		}

		return true;
	}

	/**
	 *
	 * @param string $content
	 *
	 * @return string
	 */
	public function filter_the_content($content)
	{


		if ($this->is_paid_content()) {
			return $content;
		}

		if (($start_pos = strpos($content, '<!-- btcpw:start_content -->')) === false) {
			return $content;
		}

		$content_start = substr($content, 0, $start_pos);

		if (($end_pos = strpos($content, '<!-- /btcpw:end_content -->')) === false) {
			$content_end = '';
		} else {
			$content_end = substr($content, $end_pos + 26);
		}


		return $content_start . $content_end;
	}

	/**
	 *
	 */
	public function ajax_get_invoice_id()
	{

		if (empty($_GET['post_id'])) {
			wp_send_json_error(['message' => 'post_id required']);
		}

		$post_id = sanitize_text_field($_GET['post_id']);
		$order_id = $this->generate_order_id($post_id);
		$invoice_id = $this->generate_invoice_id($post_id, $order_id);

		if (is_wp_error($invoice_id)) {
			wp_send_json_error([
				'message' => $invoice_id->get_error_message(),
			]);
		}

		wp_send_json_success([
			'amount' => $invoice_id['amount'],
			'invoice_id' => $invoice_id['id'],
			'order_id' => $order_id,
		]);
	}

	public static function get_post_info_string($post_id = null)
	{

		if (!$post_id) {
			$post_id = get_the_ID();
		}

		if (get_post_meta($post_id, 'btcpw_price', true)) {
			$price = get_post_meta($post_id, 'btcpw_price', true);
		} else {
			$price = get_option('btcpw_default_price');
		}

		if (get_post_meta($post_id, 'btcpw_duration', true)) {
			$duration = get_post_meta($post_id, 'btcpw_duration', true);
		} else {
			$duration = get_option('btcpw_default_duration');
		}

		if (get_post_meta($post_id, 'btcpw_duration_type', true)) {
			$duration_type = get_post_meta($post_id, 'btcpw_duration_type', true);
		} else {
			$duration_type = get_option('btcpw_default_duration_type', 'unlimited');
		}
		if (get_post_meta($post_id, 'btcpw_currency', true)) {
			$currency = get_post_meta($post_id, 'btcpw_currency', true);
		} else {
			$currency = get_option('btcpw_default_currency', 'SATS');
		}
		$btc_format = get_post_meta(get_the_ID(), 'btcpw_btc_format', true) ?: get_option('btcpw_default_btc_format');

		if ($currency === 'SATS' && $btc_format === 'BTC') {

			$price = $price / 100000000;

			$price = sprintf('%.8f', $price);

			$price = rtrim($price, '0');

			$currency = 'BTC';
		}

		$payblock_info = get_option('btcpw_default_payblock_info');

		if (!empty($payblock_info)) {

			$search = array('[price]', '[duration]', '[dtype]', '[currency]');

			$replace = array($price, $duration, $duration_type, $currency);

			return str_replace($search, $replace, $payblock_info);
		}
		$non_number = $duration_type === 'unlimited' || $duration_type === 'onetime';

		$duration_type = ($duration > 1 && !$non_number) ? "{$duration_type}s" : $duration_type;

		$unlimited = "For {$price} {$currency} you will have unlimited access to the post.";

		$onetime = "For {$price} {$currency} you will have access to the post only once.";

		$other = "For {$price} {$currency} you will have access to the post for {$duration} {$duration_type}.";

		return $duration_type === 'unlimited' ? $unlimited : ($duration_type === 'onetime' ? $onetime : $other);
	}

	public static function get_payblock_header_string()
	{
		return get_option('btcpw_default_payblock_text') ?: 'For access to ' . get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'] . ' first pay';
	}
	public static function get_payblock_button_string()
	{
		return get_option('btcpw_default_payblock_button') ?: 'Pay';
	}

	private function calculate_price_for_invoice($post_id)
	{
		$currency_scope = get_post_meta($post_id, 'btcpw_currency', true) ?: get_option('btcpw_default_currency', 'SATS');

		if ($currency_scope === 'SATS') {

			if (get_post_meta($post_id, 'btcpw_price', true)) {

				$price = get_post_meta($post_id, 'btcpw_price', true);
			} else {

				$price = get_option('btcpw_default_price');
			}

			$value = $price / 100000000;

			$value = sprintf('%.8f', $value);

			$value = rtrim($value, '0');

			return $value;
		}

		return get_post_meta($post_id, 'btcpw_price', true) ?: get_option('btcpw_default_price');
	}

	public function generate_invoice_id($post_id, $order_id)
	{
		$amount = $this->calculate_price_for_invoice($post_id);

		$url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';

		$currency_scope = get_post_meta($post_id, 'btcpw_currency', true) ?: get_option('btcpw_default_currency', 'SATS');
		$currency = $currency_scope != 'SATS' ? $currency_scope : 'BTC';

		$data = array(
			'amount' => $amount,
			'currency' => $currency,
			'metadata' => array(
				'orderId' => $order_id,
				'itemDesc' => get_post_meta($post_id, 'btcpw_invoice_content', true)['title'],
				'buyer' => array(
					'name' => (string) $_SERVER['REMOTE_ADDR']
				)
			)
		);

		$args = array(
			'headers' => array(
				'Authorization' => 'token ' . get_option('btcpw_btcpay_auth_key_create'),
				'Content-Type' => 'application/json',
			),
			'body' => json_encode($data),
			'method' => 'POST',
			'timeout' => 60,
		);

		$response = wp_remote_request($url, $args);

		if (is_wp_error($response)) {
			return $response;
		}

		if ($response['response']['code'] != 200) {
			return new WP_Error($response['response']['code'], 'HTTP Error ' . $response['response']['code']);
		}

		$body = json_decode($response['body'], true);

		if (empty($body) || !empty($body['error'])) {
			return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
		}

		update_post_meta($order_id, 'btcpw_invoice_id', $body['id']);

		return array(
			'id' => $body['id'],
			'amount' => $body['amount'] . $body['currency']
		);
	}

	public function ajax_convert_currencies()
	{

		$url = 'https://api.coingecko.com/api/v3/exchange_rates';

		$args = array(
			'headers' => array(
				'Content-Type' => 'application/json',
			),
			'method' => 'GET',
			'timeout' => 10,
		);

		$response = wp_remote_request($url, $args);

		if (is_wp_error($response)) {
			return $response;
		}

		if ($response['response']['code'] != 200) {
			return new WP_Error($response['response']['code'], 'HTTP Error ' . $response['response']['code']);
		}

		$body = json_decode($response['body'], true);

		if (empty($body) || !empty($body['error'])) {
			return new WP_Error('converter_error', $body['error'] ?? 'Something went wrong');
		}

		wp_send_json_success(
			$body['rates'],
		);
	}

	public function ajax_tipping()
	{
		$collect = "Donor Information: \n";

		if (!empty($_POST['name'])) {
			$name = sanitize_text_field($_POST['name']);
			$collect .= "Name: {$name} \n";
		}
		if (!empty($_POST['email'])) {
			$email = sanitize_text_field($_POST['email']);
			$collect .= "Email: {$email} \n";
		}
		if (!empty($_POST['address'])) {
			$address = sanitize_text_field($_POST['address']);
			$collect .= "Address: {$address} \n";
		}
		if (!empty($_POST['phone'])) {
			$phone = sanitize_text_field($_POST['phone']);
			$collect .= "Phone: {$phone} \n";
		}
		if (!empty($_POST['message'])) {
			$message = sanitize_text_field($_POST['message']);
			$collect .= "Message: {$message} \n";
		}

		$currency = sanitize_text_field($_POST['currency']);
		$amount = sanitize_text_field($_POST['amount']);


		if (!empty($_POST['predefined_amount'])) {
			$extract = explode(' ', sanitize_text_field($_POST['predefined_amount']));
			$amount = $extract[0];
			$currency = $extract[1];
		}
		$storeId = get_option('btcpw_btcpay_store_id');
		$blogname = get_option('blogname');
		$siteurl = get_option('siteurl');
		$date = date('Y-m-d H:i:s', current_time('timestamp', 0));

		$collects = "\nWeblog title: {$blogname} \n";
		$collects .= "Website url: {$siteurl} \n";
		$collects .= "Date: {$date} \n";
		$collects .= "Amount: {$amount} {$currency} \n";
		$collects .= "Credit on Store ID: {$storeId} \n";
		$collects .= $collect;
		$type = sanitize_text_field($_POST['type']);
		$itemDesc = "\nType: {$type}\n";
		$itemDesc .= "Weblog title: {$blogname} \n";
		$itemDesc .= "Amount: {$amount} {$currency} \n";
		$url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';
		//'Donation from: ' . $_SERVER['REMOTE_ADDR']
		$data = array(
			'amount' => $amount,
			'currency' => $currency,
			'metadata' => array(
				'itemDesc' => $itemDesc,
				'donor' => $collects,
			)
		);
		$args = array(
			'headers' => array(
				'Authorization' => 'token ' . get_option('btcpw_btcpay_auth_key_create'),
				'Content-Type' => 'application/json',
			),
			'body' => json_encode($data),
			'method' => 'POST',
			'timeout' => 60,
		);

		$response = wp_remote_request($url, $args);

		if (is_wp_error($response)) {
			return $response;
		}

		if ($response['response']['code'] != 200) {
			return new WP_Error($response['response']['code'], 'HTTP Error ' . $response['response']['code']);
		}

		$body = json_decode($response['body'], true);

		if (empty($body) || !empty($body['error'])) {
			return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
		}

		wp_send_json_success([
			'invoice_id' => $body['id'],
			'donor' => $body['metadata']['donor'],
		]);
	}
	public function ajax_notify_administrator()
	{


		$admin = get_bloginfo('admin_email');
		$body = sanitize_text_field($_POST['donor_info']);

		wp_mail($admin, 'You have received a payment via BTCPayWall', $body);
	}
	/**
	 * @param $post_id
	 *
	 * @return int
	 * @throws Exception
	 */
	private function generate_order_id($post_id)
	{

		$order_id = wp_insert_post([
			'post_title' => 'Pay ' . $post_id . ' from ' . $_SERVER['REMOTE_ADDR'],
			'post_status' => 'publish',
			'post_type' => 'btcpw_order',
		]);

		update_post_meta($order_id, 'btcpw_status', 'waiting');
		update_post_meta($order_id, 'btcpw_post_id', $post_id);
		update_post_meta($order_id, 'btcpw_from_ip', $_SERVER['REMOTE_ADDR']);
		update_post_meta($order_id, 'btcpw_secret', bin2hex(random_bytes(5)));

		return $order_id;
	}

	/**
	 *
	 */
	public function ajax_paid_invoice()
	{

		if (empty($_POST['order_id'])) {
			wp_send_json_error();
		}

		$order_id = sanitize_text_field($_POST['order_id']);
		$post_id = get_post_meta($order_id, 'btcpw_post_id', true);
		$invoice_id = get_post_meta($order_id, 'btcpw_invoice_id', true);
		$secret = get_post_meta($order_id, 'btcpw_secret', true);
		$content_title = get_post_meta($post_id, 'btcpw_invoice_content', true)['title'];
		$store_id = get_option('btcpw_btcpay_store_id');


		if (empty($post_id) || empty($invoice_id)) {
			wp_send_json_error();
		}

		$url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices/' . $invoice_id;

		$args = array(
			'headers' => array(
				'Authorization' => 'token ' . get_option('btcpw_btcpay_auth_key_view'),
				'Content-Type' => 'application/json',
			),
			'method' => 'GET',
			'timeout' => 60,
		);

		$response = wp_remote_request($url, $args);

		if (is_wp_error($response)) {
			return $response;
		}

		if ($response['response']['code'] != 200) {
			return new WP_Error($response['response']['code'], 'HTTP Error ' . $response['response']['code']);
		}

		$body = json_decode($response['body'], true);

		if (empty($body) || !empty($body['error'])) {
			return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
		}
		$amount = sanitize_text_field($_POST['amount']);
		$storeId = get_option('btcpw_btcpay_store_id');
		$blogname = get_option('blogname');
		$siteurl = get_option('siteurl');
		$date = date('Y-m-d H:i:s', current_time('timestamp', 0));
		$message = "\nWeblog title: {$blogname} \n";
		$message .= "Website url: {$siteurl} \n";
		$message .= "Date: {$date} \n";
		$message .= "Amount: {$amount} \n";
		$message .= "Credit on Store ID: {$storeId} \n";
		$message .= "Type: $content_title \n";

		if ($body['status'] === 'Settled') {
			$cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);

			setcookie('btcpw_' . $post_id, $secret, $this->get_cookie_duration($post_id), $cookie_path);

			update_post_meta($order_id, 'btcpw_status', 'success');

			wp_send_json_success(['notify' => $message]);
		}
		wp_send_json_error(['message' => 'invoice is not paid']);
	}

	/**
	 * @param $post_id
	 *
	 * @return false|int
	 */
	public function get_cookie_duration($post_id)
	{

		$duration = get_post_meta($post_id, 'btcpw_duration', true);

		if (empty($duration)) {
			$duration = get_option('btcpw_default_duration');
		}

		$duration_type = get_post_meta($post_id, 'btcpw_duration_type', true);

		if (empty($duration_type)) {
			$duration_type = get_option('btcpw_default_duration_type');
		}

		return $duration_type === 'unlimited' ? strtotime("14 Jan 2038") : ($duration_type === 'onetime' ? 0 : strtotime("+{$duration} {$duration_type}"));
	}


	private function update_meta_settings($atts)
	{
		$valid_currency = in_array($atts['currency'], BTCPayWall_Admin::CURRENCIES);
		$valid_duration = in_array($atts['duration_type'], BTCPayWall_Admin::DURATIONS);
		$valid_btc_format = in_array($atts['btc_format'], BTCPayWall_Admin::BTC_FORMAT);


		if (!empty($atts['currency']) && $valid_currency) {
			update_post_meta(get_the_ID(), 'btcpw_currency', sanitize_text_field($atts['currency']));
		} else {
			delete_post_meta(get_the_ID(), 'btcpw_currency');
		}
		if ($atts['currency'] === 'SATS' && $valid_btc_format) {
			update_post_meta(get_the_ID(), 'btcpw_btc_format', sanitize_text_field($atts['btc_format']));
		} else {
			delete_post_meta(get_the_ID(), 'btcpw_btc_format');
		}
		if (!empty($atts['price'])) {
			update_post_meta(get_the_ID(), 'btcpw_price', sanitize_text_field($atts['price']));
		} else {
			delete_post_meta(get_the_ID(), 'btcpw_price');
		}
		if (!empty($atts['duration'])) {
			update_post_meta(get_the_ID(), 'btcpw_duration', sanitize_text_field($atts['duration']));
		} else {
			delete_post_meta(get_the_ID(), 'btcpw_duration');
		}
		if (!empty($atts['duration_type']) && $valid_duration) {
			update_post_meta(get_the_ID(), 'btcpw_duration_type', sanitize_text_field($atts['duration_type']));
		} else {
			delete_post_meta(get_the_ID(), 'btcpw_duration_type');
		}
	}
	/**
	 * @param array $atts
	 *
	 * @return false|string
	 */
	public function render_shortcode_btcpw_start_content($atts)
	{

		$atts = shortcode_atts(array(
			'pay_block' => 'false',
			'btc_format' => '',
			'price' => '',
			'currency' => '',
			'duration' => '',
			'duration_type' => '',
		), $atts);


		$this->update_meta_settings($atts);

		$invoice_content = array('title' => 'Pay-per-post: ' . get_the_title(get_the_ID()), 'project' => 'post');
		update_post_meta(get_the_ID(), 'btcpw_invoice_content', $invoice_content);

		$s_data = '<!-- btcpw:start_content -->';

		$payblock = filter_var($atts['pay_block'], FILTER_VALIDATE_BOOLEAN);

		if ($payblock) {
			return do_shortcode('[btcpw_pay_block]') . $s_data;
		}
	}

	/**
	 * @param $atts
	 *
	 * @return false|string
	 */

	public function render_shortcode_btcpw_start_video($atts)
	{
		$img_preview = plugin_dir_url(__FILE__) . 'img/preview.png';

		$atts = shortcode_atts(array(
			'pay_view_block' => 'false',
			'btc_format' => '',
			'title' => 'Untitled',
			'description' => 'No description',
			'preview' => $img_preview,
			'currency' => '',
			'price' => '',
			'duration' => '',
			'duration_type' => ''
		), $atts);

		$this->update_meta_settings($atts);

		$invoice_content = array('title' => 'Pay-per-view: ' . sanitize_text_field($atts['title']), 'project' => 'video');
		update_post_meta(get_the_ID(), 'btcpw_invoice_content', $invoice_content);

		$payblock = filter_var($atts['pay_view_block'], FILTER_VALIDATE_BOOLEAN);


		$s_data = '<!-- btcpw:start_content -->';

		if ($payblock) {
			return do_shortcode("[btcpw_pay_video_block title='{$atts['title']}' description='{$atts['description']}' preview='{$atts['preview']}']") . $s_data;
		}
	}

	/**
	 * @param $atts
	 *
	 * @return false|string
	 */
	public function render_shortcode_btcpw_file($atts)
	{
		$img_preview = plugin_dir_url(__FILE__) . 'img/file_preview.png';

		$atts = shortcode_atts(array(
			'pay_file_block' => 'false',
			'btc_format' => '',
			'file' => '',
			'title' => 'Untitled',
			'description' => 'No description',
			'preview' => $img_preview,
			'currency' => '',
			'price' => '',
			'duration' => '',
			'duration_type' => ''
		), $atts);

		$this->update_meta_settings($atts);

		$invoice_content = array('title' => 'Pay-per-file: ' . sanitize_text_field($atts['title']), 'project' => 'file');

		update_post_meta(get_the_ID(), 'btcpw_invoice_content', $invoice_content);

		$payblock = (filter_var($atts['pay_file_block'], FILTER_VALIDATE_BOOLEAN));
		$file = !empty($atts['file']);

		$required_attributes = $payblock && $file;

		$s_data = '<!-- btcpw:start_content -->';
		$e_data = '<!-- /btcpw:end_content -->';

		if ($required_attributes) {
			$output = do_shortcode("[btcpw_pay_file_block title='{$atts['title']}' description='{$atts['description']}' preview='{$atts['preview']}']");
			$output .= $s_data;
			$output .= do_shortcode("[btcpw_protected_file file='{$atts['file']}']");
			$output .= $e_data;
			return $output;
		}

		return do_shortcode("[btcpw_protected_file file='{$atts['file']}']");
	}
	/**
	 * @param array $atts
	 *
	 * @return string
	 */
	public function render_shortcode_btcpw_end_content($atts)
	{

		return '<!-- /btcpw:end_content -->';
	}

	/**
	 * @param $atts
	 *
	 * @return false|string
	 */
	public function render_shortcode_btcpw_pay_block($atts)
	{
		if ($this->is_paid_content()) {
			return '';
		}

		ob_start();

		include 'partials/btc-pay-block.php';

		return ob_get_clean();
	}

	/**
	 * @param $atts
	 *
	 * @return string
	 */
	public function render_shortcode_btcpw_pay_view_block($atts)
	{
		if ($this->is_paid_content()) {
			return '';
		}

		$atts = shortcode_atts(array(
			'title' => '',
			'description' => '',
			'preview' => '',
		), $atts);

		$image = wp_get_attachment_image_src($atts['preview']);

		$preview_url = $image ? $image[0] : $atts['preview'];

		ob_start();

?>
		<div class="btcpw_pay">
			<div class="btcpw_pay__preview">
				<h2><?php echo esc_html($atts['title']); ?></h2>
				<p><?php echo esc_html($atts['description']); ?></p>
				<img src=<?php echo esc_url($preview_url); ?> alt="Video preview">
			</div>
			<div class="btcpw_pay__content">
				<h2><?php echo BTCPayWall_Public::get_payblock_header_string() ?></h2>
				<p>
					<?php echo BTCPayWall_Public::get_post_info_string() ?>
				</p>
			</div>
			<div class="btcpw_pay__footer">
				<div>
					<button type="button" id="btcpw_pay__button" data-post_id="<?php echo get_the_ID(); ?>"><?php echo BTCPayWall_Public::get_payblock_button_string() ?></button>
				</div>
				<div class="btcpw_pay__loading">
					<p class="loading"></p>
				</div>
				<div class="btcpw_help">
					<a class="btcpw_help__link" href="https://lightning-paywall.coincharge.io/how-to-pay-the-lightning-paywall/" target="_blank">Help</a>
				</div>
			</div>
		</div>
	<?php


		return ob_get_clean();
	}
	/**
	 * @param $atts
	 *
	 * @return string
	 */
	public function render_shortcode_protected_file($atts)
	{

		$atts = shortcode_atts(array(
			'file' => ''
		), $atts);

		$href = $atts['file'];

		if (function_exists('vc_build_link')) {
			$href = vc_build_link($atts['file'])['url'] ?: $atts['file'];
		}
		ob_start();
	?>

		<a class="btcpw_pay__download" href=<?php echo esc_url($href) ?> target="_blank" download>Download</a>

	<?php


		return ob_get_clean();
	}
	public function render_shortcode_btcpw_pay_file_block($atts)
	{
		if ($this->is_paid_content()) {
			return '';
		}

		$atts = shortcode_atts(array(
			'title' => '',
			'description' => '',
			'preview' => '',
		), $atts);

		$image = wp_get_attachment_image_src($atts['preview']);

		$preview_url = $image ? $image[0] : $atts['preview'];

		ob_start();

	?>
		<div class="btcpw_pay">
			<div class="btcpw_pay__preview">
				<h2><?php echo esc_html($atts['title']); ?></h2>
				<p><?php echo esc_html($atts['description']); ?></p>
				<img src=<?php echo esc_url($preview_url); ?> alt="Video preview">
			</div>
			<div class="btcpw_pay__content">
				<h2><?php echo BTCPayWall_Public::get_payblock_header_string() ?></h2>
				<p>
					<?php echo BTCPayWall_Public::get_post_info_string() ?>
				</p>
			</div>
			<div class="btcpw_pay__footer">
				<div>
					<button type="button" id="btcpw_pay__button" data-post_id="<?php echo get_the_ID(); ?>"><?php echo BTCPayWall_Public::get_payblock_button_string() ?></button>
				</div>
				<div class="btcpw_pay__loading">
					<p class="loading"></p>
				</div>
				<div class="btcpw_help">
					<a class="btcpw_help__link" href="https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/" target="_blank">Help</a>
				</div>
			</div>
		</div>
	<?php


		return ob_get_clean();
	}


	public static function display_is_enabled($arr)
	{

		if (!is_array($arr)) {
			return;
		}

		foreach ($arr as $key => $value) {
			if ($arr[$key]['display'] === true) {
				return true;
			}
		}
		return false;
	}
	/**
	 * @param $atts
	 *
	 * @return string
	 */
	public function displayShortcodeList($atts)
	{
		$atts = shortcode_atts(array(
			'shortcode' => ''
		), $atts);
		$trimmed = trim($atts['shortcode'], "`{}`");
		return do_shortcode("[{$trimmed}]");
	}

	/**
	 * @param $atts
	 *
	 * @return string
	 */
	public function render_shortcode_box_tipping($atts)
	{

		global $wpdb;
		$id = !empty($atts['id']) ? intval($atts['id']) : null;
		$table_name = "{$wpdb->prefix}btc_forms";
		$result = $wpdb->get_results(
			$wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id),
			ARRAY_A
		);

		$atts = shortcode_atts(array(
			'dimension' => $id ? $result[0]['dimension'] : '250x300',
			'title' => $id ? $result[0]['title_text'] : 'Support my work',
			'description' => $id ? $result[0]['description_text'] : '',
			'currency' => $id ? $result[0]['currency'] : 'SATS',
			'background_color' => $id ? '#' . $result[0]['background_color'] : '#E6E6E6',
			'title_text_color' =>  $id ? '#' . $result[0]['title_text_color'] : '#ffffff',
			'tipping_text' => $id ? $result[0]['tipping_text'] : 'Enter Tipping Amount',
			'tipping_text_color' => $id ? '#' . $result[0]['tipping_text_color'] : '#000000',
			'redirect' => $id ? $result[0]['redirect'] : false,
			'description_color' => $id ? '#' . $result[0]['description_text_color'] : '#000000',
			'button_text' => $id ? $result[0]['button_text'] : 'Tipping now',
			'button_text_color' => $id ? '#' . $result[0]['button_text_color'] : '#FFFFFF',
			'button_color' => $id ? '#' . $result[0]['button_color'] : '#FE642E',
			'logo_id' => $id ? $result[0]['logo'] : 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg',
			'background_id' => $id ? $result[0]['background'] : '',
			'input_background' => $id ? '#' . $result[0]['input_background'] : '#ffa500',
			'background' => $id ? '#' . $result[0]['hf_background'] : '#1d5aa3',
			'widget' => 'false',
		), $atts);

		$dimension = explode('x', ($atts['dimension'] == '250x300' ? '250x300' : '300x300'));

		$supported_currencies = BTCPayWall_Admin::TIPPING_CURRENCIES;
		$logo = wp_get_attachment_image_src($atts['logo_id']) ? wp_get_attachment_image_src($atts['logo_id'])[0] : $atts['logo_id'];
		$background = wp_get_attachment_image_src($atts['background_id']) ? wp_get_attachment_image_src($atts['background_id'])[0] : $atts['background_id'];

		$is_widget = $atts['widget'] === 'true' ? 'btcpw_widget' : '';

		ob_start();
	?>

		<style>
			.btcpw_tipping_box_container {
				background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
									?>;
				width: <?php echo esc_html($dimension[0]) . 'px !important';
						?>;
				height: <?php echo esc_html($dimension[1]) . 'px !important';
						?>;
				background-image: url(<?php echo ($background ? esc_html($background) : '');
										?>);

			}


			#btcpw_tipping__button {
				color: <?php echo esc_html($atts['button_text_color']);
						?>;
				background: <?php echo esc_html($atts['button_color']);
							?>;
			}

			#tipping_form_box fieldset div.btcpw_tipping_box_header_container div h6 {
				color: <?php echo esc_html($atts['title_text_color']);
						?>
			}



			.btcpw_tipping_box_header_container,
			#button {
				background-color: <?php echo esc_html($atts['background']);
									?>;
			}

			#tipping_form_box fieldset div p {
				color: <?php echo esc_html($atts['description_color']);
						?>
			}

			#tipping_form_box fieldset h6 {
				color: <?php echo esc_html($atts['tipping_text_color']);
						?>
			}

			.btcpw_tipping_free_input {
				background-color: <?php echo esc_html($atts['input_background']);
									?>;
			}
		</style>

		<div id="btcpw_page">
			<div class="btcpw_tipping_box_container">

				<form method="POST" action="" id="tipping_form_box">
					<fieldset>
						<div class="btcpw_tipping_box_header_container">
							<?php if ($logo) : ?>
								<div id="btcpw_box_logo_wrap">
									<img alt="Tipping logo" src="<?php echo esc_url($logo); ?>" />
								</div>
							<?php endif; ?>

							<div>
								<?php if (!empty($atts['title'])) : ?>
									<h6><?php echo esc_html($atts['title']); ?></h6>
								<?php endif; ?>
								<?php if (!empty($atts['description'])) : ?>
									<p><?php echo esc_html($atts['description']); ?></p>
								<?php endif; ?>
							</div>

						</div>
						<h6><?php echo (!empty($atts['tipping_text']) ? $atts['tipping_text'] : ''); ?></h6>
						<div class="btcpw_tipping_box_amount">

							<div class="<?php echo "btcpw_tipping_free_input {$is_widget}"; ?>">
								<input type="number" id="btcpw_tipping_amount" name="btcpw_tipping_amount" placeholder="0.00" required />


								<select required name="btcpw_tipping_currency" id="btcpw_tipping_currency">
									<option disabled value="">Select currency</option>
									<?php foreach ($supported_currencies as $currency) : ?>
										<option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
											<?php echo $currency; ?>
										</option>
									<?php endforeach; ?>
								</select>
								<i class="fas fa-arrows-alt-v"></i>

							</div>
							<div class="btcpw_tipping_converted_values">
								<input type="text" id="btcpw_converted_amount" name="btcpw_converted_amount" readonly />
								<input type="text" id="btcpw_converted_currency" name="btcpw_converted_currency" readonly />
							</div>
						</div>
						<input type="hidden" id="btcpw_redirect_link" name="btcpw_redirect_link" value=<?php echo $atts['redirect']; ?> />
						<div id="button">

							<button type="submit" id="btcpw_tipping__button"><?php echo (!empty($atts['button_text']) ? esc_html($atts['button_text']) : 'Tip'); ?></button>
						</div>
					</fieldset>

				</form>
			</div>
			<div id="powered_by_box">
				<p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
			</div>
		</div>
	<?php

		return ob_get_clean();
	}

	/**
	 * @param $atts
	 *
	 * @return string
	 */
	public static function getCollect($atts)
	{
		return array(
			array(
				'id' => 'name',
				'label' => 'Full name' .  (filter_var($atts['mandatory_name'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
				'display' => filter_var($atts['display_name'], FILTER_VALIDATE_BOOLEAN),
				'mandatory' => filter_var($atts['mandatory_name'], FILTER_VALIDATE_BOOLEAN)
			),
			array(
				'id' => 'email',
				'label' => 'Email' .  (filter_var($atts['mandatory_email'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
				'display' => filter_var($atts['display_email'], FILTER_VALIDATE_BOOLEAN),
				'mandatory' => filter_var($atts['mandatory_email'], FILTER_VALIDATE_BOOLEAN)
			),
			array(
				'id' => 'address',
				'label' => 'Address' .  (filter_var($atts['mandatory_address'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
				'display' => filter_var($atts['display_address'], FILTER_VALIDATE_BOOLEAN),
				'mandatory' => filter_var($atts['mandatory_address'], FILTER_VALIDATE_BOOLEAN)
			),
			array(
				'id' => 'phone',
				'label' => 'Phone' .  (filter_var($atts['mandatory_phone'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
				'display' => filter_var($atts['display_phone'], FILTER_VALIDATE_BOOLEAN),
				'mandatory' => filter_var($atts['mandatory_phone'], FILTER_VALIDATE_BOOLEAN)
			),
			array(
				'id' => 'message',
				'label' => 'Message' .  (filter_var($atts['mandatory_message'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
				'display' => filter_var($atts['display_message'], FILTER_VALIDATE_BOOLEAN),
				'mandatory' => filter_var($atts['mandatory_message'], FILTER_VALIDATE_BOOLEAN)
			),
		);
	}

	/**
	 * @param $atts
	 *
	 * @return string
	 */
	public static function getFixedAmount($atts)
	{
		return array(
			'value_1' => array(
				'enabled' => (filter_var($atts['value1_enabled'], FILTER_VALIDATE_BOOLEAN)),
				'currency' => in_array($atts['value1_currency'], BTCPayWall_Admin::TIPPING_CURRENCIES) === true ? $atts['value1_currency'] : 'SATS',
				'amount' => esc_html($atts['value1_amount']),
				'icon' => esc_html($atts['value1_icon'])
			),
			'value_2' => array(
				'enabled' => (filter_var($atts['value2_enabled'], FILTER_VALIDATE_BOOLEAN)),
				'currency' => in_array($atts['value2_currency'], BTCPayWall_Admin::TIPPING_CURRENCIES) === true ? $atts['value2_currency'] : 'SATS',
				'amount' => esc_html($atts['value2_amount']),
				'icon' => esc_html($atts['value2_icon'])
			),
			'value_3' => array(
				'enabled' => (filter_var($atts['value3_enabled'], FILTER_VALIDATE_BOOLEAN)),
				'currency' => in_array($atts['value3_currency'], BTCPayWall_Admin::TIPPING_CURRENCIES) === true ? $atts['value3_currency'] : 'SATS',
				'amount' => esc_html($atts['value3_amount']),
				'icon' => esc_html($atts['value3_icon'])
			),
		);
	}


	/**
	 * @param $atts
	 *
	 * @return string
	 */
	public function render_shortcode_banner_wide_tipping($atts)
	{

		global $wpdb;
		$id = !empty($atts['id']) ? intval($atts['id']) : null;
		$table_name = "{$wpdb->prefix}btc_forms";
		$result = $wpdb->get_results(
			$wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id),
			ARRAY_A
		);
		$atts = shortcode_atts(array(
			'dimension' => $id ? $result[0]['dimension'] : '600x200',
			'title' => $id ? $result[0]['title_text'] : 'Support my work',
			'description' => $id ? $result[0]['description_text'] : '',
			'currency' => $id ? $result[0]['currency'] : 'SATS',
			'background_color' => $id ? '#' . $result[0]['background_color'] : '#E6E6E6',
			'title_text_color' =>  $id ? '#' . $result[0]['title_text_color'] : '#ffffff',
			'tipping_text' => $id ? $result[0]['tipping_text'] : 'Enter Tipping Amount',
			'tipping_text_color' => $id ? '#' . $result[0]['tipping_text_color'] : '#000000',
			'redirect' => $id ? $result[0]['redirect'] : '',
			'description_color' => $id ? '#' . $result[0]['description_text_color'] : '#000000',
			'button_text' => $id ? $result[0]['button_text'] : 'Tipping now',
			'button_text_color' => $id ? '#' . $result[0]['button_text_color'] : '#FFFFFF',
			'button_color' => $id ? '#' . $result[0]['button_color'] : '#FE642E',
			'logo_id' => $id ? $result[0]['logo'] : 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg',
			'background_id' => $id ? $result[0]['background'] : '',
			'free_input' => $id ? filter_var($result[0]['free_input'], FILTER_VALIDATE_BOOLEAN) : true,
			'input_background' => $id ? '#' . $result[0]['input_background'] : '#ffa500',
			'background' => $id ? '#' . $result[0]['hf_background'] : '#1d5aa3',
			'value1_enabled' => $id ? filter_var($result[0]['value1_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
			'value1_amount' => $id ? round($result[0]['value1_amount'], 0) : 1000,
			'value1_currency' => $id ? $result[0]['value1_currency'] : 'SATS',
			'value1_icon' => $id ? $result[0]['value1_icon'] : 'fas fa-coffee',
			'value2_enabled' => $id ? filter_var($result[0]['value2_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
			'value2_amount' => $id ? round($result[0]['value2_amount'], 0) : 2000,
			'value2_currency' => $id ? $result[0]['value2_currency'] : 'SATS',
			'value2_icon' => $id ? $result[0]['value2_icon'] : 'fas fa-beer',
			'value3_enabled' => $id ? filter_var($result[0]['value3_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
			'value3_amount' => $id ? round($result[0]['value3_amount'], 0) : 3000,
			'value3_currency' => $id ? $result[0]['value3_currency'] : 'SATS',
			'value3_icon' => $id ? $result[0]['value3_icon'] : 'fas fa-cocktail',
			'display_name' => $id ? filter_var($result[0]['collect_name'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_name' => $id ? filter_var($result[0]['mandatory_name'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_email' => $id ? filter_var($result[0]['collect_email'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_email' => $id ? filter_var($result[0]['mandatory_email'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_phone' => $id ? filter_var($result[0]['collect_phone'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_phone' => $id ? filter_var($result[0]['mandatory_phone'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_address' => $id ? filter_var($result[0]['collect_address'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_address' => $id ? filter_var($result[0]['mandatory_address'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_message' => $id ? filter_var($result[0]['collect_message'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_message' => $id ? filter_var($result[0]['mandatory_message'], FILTER_VALIDATE_BOOLEAN) : false,
			'show_icon'	=> $id ? filter_var($result[0]['show_icon'], FILTER_VALIDATE_BOOLEAN) : true,
			'widget'	=> false
		), $atts);

		$dimension = explode('x', '600x200');
		$supported_currencies = BTCPayWall_Admin::TIPPING_CURRENCIES;
		$logo = wp_get_attachment_image_src($atts['logo_id']) ? wp_get_attachment_image_src($atts['logo_id'])[0] : $atts['logo_id'];
		$background = wp_get_attachment_image_src($atts['background_id']) ? wp_get_attachment_image_src($atts['background_id'])[0] : $atts['background_id'];
		$collect = BTCPayWall_Public::getCollect($atts);
		$collect_data = BTCPayWall_Public::display_is_enabled($collect);
		$fixed_amount = BTCPayWall_Public::getFixedAmount($atts);
		$first_enabled = array_column($fixed_amount, 'enabled');
		$d = array_search('true', $first_enabled);
		$index = 'value' . ($d + 1);

		ob_start();
	?>
		<style>
			.btcpw_skyscraper_tipping_container.wide {
				background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
									?>;
				background-image: url(<?php echo ($background ? esc_html($background) : '');
										?>);
			}

			.btcpw_skyscraper_banner.wide {
				background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
									?>;
				background-image: url(<?php echo ($background ? esc_html($background) : '');
										?>);
			}

			.btcpw_skyscraper_header_container.wide,
			#btcpw_skyscraper_wide_button,
			#btcpw_skyscraper_wide_button>div:nth-child(1)>input {
				background-color: <?php echo esc_html($atts['background']);
									?>;
			}

			#btcpw_skyscraper_tipping_wide_button,
			#btcpw_skyscraper_wide_button>div>input.skyscraper-next-form {
				color: <?php echo esc_html($atts['button_text_color']);
						?>;
				background: <?php echo esc_html($atts['button_color']);
							?>;
			}

			.btcpw_skyscraper_header_container.wide h6 {
				color: <?php echo esc_html($atts['title_text_color']);
						?>
			}

			div.btcpw_skyscraper_banner.wide>div.btcpw_skyscraper_header_container.wide p {
				color: <?php echo esc_html($atts['description_color']);
						?>
			}

			#skyscraper_tipping_wide_form>fieldset h6 {
				color: <?php echo esc_html($atts['tipping_text_color']);
						?>
			}

			.btcpw_skyscraper_amount_value_1.wide,
			.btcpw_skyscraper_amount_value_2.wide,
			.btcpw_skyscraper_amount_value_3.wide,
			.btcpw_skyscraper_tipping_free_input.wide {
				background: <?php echo esc_html($atts['input_background']);
							?>;

			}
		</style>
		<div id="btcpw_page">
			<div class="btcpw_skyscraper_banner wide">
				<div class="btcpw_skyscraper_header_container wide">
					<?php if ($logo) : ?>
						<div id="<?php echo "btcpw_skyscraper_logo_wrap_wide"; ?>">
							<img alt="Tipping logo" src=<?php echo esc_url($logo); ?> />
						</div>
					<?php endif; ?>
					<div>
						<?php if (!empty($atts['title'])) : ?>
							<h6><?php echo esc_html($atts['title']); ?></h6>
						<?php endif; ?>
						<?php if (!empty($atts['description'])) : ?>
							<p><?php echo esc_html($atts['description']); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="btcpw_skyscraper_tipping_container wide">
					<form method="POST" action="" id="<?php echo "skyscraper_tipping_wide_form"; ?>">
						<fieldset>
							<h6><?php echo (!empty($atts['tipping_text']) ? esc_html($atts['tipping_text']) : ''); ?>
							</h6>
							<div class="btcpw_skyscraper_amount wide">
								<?php foreach ($fixed_amount as $key => $value) : ?>

									<?php if ($fixed_amount[$key]['enabled'] === true) : ?>
										<div class="<?php echo trim('btcpw_skyscraper_amount_' . $key . ' ' . 'wide'); ?>">
											<div>
												<input type="radio" class="btcpw_skyscraper_tipping_default_amount wide" id="<?php echo $key . '_wide'; ?>" name="<?php echo "btcpw_skyscraper_tipping_default_amount_wide"; ?>" <?php echo $key == $index ? 'required' : ''; ?> value="<?php echo esc_html($fixed_amount[$key]['amount'] . ' ' . $fixed_amount[$key]['currency']); ?>">
												<?php if (!empty($fixed_amount[$key]['amount'])) : ?>
													<?php if (true == $atts['show_icon']) : ?>
														<i class="<?php echo esc_html($fixed_amount[$key]['icon']); ?>"></i>
													<?php endif; ?>
												<?php endif; ?>
											</div>
											<label for="<?php echo $key; ?>"><?php echo esc_html($fixed_amount[$key]['amount'] . ' ' . $fixed_amount[$key]['currency']); ?></label>

										</div>
									<?php endif; ?>

								<?php endforeach; ?>
								<?php if (true == $atts['free_input']) : ?>
									<div class="<?php echo trim("btcpw_skyscraper_tipping_free_input wide"); ?>">
										<input type="number" id="<?php echo "btcpw_skyscraper_tipping_wide_amount"; ?>" name="<?php echo "btcpw_skyscraper_tipping_amount_wide"; ?>" placeholder="0.00" required />


										<select required name="<?php echo "btcpw_skyscraper_tipping_currency_wide"; ?>" id="<?php echo "btcpw_skyscraper_tipping_wide_currency"; ?>">
											<option disabled value="">Select currency</option>
											<?php foreach ($supported_currencies as $currency) : ?>
												<option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
													<?php echo $currency; ?>
												<?php endforeach; ?>
										</select>
										<i class="fas fa-arrows-alt-v"></i>

									</div>
								<?php endif; ?>
							</div>
							<div class="btcpw_skyscraper_tipping_converted_values wide">
								<input type="text" id="<?php echo "btcpw_skyscraper_wide_converted_amount"; ?>" name="<?php echo "btcpw_skyscraper_converted_amount_wide"; ?>" readonly />
								<input type="text" id="<?php echo "btcpw_skyscraper_wide_converted_currency"; ?>" name="<?php echo "btcpw_skyscraper_converted_currency_wide"; ?>" readonly />
							</div>


							<div class="<?php echo "btcpw_skyscraper_button wide"; ?>" id="btcpw_skyscraper_wide_button">
								<input type="hidden" id="<?php echo "btcpw_skyscraper_redirect_link_wide"; ?>" name="<?php echo "btcpw_skyscraper_redirect_link_wide"; ?>" value="<?php echo esc_attr($atts['redirect']); ?>" />
								<?php if (true === $collect_data) : ?>

									<div>
										<input type="button" name="next" class="<?php echo "skyscraper-next-form wide"; ?>" value="Continue">
									</div>

								<?php else : ?>
									<div>
										<button type="submit" id="btcpw_skyscraper_tipping_wide_button"><?php echo (!empty($atts['button_text']) ? esc_html($atts['button_text']) : 'Tip'); ?></button>
									</div>
								<?php endif; ?>
							</div>

						</fieldset>
						<?php if ($collect_data === true) : ?>
							<fieldset>
								<div class="<?php echo ltrim("btcpw_skyscraper_donor_information wide"); ?>">
									<?php foreach ($collect as $key => $value) : ?>
										<?php if ($collect[$key]['display'] === true) : ?>
											<div class="<?php echo "btcpw_skyscraper_tipping_donor_{$collect[$key]['id']}_wrap wide"; ?>">

												<input type="text" placeholder="<?php echo $collect[$key]['label']; ?>" id="<?php echo "btcpw_skyscraper_tipping_donor_{$collect[$key]['id']}_wide"; ?>" name="<?php echo "btcpw_skyscraper_tipping_donor_{$collect[$key]['id']}_wide"; ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

											</div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div class="<?php echo "btcpw_skyscraper_button wide"; ?>" id="btcpw_skyscraper_wide_button">
									<div>
										<input type="button" name="previous" class="<?php echo ("skyscraper-previous-form wide"); ?>" value="< Previous" />
									</div>
									<div>
										<button type="submit" id="btcpw_skyscraper_tipping_wide_button"><?php echo (!empty($atts['button_text']) ? esc_html($atts['button_text']) : 'Tip'); ?></button>
									</div>
								</div>
							</fieldset>
						<?php endif; ?>
					</form>
				</div>
			</div>
			<div id="powered_by_skyscraper">
				<p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
			</div>
		</div>
	<?php

		return ob_get_clean();
	}
	/**
	 * @param $atts
	 *
	 * @return string
	 */
	public function render_shortcode_banner_high_tipping($atts)
	{

		global $wpdb;
		$id = !empty($atts['id']) ? intval($atts['id']) : null;
		$table_name = "{$wpdb->prefix}btc_forms";
		$result = $wpdb->get_results(
			$wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id),
			ARRAY_A
		);
		$atts = shortcode_atts(array(
			'dimension' => $id ? $result[0]['dimension'] : '200x710',
			'title' => $id ? $result[0]['title_text'] : 'Support my work',
			'description' => $id ? $result[0]['description_text'] : '',
			'currency' => $id ? $result[0]['currency'] : 'SATS',
			'background_color' => $id ? '#' . $result[0]['background_color'] : '#E6E6E6',
			'title_text_color' =>  $id ? '#' . $result[0]['title_text_color'] : '#ffffff',
			'tipping_text' => $id ? $result[0]['tipping_text'] : 'Enter Tipping Amount',
			'tipping_text_color' => $id ? '#' . $result[0]['tipping_text_color'] : '#000000',
			'redirect' => $id ? $result[0]['redirect'] : '',
			'description_color' => $id ? '#' . $result[0]['description_text_color'] : '#000000',
			'button_text' => $id ? $result[0]['button_text'] : 'Tipping now',
			'button_text_color' => $id ? '#' . $result[0]['button_text_color'] : '#FFFFFF',
			'button_color' => $id ? '#' . $result[0]['button_color'] : '#FE642E',
			'logo_id' => $id ? $result[0]['logo'] : 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg',
			'background_id' => $id ? $result[0]['background'] : '',
			'free_input' => $id ? filter_var($result[0]['free_input'], FILTER_VALIDATE_BOOLEAN) : true,
			'input_background' => $id ? '#' . $result[0]['input_background'] : '#ffa500',
			'background' => $id ? '#' . $result[0]['hf_background'] : '#1d5aa3',
			'value1_enabled' => $id ? filter_var($result[0]['value1_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
			'value1_amount' => $id ? round($result[0]['value1_amount'], 0) : 1000,
			'value1_currency' => $id ? $result[0]['value1_currency'] : 'SATS',
			'value1_icon' => $id ? $result[0]['value1_icon'] : 'fas fa-coffee',
			'value2_enabled' => $id ? filter_var($result[0]['value2_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
			'value2_amount' => $id ? round($result[0]['value2_amount'], 0) : 2000,
			'value2_currency' => $id ? $result[0]['value2_currency'] : 'SATS',
			'value2_icon' => $id ? $result[0]['value2_icon'] : 'fas fa-beer',
			'value3_enabled' => $id ? filter_var($result[0]['value3_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
			'value3_amount' => $id ? round($result[0]['value3_amount'], 0) : 3000,
			'value3_currency' => $id ? $result[0]['value3_currency'] : 'SATS',
			'value3_icon' => $id ? $result[0]['value3_icon'] : 'fas fa-cocktail',
			'display_name' => $id ? filter_var($result[0]['collect_name'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_name' => $id ? filter_var($result[0]['mandatory_name'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_email' => $id ? filter_var($result[0]['collect_email'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_email' => $id ? filter_var($result[0]['mandatory_email'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_phone' => $id ? filter_var($result[0]['collect_phone'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_phone' => $id ? filter_var($result[0]['mandatory_phone'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_address' => $id ? filter_var($result[0]['collect_address'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_address' => $id ? filter_var($result[0]['mandatory_address'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_message' => $id ? filter_var($result[0]['collect_message'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_message' => $id ? filter_var($result[0]['mandatory_message'], FILTER_VALIDATE_BOOLEAN) : false,
			'show_icon'	=> $id ? filter_var($result[0]['show_icon'], FILTER_VALIDATE_BOOLEAN) : true,
			'widget'	=> false
		), $atts);


		$supported_currencies = BTCPayWall_Admin::TIPPING_CURRENCIES;
		$logo = wp_get_attachment_image_src($atts['logo_id']) ? wp_get_attachment_image_src($atts['logo_id'])[0] : $atts['logo_id'];
		$background = wp_get_attachment_image_src($atts['background_id']) ? wp_get_attachment_image_src($atts['background_id'])[0] : $atts['background_id'];
		$collect = BTCPayWall_Public::getCollect($atts);
		$collect_data = BTCPayWall_Public::display_is_enabled($collect);
		$fixed_amount = BTCPayWall_Public::getFixedAmount($atts);
		$first_enabled = array_column($fixed_amount, 'enabled');
		$d = array_search('true', $first_enabled);
		$index = 'value' . ($d + 1);

		ob_start();
	?>
		<style>
			.btcpw_skyscraper_tipping_container.high {
				background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
									?>;
				background-image: url(<?php echo ($background ? esc_html($background) : '');
										?>);
			}


			.btcpw_skyscraper_amount_value_1.high,
			.btcpw_skyscraper_amount_value_2.high,
			.btcpw_skyscraper_amount_value_3.high,
			.btcpw_skyscraper_tipping_free_input.high {
				background-color: <?php echo esc_html($atts['input_background']);
									?>;
			}

			.btcpw_skyscraper_header_container.high,
			#btcpw_skyscraper_high_button,
			#btcpw_skyscraper_high_button>div:nth-child(1)>input {
				background-color: <?php echo esc_html($atts['background']);
									?>;
			}

			#btcpw_skyscraper_tipping_high_button,
			#btcpw_skyscraper_high_button>div>input.skyscraper-next-form {
				color: <?php echo esc_html($atts['button_text_color']);
						?>;
				background: <?php echo esc_html($atts['button_color']);
							?>;
			}

			.btcpw_skyscraper_header_container.high h6 {
				color: <?php echo esc_html($atts['title_text_color']);
						?>
			}


			div.btcpw_skyscraper_banner.high>div.btcpw_skyscraper_header_container.high p {
				color: <?php echo esc_html($atts['description_color']);
						?>
			}

			#skyscraper_tipping_high_form>fieldset h6 {
				color: <?php echo esc_html($atts['tipping_text_color']);
						?>
			}
		</style>
		<div id="btcpw_page">
			<div class="btcpw_skyscraper_banner high">
				<div class="btcpw_skyscraper_header_container high">
					<?php if ($logo) : ?>
						<div id="btcpw_skyscraper_logo_wrap_high">
							<img alt="Tipping logo" src=<?php echo esc_url($logo); ?> />
						</div>
					<?php endif; ?>
					<div>
						<?php if (!empty($atts['title'])) : ?>
							<h6><?php echo esc_html($atts['title']); ?></h6>
						<?php endif; ?>
						<?php if (!empty($atts['description'])) : ?>
							<p><?php echo esc_html($atts['description']); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="btcpw_skyscraper_tipping_container high">
					<form method="POST" action="" id="skyscraper_tipping_high_form">
						<fieldset>
							<h6><?php echo (!empty($atts['tipping_text']) ? esc_html($atts['tipping_text']) : ''); ?>
							</h6>
							<div class="btcpw_skyscraper_amount high">
								<?php foreach ($fixed_amount as $key => $value) : ?>

									<?php if ($fixed_amount[$key]['enabled'] === true) : ?>
										<div class="<?php echo 'btcpw_skyscraper_amount_' . $key . ' ' . 'high'; ?>">
											<div>
												<input type="radio" class="<?php echo trim("btcpw_skyscraper_tipping_default_amount high"); ?>" id="<?php echo $key . '_high'; ?>" name="<?php echo "btcpw_skyscraper_tipping_default_amount_high"; ?>" <?php echo $key == $index ? 'required' : ''; ?> value="<?php echo esc_html($fixed_amount[$key]['amount'] . ' ' . $fixed_amount[$key]['currency']); ?>">
												<?php if (!empty($fixed_amount[$key]['amount'])) : ?>
													<?php if (true == $atts['show_icon']) : ?>
														<i class="<?php echo esc_html($fixed_amount[$key]['icon']); ?>"></i>
													<?php endif; ?>
												<?php endif; ?>
											</div>
											<label for="<?php echo $key; ?>"><?php echo esc_html($fixed_amount[$key]['amount'] . ' ' . $fixed_amount[$key]['currency']); ?></label>

										</div>
									<?php endif; ?>

								<?php endforeach; ?>
								<?php if (true == $atts['free_input']) : ?>
									<div class="btcpw_skyscraper_tipping_free_input high">
										<input type="number" id="<?php echo "btcpw_skyscraper_tipping_high_amount"; ?>" name="<?php echo "btcpw_skyscraper_tipping_amount_high"; ?>" placeholder="0.00" required />


										<select required name="<?php echo "btcpw_skyscraper_tipping_currency_high"; ?>" id="<?php echo "btcpw_skyscraper_tipping_high_currency"; ?>">
											<option disabled value="">Select currency</option>
											<?php foreach ($supported_currencies as $currency) : ?>
												<option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
													<?php echo $currency; ?>
												<?php endforeach; ?>
										</select>
										<i class="fas fa-arrows-alt-v"></i>

									</div>
								<?php endif; ?>
							</div>
							<div class="btcpw_skyscraper_tipping_converted_values high">
								<input type="text" id="btcpw_skyscraper_high_converted_amount" name="<?php echo "btcpw_skyscraper_converted_amount_high"; ?>" readonly />
								<input type="text" id="<?php echo "btcpw_skyscraper_high_converted_currency"; ?>" name="<?php echo "btcpw_skyscraper_converted_currency_high"; ?>" readonly />
							</div>


							<div class="<?php echo "btcpw_skyscraper_button high"; ?>" id="btcpw_skyscraper_high_button">
								<input type="hidden" id="<?php echo "btcpw_skyscraper_redirect_link_high"; ?>" name="<?php echo "btcpw_skyscraper_redirect_link_high"; ?>" value="<?php echo esc_attr($atts['redirect']); ?>" />
								<?php if (true === $collect_data) : ?>

									<div>
										<input type="button" name="next" class="<?php echo "skyscraper-next-form high"; ?>" value="Continue">
									</div>

								<?php else : ?>
									<div>
										<button type="submit" id="<?php echo "btcpw_skyscraper_tipping_high_button"; ?>"><?php echo (!empty($atts['button_text']) ? esc_html($atts['button_text']) : 'Tip'); ?></button>
									</div>
								<?php endif; ?>
							</div>

						</fieldset>
						<?php if ($collect_data === true) : ?>
							<fieldset>
								<div class="<?php echo ltrim("btcpw_skyscraper_donor_information high"); ?>">
									<?php foreach ($collect as $key => $value) : ?>
										<?php if ($collect[$key]['display'] === true) : ?>
											<div class="<?php echo "btcpw_skyscraper_tipping_donor_{$collect[$key]['id']}_wrap high"; ?>">

												<input type="text" placeholder="<?php echo $collect[$key]['label']; ?>" id="<?php echo "btcpw_skyscraper_tipping_donor_{$collect[$key]['id']}_high"; ?>" name="<?php echo "btcpw_skyscraper_tipping_donor_{$collect[$key]['id']}_high"; ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

											</div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div class="<?php echo "btcpw_skyscraper_button high"; ?>" id="btcpw_skyscraper_high_button">
									<div>
										<input type="button" name="previous" class="<?php echo ("skyscraper-previous-form high"); ?>" value="< Previous" />
									</div>
									<div>
										<button type="submit" id=<?php echo "btcpw_skyscraper_tipping_high_button"; ?>><?php echo (!empty($atts['button_text']) ? esc_html($atts['button_text']) : 'Tip'); ?></button>
									</div>
								</div>
							</fieldset>
						<?php endif; ?>
					</form>
				</div>
			</div>
			<div id="powered_by_skyscraper">
				<p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
			</div>
		</div>
	<?php

		return ob_get_clean();
	}

	/**
	 * @param $atts
	 *
	 * @return string
	 */
	public function render_shortcode_page_tipping($atts)
	{

		global $wpdb;
		$id = !empty($atts['id']) ? intval($atts['id']) : null;
		$table_name = "{$wpdb->prefix}btc_forms";
		$result = $wpdb->get_results(
			$wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id),
			ARRAY_A
		);
		$atts = shortcode_atts(array(
			'dimension' => $id ? $result[0]['dimension'] : '520x600',
			'title' => $id ? $result[0]['title_text'] : 'Support my work',
			'description' => $id ? $result[0]['description_text'] : '',
			'currency' => $id ? $result[0]['currency'] : 'SATS',
			'background_color' => $id ? '#' . $result[0]['background_color'] : '#E6E6E6',
			'title_text_color' =>  $id ? '#' . $result[0]['title_text_color'] : '#ffffff',
			'tipping_text' => $id ? $result[0]['tipping_text'] : 'Enter Tipping Amount',
			'tipping_text_color' => $id ? '#' . $result[0]['tipping_text_color'] : '#000000',
			'redirect' => $id ? $result[0]['redirect'] : '',
			'description_color' => $id ? '#' . $result[0]['description_text_color'] : '#000000',
			'button_text' => $id ? $result[0]['button_text'] : 'Tipping now',
			'button_text_color' => $id ? '#' . $result[0]['button_text_color'] : '#FFFFFF',
			'button_color' => $id ? '#' . $result[0]['button_color'] : '#FE642E',
			'logo_id' => $id ? $result[0]['logo'] : 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg',
			'background_id' => $id ? $result[0]['background'] : '',
			'input_background' => $id ? '#' . $result[0]['input_background'] : '#ffa500',
			'background' => $id ? '#' . $result[0]['hf_background'] : '#1d5aa3',
			'free_input' => $id ? filter_var($result[0]['free_input'], FILTER_VALIDATE_BOOLEAN) : true,
			'value1_enabled' => $id ? filter_var($result[0]['value1_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
			'value1_amount' => $id ? round($result[0]['value1_amount'], 0) : 1000,
			'value1_currency' => $id ? $result[0]['value1_currency'] : 'SATS',
			'value1_icon' => $id ? $result[0]['value1_icon'] : 'fas fa-coffee',
			'value2_enabled' => $id ? filter_var($result[0]['value2_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
			'value2_amount' => $id ? round($result[0]['value2_amount'], 0) : 2000,
			'value2_currency' => $id ? $result[0]['value2_currency'] : 'SATS',
			'value2_icon' => $id ? $result[0]['value2_icon'] : 'fas fa-beer',
			'value3_enabled' => $id ? filter_var($result[0]['value3_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
			'value3_amount' => $id ? round($result[0]['value3_amount'], 0) : 3000,
			'value3_currency' => $id ? $result[0]['value3_currency'] : 'SATS',
			'value3_icon' => $id ? $result[0]['value3_icon'] : 'fas fa-cocktail',
			'display_name' => $id ? filter_var($result[0]['collect_name'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_name' => $id ? filter_var($result[0]['mandatory_name'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_email' => $id ? filter_var($result[0]['collect_email'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_email' => $id ? filter_var($result[0]['mandatory_email'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_phone' => $id ? filter_var($result[0]['collect_phone'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_phone' => $id ? filter_var($result[0]['mandatory_phone'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_address' => $id ? filter_var($result[0]['collect_address'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_address' => $id ? filter_var($result[0]['mandatory_address'], FILTER_VALIDATE_BOOLEAN) : false,
			'display_message' => $id ? filter_var($result[0]['collect_message'], FILTER_VALIDATE_BOOLEAN) : false,
			'mandatory_message' => $id ? filter_var($result[0]['mandatory_message'], FILTER_VALIDATE_BOOLEAN) : false,
			'step1' => $id ? $result[0]['step1'] : 'Pledge',
			'active_color' => $id ? '#' . $result[0]['active_color'] : '#808080',
			'step2' => $id ? $result[0]['step2'] : 'Info',
			'inactive_color' => $id ? '#' . $result[0]['inactive_color'] : '#D3D3D3',
			'show_icon'	=> $id ? $result[0]['show_icon'] : true,
		), $atts);

		$dimension = explode('x', '520x600');
		$supported_currencies = BTCPayWall_Admin::TIPPING_CURRENCIES;
		$logo = wp_get_attachment_image_src($atts['logo_id']) ? wp_get_attachment_image_src($atts['logo_id'])[0] : $atts['logo_id'];

		$background = wp_get_attachment_image_src($atts['background_id']) ? wp_get_attachment_image_src($atts['background_id'])[0] : $atts['background_id'];
		$collect = BTCPayWall_Public::getCollect($atts);
		$collect_data = BTCPayWall_Public::display_is_enabled($collect);
		$fixed_amount = BTCPayWall_Public::getFixedAmount($atts);
		$first_enabled = array_column($fixed_amount, 'enabled');
		$d = array_search('true', $first_enabled);
		$index = 'value' . ($d + 1);

		ob_start();
	?>
		<style>
			.btcpw_page_tipping_container {
				background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
									?>;
				background-image: url(<?php echo ($background ? esc_html($background) : '');
										?>);
				width: <?php echo esc_html($dimension[0]) . 'px !important';
						?>;
				height: <?php echo esc_html($dimension[1]) . 'px !important';
						?>;
			}

			#btcpw_page_tipping__button,
			#btcpw_page_button>input.page-next-form,
			#btcpw_page_button>input.page-previous-form {
				color: <?php echo esc_html($atts['button_text_color']);
						?>;
			}

			#btcpw_page_button {
				background-color: <?php echo esc_html($atts['background']);
									?>;
			}

			.btcpw_page_header_container h6 {
				color: <?php echo esc_html($atts['title_text_color']);
						?>
			}


			#page_tipping_form>fieldset>h6 {
				color: <?php echo esc_html($atts['tipping_text_color']);
						?>
			}

			.btcpw_page_amount_value_1,
			.btcpw_page_amount_value_2,
			.btcpw_page_amount_value_3,
			.btcpw_page_tipping_free_input {
				background-color: <?php echo esc_html($atts['input_background']);
									?>;

			}

			.btcpw_page_header_container,
			#btcpw_page_button>div:nth-child(1)>input {
				background-color: <?php echo esc_html($atts['background']);
									?>;
			}

			.btcpw_page_bar_container.active {
				background-color: <?php echo esc_html($atts['active_color']);
									?>;
			}

			#btcpw_page_tipping__button,
			#btcpw_page_button>input.page-next-form {
				background-color: <?php echo esc_html($atts['button_color']);
									?>;
			}

			.btcpw_page_bar_container div {
				background-color: <?php echo esc_html($atts['inactive_color']);
									?>;
			}
		</style>

		<div id="btcpw_page">
			<div class="btcpw_page_tipping_container">
				<form method="POST" action="" id="page_tipping_form">
					<div class="btcpw_page_header_container">
						<?php if ($logo) : ?>
							<div id="btcpw_page_logo_wrap">
								<img alt="Tipping page logo" src=<?php echo esc_url($logo); ?> />
							</div>
						<?php endif; ?>
						<?php if (!empty($atts['title'])) : ?>
							<div>
								<h6><?php echo esc_html($atts['title']); ?></h6>
							</div>
						<?php endif; ?>
					</div>
					<?php if ($collect_data == 'true') : ?>
						<div class='btcpw_page_bar_container'>
							<div class='btcpw_page_bar_container bar-1 active'>
								<?php echo (!empty($atts['step1']) ? esc_html($atts['step1']) : '1.Pledge'); ?></div>
							<div class='btcpw_page_bar_container bar-2'>
								<?php echo (!empty($atts['step2']) ? esc_html($atts['step2']) : '2.Info'); ?></div>
						</div>
					<?php endif; ?>
					<fieldset>
						<h6><?php echo (!empty($atts['tipping_text']) ? esc_html($atts['tipping_text']) : ''); ?>
						</h6>
						<div class="btcpw_page_amount">
							<?php foreach ($fixed_amount as $key => $value) : ?>

								<?php if ($fixed_amount[$key]['enabled'] === true) : ?>
									<div class="<?php echo 'btcpw_page_amount_' . $key; ?>">
										<div>
											<input type="radio" class="btcpw_page_tipping_default_amount" id="<?php echo "{$key}_page"; ?>" name="btcpw_page_tipping_default_amount" <?php echo $key == $index ? 'required' : ''; ?> value="<?php echo esc_html($fixed_amount[$key]['amount'] . ' ' . (!empty($fixed_amount[$key]['currency']) ? $fixed_amount[$key]['currency'] : 'SATS')); ?>">
											<?php if (!empty($fixed_amount[$key]['amount'])) : ?>
												<?php if (true == $atts['show_icon']) : ?>
													<i class="<?php echo esc_html($fixed_amount[$key]['icon']); ?>"></i>
												<?php endif; ?>
											<?php endif; ?>
										</div>
										<label for="<?php echo "{$key}_page" ?>"><?php echo esc_html($fixed_amount[$key]['amount'] . ' ' . (!empty($fixed_amount[$key]['currency']) ? $fixed_amount[$key]['currency'] : 'SATS')); ?></label>

									</div>
								<?php endif; ?>

							<?php endforeach; ?>
							<?php if (true == $atts['free_input']) : ?>
								<div class="btcpw_page_tipping_free_input">
									<input type="number" id="btcpw_page_tipping_amount" name="btcpw_page_tipping_amount" placeholder="0.00" required />


									<select required name="btcpw_page_tipping_currency" id="btcpw_page_tipping_currency">
										<option disabled value="">Select currency</option>
										<?php foreach ($supported_currencies as $currency) : ?>
											<option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
												<?php echo $currency; ?>
											</option>
										<?php endforeach; ?>
									</select>
									<i class="fas fa-arrows-alt-v"></i>
								</div>
							<?php endif; ?>

						</div>
						<?php if (true == $atts['free_input'] && $collect === false) : ?>
							<div class="btcpw_page_tipping_free_input">
								<input type="number" id="btcpw_page_tipping_amount" name="btcpw_page_tipping_amount" placeholder="0.00" required />


								<select required name="btcpw_page_tipping_currency" id="btcpw_page_tipping_currency">
									<option disabled value="">Select currency</option>
									<?php foreach ($supported_currencies as $currency) : ?>
										<option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
											<?php echo $currency; ?>
										</option>
									<?php endforeach; ?>
								</select>
								<i class="fas fa-arrows-alt-v"></i>
							</div>
						<?php endif; ?>

						<div class="btcpw_page_tipping_converted_values">
							<input type="text" id="btcpw_page_converted_amount" name="btcpw_page_converted_amount" readonly />
							<input type="text" id="btcpw_page_converted_currency" name="btcpw_page_converted_currency" readonly />
						</div>


						<div id="btcpw_page_button">
							<input type="hidden" id="btcpw_page_redirect_link" name="btcpw_page_redirect_link" value=<?php echo $atts['redirect']; ?> />
							<?php if ($collect_data === true) : ?>
								<input type="button" name="next" class="page-next-form" value="continue" />
							<?php else : ?>
								<button type="submit" id="btcpw_page_tipping__button"><?php echo (!empty($atts['button_text']) ? esc_html($atts['button_text']) : 'Tip'); ?></button>
							<?php endif; ?>
						</div>

					</fieldset>
					<?php if ($collect_data === true) : ?>
						<fieldset>
							<div class="btcpw_page_donor_information">
								<?php foreach ($collect as $key => $value) : ?>
									<?php if ($collect[$key]['display'] === true) : ?>
										<div class="<?php echo "btcpw_page_tipping_donor_{$collect[$key]['id']}_wrap"; ?>">

											<input type="text" placeholder="<?php echo esc_html($collect[$key]['label']); ?>" id="<?php echo "btcpw_page_tipping_donor_{$collect[$key]['id']}"; ?>" name="<?php echo "btcpw_page_tipping_donor_{$collect[$key]['id']}"; ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
							<div id="btcpw_page_button">
								<div>
									<input type="button" name="previous" class="page-previous-form" value="< previous" />
								</div>
								<div>
									<button type="submit" id="btcpw_page_tipping__button"><?php echo (!empty($atts['button_text']) ? esc_html($atts['button_text']) : 'Tip'); ?></button>
								</div>
							</div>
						</fieldset>
					<?php endif; ?>
				</form>
			</div>
			<div id="powered_by">
				<p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
			</div>
		</div>
<?php

		return ob_get_clean();
	}
}
