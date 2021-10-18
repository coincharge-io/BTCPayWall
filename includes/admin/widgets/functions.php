<?php
function wpdocs_register_tiping_box_widget()
{
    require_once __DIR__ . '/tipping_box.php';
    register_widget(new Tipping_Box());
}
add_action('widgets_init', 'wpdocs_register_tiping_box_widget');

function wpdocs_register_tiping_banner_high_widget()
{
    require_once __DIR__ . '/tipping_banner_high.php';
    register_widget(new Tipping_Banner_High());
}
add_action('widgets_init', 'wpdocs_register_tiping_banner_high_widget');
function wpdocs_register_tiping_banner_wide_widget()
{
    require_once __DIR__ . '/tipping_banner_wide.php';
    register_widget(new Tipping_Banner_Wide());
}
add_action('widgets_init', 'wpdocs_register_tiping_banner_wide_widget');
