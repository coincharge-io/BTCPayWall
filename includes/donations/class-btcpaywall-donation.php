<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Donation
{


    public $id = 0;
    public $invoice_id = 0;
    public $donor_id = 0;
    public $amount;
    public $page_title;
    public $type;
    public $currency;
    public $status;
    public $gateway;
    public $donation_method;

    protected $db;


    public function __construct($donation_id = false)
    {

        $this->db = new BTCPayWall_DB_Donations;

        if ((is_numeric($donation_id) && (int) $donation_id !== absint($donation_id))) {
            return false;
        }

        $donation = $this->db->get_donation_by('id', $donation_id);

        if (empty($donation) || !is_object($donation)) {
            return false;
        }

        $this->setup_donation($donation);
    }


    private function setup_donation($donation)
    {

        if (!is_object($donation)) {
            return false;
        }
        $valid_keys = ['id', 'invoice_id', 'donation_id', 'amount', 'page_title', 'type', 'currency', 'status', 'gateway', 'payment_method'];

        foreach ($donation as $key => $value) {
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


            $donation = $this->db->get_donation_by('id', $create_or_update);

            $this->setup_donation($donation);

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

            $donation = $this->db->get_donation_by('id', $this->id);
            $this->setup_donation($donation);

            $updated = true;
        }


        return $updated;
    }


    public function get_donations()
    {

        $donations = $this->db->get_donations();

        return $donations;
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
