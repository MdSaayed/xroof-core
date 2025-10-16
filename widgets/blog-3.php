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

class Xroof_Blog_Widget_3 extends \Elementor\Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof_blog_widget_3';
    }

    public function get_title()
    {
        return esc_html__('Xroof Blog 3', 'text-domain');
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return ['xroof-widget-cat'];
    }

    public function get_keywords()
    {
        return ['blog', 'posts', 'articles'];
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
        // Blog Post Query Section
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
                'options' => get_post_cat(),
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
                'options' => get_post_cat(),
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
                'options' => get_all_posts(),
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

        // Header Content Section
        $this->start_controls_section(
            'header_content_section',
            [
                'label' => esc_html__('Content', 'text-domain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'text-domain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Trends and Expert Advice You Can Trust', 'text-domain'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'text-domain'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Stay informed with our latest articles covering everything from roof maintenance tips to industry trends and expert insights. Whether you’re a homeowner, property manager.', 'text-domain'),
                'rows' => 4,
            ]
        );
        $this->end_controls_section();
    }

    // Style Controls
    protected function register_style_controls()
    {
        $this->start_controls_section(
            'header_style_section',
            [
                'label' => esc_html__('Content', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('blog_title', 'blog__title', 'Title');
        $this->register_text_style_controls('blog_desc', 'blog__desc', "Description");
        $this->add_section_heading('blog_link_arrow', 'Link Arrow');
        $this->start_controls_tabs(
            'blog_arrow_style_tabs'
        );
        $this->start_controls_tab(
            'blog_arrow_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'blog_link_arrow_color',
            [
                'label' => esc_html__('Arrow Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__link svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_link_arrow_bg_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__link' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_link_arrow_border_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__link' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'blog_arrow_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'blog_link_arrow_hover_color',
            [
                'label' => esc_html__('Arrow Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__link:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_link_arrow_bg_hover_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__link:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_link_arrow_border_hover_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__link:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_item_style_section',
            [
                'label' => esc_html__('Blog Item', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_section_heading('blog_image', 'Featured Image');
        $this->add_control(
            'blog_image_ratio',
            [
                'label' => __('Image Ratio', 'xroof'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'original',
                'options' => [
                    'original' => __('Original', 'xroof'),
                    '1 / 1' => __('1:1', 'xroof'),
                    '16 / 9' => __('16:9', 'xroof'),
                    '4 / 3' => __('4:3', 'xroof'),
                    '3 / 2' => __('3:2', 'xroof'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog__thumb-wrap' => 'aspect-ratio: {{VALUE}};',
                ],
            ]
        );
        $this->register_border_radius_control('blog_image_radius', 'blog__thumb-wrap');
        $this->register_text_style_controls('blog_title_style', 'blog__item-title', 'Blog Title');
        $this->register_text_style_controls('blog_excerpt_style', 'blog__excerpt', 'Blog excerpt');
        $this->add_responsive_control(
            'blog_card_padding',
            [
                'label' => esc_html__('Padding', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog__list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_meta_style_section',
            [
                'label' => esc_html__('Blog Meta', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('blog_date_style', 'blog__date', 'Blog Date');
        $this->register_text_style_controls('blog_month_year', 'blog__month-year', 'Blog Month/Year');
        $this->register_text_style_controls('blog_author_name', 'blog__author-name', 'Author');
        $this->register_text_style_controls('blog_author_company', 'blog__author-company', 'Company');
        $this->end_controls_section();

        $this->start_controls_section(
            'container_style_section',
            [
                'label' => esc_html__('Wrapper', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_background_controls('container_background', 'blog--style-3');
        $this->register_spacing_controls('container-spacing', 'blog__container');
        $this->end_controls_section();
    }

    // Render Output
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $args = [
            'post_type' => 'post',
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

        ?>

        <section class="blog blog--style-3">
            <div class="blog__container container">
                <?php if (!empty($settings['title'])): ?>
                    <h2 class="blog__title title-xl-white">
                        <?php echo esc_html($settings['title']); ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($settings['description'])): ?>
                    <p class="blog__desc mt-4">
                        <?php echo esc_html($settings['description']); ?>
                    </p>
                <?php endif; ?>

                <div class="blog__list mt-10 mt-xl-15 mt-xxl-20">
                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>
                            <article class="blog__list-item">
                                <div class="blog__left">
                                    <div class="blog__meta d-flex">
                                        <span class="blog__date title-xl-white m-0">
                                            <?php echo esc_html(get_the_time('d')); ?>
                                        </span>
                                        <span class="blog__month-year">
                                            <?php echo esc_html(get_the_time('F Y')); ?>
                                        </span>
                                    </div>
                                    <?php if (!empty(get_the_title())): ?>
                                        <h3 class="blog__item-title title-sm mb-0">
                                            <?php the_title(); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <div class="blog__author body-text">
                                        <?php if (!empty(get_the_author())): ?>
                                            <span class="blog__author-name">
                                                <?php
                                                printf(
                                                    esc_html__('By %s', 'xroof'),
                                                    esc_html(get_the_author())
                                                );
                                                ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if (!empty(get_bloginfo('name'))): ?>
                                            <span class="blog__author-company">
                                                <?php echo esc_html(get_bloginfo('name')); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="blog__middle">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="blog__thumb-wrap">
                                            <?php the_post_thumbnail('large', ['class' => 'blog__thumb', 'alt' => esc_attr(get_the_title())]); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="blog__right">
                                    <?php if (!empty(get_the_excerpt())): ?>
                                        <p class="blog__excerpt">
                                            <?php echo esc_html(wp_trim_words(get_the_excerpt(), 25, '...')); ?>
                                        </p>
                                    <?php endif; ?>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="blog__link">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none">
                                            <path
                                                d="M12.9814 1.36919C13.0133 1.00516 12.744 0.684227 12.3799 0.652378L6.44763 0.133369C6.08359 0.10152 5.76266 0.370811 5.73082 0.734846C5.69897 1.09888 5.96826 1.41981 6.33229 1.45166L11.6055 1.913L11.1441 7.18616C11.1123 7.5502 11.3816 7.87112 11.7456 7.90297C12.1096 7.93482 12.4306 7.66553 12.4624 7.3015L12.9814 1.36919ZM0.898238 10.0337C0.618305 10.2686 0.581792 10.6859 0.816683 10.9659C1.05157 11.2458 1.46892 11.2823 1.74886 11.0474L1.32355 10.5405L0.898238 10.0337ZM12.3223 1.31152L11.897 0.80466L0.898238 10.0337L1.32355 10.5405L1.74886 11.0474L12.7476 1.81839L12.3223 1.31152Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Blog_Widget_3());
