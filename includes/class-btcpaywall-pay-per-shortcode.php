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
if (!defined('ABSPATH')) {
    exit;
}


class BTCPayWall_Pay_Per_Shortcode
{
    public $id = 0;
    public $type;
    public $name;
    public $pay_block = true;
    public $width = 500;
    public $height = 600;
    public $currency = 'SATS';
    public $price = 1000;
    public $duration;
    public $duration_type = 'unlimited';
    public $background_color = '#ecf0f1';
    public $title = 'Untitled';
    public $title_color;
    public $description = 'No description';
    public $description_color;
    public $preview;
    public $header_text = 'Pay to see';
    public $info_text = 'For {price} {currency} you will have access for {duration} {dtype}.';
    public $header_color = '#000000';
    public $info_color = '#000000';
    public $button_color = '#f6b330';
    public $button_text = 'Pay';
    public $button_text_color = '#ffffff';
    public $button_color_hover = '#fff';
    public $continue_button_text = 'Continue';
    public $continue_button_text_color = '#ffffff';
    public $continue_button_color = '#fe642e';
    public $continue_button_color_hover = '#fff';
    public $previous_button_text = 'Previous';
    public $previous_button_text_color = '#ffffff';
    public $previous_button_color = '#1d5aa3';
    public $previous_button_color_hover = '#fff';
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
        $this->db = new BTCPayWall_DB_Pay_Per_Shortcode();

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
                $this->$key =   $value;
            }
        }
        if (!empty($this->id)) {
            return true;
        }
        return false;
    }
    public function get_pairs($customizable)
    {
        $pairs = [];

        foreach ($this as $key => $val) {
            if ($key === 'db') {
                continue;
            }
            if ($key === 'pay_block' && $customizable['type'] === 'pay_per_view') {
                $pairs['pay_view_block'] = $val;
                continue;
            }
            $pairs[$key] = $val;
        }
        $paywall_placeholder = $customizable['type'] === 'pay-per-post' ? 'payblock' : 'pay_view_block';
        $pairs[$paywall_placeholder] = $customizable['payblock'];
        $pairs['price'] = $customizable['price'];
        $pairs['currency'] = $customizable['currency'];
        $pairs['duration'] = $customizable['duration'];
        $pairs['duration_type'] = $customizable['duration_type'];
        $pairs['title'] = $customizable['title'];
        $pairs['description'] = $customizable['description'];
        $pairs['preview'] = $customizable['preview'];
        return $pairs;
    }



    public function create($data = array())
    {
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
    public function get_all_shortcodes($type)
    {
        $shortcodes = $this->db->get_all_shortcodes($type);

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
        $id = (int) $this->id;
        $payblock = filter_var($this->pay_block, FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false';
        $currency = $this->currency;
        $price = $this->price;
        $duration = $this->duration;
        $duration_type = $this->duration_type;
        if ($this->type === 'pay-per-post') {
            return  "[btcpw_start_content id='{$id}' payblock='{$payblock}' price='{$price}' currency='{$currency}' duration='{$duration}' duration_type='{$duration_type}']";
        }
        return  "[btcpw_start_video id='{$id}' pay_view_block='{$payblock}' price='{$price}' currency='{$currency}' duration='{$duration}' duration_type='{$duration_type}' title='{$this->title}' description='{$this->description}' preview='{$this->preview}']";
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
