<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Payment
{


    public $id = 0;
    public $customer_id = 0;
    public $amount;
    public $page_title;
    public $type;
    public $currency;
    public $status;
    public $gateway;
    public $payment_method;

    protected $db;


    public function __construct($payment_id = false)
    {

        $this->db = new BTCPayWall_DB_Payments;

        if ((is_numeric($payment_id) && (int) $payment_id !== absint($payment_id))) {
            return false;
        }

        $payment = $this->db->get_payment_by($payment_id);

        if (empty($payment) || !is_object($payment)) {
            return false;
        }

        $this->setup_payment($payment);
    }


    private function setup_payment($payment)
    {

        if (!is_object($payment)) {
            return false;
        }
        $valid_keys = ['id', 'customer_id', 'amount', 'page_title', 'type', 'currency', 'status', 'gateway', 'payment_method'];

        foreach ($payment as $key => $value) {
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


            $payment = $this->db->get_payment_by($create_or_update);

            $this->setup_payment($payment);

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

            $payment = $this->db->get_payment_by($this->id);
            $this->setup_payment($payment);

            $updated = true;
        }


        return $updated;
    }


    public function get_payments()
    {

        $payments = $this->db->get_payments();

        return $payments;
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
