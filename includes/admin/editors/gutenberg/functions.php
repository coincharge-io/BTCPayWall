<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions/Gutenberg
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

function btcpaywall_render_gutenberg($atts)
{
	$atts = shortcode_atts(array(
		'pay_block' => 'true',
		'btc_format' => '',
		'currency' => '',
		'price' => '',
		'duration_type' => '',
		'duration' => '',
		'header_text' => 'Pay now to unlock blogpost',
		'info_text' => '',
		'header_color' => '',
		'info_color' => '',
		'link'    => true,
		'help_link'    => '',
		'help_text'    => 'Help',
		'additional_link'    => false,
		'additional_help_link'    => '',
		'additional_help_text'    => '',
		'button_text' =>  'Pay',
		'button_text_color' =>  '#FFFFFF',
		'button_color' =>  '#FE642E',
		'continue_button_text' => 'Continue',
		'continue_button_text_color' =>  '#FFFFFF',
		'continue_button_color' => '#FE642E',
		'previous_button_text' => 'Previous',
		'previous_button_text_color' => '#FFFFFF',
		'previous_button_color' => '#1d5aa3',
		'selected_amount_background' => '#000',
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
	), $atts);

	return do_shortcode("[btcpw_start_content pay_block='{$atts['pay_block']}' btc_format='{$atts['btc_format']}' price='{$atts['price']}' header_text='{$atts['header_text']}' info_text='{$atts['info_text']}' header_color='{$atts['header_color']}' info_color='{$atts['info_color']}'
	duration_type='{$atts['duration_type']}' link='{$atts['link']}' help_link='{$atts['help_link']}' help_text='{$atts['help_text']}' additional_link='{$atts['additional_link']}' additional_help_link='{$atts['additional_help_link']}' additional_help_text='{$atts['additional_help_text']}' duration='{$atts['duration']}' currency='{$atts['currency']}'  button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}'  display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}']");
}
function btcpaywall_render_end_gutenberg()
{
	return do_shortcode("[btcpw_end_content]");
}

function btcpaywall_render_shortcodes_gutenberg($atts)
{
	$atts = shortcode_atts(array(
		'shortcode' => '',
	), $atts);
	return $atts['shortcode'];
}


