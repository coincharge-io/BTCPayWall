<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_Digital_Download
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */


// Exit if accessed directly
if (!defined('ABSPATH')) exit;


/**
 * Digital Download Class
 * @since 1.0
 */
class BTCPayWall_Digital_Download
{
    /**
     * Digital Download ID
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @var    int
     */
    public $ID = 0;

    /**
     * Digital Download Price
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var string
     */
    private $price;

    /**
     * Digital Download Amount
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var string
     */
    private $amount;

    /**
     * Download Limit
     *
     * @since 1.0
     * 
     * @access private
     * 
     * @var int
     */
    private $download_limit;
    /**
     * Digital Download Sale Count
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var int
     */
    private $sales;

    /**
     * Digital Download Earning
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var float
     */
    private $earnings;

    /**
     * Digital Download File ID
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var int
     */
    private $file_id;

    /**
     * Digital Download Filename
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var string
     */
    private $filename;

    /**
     * Digital Download File Url
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var string
     */
    private $file_url;

    /**
     * Digital Download Collect Customer Name
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_customer_name;

    /**
     * Digital Download Mandatory Customer Name
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_customer_name;

    /**
     * Digital Download Collect Customer Email
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_customer_email;

    /**
     * Digital Download Mandatory Customer Email
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_customer_email;

    /**
     * Digital Download Collect Customer Address
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_customer_address;

    /**
     * Digital Download Mandatory Customer Address
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_customer_address;

    /**
     * Digital Download Collect Customer Phone
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_customer_phone;

    /**
     * Digital Download Mandatory Customer Phone
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_customer_phone;

    /**
     * Digital Download Collect Customer Message
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_customer_message;

    /**
     * Digital Download Mandatory Customer Message
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_customer_message;

    /**
     * Post Author
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    int
     */
    public $post_author = 0;

    /**
     * Post Date
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_date = '0000-00-00 00:00:00';

    /**
     * Post GTM Date
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_date_gmt = '0000-00-00 00:00:00';

    /**
     * Post Content
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_content = '';

    /**
     * Post Title
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_title = '';

    /**
     * Post Excerpt
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_excerpt = '';

    /**
     * Post Status
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_status = 'publish';

    /**
     * Comment Status
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $comment_status = 'open';

    /**
     * Ping Status
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $ping_status = 'open';

    /**
     * Post Password
     *
     * @since  1.0
     * @access public
     *
     * @var    string
     */
    public $post_password = '';

    /**
     * Post Name
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_name = '';

    /**
     * Ping
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $to_ping = '';

    /**
     * Pinged
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $pinged = '';

    /**
     * Post Modified Date
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_modified = '0000-00-00 00:00:00';

    /**
     * Post Modified GTM Date
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_modified_gmt = '0000-00-00 00:00:00';

    /**
     * Post Filtered Content
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_content_filtered = '';

    /**
     * Post Parent
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    int
     */
    public $post_parent = 0;

    /**
     * Post GUID
     *
     * @since  1.0
     *
     *  @access public
     *
     * @var    string
     */
    public $guid = '';

    /**
     * Menu Order
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    int
     */
    public $menu_order = 0;

    /**
     * Mime Type
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    string
     */
    public $post_mime_type = '';

    /**
     * Comment Count
     *
     * @since  1.0
     * 
     * @access public
     *
     * @var    int
     */
    public $comment_count = 0;

    /**
     * Filtered
     *
     * @since  1.0
     * @access public
     *
     * @var    string
     */
    public $filter;

    /**
     * Constructor
     * 
     * Register a custom post type
     * 
     * @param int $id WP Post id.
     */

    public function __construct($id)
    {
        $download = WP_Post::get_instance($id);

        $this->setup_download($download);
    }

    /**
     * Set properties based on download data
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @param WP_Post $download WP_Post Object for download.
     * 
     * @return bool
     */

    private function setup_download($download)
    {
        if ('digital_download' !== $download->post_type || !($download instanceof WP_Post)) {
            return false;
        }

        foreach ($download as $key => $value) {

            $this->$key = $value;
        }

        return true;
    }

    /**
     * Creates a download
     * 
     * @since 1.0
     * 
     * @param array $data Array of attributes for a download.
     * 
     * @return bool|int False if download isn't create or download ID.
     */

    public function create($data)
    {
        if ($this->id != 0) {
            return false;
        }

        $defaults = [
            'post_type'   => 'digital_download',
            'post_status' => 'draft',
            'post_title'  => __('New Download', 'btcpaywall'),
        ];
        $args = wp_parse_args($data, $defaults);

        $id = wp_insert_post($args, true);

        $download = WP_Post::get_instance($id);

        return $this->setup_download($download);
    }

    /**
     * Retrieve ID
     *
     * @since  1.0
     * 
     * @access public
     *
     * @return int Download ID.
     */

    public function get_ID()
    {

        return $this->ID;
    }

    /**
     * Retrieve Download Name
     *
     * @since  1.0
     *
     *  @access public
     *
     * @return string Download Name.
     */

    public function get_name()
    {
        return get_the_title($this->ID) ? get_the_title($this->ID) : $this->ID;
    }

    /**
     * Retrieve Price
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @return string Price
     */

    public function get_price()
    {
        if (!isset($this->price)) {
            $amount = get_post_meta($this->ID, 'btcpw_price', true);
            $currency = get_option('btcpw_default_pay_per_file_currency', 'SATS');

            $this->price = "{$amount} {$currency}";

            if (empty($amount) || empty($currency)) {
                $this->price = "0 SATS";
            }
        }
        return $this->price;
    }





