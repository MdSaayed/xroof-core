<?php
use Elementor\Controls_Manager;
use Xroof\Core\Traits\Xroof_Controls_Trait;

if (!defined('ABSPATH')) {
    exit;
}

class Xroof_Pricing_Widget_1 extends \Elementor\Widget_Base
{
    use Xroof_Controls_Trait;
    public function get_name()
    {
        return 'pricing_widget';
    }

    public function get_title()
    {
        return esc_html__('Xroof Pricing Widget', 'text-domain');
    }

    public function get_icon()
    {
        return 'eicon-price-table';
    }

    public function get_categories()
    {
        return ['xroof-widget-cat'];
    }

    public function get_keywords()
    {
        return ['pricing', 'plans', 'cards'];
    }

    protected function register_controls()
    {
        $this->register_content_controls();
        $this->register_style_controls();
    }

    // Register Content Controls
    protected function register_content_controls()
    {
        $this->start_controls_section(
            'pricing-header-section',
            [
                'label' => esc_html__('Header', 'text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->register_subtitle_content_controls('pricing__subtitle');
        $this->add_universal_input_control('header_title', 'Title', 'text', [
            'default' => 'Flexible Pricing Plans',
            'placeholder' => 'Enter your title',
            'description' => 'This will appear at the top of the pricing section'
        ]);
        $this->add_universal_input_control('header_description', 'Description', 'textarea', [
            'default' => 'Choose from our flexible pricing plans designed to fit every budget while delivering top-quality roofing services efficiently.',
            'placeholder' => 'Enter your description',
            'description' => 'This will appear at the top of the pricing section'
        ]);

        $this->end_controls_section();

        // Pricing Cards Section
        $this->start_controls_section(
            'section_cards',
            [
                'label' => esc_html__('Pricing Cards', 'text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_title',
            [
                'label' => esc_html__('Card Title', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Roof Installation', 'text-domain'),
                'placeholder' => esc_html__('Enter card title', 'text-domain'),
            ]
        );

        $repeater->add_control(
            'card_price',
            [
                'label' => esc_html__('Price', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$1250', 'text-domain'),
                'placeholder' => esc_html__('Enter price', 'text-domain'),
            ]
        );

        $repeater->add_control(
            'card_unit',
            [
                'label' => esc_html__('Unit', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('/ Month', 'text-domain'),
                'placeholder' => esc_html__('Enter unit', 'text-domain'),
            ]
        );

        $repeater->add_control(
            'card_button_text',
            [
                'label' => esc_html__('Button Text', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Select Package', 'text-domain'),
                'placeholder' => esc_html__('Enter button text', 'text-domain'),
            ]
        );

        $repeater->add_control(
            'card_button_link',
            [
                'label' => esc_html__('Button Link', 'text-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '/',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'text-domain'),
            ]
        );

        $repeater->add_control(
            'card_subtitle',
            [
                'label' => esc_html__('Card Subtitle', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Full roof installation for new builds or replacements.', 'text-domain'),
                'placeholder' => esc_html__('Enter card subtitle', 'text-domain'),
            ]
        );
        $repeater->add_control(
            'card_icon_svg',
            [
                'label' => esc_html__('Card Icon', 'text-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/svg/pricing-card-icon.svg',
                ],
            ]
        );

        $feature_repeater = new \Elementor\Repeater();
        $feature_repeater->add_control(
            'feature_text',
            [
                'label' => esc_html__('Feature Text', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Feature', 'text-domain'),
                'placeholder' => esc_html__('Enter feature text', 'text-domain'),
            ]
        );

        $repeater->add_control(
            'card_features',
            [
                'label' => esc_html__('Features', 'text-domain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $feature_repeater->get_controls(),
                'default' => [
                    ['feature_text' => esc_html__('Roof installation or replacement', 'text-domain')],
                    ['feature_text' => esc_html__('Choice of premium shingles', 'text-domain')],
                    ['feature_text' => esc_html__('Waterproof insulation', 'text-domain')],
                    ['feature_text' => esc_html__('Cleanup & disposal', 'text-domain')],
                    ['feature_text' => esc_html__('10-year workmanship warranty', 'text-domain')],
                ],
                'title_field' => '{{{ feature_text }}}',
            ]
        );

        $this->add_control(
            'pricing_cards',
            [
                'label' => esc_html__('Pricing Cards', 'text-domain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_title' => esc_html__('Roof Installation', 'text-domain'),
                        'card_price' => esc_html__('$1250', 'text-domain'),
                        'card_unit' => esc_html__('/ Month', 'text-domain'),
                        'card_button_text' => esc_html__('Select Package', 'text-domain'),
                        'card_button_link' => ['url' => '/', 'is_external' => false, 'nofollow' => false],
                        'card_subtitle' => esc_html__('Full roof installation for new builds or replacements.', 'text-domain'),
                        'card_features' => [
                            ['feature_text' => esc_html__('Roof installation or replacement', 'text-domain')],
                            ['feature_text' => esc_html__('Choice of premium shingles', 'text-domain')],
                            ['feature_text' => esc_html__('Waterproof insulation', 'text-domain')],
                            ['feature_text' => esc_html__('Cleanup & disposal', 'text-domain')],
                            ['feature_text' => esc_html__('10-year workmanship warranty', 'text-domain')],
                        ],
                    ],
                    [
                        'card_title' => esc_html__('Roof Repair', 'text-domain'),
                        'card_price' => esc_html__('$450', 'text-domain'),
                        'card_unit' => esc_html__('/ Month', 'text-domain'),
                        'card_button_text' => esc_html__('Select Package', 'text-domain'),
                        'card_button_link' => ['url' => '/', 'is_external' => false, 'nofollow' => false],
                        'card_subtitle' => esc_html__('Comprehensive roof repair and inspection.', 'text-domain'),
                        'card_features' => [
                            ['feature_text' => esc_html__('Roof inspection (up to 1,500 SF)', 'text-domain')],
                            ['feature_text' => esc_html__('Shingle & flashing repair', 'text-domain')],
                            ['feature_text' => esc_html__('Mold/algae treatment', 'text-domain')],
                            ['feature_text' => esc_html__('Drone photos + detailed report', 'text-domain')],
                            ['feature_text' => esc_html__('3-year repair warranty', 'text-domain')],
                        ],
                    ],
                    [
                        'card_title' => esc_html__('Maintenance Plan', 'text-domain'),
                        'card_price' => esc_html__('$240', 'text-domain'),
                        'card_unit' => esc_html__('/ Month', 'text-domain'),
                        'card_button_text' => esc_html__('Select Package', 'text-domain'),
                        'card_button_link' => ['url' => '/', 'is_external' => false, 'nofollow' => false],
                        'card_subtitle' => esc_html__('Regular maintenance to extend roof life.', 'text-domain'),
                        'card_features' => [
                            ['feature_text' => esc_html__('Annual inspections', 'text-domain')],
                            ['feature_text' => esc_html__('Gutter & debris cleaning', 'text-domain')],
                            ['feature_text' => esc_html__('Minor preventative repairs', 'text-domain')],
                            ['feature_text' => esc_html__('Mold/algae treatment', 'text-domain')],
                        ],
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ]
        );

        $this->add_control(
            'faq_columns',
            [
                'label' => esc_html__('Columns', 'text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => esc_html__('1 Column', 'text-domain'),
                    '2' => esc_html__('2 Columns', 'text-domain'),
                    '3' => esc_html__('3 Columns', 'text-domain'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Register Style Controls
    protected function register_style_controls()
    {
        $this->start_controls_section(
            'pricing_style_section',
            [
                'label' => esc_html__('Header', 'text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_subtitle_style_controls('pricing-subtitle', 'pricing__subtitle');
        $this->register_text_style_controls('pricing-title', 'pricing__title', 'Title');
        $this->register_text_style_controls('pricing-desc', 'pricing__desc', 'Description');
        $this->end_controls_section();

        $this->start_controls_section(
            'style_cards',
            [
                'label' => esc_html__('Pricing Cards', 'text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'card_background_color',
            [
                'label' => esc_html__('Card Background Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card-icon-hover-color',
            [
                'label' => esc_html__('Hover Background', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'label' => esc_html__('Card Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .pricing__card',
            ]
        );
        $this->add_control(
            'pricing-card-header-section',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('Card Header', 'xroof')),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'pricing-card-header-divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_control(
            'card-header-color',
            [
                'label' => esc_html__('Header Background', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-header' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card-header-hover-color',
            [
                'label' => esc_html__('Header Hover Background', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->register_text_style_controls('card_title', 'pricing__card_title', 'Card Title');
        $this->add_control(
            'card_title_hover',
            [
                'label' => esc_html__('Hover Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card:hover .pricing__card_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->register_text_style_controls('card_price', 'pricing__price', 'Card Price');
        $this->add_control(
            'card_price_hover',
            [
                'label' => esc_html__('Hover Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .  .pricing__price' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->register_text_style_controls('pricing-unit', 'pricing__unit', 'Unit');
        $this->add_control(
            'card_unit_hover',
            [
                'label' => esc_html__('Hover Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card:hover .pricing__unit' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_button_background_color',
            [
                'label' => esc_html__('Button Background Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->register_text_style_controls('pricing-btn', 'pricing__btn', 'Button');
        $this->register_text_style_controls('card_subtitle', 'pricing__card-subtitle', 'Card Subtitle');
        $this->add_control(
            'card_subtitle_hover',
            [
                'label' => esc_html__('Hover Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card:hover .pricing__card-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->register_text_style_controls('pricing-features', 'pricing__features li', 'Features');
        $this->add_control(
            'pricing-card-icon-section',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('Card Icon', 'xroof')),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'pricing-card-icon-divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_control(
            'card-icon-color',
            [
                'label' => esc_html__('Card Icon Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card-icon-hover-color',
            [
                'label' => esc_html__('Hover Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card:hover .pricing__icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    // Render
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $column_class = !empty($settings['faq_columns']) && $settings['faq_columns'] === '1' ? 'col-12' : ($settings['faq_columns'] === '2' ? 'col-md-6' : 'col-md-6 col-xl-4');
        ?>
        <section class="pricing pricing--style-1">
            <div class="pricing__container container">
                <?php $this->render_subtitle('pricing-subtitle', 'pricing__subtitle'); ?>

                <?php if (!empty($settings['header_title'])): ?>
                    <h2 class="pricing__title title-xl"><?php echo esc_html($settings['header_title']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($settings['header_description'])): ?>
                    <p class="pricing__desc body-text pb-20"><?php echo esc_html($settings['header_description']); ?></p>
                <?php endif; ?>

                <?php if (!empty($settings['pricing_cards'])): ?>
                    <div class="row g-4 justify-content-center">
                        <?php foreach ($settings['pricing_cards'] as $card): ?>
                            <div class="<?php echo esc_attr($column_class); ?>">
                                <div class="pricing__card pricing__card--light text-center h-100 d-flex flex-column">
                                    <div class="pricing__card-header">
                                        <?php if (!empty($card['card_icon_svg']['url'])):
                                            $icon_url = $card['card_icon_svg']['url'];
                                            if (pathinfo($icon_url, PATHINFO_EXTENSION) === 'svg') {
                                                $svg_content = wp_remote_get($icon_url);
                                                if (!is_wp_error($svg_content) && !empty($svg_content['body'])) {
                                                    echo '<div class="pricing__icon mb-4 svg-icon">' . $svg_content['body'] . '</div>';
                                                }
                                            } else {
                                                echo '<div class="pricing__icon mb-4"><img src="' . esc_url($icon_url) . '" alt="Card Icon"></div>';
                                            }
                                        endif; ?>

                                        <?php if (!empty($card['card_title'])): ?>
                                            <h4 class="pricing__card_title"><?php echo esc_html($card['card_title']); ?></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($card['card_price']) || !empty($card['card_unit'])): ?>
                                            <p class="pricing__price mb-0">
                                                <?php echo esc_html($card['card_price']); ?>
                                                <?php if (!empty($card['card_unit'])): ?>
                                                    <span class="pricing__unit"><?php echo esc_html($card['card_unit']); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty($card['card_button_text']) && !empty($card['card_button_link']['url'])): ?>
                                            <?php
                                            $button_link = $card['card_button_link']['url'];
                                            $is_external = $card['card_button_link']['is_external'] ? ' target="_blank"' : '';
                                            $nofollow = $card['card_button_link']['nofollow'] ? ' rel="nofollow"' : '';
                                            ?>
                                            <a href="<?php echo esc_url($button_link); ?>" class="pricing__btn btn-primary mt-12" <?php echo $is_external . $nofollow; ?>><?php echo esc_html($card['card_button_text']); ?></a>
                                        <?php endif; ?>
                                        <?php if (!empty($card['card_subtitle'])): ?>
                                            <p class="pricing__card-subtitle mt-4"><?php echo esc_html($card['card_subtitle']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($card['card_features'])): ?>
                                        <ul class="pricing__features list--check text-start mx-auto mt-3">
                                            <?php foreach ($card['card_features'] as $feature): ?>
                                                <?php if (!empty($feature['feature_text'])): ?>
                                                    <li class="pricing__item"><?php echo esc_html($feature['feature_text']); ?></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new Xroof_Pricing_Widget_1());