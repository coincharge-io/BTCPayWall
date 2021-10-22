<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Donor
{


    public $id = 0;
    public $full_name;
    public $email;
    public $address;
    public $phone;
    public $message;

    protected $db;


    public function __construct($donor_id = false)
    {

        $this->db = new BTCPayWall_DB_Donors;

        if ((is_numeric($donor_id) && (int) $donor_id !== absint($donor_id))) {
            return false;
        }

        $donor = $this->db->get_donor_by($donor_id);

        if (empty($donor) || !is_object($donor)) {
            return false;
        }

        $this->setup_donor($donor);
    }


    private function setup_donor($donor)
    {

        if (!is_object($donor)) {
            return false;
        }
        $valid_keys = ['id', 'full_name', 'email', 'address', 'phone', 'message'];

        foreach ($donor as $key => $value) {
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


            $donor = $this->db->get_donor_by($create_or_update);

            $this->setup_donor($donor);

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

            $donor = $this->db->get_donor_by('id', $this->id);
            $this->setup_donor($donor);

            $updated = true;
        }


        return $updated;
    }


    public function get_donors()
    {

        $donors = $this->db->get_donors();

        return $donors;
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
