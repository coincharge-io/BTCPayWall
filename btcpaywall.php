<?php

/**
 * Plugin Name: BTCPayWall
 * Plugin URI:
 * Description: With help of WordPress BTCPayWall powered by Coincharge plugin you can offer blog posts (pay-per-post), videos (pay-per-view) and download file (pay-per-file), accepting bitcoin payment via Lightning Network.
 * Version: 1.0.0
 * Author: BTCPayWall by Coincharge https://btcpaywall.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: btc-paywall
 * Domain Path: /languages
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

if (!class_exists('BTCPayWall')) :

    /**
     * BTCPayWall Class.
     *
     * @since 1.0
     */
    final class BTCPayWall
    {
        private static $instance;
        const DURATIONS = [
            'minute',
            'hour',
            'week',
            'month',
            'year',
            'onetime',
            'unlimited',
        ];

        const CURRENCIES = [
            'SATS',
            'USD',
            'EUR',
        ];

        const TIPPING_CURRENCIES = [
            'SATS',
            'BTC',
            'USD',
            'EUR',
        ];

        const BTC_FORMAT = [
            'SATS',
            'BTC',
        ];
        public $forms;
        public $donors;
        public $customers;
        public $donations;
        public $payments;

        public static function instance()
        {
            if (!isset(self::$instance) && !(self::$instance instanceof BTCPayWall)) {
                self::$instance = new BTCPayWall;
                self::$instance->setup_constants();

                add_action('plugins_loaded', array(self::$instance, 'load_textdomain'));

                self::$instance->includes();
                self::$instance->donors = new BTCPayWall_DB_Donors();
                self::$instance->customers = new BTCPayWall_DB_Customers();
                self::$instance->payments = new BTCPayWall_DB_Payments();
                self::$instance->donations = new BTCPayWall_DB_Donations();
                self::$instance->forms = new BTCPayWall_DB_Donation_Forms();
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
         * @since 1.0
         * @return void
         */
        private function setup_constants()
        {

            // Plugin version.
            if (!defined('BTCPAYWALL_VERSION')) {
                define('BTCPAYWALL_VERSION', '1.0.0');
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
         * @since 1.0
         * @return void
         */
        private function includes()
        {
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/settings/register-settings.php';

            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/actions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/ajax-functions.php';


            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/scripts.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/post-types.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/shortcodes.php';

            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-btcpaywall-customer.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-btcpaywall-donor.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-btcpaywall-form.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/donations/class-btcpaywall-donation.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/payments/class-btcpaywall-payment.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db.php';

            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-customers.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-donors.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-payments.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-donations.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/database/class-btcpaywall-db-donation-forms.php';

            if (is_admin()) {
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/settings/functions.php';

                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-actions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-scripts.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/payments/view.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/donation/view.php';

                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-pages.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-functions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-ajax-functions.php';

                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/widgets/functions.php';
            }

            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/install.php';
        }

        /**
         * Loads the plugin language files.
         *
         * @since 1.4
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
    }

endif; // End if class_exists check.



function BTCPayWall()
{
    return BTCPayWall::instance();
}

BTCPayWall();
