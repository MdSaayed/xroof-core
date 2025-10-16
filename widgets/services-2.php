<?php
use Xroof\Core\Traits\Xroof_Controls_Trait;
class Xroof_Services_Widget_2 extends \Elementor\Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-services-2';
    }

    public function get_title()
    {
        return esc_html__('Xroof Services 2', 'xroof');
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
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'services_subtitle',
            [
                'label' => esc_html__('Subtitle', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Services', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => xroof_kses('Comprehensive Roofing <span class="highlight">Solutions</span> Designed to Protect', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'services_stats_section',
            [
                'label' => esc_html__('Stats', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'services_stat_number',
            [
                'label' => esc_html__('Stat Number', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html('40', 'xroof'),
            ]
        );
        $this->add_control(
            'services_stat_text',
            [
                'label' => esc_html__('Stat Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html('YERS OF EXPERIENCE', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services_stat_suffix',
            [
                'label' => esc_html__('Stat SUffix', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('+', 'xroof'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'services_cards_section',
            [
                'label' => esc_html__('Services Cards', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $this->add_svg_control($repeater, 'services_card_icon', 'Services Icon', '/assets/svg/services-secondary-1.svg');
        $repeater->add_control(
            'services_card_date',
            [
                'label' => esc_html__('Services Card Date', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Enter your services date', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'services_card_title',
            [
                'label' => esc_html__('Services Card Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Enter your services title', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'services_card_text',
            [
                'label' => esc_html__('Services Card Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Enter your services text', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services_card_list',
            [
                'label' => esc_html__('Services Card List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'services_card_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/services-1.svg',
                        ],
                        'services_card_date' => esc_html__('l... August 2 , 2025', 'xroof'),
                        'services_card_title' => esc_html__('Roof Replacement', 'xroof'),
                        'services_card_text' => esc_html__('Our team provides expert assessment and high-quality materials to give your home or business.', 'xroof'),
                    ],
                    [
                        'services_card_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/services-2.svg',
                        ],
                        'services_card_date' => esc_html__('l... August 3 , 2025', 'xroof'),
                        'services_card_title' => esc_html__('Skylight Installation', 'xroof'),
                        'services_card_text' => esc_html__('Brighten your space naturally with our expert skylight installation services. looking to enhance', 'xroof'),
                    ],
                    [
                        'services_card_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/services-3.svg',
                        ],
                        'services_card_date' => esc_html__('l... August 4 , 2025', 'xroof'),
                        'services_card_title' => esc_html__('Roof Ventilation Solutions', 'xroof'),
                        'services_card_text' => esc_html__('Proper roof ventilation is essential for extending the life of your roof and maintaining.'),
                    ],
                    [
                        'services_card_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/services-4.svg',
                        ],
                        'services_card_date' => esc_html__('l... August 5 , 2025', 'xroof'),
                        'services_card_title' => esc_html__('Commercial Roofing', 'xroof'),
                        'services_card_text' => esc_html__('Our commercial roofing services are designed to meet the demands of businesses.'),
                    ],
                ],
                'title_field' => '{{{ services_card_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'services_2_style_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('services_subtitle', 'services__subtitle', 'Subtitle');
        $this->register_text_style_controls('services_title', 'services__title', 'Title');
        $this->register_text_style_controls('services_title_highlight', 'services__title span', 'Title Highlight');
        $this->end_controls_section();

        $this->start_controls_section(
            'services_2_stats_style_section',
            [
                'label' => esc_html__('Stats', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('stat_number', 'stat__number', 'Stats Number');
        $this->register_text_style_controls('stat_text', 'stat__text', 'Stats Text');
        $this->end_controls_section();

        $this->start_controls_section(
            'services_2_cards_style_section',
            [
                'label' => esc_html__('Services Cards', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('services_item_date', 'services__item-number', 'Services Date');
        $this->register_text_style_controls('services_item_title', 'services__item-title', 'Services Title');
        $this->register_text_style_controls('services_item_text', 'services__item-text', 'Services Text');
        $this->add_size_controls('card_icon_size', 'services__item-icon-wrap svg', ['px'], 100);
        $this->add_control(
            'services_item_icon_wrap',
            [
                'label' => esc_html__('Icon Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__item-icon-wrap' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'services_item_icon_color',
            [
                'label' => esc_html__('Icon Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__item-icon-wrap svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_section_heading('services_card_heading', 'Card');
        $this->add_control(
            'services_item',
            [
                'label' => esc_html__('Card Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__item' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'services_2_shape_background_style_section',
            [
                'label' => esc_html__('Shape & Background', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'service_background_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'services_bg_shape',
            [
                'label' => esc_html__('Background Shape Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/shape/services-2-bg.png',
                ],
            ]
        );
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <section class="services services--style-2">
            <div class="services__container container position-relative">
                <?php if (!empty($settings['services_subtitle'])): ?>
                    <p class="services__subtitle subtitle-white"><?php echo esc_html($settings['services_subtitle']); ?></p>
                <?php endif; ?>

                <div class="services__header flex-items-center flex-wrap justify-content-end">
                    <?php if (!empty($settings['services_title'])): ?>
                        <div class="services__header-left">
                            <h2 class="services__title title-xl-white"><?php echo xroof_kses($settings['services_title']); ?></h2>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['services_stat_number']) || !empty($settings['services_stat_text'])): ?>
                        <div class="services__header-right">
                            <div class="stat">
                                <span class="stat__number">
                                    <?php echo esc_html($settings['services_stat_number']);
                                    echo esc_html($settings['services_stat_suffix']); ?>
                                </span>
                                <?php if (!empty($settings['services_stat_text'])): ?>
                                    <span class="stat__text card-title"><?php echo esc_html($settings['services_stat_text']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="services__items row g-4 mt-10 mt-xl-15 mt-xxl-20">
                    <?php
                    $left_items = [];
                    $right_items = [];

                    foreach ($settings['services_card_list'] as $index => $item) {
                        if ($index % 2 === 0) {
                            $left_items[] = $item;
                        } else {
                            $right_items[] = $item;
                        }
                    }
                    ?>

                    <?php if (!empty($left_items)): ?>
                        <div class="col-12 col-sm-6">
                            <div class="row row-gap-4">
                                <?php foreach ($left_items as $item): ?>
                                    <div class="col-12 col-xl-6">
                                        <div class="services__item">
                                            <div class="services__item-top flex-items-center flex-wrap justify-content-between gap-3">
                                                <?php
                                                if (!empty($item['services_card_icon']['url'])): ?>
                                                    <div class="services__item-icon-wrap mb-0">
                                                        <?php echo $this->render_svg($item['services_card_icon']['url']); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($item['services_card_date'])): ?>
                                                    <span
                                                        class="services__item-number"><?php echo esc_html($item['services_card_date']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($item['services_card_title'])): ?>
                                                <h3 class="services__item-title card-title mt-8 mt-xl-10 mt-xxl-12">
                                                    <?php echo esc_html($item['services_card_title']); ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if (!empty($item['services_card_text'])): ?>
                                                <p class="services__item-text body-text mt-8 mt-xl-10 mt-xxl-12 mb-0">
                                                    <?php echo esc_html($item['services_card_text']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($right_items)): ?>
                        <div class="col-12 col-sm-6">
                            <div class="row row-gap-4 services__items-down">
                                <?php foreach ($right_items as $item): ?>
                                    <div class="col-12 col-xl-6">
                                        <div class="services__item">
                                            <div class="services__item-top flex-items-center flex-wrap justify-content-between gap-3">
                                                <div class="services__item-icon-wrap mb-0">
                                                    <?php
                                                    if (!empty($item['services_card_icon']['url'])) {
                                                        echo $this->render_svg($item["services_card_icon"]['url']);
                                                    }
                                                    ?>
                                                </div>
                                                <?php if (!empty($item['services_card_date'])): ?>
                                                    <span
                                                        class="services__item-number"><?php echo esc_html($item['services_card_date']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($item['services_card_title'])): ?>
                                                <h3 class="services__item-title card-title mt-8 mt-xl-10 mt-xxl-12">
                                                    <?php echo esc_html($item['services_card_title']); ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if (!empty($item['services_card_text'])): ?>
                                                <p class="services__item-text body-text mt-8 mt-xl-10 mt-xxl-12 mb-0">
                                                    <?php echo esc_html($item['services_card_text']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($settings['services_bg_shape']['url'])): ?>
                    <div class="services__bg-shape" data-bg-img="<?php echo esc_url($settings['services_bg_shape']['url']); ?>">
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Services_Widget_2());
