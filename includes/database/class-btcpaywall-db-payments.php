<?php

//Eit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_DB_Payments extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_payments";
        $this->primary_key = 'id';
        $this->version     = '1.0';

        parent::__construct();
    }
    public function get_columns()
    {
        return array(
            'id' => '%d',
            'invoice_id' => '%s',
            'customer_id' => '%d',
            'page_title' => '%s',
            'revenue_type' => '%s',
            'currency' => '%s',
            'amount' => '%f',
            'status' => '%s',
            'download_ids'     => '%s',
            'gateway' => '%s',
            'payment_method' => '%s',
            'date_created'   => '%s'
        );
    }

    public function get_column_defaults()
    {
        return array(
            'invoice_id'  => '0',
            'customer_id' => 0,
            'page_title' => '',
            'revenue_type' => '',
            'currency' => '',
            'amount' => '',
            'status' => 'New',
            'gateway' => 'BTCPayServer',
            'download_ids' => '',
            'payment_method' => 'BTC-LightningNetwork',
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
        $payment_id = parent::insert($data, $type);

        return $payment_id;
    }

    public function delete($id = null)
    {

        if (empty($id)) {
            return false;
        }
        $payment  = $this->get_payment_by('id', $id);

        if ($payment->id > 0) {

            global $wpdb;

            return $wpdb->delete($this->table_name, array('id' => $payment->id), array('%d'));
        } else {
            return false;
        }
    }
    public function add($data = array())
    {

        if (empty($data)) {
            return false;
        }
        $defaults = array(
            'download_ids' => '',
        );
        if (!empty($args['download_ids']) && is_array($args['download_ids'])) {
            $args['download_ids'] = implode(',', array_unique(array_values($args['download_ids'])));
        }
        $payment = $this->get_payment_by('invoice_id', $data['invoice_id']);
        if ($payment) {
            if (!empty($payment['download_ids'])) {

                if (empty($payment->download_ids)) {

                    $payment->download_ids = $data['download_ids'];
                } else {

                    $existing_ids       = array_map('absint', explode(',', $payment->download_ids));
                    $download_ids        = array_map('absint', explode(',', $data['download_ids']));
                    $download_ids        = array_merge($download_ids, $existing_ids);
                    $payment->download_ids = implode(',', array_unique(array_values($download_ids)));
                }

                $data['download_ids'] = $payment->download_ids;
            }
            $this->update($payment->id, $data);

            return $payment->id;
        } else {

            return $this->insert($data, 'payment');
        }
    }
    public function get_payment_by($field = 'id', $value)
    {
        global $wpdb;
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$this->table_name} WHERE {$field} = %s LIMIT 1", $value)
        );
        return $row;
    }
    public  function record_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$this->table_name}";

        return $wpdb->get_var($sql);
    }
    public function get_payments($per_page = null, $page_number = null)
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

        $sql = "CREATE TABLE {$this->table_name}(
			  id bigint(20) NOT NULL AUTO_INCREMENT,
              invoice_id TINYTEXT,
			  customer_id BIGINT(20) NOT NULL,
              page_title TINYTEXT,
              revenue_type TINYTEXT,
              currency CHAR(4),
              amount DECIMAL(16,8),
              status TINYTEXT,
              gateway TINYTEXT,
              payment_method TINYTEXT,
              download_ids longtext,
              date_created TIMESTAMP,
			  PRIMARY KEY  (id),
              KEY customer (customer_id)
            ) {$charset_collate};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
