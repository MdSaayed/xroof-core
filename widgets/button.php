<?php
namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class Xroof_Button_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xroof_button';
    }

    public function get_title()
    {
        return __('Xroof Button', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-button';
    }

    public function get_categories()
    {
        return ['xroof-widget-cat'];
    }

    protected function register_controls()
    {
        $this->register_controls_section();
        $this->register_style_section();
    }

    // Register Controls Section
    protected function register_controls_section()
    {

        // Content Tab
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_type',
            [
                'label' => __('Button Type', 'xroof'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'right' => 'Icon Right',
                    'left' => 'Icon Left',
                    'phone' => 'Phone Button',
                ],
                'default' => 'right',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Book An Appointment',
                'condition' => [
                    'button_type!' => 'phone',
                ],
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'xroof'),
                'type' => Controls_Manager::URL,
                'default' => ['url' => '#'],
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => __('Button SVG Icon', 'xroof'),
                'type' => Controls_Manager::MEDIA,
                'description' => 'Upload an SVG icon. Default icon will be used if none provided.',
            ]
        );

        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        // Style Tab
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Button Style', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Background colors
        $this->add_control(
            'bg_color',
            [
                'label' => __('Background Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .btn' => 'background-color: {{VALUE}};'],
            ]
        );

        $this->add_control(
            'hover_bg_color',
            [
                'label' => __('Hover Background', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .btn:hover' => 'background-color: {{VALUE}};'],
            ]
        );

        // Text colors and typography
        $this->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .btn' => 'color: {{VALUE}};'],
                'condition' => ['button_type!' => 'phone'],
            ]
        );

        $this->add_control(
            'hover_text_color',
            [
                'label' => __('Hover Text Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .btn:hover' => 'color: {{VALUE}};'],
                'condition' => ['button_type!' => 'phone'],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            ['name' => 'typography', 'selector' => '{{WRAPPER}} .btn', 'condition' => ['button_type!' => 'phone']]
        );

        // Button size
        $this->add_responsive_control(
            'button_width',
            [
                'label' => 'Button Width',
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => ['px' => ['min' => 50, 'max' => 1000]],
                'selectors' => ['{{WRAPPER}} .btn' => 'width: {{SIZE}}{{UNIT}};']
            ]
        );

        $this->add_responsive_control(
            'button_height',
            [
                'label' => 'Button Height',
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => ['px' => ['min' => 20, 'max' => 500]],
                'selectors' => ['{{WRAPPER}} .btn' => 'height: {{SIZE}}{{UNIT}};']
            ]
        );

        // Icon size and padding
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => 'Icon Size',
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => ['px' => ['min' => 5, 'max' => 100]],
                'selectors' => ['{{WRAPPER}} .btn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};']
            ]
        );

        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => 'Icon Padding',
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => ['{{WRAPPER}} .btn svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};']
            ]
        );

        // Icon color control (all types)
        $this->add_control(
            'icon_color',
            [
                'label' => 'Icon Color',
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .btn svg path' => 'fill: {{VALUE}};'],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => 'Icon Hover Color',
                'type' => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .btn:hover svg path' => 'fill: {{VALUE}};'],
            ]
        );

        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $btn_text = $settings['button_text'];
        $btn_link = $settings['button_link'];
        $btn_type = $settings['button_type'];
        $btn_icon = $settings['button_icon']['url'];

        // Default SVGs
        $default_icon_right = '<svg width="40" height="4" viewBox="0 0 10 7" fill="none"><path d="M9.07926 2.38846C9.15803 2.13084 9.01303 1.85814 8.75541 1.77938L4.55719 0.495857C4.29957 0.417094 4.02687 0.562088 3.94811 0.819712C3.86934 1.07734 4.01434 1.35003 4.27196 1.42879L8.00371 2.5697L6.8628 6.30145C6.78404 6.55908 6.92903 6.83177 7.18666 6.91054C7.44428 6.9893 7.71697 6.8443 7.79574 6.58668L9.07926 2.38846ZM8.61279 2.24585L8.38379 1.81516L0.362471 6.08018L0.591471 6.51086L0.820471 6.94155L8.84179 2.67654L8.61279 2.24585Z" fill="currentColor"></path></svg>';
        $default_icon_left = $default_icon_right;
        $default_icon_phone = '<svg width="21" height="21" viewBox="0 0 21 21" fill="none"><path d="M19.7529 15.604L16.956 12.8071C15.9571 11.8082 14.2589 12.2078 13.8594 13.5063C13.5597 14.4054 12.5608 14.9048 11.6618 14.705C9.66395 14.2055 6.96691 11.6084 6.46746 9.51069C6.16779 8.61164 6.76713 7.61273 7.66615 7.3131C8.96472 6.91354 9.36428 5.2154 8.36538 4.2165L5.56845 1.41957C4.76932 0.720333 3.57064 0.720333 2.87141 1.41957L0.973487 3.31748C-0.924431 5.31529 1.17327 10.6095 5.86812 15.3043C10.563 19.9992 15.8572 22.1968 17.855 20.199L19.7529 18.301C20.4522 17.5019 20.4522 16.3032 19.7529 15.604Z" fill="currentColor"></path></svg>';

        // Icon setup
        $icon_html = '';
        if ($btn_icon) {
            $svg_content = file_get_contents($btn_icon);
            if ($svg_content) {
                $icon_html = $svg_content;
            }
        } else {
            if ($btn_type === 'right') {
                $icon_html = $default_icon_right;
            } elseif ($btn_type === 'left') {
                $icon_html = $default_icon_left;
            } elseif ($btn_type === 'phone') {
                $icon_html = $default_icon_phone;
            }
        }

        if ($btn_type === 'phone' && !empty($btn_link['url'])) {
            $this->add_render_attribute('button', 'href', 'tel:' . esc_attr($btn_link['url']));
        } elseif (!empty($btn_link['url'])) {
            $this->add_link_attributes('button', $btn_link);
        }

        if ($btn_type === 'right') { ?>
            <a <?php echo $this->get_render_attribute_string('button'); ?> class="btn btn-icon-right-primary">
                <?php echo esc_html($btn_text); ?>
                <?php echo $icon_html; ?>
            </a>
        <?php } elseif ($btn_type === 'left') { ?>
            <a <?php echo $this->get_render_attribute_string('button'); ?> class="btn btn-icon-left-primary">
                <?php echo $icon_html; ?>
                <?php echo esc_html($btn_text); ?>
            </a>
        <?php } elseif ($btn_type === 'phone') { ?>
            <a <?php echo $this->get_render_attribute_string('button'); ?> class="btn btn-phn-primary">
                <?php echo $icon_html; ?>
            </a>
        <?php }
    }

}

$widgets_manager->register(new Xroof_Button_Widget());
