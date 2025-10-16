<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Icons_Manager;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH')) {
    exit;
}

class Xroof_Services_Widget_3 extends \Elementor\Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof_services_widget_3';
    }

    public function get_title()
    {
        return esc_html__('Xroof Services 3', 'text-domain');
    }

    public function get_icon()
    {
        return 'eicon-info-box';
    }

    public function get_categories()
    {
        return ['xroof-widget-cat'];
    }

    public function get_keywords()
    {
        return ['services', 'posts', 'articles'];
    }

    // Register Controls
    protected function register_controls()
    {
        $this->register_content_controls();
        $this->register_style_controls();
    }

    // Content Controls
    protected function register_content_controls()
    {
        $this->start_controls_section(
            'blog_post_section',
            [
                'label' => esc_html__('Blog Posts', 'text-domain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Show Post Number', 'text-domain'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 20,
            ]
        );
        $this->add_control(
            'include_post_cat',
            [
                'label' => esc_html__('Select Post Category', 'text-domain'),
                'type' => Controls_Manager::SELECT2,
                'default' => '',
                'options' => get_post_cat('service_category'),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'exclude_post_cat',
            [
                'label' => esc_html__('Select Exclude Category', 'text-domain'),
                'type' => Controls_Manager::SELECT2,
                'default' => '',
                'options' => get_post_cat('service_category'),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'include_post',
            [
                'label' => esc_html__('Post Include', 'text-domain'),
                'type' => Controls_Manager::SELECT2,
                'default' => '',
                'options' => get_all_posts(),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'exclude_post',
            [
                'label' => esc_html__('Post Exclude', 'text-domain'),
                'type' => Controls_Manager::SELECT2,
                'default' => '',
                'options' => get_all_posts('service'),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'post_order',
            [
                'label' => esc_html__('Post Order', 'text-domain'),
                'type' => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc' => esc_html__('Ascending', 'text-domain'),
                    'desc' => esc_html__('Descending', 'text-domain'),
                ],
            ]
        );
        $this->add_control(
            'post_orderby',
            [
                'label' => esc_html__('Order by', 'text-domain'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'ID' => 'Post ID',
                    'author' => 'Post Author',
                    'title' => 'Title',
                    'date' => 'Date',
                    'modified' => 'Last Modified Date',
                    'rand' => 'Random',
                    'comment_count' => 'Comment Count',
                    'menu_order' => 'Menu Order',
                ],
            ]
        );
        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'layout_section',
            [
                'label' => esc_html__('Layout', 'text-domain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'text-domain'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => esc_html__('1', 'text-domain'),
                    '2' => esc_html__('2', 'text-domain'),
                    '3' => esc_html__('3', 'text-domain'),
                    '4' => esc_html__('4', 'text-domain'),
                    '6' => esc_html__('6', 'text-domain'),
                ],
            ]
        );
        $this->end_controls_section();

        // Header Content Section
        $this->start_controls_section(
            'header_content_section',
            [
                'label' => esc_html__('Title and Description', 'text-domain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'text-domain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Complete Roofing Solutions Tailored to Your Needs', 'text-domain'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'text-domain'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('From minor repairs to full roof installations, we offer a complete range of roofing services designed to protect and enhance your property. Our skilled team uses top-quality materials', 'text-domain'),
                'rows' => 4,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'services_see_more_btn_section',
            [
                'label' => esc_html__('Button', 'text-domain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'services_btn_text',
            [
                'label' => esc_html__('Button Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('More All Services', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
            ]
        );
        $this->add_control(
            'services_btn_link',
            [
                'label' => esc_html__('Link', 'xroof'),
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

    // Style Controls
    protected function register_style_controls()
    {
        //     // Header Style
        $this->start_controls_section(
            'header_style_section',
            [
                'label' => esc_html__('Header', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('services_title', 'services__title', 'Title');
        $this->register_text_style_controls('services_desc', 'services__desc', 'Description');
        $this->end_controls_section();

        $this->start_controls_section(
            'services_card_style_section',
            [
                'label' => esc_html__('Services Card', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('services_card_tabs');

        $this->start_controls_tab(
            'services_card_normal',
            [
                'label' => esc_html__('Normal', 'text-domain'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'services_card_background',
                'label' => esc_html__('Background', 'text-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .services__item',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'services_card_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .services__item',
            ]
        );
        $this->add_control(
            'services_card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .services__item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'services_card_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .services__item',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'services_card_hover',
            [
                'label' => esc_html__('Hover', 'text-domain'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'services_card_hover_background',
                'label' => esc_html__('Background', 'text-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .services__item:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'services_card_hover_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .services__item:hover',
            ]
        );
        $this->add_control(
            'services_card_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .services__item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'services_card_hover_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .services__item:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_responsive_control(
            'services_card_padding',
            [
                'label' => esc_html__('Padding', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .services__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->register_text_style_controls('services_card_title', 'services__item-title', 'Card Title');
        $this->register_text_style_controls('services_card_text', 'services__item-text', 'Card Excerpt');
        $this->add_section_heading('services_card_arrow', 'Services Arrow');
        $this->start_controls_tabs(
            'services_card_arrow_style_tabs'
        );
        $this->start_controls_tab(
            'services_card_arrow__normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'arrow_bg_color',
            [
                'label' => esc_html__('Arrow Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__link' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'arrow_color',
            [
                'label' => esc_html__('Arrow Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__link svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'services_card_arrow__hover_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'arrow_bg_hover_color',
            [
                'label' => esc_html__('Arrow Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__link:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'arrow_hover_color',
            [
                'label' => esc_html__('Arrow Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__link:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->register_text_style_controls('services_card_btn', 'services__btn', 'Read More');
        $this->start_controls_tabs(
            'read_more_style_tabs'
        );
        $this->start_controls_tab(
            'read_more_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'read_more_bg_color',
            [
                'label' => esc_html__('Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'read_more_hover_style_normal_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'read_more_hover_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'read_more_hover_bg_color',
            [
                'label' => esc_html__('Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'see_all_btn_section',
            [
                'label' => esc_html__('Button', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('see_all_btn', 'services__btn-all', 'See All Button');
        $this->start_controls_tabs(
            'see_all_btn_style_tabs'
        );
        $this->start_controls_tab(
            'see_all_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'see_all_btn_bg_color',
            [
                'label' => esc_html__('Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn-all' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'see_all_btn_border_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn-all' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'see_all_btn_dot_color',
            [
                'label' => esc_html__('Dot Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn-decor' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'see_all_btn_hover_style_normal_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'see_all_btn_hover_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn-all:hover' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'see_all_btn_hover_bg_color',
            [
                'label' => esc_html__('Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn-all:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'see_all_btn_border_hover_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn-all:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'see_all_btn_dot_hover_color',
            [
                'label' => esc_html__('Dot Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__btn-all:hover .services__btn-decor' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    // Render Output
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $args = [
            'post_type' => 'service',
            'posts_per_page' => !empty($settings['posts_per_page']) ? intval($settings['posts_per_page']) : 3,
            'order' => $settings['post_order'],
            'orderby' => $settings['post_orderby'],
            'post__in' => $settings['include_post'],
            'post__not_in' => $settings['exclude_post'],
        ];

        if (!empty($settings['include_post_cat']) && !empty($settings['exclude_post_cat'])) {
            $args['tax_query'] = [
                'relation' => 'AND',
                [
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => (array) $settings['include_post_cat'],
                    'operator' => 'IN',
                ],
                [
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => (array) $settings['exclude_post_cat'],
                    'operator' => 'NOT IN',
                ],
            ];
        } elseif (!empty($settings['include_post_cat'])) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => (array) $settings['include_post_cat'],
                    'operator' => 'IN',
                ],
            ];
        } elseif (!empty($settings['exclude_post_cat'])) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => (array) $settings['exclude_post_cat'],
                    'operator' => 'NOT IN',
                ],
            ];
        }

        $the_query = new \WP_Query($args);

        $mobile_columns = !empty($settings['columns_mobile']) ? (int) $settings['columns_mobile'] : 1;
        $tablet_columns = !empty($settings['columns_tablet']) ? (int) $settings['columns_tablet'] : 2;
        $desktop_columns = !empty($settings['columns']) ? (int) $settings['columns'] : 3;

        $mobile_col_size = 12 / $mobile_columns;
        $tablet_col_size = 12 / $tablet_columns;
        $desktop_col_size = 12 / $desktop_columns;

        $col_class = "col-{$mobile_col_size} col-md-{$tablet_col_size} col-xl-{$desktop_col_size}";
        ?>

        <section class="services services--style-4">
            <div class="services__container container">
                <?php if (!empty($settings['title'])): ?>
                    <h2 class="services__title title-xl mb-4"><?php echo esc_html($settings['title']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($settings['description'])): ?>
                    <p class="services__desc"><?php echo esc_html($settings['description']); ?></p>
                <?php endif; ?>

                <div class="row g-4 mt-10 mt-xl-15 mt-xxl-20">
                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>
                            <div class="<?php echo esc_attr($col_class); ?>">
                                <div class="services__item">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="services__img-wrap mb-6">
                                            <?php the_post_thumbnail('large', ['class' => 'services__img', 'alt' => esc_attr(get_the_title())]); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="services__content">
                                        <div>
                                            <?php if (get_the_title()): ?>
                                                <h3 class="services__item-title mb-4"><?php echo esc_html(get_the_title()); ?></h3>
                                            <?php endif; ?>
                                            <?php if (has_excerpt()): ?>
                                                <p class="services__item-text body-text mb-0">
                                                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>

                                        <div class="services__btn-wrapper">
                                            <a href="<?php echo esc_url(get_permalink()); ?>" class="services__btn body-text mt-4">
                                                <?php echo esc_html__('Read More', 'text-domain'); ?>
                                            </a>
                                        </div>
                                    </div>

                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="services__link">
                                        <svg width="23" height="17" viewBox="0 0 23 17" fill="none">
                                            <path
                                                d="M0.898282 11.3739C0.701373 12.018 1.06386 12.6997 1.70792 12.8966L12.2035 16.1055C12.8475 16.3024 13.5293 15.9399 13.7262 15.2958C13.9231 14.6518 13.5606 13.97 12.9165 13.7731L3.58716 10.9208L6.43944 1.59146C6.63634 0.9474 6.27386 0.265662 5.6298 0.0687526C4.98574 -0.128155 4.304 0.234331 4.10709 0.87839L0.898282 11.3739ZM2.06445 11.7305L2.63695 12.8072L22.6903 2.14465L22.1178 1.06794L21.5453 -0.00877787L1.49195 10.6538L2.06445 11.7305Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>

                <?php if (!empty($settings['services_btn_text'])): ?>
                    <div class="services__btn-wrapper d-flex justify-content-center mt-8 mt-xl-12">
                        <a <?php echo xroof_get_link_attribute($settings['services_btn_link']) ?>
                            class="services__btn-all services__btn--view">
                            <span class="services__btn-decor"></span>
                            <?php echo esc_html($settings['services_btn_text']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Services_Widget_3());