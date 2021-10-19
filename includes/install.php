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
    $table = new BTCPayWall_DB_Donation_Forms();
    if (!$table->installed()) {

        $table->register_table();
    }
}
