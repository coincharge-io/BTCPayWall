<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_Tipper
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Tipper
{


    public $id = 0;
    public $full_name;
    public $email;
    public $address;
    public $phone;
    public $message;

    protected $db;


    public function __construct($tipper_id = false)
    {

        $this->db = new BTCPayWall_DB_Tippers;

        if ((is_numeric($tipper_id) && (int) $tipper_id !== absint($tipper_id)) || $tipper_id === false) {
            return false;
        }

        $tipper = $this->db->get_tipper_by('id', $tipper_id);

        if (empty($tipper) || !is_object($tipper)) {
            return false;
        }

        $this->setup_tipper($tipper);
    }


    private function setup_tipper($tipper)
    {

        if (!is_object($tipper)) {
            return false;
        }
        $valid_keys = ['id', 'full_name', 'email', 'address', 'phone', 'message'];

        foreach ($tipper as $key => $value) {
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


            $tipper = $this->db->get_tipper_by('id', $create_or_update);

            $this->setup_tipper($tipper);

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

            $tipper = $this->db->get_tipper_by('id', $this->id);
            $this->setup_tipper($tipper);

            $updated = true;
        }


        return $updated;
    }


    public function get_tippers()
    {

        $tippers = $this->db->get_tippers();

        return $tippers;
    }




    private function sanitize_columns($data)
    {

        $columns        = $this->db->get_columns();
        $default_values = $this->db->get_column_defaults();

        foreach ($columns as $key => $type) {

            if (!array_key_exists($key, $data)) {
                continue;
            }

            switch ($type) {

                case '%s':
                    if (!is_string($key)) {
                        $data[$key] = $default_values[$key];
                    } else {
                        $data[$key] = sanitize_text_field($data[$key]);
                    }
                    break;

                case '%d':
                    if (!is_numeric($data[$key]) || (int) $data[$key] !== absint($data[$key])) {
                        $data[$key] = $default_values[$key];
                    } else {
                        $data[$key] = absint($data[$key]);
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
