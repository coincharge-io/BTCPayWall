<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_Customer
{


    public $id = 0;
    public $full_name;
    public $email;
    public $address;
    public $phone;
    public $message;

    protected $db;


    public function __construct($customer_id)
    {

        $this->db = new BTCPayWall_DB_Customers;

        /* if (!is_email($email_or_name)) {
            return false;
        }
        $by_email = is_bool($by_email) ? $by_email : false;

        if (is_email($email_or_name)) {
            $field = 'email';
        } else {
            $field = 'name';
        }
        $customer = $this->db->get_customer_by($field, $email_or_name);

        if (empty($customer) || !is_object($customer)) {
            return false;
        }
 */
        if ((is_numeric($customer_id) && (int) $customer_id !== absint($customer_id))) {
            return false;
        }

        $customer = $this->db->get_customer_by('id', $customer_id);

        if (empty($customer) || !is_object($customer)) {
            return false;
        }

        $this->setup_customer($customer);
    }


    private function setup_customer($customer)
    {

        if (!is_object($customer)) {
            return false;
        }
        $valid_keys = ['id', 'full_name', 'email', 'address', 'phone', 'message'];

        foreach ($customer as $key => $value) {
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


            $customer = $this->db->get_customer_by('id', $create_or_update);

            $this->setup_customer($customer);

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

            $customer = $this->db->get_customer_by('id', $this->id);
            $this->setup_customer($customer);

            $updated = true;
        }


        return $updated;
    }


    public function get_customers()
    {

        $customers = $this->db->get_customers();

        return $customers;
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
                        $data[$key] = empty($data[$key]) ? sanitize_text_field($data[$key]) : $default_values[$key];
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
