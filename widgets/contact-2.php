<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;

class Xroof_Contact_Widget_2 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-contact-2';
    }

    public function get_title()
    {
        return esc_html__('Xroof Contact 2', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-contact';
    }

    public function get_categories()
    {
        return ['xroof-widget-cat'];
    }

    public function get_keywords()
    {
        return ['contact', 'form', 'map', 'location'];
    }

    protected function register_controls()
    {
        $this->register_content_controls();
        $this->register_style_controls();
    }

    protected function register_content_controls()
    {
        $this->start_controls_section(
            'contact_map_section',
            [
                'label' => esc_html__('Map', 'xroof'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'map_title',
            [
                'label' => esc_html__('Map Section Title', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get in Touch', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'map_description',
            [
                'label' => esc_html__('Map Section Text', 'xroof'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'xroof'),
                'rows' => 5,
            ]
        );
        $this->add_control(
            'map_location_address',
            [
                'label' => esc_html__('Location Address', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Dhaka, Bangladesh', 'xroof'),
                'placeholder' => esc_html__('Enter a physical address or place name', 'xroof'),
                'label_block' => true,
                'description' => esc_html__('Enter an address to dynamically display on the map.', 'xroof'),
            ]
        );
        $this->add_control(
            'map_zoom_level',
            [
                'label' => esc_html__('Map Zoom Level (1-21)', 'xroof'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 21,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],
                'description' => esc_html__('Zoom level controls how close the map appears. 1=World, 21=Close-up.', 'xroof'),
            ]
        );

        $this->add_control(
            'iframe_height',
            [
                'label' => esc_html__('Map Height (px)', 'xroof'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 800,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 450,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'contact_map_section',
            [
                'label' => esc_html__('Contact Form', 'xroof'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'form_shortcode',
            [
                'label' => esc_html__('Add your form shortcode here', 'xroof'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('', 'xroof'),
                'rows' => 5,
            ]
        );
        $this->end_controls_section();
    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            'contact_style_map_info',
            [
                'label' => __('Map Info Text', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'map_title_heading',
            [
                'label' => esc_html__('Map Title', 'xroof'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'map_title_color',
            [
                'label' => __('Title Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact__map-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'map_title_typography',
                'selector' => '{{WRAPPER}} .contact__map-title',
            ]
        );
        $this->add_control(
            'map_description_heading',
            [
                'label' => esc_html__('Map Description', 'xroof'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'map_text_color',
            [
                'label' => __('Text Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact__map-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'map_text_typography',
                'selector' => '{{WRAPPER}} .contact__map-text',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'contact_style_form_fields',
            [
                'label' => __('Form Fields', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'field_text_color',
            [
                'label' => __('Text/Placeholder Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-form__input, {{WRAPPER}} .contact-form__textarea' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .contact-form__input::placeholder, {{WRAPPER}} .contact-form__textarea::placeholder' => 'color: {{VALUE}}; opacity: 0.8;',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'field_background',
                'label' => __('Background', 'xroof'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .contact-form__input, {{WRAPPER}} .contact-form__textarea',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'field_border',
                'selector' => '{{WRAPPER}} .contact-form__input, {{WRAPPER}} .contact-form__textarea',
            ]
        );
        $this->add_control(
            'field_border_radius',
            [
                'label' => __('Border Radius', 'xroof'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-form__input, {{WRAPPER}} .contact-form__textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'contact_style_button',
            [
                'label' => __('Submit Button', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .contact-form__btn',
            ]
        );
        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .contact-form__btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'label' => __('Background', 'xroof'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .contact-form__btn',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'button_text_hover_color',
            [
                'label' => __('Text Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-form__btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_background_hover',
                'label' => __('Background', 'xroof'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .contact-form__btn:hover',
            ]
        );
        $this->add_control(
            'button_hover_transition',
            [
                'label' => __('Transition Duration (s)', 'xroof'),
                'type' => Controls_Manager::SLIDER,
                'range' => ['s' => ['min' => 0, 'max' => 3, 'step' => 0.1]],
                'selectors' => [
                    '{{WRAPPER}} .contact-form__btn' => 'transition: all {{SIZE}}s ease-in-out;',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'xroof'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .contact-form__btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $address = urlencode($settings['map_location_address']);
        $zoom = $settings['map_zoom_level']['size'] ?? 14;

        $dynamic_map_url = "https://maps.google.com/maps?q={$address}&t=&z={$zoom}&ie=UTF8&iwloc=&output=embed";

        ?>

        <section class="contact contact--style-2">
            <div class="contact__container container">
                <div class="contact__content mt-10 mt-xl-15 mt-xxl-20">
                    <div class="row g-5">
                        <div class="col-xl-6">
                            <div class="contact__map">
                                <?php if ($settings["map_title"]): ?>
                                    <h3 class="contact__map-title mb-4"><?php echo esc_html($settings['map_title']); ?></h3>
                                <?php endif; ?>
                                <?php if ($settings["map_description"]): ?>
                                    <p class="contact__map-text body-text"><?php echo esc_html($settings['map_description']); ?></p>
                                <?php endif; ?>

                                <div class="mt-10 mt-xl-15 mt-xxl-20">
                                    <div class="contact__map-iframe-wrapper">
                                        <iframe class="w-100" src="<?php echo esc_url($dynamic_map_url); ?>"
                                            height="<?php echo esc_attr($settings['iframe_height']['size'] ?? 450); ?>"
                                            style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Contact Form -->
                        <div class="col-xl-6">
                            <div class="contact__form-wrapper">
                                <div class="contact-form">
                                     <?php if (!empty($settings['form_shortcode'])): ?>
											<?php echo do_shortcode($settings['form_shortcode']); ?>
										<?php else: ?>
											<div class="alert alert-danger" role="alert">
												<?php echo esc_html__('Please configure the form shortcode in the widget settings to display the contact form here.', 'xroof'); ?>
											</div>
										<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Contact_Widget_2());


 