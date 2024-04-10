<?php

use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @since 1.0.8
 */
class TestCustomPostType extends TestCase
{
    public function set_up()
    {
        parent::set_up();
    }

    public function tear_down()
    {
        parent::tear_down();
    }

    public function test_digital_downloads_post_type()
    {
        global $wp_post_types;
        $this->assertArrayHasKey('digital_download', $wp_post_types);
    }
    public function test_donation_post_type()
    {
        global $wp_post_types;
        $this->assertArrayHasKey('btcpw_donation', $wp_post_types);
    }
}
