<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package BTCPayWall
 * @subpackage BTCPayWall/admin
 * @author BTCPayWall by Coincharge https://btcpaywall.com
 */
class BTCPayWall_Admin
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
	 *
	 */
	const DURATIONS = [
		'minute',
		'hour',
		'week',
		'month',
		'year',
		'onetime',
		'unlimited',
	];

	const CURRENCIES = [
		'SATS',
		'USD',
		'EUR',
	];

	const TIPPING_CURRENCIES = [
		'SATS',
		'BTC',
		'USD',
		'EUR',
	];

	const BTC_FORMAT = [
		'SATS',
		'BTC',
	];
	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles()
	{

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/btc-paywall-admin.css', array(), $this->version, 'all');

		wp_enqueue_style('wp-color-picker');
		wp_enqueue_style('load-fa', 'https://use.fontawesome.com/releases/v5.12.1/css/all.css');

		wp_enqueue_style($this->plugin_name . '_preview', plugin_dir_url(__FILE__) . 'css/btc-paywall-preview-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts()
	{

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/btc-paywall-admin.js', array('jquery'), $this->version, false);

		wp_enqueue_script('iris', admin_url('js/iris.min.js'), array('jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch'), false, 1);

		wp_localize_script(
			$this->plugin_name,
			'shortcode_ajax_object',
			[
				'ajax_url'  => admin_url('admin-ajax.php'),
				'redirectUrl' => admin_url('admin.php?page=btcpw_edit&action=edit&id='),
				'security'  => wp_create_nonce('shortcode-security-nonce'),
			]
		);

		wp_enqueue_script($this->plugin_name . '_preview', plugin_dir_url(__FILE__) . 'js/btc-paywall-preview-admin.js', array('jquery'), $this->version, false);

		if (!did_action('wp_enqueue_media')) {
			wp_enqueue_media();
		}
	}

	public function register_post_types()
	{

		register_post_type('btcpw_order', [
			'label' => 'BP Orders',
			'public' => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'show_in_menu' => false,
			'show_in_admin_bar' => false,
			'show_in_rest' => false,
			'rest_base' => null,
			'menu_position' => null,
			'menu_icon' => null,
			'hierarchical' => false,
			'supports' => ['title', 'custom-fields'],
			'taxonomies' => [],
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true,
		]);
	}

	/**
	 * Add admin menu pages
	 */
	public function add_menu_pages()
	{

		add_menu_page('BTCPayWall', 'BTCPayWall', 'manage_options', 'btcpw_general_settings', '', 'dashicons-tagcloud');
		add_submenu_page('btcpw_general_settings', 'Settings', 'Settings', 'manage_options', 'btcpw_general_settings', array($this, 'render_general_settings_page'));
		add_submenu_page('btcpw_general_settings', 'Invoices', 'Invoices', 'manage_options', 'btcpw_invoices', array($this, 'render_invoices_page'));

		add_submenu_page('btcpw_general_settings', 'All forms', 'All forms', 'manage_options', 'btcpw_forms', array($this, 'render_tipping_list'));
		add_submenu_page('btcpw_general_settings', 'Add form', 'Add form', 'manage_options', 'btcpw_form', array($this, 'render_new_form'));
		add_submenu_page(null, 'Edit shortcode', 'Edit shortcode', 'manage_options', 'btcpw_edit', array($this, 'render_edit_page'));
	}

	/**
	 *
	 */
	public function register_settings()
	{

		register_setting('btcpw_general_settings', 'btcpw_enabled_post_types', array('type' => 'array', 'default' => array('post')));
		register_setting('btcpw_general_settings', 'btcpw_default_currency', array('type' => 'string', 'default' => 'SATS'));
		register_setting('btcpw_general_settings', 'btcpw_default_btc_format', array('type' => 'string', 'default' => 'SATS'));
		register_setting('btcpw_general_settings', 'btcpw_default_price', array('type' => 'number', 'default' => 10));
		register_setting('btcpw_general_settings', 'btcpw_default_duration', array('type' => 'integer', 'default' => ''));
		register_setting('btcpw_general_settings', 'btcpw_default_duration_type', array('type' => 'string', 'default' => 'unlimited'));
		register_setting('btcpw_general_settings', 'btcpw_default_payblock_text', array('type' => 'string', 'default' => 'For access to content first pay', 'sanitize_callback' => array($this, 'sanitize_payblock_area')));
		register_setting('btcpw_general_settings', 'btcpw_default_payblock_button', array('type' => 'string', 'default' => 'Pay', 'sanitize_callback' => array($this, 'sanitize_payblock_area')));
		register_setting('btcpw_general_settings', 'btcpw_default_payblock_info', array('type' => 'string', 'default' => '', 'sanitize_callback' => array($this, 'sanitize_payblock_area')));

		register_setting('btcpw_general_settings', 'btcpw_btcpay_server_url', array('type' => 'string', 'sanitize_callback' => array($this, 'sanitize_btcpay_server_url')));
		register_setting('btcpw_general_settings', 'btcpw_btcpay_auth_key_view', array('type' => 'string', 'sanitize_callback' => array($this, 'sanitize_btcpay_auth_key')));
		register_setting('btcpw_general_settings', 'btcpw_btcpay_auth_key_create', array('type' => 'string', 'sanitize_callback' => array($this, 'sanitize_btcpay_auth_key')));
	}
	public static function roundAmount($currency, $amount)
	{
		switch ($currency) {
			case 'BTC':
				return $amount;
			case 'EUR':
			case 'USD':
				return round($amount, 1);
			default:
				return round($amount, 0);
		}
	}
	public function validate_textarea($values)
	{

		$default_values = array();

		if (!is_array($values)) {
			return $default_values;
		}

		foreach ($values as $key => $value) {

			$default_values[$key] = sanitize_textarea_field($value);
		}

		return $default_values;
	}

	public function sanitize_btcpay_server_url($value)
	{

		$value = sanitize_text_field($value);

		return trim($value, '/');
	}

	public function sanitize_btcpay_auth_key($value)
	{
		$value = sanitize_text_field($value);

		return $value;
	}


	public function sanitize_payblock_area($value)
	{

		$value = sanitize_textarea_field($value);

		return $value;
	}

	public function sanitize_color($value)
	{

		$value = sanitize_hex_color($value);

		return $value;
	}

	public function sanitize_text($value)
	{

		$value = sanitize_text_field($value);

		return $value;
	}

	public function sanitize_mandatory($value)
	{

		return (isset($value) ? 'true' : 'false');
	}
	/**
	 * Helper function for extracting permission string from server
	 */

	public function startsWith($string, $startString)
	{
		$len = strlen($startString);

		return (substr($string, 0, $len) === $startString);
	}


	/**
	 * Check if API key contains required permission
	 */
	public function checkPermission($list, $permission)
	{
		foreach ($list as $perm) {
			if ($this->startsWith($perm, $permission)) {
				return true;
			}
		}
		return false;
	}
	/**
	 * @param WP_Post $post
	 * @param array $meta
	 */
	public function render_post_settings_meta_box($post, $meta)
	{

		wp_nonce_field(plugin_basename(__FILE__), 'btcpw_post_meta_box_nonce');
	}
	private function check_store_id($store_id)
	{

		if (get_option("btcpw_btcpay_store_id") !== false) {

			update_option("btcpw_btcpay_store_id", $store_id);
		} else {

			add_option("btcpw_btcpay_store_id", $store_id, null, 'no');
		}
	}

	/**
	 * Check connection with a server
	 */
	public function ajax_check_greenfield_api_work()
	{

		if (empty($_POST['auth_key_view']) || empty($_POST['auth_key_create']) || empty($_POST['server_url'])) {
			wp_send_json_error(['message' => 'Auth Keys & Server Url required']);
		}

		$auth_key_view = sanitize_text_field($_POST['auth_key_view']);
		$auth_key_create = sanitize_text_field($_POST['auth_key_create']);
		$server_url = sanitize_text_field($_POST['server_url']);

		$args_view = array(
			'headers' => array(
				'Authorization' => 'token ' . $auth_key_view,
				'Content-Type' => 'application/json',
			),
			'method' => 'GET',
			'timeout' => 10
		);
		$args_create = array(
			'headers' => array(
				'Authorization' => 'token ' . $auth_key_create,
				'Content-Type' => 'application/json',
			),
			'method' => 'GET',
			'timeout' => 10
		);
		$url = "{$server_url}/api/v1/api-keys/current";

		$response_view = wp_remote_request($url, $args_view);

		$response_create = wp_remote_request($url, $args_create);

		if (is_wp_error($response_view) || is_wp_error($response_create)) {
			wp_send_json_error(['message' => 'Something went wrong. Please check your credentials. If your server url is correct, make sure it doesn\'t contain trailing slash.']);
		}

		$view_permission = json_decode($response_view['body'])->permissions[0];
		$create_permission = json_decode($response_create['body'])->permissions[0];

		$valid_view_permission = $this->checkPermission(json_decode($response_view['body'], true)['permissions'], 'btcpay.store.canviewinvoices');

		$valid_create_permission = $this->checkPermission(json_decode($response_create['body'], true)['permissions'], 'btcpay.store.cancreateinvoice');

		$valid_permissions = $valid_create_permission && $valid_view_permission;

		$valid_response_code = ($response_view['response']['code'] === 200) && ($response_create['response']['code'] === 200);

		$view_store_id = substr($view_permission, strrpos($view_permission, ':') + 1);
		$create_store_id = substr($create_permission, strrpos($create_permission, ':') + 1);
		$valid_store_id = $view_store_id === $create_store_id;
		if ($valid_permissions && $valid_store_id && $valid_response_code) {
			$this->check_store_id($view_store_id);
			wp_send_json_success(["store_id" => $view_store_id]);
		} else {
			wp_send_json_error(['message' => 'Something went wrong. Please check your credentials.']);
		}
	}

	/**
	 * Fetch invoices
	 */

	public function get_greenfield_invoices()
	{

		$store_id = get_option('btcpw_btcpay_store_id');

		$args = array(
			'headers' => array(
				'Authorization' => 'token ' . get_option('btcpw_btcpay_auth_key_view'),
				'Content-Type' => 'application/json',
			),
			'method' => 'GET',
			'timeout' => 20,
		);

		if (!empty($store_id)) {

			$url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . $store_id . '/invoices';


			$response = wp_remote_get($url, $args);

			if (is_wp_error($response)) {
				wp_send_json_error();
			}
			$body = wp_remote_retrieve_body($response);


			$data = json_decode($body, true);

			if ($data) {
				wp_send_json_success($data);
			}
			wp_send_json_error($data);
		}
	}


	/**
	 * Render General Settings page
	 */
	public function render_general_settings_page()
	{
		include 'partials/page-general-settings.php';
	}

	/**
	 * Render Invoices page
	 */
	public function render_invoices_page()
	{
		include 'partials/page-invoices.php';
	}



	/**
	 * Render Edit page
	 */
	public function render_edit_page()
	{
		include 'partials/page-tipping-edit.php';
	}

	/**
	 * Render Add Form
	 */
	public function render_new_form()
	{
		include 'partials/page-add-form.php';
	}

	/*
	*Render Donations
	 */
	public function render_tipping_list()
	{
		require_once __DIR__ . '/classes/class-donation-list.php';
		$table = new Donation_List_Table();


		//$table->prepare_items();
		//return $table->display();
		//ob_start();
?>
		<div class="wrap">
			<h2>All forms</h2>

			<div>
				<div>
					<div>
						<div>
							<form method="post">
								<?php
								$table->prepare_items();
								$table->display(); ?>
							</form>
						</div>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>
<?php

		//return ob_get_clean();
	}
	public static function allCreatedForms()
	{
		global $wpdb;
		$table_name = "{$wpdb->prefix}btc_forms";
		$result = $wpdb->get_results(
			"SELECT * FROM $table_name",
			ARRAY_A
		);
		$shortcodes = array();
		foreach ($result as $row) {

			$shortcodes[BTCPayWall_Admin::outputShortcodeAttributes($row['name'], $row['id'])] = BTCPayWall_Admin::outputShortcodeAttributes($row['name'], $row['id']);
		}
		return $shortcodes;
	}
	public static function outputShortcodeAttributes($name, $id)
	{
		switch ($name) {

			case 'Tipping Box':
				return "[btcpw_tipping_box id={$id}]";
			case 'Tipping Banner High':
				return "[btcpw_tipping_banner_high id={$id}]";
			case 'Tipping Banner Wide':
				return "[btcpw_tipping_banner_wide id={$id}]";
			case 'Tipping Page':
				return "[btcpw_tipping_page id={$id}]";
			default:
				return 'Shortcode could not be created! Please try again.';
		}
	}
	/**
	 * Extract tipping name
	 */
	public static function extractName($dimension)
	{
		switch ($dimension) {
			case '250x300':
			case '300x300':
				return array(
					'name' => 'Tipping Box',
					'type' => 'btcpw_tipping_box_shortcode'
				);
			case '200x710':
				return array(
					'name' => 'Tipping Banner High',
					'type' => 'btcpw_tipping_banner_shortcode'
				);
			case '600x280':
				return array(
					'name' => 'Tipping Banner Wide',
					'type' => 'btcpw_tipping_banner_shortcode'
				);
			default:
				return array(
					'name' => 'Tipping Page',
					'type' => 'btcpw_tipping_page_shortcode'
				);
		}
	}
	/**
	 * Action for storing shortcode values
	 */


	public function createShortcode()
	{
		global $wpdb;
		check_ajax_referer('shortcode-security-nonce', 'nonce_ajax');
		$id = sanitize_text_field($_POST['id']) ?? null;
		$name = BTCPayWall_Admin::extractName($_POST['dimension'])['name'];
		$type = BTCPayWall_Admin::extractName($_POST['dimension'])['type'];
		$dimension = sanitize_text_field($_POST['dimension']) ?? "520x600";

		$background = sanitize_text_field($_POST['background']);
		$background_color = sanitize_hex_color_no_hash($_POST['background_color']);
		$hf_color = sanitize_hex_color_no_hash($_POST['hf_color']);
		$logo = sanitize_text_field($_POST['logo']);
		$form_name = sanitize_text_field($_POST['form_name']);
		$title_text = sanitize_text_field($_POST['title_text']);
		$title_text_color = sanitize_hex_color_no_hash($_POST['title_text_color']);

		$description_text = sanitize_text_field($_POST['description_text']);
		$description_text_color = sanitize_hex_color_no_hash($_POST['description_text_color']);

		$tipping_text = sanitize_text_field($_POST['tipping_text']);
		$tipping_text_color = sanitize_hex_color_no_hash($_POST['tipping_text_color']);
		$redirect = sanitize_text_field($_POST['redirect']);
		$currency = sanitize_text_field($_POST['currency']);
		$input_background = sanitize_hex_color_no_hash($_POST['input_background']);
		$button_text = sanitize_text_field($_POST['button_text']);
		$button_text_color = sanitize_hex_color_no_hash($_POST['button_text_color']);
		$button_color = sanitize_hex_color_no_hash($_POST['button_color']);

		$free_input = (rest_sanitize_boolean($_POST['free_input']));
		$value1_enabled = (rest_sanitize_boolean($_POST['value1_enabled']));
		$value1_currency = (rest_sanitize_boolean($_POST['value1_currency']));
		$value1_amount = (sanitize_text_field($_POST['value1_amount']));
		$value1_icon = (sanitize_text_field($_POST['value1_icon']));

		$value2_enabled = (rest_sanitize_boolean($_POST['value2_enabled']));
		$value2_currency = (rest_sanitize_boolean($_POST['value2_currency']));
		$value2_amount = (sanitize_text_field($_POST['value2_amount']));
		$value2_icon = (sanitize_text_field($_POST['value2_icon']));

		$value3_enabled = (rest_sanitize_boolean($_POST['value3_enabled']));
		$value3_currency = (rest_sanitize_boolean($_POST['value3_currency']));
		$value3_amount = (sanitize_text_field($_POST['value3_amount']));
		$value3_icon = (sanitize_text_field($_POST['value3_icon']));

		$collect_name = (rest_sanitize_boolean($_POST['collect_name']));
		$mandatory_name = (rest_sanitize_boolean($_POST['mandatory_name']));
		$collect_email = (rest_sanitize_boolean($_POST['collect_email']));
		$mandatory_email = (rest_sanitize_boolean($_POST['mandatory_email']));

		$collect_phone = (rest_sanitize_boolean($_POST['collect_phone']));
		$mandatory_phone = (rest_sanitize_boolean($_POST['mandatory_phone']));

		$collect_address = (rest_sanitize_boolean($_POST['collect_address']));
		$mandatory_address = (rest_sanitize_boolean($_POST['mandatory_address']));

		$collect_message = (rest_sanitize_boolean($_POST['collect_message']));
		$mandatory_message = (rest_sanitize_boolean($_POST['mandatory_message']));
		$show_icon = (rest_sanitize_boolean($_POST['show_icon']));
		$active_color = sanitize_hex_color_no_hash($_POST['active_color']);
		$inactive_color = sanitize_hex_color_no_hash($_POST['inactive_color']);
		$step1 = sanitize_text_field($_POST['step1']);
		$step2 = sanitize_text_field($_POST['step2']);
		$row = null;
		$table_name = $wpdb->prefix . 'btc_forms';
		if (empty($id)) {
			$row = $wpdb->insert(
				$table_name,
				array(
					'time' => current_time('mysql'),
					'name' => $name,
					'form_name' => $form_name,
					'dimension' => $dimension,
					'background' => $background,
					'background_color' => $background_color,
					'hf_background'	=> $hf_color,
					'logo'	=> $logo,
					'title_text' => $title_text,
					'title_text_color' => $title_text_color,
					'description_text'  => $description_text,
					'description_text_color' => $description_text_color,
					'tipping_text'	=> $tipping_text,
					'tipping_text_color'	=> $tipping_text_color,
					'redirect'	=>	$redirect,
					'currency'	=> $currency,
					'input_background'	=> $input_background,
					'button_text'	=> $button_text,
					'button_text_color'	=> $button_text_color,
					'button_color'	=> $button_color,
					'value1_enabled' => $value1_enabled,
					'value1_amount'	=> $value1_amount,
					'value1_currency'	=> $value1_currency,
					'value1_icon'	=> $value1_icon,
					'value2_enabled' => $value2_enabled,
					'value2_amount'	=> $value2_amount,
					'value2_currency'	=> $value2_currency,
					'value2_icon'	=> $value2_icon,
					'value3_enabled' => $value3_enabled,
					'value3_amount'	=> $value3_amount,
					'value3_currency'	=> $value3_currency,
					'value3_icon'	=> $value3_icon,
					'collect_name'	=> $collect_name,
					'mandatory_name'	=> $mandatory_name,
					'collect_email'	=> $collect_email,
					'mandatory_email'	=> $mandatory_email,
					'collect_address'	=> $collect_address,
					'mandatory_address'	=> $mandatory_address,
					'collect_phone'	=> $collect_phone,
					'mandatory_phone'	=> $mandatory_phone,
					'collect_message'	=> $collect_message,
					'mandatory_message'	=> $mandatory_message,
					'free_input'	=> $free_input,
					'show_icon'		=> $show_icon,
					'step1'			=> $step1,
					'step2'			=> $step2,
					'active_color'	=> $active_color,
					'inactive_color'	=> $inactive_color,
				)
			);
		} else {
			$row = $wpdb->update(
				$table_name,
				array(
					'time' => current_time('mysql'),
					'name' => $name,
					'form_name' => $form_name,
					'dimension' => $dimension,
					'background' => $background,
					'background_color' => $background_color,
					'hf_background'	=> $hf_color,
					'logo'	=> $logo,
					'title_text' => $title_text,
					'title_text_color' => $title_text_color,
					'description_text'  => $description_text,
					'description_text_color' => $description_text_color,
					'tipping_text'	=> $tipping_text,
					'tipping_text_color'	=> $tipping_text_color,
					'redirect'	=>	$redirect,
					'currency'	=> $currency,
					'input_background'	=> $input_background,
					'button_text'	=> $button_text,
					'button_text_color'	=> $button_text_color,
					'button_color'	=> $button_color,
					'value1_enabled' => $value1_enabled,
					'value1_amount'	=> $value1_amount,
					'value1_currency'	=> $value1_currency,
					'value1_icon'	=> $value1_icon,
					'value2_enabled' => $value2_enabled,
					'value2_amount'	=> $value2_amount,
					'value2_currency'	=> $value2_currency,
					'value2_icon'	=> $value2_icon,
					'value3_enabled' => $value3_enabled,
					'value3_amount'	=> $value3_amount,
					'value3_currency'	=> $value3_currency,
					'value3_icon'	=> $value3_icon,
					'collect_name'	=> $collect_name,
					'mandatory_name'	=> $mandatory_name,
					'collect_email'	=> $collect_email,
					'mandatory_email'	=> $mandatory_email,
					'collect_address'	=> $collect_address,
					'mandatory_address'	=> $mandatory_address,
					'collect_phone'	=> $collect_phone,
					'mandatory_phone'	=> $mandatory_phone,
					'collect_message'	=> $collect_message,
					'mandatory_message'	=> $mandatory_message,
					'free_input'	=> $free_input,
					'show_icon'		=> $show_icon,
					'step1'			=> $step1,
					'step2'			=> $step2,
					'active_color'	=> $active_color,
					'inactive_color'	=> $inactive_color,
				),
				array('id' => $id)
			);
		}

		$shortcode = BTCPayWall_Admin::outputShortcodeAttributes($name, $wpdb->insert_id);
		if ($row) {
			wp_send_json_success(array('res' => true, 'data' => array('type' => $type, 'id' => $wpdb->insert_id)));
		} else {
			wp_send_json_error(array('res' => false, 'message' => __('Something went wrong. Please try again later.')));
		}
	}
	/* 
	 * @throws Exception
	 */
	public function load_vc_widgets()
	{

		vc_map(array(
			'name' => 'BTCPW Pay-per-Post Start',
			'base' => 'btcpw_start_content',
			'description' => 'Start area of paid content',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(
				array(
					'type' => 'checkbox',
					'heading' => 'Enable payment block',
					'param_name' => 'pay_block',
					'value' => 'true',
					'description' => 'Show payment block instead of content',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Currency',
					'param_name' => 'currency',
					'value' => array(
						'Default' => '',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set currency',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'BTC format',
					'param_name' => 'btc_format',
					'dependency' => array(
						'element' => 'currency',
						'value' => 'SATS'
					),
					'value' => array(
						'Default' => '',
						'SATS' => 'SATS',
						'BTC' => 'BTC',
					),
					'std' => 'Default',
					'description' => 'Set BTC format',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Price',
					'param_name' => 'price',
					'description' => 'Set price',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Duration type',
					'param_name' => 'duration_type',
					'value' => array(
						'default' => '',
						'minute' => 'minute',
						'hour' => 'hour',
						'day' => 'day',
						'week' => 'week',
						'month' => 'month',
						'year' => 'year',
						'onetime' => 'onetime',
						'unlimited' => 'unlimited',
					),
					'std' => 'default',
					'description' => 'Set duration type',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Duration',
					'param_name' => 'duration',
					'description' => 'Set duration',
				),
			),
		));

		vc_map(array(
			'name' => 'BTCPW Pay-per-Post End',
			'base' => 'btcpw_end_content',
			'description' => 'End area of paid content',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(),
		));

		vc_map(array(
			'name' => 'BTCPW Pay Widget',
			'base' => 'btcpw_pay_block',
			'description' => 'Show Payment Widget',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(),
		));

		vc_map(array(
			'name' => 'BTCPW Pay-per-View Start',
			'base' => 'btcpw_start_video',
			'description' => 'Start area of paid video content',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(
				array(
					'type' => 'checkbox',
					'heading' => 'Enable payment block',
					'param_name' => 'pay_view_block',
					'value' => 'true',
					'description' => 'Show payment block instead of video',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Title',
					'param_name' => 'title',
					'value' => 'Untitled',
					'description' => 'Enter video title',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Description',
					'param_name' => 'description',
					'value' => 'No description',
					'description' => 'Enter video description',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Preview',
					'param_name' => 'preview',
					'description' => 'Add video preview',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Currency',
					'param_name' => 'currency',
					'value' => array(
						'Default' => '',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set currency',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'BTC format',
					'param_name' => 'btc_format',
					'dependency' => array(
						'element' => 'currency',
						'value' => 'SATS'
					),
					'value' => array(
						'Default' => '',
						'SATS' => 'SATS',
						'BTC' => 'BTC',
					),
					'std' => 'Default',
					'description' => 'Set BTC format',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Price',
					'param_name' => 'price',
					'description' => 'Set price',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Duration type',
					'param_name' => 'duration_type',
					'value' => array(
						'default' => '',
						'minute' => 'minute',
						'hour' => 'hour',
						'day' => 'day',
						'week' => 'week',
						'month' => 'month',
						'year' => 'year',
						'onetime' => 'onetime',
						'unlimited' => 'unlimited',
					),
					'std' => 'default',
					'description' => 'Set duration type',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Duration',
					'param_name' => 'duration',
					'description' => 'Set duration',
				),
			),
		));

		vc_map(array(
			'name' => 'BTCPW Pay-per-View End',
			'base' => 'btcpw_end_video',
			'description' => 'End area of paid video content',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(),
		));


		vc_map(array(
			'name' => 'BTCPW Pay-per-File',
			'base' => 'btcpw_file',
			'description' => 'Area of file',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(
				array(
					'type' => 'checkbox',
					'heading' => 'Enable payment block',
					'param_name' => 'pay_file_block',
					'value' => 'true',
					'description' => 'Show payment block instead of file',
				),
				array(
					'type' => 'vc_link',
					'heading' => 'File',
					'param_name' => 'file',
					'description' => 'Add file link',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Title',
					'param_name' => 'title',
					'value' => 'Untitled',
					'description' => 'Enter file title',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Description',
					'param_name' => 'description',
					'value' => 'No description',
					'description' => 'Enter file description',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Preview',
					'param_name' => 'preview',
					'description' => 'Add file preview',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Currency',
					'param_name' => 'currency',
					'value' => array(
						'Default' => '',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set currency',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'BTC format',
					'param_name' => 'btc_format',
					'dependency' => array(
						'element' => 'currency',
						'value' => 'SATS'
					),
					'value' => array(
						'Default' => '',
						'SATS' => 'SATS',
						'BTC' => 'BTC',
					),
					'std' => 'Default',
					'description' => 'Set BTC format',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Price',
					'param_name' => 'price',
					'description' => 'Set price',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Duration type',
					'param_name' => 'duration_type',
					'value' => array(
						'default' => '',
						'minute' => 'minute',
						'hour' => 'hour',
						'day' => 'day',
						'week' => 'week',
						'month' => 'month',
						'year' => 'year',
						'onetime' => 'onetime',
						'unlimited' => 'unlimited',
					),
					'std' => 'default',
					'description' => 'Set duration type',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Duration',
					'param_name' => 'duration',
					'description' => 'Set duration',
				),
			),
		));



		vc_map(array(
			'name' => 'BTCPW Tipping Banner Wide',
			'base' => 'btcpw_tipping_banner_wide',
			'description' => 'Add Wide Tipping Banner',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => 'Dimension',
					'param_name' => 'dimension',
					'value' => array(
						'600x200' => '600x200',
					),
					'std' => '600x200',
					'description' => 'Dimension',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Background',
					'param_name' => 'background_id',
					'description' => 'Add background image',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Background color',
					'param_name' => 'background_color',
					'value' => '#E6E6E6',
					'description' => 'Set background color',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Background color for header and footer',
					'param_name' => 'background',
					'value' => '#1d5aa3',
					'description' => 'Set header and footer background color',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Logo',
					'param_name' => 'logo_id',
					'value' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg',
					'description' => 'Add logo',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Title',
					'param_name' => 'title',
					'value' => 'Support my work',
					'description' => 'Set title',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Title text color',
					'param_name' => 'title_text_color',
					'value' => '#ffffff',
					'description' => 'Set title text color',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Description',
					'param_name' => 'description',
					'value' => '',
					'description' => 'Set description',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Description text color',
					'param_name' => 'description_text_color',
					'value' => '#000000',
					'description' => 'Set description text color',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Tipping text',
					'param_name' => 'tipping_text',
					'value' => 'Enter Tipping Amount',
					'description' => 'Set tipping text',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Tipping text color',
					'param_name' => 'tipping_text_color',
					'value' => '#000000',
					'description' => 'Set tipping text color',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Redirect',
					'param_name' => 'redirect',
					'description' => 'Set redirect link',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Free input',
					'param_name' => 'free_input',
					'value' => true,
					'std' => true,
					'description' => 'Display free input',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Currency',
					'param_name' => 'currency',
					'value' => array(
						'SATS' => 'SATS',
						'BTC'	=> 'BTC',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'SATS',
					'description' => 'Set currency',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Input color',
					'param_name' => 'input_background',
					'value' => '#ffa500',
					'description' => 'Set background color for input fields',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Show icon',
					'param_name' => 'show_icon',
					'value' => true,
					'std' => true,
					'description' => 'Display icons',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Value 1 enabled',
					'param_name' => 'value1_enabled',
					'value' => true,
					'std' => true,
					'description' => 'Display value 1',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 1 amount',
					'param_name' => 'value1_amount',
					'value' => 1000,
					'description' => 'Set amount for value 1',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Value 1 currency',
					'param_name' => 'value1_currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set value 1 currency',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 1 icon',
					'param_name' => 'value1_icon',
					'value' => 'fas fa-coffee',
					'description' => 'Set icon for value 1',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Value 2 enabled',
					'param_name' => 'value2_enabled',
					'value' => true,
					'std' => true,
					'description' => 'Display value 2',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 2 amount',
					'param_name' => 'value2_amount',
					'value' => 2000,
					'description' => 'Set amount for value 2',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Value 2 currency',
					'param_name' => 'value2_currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set value 2 currency',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 2 icon',
					'param_name' => 'value2_icon',
					'value' => 'fas fa-beer',
					'description' => 'Set icon for value 2',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Value 3 enabled',
					'param_name' => 'value3_enabled',
					'value' => true,
					'std' => true,
					'description' => 'Display value 3',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 3 amount',
					'param_name' => 'value3_amount',
					'value' => 3000,
					'description' => 'Set amount for value 3',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Value 3 currency',
					'param_name' => 'value3_currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set value 3 currency',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 3 icon',
					'param_name' => 'value3_icon',
					'value' => 'fas fa-coffee',
					'description' => 'Set icon for value 3',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Button text',
					'param_name' => 'button_text',
					'value' => 'Tipping now',
					'description' => 'Set button text',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Button text color',
					'param_name' => 'button_text_color',
					'value' => '#ffffff',
					'description' => 'Set button text color',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Button color',
					'param_name' => 'button_color',
					'value' => '#FE642E',
					'description' => 'Set button color',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display name',
					'param_name' => 'display_name',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory name',
					'param_name' => 'mandatory_name',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display email',
					'param_name' => 'display_email',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory email',
					'param_name' => 'mandatory_email',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display phone',
					'param_name' => 'display_phone',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory phone',
					'param_name' => 'mandatory_phone',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display address',
					'param_name' => 'display_address',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory address',
					'param_name' => 'mandatory_address',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display message',
					'param_name' => 'display_message',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory message',
					'param_name' => 'mandatory_message',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
			),
		));

		vc_map(array(
			'name' => 'BTCPW Tipping Banner High',
			'base' => 'btcpw_tipping_banner_high',
			'description' => 'Add High Tipping Banner',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => 'Dimension',
					'param_name' => 'dimension',
					'value' => array(
						'200x710' => '200x710',
					),
					'std' => '200x710',
					'description' => 'Dimension',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Background',
					'param_name' => 'background_id',
					'description' => 'Add background image',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Background color',
					'param_name' => 'background_color',
					'value' => '#E6E6E6',
					'description' => 'Set background color',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Background color for header and footer',
					'param_name' => 'background',
					'value' => '#1d5aa3',
					'description' => 'Set header and footer background color',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Logo',
					'param_name' => 'logo_id',
					'value' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg',
					'description' => 'Add logo',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Title',
					'param_name' => 'title',
					'value' => 'Support my work',
					'description' => 'Set title',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Title text color',
					'param_name' => 'title_text_color',
					'value' => '#ffffff',
					'description' => 'Set title text color',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Description',
					'param_name' => 'description',
					'value' => '',
					'description' => 'Set description',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Description text color',
					'param_name' => 'description_text_color',
					'value' => '#000000',
					'description' => 'Set description text color',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Tipping text',
					'param_name' => 'tipping_text',
					'value' => 'Enter Tipping Amount',
					'description' => 'Set tipping text',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Tipping text color',
					'param_name' => 'tipping_text_color',
					'value' => '#000000',
					'description' => 'Set tipping text color',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Redirect',
					'param_name' => 'redirect',
					'description' => 'Set redirect link',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Free input',
					'param_name' => 'free_input',
					'value' => true,
					'std' => true,
					'description' => 'Display free input',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Currency',
					'param_name' => 'currency',
					'value' => array(
						'SATS' => 'SATS',
						'BTC'	=> 'BTC',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'SATS',
					'description' => 'Set currency',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Input color',
					'param_name' => 'input_background',
					'value' => '#ffa500',
					'description' => 'Set background color for input fields',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Show icon',
					'param_name' => 'show_icon',
					'value' => true,
					'std' => true,
					'description' => 'Display icons',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Value 1 enabled',
					'param_name' => 'value1_enabled',
					'value' => true,
					'std' => true,
					'description' => 'Display value 1',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 1 amount',
					'param_name' => 'value1_amount',
					'value' => 1000,
					'description' => 'Set amount for value 1',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Value 1 currency',
					'param_name' => 'value1_currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set value 1 currency',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 1 icon',
					'param_name' => 'value1_icon',
					'value' => 'fas fa-coffee',
					'description' => 'Set icon for value 1',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Value 2 enabled',
					'param_name' => 'value2_enabled',
					'value' => true,
					'std' => true,
					'description' => 'Display value 2',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 2 amount',
					'param_name' => 'value2_amount',
					'value' => 2000,
					'description' => 'Set amount for value 2',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Value 2 currency',
					'param_name' => 'value2_currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set value 2 currency',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 2 icon',
					'param_name' => 'value2_icon',
					'value' => 'fas fa-beer',
					'description' => 'Set icon for value 2',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Value 3 enabled',
					'param_name' => 'value3_enabled',
					'value' => true,
					'std' => true,
					'description' => 'Display value 3',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 3 amount',
					'param_name' => 'value3_amount',
					'value' => 3000,
					'description' => 'Set amount for value 3',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Value 3 currency',
					'param_name' => 'value3_currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set value 3 currency',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 3 icon',
					'param_name' => 'value3_icon',
					'value' => 'fas fa-coffee',
					'description' => 'Set icon for value 3',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Button text',
					'param_name' => 'button_text',
					'value' => 'Tipping now',
					'description' => 'Set button text',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Button text color',
					'param_name' => 'button_text_color',
					'value' => '#ffffff',
					'description' => 'Set button text color',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Button color',
					'param_name' => 'button_color',
					'value' => '#FE642E',
					'description' => 'Set button color',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display name',
					'param_name' => 'display_name',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory name',
					'param_name' => 'mandatory_name',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display email',
					'param_name' => 'display_email',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory email',
					'param_name' => 'mandatory_email',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display phone',
					'param_name' => 'display_phone',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory phone',
					'param_name' => 'mandatory_phone',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display address',
					'param_name' => 'display_address',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory address',
					'param_name' => 'mandatory_address',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display message',
					'param_name' => 'display_message',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory message',
					'param_name' => 'mandatory_message',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
			),
		));
		vc_map(array(
			'name' => 'BTCPW Tipping Box',
			'base' => 'btcpw_tipping_box',
			'description' => 'Add Tipping Box',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => 'Dimension',
					'param_name' => 'dimension',
					'value' => array(
						'250x300' => '250x300',
						'300x300' => '300x300',
					),
					'std' => '250x300',
					'description' => 'Set dimension',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Background',
					'param_name' => 'background_id',
					'description' => 'Add background image',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Background color',
					'param_name' => 'background_color',
					'value' => '#E6E6E6',
					'description' => 'Set background color',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Background color for header and footer',
					'param_name' => 'background',
					'value' => '#1d5aa3',
					'description' => 'Set header and footer background color',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Logo',
					'param_name' => 'logo_id',
					'value' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg',
					'description' => 'Add logo',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Title',
					'param_name' => 'title',
					'value' => 'Support my work',
					'description' => 'Set title',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Title text color',
					'param_name' => 'title_text_color',
					'value' => '#ffffff',
					'description' => 'Set title text color',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Description',
					'param_name' => 'description',
					'value' => '',
					'description' => 'Set description',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Description text color',
					'param_name' => 'description_text_color',
					'value' => '#000000',
					'description' => 'Set description text color',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Tipping text',
					'param_name' => 'tipping_text',
					'value' => 'Enter Tipping Amount',
					'description' => 'Set tipping text',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Tipping text color',
					'param_name' => 'tipping_text_color',
					'value' => '#000000',
					'description' => 'Set tipping text color',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Redirect',
					'param_name' => 'redirect',
					'description' => 'Set redirect link',
				),


				array(
					'type' => 'dropdown',
					'heading' => 'Currency',
					'param_name' => 'currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set currency',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Input color',
					'param_name' => 'input_background',
					'value' => '#ffa500',
					'description' => 'Set background color for input fields',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Button text',
					'param_name' => 'button_text',
					'value' => 'Tipping now',
					'description' => 'Set button text',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Button text color',
					'param_name' => 'button_text_color',
					'value' => '#ffffff',
					'description' => 'Set button text color',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Button color',
					'param_name' => 'button_color',
					'value' => '#FE642E',
					'description' => 'Set button color',
				),

			),
		));
		vc_map(array(
			'name' => 'BTCPW Tipping Page',
			'base' => 'btcpw_tipping_page',
			'description' => 'Add Tipping Page',
			'category' => 'Content',
			'icon' => plugin_dir_url(__FILE__) . 'img/icon.svg',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => 'Dimension',
					'param_name' => 'dimension',
					'value' => '520x600',
					'description' => 'Dimension',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Background',
					'param_name' => 'background_id',
					'description' => 'Add background image',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Background color',
					'param_name' => 'background_color',
					'value' => '#E6E6E6',
					'description' => 'Set background color',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Background color for header and footer',
					'param_name' => 'background',
					'value' => '#1d5aa3',
					'description' => 'Set header and footer background color',
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Logo',
					'param_name' => 'logo_id',
					'value' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg',
					'description' => 'Add logo',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Title',
					'param_name' => 'title',
					'value' => 'Support my work',
					'description' => 'Set title',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Title text color',
					'param_name' => 'title_text_color',
					'value' => '#ffffff',
					'description' => 'Set title text color',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Description',
					'param_name' => 'description',
					'value' => '',
					'description' => 'Set description',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Description text color',
					'param_name' => 'description_text_color',
					'value' => '#000000',
					'description' => 'Set description text color',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Tipping text',
					'param_name' => 'tipping_text',
					'value' => 'Enter Tipping Amount',
					'description' => 'Set tipping text',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Tipping text color',
					'param_name' => 'tipping_text_color',
					'value' => '#000000',
					'description' => 'Set tipping text color',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Redirect',
					'param_name' => 'redirect',
					'description' => 'Set redirect link',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Free input',
					'param_name' => 'free_input',
					'value' => true,
					'std' => true,
					'description' => 'Display free input',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Currency',
					'param_name' => 'currency',
					'value' => array(
						'SATS' => 'SATS',
						'BTC'	=> 'BTC',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'SATS',
					'description' => 'Set currency',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Input color',
					'param_name' => 'input_background',
					'value' => '#ffa500',
					'description' => 'Set background color for input fields',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Show icon',
					'param_name' => 'show_icon',
					'value' => true,
					'std' => true,
					'description' => 'Display icons',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Value 1 enabled',
					'param_name' => 'value1_enabled',
					'value' => true,
					'std' => true,
					'description' => 'Display value 1',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 1 amount',
					'param_name' => 'value1_amount',
					'value' => 1000,
					'description' => 'Set amount for value 1',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Value 1 currency',
					'param_name' => 'value1_currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set value 1 currency',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 1 icon',
					'param_name' => 'value1_icon',
					'value' => 'fas fa-coffee',
					'description' => 'Set icon for value 1',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Value 2 enabled',
					'param_name' => 'value2_enabled',
					'value' => true,
					'std' => true,
					'description' => 'Display value 2',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 2 amount',
					'param_name' => 'value2_amount',
					'value' => 2000,
					'description' => 'Set amount for value 2',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Value 2 currency',
					'param_name' => 'value2_currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set value 2 currency',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 2 icon',
					'param_name' => 'value2_icon',
					'value' => 'fas fa-beer',
					'description' => 'Set icon for value 2',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Value 3 enabled',
					'param_name' => 'value3_enabled',
					'value' => true,
					'std' => true,
					'description' => 'Display value 3',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 3 amount',
					'param_name' => 'value3_amount',
					'value' => 3000,
					'description' => 'Set amount for value 3',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Value 3 currency',
					'param_name' => 'value3_currency',
					'value' => array(
						'Default' => 'SATS',
						'BTC'	=> 'BTC',
						'SATS' => 'SATS',
						'EUR' => 'EUR',
						'USD' => 'USD'
					),
					'std' => 'Default',
					'description' => 'Set value 3 currency',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Value 3 icon',
					'param_name' => 'value3_icon',
					'value' => 'fas fa-coffee',
					'description' => 'Set icon for value 3',
				),
				array(
					'type' => 'textarea',
					'heading' => 'Button text',
					'param_name' => 'button_text',
					'value' => 'Tipping now',
					'description' => 'Set button text',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Button text color',
					'param_name' => 'button_text_color',
					'value' => '#ffffff',
					'description' => 'Set button text color',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Button color',
					'param_name' => 'button_color',
					'value' => '#FE642E',
					'description' => 'Set button color',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Step1 text',
					'param_name' => 'step1',
					'value' => 'Pledge',
					'description' => 'Set text for step 2 on progress bar',
				),
				array(
					'type' => 'textfield',
					'heading' => 'Step2 text',
					'param_name' => 'step2',
					'value' => 'Info',
					'description' => 'Set text for step 2 on progress bar',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Color for active step',
					'param_name' => 'active_color',
					'value' => '#808080',
					'description' => 'Set color for active step',
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Color for inactive step',
					'param_name' => 'inactive_color',
					'value' => '#D3D3D3',
					'description' => 'Set color for active step',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display name',
					'param_name' => 'display_name',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory name',
					'param_name' => 'mandatory_name',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display email',
					'param_name' => 'display_email',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory email',
					'param_name' => 'mandatory_email',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display phone',
					'param_name' => 'display_phone',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory phone',
					'param_name' => 'mandatory_phone',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display address',
					'param_name' => 'display_address',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory address',
					'param_name' => 'mandatory_address',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Display message',
					'param_name' => 'display_message',
					'value' => true,
					'std' => true,
					'description' => 'Collect information',
				),
				array(
					'type' => 'checkbox',
					'heading' => 'Mandatory message',
					'param_name' => 'mandatory_message',
					'value' => false,
					'std' => false,
					'description' => 'Set as mandatory',
				),
			),
		));

		vc_map(array(
			'name' => 'BTCPW Shortcode List',
			'base' => 'btcpw_list_shortcodes',
			'description' => 'Shortcode list',
			'category' => 'Content',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => 'Shortcode',
					'param_name' => 'shortcode',
					'value' => BTCPayWall_Admin::allCreatedForms(),
					'description' => 'Shortcode',
				),
			)
		));
	}

	public function load_elementor_widgets()
	{
		require_once __DIR__ . '/elementor/class-start-content-widget.php';
		require_once __DIR__ . '/elementor/class-end-content-widget.php';
		require_once __DIR__ . '/elementor/class-pay-block-widget.php';
		require_once __DIR__ . '/elementor/class-start-video-widget.php';
		require_once __DIR__ . '/elementor/class-end-video-widget.php';
		require_once __DIR__ . '/elementor/class-file-widget.php';
		require_once __DIR__ . '/elementor/class-tipping-box-widget.php';
		require_once __DIR__ . '/elementor/class-tipping-banner-high-widget.php';
		require_once __DIR__ . '/elementor/class-tipping-banner-wide-widget.php';
		require_once __DIR__ . '/elementor/class-tipping-page-widget.php';
		require_once __DIR__ . '/elementor/class-tipping-shortcode-list-widget.php';

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Start_Content_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_End_Content_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Pay_Block_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Start_Video_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_End_Video_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_File_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Tipping_Box_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Tipping_Banner_High_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Tipping_Banner_Wide_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Tipping_Page_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Shortcode_List_Widget());
	}

	/**
	 * @return string[]|WP_Post_Type[]
	 */
	public static function get_allowed_post_types()
	{

		$post_types = get_post_types(['publicly_queryable' => true]);
		$post_types['page'] = 'page';

		$blocked_post_types = [
			'elementor_library',
			'e-landing-page',
			'attachment',
		];

		foreach ($blocked_post_types as $post_type) {
			if (isset($post_types[$post_type])) {
				unset($post_types[$post_type]);
			}
		}

		return $post_types;
	}
	public function render_gutenberg($atts)
	{
		$atts = shortcode_atts(array(
			'pay_block' => 'true',
			'btc_format' => '',
			'currency' => '',
			'price' => '',
			'duration_type' => '',
			'duration' => '',
		), $atts);


		return do_shortcode("[btcpw_start_content pay_block='{$atts['pay_block']}' btc_format='{$atts['btc_format']}' price='{$atts['price']}' duration_type='{$atts['duration_type']}' duration='{$atts['duration']}' currency='{$atts['currency']}']");
	}

	public function render_end_gutenberg()
	{
		return do_shortcode("[btcpw_end_content]");
	}
	public function render_shortcodes_gutenberg($atts)
	{
		$atts = shortcode_atts(array(
			'shortcode' => '',
		), $atts);
		return $atts['shortcode'];
		/* return do_shortcode("[btcpw_list_shortcodes shortcode='{$atts['shortcode']}']"); */
	}

	public function render_video_catalog_gutenberg()
	{
		return do_shortcode("[btcpw_video_catalog]");
	}
	public function render_file_gutenberg($atts)
	{
		$atts = shortcode_atts(array(
			'pay_file_block' => 'true',
			'btc_format' => '',
			'file' => '',
			'title' => 'Untitled',
			'description' => 'No description',
			'preview' => '',
			'currency' => '',
			'price' => '',
			'duration_type' => '',
			'duration' => '',
		), $atts);

		return do_shortcode("[btcpw_file pay_file_block='{$atts['pay_file_block']}' btc_format='{$atts['btc_format']}' file='{$atts['file']}' title='{$atts['title']}' description='{$atts['description']}' preview={$atts['preview']} price='{$atts['price']}' duration_type='{$atts['duration_type']}' duration='{$atts['duration']}' currency='{$atts['currency']}']");
	}
	public function render_start_video_gutenberg($atts)
	{
		$atts = shortcode_atts(array(
			'pay_view_block' => 'true',
			'btc_format' => '',
			'title' => 'Untitled',
			'description' => 'No description',
			'preview' => '',
			'currency' => '',
			'price' => '',
			'duration_type' => '',
			'duration' => '',
		), $atts);

		return do_shortcode("[btcpw_start_video pay_view_block='{$atts['pay_view_block']}' btc_format='{$atts['btc_format']}' title='{$atts['title']}' description='{$atts['description']}' preview={$atts['preview']} price='{$atts['price']}' duration_type='{$atts['duration_type']}' duration='{$atts['duration']}' currency='{$atts['currency']}']");
	}
	public function render_tipping_box($atts)
	{
		$atts = shortcode_atts(array(
			'dimension' =>  '250x300',
			'title' =>  'Support my work',
			'description' => '',
			'currency' => 'SATS',
			'background_color' =>  '#E6E6E6',
			'title_text_color' =>  '#ffffff',
			'tipping_text' =>  'Enter Tipping Amount',
			'tipping_text_color' =>  '#000000',
			'redirect' =>  false,
			'description_color' =>  '#000000',
			'button_text' => 'Tipping now',
			'button_text_color' =>  '#FFFFFF',
			'button_color' =>  '#FE642E',
			'logo_id' =>  '',
			'background_id' =>  '',
			'input_background' =>  '#ffa500',
			'background' =>  '#1d5aa3',
		), $atts);

		return do_shortcode("[btcpw_tipping_box dimension='{$atts['dimension']}' title = '{$atts['title']}' description='{$atts['description']}'
        currency = '{$atts['currency']}'
        background_color = '{$atts['background_color']}'
        title_text_color = '{$atts['title_text_color']}'
        tipping_text = '{$atts['tipping_text']}'
        tipping_text_color = '{$atts['tipping_text_color']}'
        redirect = '{$atts['redirect']}'
        description_color = '{$atts['description_color']}'
        button_text = '{$atts['button_text']}'
        button_text_color = '{$atts['button_text_color']}'
        button_color = '{$atts['button_color']}'
        logo_id = '{$atts['logo_id']}'
        background_id = '{$atts['background_id']}'
        background = '{$atts['background']}'
        input_background = '{$atts['input_background']}']");
	}
	public function render_tipping_banner_wide($atts)
	{
		$atts = shortcode_atts(array(
			'dimension' =>  '200x710',
			'title' =>  'Support my work',
			'description' =>  '',
			'currency' =>  'SATS',
			'background_color' =>  '#E6E6E6',
			'title_text_color' =>   '#ffffff',
			'tipping_text' =>  'Enter Tipping Amount',
			'tipping_text_color' =>  '#000000',
			'redirect' =>  false,
			'description_color' =>  '#000000',
			'button_text' =>  'Tipping now',
			'button_text_color' =>  '#FFFFFF',
			'button_color' =>  '#FE642E',
			'logo_id'	=> '',
			'background_id' =>  '',
			'free_input' =>  true,
			'input_background' =>  '#ffa500',
			'background' =>  '#1d5aa3',
			'value1_enabled' =>  true,
			'value1_amount' =>  1000,
			'value1_currency' =>  'SATS',
			'value1_icon' =>  'fas fa-coffee',
			'value2_enabled' =>  true,
			'value2_amount' =>  2000,
			'value2_currency' =>  'SATS',
			'value2_icon' =>  'fas fa-beer',
			'value3_enabled' =>  true,
			'value3_amount' =>  3000,
			'value3_currency' =>  'SATS',
			'value3_icon' =>  'fas fa-cocktail',
			'display_name' =>  true,
			'mandatory_name' =>  false,
			'display_email' =>  true,
			'mandatory_email' =>  false,
			'display_phone' =>  true,
			'mandatory_phone' =>  false,
			'display_address' =>  true,
			'mandatory_address' => false,
			'display_message' =>  true,
			'mandatory_message' => false,
			'show_icon'	=>  true,
		), $atts);
		return do_shortcode(
			"[btcpw_tipping_banner_wide dimension='{$atts['dimension']}' title='{$atts['title']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}'title_text_color='{$atts['title_text_color']}'tipping_text='{$atts['tipping_text']}'tipping_text_color= {$atts['tipping_text_color']}' redirect='{$atts['redirect']}' amount='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']}' free_input='{$atts['free_input']}' value1_enabled='{$atts['value1_enabled']}' value1_amount='{$atts['value1_amount']}' value1_currency='{$atts['value1_currency']}' value1_icon='{$atts['value1_icon']}' value2_enabled='{$atts['value2_enabled']}' value2_amount='{$atts['value2_amount']}' value2_currency='{$atts['value2_currency']}' value2_icon='{$atts['value2_icon']}' value3_enabled='{$atts['value3_enabled']}' value3_amount='{$atts['value3_amount']}' value3_currency='{$atts['value3_currency']}' value3_icon='{$atts['value3_icon']}' display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}' show_icon='{$atts['show_icon']}']"
		);
	}
	public function render_tipping_banner_high($atts)
	{
		$atts = shortcode_atts(array(
			'dimension' =>  '200x710',
			'title' =>  'Support my work',
			'description' =>  '',
			'currency' =>  'SATS',
			'background_color' =>  '#E6E6E6',
			'title_text_color' =>   '#ffffff',
			'tipping_text' =>  'Enter Tipping Amount',
			'tipping_text_color' =>  '#000000',
			'redirect' =>  false,
			'description_color' =>  '#000000',
			'button_text' =>  'Tipping now',
			'button_text_color' =>  '#FFFFFF',
			'button_color' =>  '#FE642E',
			'logo_id'	=> '',
			'background_id' =>  '',
			'free_input' =>  true,
			'input_background' =>  '#ffa500',
			'background' =>  '#1d5aa3',
			'value1_enabled' =>  true,
			'value1_amount' =>  1000,
			'value1_currency' =>  'SATS',
			'value1_icon' =>  'fas fa-coffee',
			'value2_enabled' =>  true,
			'value2_amount' =>  2000,
			'value2_currency' =>  'SATS',
			'value2_icon' =>  'fas fa-beer',
			'value3_enabled' =>  true,
			'value3_amount' =>  3000,
			'value3_currency' =>  'SATS',
			'value3_icon' =>  'fas fa-cocktail',
			'display_name' =>  true,
			'mandatory_name' =>  false,
			'display_email' =>  true,
			'mandatory_email' =>  false,
			'display_phone' =>  true,
			'mandatory_phone' =>  false,
			'display_address' =>  true,
			'mandatory_address' => false,
			'display_message' =>  true,
			'mandatory_message' => false,
			'show_icon'	=>  true,
		), $atts);

		return do_shortcode(
			"[btcpw_tipping_banner_high dimension='{$atts['dimension']}' title='{$atts['title']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}'title_text_color='{$atts['title_text_color']}'tipping_text='{$atts['tipping_text']}'tipping_text_color= {$atts['tipping_text_color']}' redirect='{$atts['redirect']}' amount='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']}' free_input='{$atts['free_input']}' value1_enabled='{$atts['value1_enabled']}' value1_amount='{$atts['value1_amount']}' value1_currency='{$atts['value1_currency']}' value1_icon='{$atts['value1_icon']}' value2_enabled='{$atts['value2_enabled']}' value2_amount='{$atts['value2_amount']}' value2_currency='{$atts['value2_currency']}' value2_icon='{$atts['value2_icon']}' value3_enabled='{$atts['value3_enabled']}' value3_amount='{$atts['value3_amount']}' value3_currency='{$atts['value3_currency']}' value3_icon='{$atts['value3_icon']}' display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}' show_icon='{$atts['show_icon']}']"
		);
	}

	public function render_tipping_pages($atts)
	{
		$atts = shortcode_atts(array(
			'dimension' =>  '520x600',
			'title' =>  'Support my work',
			'description' =>  '',
			'currency' =>  'SATS',
			'background_color' =>  '#E6E6E6',
			'title_text_color' =>   '#ffffff',
			'tipping_text' =>  'Enter Tipping Amount',
			'tipping_text_color' =>  '#000000',
			'redirect' =>  false,
			'description_color' =>  '#000000',
			'button_text' =>  'Tipping now',
			'button_text_color' =>  '#FFFFFF',
			'button_color' =>  '#FE642E',
			'logo_id'	=> '',
			'background_id' =>  '',
			'input_background' =>  '#ffa500',
			'background' =>  '#1d5aa3',
			'value1_enabled' =>  true,
			'value1_amount' =>  1000,
			'value1_currency' =>  'SATS',
			'value1_icon' =>  'fas fa-coffee',
			'value2_enabled' =>  true,
			'value2_amount' =>  2000,
			'value2_currency' =>  'SATS',
			'value2_icon' =>  'fas fa-beer',
			'value3_enabled' =>  true,
			'value3_amount' =>  3000,
			'value3_currency' =>  'SATS',
			'value3_icon' =>  'fas fa-cocktail',
			'display_name' =>  true,
			'mandatory_name' =>  false,
			'display_email' =>  true,
			'mandatory_email' =>  false,
			'display_phone' =>  true,
			'mandatory_phone' =>  false,
			'display_address' =>  true,
			'mandatory_address' => false,
			'display_message' =>  true,
			'mandatory_message' => false,
			'free_input' =>  true,
			'show_icon'	=>  true,
			'step1'	=> 'Pledge',
			'step2' => 'Info',
			'active_color' => '#808080',
			'inactive_color' => '#D3D3D3',
		), $atts);
		return do_shortcode(
			"[btcpw_tipping_page dimension='{$atts['dimension']}' title='{$atts['title']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}'title_text_color='{$atts['title_text_color']}'tipping_text='{$atts['tipping_text']}'tipping_text_color= {$atts['tipping_text_color']}' redirect='{$atts['redirect']}' amount='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']} value1_enabled='{$atts['value1_enabled']}' value1_amount='{$atts['value1_amount']}' value1_currency='{$atts['value1_currency']}' value1_icon='{$atts['value1_icon']}' value2_enabled='{$atts['value2_enabled']}' value2_amount='{$atts['value2_amount']}' value2_currency='{$atts['value2_currency']}' value2_icon='{$atts['value2_icon']}' value3_enabled='{$atts['value3_enabled']}' value3_amount='{$atts['value3_amount']}' value3_currency='{$atts['value3_currency']}' value3_icon='{$atts['value3_icon']}' display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}' show_icon='{$atts['show_icon']}' step1='{$atts['step1']}' step2='{$atts['step2']}' active_color='{$atts['active_color']}' inactive_color='{$atts['inactive_color']}' free_input='{$atts['free_input']}']"
		);
	}
	public function load_gutenberg()
	{
		$asset_file = include(plugin_dir_path(__FILE__) . 'gutenberg/index.asset.php');

		wp_register_script(
			'gutenberg-block-script',
			plugin_dir_url(__FILE__) . 'gutenberg/index.js',
			$asset_file['dependencies'],
			$this->version
		);


		register_block_type(
			'btc-paywall/gutenberg-start-block',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_gutenberg')),
				'attributes'	=> array(
					'className' => array(
						'default' => '',
						'type' => 'string'
					),
					'pay_block' =>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'btc_format' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'currency' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'price' =>  array(
						'type'	=> 'string',
						'default' => '1000'
					),
					'duration' =>  array(
						'type'	=> 'string',
						'default' => '20'
					),
					'duration_type' =>  array(
						'type'	=> 'string',
						'default' => 'minute'
					),
				)
			]
		);

		register_block_type(
			'btc-paywall/gutenberg-end-block',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_end_gutenberg')),
			]
		);


		register_block_type(
			'btc-paywall/gutenberg-start-video-block',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_start_video_gutenberg')),
				'attributes'	=> array(
					'className' => array(
						'default' => '',
						'type' => 'string'
					),
					'pay_block' =>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'btc_format' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'title' => array(
						'type'	=> 'string',
						'default' => 'Untitled'
					),
					'description' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'preview' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'currency' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'price' =>  array(
						'type'	=> 'string',
						'default' => '1000'
					),
					'duration' =>  array(
						'type'	=> 'string',
						'default' => '20'
					),
					'duration_type' =>  array(
						'type'	=> 'string',
						'default' => 'minute'
					),
				)
			]
		);

		register_block_type(
			'btc-paywall/gutenberg-end-video-block',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_end_gutenberg')),
			]
		);
		register_block_type(
			'btc-paywall/gutenberg-shortcode-list',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_shortcodes_gutenberg')),
			]
		);
		register_block_type(
			'btc-paywall/gutenberg-file-block',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_file_gutenberg')),
				'attributes'	=> array(
					'className' => array(
						'default' => '',
						'type' => 'string'
					),
					'pay_file_block' =>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'btc_format' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'file' => array(
						'type'	=> 'string',
						'default' => 'paywall_example.pdf'
					),
					'title' => array(
						'type'	=> 'string',
						'default' => 'Untitled'
					),
					'description' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'preview' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'currency' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'price' =>  array(
						'type'	=> 'string',
						'default' => '1000'
					),
					'duration' =>  array(
						'type'	=> 'string',
						'default' => '20'
					),
					'duration_type' =>  array(
						'type'	=> 'string',
						'default' => 'minute'
					),
				)
			]
		);

		register_block_type(
			'btc-paywall/gutenberg-tipping-box',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_tipping_box')),
				'attributes'	=> array(
					'className' => array(
						'default' => '',
						'type' => 'string'
					),
					'dimension' =>  array(
						'type'	=> 'string',
						'default' => '250x300'
					),
					'title' =>  array(
						'type'	=> 'string',
						'default' => 'Support my work'
					),
					'description' => array(
						'type'	=> 'string',
						'default' => ''
					),
					'currency' => array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'background_color' =>  array(
						'type'	=> 'string',
						'default' => '#E6E6E6'
					),
					'title_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#ffffff'
					),
					'tipping_text' =>  array(
						'type'	=> 'string',
						'default' => 'Enter Tipping Amount'
					),
					'tipping_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#000000'
					),
					'redirect' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'description_color' =>  array(
						'type'	=> 'string',
						'default' => '#000000'
					),
					'button_text' => array(
						'type'	=> 'string',
						'default' => 'Tipping now'
					),
					'button_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#FFFFFF'
					),
					'button_color' =>  array(
						'type'	=> 'string',
						'default' => '#FE642E'
					),
					'logo_id' =>  array(
						'type'	=> 'string',
						'default' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg'
					),
					'background_id' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'input_background' =>  array(
						'type'	=> 'string',
						'default' => '#ffa500'
					),
					'background' =>  array(
						'type'	=> 'string',
						'default' => '#1d5aa3'
					)
				)
			]
		);

		register_block_type(
			'btc-paywall/gutenberg-tipping-banner-wide',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_tipping_banner_wide')),
				'attributes'	=> array(
					'className' => array(
						'default' => '',
						'type' => 'string'
					),
					'dimension' =>  array(
						'type'	=> 'string',
						'default' => '600x280'
					),
					'title' =>  array(
						'type'	=> 'string',
						'default' => 'Support my work'
					),
					'description' => array(
						'type'	=> 'string',
						'default' => ''
					),
					'currency' => array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'background_color' =>  array(
						'type'	=> 'string',
						'default' => '#E6E6E6'
					),
					'title_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#ffffff'
					),
					'tipping_text' =>  array(
						'type'	=> 'string',
						'default' => 'Enter Tipping Amount'
					),
					'tipping_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#000000'
					),
					'redirect' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'description_color' =>  array(
						'type'	=> 'string',
						'default' => '#000000'
					),
					'button_text' => array(
						'type'	=> 'string',
						'default' => 'Tipping now'
					),
					'button_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#FFFFFF'
					),
					'button_color' =>  array(
						'type'	=> 'string',
						'default' => '#FE642E'
					),
					'logo_id' =>  array(
						'type'	=> 'string',
						'default' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg'
					),
					'background_id' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'input_background' =>  array(
						'type'	=> 'string',
						'default' => '#ffa500'
					),
					'background' =>  array(
						'type'	=> 'string',
						'default' => '#1d5aa3'
					),
					'value1_enabled' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'value1_amount' =>  array(
						'type'	=> 'string',
						'default' => '1000'
					),
					'value1_currency' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'value1_icon' =>  array(
						'type'	=> 'string',
						'default' => 'fas fa-coffee'
					),
					'value2_enabled' =>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'value2_amount' => array(
						'type'	=> 'string',
						'default' => '2000'
					),
					'value2_currency' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'value2_icon' =>  array(
						'type'	=> 'string',
						'default' => 'fas fa-beer'
					),
					'value3_enabled' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'value3_amount' =>  array(
						'type'	=> 'string',
						'default' => '3000'
					),
					'value3_currency' => array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'value3_icon' =>  array(
						'type'	=> 'string',
						'default' => 'fas fa-cocktail'
					),
					'display_name' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_name' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_email' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_email' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_phone' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_phone' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_address' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_address' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_message' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_message' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'show_icon'	=>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'free_input'	=>  array(
						'type'	=> 'boolean',
						'default' => true
					),
				)
			]
		);

		register_block_type(
			'btc-paywall/gutenberg-tipping-banner-high',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_tipping_banner_high')),
				'attributes'	=> array(
					'className' => array(
						'type' => 'string',
						'default' => '',
					),
					'dimension' =>  array(
						'type'	=> 'string',
						'default' => '200x710'
					),
					'title' =>  array(
						'type'	=> 'string',
						'default' => 'Support my work'
					),
					'description' => array(
						'type'	=> 'string',
						'default' => ''
					),
					'currency' => array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'background_color' =>  array(
						'type'	=> 'string',
						'default' => '#E6E6E6'
					),
					'title_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#ffffff'
					),
					'tipping_text' =>  array(
						'type'	=> 'string',
						'default' => 'Enter Tipping Amount'
					),
					'tipping_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#000000'
					),
					'redirect' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'description_color' =>  array(
						'type'	=> 'string',
						'default' => '#000000'
					),
					'button_text' => array(
						'type'	=> 'string',
						'default' => 'Tipping now'
					),
					'button_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#FFFFFF'
					),
					'button_color' =>  array(
						'type'	=> 'string',
						'default' => '#FE642E'
					),
					'logo_id' =>  array(
						'type'	=> 'string',
						'default' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg'
					),
					'background_id' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'input_background' =>  array(
						'type'	=> 'string',
						'default' => '#ffa500'
					),
					'background' =>  array(
						'type'	=> 'string',
						'default' => '#1d5aa3'
					),
					'value1_enabled' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'value1_amount' =>  array(
						'type'	=> 'string',
						'default' => '1000'
					),
					'value1_currency' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'value1_icon' =>  array(
						'type'	=> 'string',
						'default' => 'fas fa-coffee'
					),
					'value2_enabled' =>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'value2_amount' => array(
						'type'	=> 'string',
						'default' => '2000'
					),
					'value2_currency' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'value2_icon' =>  array(
						'type'	=> 'string',
						'default' => 'fas fa-beer'
					),
					'value3_enabled' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'value3_amount' =>  array(
						'type'	=> 'string',
						'default' => '3000'
					),
					'value3_currency' => array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'value3_icon' =>  array(
						'type'	=> 'string',
						'default' => 'fas fa-cocktail'
					),
					'display_name' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_name' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_email' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_email' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_phone' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_phone' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_address' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_address' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_message' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_message' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'show_icon'	=>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'free_input'	=>  array(
						'type'	=> 'boolean',
						'default' => true
					),
				)
			]
		);

		register_block_type(
			'btc-paywall/gutenberg-tipping-page',
			[
				'editor_script' => 'gutenberg-block-script',
				'render_callback' => (array($this, 'render_tipping_pages')),
				'attributes'	=> array(
					'className' => array(
						'default' => '',
						'type' => 'string'
					),
					'dimension' =>  array(
						'type'	=> 'string',
						'default' => '200x710'
					),
					'title' =>  array(
						'type'	=> 'string',
						'default' => 'Support my work'
					),
					'description' => array(
						'type'	=> 'string',
						'default' => ''
					),
					'currency' => array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'background_color' =>  array(
						'type'	=> 'string',
						'default' => '#E6E6E6'
					),
					'title_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#ffffff'
					),
					'tipping_text' =>  array(
						'type'	=> 'string',
						'default' => 'Enter Tipping Amount'
					),
					'tipping_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#000000'
					),
					'redirect' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'description_color' =>  array(
						'type'	=> 'string',
						'default' => '#000000'
					),
					'button_text' => array(
						'type'	=> 'string',
						'default' => 'Tipping now'
					),
					'button_text_color' =>  array(
						'type'	=> 'string',
						'default' => '#FFFFFF'
					),
					'button_color' =>  array(
						'type'	=> 'string',
						'default' => '#FE642E'
					),
					'logo_id' =>  array(
						'type'	=> 'string',
						'default' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg'
					),
					'background_id' =>  array(
						'type'	=> 'string',
						'default' => ''
					),
					'input_background' =>  array(
						'type'	=> 'string',
						'default' => '#ffa500'
					),
					'background' =>  array(
						'type'	=> 'string',
						'default' => '#1d5aa3'
					),
					'value1_enabled' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'value1_amount' =>  array(
						'type'	=> 'string',
						'default' => '1000'
					),
					'value1_currency' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'value1_icon' =>  array(
						'type'	=> 'string',
						'default' => 'fas fa-coffee'
					),
					'value2_enabled' =>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'value2_amount' => array(
						'type'	=> 'string',
						'default' => '2000'
					),
					'value2_currency' =>  array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'value2_icon' =>  array(
						'type'	=> 'string',
						'default' => 'fas fa-beer'
					),
					'value3_enabled' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'value3_amount' =>  array(
						'type'	=> 'string',
						'default' => '3000'
					),
					'value3_currency' => array(
						'type'	=> 'string',
						'default' => 'SATS'
					),
					'value3_icon' =>  array(
						'type'	=> 'string',
						'default' => 'fas fa-cocktail'
					),
					'display_name' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_name' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_email' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_email' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_phone' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_phone' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_address' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_address' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'display_message' => array(
						'type'	=> 'boolean',
						'default' => true
					),
					'mandatory_message' => array(
						'type'	=> 'boolean',
						'default' => false
					),
					'show_icon'	=>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'free_input'	=>  array(
						'type'	=> 'boolean',
						'default' => true
					),
					'step1' =>  array(
						'type'	=> 'string',
						'default' => 'Pledge'
					),
					'step2' =>  array(
						'type'	=> 'string',
						'default' => 'Infp'
					),
					'active_color' =>  array(
						'type'	=> 'string',
						'default' => '#808080'
					),
					'inactive_color' =>  array(
						'type'	=> 'string',
						'default' => '#D3D3D3'
					),
				)
			]
		);
	}
	public function wpdocs_register_widgets()
	{
		require_once __DIR__ . '/widgets/tipping_box.php';
		require_once __DIR__ . '/widgets/tipping_banner_wide.php';
		require_once __DIR__ . '/widgets/tipping_banner_high.php';
		register_widget(new Tipping_Box());
		register_widget(new Tipping_Banner_Wide());
		register_widget(new Tipping_Banner_High());
	}

	public function register_shortcode_list()
	{
		register_rest_route(
			$this->plugin_name,
			'/shortcode-list/v1',
			array(
				'methods'             => 'GET',
				'callback'            => array($this, 'allCreatedForms'),
				'permission_callback' => function () {
					return current_user_can('edit_posts');
				},
			)
		);
	}
	public function add_my_media_button()
	{
		$shortcodes = BTCPayWall_Admin::allCreatedForms();
		$shortcodes_list = '';
		echo '<div id=btcpw_shortcodes>';
		echo '<button type=button id=btcpw_shortcode_button>BTCPayWall Shortcode</button>';
		/* echo '&nbsp;<select id="sc_select" style=display:none;>';

		foreach ($shortcodes as $val) {
			$shortcodes_list .= "<option value='{$val}'>$val</option>";
		}

		echo $shortcodes_list;
		echo '</select>'; */
		echo '<div id=sc_menu style=display:none;>';
		foreach ($shortcodes as $val) {
			$shortcodes_list .= "<div class=sc_menu_item btcpw_shortcode data='{$val}'>$val</div>";
		}

		echo $shortcodes_list;
		echo '</div>';
		echo '</div>';
	}
}
