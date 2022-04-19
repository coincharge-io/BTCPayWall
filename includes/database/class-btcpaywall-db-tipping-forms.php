<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_DB_Tipping_Forms
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

//Eit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_DB_Tipping_Forms extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_forms";
        $this->primary_key = 'id';
        $this->version     = '1.0';

        parent::__construct();
    }
    public function get_columns()
    {
        return array(
            'id' => '%d',
            'time' => '%s',
            'name' => '%s',
            'form_name' => '%s',
            'dimension' => '%s',
            'redirect' => '%s',
            'title_text' => '%s',
            'description_text' => '%s',
            'button_text' => '%s',
            'tipping_text' => '%s',
            'title_text_color' => '%s',
            'description_text_color' => '%s',
            'button_text_color' => '%s',
            'button_color' => '%s',
            'tipping_text_color' => '%s',
            'background_color' => '%s',
            'input_background' => '%s',
            'hf_background' => '%s',
            'active_color' => '%s',
            'inactive_color' => '%s',
            'logo' => '%s',
            'background' => '%s',
            'collect_name' => '%d',
            'mandatory_name' => '%d',
            'collect_email' => '%d',
            'mandatory_email' => '%d',
            'collect_address' => '%d',
            'mandatory_address' => '%d',
            'collect_phone' => '%d',
            'mandatory_phone' => '%d',
            'collect_message' => '%d',
            'mandatory_message' => '%d',
            'value1_enabled' => '%d',
            'value1_currency' => '%s',
            'value1_amount' => '%f',
            'value1_icon' => '%s',
            'value2_enabled' => '%d',
            'value2_currency' => '%s',
            'value2_amount' => '%f',
            'value2_icon' => '%s',
            'value3_enabled' => '%d',
            'value3_currency' => '%s',
            'value3_amount' => '%f',
            'value3_icon' => '%s',
            'step1' => '%s',
            'step2' => '%s',
            'free_input' => '%d',
            'show_icon' => '%d',
            'currency' => '%s'
        );
    }

    public function get_column_defaults()
    {
        return array(
            'time' => date('Y-m-d H:i:s'),
            'name' => '',
            'form_name' => '',
            'dimension' => '',
            'redirect' => '',
            'title_text' => '',
            'description_text' => '',
            'button_text' => '',
            'tipping_text' => '',
            'title_text_color' => '',
            'description_text_color' => '',
            'button_text_color' => '',
            'button_color' => '',
            'tipping_text_color' => '',
            'background_color' => '',
            'input_background' => '',
            'hf_background' => '',
            'active_color' => '',
            'inactive_color' => '',
            'logo' => '',
            'background' => '',
            'collect_name' => '',
            'mandatory_name' => '',
            'collect_email' => '',
            'mandatory_email' => '',
            'collect_address' => '',
            'mandatory_address' => '',
            'collect_phone' => '',
            'mandatory_phone' => '',
            'collect_message' => '',
            'mandatory_message' => '',
            'value1_enabled' => '',
            'value1_currency' => '',
            'value1_amount' => '',
            'value1_icon' => '',
            'value2_enabled' => '',
            'value2_currency' => '',
            'value2_amount' => '',
            'value2_icon' => '',
            'value3_enabled' => '',
            'value3_currency' => '',
            'value3_amount' => '',
            'value3_icon' => '',
            'step1' => '',
            'step2' => '',
            'free_input' => '',
            'show_icon' => '',
            'currency' => '',
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
        $form  = $this->get_form_by($id);

        if ($form->id > 0) {

            global $wpdb;

            return $wpdb->delete($this->table_name, array('id' => $form->id), array('%d'));
        } else {
            return false;
        }
    }
    public function add($data = array())
    {

        if (empty($data)) {
            return false;
        }

        $form = $this->get_form_by($data['id']);

        if ($form) {

            $this->update($form->id, $data);

            return $form->id;
        } else {

            return $this->insert($data, 'form');
        }
    }
    public function get_form_by($id)
    {
        global $wpdb;
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$this->table_name} WHERE id = %d LIMIT 1", $id)
        );
        return $row;
    }
    public  function record_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$this->table_name}";

        return $wpdb->get_var($sql);
    }

    public function get_forms($per_page = null, $page_number = null)
    {

        global $wpdb;

        $sql = "SELECT * FROM {$this->table_name}";

        /* if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . sanitize_sql_orderby($_REQUEST['orderby'] . ' ' . $_REQUEST['order']);
        } */
        //$sql .= ' ORDER BY time DESC';
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
			  time datetime NOT NULL,
			  name TINYTEXT NOT NULL,
			  form_name TINYTEXT NOT NULL,
			  dimension CHAR(7) NOT NULL,
			  redirect VARCHAR(55),
			  title_text TEXT,
			  description_text TEXT,
			  button_text TEXT,
			  tipping_text TEXT,
			  title_text_color CHAR(6),
			  description_text_color CHAR(6),
			  button_text_color CHAR(6),
			  button_color CHAR(6),
			  tipping_text_color CHAR(6),
			  background_color CHAR(6),
			  input_background CHAR(6),
			  hf_background CHAR(6),
			  active_color CHAR(6),
			  inactive_color CHAR(6),
			  logo MEDIUMINT(9),
			  background MEDIUMINT(9),
			  collect_name BOOLEAN,
			  mandatory_name BOOLEAN,
			  collect_email BOOLEAN,
			  mandatory_email BOOLEAN,
			  collect_address BOOLEAN,
			  mandatory_address BOOLEAN,
			  collect_phone BOOLEAN,
			  mandatory_phone BOOLEAN,
			  collect_message BOOLEAN,
			  mandatory_message BOOLEAN,
			  value1_enabled BOOLEAN,
			  value1_currency CHAR(4),
			  value1_amount DECIMAL(16,8),
			  value1_icon VARCHAR(100),
			  value2_enabled BOOLEAN,
			  value2_currency CHAR(4),
			  value2_amount DECIMAL(16,8),
			  value2_icon VARCHAR(100),
			  value3_enabled BOOLEAN,
			  value3_currency CHAR(4),
			  value3_amount DECIMAL(16,8),
			  value3_icon VARCHAR(100),
			  step1 TINYTEXT,
			  step2 TINYTEXT,
			  free_input BOOLEAN,
			  show_icon BOOLEAN,
			  currency CHAR(4),
			  PRIMARY KEY  (id)) {$charset_collate};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
