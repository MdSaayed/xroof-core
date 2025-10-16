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

class Xroof_Project_Widget_1 extends \Elementor\Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof_project_widget_1';
    }

    public function get_title()
    {
        return esc_html__('Xroof Project 1', 'text-domain');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    public function get_categories()
    {
        return ['xroof-widget-cat'];
    }

    public function get_keywords()
    {
        return ['blog', 'posts', 'articles'];
    }

    protected function register_controls()
    {
        $this->register_content_controls();
        $this->register_style_controls();
    }

    // Register Controls Section
    protected function register_content_controls()
    {
        $this->start_controls_section(
            'header-content-section',
            [
                'label' => esc_html__('Header', 'text-domain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'project-header-switcher',
            [
                'label' => esc_html__('Show Header', 'xroof'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xroof'),
                'label_off' => esc_html__('Hide', 'xroof'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->register_subtitle_content_controls('projects__subtitle');
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'text-domain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Latest Project', 'text-domain'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'text-domain'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('We showcase our latest roofing projects, demonstrating high-quality workmanship, durable materials, and reliable results.'),
                'rows' => 4,
            ]
        );
        $this->register_button_content_controls('projects-btn', 'projects__btn');
        $this->end_controls_section();

        $this->start_controls_section(
            'project-filter-section',
            [
                'label' => esc_html__('Projects Filters', 'text-domain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'project-filter-switcher',
            [
                'label' => esc_html__('Show Filter', 'xroof'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xroof'),
                'label_off' => esc_html__('Hide', 'xroof'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'projects-item-section',
            [
                'label' => esc_html__('Projects', 'text-domain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Show Project Number', 'text-domain'),
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
                'options' => get_post_cat('project_category'),
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
    }

    // Register Style Section
    protected function register_style_controls()
    {
        // Header Style
        $this->start_controls_section(
            'header-style-section',
            [
                'label' => esc_html__('Header', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_subtitle_style_controls('projects-subtitle', 'projects__subtitle');
        $this->register_text_style_controls('projects-title', 'projects__title', 'Title');
        $this->register_text_style_controls('projects-desc', 'projects__desc', 'Description');
        $this->add_control(
            'project-btn-separator',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('Button', 'xroof')),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'project-btn-divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->register_button_style_controls('projects-btn', 'projects__btn');
        $this->end_controls_section();

        // Blog Card Style
        $this->start_controls_section(
            'projects-card-style-section',
            [
                'label' => esc_html__('Projects Card', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('projects_card_tabs');
        $this->start_controls_tab(
            'projects-card-normal',
            [
                'label' => esc_html__('Normal', 'text-domain'),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'project-card-background',
                'label' => esc_html__('Background', 'text-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .projects__card',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'blog_card_border',
                'label' => esc_html__('Border', 'text-domain'),
                'selector' => '{{WRAPPER}} .projects__card',
            ]
        );

        $this->add_control(
            'blog_card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .projects__card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blog_card_box_shadow',
                'label' => esc_html__('Box Shadow', 'text-domain'),
                'selector' => '{{WRAPPER}} .projects__card',
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
        $this->register_text_style_controls('project-card-title', 'projects__card-title', "Title");
        $this->add_responsive_control(
            'blog_card_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .projects__card-thumb-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'projects-filter-style-section',
            [
                'label' => esc_html__('Projects Filters', 'text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'filter-style_tabs'
        );
        $this->start_controls_tab(
            'filter-tab-normal',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'filter-text-color',
            [
                'label' => esc_html__('Filter Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__filter-item' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'filter-background-color',
            [
                'label' => esc_html__('Filter Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__filter-item' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'filter-tab-active',
            [
                'label' => esc_html__('Active', 'xroof'),
            ]
        );
        $this->add_control(
            'filter-text-color-active',
            [
                'label' => esc_html__('Filter Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__filter-item--active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'filter-background-color-active',
            [
                'label' => esc_html__('Filter Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__filter-item--active' => 'background-color: {{VALUE}}',
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

        $args = [
            'post_type' => 'project',
            'posts_per_page' => !empty($settings['posts_per_page']) ? intval($settings['posts_per_page']) : 3,
            'order' => $settings['post_order'],
            'orderby' => $settings['post_orderby'],
            'post__in' => $settings['include_post'],
            'post__not_in' => $settings['exclude_post'],
        ];

        if (!empty($settings['include_post_cat'])) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'project_category',
                    'field' => 'slug',
                    'terms' => (array) $settings['include_post_cat'],
                    'operator' => 'IN',
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

        <section class="projects projects--style-1">
            <div class="projects__container container">
                <?php if ($settings["project-header-switcher"] == 'yes'): ?>
                    <div
                        class="projects__header flex-wrap gap-4 gap-md-5 flex-items-center justify-content-between mb-15 mb-xxl-20">
                        <div class="projects__title-wrap">
                            <?php $this->render_subtitle('project-subtitle', 'projects__subtitle') ?>
                            <?php if (!empty($settings['title'])): ?>
                                <h2 class="projects__title title-xl">
                                    <?php echo esc_html($settings['title']); ?>
                                </h2>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($settings['description'])): ?>
                            <p class="projects__desc"><?php echo esc_html($settings['description']); ?></p>
                        <?php endif; ?>

                        <?php $this->render_button('projects-btn', 'projects__btn') ?>
                    </div>
                <?php endif; ?>

                <?php if ($settings["project-filter-switcher"] == 'yes'): ?>
                    <div class="projects__filter d-flex">
                        <button class="projects__filter-item projects__filter-item--active" data-filter="*">
                            <?php echo esc_html__('All', 'text-domain'); ?>
                        </button>
                        <?php if (!empty($settings['include_post_cat'])): ?>
                            <?php foreach ($settings['include_post_cat'] as $cat_slug):
                                $term = get_term_by('slug', $cat_slug, 'project_category');
                                if ($term && !is_wp_error($term)): ?>
                                    <button class="projects__filter-item" data-filter="<?php echo esc_attr($cat_slug); ?>">
                                        <?php echo esc_html($term->name); ?>
                                    </button>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div id="projects-grid" class="row g-4 mt-8">
                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post();
                            $categories = get_the_terms(get_the_ID(), 'project_category');
                            $category_slug = $categories ? xroof_get_cat_data($categories, ' ', 'slug') : '';
                            ?>
                            <div class="<?php echo esc_attr($col_class); ?>" data-category="<?php echo esc_html($category_slug); ?>">
                                <div class="projects__card">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="projects__card-thumb-wrap">
                                            <?php the_post_thumbnail(
                                                'large',
                                                array('class' => 'projects__card-thumb', 'alt' => esc_attr(get_the_title()))
                                            ); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (get_the_title()): ?>
                                        <div class="projects__card-title-wrap">
                                            <a href="<?php the_permalink(); ?>" class="projects__card-title-link">
                                                <h2 class="projects__card-title"><?php the_title(); ?></h2>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p><?php _e('No Posts To Display.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Project_Widget_1());
