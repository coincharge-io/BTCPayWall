<?php

//Eit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_DB_Donations extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_donations";
        $this->primary_key = 'id';
        $this->version     = '1.0';

        parent::__construct();
    }
    public function get_columns()
    {
        return array(
            'id' => '%d',
            'donor_id' => '%d',
            'page_title' => '%s',
            'type' => '%s',
            'currency' => '%s',
            'amount' => '%f',
            'status' => '%s',
            'gateway' => '%s',
            'payment_method' => '%s',
            'date_created'   => '%s'
        );
    }

    public function get_column_defaults()
    {
        return array(
            'donor_id' => 0,
            'page_title' => '',
            'type' => '',
            'currency' => '',
            'amount' => '',
            'status' => 'New',
            'gateway' => '',
            'payment_method' => '',
            'date_created'    => date('Y-m-d H:i:s'),
        );
    }
    public function update($row_id, $data = array(), $where = '')
    {

        $status = parent::update($row_id, $data, $where);
        return $status;
    }


    public function insert($data, $type = '')
    {
        $form_id = parent::insert($data, $type);

        return $form_id;
    }

    public function delete($id = null)
    {

        if (empty($id)) {
            return false;
        }
        $donation  = $this->get_donation_by('id');

        if ($donation->id > 0) {

            global $wpdb;

            return $wpdb->delete($this->table_name, array('id' => $donation->id), array('%d'));
        } else {
            return false;
        }
    }
    public function add($data = array())
    {

        if (empty($data)) {
            return false;
        }

        $donation = $this->get_donation_by('id');
        if ($donation) {

            $this->update($donation->id, $data);

            return $donation->id;
        } else {

            return $this->insert($data, 'donation');
        }
    }
    public function get_donation_by($id)
    {
        global $wpdb;
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$this->table_name} WHERE id = %s LIMIT 1", $id)
        );
        return $row;
    }
    public  function record_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$this->table_name}";

        return $wpdb->get_var($sql);
    }
    public function get_donations($per_page = null, $page_number = null)
    {

        global $wpdb;

        $sql = "SELECT * FROM {$this->table_name}";

        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }
        if (!empty($per_page) && !empty($page_number)) {
            $sql .= " LIMIT $per_page";

            $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;
        }
        
        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }
    public function create_table()
    {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS {$this->table_name}(
            id BIGINT(20) NOT NULL AUTO_INCREMENT,
            donor_id BIGINT(20) NOT NULL,
            page_title TINYTEXT,
            type TINYTEXT,
            currency CHAR(4),
            amount DECIMAL(16,8),
            status TINYTEXT,
            gateway TINYTEXT,
            payment_method TINYTEXT,
            PRIMARY KEY  (id),
            KEY donor (donor_id)) {$charset_collate};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
