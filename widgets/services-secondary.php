<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Services_Secondary_Widget_1 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-services-secondary';
    }

    public function get_title()
    {
        return esc_html__('Xroof Services Secondary', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-post-info';
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
        $this->start_controls_section(
            'services-content-section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'services_card_icon',
            [
                'label' => esc_html__('Choose Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/svg/services-secondary-1.svg',
                ],
            ]
        );
        $repeater->add_control(
            'services_card_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Emergency Roofing Services', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'services_card_number',
            [
                'label' => esc_html__('Number', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Emergency Roofing Services', 'xroof'),
                'placeholder' => esc_html__('Type your number here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'services_card_image',
            [
                'label' => esc_html__('Choose Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/services/services-1.png',
                ],
            ]
        );
        $this->add_control(
            'services_list',
            [
                'label' => esc_html__('Repeater Items', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'services_card_icon' => ['url' => get_template_directory_uri() . '/assets/svg/services-secondary-1.svg'],
                        'services_card_title' => 'Emergency Roofing Services',
                        'services_card_number' => '+1 (219) - 5354665',
                        'services_card_image' => ['url' => get_template_directory_uri() . '/assets/img/services/services-1.png'],
                    ],
                    [
                        'services_card_icon' => ['url' => get_template_directory_uri() . '/assets/svg/services-secondary-2.svg'],
                        'services_card_title' => 'Explore Our Roofing Services',
                        'services_card_number' => '+1 (219) - 5354665',
                        'services_card_image' => ['url' => get_template_directory_uri() . '/assets/img/services/services-2.png'],
                    ],
                ],
                'title_field' => '{{{ services_card_title }}}',
                'min' => 2,
                'max' => 2,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'services-container-section',
            [
                'label' => esc_html__('Container', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->register_spacing_controls('services-secondary','services__container');
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'testimonials_style_section',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('services-card-title', 'services__card-title', 'Title');
        // ============================
        // Button 01 Style Controls
        // ============================
        $this->add_control(
            'services_btn_style',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Button 01', 'xroof'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'services_btn_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('services_btn_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'services_btn_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .btn-icon-left-primary',
            ]
        );
        $this->add_control(
            'btn_text_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-primary' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn-icon-left-primary',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'selector' => '{{WRAPPER}} .btn-icon-left-primary',
            ]
        );
        $this->add_control(
            'btn_border_radius',
            [
                'label' => esc_html__('Border Radius', 'xroof'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'xroof'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'services_btn_hover_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'btn_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-primary:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_hover_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn-icon-left-primary:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_hover_border',
                'selector' => '{{WRAPPER}} .btn-icon-left-primary:hover',
            ]
        );
        $this->add_control(
            'btn_hover_transition',
            [
                'label' => esc_html__('Transition Duration (s)', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    's' => [
                        'min' => 0,
                        'max' => 2,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-primary' => 'transition: all {{SIZE}}s ease;',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        // ============================
        // Button 02 Style Controls
        // ============================
        $this->add_control(
            'services_btn2_style',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Button 02', 'xroof'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'services_btn2_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('services_btn2_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'services_btn2_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn2_typography',
                'selector' => '{{WRAPPER}} .btn-icon-left-secondary',
            ]
        );
        $this->add_control(
            'btn2_text_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-secondary' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn2_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn-icon-left-secondary',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn2_border',
                'selector' => '{{WRAPPER}} .btn-icon-left-secondary',
            ]
        );
        $this->add_control(
            'btn2_border_radius',
            [
                'label' => esc_html__('Border Radius', 'xroof'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-secondary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn2_padding',
            [
                'label' => esc_html__('Padding', 'xroof'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'services_btn2_hover_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'btn2_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-secondary:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn2_hover_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn-icon-left-secondary:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn2_hover_border',
                'selector' => '{{WRAPPER}} .btn-icon-left-secondary:hover',
            ]
        );
        $this->add_control(
            'btn2_hover_transition',
            [
                'label' => esc_html__('Transition Duration (s)', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    's' => [
                        'min' => 0,
                        'max' => 2,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-left-secondary' => 'transition: all {{SIZE}}s ease;',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>

        <section class="services services--secondary">
            <div class="services__container services__container--global container">
                <div class="row g-4 services__cards overflow-hidden">
                    <?php if (!empty($settings['services_list'])): ?>
                        <?php foreach ($settings['services_list'] as $index => $item):
                            $card_class = ($index === 0) ? ' services__card--emergency' : ' services__card--explore';
                            $btn_class = ($index === 0) ? '  btn-icon-left-primary' : ' btn-icon-left-secondary';
                            ?>
                            <div class="col col-12 col-md-6">
                                <div class="services__card <?php echo esc_attr($card_class); ?> d-flex align-items-center">
                                    <div class="services__card-content">
                                        <div class="services__card-icon-wrap">
                                            <img class="services__card-icon"
                                                src="<?php echo esc_url($item['services_card_icon']['url']); ?>" alt="Services Icon">
                                        </div>

                                        <?php if (!empty($item['services_card_title'])): ?>
                                            <h3 class="services__card-title">
                                                <?php echo esc_html($item['services_card_title']); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <a href="tel:+12195354665" class="services__btn <?php echo esc_attr($btn_class); ?>">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                                                <path
                                                    d="M12.3241 9.36829L10.646 7.69013C10.0466 7.09079 9.02774 7.33055 8.788 8.10967C8.6082 8.6491 8.00885 8.94877 7.46945 8.82888C6.27076 8.52921 4.65254 6.97092 4.35286 5.7123C4.17306 5.17287 4.53267 4.57352 5.07208 4.39374C5.85122 4.15401 6.09096 3.13513 5.49162 2.53578L3.81346 0.857624C3.33398 0.438084 2.61477 0.438084 2.19523 0.857624L1.05648 1.99637C-0.0822709 3.19506 1.17635 6.37158 3.99326 9.18849C6.81017 12.0054 9.98668 13.324 11.1854 12.1253L12.3241 10.9865C12.7437 10.507 12.7437 9.78783 12.3241 9.36829Z"
                                                    fill="#EE212B" />
                                            </svg>
                                            +1 (219) - 5354665
                                        </a>
                                    </div>

                                    <?php if (!empty($item['services_card_image']['url'])): ?>
                                        <div class="services__card-image">
                                            <img src="<?php echo esc_url($item['services_card_image']['url']); ?>" alt="Emergency Roofing">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Services_Secondary_Widget_1());
