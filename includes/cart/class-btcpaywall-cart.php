<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Classes/BTCPayWall_Cart
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class BTCPayWall_Cart
{
    /**
     * Cart Content
     *
     * @since 1.0
     *
     * @access public
     *
     * @var array
     */
    public $content = array();

    /**
     * Cart Details
     *
     * @since 1.0
     *
     * @access public
     *
     * @var array
     */

    public $details = array();

    /**
     * Cart Subtotal
     *
     * @since 1.0
     *
     * @access public
     *
     * @var float
     */
    public $subtotal = 0.00;

    /**
     * Cart Total
     *
     * @since 1.0
     *
     * @access public
     *
     * @var float
     */
    public $total = 0.00;


    /**
     * Constructor.
     *
     * @since 1.0
     */
    public function __construct()
    {
        add_action('init', array($this, 'setup_cart'), 1);
    }

    /**
     * Set Cart
     *
     * @since  1.0
     *
     * @access private
     *
     * @return void
     */
    public function setup_cart()
    {
        $this->get_cart_contents();
        $this->get_contents();
    }
    /**
     * Get cart content
     *
     * @since 1.0.0
     */
    public function get_cart_contents()
    {
        $cart = $this->sanitize_cart();
        $this->content = $cart;
    }
    /**
     * Sanitize cart content
     *
     * @since 1.0.0
     */
    public function sanitize_cart()
    {
        $sanitized = array();
        $stripped_cookie = !empty($_COOKIE['btcpaywall_product_cart']) ? stripslashes($_COOKIE['btcpaywall_product_cart']) : null;
        //Need testing
        if (!$stripped_cookie) {
            return false;
        }
        $cookie = json_decode($stripped_cookie, true);
        if (empty($cookie)) {
            return false;
        }
        foreach ($cookie as $cook) {
            $sanitized[] = [
                'id' => (int)$cook['id'],
                'title' => sanitize_text_field($cook['title'])
            ];
        }
        return $sanitized;
    }
    /**
     * Get cart content
     *
     * @since 1.0.0
     */
    public function get_contents()
    {
        $this->get_cart_contents();
        $cart = is_array($this->content) && !empty($this->content) ? $this->content : array();
        $cart_count = count($cart);
        foreach ($cart as $key => $item) {
            $download = new BTCPayWall_Digital_Download($item['id']);
            if (empty($download->ID)) {
                unset($cart[$key]);
            }
        }
        if (count($cart) < $cart_count) {
            $this->content = $cart;
            $this->update_cart();
        }
        $this->content = $cart;
        return (array) $this->content;
    }
    /**
     * Update cart content
     *
     * @since 1.0.0
     */
    public function update_cart()
    {
        setcookie("btcpaywall_product_cart", json_encode(array_filter($this->content)), strtotime('+1 day'), '/');
    }
    /**
     * Add to cart
     *
     * @since 1.0.0
     */
    public function add($download_id, $options = array())
    {
        $download = new BTCPayWall_Digital_Download($download_id);

        if (empty($download->ID)) {
            return;
        }

        $item = array(
            'id'       => $download_id,
            'title'     => $options['title']
        );

        // foreach ($items as $item) {

        if (!is_array($item)) {
            return;
        }

        if (!isset($item['id']) || empty($item['id'])) {
            return;
        }

        if ($this->is_item_in_cart($item['id'])) {
            return false;
        }

        $this->content[] = $item;

        //unset($item);
        //}
        $this->update_cart();
        return count($this->content);
    }
    /**
     * Check if item already in cart
     *
     * @since 1.0.0
     */
    public function is_item_in_cart($download_id = 0)
    {
        $cart = $this->get_contents();
        //$cart = $this->content;
        if (is_array($cart)) {
            foreach ($cart as $item) {
                if ($item['id'] == $download_id) {
                    return true;
                }
            }
        }

        return false;
    }
    /**
     * Remove item from cart
     *
     * @since 1.0.0
     */
    public function remove($key)
    {
        $cart = $this->get_contents();
        if (!is_array($cart)) {
            return true;
        } else {
            unset($cart[$key]);
        }
        $this->content = $cart;
        $this->update_cart();
        return $this->content;
    }
    /**
     * Get cart item price
     *
     * @since 1.0.0
     */
    public function get_item_price($download_id = 0)
    {
        $item = new BTCPayWall_Digital_Download($download_id);

        return $item->get_price();
    }
    /**
     * Clear cart
     *
     * @since 1.0.0
     */
    public function empty_cart()
    {
        unset($_COOKIE["btcpaywall_product_cart"]);
        setcookie("btcpaywall_product_cart", "", time() - 3600);

        $this->content = array();
    }
    /**
     * Get cart item name
     *
     * @since 1.0.0
     */
    public function get_item_name($item = array())
    {
        $item_title = get_the_title($item['id']) ? get_the_title($item['id']) : $item['title'];

        if (empty($item_title)) {
            $item_title = $item['id'];
        }

        return  $item_title;
    }
    /**
     * Remove cart item url
     *
     * @since 1.0.0
     */
    public function remove_item_url($cart_key)
    {
        $current_page = the_permalink(get_option('btcpw_checkout_page'));

        $url = add_query_arg(array(
            'action' => 'btcpw_remove_from_cart',
            'cart_key'  => $cart_key
        ), $current_page);

        return $url;
    }
    /**
     * Get cart total
     *
     * @since 1.0.0
     */
    public function get_total()
    {
        $cart = $this->get_contents();

        if (!is_array($cart)) {
            $this->total = 0;
        }
        foreach ($cart as $key => $val) {
            $download = new BTCPayWall_Digital_Download($val['id']);
            $this->total += $download->get_amount();
        }

        return $this->total;
    }
}
