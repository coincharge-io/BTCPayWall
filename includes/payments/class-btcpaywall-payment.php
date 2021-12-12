<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Payment
{


    public $id = 0;
    public $invoice_id = 0;
    public $customer_id = 0;
    public $amount;
    public $page_title;
    public $revenue_type;
    public $currency;
    public $status;
    public $download_ids;
    public $gateway;
    public $payment_method;

    protected $db;


    public function __construct($invoice_id = false)
    {

        $this->db = new BTCPayWall_DB_Payments;

        if ((is_numeric($invoice_id) && (int) $invoice_id !== absint($invoice_id))) {
            return false;
        }

        $payment = $this->db->get_payment_by('invoice_id', $invoice_id);

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
        $valid_keys = ['id', 'invoice_id', 'customer_id', 'amount', 'page_title', 'revenue_type', 'currency', 'status', 'download_ids', 'gateway', 'payment_method'];

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
        $defaults = [
            'download_ids' => '',
        ];
        if (!empty($data['download_ids']) && is_array($data['download_ids'])) {
            $data['download_ids'] = implode(',', array_unique(array_values($data['download_ids'])));
        }
        $data = $this->sanitize_columns($data);

        $created = false;

        $create_or_update = $this->db->add($data);
        if ($create_or_update) {


            $payment = $this->db->get_payment_by('id', $create_or_update);

            $this->setup_payment($payment);

            $created = $this->id;
        }

        return $created;
    }
    public function payment_count()
    {
        return $this->db->record_count();
    }
    public function get_download_number()
    {

        return $this->download_number;
    }

    public function update($data = array())
    {

        if (empty($data)) {
            return false;
        }

        $data = $this->sanitize_columns($data);

        $updated = false;

        if ($this->db->update($this->id, $data)) {

            $payment = $this->db->get_payment_by('id', $this->id);
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
    /**
     * Increase Download Number
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @return int|false Number of downloads.
     */

    public function increase_download_number()
    {
        $new_total = (int)$this->download_number + 1;

        if ($this->update(['download_number' => $new_total])) {

            $this->download_number = (int)$new_total;

            return $this->download_number;
        }
        return false;
    }
}
