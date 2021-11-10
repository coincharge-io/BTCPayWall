<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall
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
     * @var float
     */
    private $amount;

    /**
     * Digital Download Currency
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var string
     */
    private $currency;
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
     * Digital Download File
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var string
     */
    private $file;

    /**
     * Digital Download Collect Customer Name
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_name;

    /**
     * Digital Download Mandatory Customer Name
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_name;

    /**
     * Digital Download Collect Customer Email
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_email;

    /**
     * Digital Download Mandatory Customer Email
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_email;

    /**
     * Digital Download Collect Customer Address
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_address;

    /**
     * Digital Download Mandatory Customer Address
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_address;

    /**
     * Digital Download Collect Customer Phone
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_phone;

    /**
     * Digital Download Mandatory Customer Phone
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_phone;

    /**
     * Digital Download Collect Customer Message
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $collect_message;

    /**
     * Digital Download Mandatory Customer Message
     * 
     * @since 1.0
     * 
     * @access private
     * 
     * @var bool
     */
    private $mandatory_message;

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

        return $download->ID;
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
        return get_the_title($this->ID);
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
            $amount = get_post_meta($this->ID, 'btcpw_product_price', true);
            $currency = get_post_meta($this->ID, 'btcpw_product_currency', true);
            $this->price = "{$amount} {$currency}";

            if (!$this->price) {
                $this->price = "0 SATS";
            }
        }
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
        if (!isset($this->sales)) {
            $this->sales = get_post_meta($this->ID, 'btcpw_product_sales', true);

            if ($this->sales < 0) {
                $this->sales = 0;
            }
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

    public function increase_sales($quantity)
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


            $limit  = get_post_meta($this->ID, 'btcpw_product_download_limit', true);

            if (!empty($limit) || (is_numeric($limit) && (int)$limit == 0)) {

                $ret = absint($limit);
            } else {

                $ret =  0;
            }

            $this->download_limit = $ret;
        }
        update_post_meta($this->ID, 'btcpw_product_download_limit', $this->download_limit);

        return $ret;
    }
}
