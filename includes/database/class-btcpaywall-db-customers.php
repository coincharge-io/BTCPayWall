<?php

//Eit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_DB_Customers extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_customers";
        $this->primary_key = 'id';
        $this->version     = '1.0';

        parent::__construct();
    }

    public function get_columns()
    {
        return array(
            'id' => '%d',
            'full_name' => '%s',
            'email' => '%s',
            'address' => '%s',
            'phone' => '%s',
            'message' => '%s'
        );
    }

    public function get_column_defaults()
    {
        return array(
            'full_name' => 'Anonymous',
            'email' => '',
            'address' => '',
            'phone' => '',
            'message' => ''
        );
    }
    public function update($row_id, $data = array(), $where = '')
    {

        $status = parent::update($row_id, $data, $where);
        return $status;
    }


    public function insert($data, $type = '')
    {
        $customer_id = parent::insert($data, $type);

        return $customer_id;
    }

    public function delete($id = null)
    {

        if (empty($id)) {
            return false;
        }
        $customer  = $this->get_customer_by('id');

        if ($customer->id > 0) {

            global $wpdb;

            return $wpdb->delete($this->table_name, array('id' => $customer->id), array('%d'));
        } else {
            return false;
        }
    }
    public function add($data = array())
    {

        if (empty($data)) {
            return false;
        }

        $customer = $this->get_customer_by('id');
        if ($customer) {

            $this->update($customer->id, $data);

            return $customer->id;
        } else {

            return $this->insert($data, 'customer');
        }
    }
    public function get_customer_by($id)
    {
        global $wpdb;
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$this->table_name} WHERE id = %s LIMIT 1", $id)
        );
        return $row;
    }
    public  function customer_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$this->table_name}";

        return $wpdb->get_var($sql);
    }
    public function get_customers($per_page = 5, $page_number = 1)
    {
        global $wpdb;
        $sql = "SELECT * FROM {$this->table_name}";

        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }
        $sql .= " LIMIT $per_page";
        $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;
        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }
    public function create_table()
    {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS {$this->table_name}(
			  id bigint(20) NOT NULL AUTO_INCREMENT,
			  full_name TINYTEXT,
              email varchar(255),
              address TINYTEXT,
              phone TINYTEXT,
              message TEXT,
			  PRIMARY KEY  (id),
              UNIQUE KEY email (email)) {$charset_collate};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
