<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_Tipping_Pay_Per_Shortcode
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0.9
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Tipping_Pay_Per_Shortcode
{
    public $id = 0;
    public $type;
    public $name;
    public $pay_block = true;
    public $width = 500;
    public $height = 550;
    public $btc_format = 'SATS';
    public $currency = 'SATS';
    public $price = 1000;
    public $duration;
    public $duration_type = 'unlimited';
    public $background_color = '#ecf0f1';
    public $preview_title = 'Untitled';
    public $preview_title_color;
    public $preview_description = 'No description    ';
    public $preview_description_color;
    public $preview_image;
    public $header_text;
    public $info_text;
    public $header_color = '#000000';
    public $info_color = '#000000';
    public $button_color = '#f6b330';
    public $button_txt = 'Pay';
    public $button_txt_color = '#ffffff';
    public $link = true;
    public $help_link = 'https://btcpaywall.com/how-to-pay-at-the-bitcoin-paywall/';
    public $help_text = 'Help';
    public $additional_link = false;
    public $additional_help_link;
    public $additional_help_text;
    public $display_name = false;
    public $mandatory_name = false;
    public $display_email = false;
    public $mandatory_email = false;
    public $display_phone = false;
    public $mandatory_phone = false;
    public $display_address = false;
    public $mandatory_address = false;
    public $display_message = false;
    public $mandatory_message = false;
    public $continue_button_text = 'Continue';
    public $continue_button_text_color = '#ffffff';
    public $continue_button_color = '#fe642e';
    public $previous_button_text = 'Previous';
    public $previous_button_text_color = '#1d5aa3';
    public $previous_button_color = '#ffffff';

    protected $db;


    public function __construct($shortcode_id = false)
    {

        $this->db = new BTCPayWall_DB_Pay_Per_Shortcode;

        if ((is_numeric($shortcode_id) && (int) $shortcode_id !== absint($shortcode_id)) || $shortcode_id === false) {
            return false;
        }

        $shortcode = $this->db->get_shortcode_by($shortcode_id);

        if (empty($shortcode) || !is_object($shortcode)) {
            return false;
        }

        $this->setup_shortcode($shortcode);
    }


    private function setup_shortcode($shortcode)
    {

        if (!is_object($shortcode)) {
            return false;
        }


        foreach ($shortcode as $key => $value) {
            if (property_exists($this, $key)) {
                if (strpos($key, 'color') !== false) {
                    $this->$key =  "#{$value}";
                }
                $this->$key =  $value;
            }
        }
        if (!empty($this->id)) {
            return true;
        }

        return false;
    }



    public function create($data = array())
    {

        if ($this->id != 0 || empty($data)) {
            return false;
        }

        $data = $this->sanitize_columns($data);

        $created = false;
        $create_or_update = $this->db->add($data);

        if ($create_or_update) {

            $form = $this->db->get_shortcode_by($create_or_update);

            $this->setup_shortcode($form);

            $created = $this->id;
        }

        return $created;
    }

    public function update($data = array())
    {

        if (empty($data)) {
            return false;
        }

        $data = $this->sanitize_columns($data);

        $updated = false;

        if ($this->db->update($this->id, $data)) {

            $shortcode = $this->db->get_shortcode_by('id', $this->id);
            $this->setup_shortcode($shortcode);

            $updated = true;
        }


        return $updated;
    }


    public function get_shortcodes($per_page = null, $page_number = null)
    {

        $shortcodes = $this->db->get_shortcodes($per_page, $page_number);

        return $shortcodes;
    }


    public function shortcode_count()
    {
        return $this->db->record_count();
    }
    public function delete($id)
    {
        return $this->db->delete($id);
    }

    private function sanitize_columns($data)
    {

        $columns        = $this->db->get_columns();
        $default_values = $this->db->get_column_defaults();
        $booleans = [
            'pay_block',
            'link',
            'additional_link',
            'display_name',
            'mandatory_name',
            'display_email',
            'mandatory_email',
            'display_phone',
            'mandatory_phone',
            'display_address',
            'mandatory_address',
            'display_message',
            'mandatory_message'
        ];



        foreach ($columns as $key => $type) {

            if (!array_key_exists($key, $data)) {
                continue;
            }
            switch ($type) {
                case '%d':
                    if (in_array($key, $booleans)) {
                        $data[$key] = (bool)$data[$key];
                    } else {
                        $data[$key] = absint($data[$key]);
                    }

                    break;
                case '%s':
                    if (substr($data[$key], 0, 1) === '#') {
                        $data[$key] = sanitize_hex_color_no_hash($data[$key]);
                    } elseif (!is_string($key)) {
                        $data[$key] = $default_values[$key];
                    } else {
                        $data[$key] = sanitize_text_field($data[$key]);
                    }
                    break;



                case '%f':
                    $value = floatval($data[$key]);
                    if (!is_float($value)) {
                        $data[$key] = $default_values[$key];
                    } else {
                        $data[$key] = $value;
                    }
                    break;

                default:
                    $data[$key] = sanitize_text_field($data[$key]);
                    break;
            }
        }
        return $data;
    }
}
