<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_CTA_Widget_1 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-cta-1';
    }

    public function get_title()
    {
        return esc_html__('Xroof CTA 1', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-price-list';
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
            'cta-content-section',
            [
                'label' => esc_html__('Cta Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'cta_title',
            [
                'label' => esc_html__('CTA Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get in Touch with Our Roofing Experts Today', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'cta_desc',
            [
                'label' => esc_html__('CTA Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Reach out now for a free consultation, expert advice, and reliable solutions for all your roofing needs.', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'cta-button-text-1',
            [
                'label' => esc_html__('Button 1 Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Book An Appointment', 'xroof'),
                'placeholder' => esc_html__('Type your button here', 'xroof'),
            ]
        );
        $this->add_control(
            'cta-button-link-1',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'cta-button-text-2',
            [
                'label' => esc_html__('Button 2 Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+1 281 590 272', 'xroof'),
                'placeholder' => esc_html__('Type your button here', 'xroof'),
            ]
        );
        $this->add_control(
            'cta-button-link-2',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'section_style_title',
            [
                'label' => __('Title', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->register_text_style_controls('cta-title', 'footer__cta-title', 'Title');
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_desc',
            [
                'label' => __('Description', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('cta-desc', 'footer__cta-desc', 'Description');
        $this->end_controls_section();
        $this->start_controls_section(
            'cta_bg_img_section',
            [
                'label' => __('CTA Background Img', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cta_bg_img',
            [
                'label' => esc_html__('Choose Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'cta_bg_img_size',
                'exclude' => ['custom'],
                'include' => [],
                'default' => 'large',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'cta-buttons-section',
            [
                'label' => __('CTA Buttons', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('cta-buttons-tabs');

        /* ---------------- Normal Tab ---------------- */
        $this->start_controls_tab(
            'cta-buttons-tab-normal',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );

        /* Secondary Button - Normal */
        $this->add_control(
            'cta-secondary-color',
            [
                'label' => esc_html__('Secondary - Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-right-secondary' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cta-secondary-bg-color',
            [
                'label' => esc_html__('Secondary - Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-right-secondary' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'secondary_border_normal',
                'selector' => '{{WRAPPER}} .btn-icon-right-secondary',
            ]
        );

        $this->add_control(
            'divider1',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        /* Primary Button - Normal */
        $this->add_control(
            'cta-primary-color',
            [
                'label' => esc_html__('Primary - Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn--primary' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cta-primary-bg-color',
            [
                'label' => esc_html__('Primary - Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn--primary' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'primary_border_normal',
                'selector' => '{{WRAPPER}} .footer__cta-btn--primary',
            ]
        );

        $this->end_controls_tab();

        /* ---------------- Hover Tab ---------------- */
        $this->start_controls_tab(
            'cta-buttons-tab-hover',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );

        /* Secondary Button - Hover */
        $this->add_control(
            'cta-secondary-hover-color',
            [
                'label' => esc_html__('Secondary - Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-right-secondary:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cta-secondary-bg-hover-color',
            [
                'label' => esc_html__('Secondary - Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon-right-secondary:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'secondary_border_hover',
                'selector' => '{{WRAPPER}} .btn-icon-right-secondary:hover',
            ]
        );

        $this->add_control(
            'divider2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        /* Primary Button - Hover */
        $this->add_control(
            'cta-primary-hover-color',
            [
                'label' => esc_html__('Primary - Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn--primary:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cta-primary-bg-hover-color',
            [
                'label' => esc_html__('Primary - Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn--primary:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'primary_border_hover',
                'selector' => '{{WRAPPER}} .footer__cta-btn--primary:hover',
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

        <div class="footer__cta-container container py-0">
            <div class="footer__cta p-6 p-sm-8 px-md-10 p-xl-15 p-xx-20">
                <?php if (!empty($settings['cta_title'])): ?>
                    <h2 class="footer__cta-title mb-6"><?php echo esc_html($settings['cta_title']); ?></h2>
                <?php endif; ?>

                <?php if (!empty($settings['cta_desc'])): ?>
                    <p class="footer__cta-desc mb-8"><?php echo esc_html($settings['cta_desc']); ?></p>
                <?php endif; ?>

                <div class="d-flex flex-wrap gap-4">
                    <a <?php echo xroof_get_link_attribute($settings['cta-button-link-1']); ?> class="footer__cta-btn btn-icon-right-secondary">Book An Appointment
                        <svg width="40" height="4" viewBox="0 0 10 7" fill="none">
                            <path
                                d="M9.07926 2.38846C9.15803 2.13084 9.01303 1.85814 8.75541 1.77938L4.55719 0.495857C4.29957 0.417094 4.02687 0.562088 3.94811 0.819712C3.86934 1.07734 4.01434 1.35003 4.27196 1.42879L8.00371 2.5697L6.8628 6.30145C6.78404 6.55908 6.92903 6.83177 7.18666 6.91054C7.44428 6.9893 7.71697 6.8443 7.79574 6.58668L9.07926 2.38846ZM8.61279 2.24585L8.38379 1.81516L0.362471 6.08018L0.591471 6.51086L0.820471 6.94155L8.84179 2.67654L8.61279 2.24585Z"
                                fill="black" />
                        </svg>
                    </a>

                    <a <?php echo xroof_get_link_attribute($settings['cta-button-link-2']); ?> class="footer__cta-btn footer__cta-btn--primary"> +1 281 590 272
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path
                                d="M13.5944 9.969L11.7298 8.10437C11.0639 7.43844 9.93176 7.70484 9.66539 8.57053C9.46561 9.1699 8.79967 9.50287 8.20033 9.36965C6.86846 9.03669 5.07043 7.30525 4.73746 5.90679C4.53768 5.30742 4.93724 4.64148 5.53659 4.44173C6.4023 4.17535 6.66868 3.04326 6.00274 2.37732L4.13812 0.512702C3.60537 0.0465471 2.80625 0.0465471 2.34009 0.512702L1.07481 1.77798C-0.190465 3.10985 1.208 6.63932 4.3379 9.76922C7.4678 12.8991 10.9973 14.3642 12.3291 13.0323L13.5944 11.767C14.0606 11.2343 14.0606 10.4352 13.5944 9.969Z"
                                fill="#EE212B" />
                        </svg>
                    </a>
                </div>

                <!-- Bg Image -->
                <div class="footer__cta-bg" data-bg-img="<?php echo esc_html($settings['cta_bg_img']['url']); ?>">
                </div>
            </div>
        </div>
        <?php
    }
}

$widgets_manager->register(new Xroof_CTA_Widget_1());
