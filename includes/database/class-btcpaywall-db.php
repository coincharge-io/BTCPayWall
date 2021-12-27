<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_DB
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

//Exit if accessed directly
if (!defined('ABSPATH')) exit;



abstract class BTCPayWall_DB
{

    public $table_name;

    public $version;

    public $primary_key;


    public function __construct()
    {
    }


    public function get_columns()
    {
        return array();
    }

    public function get_column_defaults()
    {
        return array();
    }


    public function get($row_id)
    {
        global $wpdb;
        return $wpdb->get_row($wpdb->prepare("SELECT * FROM $this->table_name WHERE $this->primary_key = %s LIMIT 1;", $row_id));
    }


    public function get_by($column, $row_id)
    {
        global $wpdb;

        if (empty($column) || empty($row_id)) {
            return null;
        }

        $column = esc_sql($column);

        return $wpdb->get_row($wpdb->prepare("SELECT * FROM $this->table_name WHERE $column = %s LIMIT 1;", $row_id));
    }


    public function get_column($column, $row_id)
    {
        global $wpdb;

        if (empty($column) || empty($row_id)) {
            return null;
        }

        $column = esc_sql($column);

        return $wpdb->get_var($wpdb->prepare("SELECT $column FROM $this->table_name WHERE $this->primary_key = %s LIMIT 1;", $row_id));
    }


    public function get_column_by($column, $column_where, $column_value)
    {
        global $wpdb;

        if (empty($column) || empty($column_where) || empty($column_value)) {
            return null;
        }

        $column_where = esc_sql($column_where);
        $column       = esc_sql($column);

        return $wpdb->get_var($wpdb->prepare("SELECT $column FROM $this->table_name WHERE $column_where = %s LIMIT 1;", $column_value));
    }


    public function insert($data, $type = '')
    {
        global $wpdb;

        $data = wp_parse_args($data, $this->get_column_defaults());


        $column_formats = $this->get_columns();
        $data = array_change_key_case($data);
        $data = array_intersect_key($data, $column_formats);
        $data_keys = array_keys($data);

        $column_formats = array_merge(array_flip($data_keys), $column_formats);
        $wpdb->insert($this->table_name, $data, $column_formats);
        $wpdb_insert_id = $wpdb->insert_id;

        return $wpdb_insert_id;
    }


    public function update($row_id, $data = array(), $where = '')
    {

        global $wpdb;

        $row_id = absint($row_id);

        if (empty($row_id)) {
            return false;
        }

        if (empty($where)) {
            $where = $this->primary_key;
        }

        $column_formats = $this->get_columns();

        $data = array_change_key_case($data);

        $data = array_intersect_key($data, $column_formats);

        $data_keys = array_keys($data);
        $column_formats = array_merge(array_flip($data_keys), $column_formats);

        if (false === $wpdb->update($this->table_name, $data, array($where => $row_id), $column_formats)) {
            return false;
        }

        return true;
    }


    public function delete($row_id = 0)
    {

        global $wpdb;

        $row_id = absint($row_id);

        if (empty($row_id)) {
            return false;
        }

        if (false === $wpdb->query($wpdb->prepare("DELETE FROM $this->table_name WHERE $this->primary_key = %d", $row_id))) {
            return false;
        }

        return true;
    }


    public function table_exists($table)
    {
        global $wpdb;
        $table = sanitize_text_field($table);

        return $wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE '%s'", $table)) === $table;
    }

    public function register_table()
    {
        $current_version = get_option($this->table_name . '_db_version');
        if (!$current_version || version_compare($current_version, $this->version, '<')) {
            $this->create_table();
        }
    }
    public function create_table()
    {
    }
    public function installed()
    {
        return $this->table_exists($this->table_name);
    }
}
