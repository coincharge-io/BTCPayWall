<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_DB_Pay_Per_Shortcode
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0.9
 */

//Eit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class BTCPayWall_DB_Pay_Per_Shortcode extends BTCPayWall_DB
{
    public function __construct()
    {
        global $wpdb;

        $this->table_name = "{$wpdb->prefix}btcpaywall_pay_per_shortcodes";
        $this->primary_key = 'id';
        $this->version     = '1.0';

        parent::__construct();
    }
    public function get_columns()
    {
        return array(
            'id' => '%d',
            'name' => '%s',
            'type' => '%s',
            'time' => '%s',
            'pay_block' => '%d',
            'width' => '%f',
            'height' => '%f',
            'title' => '%s',
            'title_color' => '%s',
            'description' => '%s',
            'description_color' => '%s',
            'preview' => '%s',
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
            'button_text' => '%s',
            'button_text_color' => '%s',
            'button_color_hover' => '%s',
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
            'continue_button_color_hover' => '%s',
            'previous_button_text' =>  '%s',
            'previous_button_text_color' => '%s',
            'previous_button_color' => '%s',
            'previous_button_color_hover' => '%s',
        );
    }

    public function get_column_defaults()
    {
        return array(
            'time' => date('Y-m-d H:i:s'),
            'name' => '',
            'type' => '',
            'pay_block' => false,
            'width' => 500,
            'height' => 500,
            'title' => 'Untitled',
            'title_color' => '',
            'description' => 'No description',
            'description_color' => '',
            'preview' => '',
            'currency' => 'SATS',
            'price' => '',
            'duration' => '',
            'duration_type' => '',
            'background_color'    => '',
            'header_text' => 'Pay now to watch the whole video',
            'info_text' => 'For [price] [currency] you will have access to the video for [duration] [dtype]',
            'header_color' => '',
            'info_color' => '',
            'button_color' => '',
            'button_text' => '',
            'button_text_color' => '',
            'button_color_hover' => '#FFF',
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
            'continue_button_text_color' => 'FFF',
            'continue_button_color' =>   'FE642E',
            'continue_button_color_hover' => '#FFF',
            'previous_button_text' =>   'Previous',
            'previous_button_text_color' =>  'FFF',
            'previous_button_color' =>   '1d5aa3',
            'previous_button_color_hover' => '#FFF',
        );
    }
    public function update($row_id, $data = array(), $where = '')
    {
        $status = parent::update($row_id, $data, $where);
        return $status;
    }


    public function insert($data, $type = '')
    {
        $shortcode_id = parent::insert($data, $type);

        return $shortcode_id;
    }

    public function delete($id = null)
    {
        if (empty($id)) {
            return false;
        }
        $shortcode  = $this->get_shortcode_by($id);

        if ($shortcode->id > 0) {
            global $wpdb;

            return $wpdb->delete($this->table_name, array('id' => $shortcode->id), array('%d'));
        } else {
            return false;
        }
    }
    public function add($data = array())
    {
        if (empty($data)) {
            return false;
        }

        $shortcode = $this->get_shortcode_by($data['id']);


        if ($shortcode) {
            $this->update($shortcode->id, $data);

            return $shortcode->id;
        } else {
            return $this->insert($data, 'shortcode');
        }
    }
    public function get_shortcode_by($id)
    {
        global $wpdb;
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$this->table_name} WHERE id = %d LIMIT 1", $id)
        );
        return $row;
    }
    public function record_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$this->table_name}";

        return $wpdb->get_var($sql);
    }

    public function get_all_shortcodes($type = 'pay-per-post')
    {
        global $wpdb;

        $sql = "SELECT * FROM {$this->table_name} WHERE type='{$type}'";


        $sql .= ' ORDER BY time DESC';
        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }
    public function get_shortcodes($per_page = null, $page_number = null)
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
			    name TINYTEXT,
                type TINYTEXT,
                pay_block BOOLEAN,
                width SMALLINT,
                height SMALLINT,
                title TEXT,
                title_color CHAR(7),
                description TEXT,
                description_color CHAR(7),
                preview MEDIUMINT(9),
                currency CHAR(4),
                price DECIMAL(16,8),
                duration MEDIUMINT(9),
                duration_type CHAR(10),
                background_color CHAR(7),
                header_text TEXT,
                info_text TEXT,
                header_color CHAR(7),
                info_color CHAR(7),
                button_color CHAR(7),
                button_text TEXT,
                button_text_color CHAR(7),
                button_color_hover CHAR(7),
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
                continue_button_text_color CHAR(7),
                continue_button_color CHAR(7),
                continue_button_color_hover CHAR(7),
                previous_button_text TEXT,
                previous_button_text_color CHAR(7),
                previous_button_color CHAR(7),
                previous_button_color_hover CHAR(7),
			  PRIMARY KEY  (id)) {$charset_collate};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version, false);
    }
}
