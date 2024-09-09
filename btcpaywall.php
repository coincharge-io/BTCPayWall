<?php

/**
 * Plugin Name: BTCPayWall
 * Plugin URI: https://wordpress.org/plugins/btcpaywall
 * Description: The Bitcoin Paywall to sell content and digital goods on WordPress.
 * Version: 1.1.3
 * Author: Coincharge https://btcpaywall.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: btcpaywall
 * Domain Path: languages
 */


// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('BTCPayWall')) :

    /**
     * BTCPayWall Class.
     *
     * @since 1.0
     */
    final class BTCPayWall
    {
        private static $instance;
        public const DURATIONS = [
            'minute',
            'hour',
            'week',
            'month',
            'year',
            'onetime',
            'unlimited',
        ];

        public const CURRENCIES = [
            'BTC',
            'SATS',
            'USD',
            'EUR',
            'GBP'
        ];


        public const BTC_FORMAT = [
            'SATS',
            'BTC',
        ];
        public $forms;
        public $tippers;
        public $customers;
        public $tippings;
        public $payments;
        public $cart;
        public $pay_per_shortcodes;

        public static function instance()
        {
            if (!isset(self::$instance) && !(self::$instance instanceof BTCPayWall)) {
                self::$instance = new BTCPayWall();
                self::$instance->setup_constants();

                add_action('plugins_loaded', array(self::$instance, 'load_textdomain'));

                self::$instance->includes();
                self::$instance->tippers = new BTCPayWall_DB_Tippers();
                self::$instance->customers = new BTCPayWall_DB_Customers();
                self::$instance->payments = new BTCPayWall_DB_Payments();
                self::$instance->tippings = new BTCPayWall_DB_Tippings();
                self::$instance->forms = new BTCPayWall_DB_Tipping_Forms();
                self::$instance->pay_per_shortcodes = new BTCPayWall_DB_Pay_Per_Shortcode();
                self::$instance->cart = new BTCPayWall_Cart();
            }

            return self::$instance;
        }


        public function __clone()
        {
        }


        public function __wakeup()
        {
        }

        /**
         * Setup plugin constants.
         *
         * @access private
         * @since  1.0
         * @return void
         */
        private function setup_constants()
        {
            // Plugin version.
            if (!defined('BTCPAYWALL_VERSION')) {
                define('BTCPAYWALL_VERSION', '1.1.2');
            }

            // Plugin Folder Path.
            if (!defined('BTCPAYWALL_PLUGIN_DIR')) {
                define('BTCPAYWALL_PLUGIN_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin Folder URL.
            if (!defined('BTCPAYWALL_PLUGIN_URL')) {
                define('BTCPAYWALL_PLUGIN_URL', plugin_dir_url(__FILE__));
            }

            // Plugin Root File.
            if (!defined('BTCPAYWALL_PLUGIN_FILE')) {
                define('BTCPAYWALL_PLUGIN_FILE', __FILE__);
            }
        }

        /**
         * Include required files.
         *
         * @access private
         * @since  1.0
         * @return void
         */
        private function includes()
        {
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/settings/register-settings.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/pay-per/class-pay-per-shortcode-list.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/shortcodes.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-functions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/widgets/functions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/editors/gutenberg/functions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/editors/gutenberg/actions.php';

            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/trait/format-trait.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/clients/exception/class-exception.php';

            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/actions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/functions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/download-functions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/filters.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/ajax-functions.php';

            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/scripts.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/post-types.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/shortcodes.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/api/actions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/cart/class-btcpaywall-cart.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/cart/functions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/emails/functions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-btcpaywall-customer.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-btcpaywall-tipper.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-btcpaywall-form.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-btcpaywall-digital-download.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-btcpaywall-pay-per-shortcode.php';

            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/tippings/class-btcpaywall-tipping.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/payments/class-btcpaywall-payment.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db.php';

            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-customers.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-tippers.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-payments.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-tippings.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-tipping-forms.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-pay-per-shortcode.php';

            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/editors/wpbakery/actions.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/editors/elementor/functions.php';


            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/clients/abstract-class-btcpaywall-client.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/clients/class-btcpay-client.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/clients/class-opennode-client.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/clients/class-lnbits-client.php';
            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/clients/class-coinsnap-client.php';
            if (is_admin()) {
                include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/settings/functions.php';


                include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-actions.php';
                include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-scripts.php';
                include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/payments/view.php';

                include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/tipping-forms/class-donation-metabox.php';
                include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-pages.php';


                include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-ajax-functions.php';


                include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/upload-functions.php';
                include_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/digital-products/metabox.php';
            }

            include_once BTCPAYWALL_PLUGIN_DIR . 'includes/install.php';
        }

        /**
         * Loads the plugin language files.
         *
         * @since  1.0.0
         * @return void
         */
        public function load_textdomain()
        {
            load_plugin_textdomain(
                'btcpaywall',
                false,
                BTCPAYWALL_PLUGIN_URL . '/languages/'
            );
        }
        public static function create_client()
        {
            $client_type = get_option('btcpw_selected_payment_gateway');
            switch ($client_type) {
                case 'BTCPayServer':
                    return new BTCPay_Client();
                case 'OpenNode':
                    return new OpenNode_Client();
                case 'LNBits':
                    return new LNBits_Client();
                case 'Coinsnap':
                    return new Coinsnap_Client();
                default:
                    throw new \Exception('Invalid client');
            }
        }
    }

endif; // End if class_exists check.



function BTCPayWall()
{
    return BTCPayWall::instance();
}

BTCPayWall();
