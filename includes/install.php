<?php


if (!defined('ABSPATH')) {
    exit;
}



function register_tables()
{
    $forms = new BTCPayWall_DB_Donation_Forms();
    $forms->register_table();
}
