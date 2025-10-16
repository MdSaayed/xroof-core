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

class Xroof_Blog_Widget_1 extends \Elementor\Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof_blog_widget_1';
    }

    public function get_title()
    {
        return esc_html__('Xroof Blog 1', 'text-domain');
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
        $this->register_subtitle_content_controls('blog__subtitle');
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'text-domain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Latest Blog Posts', 'text-domain'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'text-domain'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Stay updated with our latest insights, tips, and trends to help you improve, inspire, and succeed daily.', 'text-domain'),
                'rows' => 4,
            ]
        );
        $this->register_button_content_controls('blog_btn', 'blog__btn');
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
                'label' => esc_html__('Header', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->register_subtitle_style_controls('blog-subtitle', 'blog__subtitle');
        $this->register_text_style_controls('blog-title', 'blog__title');
        $this->register_text_style_controls('blog-desc', 'blog__desc');

        $this->add_control(
            'button_section',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('Button', 'xroof')),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'button_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->register_button_style_controls('blog_btn', 'blog__btn');
        $this->end_controls_section();

        //     // Blog Card Style
        $this->start_controls_section(
            'blog_card_style_section',
            [
                'label' => esc_html__('Blog Card', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

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
                'selector' => '{{WRAPPER}} .blog-card',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'blog_card_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card',
            ]
        );

        $this->add_control(
            'blog_card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_card_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card',
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
                'selector' => '{{WRAPPER}} .blog-card:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'blog_card_hover_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card:hover',
            ]
        );

        $this->add_control(
            'blog_card_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-card:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_card_hover_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card:hover',
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
                    '{{WRAPPER}} .blog-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_card_title_typography',
                'label' => esc_html__('Title Typography', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__title',
            ]
        );

        $this->add_control(
            'blog_card_title_color',
            [
                'label' => esc_html__('Title Color', 'text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_card_text_typography',
                'label' => esc_html__('Text Typography', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__text',
            ]
        );

        $this->add_control(
            'blog_card_text_color',
            [
                'label' => esc_html__('Text Color', 'text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card__text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //     // Blog Card Button Style
        $this->start_controls_section(
            'blog_card_button_style_section',
            [
                'label' => esc_html__('Blog Card Button', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('blog_card_button_tabs');

        $this->start_controls_tab(
            'blog_card_button_normal',
            [
                'label' => esc_html__('Normal', 'text-domain'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_card_button_typography',
                'label' => esc_html__('Typography', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__btn',
            ]
        );

        $this->add_control(
            'blog_card_button_color',
            [
                'label' => esc_html__('Text Color', 'text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card__btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_card_button_background',
                'label' => esc_html__('Background', 'text-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog-card__btn',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'blog_card_button_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__btn',
            ]
        );

        $this->add_control(
            'blog_card_button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-card__btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_card_button_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__btn',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'blog_card_button_hover',
            [
                'label' => esc_html__('Hover', 'text-domain'),
            ]
        );

        $this->add_control(
            'blog_card_button_hover_color',
            [
                'label' => esc_html__('Text Color', 'text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card__btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_card_button_hover_background',
                'label' => esc_html__('Background', 'text-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog-card__btn:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'blog_card_button_hover_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__btn:hover',
            ]
        );

        $this->add_control(
            'blog_card_button_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-card__btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_card_button_hover_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__btn:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // Blog Card Image Style
        $this->start_controls_section(
            'blog_card_image_style_section',
            [
                'label' => esc_html__('Blog Card Image', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'blog_card_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-card__image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_card_image_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__image',
            ]
        );

        $this->end_controls_section();

        // Badge Style
        $this->start_controls_section(
            'badge_style_section',
            [
                'label' => esc_html__('Badge', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'badge_background',
                'label' => esc_html__('Background', 'text-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog-card__badge',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'badge_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__badge',
            ]
        );

        $this->add_control(
            'badge_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-card__badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__badge',
            ]
        );

        $this->add_responsive_control(
            'badge_width',
            [
                'label' => esc_html__('Width', 'text-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-card__badge' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_height',
            [
                'label' => esc_html__('Height', 'text-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-card__badge' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_padding',
            [
                'label' => esc_html__('Padding', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .blog-card__badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'label' => esc_html__('Typography', 'text-domain'),
                'selector' => '{{WRAPPER}} .blog-card__badge span',
            ]
        );

        $this->add_control(
            'badge_text_color',
            [
                'label' => esc_html__('Text Color', 'text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card__badge span' => 'color: {{VALUE}};',
                ],
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
        $show_header = $settings["show_header"] == 'yes';
        ?>

        <section class="blog blog--style-1">
            <div class="blog__container container">
                <?php if ($show_header): ?>
                    <div class="blog__header flex-wrap gap-4 gap-md-5 flex-items-center justify-content-between">
                        <div class="blog__title-wrap">
                            <?php $this->render_subtitle(); ?>
                            <?php if (!empty($settings['title'])): ?>
                                <h2 class="blog__title title-xl mb-0"><?php echo esc_html($settings['title']); ?></h2>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($settings['description'])): ?>
                            <p class="blog__desc mb-0"><?php echo esc_html($settings['description']); ?></p>
                        <?php endif; ?>
                        <?php $this->render_button('blog_btn', 'blog__btn'); ?>
                    </div>
                <?php endif; ?>

                <div
                    class="row g-4 <?php echo esc_attr($show_header ? 'mt-10 mt-xl-15 mt-xxl-18' : ''); ?> overflow-hidden pb-2">
                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>
                            <div class="<?php echo esc_attr($col_class); ?>">
                                <div class="blog-card d-flex flex-column h-100">
                                    <div class="blog-card__header">
                                        <?php if (has_post_thumbnail()): ?>
                                            <div class="blog-card__image-wrap">
                                                <?php the_post_thumbnail('large', ['class' => 'blog-card__image', 'alt' => esc_attr(get_the_title())]); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="blog-card__badge">
                                            <span class="blog-card__date"><?php echo esc_html(get_the_date('d')); ?></span>
                                            <span class="blog-card__month"><?php echo esc_html(get_the_date('M')); ?></span>
                                        </div>
                                    </div>
                                    <div class="blog-card__body">
                                        <?php if (get_the_title()): ?>
                                            <h5 class="blog-card__title mb-2"><?php echo esc_html(get_the_title()); ?></h5>
                                        <?php endif; ?>
                                        <?php if (has_excerpt()): ?>
                                            <p class="blog-card__text"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?>
                                            </p>
                                        <?php endif; ?>
                                        <a href="<?php echo esc_url(get_permalink()); ?>"
                                            class="blog-card__btn btn-primary"><?php echo esc_html__('Learn More', 'text-domain'); ?></a>
                                    </div>
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

$widgets_manager->register(new Xroof_Blog_Widget_1());