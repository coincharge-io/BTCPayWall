<?php

use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @since 1.0.8
 */
class TestShortcodes extends TestCase
{
    public function set_up()
    {
        parent::set_up();
    }

    public function tear_down()
    {
        parent::tear_down();
    }

    public function test_shortcodes_registered()
    {
        global $shortcode_tags;

        $this->assertArrayHasKey('btcpw_start_content', $shortcode_tags);
        $this->assertArrayHasKey('btcpw_start_video', $shortcode_tags);
        $this->assertArrayHasKey('btcpw_tipping_page', $shortcode_tags);
        $this->assertArrayHasKey('btcpw_tipping_banner_high', $shortcode_tags);
        $this->assertArrayHasKey('btcpw_tipping_banner_wide', $shortcode_tags);
        $this->assertArrayHasKey('btcpw_tipping_box', $shortcode_tags);
        $this->assertArrayHasKey('btcpw_end_content', $shortcode_tags);
    }
}
