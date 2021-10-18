<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;




function sanitize_number($value)
{
    return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
}
function validate_textarea($values)
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

function sanitize_btcpay_server_url($value)
{

    $value = sanitize_text_field($value);

    return trim($value, '/');
}

function sanitize_btcpay_auth_key($value)
{
    $value = sanitize_text_field($value);

    return $value;
}


function sanitize_payblock_area($value)
{

    $value = sanitize_textarea_field($value);

    return $value;
}

function sanitize_color($value)
{

    $value = sanitize_hex_color($value);

    return $value;
}

function sanitize_text($value)
{

    $value = sanitize_text_field($value);

    return $value;
}

function sanitize_boolean($value)
{

    return (isset($value) ? true : false);
}
function render_general_settings_page()
{
    include 'partials/page-general-settings.php';
}
function render_edit_page()
{
    include 'partials/page-tipping-edit.php';
}


function render_new_form()
{
    include 'partials/page-add-form.php';
}

