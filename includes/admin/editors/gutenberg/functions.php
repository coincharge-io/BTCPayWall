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
if (!defined('ABSPATH')) {
    exit;
}

function btcpaywall_render_gutenberg($atts)
{
    $atts = shortcode_atts(array(
        'pay_block' => 'true',
        'width' => 500,
        'height' => 600,
        'background_color' => '',
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
        'button_color_hover' =>  '#e45a29j',
        'continue_button_text' => 'Continue',
        'continue_button_text_color' =>  '#FFFFFF',
        'continue_button_color' => '#FE642E',
        'continue_button_color_hover' =>  '#FFF',
        'previous_button_text' => 'Previous',
        'previous_button_text_color' => '#FFFFFF',
        'previous_button_color' => '#1d5aa3',
        'previous_button_color_hover' =>  '#FFF',
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

    return do_shortcode("[btcpw_start_content pay_block='{$atts['pay_block']}' width='{$atts['width']}' height='{$atts['height']}' background_color='{$atts['background_color']}' price='{$atts['price']}' header_text='{$atts['header_text']}' info_text='{$atts['info_text']}' header_color='{$atts['header_color']}' info_color='{$atts['info_color']}'
	duration_type='{$atts['duration_type']}' link='{$atts['link']}' help_link='{$atts['help_link']}' help_text='{$atts['help_text']}' additional_link='{$atts['additional_link']}' additional_help_link='{$atts['additional_help_link']}' additional_help_text='{$atts['additional_help_text']}' duration='{$atts['duration']}' currency='{$atts['currency']}' button_color_hover='{$atts['button_color_hover']}' continue_button_color_hover='{$atts['continue_button_color_hover']}' previous_button_color_hover='{$atts['previous_button_color_hover']}'
	button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}'  display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}']");
}
function btcpaywall_render_end_gutenberg()
{
    return do_shortcode("[btcpw_end_content]");
}

function btcpaywall_render_pay_per_post_templates_gutenberg($atts)
{
    $atts = shortcode_atts(array(
        'shortcode' => '',
        'override' => false,
        'pay_block' => false,
        'price' => '',
        'currency' => 'SATS',
        'duration' => '',
        'duration_type' => '',
    ), $atts);
    if ($atts['override']) {
        $split_shortcode = explode(" ", $atts['shortcode']);
        $payblock = $atts['pay_block'] != $split_shortcode[2] ? ("payblock={$atts['pay_block']}") : $split_shortcode[2];

        $price = (is_numeric($atts['price']) && $atts['price'] != $split_shortcode[3]) ? $atts['price'] : $split_shortcode[3];
        $currency = (in_array($atts['currency'], BTCPayWall::CURRENCIES) && $atts['currency'] != $split_shortcode[4]) ? $atts['currency'] : $split_shortcode[4];
        $duration = (is_numeric($atts['duration']) && $atts['duration'] != $split_shortcode[5]) ? $atts['duration'] : $split_shortcode[5];
        $duration_type = (in_array($atts['duration_type'], BTCPayWall::DURATIONS) && $atts['duration_type'] != $split_shortcode[6]) ? $atts['duration_type'] : $split_shortcode[6];
        return do_shortcode("[$split_shortcode[0] $split_shortcode[1] {$payblock} price='{$price}' currency='{$currency}' duration='{$duration}' duration_type='{$duration_type}']");
    }
    return do_shortcode("$atts[shortcode]");
}
function btcpaywall_render_pay_per_view_templates_gutenberg($atts)
{
    $atts = shortcode_atts(array(
        'shortcode' => '',
        'override' => false,
        'pay_block' => false,
        'price' => '',
        'currency' => 'SATS',
        'duration' => '',
        'duration_type' => '',
        'title' => '',
        'description' => 'preview',
        'preview' => ''
    ), $atts);
    //$trim_shortcode = trim($atts['shortcode'], '`{}`');
    $split_shortcode = explode(" ", $atts['shortcode']);
    $title = $atts['title'] !== $split_shortcode[7] ? $atts['title'] : $split_shortcode[7];
    $description = $atts['description'] !== $split_shortcode[8] ? $atts['description'] : $split_shortcode[8];
    $preview_image = ($atts['preview'] !== $split_shortcode[9]) ? $atts['preview'] : $split_shortcode[9];
    $additional = "title='{$title}' description='{$description}' preview='{$preview_image}'";
    if ($atts['override']) {
        $payblock = $atts['pay_block'] != $split_shortcode[2] ? ("pay_view_block={$atts['pay_block']}") : $split_shortcode[2];

        $price = (is_numeric($atts['price']) && $atts['price'] != $split_shortcode[3]) ? $atts['price'] : $split_shortcode[3];
        $currency = (in_array($atts['currency'], BTCPayWall::CURRENCIES) && $atts['currency'] != $split_shortcode[4]) ? $atts['currency'] : $split_shortcode[4];
        $duration = (is_numeric($atts['duration']) && $atts['duration'] != $split_shortcode[5]) ? $atts['duration'] : $split_shortcode[5];
        $duration_type = (in_array($atts['duration_type'], BTCPayWall::DURATIONS) && $atts['duration_type'] != $split_shortcode[6]) ? $atts['duration_type'] : $split_shortcode[6];
        //var_dump("[$split_shortcode[0] $split_shortcode[1] pay_view_block='{$payblock}' price='{$price}' currency='{$currency}' duration='{$duration}' duration_type='{$duration_type}' $additional]");
        return do_shortcode("$split_shortcode[0] $split_shortcode[1] {$payblock} price='{$price}' currency='{$currency}' duration='{$duration}' duration_type='{$duration_type}' $additional]");
    }
    return do_shortcode("[btcpw_start_video $split_shortcode[1] $split_shortcode[2] $split_shortcode[3] $split_shortcode[4] $split_shortcode[5] $split_shortcode[6] {$additional}]");
}



function btcpaywall_render_start_video_gutenberg($atts)
{
    $atts = shortcode_atts(array(
        'pay_view_block' => 'true',
        'width' => 500,
        'height' => 600,
        'background_color' => '',
        'title' => 'Untitled',
        'description' => 'No description',
        'title_color' => '',
        'description_color' => '',
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
        'button_color_hover' =>  '#e45a29j',
        'continue_button_text' => 'Continue',
        'continue_button_text_color' =>  '#FFFFFF',
        'continue_button_color' => '#FE642E',
        'continue_button_color_hover' =>  '#FFF',
        'previous_button_text' => 'Previous',
        'previous_button_text_color' => '#FFFFFF',
        'previous_button_color' => '#1d5aa3',
        'previous_button_color_hover' =>  '#FFF',
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
    return do_shortcode("[btcpw_start_video pay_view_block='{$atts['pay_view_block']}' width='{$atts['width']}' height='{$atts['height']}' background_color='{$atts['background_color']}' title='{$atts['title']}' description='{$atts['description']}' title_color='{$atts['title_color']}' description_color='{$atts['description_color']}' preview={$atts['preview']} price='{$atts['price']}' header_color='{$atts['header_color']}' info_color='{$atts['info_color']}'
	header_text='{$atts['header_text']}' info_text='{$atts['info_text']}' link='{$atts['link']}' help_link='{$atts['help_link']}' help_text='{$atts['help_text']}' additional_link='{$atts['additional_link']}' additional_help_link='{$atts['additional_help_link']}' additional_help_text='{$atts['additional_help_text']}' duration_type='{$atts['duration_type']}' duration='{$atts['duration']}' currency='{$atts['currency']}'  button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' button_color_hover='{$atts['button_color_hover']}' continue_button_color_hover='{$atts['continue_button_color_hover']}' previous_button_color_hover='{$atts['previous_button_color_hover']}'
	continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}'  display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}'  selected_amount_background='{$atts['selected_amount_background']}']");
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
        'button_color_hover' =>  '#e45a29j',
        'logo_id' =>  '',
        'background_id' =>  '',
        'input_background' =>  '#ffa500',
        'background' =>  '#1d5aa3',
    ), $atts);

    return do_shortcode("[btcpw_tipping_box dimension='{$atts['dimension']}' button_color_hover='{$atts['button_color_hover']}' title='{$atts['title']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}' title_text_color='{$atts['title_text_color']}' tipping_text='{$atts['tipping_text']}' tipping_text_color='{$atts['tipping_text_color']}' redirect='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']}']");
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
        'logo_id'    => '',
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
        'show_icon'    =>  true,
        'button_text' =>  'Tipping now',
        'button_text_color' =>  '#FFFFFF',
        'button_color' =>  '#FE642E',
        'button_color_hover' =>  '#e45a29j',
        'continue_button_text' => 'Continue',
        'continue_button_text_color' =>  '#FFFFFF',
        'continue_button_color' => '#FE642E',
        'continue_button_color_hover' =>  '#FFF',
        'previous_button_text' => 'Previous',
        'previous_button_text_color' => '#FFFFFF',
        'previous_button_color' => '#1d5aa3',
        'previous_button_color_hover' =>  '#FFF',
        'selected_amount_background' => '#000',
    ), $atts);

    return do_shortcode(
        "[btcpw_tipping_banner_wide dimension='{$atts['dimension']}'  button_color_hover='{$atts['button_color_hover']}' continue_button_color_hover='{$atts['continue_button_color_hover']}' previous_button_color_hover='{$atts['previous_button_color_hover']}' title='{$atts['title']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}' title_text_color='{$atts['title_text_color']}' tipping_text='{$atts['tipping_text']}' tipping_text_color= {$atts['tipping_text_color']}' redirect='{$atts['redirect']}' amount='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']}' free_input='{$atts['free_input']}' value1_enabled='{$atts['value1_enabled']}' value1_amount='{$atts['value1_amount']}' value1_currency='{$atts['value1_currency']}' value1_icon='{$atts['value1_icon']}' value2_enabled='{$atts['value2_enabled']}' value2_amount='{$atts['value2_amount']}' value2_currency='{$atts['value2_currency']}' value2_icon='{$atts['value2_icon']}' value3_enabled='{$atts['value3_enabled']}' value3_amount='{$atts['value3_amount']}' value3_currency='{$atts['value3_currency']}' value3_icon='{$atts['value3_icon']}' display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}' show_icon='{$atts['show_icon']}' continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}' selected_amount_background='{$atts['selected_amount_background']}']"
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
        'logo_id'    => '',
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
        'show_icon'    =>  true,
        'button_text' =>  'Tipping now',
        'button_text_color' =>  '#FFFFFF',
        'button_color' =>  '#FE642E',
        'button_color_hover' =>  '#e45a29j',
        'continue_button_text' => 'Continue',
        'continue_button_text_color' =>  '#FFFFFF',
        'continue_button_color' => '#FE642E',
        'continue_button_color_hover' =>  '#FFF',
        'previous_button_text' => 'Previous',
        'previous_button_text_color' => '#FFFFFF',
        'previous_button_color' => '#1d5aa3',
        'previous_button_color_hover' =>  '#FFF',
        'selected_amount_background' => '#000',
    ), $atts);

    return do_shortcode(
        "[btcpw_tipping_banner_high dimension='{$atts['dimension']}'  button_color_hover='{$atts['button_color_hover']}' continue_button_color_hover='{$atts['continue_button_color_hover']}' previous_button_color_hover='{$atts['previous_button_color_hover']}' title='{$atts['title']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}' title_text_color='{$atts['title_text_color']}' tipping_text='{$atts['tipping_text']}' tipping_text_color= {$atts['tipping_text_color']}' redirect='{$atts['redirect']}' amount='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']}' free_input='{$atts['free_input']}' value1_enabled='{$atts['value1_enabled']}' value1_amount='{$atts['value1_amount']}' value1_currency='{$atts['value1_currency']}' value1_icon='{$atts['value1_icon']}' value2_enabled='{$atts['value2_enabled']}' value2_amount='{$atts['value2_amount']}' value2_currency='{$atts['value2_currency']}' value2_icon='{$atts['value2_icon']}' value3_enabled='{$atts['value3_enabled']}' value3_amount='{$atts['value3_amount']}' value3_currency='{$atts['value3_currency']}' value3_icon='{$atts['value3_icon']}' display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}' show_icon='{$atts['show_icon']}' continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}' selected_amount_background='{$atts['selected_amount_background']}']"
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
        'logo_id'    => '',
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
        'show_icon'    =>  true,
        'step1'    => 'Pledge',
        'step2' => 'Info',
        'active_color' => '#808080',
        'inactive_color' => '#D3D3D3',
        'button_text' =>  'Tipping now',
        'button_text_color' =>  '#FFFFFF',
        'button_color' =>  '#FE642E',
        'button_color_hover' =>  '#e45a29j',
        'continue_button_text' => 'Continue',
        'continue_button_text_color' =>  '#FFFFFF',
        'continue_button_color' => '#FE642E',
        'continue_button_color_hover' =>  '#FFF',
        'previous_button_text' => 'Previous',
        'previous_button_text_color' => '#FFFFFF',
        'previous_button_color' => '#1d5aa3',
        'previous_button_color_hover' =>  '#FFF',
        'selected_amount_background' => '#000',

    ), $atts);

    return do_shortcode(
        "[btcpw_tipping_page title='{$atts['title']}'  button_color_hover='{$atts['button_color_hover']}' continue_button_color_hover='{$atts['continue_button_color_hover']}' previous_button_color_hover='{$atts['previous_button_color_hover']}' description='{$atts['description']}' currency='{$atts['currency']}' background_color='{$atts['background_color']}' title_text_color='{$atts['title_text_color']}' tipping_text='{$atts['tipping_text']}' tipping_text_color='{$atts['tipping_text_color']}' redirect='{$atts['redirect']}' amount='{$atts['redirect']}' description_color='{$atts['description_color']}' button_text='{$atts['button_text']}' button_text_color='{$atts['button_text_color']}' button_color='{$atts['button_color']}' logo_id='{$atts['logo_id']}' background_id='{$atts['background_id']}' background='{$atts['background']}' input_background='{$atts['input_background']}' value1_enabled='{$atts['value1_enabled']}' value1_amount='{$atts['value1_amount']}' value1_currency='{$atts['value1_currency']}' value1_icon='{$atts['value1_icon']}' value2_enabled='{$atts['value2_enabled']}' value2_amount='{$atts['value2_amount']}' value2_currency='{$atts['value2_currency']}' value2_icon='{$atts['value2_icon']}' value3_enabled='{$atts['value3_enabled']}' value3_amount='{$atts['value3_amount']}' value3_currency='{$atts['value3_currency']}' value3_icon='{$atts['value3_icon']}' display_name='{$atts['display_name']}' mandatory_name='{$atts['mandatory_name']}' display_email='{$atts['display_email']}' mandatory_email='{$atts['mandatory_email']}' display_phone='{$atts['display_phone']}' mandatory_phone='{$atts['mandatory_phone']}' display_address='{$atts['display_address']}' mandatory_address='{$atts['mandatory_address']}' display_message='{$atts['display_message']}' mandatory_message='{$atts['mandatory_message']}' show_icon='{$atts['show_icon']}' step1='{$atts['step1']}' step2='{$atts['step2']}' active_color='{$atts['active_color']}' inactive_color='{$atts['inactive_color']}' free_input='{$atts['free_input']}' continue_button_text='{$atts['continue_button_text']}' continue_button_text_color='{$atts['continue_button_text_color']}' continue_button_color='{$atts['continue_button_color']}' previous_button_text='{$atts['previous_button_text']}' previous_button_text_color='{$atts['previous_button_text_color']}' previous_button_color='{$atts['previous_button_color']}' selected_amount_background='{$atts['selected_amount_background']}']"
    );
}
