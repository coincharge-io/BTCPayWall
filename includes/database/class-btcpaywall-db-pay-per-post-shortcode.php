<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_DB_Pay_Per_Post_Shortcode
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.9
 */

//Eit if accessed directly
if (!defined('ABSPATH')) exit;


class BTCPayWall_DB_Pay_Per_Post_Shortcode extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_pay_per_post_shortcodes";
        $this->primary_key = 'id';
        $this->version     = '1.0';

        parent::__construct();
    }
    public function get_columns()
    {
        return array(
            'id' => '%d',
            'name' => '%s',
            'time' => '%s',
            'pay_block' => '%d',
            'btc_format' => '%s',
            'currency' => '%s',
            'price' => '%f',
            'duration' => '%f',
            'duration_type' => '%s',
            'background_color'    => '%s',
            'header_text' => '%s',
            'info_text' => '%s',
            'header_color' => '%s',
            'info_color' => '%s',
            'button_color' => '%s',
            'button_txt' => '%s',
            'link'    => '%d',
            'help_link'    => '%s',
            'help_text'    => '%s',
            'additional_link'    => '%d',
            'additional_help_link'    => '%s',
            'additional_help_text'    => '%s',
            'display_name' => '%d',
            'mandatory_name' => '%d',
            'display_email' => '%d',
            'mandatory_email' => '%d',
            'display_phone' => '%d',
            'mandatory_phone' => '%d',
            'display_address' => '%d',
            'mandatory_address' => '%d',
            'display_message' => '%d',
            'mandatory_message' => '%d',
            'continue_button_text' =>  '%s',
            'continue_button_text_color' =>  '%s',
            'continue_button_color' => '%s',
            'previous_button_text' =>  '%s',
            'previous_button_text_color' => '%s',
            'previous_button_color' => '%s',
        );
    }

    public function get_column_defaults()
    {
        return array(
            'time' => date('Y-m-d H:i:s'),
            'name' => '',
            'pay_view_block' => 'false',
            'btc_format' => '',
            'currency' => 'SATS',
            'price' => '',
            'duration' => '',
            'duration_type' => '',
            'background_color'    => '',
            'header_text' => 'Pay now to unlock blogpost',
            'info_text' => 'For [price] [currency] you will have access to the post for [duration] [dtype]',
            'header_color' => '',
            'info_color' => '',
            'button_color' => '',
            'button_txt' => '',
            'link'    => true,
            'help_link'    => '',
            'help_text'    => 'Help',
            'additional_link'    => false,
            'additional_help_link'    => '',
            'additional_help_text'    => '',
            'display_name' => false,
            'mandatory_name' =>  false,
            'display_email' =>  false,
            'mandatory_email' =>  false,
            'display_phone' =>  false,
            'mandatory_phone' => false,
            'display_address' =>  false,
            'mandatory_address' =>  false,
            'display_message' => false,
            'mandatory_message' => false,
            'continue_button_text' =>   'Continue',
            'continue_button_text_color' => '#FFF',
            'continue_button_color' =>   '#FE642E',
            'previous_button_text' =>   'Previous',
            'previous_button_text_color' =>  '#FFF',
            'previous_button_color' =>   '#1d5aa3',
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


        $sql .= ' ORDER BY time DESC';
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
                pay_block BOOLEAN,
                btc_format CHAR(4),
                title TEXT,
                description TEXT,
                preview MEDIUMINT(9),
                currency CHAR(4),
                price DECIMAL(16,8),
                duration MEDIUMINT(9),
                duration_type CHAR(10),
                background_color CHAR(6),
                header_text TEXT,
                info_text TEXT,
                header_color CHAR(6),
                info_color CHAR(6),
                button_color CHAR(6),
                button_txt TEXT,
                link BOOLEAN,
                help_link TEXT,
                help_text TEXT,
                additional_link  BOOLEAN,
                additional_help_link TEXT,
                additional_help_text TEXT,
                display_name BOOLEAN,
                mandatory_name BOOLEAN,
                display_email BOOLEAN,
                mandatory_email BOOLEAN,
                display_phone BOOLEAN,
                mandatory_phone BOOLEAN,
                display_address BOOLEAN,
                mandatory_address BOOLEAN,
                display_message BOOLEAN, 
                mandatory_message BOOLEAN,
                continue_button_text TEXT,
                continue_button_text_color CHAR(6),
                continue_button_color CHAR(6),
                previous_button_text TEXT,
                previous_button_text_color CHAR(6),
                previous_button_color CHAR(6),
			  PRIMARY KEY  (id)) {$charset_collate};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
