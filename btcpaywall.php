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
if (!class_exists('BTCPayWall')) :

    /**
     * BTCPyWall Class.
     *
     * @since 1.0
     */
    final class BTCPayWall
    {


        private static $instance;




        public $emails;
        public $customers;
        public $donors;




        public static function instance()
        {
            if (!isset(self::$instance) && !(self::$instance instanceof BTCPayWall)) {
                self::$instance = new BTCPayWall;
                self::$instance->setup_constants();

                add_action('plugins_loaded', array(self::$instance, 'load_textdomain'));

                self::$instance->includes();
                self::$instance->emails = new BTCPaywall_Emails();
                self::$instance->customers = new BTCPaywall_Customers();
                self::$instance->donors = new BTCPaywall_Donors();

                self::$instance->payment_stats = new BTCPaywall_Payment_Stats();
            }

            return self::$instance;
        }

        /**
         * Throw error on object clone.
         *
         * The whole idea of the singleton design pattern is that there is a single
         * object therefore, we don't want the object to be cloned.
         *
         * @since 1.6
         * @access protected
         * @return void
         */
        public function __clone()
        {
        }

        /**
         * Disable unserializing of the class.
         *
         * @since 1.6
         * @access protected
         * @return void
         */
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
            global $edd_options;

            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/settings/register-settings.php';
            $edd_options = edd_get_settings();

            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/actions.php';
            if (file_exists(BTCPAYWALL_PLUGIN_DIR . 'includes/deprecated-functions.php')) {
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/deprecated-functions.php';
            }
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/ajax-functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/api/class-edd-api.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/template-functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/template-actions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/checkout/template.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/checkout/functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/cart/class-edd-cart.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/cart/functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/cart/template.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/cart/actions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-db.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-db-customers.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-db-customer-meta.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-customer-query.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-customer.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-discount.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-download.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-cache-helper.php';
            if (defined('WP_CLI') && WP_CLI) {
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-cli.php';
            }
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-cron.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-fees.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-html-elements.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-license-handler.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-logging.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-session.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-stats.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-roles.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/country-functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/formatting.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/widgets.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/misc-functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/mime-types.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/gateways/actions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/gateways/functions.php';
            if (version_compare(phpversion(), 5.3, '>')) {
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/gateways/amazon-payments.php';
            }
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/gateways/paypal-standard.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/gateways/paypal/paypal.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/gateways/manual.php';

            $stripe = BTCPAYWALL_PLUGIN_DIR . 'includes/gateways/stripe/edd-stripe.php';

            if (file_exists($stripe)) {
                require_once($stripe);
            }

            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/discount-functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/payments/functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/payments/actions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/payments/class-payment-stats.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/payments/class-payments-query.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/payments/class-edd-payment.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/download-functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/scripts.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/post-types.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/plugin-compatibility.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/emails/class-edd-emails.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/emails/class-edd-email-tags.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/emails/functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/emails/template.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/emails/actions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/error-tracking.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/user-functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/query-filters.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/tax-functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/process-purchase.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/login-register.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/shortcodes.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/tracking.php'; // Must be loaded on frontend to ensure cron runs
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/privacy-functions.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/utils/class-tokenizer.php';

            if (is_admin() || (defined('WP_CLI') && WP_CLI)) {
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/add-ons.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-footer.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-actions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/class-edd-notices.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-scripts.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/admin-pages.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/dashboard-widgets.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/thickbox.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/upload-functions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/downloads/dashboard-columns.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/customers/customers.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/customers/customer-functions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/customers/customer-actions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/downloads/metabox.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/downloads/contextual-help.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/discounts/contextual-help.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/discounts/discount-actions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/discounts/discount-codes.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/import/import-actions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/import/import-functions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/payments/actions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/payments/payments-history.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/payments/contextual-help.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/reporting/contextual-help.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/reporting/export/export-functions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/reporting/reports.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/reporting/class-edd-graph.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/reporting/class-edd-pie-graph.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/reporting/graphing.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/settings/display-settings.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/settings/contextual-help.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/tools.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/plugins.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/upgrades/downgrades.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/upgrades/upgrade-functions.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/upgrades/upgrades.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/class-edd-heartbeat.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/tools/tools-actions.php';

                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/libraries/class-persistent-dismissible.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/admin/promos/class-promo-handler.php';
            } else {
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/process-download.php';
                require_once BTCPAYWALL_PLUGIN_DIR . 'includes/theme-compatibility.php';
            }

            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/class-edd-register-meta.php';
            require_once BTCPAYWALL_PLUGIN_DIR . 'includes/install.php';
        }

        /**
         * Loads the plugin language files.
         *
         * @since 1.4
         * @return void
         */
        public function load_plugin_textdomain()
        {

            load_plugin_textdomain(
                'btc-paywall',
                false,
                dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
            );
        }
    }

endif; // End if class_exists check.



function BTCPayWall()
{
    return BTCPayWall::instance();
}

BTCPayWall();
