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
        'tipping_forms_db' => new BTCPayWall_DB_Tipping_Forms(),
        'tippers_db'        => new BTCPayWall_DB_Tippers(),
        'payments_db'      => new BTCPayWall_DB_Payments(),
        'tippings_db'     => new BTCPayWall_DB_Tippings(),
    ];

    foreach ($tables  as $table) {
        if (!$table->installed()) {
            $table->register_table();
        }
    }
}
