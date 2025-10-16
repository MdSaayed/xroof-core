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

class Xroof_Blog_Widget_2 extends \Elementor\Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof_blog_widget_2';
    }

    public function get_title()
    {
        return esc_html__('Xroof Blog 2', 'text-domain');
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
                'default' => esc_html__('Stay informed with our latest articles covering everything from roof maintenance tips to industry trends and expert insights. Whether you’re a homeowner, property manager.'),
                'rows' => 4,
            ]
        );
        $this->add_control(
            'blog_btn_text',
            [
                'label' => esc_html__('Button Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('All Blog Browse', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
            ]
        );
        $this->add_control(
            'blog_btn_link',
            [
                'label' => esc_html__('Button Link', 'xroof'),
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
        //     // Container Style
        $this->start_controls_section(
            'container_style_section',
            [
                'label' => esc_html__('Container', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_background_controls('container_background', 'blog__container');
        $this->register_spacing_controls('container-spacing', 'blog__container');
        $this->end_controls_section();
        //     // Header Style
        $this->start_controls_section(
            'header_style_section',
            [
                'label' => esc_html__('Content', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('blog-title', 'blog__title', 'Title');
        $this->register_text_style_controls('blog-desc', 'blog__desc', "Description");
        $this->add_section_heading('blog_button', 'Button');
        $this->register_text_style_controls('blog_button_tex', 'blog__btn', 'Button');
        $this->start_controls_tabs(
            'button_tabs'
        );
        $this->start_controls_tab(
            'button_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .blog__btn',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'button_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'btn_bg_color_hover',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_text_color_hover',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .blog__btn',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //     // Blog Card Style
        $this->start_controls_section(
            'blog_card_style_section',
            [
                'label' => esc_html__('Blog Card', 'text-domain'),
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
                    '{{WRAPPER}} .blog__img-wrap' => 'aspect-ratio: {{VALUE}};',
                ],
            ]
        );
        $this->register_border_radius_control('blog_image_radius', 'blog__img-wrap');
        $this->register_text_style_controls('blog_title_style', 'blog__card-title', 'Blog Title');
        $this->register_text_style_controls('blog_excerpt_style', 'blog__excerpt', 'Blog excerpt');
        $this->start_controls_tabs('blog_card_tabs');
        $this->start_controls_tab(
            'blog_card_normal',
            [
                'label' => esc_html__('Normal', 'text-domain'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_card_background',
                'label' => esc_html__('Background', 'text-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog__card',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'blog_card_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog__card',
            ]
        );
        $this->add_control(
            'blog_card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog__card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_card_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog__card',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'blog_card_hover',
            [
                'label' => esc_html__('Hover', 'text-domain'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_card_hover_background',
                'label' => esc_html__('Background', 'text-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog__card:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'blog_card_hover_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog__card:hover',
            ]
        );
        $this->add_control(
            'blog_card_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog__card:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_card_hover_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog__card:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
            'blog_card_padding',
            [
                'label' => esc_html__('Padding', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog__card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
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

        $mobile_columns = !empty($settings['columns_mobile']) ? (int) $settings['columns_mobile'] : 1;
        $tablet_columns = !empty($settings['columns_tablet']) ? (int) $settings['columns_tablet'] : 2;
        $desktop_columns = !empty($settings['columns']) ? (int) $settings['columns'] : 3;

        $mobile_col_size = 12 / $mobile_columns;
        $tablet_col_size = 12 / $tablet_columns;
        $desktop_col_size = 12 / $desktop_columns;

        $col_class = "col-{$mobile_col_size} col-md-{$tablet_col_size} col-xl-{$desktop_col_size}";


        ?>

        <section id="blog-2" class="blog blog--style-2">
            <div class="blog__container container">
                <?php if (!empty($settings["title"])): ?>
                    <h2 class="blog__title title-xl-white"><?php echo esc_html($settings['title']); ?></h2>
                <?php endif ?>
                <?php if (!empty($settings["description"])): ?>
                    <p class="blog__desc body-text mt-4">
                        <?php echo esc_html($settings['description']); ?>
                    </p>
                <?php endif ?>

                <?php if (!empty($settings["blog_btn_text"])): ?>
                    <div class="blog__btn-wrap d-flex justify-content-center mt-8">
                        <a <?php echo xroof_get_link_attribute($settings['blog_btn_link']); ?> class="blog__btn body-text">
                            <?php echo esc_html($settings['blog_btn_text']); ?>
                        </a>
                    </div>
                <?php endif ?>

                <div class="row g-4 mt-10 mt-xl-15 mt-xxl-20">
                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>
                            <div class="<?php echo esc_attr($col_class); ?>">
                                <div class="blog__card">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="blog__img-wrap">
                                            <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                                <?php the_post_thumbnail('large', ['class' => 'blog__img', 'alt' => esc_attr(get_the_title())]); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <div class="blog__meta  meta mt-4 mt-md-6 mt-xl-8">
                                        <span class="meta__date"><?php echo get_the_date('j F'); ?></span>
                                        <span class="meta__reading-time"><?php echo xroof_reading_time(get_the_ID(), 200); ?></span>
                                    </div>

                                    <?php if (!empty(get_the_title())): ?>
                                        <h3 class="blog__card-title"><?php echo esc_html(get_the_title()); ?></h3>
                                    <?php endif; ?>

                                    <?php if (!empty(get_the_excerpt())): ?>
                                        <p class="blog__excerpt mt-4 mt-xl-6">
                                            <?php echo esc_html(wp_trim_words(get_the_excerpt(), 15, '...')); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Blog_Widget_2());
