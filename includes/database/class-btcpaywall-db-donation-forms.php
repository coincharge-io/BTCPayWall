<?php

//Eit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_DB_Donation_Forms extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_forms";
        $this->primary_key = 'id';
        $this->version     = '1.0';

        parent::__construct();
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

    public function delete($_id = false)
    {

        if (empty($_id)) {
            return false;
        }
        $form  = $this->get_form_by('id');

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



        $form = $this->get_form_by('id');

        // update an existing donor.
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
            $wpdb->prepare("SELECT * FROM {$this->table_name} WHERE id = %s LIMIT 1", $id)
        );
        return $row;
    }
    public function create_table()
    {

        $sql = "CREATE TABLE IF NOT EXISTS {$this->table_name}(
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
			  PRIMARY KEY  (id)) CHARACTER SET utf8 COLLATE utf8_general_ci;";
        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
