<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_Pay_Per_Shortcode
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0.9
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Pay_Per_Shortcode
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
    public $header_text = 'Pay to see';
    public $info_text = 'For {price} {currency} you will have access for {duration} {dtype}.';
    public $header_color = '#000000';
    public $info_color = '#000000';
    public $button_color = '#f6b330';
    public $button_text = 'Pay';
    public $button_txt_color = '#ffffff';
    public $continue_button_text = 'Continue';
    public $continue_button_text_color = '#ffffff';
    public $continue_button_color = '#fe642e';
    public $previous_button_text = 'Previous';
    public $previous_button_text_color = '#1d5aa3';
    public $previous_button_color = '#ffffff';
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

        /* if ($this->id != 0 || empty($data)) {
            return false;
        } */
        if (empty($data)) {
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
    /**
     * @since 1.0.9
     */
    public function shortcode()
    {
        if ($this->type === 'pay-per-post') {
            return  "[btcpw_start_content pay_block='{$this->pay_block}' btc_format='{$this->btc_format}' price='{$this->price}' header_text='{$this->header_text}' info_text='{$this->info_text}' header_color='{$this->header_color}' info_color='{$this->info_color}' duration_type='{$this->duration_type}' link='{$this->link}' help_link='{$this->help_link}' help_text='{$this->help_text}' additional_link='{$this->additional_link}' additional_help_link='{$this->additional_help_link}' additional_help_text='{$this->additional_help_text}' duration='{$this->duration}' currency='{$this->currency}'  button_text='{$this->button_text}' button_text_color='{$this->button_text_color}' button_color='{$this->button_color}' continue_button_text='{$this->continue_button_text}' continue_button_text_color='{$this->continue_button_text_color}' continue_button_color='{$this->continue_button_color}' previous_button_text='{$this->previous_button_text}' previous_button_text_color='{$this->previous_button_text_color}' previous_button_color='{$this->previous_button_color}'  display_name='{$this->display_name}' mandatory_name='{$this->mandatory_name}' display_email='{$this->display_email}' mandatory_email='{$this->mandatory_email}' display_phone='{$this->display_phone}' mandatory_phone='{$this->mandatory_phone}' display_address='{$this->display_address}' mandatory_address='{$this->mandatory_address}' display_message='{$this->display_message}' mandatory_message='{$this->mandatory_message}']
            Replace this text with content
            [btcpw_end_content]";
        }
        return  "[btcpw_start_video pay_view_block='{$this->pay_block}' btc_format='{$this->btc_format}' title='{$this->title}' description='{$this->description}' preview={$this->preview} price='{$this->price}' header_color='{$this->header_color}' info_color='{$this->info_color}' header_text='{$this->header_text}' info_text='{$this->info_text}' link='{$this->link}' help_link='{$this->help_link}' help_text='{$this->help_text}' additional_link='{$this->additional_link}' additional_help_link='{$this->additional_help_link}' additional_help_text='{$this->additional_help_text}' duration_type='{$this->duration_type}' duration='{$this->duration}' currency='{$this->currency}'  button_text='{$this->button_text}' button_text_color='{$this->button_text_color}' button_color='{$this->button_color}' continue_button_text='{$this->continue_button_text}' continue_button_text_color='{$this->continue_button_text_color}' continue_button_color='{$this->continue_button_color}' previous_button_text='{$this->previous_button_text}' previous_button_text_color='{$this->previous_button_text_color}' previous_button_color='{$this->previous_button_color}'  display_name='{$this->display_name}' mandatory_name='{$this->mandatory_name}' display_email='{$this->display_email}' mandatory_email='{$this->mandatory_email}' display_phone='{$this->display_phone}' mandatory_phone='{$this->mandatory_phone}' display_address='{$this->display_address}' mandatory_address='{$this->mandatory_address}' display_message='{$this->display_message}' mandatory_message='{$this->mandatory_message}]
        Replace this text with video
        [btcpw_end_video]";
    }

    private function sanitize_columns($data)
    {

        $columns        = $this->db->get_columns();
        $default_values = $this->db->get_column_defaults();
        $boolean_values = [
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
                    if ($key == 'id') {
                        $data[$key] = (int)$data[$key];
                    } elseif (!in_array($key, $boolean_values)) {
                        $data[$key] = $default_values[$key];
                    } else {
                        $data[$key] = (bool)$data[$key];
                    }

                    break;
                case '%s':
                    if (substr($data[$key], 0, 1) === '#') {
                        $data[$key] = sanitize_hex_color($data[$key]);
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
