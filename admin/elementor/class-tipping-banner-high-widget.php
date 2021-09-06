<?php


class Elementor_BTCPW_Tipping_Banner_High_Widget extends \Elementor\Widget_Base
{


    /**
     * @return string
     */
    public function get_name()
    {
        return 'elementor_btcpw_tipping_banner_high';
    }

    /**
     * @return string
     */
    public function get_title()
    {
        return 'BP Tipping Banner High';
    }

    /**
     * @return string
     */
    public function get_icon()
    {
        return 'fa fa-btc';
    }

    /**
     * @return string[]
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     *
     */
    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'btc-paywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'dimension',
            [
                'label' => 'Dimension',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    '250x300' => '250x300',
                    '300x300' => '300x300',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => 'Title',
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => 'Support my work'
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'Description',
                'type'  => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
            ]
        );
        $this->add_control(
            'tipping_text',
            [
                'label' => 'Tipping text',
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => 'Enter Tipping Amount',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => 'Title color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label' => 'Description color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
            ]
        );
        $this->add_control(
            'tipping_text_color',
            [
                'label' => 'Tipping text color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
            ]
        );
        $this->add_control(
            'background_color',
            [
                'label' => 'Background color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#E6E6E6',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
                ],
            ]
        );


        $this->add_control(
            'button_text',
            [
                'label' => 'Button text',
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => 'Tipping now',
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => 'Button text color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => 'Button color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#FE642E',
            ]
        );
        $this->add_control(
            'currency',
            [
                'label' => 'Currency',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'SATS' => 'SATS',
                    'BTC' => 'BTC',
                    'EUR' => 'EUR',
                    'USD' => 'USD',
                ],
                'default' => 'SATS',
            ]
        );
        $this->add_control(
            'input_background',
            [
                'label' => 'Input background color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffa500',
            ]
        );
        $this->add_control(
            'background',
            [
                'label' => 'Header and footer background color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#1d5aa3',
            ]
        );

        $this->end_controls_section();
    }

    /**
     *
     */
    protected function render()
    {
        //$settings = $this->get_settings_for_display();
        var_dump($this->get_settings_for_display());
        /*do_shortcode("[btcpw_tipping_box dimension='{$settings['dimension']}' title = '{$settings['title']}' description = '{$settings['description']}'
        currency = '{$settings['currency']}'
        background_color = '{$settings['background_color']}'
        title_text_color = '{$settings['title_text_color']}'
        tipping_text = '{$settings['tipping_text']}'
        tipping_text_color = '{$settings['tipping_text_color']}'
        redirect = '{$settings['redirect']}'
        description_color = '{$settings['description_color']}'
        button_text = '{$settings['button_text']}'
        button_text_color = '{$settings['button_text_color']}'
        button_color = '{$settings['button_color']}'
        logo_id = '{$settings['logo_id']}'
        background_id = '{$settings['background_id']}'
        background = '{$settings['background']}'
        input_background = '{$settings['input_background']}']");*/
    }
}
