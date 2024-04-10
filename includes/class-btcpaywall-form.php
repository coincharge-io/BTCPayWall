<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_Tipping_Form
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Tipping_Form
{
    public $id = 0;
    public $name;
    public $form_name;
    public $dimension;
    public $redirect;
    public $title_text;
    public $description_text;
    public $button_text;
    public $tipping_text;
    public $title_text_color;
    public $description_text_color;
    public $button_text_color;
    public $button_color;
    public $tipping_text_color;
    public $background_color;
    public $input_background;
    public $hf_background;
    public $active_color;
    public $inactive_color;
    public $logo;
    public $background;
    public $collect_name;
    public $mandatory_name;
    public $collect_email;
    public $mandatory_email;
    public $collect_address;
    public $mandatory_address;
    public $collect_phone;
    public $mandatory_phone;
    public $collect_message;
    public $mandatory_message;
    public $value1_enabled;
    public $value1_currency;
    public $value1_amount;
    public $value1_icon;
    public $value2_enabled;
    public $value2_currency;
    public $value2_amount;
    public $value2_icon;
    public $value3_enabled;
    public $value3_currency;
    public $value3_amount;
    public $value3_icon;
    public $step1;
    public $step2;
    public $free_input;
    public $show_icon;
    public $currency;

    protected $db;


    public function __construct($form_id = false)
    {

        $this->db = new BTCPayWall_DB_Tipping_Forms;

        if ((is_numeric($form_id) && (int) $form_id !== absint($form_id)) || $form_id === false) {
            return false;
        }

        $form = $this->db->get_form_by($form_id);

        if (empty($form) || !is_object($form)) {
            return false;
        }

        $this->setup_form($form);
    }


    private function setup_form($form)
    {

        if (!is_object($form)) {
            return false;
        }
        $valid_keys = [
            'id',
            'time',
            'name',
            'form_name',
            'dimension',
            'redirect',
            'title_text',
            'description_text',
            'button_text',
            'tipping_text',
            'title_text_color',
            'description_text_color',
            'button_text_color',
            'button_color',
            'tipping_text_color',
            'background_color',
            'input_background',
            'hf_background',
            'active_color',
            'inactive_color',
            'logo',
            'background',
            'collect_name',
            'mandatory_name',
            'collect_email',
            'mandatory_email',
            'collect_address',
            'mandatory_address',
            'collect_phone',
            'mandatory_phone',
            'collect_message',
            'mandatory_message',
            'value1_enabled',
            'value1_currency',
            'value1_amount',
            'value1_icon',
            'value2_enabled',
            'value2_currency',
            'value2_amount',
            'value2_icon',
            'value3_enabled',
            'value3_currency',
            'value3_amount',
            'value3_icon',
            'step1',
            'step2',
            'free_input',
            'show_icon',
            'currency'
        ];

        foreach ($form as $key => $value) {
            if (in_array($key, $valid_keys)) {
                $this->$key = $value;
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

            $form = $this->db->get_form_by($create_or_update);

            $this->setup_form($form);

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

            $form = $this->db->get_form_by('id', $this->id);
            $this->setup_form($form);

            $updated = true;
        }


        return $updated;
    }


    public function get_forms($per_page = null, $page_number = null)
    {

        $forms = $this->db->get_forms($per_page, $page_number);

        return $forms;
    }

    private function get_type($dim)
    {
        return btcpaywall_extract_name($dim)['type'];
    }
    private function get_name($dim)
    {
        return btcpaywall_extract_name($dim)['name'];
    }
    public function form_count()
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
        $booleans = ['collect_name', 'collect_email', 'collect_phone', 'collect_address', 'collect_message', 'mandatory_name', 'mandatory_email', 'mandatory_phone', 'mandatory_address', 'mandatory_message', 'free_input', 'show_icon', 'value1_enabled', 'value2_enabled', 'value3_enabled'];

        if (!array_key_exists('dimension', $data)) {
            $data['dimension'] = '0x0';
        }

        foreach ($columns as $key => $type) {

            if (!array_key_exists($key, $data)) {
                continue;
            }

            switch ($type) {

                case '%s':
                    if (substr($data[$key], 0, 1) === '#') {
                        $data[$key] = sanitize_hex_color_no_hash($data[$key]);
                    } elseif ($key === 'dimension') {
                        $data[$key] = sanitize_text_field($data[$key]);
                        $data['type'] = $this->get_type(sanitize_text_field($data[$key]));
                        $data['name'] = $this->get_name(sanitize_text_field($data[$key]));
                    } elseif (!is_string($key)) {
                        $data[$key] = $default_values[$key];
                    } else {
                        $data[$key] = sanitize_text_field($data[$key]);
                    }
                    break;

                case '%d':

                    if (in_array($key, $booleans)) {
                        $data[$key] = (bool)$data[$key];
                    } else {
                        $data[$key] = absint($data[$key]);
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
