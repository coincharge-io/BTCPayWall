<?php

//Eit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_DB_Donors extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_donors";
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
        $donor_id = parent::insert($data, $type);

        return $donor_id;
    }

    public function delete($id = null)
    {

        if (empty($id)) {
            return false;
        }
        $donor  = $this->get_donor_by('id');

        if ($donor->id > 0) {

            global $wpdb;

            return $wpdb->delete($this->table_name, array('id' => $donor->id), array('%d'));
        } else {
            return false;
        }
    }
    public function add($data = array())
    {

        if (empty($data)) {
            return false;
        }

        $donor = $this->get_donor_by('id');
        if ($donor) {

            $this->update($donor->id, $data);

            return $donor->id;
        } else {

            return $this->insert($data, 'customer');
        }
    }
    public function get_donor_by($id)
    {
        global $wpdb;
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$this->table_name} WHERE id = %s LIMIT 1", $id)
        );
        return $row;
    }
    public function donor_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$this->table_name}";

        return $wpdb->get_var($sql);
    }
    public function get_donors($per_page = 5, $page_number = 1)
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
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $sql = "CREATE TABLE IF NOT EXISTS {$this->table_name}(
			  id bigint(20) NOT NULL AUTO_INCREMENT,
			  full_name TINYTEXT,
              email TINYTEXT,
              address TINYTEXT,
              phone TINYTEXT,
              message TEXT,
			  PRIMARY KEY  (id)
              UNIQUE KEY email (email)) CHARACTER SET utf8 COLLATE utf8_general_ci;";
        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
