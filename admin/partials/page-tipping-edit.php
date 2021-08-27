<?php
global $wpdb;
$id = $_GET['id'];

//$result = $wpdb->get_results('SELECT * FROM wp_btc_forms WHERE id=$id');
$result = $wpdb->get_results(
    "SELECT * FROM wp_btc_forms WHERE id={$id}"
);
var_dump($result);
