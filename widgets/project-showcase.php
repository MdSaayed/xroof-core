<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Showcase_Widget extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-project-showcase';
    }

    public function get_title()
    {
        return esc_html__('Xroof Projects Showcase', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-posts-justified';
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
            'project_content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'project_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Craftsmanship Through Every Roof We Build', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'project_desc',
            [
                'label' => esc_html__('Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Our projects speak louder than words — each one a testament to our commitment to quality, precision, and customer satisfaction. From residential roof replacements to large-scale commercial installations.', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'project_btn_text',
            [
                'label' => esc_html__('Button Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Projects', 'xroof'),
                'placeholder' => esc_html__('Type your button here', 'xroof'),
            ]
        );
        $this->add_control(
            'project_btn_link',
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

        $this->start_controls_section(
            'projects_list_section',
            [
                'label' => esc_html__('Projects List', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'projects_gallery',
            [
                'label' => esc_html__('Add Images', 'xroof'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ]
        );
        $repeater->add_control(
            'projects_featured_image',
            [
                'label' => esc_html__('Featured Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '',
                ],
            ]
        );
        $repeater->add_control(
            'projects_featured_title',
            [
                'label' => esc_html__('Featured Project Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Featured Title', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'projects_featured_text',
            [
                'label' => esc_html__('Featured Project Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Featured Text', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'projects_list',
            [
                'label' => esc_html__('Projects List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'projects_gallery' => [
                            [
                                'id' => '',
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
                            [
                                'id' => '',
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
                        ],
                        'projects_featured_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'projects_featured_title' => esc_html__('Commercial Flat Roof Installation', 'xroof'),
                        'projects_featured_text' => esc_html__('A well-built flat roof is essential for protecting your commercial property and ensuring long-term performance.', 'xroof'),
                    ],
                    [
                        'projects_gallery' => [
                            [
                                'id' => '',
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
                            [
                                'id' => '',
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
                        ],
                        'projects_featured_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'projects_featured_title' => esc_html__('Commercial Flat Roof Installation', 'xroof'),
                        'projects_featured_text' => esc_html__('A well-built flat roof is essential for protecting your commercial property and ensuring long-term performance.', 'xroof'),
                    ],
                ],
                'title_field' => '{{{ projects_featured_title }}}',
            ]
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'projects_content_style_title',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('projects_title', 'projects__title', 'Title');
        $this->register_text_style_controls('projects_desc', 'projects__desc', 'Description');
        $this->register_text_style_controls('header_btn', 'projects__header-btn', 'Button');
        $this->start_controls_tabs(
            'btn_style_tabs'
        );
        $this->start_controls_tab(
            'btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__('Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__header-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_border_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__header-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_dot_color',
            [
                'label' => esc_html__('Dot Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__header-btn span' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_hover_style_normal_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__header-btn:hover' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color',
            [
                'label' => esc_html__('Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__header-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_border_hover_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__header-btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_dot_hover_color',
            [
                'label' => esc_html__('Dot Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__header-btn:hover span' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'projects_list_style',
            [
                'label' => __('Projects List', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('featured_title', 'projects__item-title', 'Featured Title');
        $this->register_text_style_controls('featured_text', 'projects__item-text', 'Featured Text');
        $this->add_control(
            'featured_content_bg_color',
            [
                'label' => esc_html__('Content Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .projects__content' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->register_border_radius_control('projects_content_radius', 'projects__content');
        $this->add_section_heading('projects_image_radius', 'Image');
        $this->register_border_radius_control('projects_image_radius', 'projects__item img');
        $this->end_controls_section();

        $this->start_controls_section(
            'projects_responsive_col',
            [
                'label' => __('Responsive', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'projects_col_class',
            [
                'label' => esc_html__('Column Width', 'xroof'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'col-12' => esc_html__('1 Column (Full width)', 'xroof'),
                    'col-sm-6' => esc_html__('2 Columns (Small devices)', 'xroof'),
                ],
                'default' => 'col-lg-6',
            ]
        );
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $col_class = !empty($settings['projects_col_class']) ? $settings['projects_col_class'] : 'col-lg-6';

        $projects_list = $settings['projects_list'];
        $left_item = [];
        $right_item = [];

        foreach ($projects_list as $index => $item) {
            if ($index % 2 === 0) {
                $left_item[] = $item;
            } else {
                $right_item[] = $item;
            }
        } ?>

        <section class="projects projects--style-3">
            <div class="projects__container container">
                <div class="projects__header d-flex justify-content-between flex-wrap gap-4">
                    <?php if (!empty($settings['project_title'])): ?>
                        <h2 class="projects__title title-xl-white">
                            <?php echo esc_html($settings['project_title']); ?>
                        </h2>
                    <?php endif; ?>
                    <div class="projects__header-content">
                        <?php if (!empty($settings['project_desc'])): ?>
                            <p class="projects__desc body-text"><?php echo esc_html($settings['project_desc']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($settings['project_btn_text'])): ?>
                            <a <?php echo xroof_get_link_attribute($settings['project_btn_link']['url']) ?>
                                class="projects__header-btn mt-4">
                                <span class="projects__btn-decor"></span>
                                <?php echo esc_html($settings['project_btn_text']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!empty($projects_list)): ?>
                    <div class="projects__masonry row g-3 g-lg-4 mt-10 mt-xl-15 mt-xxl-20">
                        <?php if (!empty($left_item)): ?>
                            <div class="<?php echo esc_attr($col_class); ?> d-flex flex-column projects-col">
                                <?php foreach ($left_item as $index => $item): ?>
                                    <div class="projects__row d-flex">
                                        <?php foreach ($item['projects_gallery'] as $key => $image): ?>
                                            <div class="projects__item flex-fill">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="Project 5">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="projects__item">
                                        <?php if (!empty($item['projects_featured_image']['url'])): ?>
                                            <img src="<?php echo esc_url($item['projects_featured_image']['url']); ?>" alt="Project 2">
                                        <?php endif; ?>

                                        <?php if (!empty($item['projects_featured_title'] || !empty($item['projects_featured_text']))): ?>
                                            <div class="projects__content">
                                                <?php if (!empty($item['projects_featured_title'])): ?>
                                                    <h5 class="projects__item-title mb-4">
                                                        <?php echo esc_html($item['projects_featured_title']); ?>
                                                    </h5>
                                                <?php endif; ?>
                                                <?php if (!empty($item['projects_featured_text'])): ?>
                                                    <p class="projects__item-text body-text mt-0">
                                                        <?php echo esc_html($item['projects_featured_text']); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($right_item)): ?>
                            <div class="<?php echo esc_attr($col_class); ?> d-flex flex-column projects-col">
                                <?php foreach ($right_item as $index => $item): ?>
                                    <div class="projects__item">
                                        <?php if (!empty($item['projects_featured_image']['url'])): ?>
                                            <img src="<?php echo esc_url($item['projects_featured_image']['url']); ?>" alt="Project 2">
                                        <?php endif; ?>

                                        <?php if (!empty($item['projects_featured_title'] || !empty($item['projects_featured_text']))): ?>
                                            <div class="projects__content">
                                                <?php if (!empty($item['projects_featured_title'])): ?>
                                                    <h5 class="projects__item-title mb-4">
                                                        <?php echo esc_html($item['projects_featured_title']); ?>
                                                    </h5>
                                                <?php endif; ?>
                                                <?php if (!empty($item['projects_featured_text'])): ?>
                                                    <p class="projects__item-text body-text mt-0">
                                                        <?php echo esc_html($item['projects_featured_text']); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="projects__row d-flex">
                                        <?php foreach ($item['projects_gallery'] as $key => $image): ?>
                                            <div class="projects__item flex-fill">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="Project 5">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Showcase_Widget());