function btcpaywall_render_file_gutenberg($atts)
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
function btcpaywall_render_start_video_gutenberg($atts)
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
		'header_text' => 'Pay now to watch the whole video',
		'info_text' => '',
		'header_color' => '',
		'info_color' => '',
		'link'    => true,
		'help_link'    => '',
		'help_text'    => 'Help',
		'additional_link'    => false,
		'additional_help_link'    => '',
		'additional_help_text'    => '',
		'button_text' =>  'Pay',
		'button_text_color' =>  '#FFFFFF',
		'button_color' =>  '#FE642E',
		'continue_button_text' => 'Continue',
		'continue_button_text_color' =>  '#FFFFFF',
		'continue_button_color' => '#FE642E',
		'previous_button_text' => 'Previous',
		'previous_button_text_color' => '#FFFFFF',
		'previous_button_color' => '#1d5aa3',
		'selected_amount_background' => '#000',
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
	), $atts);

	return do_shortcode("[btcpw_start_video pay_view_block='{$atts['pay_view_block']}' btc_format='{$atts['btc_format']}' title='{$atts['title']}' description='{$atts['description']}' preview={$atts['preview']} price='{$atts['price']}' header_color='{$atts['header_color']}' info_color='{$atts['info_color']}'
	header_text='{$atts['header_text']}' info_text='{$atts['info_text']}' link='{$atts['link']}' help_link='{$atts['help_link']}' help_text='{$atts['help_text']}' additional_link='{$atts['additional_link']}' additional_help_link='{$atts['additional_help_link']}' additional_help_text='{$atts['additional_help_text']}' duration_type='{$atts['duration_type']}' duration='{$atts['duration']}' currency='{$atts['currency']}'  button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}'  display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}']");
}
function btcpaywall_render_tipping_box($atts)
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

	return do_shortcode("[btcpw_tipping_box dimension='{$atts['dimension']}' title = '{$atts['title']}' description='{$atts['description']}' currency = '{$atts['currency']}' background_color = '{$atts['background_color']}' title_text_color = '{$atts['title_text_color']}' tipping_text = '{$atts['tipping_text']}' tipping_text_color = '{$atts['tipping_text_color']}' redirect = '{$atts['redirect']}' description_color = '{$atts['description_color']}' button_text = '{$atts['button_text']}' button_text_color = '{$atts['button_text_color']}' button_color = '{$atts['button_color']}' logo_id = '{$atts['logo_id']}' background_id = '{$atts['background_id']}' background = '{$atts['background']}' input_background = '{$atts['input_background']}']");
}
function btcpaywall_render_tipping_banner_wide($atts)
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
		'continue_button_text' => 'Continue',
		'continue_button_text_color' =>  '#FFFFFF',
		'continue_button_color' => '#FE642E',
		'previous_button_text' => 'Previous',
		'previous_button_text_color' => '#FFFFFF',
		'previous_button_color' => '#1d5aa3',
		'selected_amount_background' => '#000',
	), $atts);

	return do_shortcode(
		"[btcpw_tipping_banner_wide dimension='{$atts['dimension']}' title='{$atts['title']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}' title_text_color='{$atts['title_text_color']}' tipping_text='{$atts['tipping_text']}' tipping_text_color= {$atts['tipping_text_color']}' redirect='{$atts['redirect']}' amount='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']}' free_input='{$atts['free_input']}' value1_enabled='{$atts['value1_enabled']}' value1_amount='{$atts['value1_amount']}' value1_currency='{$atts['value1_currency']}' value1_icon='{$atts['value1_icon']}' value2_enabled='{$atts['value2_enabled']}' value2_amount='{$atts['value2_amount']}' value2_currency='{$atts['value2_currency']}' value2_icon='{$atts['value2_icon']}' value3_enabled='{$atts['value3_enabled']}' value3_amount='{$atts['value3_amount']}' value3_currency='{$atts['value3_currency']}' value3_icon='{$atts['value3_icon']}' display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}' show_icon='{$atts['show_icon']}' continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}' selected_amount_background='{$atts['selected_amount_background']}']"
	);
}
function btcpaywall_render_tipping_banner_high($atts)
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
		'continue_button_text' => 'Continue',
		'continue_button_text_color' =>  '#FFFFFF',
		'continue_button_color' => '#FE642E',
		'previous_button_text' => 'Previous',
		'previous_button_text_color' => '#FFFFFF',
		'previous_button_color' => '#1d5aa3',
		'selected_amount_background' => '#000',
	), $atts);

	return do_shortcode(
		"[btcpw_tipping_banner_high dimension='{$atts['dimension']}' title='{$atts['title']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}' title_text_color='{$atts['title_text_color']}' tipping_text='{$atts['tipping_text']}' tipping_text_color= {$atts['tipping_text_color']}' redirect='{$atts['redirect']}' amount='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']}' free_input='{$atts['free_input']}' value1_enabled='{$atts['value1_enabled']}' value1_amount='{$atts['value1_amount']}' value1_currency='{$atts['value1_currency']}' value1_icon='{$atts['value1_icon']}' value2_enabled='{$atts['value2_enabled']}' value2_amount='{$atts['value2_amount']}' value2_currency='{$atts['value2_currency']}' value2_icon='{$atts['value2_icon']}' value3_enabled='{$atts['value3_enabled']}' value3_amount='{$atts['value3_amount']}' value3_currency='{$atts['value3_currency']}' value3_icon='{$atts['value3_icon']}' display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}' show_icon='{$atts['show_icon']}' continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}' selected_amount_background='{$atts['selected_amount_background']}']"
	);
}

function btcpaywall_render_tipping_pages($atts)
{
	$atts = shortcode_atts(array(
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
		'continue_button_text' => 'Continue',
		'continue_button_text_color' =>  '#FFFFFF',
		'continue_button_color' => '#FE642E',
		'previous_button_text' => 'Previous',
		'previous_button_text_color' => '#FFFFFF',
		'previous_button_color' => '#1d5aa3',
		'selected_amount_background' => '#000',

	), $atts);

	return do_shortcode(
		"[btcpw_tipping_page title='{$atts['title']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}' title_text_color='{$atts['title_text_color']}' tipping_text='{$atts['tipping_text']}' tipping_text_color='{$atts['tipping_text_color']}' redirect='{$atts['redirect']}' amount='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']}' value1_enabled='{$atts['value1_enabled']}' value1_amount='{$atts['value1_amount']}' value1_currency='{$atts['value1_currency']}' value1_icon='{$atts['value1_icon']}' value2_enabled='{$atts['value2_enabled']}' value2_amount='{$atts['value2_amount']}' value2_currency='{$atts['value2_currency']}' value2_icon='{$atts['value2_icon']}' value3_enabled='{$atts['value3_enabled']}' value3_amount='{$atts['value3_amount']}' value3_currency='{$atts['value3_currency']}' value3_icon='{$atts['value3_icon']}' display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}' show_icon='{$atts['show_icon']}' step1='{$atts['step1']}' step2='{$atts['step2']}' active_color='{$atts['active_color']}' inactive_color='{$atts['inactive_color']}' free_input='{$atts['free_input']}' continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}' selected_amount_background='{$atts['selected_amount_background']}']"
	);
}
