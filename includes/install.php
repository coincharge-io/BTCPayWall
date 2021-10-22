<?php


if (!defined('ABSPATH')) {
    exit;
}

function btcpaywall_run_install()
{
    register_tables();
}
register_activation_hook(BTCPAYWALL_PLUGIN_FILE, 'btcpaywall_run_install');

function register_tables()
{

    $tables = [
        'customers_db'     => new BTCPayWall_DB_Customers(),
        'donation_forms_db' => new BTCPayWall_DB_Donation_Forms(),
        'donors_db'        => new BTCPayWall_DB_Donors(),
        'payments_db'      => new BTCPayWall_DB_Payments(),
        'donations_db'     => new BTCPayWall_DB_Donations(),
    ];

    foreach ($tables  as $table) {
        if (!$table->installed()) {
            $table->register_table();
        }
    }
}
