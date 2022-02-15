<?php

/**
 * BTCPayWall Tipping
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_Tipping
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Tipping
{


    public $id = 0;
    public $invoice_id;
    public $tipper_id;
    public $amount;
    public $page_title;
    public $revenue_type;
    public $currency;
    public $status;
    public $gateway;
    public $payment_method;
    public $date_created;

    protected $db;


    public function __construct($invoice_id = false)
    {

        $this->db = new BTCPayWall_DB_Tippings;

        if ((is_numeric($invoice_id) && (int) $invoice_id !== absint($invoice_id)) || $invoice_id === false) {
            return false;
        }

        $tipping = $this->db->get_tipping_by('invoice_id', $invoice_id);
        if (empty($tipping) || !is_object($tipping)) {
            return false;
        }

        $this->setup_tipping($tipping);
    }


    private function setup_tipping($tipping)
    {

        if (!is_object($tipping)) {
            return false;
        }
        $valid_keys = ['id', 'invoice_id', 'tipper_id', 'amount', 'page_title', 'revenue_type', 'currency', 'status', 'gateway', 'payment_method', 'date_created'];

        foreach ($tipping as $key => $value) {
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


            $tipping = $this->db->get_tipping_by('id', $create_or_update);

            $this->setup_tipping($tipping);

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

            $tipping = $this->db->get_tipping_by('id', $this->id);

            $this->setup_tipping($tipping);

            $updated = true;
        }


        return $updated;
    }


    public function get_tippings()
    {

        $tippings = $this->db->get_tippings();

        return $tippings;
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
