<?php
namespace Xroof\Core\Traits;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Icons_Manager;


trait Xroof_Controls_Trait
{

    protected function add_universal_input_control($id, $label, $type = 'text', $options = [])
    {
        $control_types = [
            'text' => Controls_Manager::TEXT,
            'textarea' => Controls_Manager::TEXTAREA,
            'number' => Controls_Manager::NUMBER,
            'switcher' => Controls_Manager::SWITCHER,
            'url' => Controls_Manager::URL,
            'media' => Controls_Manager::MEDIA,
            'select' => Controls_Manager::SELECT,
            'choose' => Controls_Manager::CHOOSE,
            'color' => Controls_Manager::COLOR,
            'wysiwyg' => Controls_Manager::WYSIWYG,
            'repeater' => Controls_Manager::REPEATER,
            'slider' => Controls_Manager::SLIDER,
            'dimensions' => Controls_Manager::DIMENSIONS,
            'heading' => Controls_Manager::HEADING,
            'divider' => Controls_Manager::DIVIDER,
        ];

        $args = array_merge([
            'label' => $label,
            'type' => $control_types[$type] ?? Controls_Manager::TEXT,
            'label_block' => true,
        ], $options);

        $this->add_control($id, $args);
    }

    protected function register_spacing_controls($id_prefix = 'spacing', $class_name='')
    {
        $selector = '.' . $class_name;

        // Margin control
        $this->add_responsive_control(
            $id_prefix . '_margin',
            [
                'label' => esc_html__('Margin', 'xroof'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' => [],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Padding control
        $this->add_responsive_control(
            $id_prefix . '_padding',
            [
                'label' => esc_html__('Padding', 'xroof'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' => [],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    }

    protected function register_border_radius_control($id_prefix = 'border_radius', $class_name = 'element')
    {
        $selector = '.' . $class_name;

        $this->add_responsive_control(
            $id_prefix,
            [
                'label' => esc_html__('Border Radius', 'xroof'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    }

    protected function add_size_controls($id_prefix, $selector, $units = ['px', '%', 'vw', 'vh'], $max_value = 1000)
    {
        if ($selector && strpos($selector, '.') !== 0 && strpos($selector, '#') !== 0) {
            $selector = '.' . ltrim($selector);
        }

        $this->add_responsive_control(
            $id_prefix . '_width',
            [
                'label' => esc_html__('Width', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => $units,
                'default' => ['unit' => 'px'],
                'range' => [
                    'px' => ['min' => 0, 'max' => $max_value, 'step' => 0],
                    '%' => ['min' => 0, 'max' => 100],
                    'vw' => ['min' => 0, 'max' => 100],
                    'vh' => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            $id_prefix . '_height',
            [
                'label' => esc_html__('Height', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => $units,
                'default' => ['unit' => 'px'],
                'range' => [
                    'px' => ['min' => 0, 'max' => $max_value, 'step' => 1],
                    '%' => ['min' => 0, 'max' => 100],
                    'vw' => ['min' => 0, 'max' => 100],
                    'vh' => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
    }

    protected function register_text_style_controls($id_prefix = 'text', $selector = 'text', $label = 'Text')
    {
        $selector = ltrim($selector, '.');

        $this->add_control(
            $id_prefix . '_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('%s', 'xroof'), $label),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            $id_prefix . '_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs($id_prefix . '_tabs');
        $this->start_controls_tab(
            $id_prefix . '_content_tab',
            [
                'label' => __('Content', 'xroof'),
            ]
        );
        $this->add_control(
            $id_prefix . '_color',
            [
                'label' => sprintf(__('Color', 'xroof')),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .' . $selector => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            $id_prefix . '_align',
            [
                'label' => __('Alignment', 'xroof'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => ['title' => __('Left', 'xroof'), 'icon' => 'eicon-text-align-left'],
                    'center' => ['title' => __('Center', 'xroof'), 'icon' => 'eicon-text-align-center'],
                    'right' => ['title' => __('Right', 'xroof'), 'icon' => 'eicon-text-align-right'],
                    'justify' => ['title' => __('Justify', 'xroof'), 'icon' => 'eicon-text-align-justify'],
                ],
                'default' => '',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .' . $selector => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            $id_prefix . '_transform',
            [
                'label' => __('Text Transform', 'xroof'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'xroof'),
                    'uppercase' => __('UPPERCASE', 'xroof'),
                    'lowercase' => __('lowercase', 'xroof'),
                    'capitalize' => __('Capitalize', 'xroof'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .' . $selector => 'text-transform: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            $id_prefix . '_typography_tab',
            [
                'label' => __('Typography', 'xroof'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => $id_prefix . '_typography',
                'selector' => '{{WRAPPER}} .' . $selector,
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => $id_prefix . '_text_shadow',
                'selector' => '{{WRAPPER}} .' . $selector,
            ]
        );
        $this->add_responsive_control(
            $id_prefix . '_letter_spacing',
            [
                'label' => __('Letter Spacing', 'xroof'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 50],
                ],
                'selectors' => [
                    '{{WRAPPER}} .' . $selector => 'letter-spacing: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            $id_prefix . '_line_height',
            [
                'label' => __('Line Height', 'xroof'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => ['min' => 10, 'max' => 200],
                ],
                'selectors' => [
                    '{{WRAPPER}} .' . $selector => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            $id_prefix . '_advanced_tab',
            [
                'label' => __('Advanced', 'xroof'),
            ]
        );
        $this->add_responsive_control(
            $id_prefix . '_max_width',
            [
                'label' => __('Max Width', 'xroof'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 2000],
                    '%' => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .' . $selector => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            $id_prefix . '_margin',
            [
                'label' => __('Margin', 'xroof'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .' . $selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            $id_prefix . '_padding',
            [
                'label' => __('Padding', 'xroof'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .' . $selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
    }

    protected function add_background_controls($id_prefix = 'bg', $selector = 'element', $label = 'Background', $defaults = [])
    {
        $selector = '.' . ltrim($selector, '.');

        $fields_options = [
            'background' => [
                'default' => 'classic',
            ],
        ];

        if (!empty($defaults)) {
            foreach ($defaults as $key => $value) {
                $fields_options[$key] = [
                    'default' => $value,
                ];
            }
        }

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => $id_prefix,
                'label' => esc_html__($label, 'xroof'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} ' . $selector,
                'fields_options' => $fields_options,
            ]
        );

        // Position
        $this->add_control(
            $id_prefix . '_position',
            [
                'label' => esc_html__($label . ' Position', 'xroof'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left top' => 'Left Top',
                    'left center' => 'Left Center',
                    'left bottom' => 'Left Bottom',
                    'center top' => 'Center Top',
                    'center center' => 'Center Center',
                    'center bottom' => 'Center Bottom',
                    'right top' => 'Right Top',
                    'right center' => 'Right Center',
                    'right bottom' => 'Right Bottom',
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'background-position: {{VALUE}};',
                ],
            ]
        );

        // Size
        $this->add_control(
            $id_prefix . '_size',
            [
                'label' => esc_html__($label . ' Size', 'xroof'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'auto' => 'Auto',
                    'cover' => 'Cover',
                    'contain' => 'Contain',
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'background-size: {{VALUE}};',
                ],
            ]
        );

        // Repeat
        $this->add_control(
            $id_prefix . '_repeat',
            [
                'label' => esc_html__($label . ' Repeat', 'xroof'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no-repeat' => 'No Repeat',
                    'repeat' => 'Repeat',
                    'repeat-x' => 'Repeat Horizontally',
                    'repeat-y' => 'Repeat Vertically',
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'background-repeat: {{VALUE}};',
                ],
            ]
        );

        // Attachment
        $this->add_control(
            $id_prefix . '_attachment',
            [
                'label' => esc_html__($label . ' Attachment', 'xroof'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'scroll' => 'Scroll',
                    'fixed' => 'Fixed',
                    'local' => 'Local',
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'background-attachment: {{VALUE}};',
                ],
            ]
        );
    }

  
  
    protected function register_button_content_controls($id = 'btn', $selector = 'btn', $label = 'Button')
    {
        $selector = ltrim($selector, '.');

        $this->add_control(
            $id . '_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('%s', 'xroof'), $label),
                'separator' => 'before',
            ]
        );

        // Visual separator line
        $this->add_control(
            $id . '_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs($id . '_tabs');

        // General Tab
        $this->start_controls_tab(
            $id . '_general_tab',
            [
                'label' => __('General', 'xroof'),
            ]
        );

        $this->add_control(
            $id . '_type',
            [
                'label' => __('Button Type', 'xroof'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'right' => __('Icon Right', 'xroof'),
                    'left' => __('Icon Left', 'xroof'),
                    'phone' => __('Phone Button', 'xroof'),
                ],
                'default' => 'right',
            ]
        );

        $this->add_control(
            $id . '_text',
            [
                'label' => __('Button Text', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', 'xroof'),
                'condition' => [$id . '_type!' => 'phone'],
            ]
        );

        $this->add_control(
            $id . '_link',
            [
                'label' => __('Button Link', 'xroof'),
                'type' => Controls_Manager::URL,
                'default' => ['url' => '#'],
            ]
        );

        $this->end_controls_tab();


        // Icon Tab
        $this->start_controls_tab(
            $id . '_icon_tab',
            [
                'label' => __('Icon', 'xroof'),
            ]
        );

        $this->add_control(
            $id . '_icon',
            [
                'label' => __('Button SVG Icon', 'xroof'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Upload an SVG icon. Default icon will be used if none provided.', 'xroof'),
            ]
        );

        $this->add_responsive_control(
            $id . '_icon_size',
            [
                'label' => __('Icon Size', 'xroof'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => ['min' => 5, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .' . $selector . ' svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            $id . '_icon_spacing',
            [
                'label' => __('Icon Spacing', 'xroof'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 50],
                ],
                'selectors' => [
                    '{{WRAPPER}} .' . $selector . '.icon-left svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .' . $selector . '.icon-right svg' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();
    }

    protected function register_button_style_controls($id = 'btn', $selector = 'btn', $label = 'Button')
    {
        $selector = '.' . ltrim($selector, '.');

        $this->add_control(
            $id . '_style_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('%s', 'xroof'), $label),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            $id . '_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs($id . '_style_tabs');
        // Normal Tab
        $this->start_controls_tab(
            $id . '_normal_tab',
            [
                'label' => __('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            $id . '_bg_color',
            [
                'label' => __('Background Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ["{{WRAPPER}} {$selector}" => 'background-color: {{VALUE}};'],
            ]
        );
        $this->add_control(
            $id . '_text_color',
            [
                'label' => __('Text Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ["{{WRAPPER}} {$selector}" => 'color: {{VALUE}};'],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => $id . '_typography',
                'selector' => "{{WRAPPER}} {$selector}",
            ]
        );
        $this->add_control(
            $id . '_icon_color',
            [
                'label' => __('Icon Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ["{{WRAPPER}} {$selector} svg path" => 'fill: {{VALUE}};'],
            ]
        );
        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            $id . '_hover_tab',
            [
                'label' => __('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            $id . '_hover_bg_color',
            [
                'label' => __('Background Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ["{{WRAPPER}} {$selector}:hover" => 'background-color: {{VALUE}};'],
            ]
        );
        $this->add_control(
            $id . '_hover_text_color',
            [
                'label' => __('Text Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ["{{WRAPPER}} {$selector}:hover" => 'color: {{VALUE}};'],
            ]
        );
        $this->add_control(
            $id . '_icon_hover_color',
            [
                'label' => __('Icon Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => ["{{WRAPPER}} {$selector}:hover svg path" => 'fill: {{VALUE}};'],
            ]
        );
        $this->end_controls_tab();

        // Advanced Tab
        $this->start_controls_tab(
            $id . '_advanced_tab',
            [
                'label' => __('Advanced', 'xroof'),
            ]
        );
        $this->add_responsive_control(
            $id . '_padding',
            [
                'label' => __('Padding', 'xroof'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => ["{{WRAPPER}} {$selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
            ]
        );
        $this->add_responsive_control(
            $id . '_margin',
            [
                'label' => __('Margin', 'xroof'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => ["{{WRAPPER}} {$selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => $id . '_border',
                'selector' => "{{WRAPPER}} {$selector}",
            ]
        );
        $this->add_responsive_control(
            $id . '_border_radius',
            [
                'label' => __('Border Radius', 'xroof'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => ["{{WRAPPER}} {$selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => $id . '_shadow',
                'selector' => "{{WRAPPER}} {$selector}",
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
    }

    protected function register_subtitle_content_controls($selector = 'subtitle')
    {
        $this->add_control(
            'subtitle-text',
            [
                'label' => esc_html__('Subtitle', 'text-domain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Subtitle', 'text-domain'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'subtitle_icon',
            [
                'label' => esc_html__('Subtitle Icon', 'text-domain'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-hammer',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'subtitle_icon_size',
            [
                'label' => esc_html__('Subtitle Icon Size', 'text-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'default' => [
                    'size' => 30,
                ],
                'range' => [
                    'px' => ['min' => 10, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .subtitle-wrap svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
    }

    protected function register_subtitle_style_controls($id = 'subtitle', $selector = 'subtitle')
    {
        $this->add_control(
            $id . '_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('Subtitle', 'xroof')),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            $id . '_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_control(
            $id . '_color',
            [
                'label' => esc_html__('Subtitle Color', 'text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .' . $selector => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => $id . '_typography',
                'label' => esc_html__('Subtitle Typography', 'text-domain'),
                'selector' => '{{WRAPPER}} .' . $selector,
            ]
        );

        $this->add_control(
            'subtitle-alignment',
            [
                'label' => esc_html__('Alignment', 'xroof'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Start', 'xroof'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'xroof'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('End', 'xroof'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .subtitle-wrap' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->start_controls_tabs('icon_style_tabs');
        $this->start_controls_tab(
            'icon_normal',
            [
                'label' => esc_html__('Normal', 'text-domain'),
            ]
        );
        $this->add_control(
            $id . '_icon_color',
            [
                'label' => esc_html__('Icon Color', 'text-domain'),
                'type' => Controls_Manager::COLOR,
                'default' => '#EE212B',
                'selectors' => [
                    '{{WRAPPER}} .subtitle-wrap svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            $id . '_icon_size',
            [
                'label' => esc_html__('Icon Size', 'text-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .subtitle-wrap svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_hover',
            [
                'label' => esc_html__('Hover', 'text-domain'),
            ]
        );
        $this->add_control(
            $id . '_icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle-wrap svg:hover' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
    }

    protected function add_section_heading($id_prefix, $label)
    {
        $this->add_control(
            $id_prefix . '_style',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => sprintf(__('%s', 'xroof'), $label),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            $id_prefix . '_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
    }

    protected function add_svg_control($context, $id = 'icon', $label = 'SVG Icon', $default_svg = '')
    {
        $default = [];

        if (!empty($default_svg)) {
            if (strpos($default_svg, 'http') !== 0) {
                $default_svg = get_template_directory_uri() . $default_svg;
            }

            $default = [
                'url' => $default_svg,
            ];
        }

        $context->add_control(
            $id,
            [
                'label' => __($label, 'xroof'),
                'type' => Controls_Manager::MEDIA,
                'media_types' => ['svg'],
                'default' => $default,
            ]
        );
    }

    protected function render_svg($svg_url)
    {
        if (empty($svg_url))
            return '';

        // 🧠 Step 1: Handle Elementor media array
        if (is_array($svg_url)) {
            if (!empty($svg_url['url'])) {
                $svg_url = $svg_url['url']; // extract actual URL
            } else {
                return ''; // array but no URL
            }
        }

        // 🧠 Step 2: Now $svg_url is definitely a string
        if (!is_string($svg_url) || trim($svg_url) === '') {
            return '';
        }

        // 🧱 Step 3: Handle relative paths like /assets/svg/...
        if (strpos($svg_url, 'http') !== 0) {
            // adjust depending on your default icon location
            $svg_url = plugin_dir_url(__FILE__) . ltrim($svg_url, '/');
        }

        // 🧩 Step 4: Load SVG content
        if (strpos($svg_url, home_url()) !== false) {
            $response = wp_remote_get($svg_url);
            if (is_wp_error($response))
                return '';
            $svg_code = wp_remote_retrieve_body($response);
        } else {
            $svg_code = @file_get_contents($svg_url);
        }

        // 🧩 Step 5: If SVG is empty, stop
        if (empty($svg_code))
            return '';

        // ✅ Step 6: Sanitize output
        return xroof_kses($svg_code);
    }

    protected function render_button($id = 'btn', $selector = 'btn')
    {
        $settings = $this->get_settings_for_display();
        $btn_text = $settings[$id . '_text'] ?? '';
        $btn_link = $settings[$id . '_link'] ?? [];
        $btn_type = $settings[$id . '_type'] ?? 'right';
        $btn_icon = $settings[$id . '_icon']['url'] ?? '';

        $default_icon_right = '<svg width="40" height="4" viewBox="0 0 10 7" fill="none"><path d="M9.07926 2.38846C9.15803 2.13084 9.01303 1.85814 8.75541 1.77938L4.55719 0.495857C4.29957 0.417094 4.02687 0.562088 3.94811 0.819712C3.86934 1.07734 4.01434 1.35003 4.27196 1.42879L8.00371 2.5697L6.8628 6.30145C6.78404 6.55908 6.92903 6.83177 7.18666 6.91054C7.44428 6.9893 7.71697 6.8443 7.79574 6.58668L9.07926 2.38846ZM8.61279 2.24585L8.38379 1.81516L0.362471 6.08018L0.591471 6.51086L0.820471 6.94155L8.84179 2.67654L8.61279 2.24585Z" fill="currentColor"></path></svg>';
        $default_icon_left = $default_icon_right;
        $default_icon_phone = '<svg width="21" height="21" viewBox="0 0 21 21" fill="none"><path d="M19.7529 15.604L16.956 12.8071C15.9571 11.8082 14.2589 12.2078 13.8594 13.5063C13.5597 14.4054 12.5608 14.9048 11.6618 14.705C9.66395 14.2055 6.96691 11.6084 6.46746 9.51069C6.16779 8.61164 6.76713 7.61273 7.66615 7.3131C8.96472 6.91354 9.36428 5.2154 8.36538 4.2165L5.56845 1.41957C4.76932 0.720333 3.57064 0.720333 2.87141 1.41957L0.973487 3.31748C-0.924431 5.31529 1.17327 10.6095 5.86812 15.3043C10.563 19.9992 15.8572 22.1968 17.855 20.199L19.7529 18.301C20.4522 17.5019 20.4522 16.3032 19.7529 15.604Z" fill="currentColor"></path></svg>';

        $icon_html = '';
        if ($btn_icon) {
            $svg_content = @file_get_contents($btn_icon);
            $icon_html = $svg_content ?: '';
        } else {
            if ($btn_type === 'left')
                $icon_html = $default_icon_left;
            elseif ($btn_type === 'phone')
                $icon_html = $default_icon_phone;
            else
                $icon_html = $default_icon_right;
        }

        if ($btn_type === 'phone' && !empty($btn_link['url'])) {
            $this->add_render_attribute($id, 'href', 'tel:' . esc_attr($btn_link['url']));
        } elseif (!empty($btn_link['url'])) {
            $this->add_link_attributes($id, $btn_link);
        }

        if ($btn_type === 'right') { ?>
            <a <?php echo $this->get_render_attribute_string($id); ?>
                class="btn btn-icon-right-primary <?php echo esc_attr($selector); ?>">
                <?php echo esc_html($btn_text); ?>
                <?php echo $icon_html; ?>
            </a>
        <?php } elseif ($btn_type === 'left') { ?>
            <a <?php echo $this->get_render_attribute_string($id); ?>
                class="btn btn-icon-left-primary <?php echo esc_attr($selector); ?>">
                <?php echo $icon_html; ?>
                <?php echo esc_html($btn_text); ?>
            </a>
        <?php } elseif ($btn_type === 'phone') { ?>
            <a <?php echo $this->get_render_attribute_string($id); ?>
                class="btn btn-phn-primary <?php echo esc_attr($selector); ?>">
                <?php echo $icon_html; ?>
            </a>
        <?php }
    }

    protected function render_subtitle($id = 'subtitle', $selector = 'subtitle')
    {
        $settings = $this->get_settings_for_display();

        if (!empty($settings['subtitle-text'])) {
            ?>
            <div class="subtitle-wrap d-flex align-items-center mb-4 gap-4">
                <?php
                if (!empty($settings['subtitle_icon']['value'])) {
                    Icons_Manager::render_icon(
                        $settings['subtitle_icon'],
                        ['aria-hidden' => 'true']
                    );
                }
                if (!empty($settings['subtitle-text'])) {
                    ?>
                    <p class="subtitle <?php echo esc_attr($selector); ?> mb-0">
                        <?php echo esc_html($settings['subtitle-text']); ?>
                    </p>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
}













