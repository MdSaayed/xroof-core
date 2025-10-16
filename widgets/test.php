<?php
namespace Xroof\Core\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Xroof\Core\Traits\Xroof_Button_Trait;
use Xroof\Core\Traits\Xroof_Text_Trait;

if (!defined('ABSPATH'))
    exit;

class Xroof_Test_Widget_1 extends Widget_Base
{
    use Xroof_Button_Trait;
    use Xroof_Text_Trait;

    public function get_name()
    {
        return 'xroof_test_1';
    }
    public function get_title()
    {
        return __('Xroof Test', 'xroof');
    }
    public function get_icon()
    {
        return 'eicon-posts-grid';
    }
    public function get_categories()
    {
        return ['xroof-widget-cat'];
    }

    public function register_controls()
    {


        // -------------------------
        // Style Tab
        // -------------------------
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->register_text_style_controls('header_text', '.my-header');

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .my-header' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <p class="my-header">Lorem ipsum dolor sit amet.</p>
        <?php
    }
}

// Register widget
$widgets_manager->register(new Xroof_Test_Widget_1());
