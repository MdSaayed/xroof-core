<?php
use Xroof\Core\Traits\Xroof_Controls_Trait;
class Xroof_Services_Widget_4 extends \Elementor\Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof_services-4';
    }

    public function get_title()
    {
        return esc_html__('Xroof Services 4', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-info-box';
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
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'show_header',
            [
                'label' => esc_html__('Show Header', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->register_subtitle_content_controls('services__top-subtitle');
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Roofing Services', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('We provide reliable roofing solutions designed to protect your home and business. From installation to repair, our team ensures lasting quality, durability, and trusted service you can depend on.', 'xroof'),
            ]
        );
        $this->register_button_content_controls('team_btn', 'team__btn', 'Button');
        $this->end_controls_section();

        // Services List Section
        $this->start_controls_section(
            'cards_section',
            [
                'label' => esc_html__('Services List', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater for Service Cards
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_icon',
            [
                'label' => esc_html__('Icon (SVG or Image)', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'png', 'jpg', 'jpeg'],
                'default' => [
                    'url' => '',
                ],
                'description' => esc_html__('Upload an SVG or image for the card icon. Leave empty to use the default SVG.', 'xroof'),
            ]
        );

        $repeater->add_control(
            'card_title',
            [
                'label' => esc_html__('Card Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'xroof'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'card_description',
            [
                'label' => esc_html__('Card Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Service description goes here.', 'xroof'),
            ]
        );

        $repeater->add_control(
            'card_button_text',
            [
                'label' => esc_html__('Button Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'xroof'),
            ]
        );

        $repeater->add_control(
            'card_button_link',
            [
                'label' => esc_html__('Button Link', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'show_external' => true,
            ]
        );

        $repeater->add_control(
            'card_button_icon',
            [
                'label' => esc_html__('Button Icon (SVG or Image)', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'png', 'jpg', 'jpeg'],
                'default' => [
                    'url' => '',
                ],
                'description' => esc_html__('Upload an SVG or image for the button icon. Leave empty to use the default SVG.', 'xroof'),
            ]
        );

        $this->add_control(
            'services_cards',
            [
                'label' => esc_html__('Services List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_title' => esc_html__('Quality Workmanship', 'xroof'),
                        'card_description' => esc_html__('We deliver careful and precise roofing work using durable materials that ensure long-lasting protection and strength.', 'xroof'),
                        'card_button_text' => esc_html__('Read More', 'xroof'),
                        'card_button_link' => ['url' => '#'],
                    ],
                    [
                        'card_title' => esc_html__('Roof Replacement', 'xroof'),
                        'card_description' => esc_html__('Our team replaces old or damaged roofs efficiently, providing reliable protection and a better look.', 'xroof'),
                        'card_button_text' => esc_html__('Read More', 'xroof'),
                        'card_button_link' => ['url' => '#'],
                    ],
                    [
                        'card_title' => esc_html__('Emergency Roof Repair', 'xroof'),
                        'card_description' => esc_html__('We respond quickly to urgent roof damage, fixing leaks and problems fast to protect your property from further issues.', 'xroof'),
                        'card_button_text' => esc_html__('Read More', 'xroof'),
                        'card_button_link' => ['url' => '#'],
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ]
        );

        $this->add_control(
            'mobile_columns',
            [
                'label' => esc_html__('Columns on Mobile', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ]
        );

        $this->add_control(
            'tablet_columns',
            [
                'label' => esc_html__('Columns on Tablet', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ]
        );

        $this->add_control(
            'desktop_columns',
            [
                'label' => esc_html__('Columns on Desktop', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ]
        );

        $this->add_control(
            'large_desktop_columns',
            [
                'label' => esc_html__('Columns on Large Desktop', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ]
        );

        $this->end_controls_section();

    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'services-top-section',
            [
                'label' => esc_html__('Top Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_subtitle_style_controls('services-top-subtitle', 'services__top-subtitle');
        $this->register_text_style_controls('services-title', 'services__top-title', 'Title');
        $this->register_text_style_controls('services-desc', 'services__top-desc', 'Description');
        $this->register_button_style_controls('team_btn', 'team__btn');
        $this->add_universal_input_control('services-top-divider', 'Services Top Background', 'divider');
        $this->end_controls_section();


        // Card Style Section
        $this->start_controls_section(
            'services-card-section',
            [
                'label' => esc_html__('Card', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('services-card-title', 'services__card-title', 'Card Title');
        $this->register_text_style_controls('services-card-text', 'services__card-text', 'Card Description');

        $this->register_text_style_controls('card-button', 'services__card-btn', 'Card Button');
        $this->start_controls_tabs('card_button_tabs');
        $this->start_controls_tab(
            'card_button_normal',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'card_button_bg_color',
            [
                'label' => esc_html__('Card Button Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_button_icon_fill_color',
            [
                'label' => esc_html__('Button Icon Fill Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card-btn svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->register_border_radius_control('services-card-btn', 'services__card-btn');
        $this->end_controls_tab();
        $this->start_controls_tab(
            'card_button_hover',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'card_button_hover_color',
            [
                'label' => esc_html__('Card Button Hover Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_button_hover_bg_color',
            [
                'label' => esc_html__('Card Button Hover Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_button_icon_hover_fill_color',
            [
                'label' => esc_html__('Button Icon Hover Fill Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card-btn:hover svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Icon Style Section
        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => esc_html__('Icon Style', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('icon_tabs');

        $this->start_controls_tab(
            'icon_normal',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html__('Icon Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card-icon-wrap' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'icon_fill_color',
            [
                'label' => esc_html__('Icon Fill Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card-icon-wrap svg path' => 'fill: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'icon_border_color',
            [
                'label' => esc_html__('Icon Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card-icon-wrap' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__('Icon Width', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 28,
                ],
                'selectors' => [
                    '{{WRAPPER}} .services__card-icon-wrap svg, {{WRAPPER}} .services__card-icon-wrap img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_height',
            [
                'label' => esc_html__('Icon Height', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 26,
                ],
                'selectors' => [
                    '{{WRAPPER}} .services__card-icon-wrap svg, {{WRAPPER}} .services__card-icon-wrap img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'xroof'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .services__card-icon-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_hover',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );

        $this->add_control(
            'icon_hover_bg_color',
            [
                'label' => esc_html__('Icon Hover Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card:hover .services__card-icon-wrap' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_fill_color',
            [
                'label' => esc_html__('Icon Hover Fill Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card:hover .services__card-icon-wrap svg path' => 'fill: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_border_color',
            [
                'label' => esc_html__('Icon Hover Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__card:hover .services__card-icon-wrap' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_hover_width',
            [
                'label' => esc_html__('Icon Hover Width', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .services__card:hover .services__card-icon-wrap svg, {{WRAPPER}} .services__card:hover .services__card-icon-wrap img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_hover_height',
            [
                'label' => esc_html__('Icon Hover Height', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .services__card:hover .services__card-icon-wrap svg, {{WRAPPER}} .services__card:hover .services__card-icon-wrap img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_hover_padding',
            [
                'label' => esc_html__('Icon Hover Padding', 'xroof'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .services__card:hover .services__card-icon-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Button Icon Style Section
        $this->start_controls_section(
            'button_icon_style_section',
            [
                'label' => esc_html__('Button Icon Style', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_icon_width',
            [
                'label' => esc_html__('Button Icon Width', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 11,
                ],
                'selectors' => [
                    '{{WRAPPER}} .services__card-btn svg, {{WRAPPER}} .services__card-btn img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_icon_height',
            [
                'label' => esc_html__('Button Icon Height', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 8,
                ],
                'selectors' => [
                    '{{WRAPPER}} .services__card-btn svg, {{WRAPPER}} .services__card-btn img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $mobile_col = 12 / max(1, (int) $settings['mobile_columns']);
        $tablet_col = 12 / max(1, (int) $settings['tablet_columns']);
        $desktop_col = 12 / max(1, (int) $settings['desktop_columns']);
        $large_col = 12 / max(1, (int) $settings['large_desktop_columns']);

        $col_class = "col col-{$mobile_col} col-sm-{$tablet_col} col-xl-{$desktop_col} col-xxl-{$large_col}";
        $show_header = $settings["show_header"] == 'yes';

        ?>
        <section class="services services--style-1">
            <?php if ($show_header): ?>
                <div class="services__container container pb-0 mb-10 mb-xl-15 mb-xxl-20">
                    <div class="services__header flex-wrap gap-4 gap-md-5 flex-items-center justify-content-between">
                        <div class="team__title-wrap">
                            <?php $this->render_subtitle('services-top-subtitle', 'services__top-subtitle'); ?>

                            <?php if (!empty($settings['title'])): ?>
                                <h2 class="services__top-title title-xl"
                                    style="opacity: 1; transform: translateX(0px) translateY(0px) scale(1); transition: opacity 0.7s ease-out, transform 0.7s ease-out;">
                                    <?php echo esc_html($settings['title']); ?>
                                </h2>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($settings['description'])): ?>
                            <p class="service__desc body-text mw-510"
                                style="opacity: 1; transform: translateX(0px) translateY(0px) scale(1); transition: opacity 0.7s ease-out, transform 0.7s ease-out;">
                                <?php echo esc_html($settings['description']); ?>
                            </p>
                        <?php endif; ?>

                        <?php echo $this->render_button('team_btn', 'team__btn') ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($settings['services_cards'])): ?>
                <div class="services__bottom mt-0">
                    <div class="service__bottom-container container <?php echo esc_attr($show_header ? 'pt-0' : ''); ?>">
                        <div class="row g-4 overflow-hidden pb-2">
                            <?php foreach ($settings['services_cards'] as $card): ?>
                                <?php if (!empty($card['card_title']) || !empty($card['card_description']) || !empty($card['card_button_text'])): ?>
                                    <div class="<?php echo esc_attr($col_class); ?>">
                                        <div class="services__card">
                                            <?php if (!empty($card['card_icon']['url']) || true): ?>
                                                <div class="services__card-icon-wrap">
                                                    <?php
                                                    if (!empty($card['card_icon']['url'])) {
                                                        $icon_url = $card['card_icon']['url'];
                                                        if (pathinfo($icon_url, PATHINFO_EXTENSION) === 'svg') {
                                                            $svg_content = wp_remote_get($icon_url);
                                                            if (!is_wp_error($svg_content) && !empty($svg_content['body'])) {
                                                                echo wp_kses($svg_content['body'], ['svg' => ['width' => [], 'height' => [], 'viewBox' => [], 'fill' => [], 'xmlns' => []], 'path' => ['d' => [], 'fill' => []], 'g' => ['clip-path' => []], 'defs' => [], 'clipPath' => [], 'rect' => ['width' => [], 'height' => [], 'fill' => [], 'transform' => []]]);
                                                            }
                                                        } else {
                                                            echo '<img src="' . esc_url($icon_url) . '" alt="' . esc_attr($card['card_title']) . '" style="width: inherit; height: inherit;">';
                                                        }
                                                    } else {
                                                        // Default SVG
                                                        echo '<svg width="28" height="26" viewBox="0 0 28 26" fill="none"><g clip-path="url(#clip0_99_689)"><path d="M27.7721 9.98306L26.672 8.88299C26.3682 8.57917 25.8758 8.57917 25.572 8.88299L25.0222 9.43278L23.6173 8.02792C23.891 6.99202 23.6348 5.84528 22.8225 5.03299L20.6229 2.83334C17.5856 -0.203886 12.6608 -0.203886 9.62314 2.83334L14.0229 5.03299V5.94445C14.0229 6.76938 14.3506 7.56077 14.9344 8.1441L17.3231 10.5329C18.1354 11.3451 19.2822 11.6013 20.3181 11.3276L21.7229 12.7325L21.1731 13.2823C20.8693 13.5861 20.8693 14.0785 21.1731 14.3824L22.2732 15.4824C22.577 15.7863 23.0695 15.7863 23.3733 15.4824L27.7731 11.0826C28.0759 10.7793 28.0759 10.2869 27.7721 9.98306ZM13.8343 9.24417C13.6545 9.06431 13.5018 8.86549 13.3555 8.66327L0.954805 20.241C-0.288181 21.4018 -0.321723 23.3613 0.88043 24.564C2.08258 25.7666 4.04258 25.7331 5.20342 24.4896L16.7792 12.0903C16.5867 11.9489 16.3952 11.805 16.2231 11.6329L13.8343 9.24417Z" fill="white"/></g><defs><clipPath><rect width="28" height="24.8889" fill="white" transform="translate(0 0.55542)"/></clipPath></defs></svg>';
                                                    }
                                                    ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($card['card_title'])): ?>
                                                <h2 class="services__card-title"><?php echo esc_html($card['card_title']); ?></h2>
                                            <?php endif; ?>

                                            <?php if (!empty($card['card_description'])): ?>
                                                <p class="services__card-text"><?php echo esc_html($card['card_description']); ?></p>
                                            <?php endif; ?>

                                            <?php if (!empty($card['card_button_text']) && !empty($card['card_button_link']['url'])): ?>
                                                <a href="<?php echo esc_url($card['card_button_link']['url']); ?>" class="services__card-btn">
                                                    <?php echo esc_html($card['card_button_text']); ?>
                                                    <?php
                                                    if (!empty($card['card_button_icon']['url'])) {
                                                        $button_icon_url = $card['card_button_icon']['url'];
                                                        if (pathinfo($button_icon_url, PATHINFO_EXTENSION) === 'svg') {
                                                            $svg_content = wp_remote_get($button_icon_url);
                                                            if (!is_wp_error($svg_content) && !empty($svg_content['body'])) {
                                                                echo wp_kses($svg_content['body'], ['svg' => ['width' => [], 'height' => [], 'viewBox' => [], 'fill' => [], 'xmlns' => []], 'path' => ['d' => [], 'fill' => []]]);
                                                            }
                                                        } else {
                                                            echo '<img src="' . esc_url($button_icon_url) . '" alt="' . esc_attr($card['card_button_text']) . '" style="width: inherit; height: inherit;">';
                                                        }
                                                    } else {
                                                        echo '<svg width="11" height="8" viewBox="0 0 11 8" fill="none"><path d="M9.88727 3.65509C10.0778 3.84558 10.0778 4.15442 9.88727 4.34491L6.78304 7.44914C6.59255 7.63963 6.28371 7.63963 6.09322 7.44914C5.90273 7.25865 5.90273 6.9498 6.09322 6.75931L8.85253 4L6.09322 1.24069C5.90273 1.0502 5.90273 0.741349 6.09322 0.550858C6.28371 0.360367 6.59255 0.360367 6.78304 0.550858L9.88727 3.65509ZM9.54236 4V4.48778L0.45765 4.48778V4V3.51222L9.54236 3.51222V4Z" fill="#EE212B"/></svg>';
                                                    }
                                                    ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
        <?php
    }
}

$widgets_manager->register(new Xroof_Services_Widget_4());