    /**
     * Retrieve Price Without Currency
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @return string Price
     */

    public function get_amount()
    {
        if (!isset($this->amount)) {
            $amount = get_post_meta($this->ID, 'btcpw_price', true);

            $this->amount = "{$amount}";

            if (empty($amount)) {
                $this->amount = "0";
            }
        }
        return $this->amount;
    }
    /**
     * Retrieve Number of Sales
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @return int Number of sales.
     */

    public function get_sales()
    {

        $this->sales = get_post_meta($this->ID, 'btcpw_product_sales', true);

        if ($this->sales < 0) {
            $this->sales = 0;
        }


        return $this->sales;
    }
    /**
     * Increase Sales Count
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @param int $quantity The quantity to increase.
     * 
     * @return int|false Number of total sales.
     */

    public function increase_sales($quantity = 1)
    {
        $new_total = $this->sales + absint($quantity);
        if (update_post_meta($this->ID, 'btcpw_product_sales', $new_total)) {

            $this->sales = $new_total;

            return $this->sales;
        }

        return false;
    }

    /**
     * Retrieve Download Limit
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @return int Download limit number
     */

    public function get_file_download_limit()
    {

        if (!isset($this->download_limit)) {


            if (get_post_meta($this->ID, 'btcpw_product_limit', true)) {
                $this->download_limit = get_post_meta($this->ID, 'btcpw_product_limit', true);
            } else {
                $this->download_limit = get_option('btcpw_default_pay_per_file_download_limit');
            }
        }

        return $this->download_limit;
    }
    /**
     * Return Publisher Choices for Collecting Customer's Data
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @return array Return information for every field
     */
    public function get_collect()
    {
        foreach ($this as $key => $value) {
            if ((substr($key, 0, 7) === 'collect') || (substr($key, 0, 9) === 'mandatory'))
                $this->$key = get_post_meta($this->ID, 'btcpw_' . $key, true);
        }
        return array(
            array(
                'id' => 'name',
                'label' => 'Full name' .  (filter_var($this->mandatory_customer_name, FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
                'display' => filter_var($this->collect_customer_name, FILTER_VALIDATE_BOOLEAN),
                'mandatory' => filter_var($this->mandatory_customer_name, FILTER_VALIDATE_BOOLEAN)
            ),
            array(
                'id' => 'email',
                'label' => 'Email' .  (filter_var($this->mandatory_customer_email, FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
                'display' => filter_var($this->collect_customer_email, FILTER_VALIDATE_BOOLEAN),
                'mandatory' => filter_var($this->mandatory_customer_email, FILTER_VALIDATE_BOOLEAN)
            ),
            array(
                'id' => 'address',
                'label' => 'Address' .  (filter_var($this->mandatory_customer_address, FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
                'display' => filter_var($this->collect_customer_address, FILTER_VALIDATE_BOOLEAN),
                'mandatory' => filter_var($this->mandatory_customer_address, FILTER_VALIDATE_BOOLEAN)
            ),
            array(
                'id' => 'phone',
                'label' => 'Phone' .  (filter_var($this->mandatory_customer_phone, FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
                'display' => filter_var($this->collect_customer_phone, FILTER_VALIDATE_BOOLEAN),
                'mandatory' => filter_var($this->mandatory_customer_phone, FILTER_VALIDATE_BOOLEAN)
            ),
            array(
                'id' => 'message',
                'label' => 'Message' .  (filter_var($this->mandatory_customer_message, FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
                'display' => filter_var($this->collect_customer_message, FILTER_VALIDATE_BOOLEAN),
                'mandatory' => filter_var($this->mandatory_customer_message, FILTER_VALIDATE_BOOLEAN)
            ),
        );
    }

    /**
     * Return Digital Download Filename
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @return string
     */
    public function get_filename()
    {
        if (!isset($this->filename)) {
            if (get_post_meta($this->ID, 'btcpw_digital_product_filename', true)) {
                $this->filename = get_post_meta($this->ID, 'btcpw_digital_product_filename', true);
            } else {
                $this->filename = '';
            }
        }
        return $this->filename;
    }
    /**
     * Check If Payment Reached Download Limit
     * 
     * @param int $payment_id Payment ID for Digital Download
     * 
     * @since 1.0 
     * 
     * @access public
     * 
     * @return bool Whether a payment has reached the limit
     */
    public function get_download_is_allowed($payment_id)
    {
        $payment_count = sanitize_text_field($_COOKIE['btcpw_' . $payment_id . $this->ID]);

        if ((int)$this->get_file_download_limit() == 0) {
            return true;
        }


        return (int)$payment_count <= (int)$this->get_file_download_limit();
    }

    /**
     * Return Digital Download Filename
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @return string
     */
    public function get_file_url()
    {
        if (!isset($this->file_url)) {
            if (get_post_meta($this->ID, 'btcpw_digital_product_file', true)) {
                $this->file_url = get_post_meta($this->ID, 'btcpw_digital_product_file', true);
            } else {
                $this->file_url = '';
            }
        }
        return $this->file_url;
    }
    /**
     * Return Digital Download Filename
     * 
     * @since 1.0
     * 
     * @access public
     * 
     * @return string
     */
    public function get_file_id()
    {
        if (!isset($this->file_id)) {
            if (get_post_meta($this->ID, 'btcpw_digital_product_id', true)) {
                $this->file_id = get_post_meta($this->ID, 'btcpw_digital_product_id', true);
            } else {
                $this->file_id = 0;
            }
        }
        return $this->file_id;
    }
}
