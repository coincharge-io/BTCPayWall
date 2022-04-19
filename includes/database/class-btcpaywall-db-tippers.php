<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_DB_Tippers
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

//Eit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_DB_Tippers extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_tippers";
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
        $tipper_id = parent::insert($data, $type);

        return $tipper_id;
    }

    public function delete($id = null)
    {

        if (empty($id)) {
            return false;
        }
        $tipper  = $this->get_tipper_by('id', $id);

        if ($tipper->id > 0) {

            global $wpdb;

            return $wpdb->delete($this->table_name, array('id' => $tipper->id), array('%d'));
        } else {
            return false;
        }
    }
    public function add($data = array())
    {

        if (empty($data)) {
            return false;
        }
        if (empty($data['id'])) {
            return $this->insert($data, 'tipper');
        }
        $tipper = $this->get_tipper_by('id', $data['id']);
        if ($tipper) {

            $this->update($tipper->id, $data);

            return $tipper->id;
        }
    }
    public function get_tipper_by($field = 'id', $value = null)
    {
        global $wpdb;
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$this->table_name} WHERE {$field} = %s LIMIT 1", $value)
        );
        return $row;
    }
    public function tipper_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$this->table_name}";

        return $wpdb->get_var($sql);
    }
    public function get_tippers($per_page = null, $page_number = null)
    {
        global $wpdb;
        $sql = "SELECT * FROM {$this->table_name}";

        if (!empty($_REQUEST['orderby'])) {
            /*$sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';*/
            $sql .= ' ORDER BY ' . sanitize_sql_orderby($_REQUEST['orderby'] . ' ' . $_REQUEST['order']);
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
			  id bigint(20) NOT NULL AUTO_INCREMENT,
			  full_name TINYTEXT,
              email varchar(255),
              address TINYTEXT,
              phone TINYTEXT,
              message TEXT,
			  PRIMARY KEY  (id)) {$charset_collate};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
