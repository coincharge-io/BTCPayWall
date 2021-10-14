<?php
function wpdocs_register_widgets()
{
    require_once __DIR__ . '/tipping_box.php';
    require_once __DIR__ . '/tipping_banner_wide.php';
    require_once __DIR__ . '/tipping_banner_high.php';
    register_widget(new Tipping_Box());
    register_widget(new Tipping_Banner_Wide());
    register_widget(new Tipping_Banner_High());
}
add_action( 'widgets_init', 'wpdocs_register_widgets' );
