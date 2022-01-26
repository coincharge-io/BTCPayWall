<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_DB_Tippings
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

//Eit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_DB_Tippings extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_tippings";
        $this->primary_key = 'id';
        $this->version     = '1.0';

        parent::__construct();
    }
    public function get_columns()
    {
        return array(
            'id' => '%d',
            'invoice_id' => '%s',
            'tipper_id' => '%d',
            'page_title' => '%s',
            'revenue_type' => '%s',
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
            'invoice_id' => '',
            'tipper_id' => 0,
            'page_title' => '',
            'revenue_type' => '',
            'currency' => '',
            'amount' => '',
            'status' => 'New',
            'gateway' => '',
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
        $tipping_id = parent::insert($data, $type);

        return $tipping_id;
    }

    public function delete($id = null)
    {

        if (empty($id)) {
            return false;
        }
        $tipping  = $this->get_tipping_by('id', $id);

        if ($tipping->id > 0) {

            global $wpdb;

            return $wpdb->delete($this->table_name, array('id' => $tipping->id), array('%d'));
        } else {
            return false;
        }
    }
    public function add($data = array())
    {

        if (empty($data)) {
            return false;
        }

        $tipping = $this->get_tipping_by('invoice_id', $data['invoice_id']);

        if ($tipping) {

            $this->update($tipping->id, $data);

            return $tipping->id;
        } else {

            return $this->insert($data, 'tipping');
        }
    }
    public function get_tipping_by($field = 'id', $value=null)
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
    public function get_tippings($per_page = null, $page_number = null)
    {

        global $wpdb;

        $sql = "SELECT * FROM {$this->table_name}";

        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . sanitize_sql_orderby($_REQUEST['orderby'] . ' ' . $_REQUEST['order']);
            //$sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }
        $per_page = (int)$per_page;
        $page_number = (int)$page_number;
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
            id BIGINT(20) NOT NULL AUTO_INCREMENT,
            tipper_id BIGINT(20) NOT NULL,
            invoice_id TINYTEXT,
            page_title TINYTEXT,
            revenue_type TINYTEXT,
            currency CHAR(4),
            amount DECIMAL(16,8),
            status TINYTEXT,
            gateway TINYTEXT,
            payment_method TINYTEXT,
            date_created TIMESTAMP,
            PRIMARY KEY  (id),
            KEY tipper (tipper_id)) {$charset_collate};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
