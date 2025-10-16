<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Xroof\Core\Traits\Xroof_Controls_Trait;

if (!defined('ABSPATH'))
    exit;

class Xroof_Project_Slider_Widget extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-project-slider';
    }

    public function get_title()
    {
        return esc_html__('Xroof Project Slider', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-slides';
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

    // 🔹 Content Section
    protected function register_controls_section()
    {
        $this->start_controls_section(
            'project_header_content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'project_subtitle',
            [
                'label' => esc_html__('Subtitle', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('..lv Our Project', 'xroof'),
                'placeholder' => __('Enter your subtitle', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'project_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Crafting Roofing Success Stories — One Project at a Time ', 'xroof'),
                'placeholder' => __('Enter your title', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'project_desc',
            [
                'label' => esc_html__('Description', 'xroof'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Take a look at some of our proudest roofing projects, where quality  craftsmanship meets real-world results. From residential homes to commercial buildings, our portfolio showcases our dedication to excellence.', 'xroof'),
                'placeholder' => __('Enter your description', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'project_slider_content_section',
            [
                'label' => esc_html__('Sliders', 'xroof'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'project_card_image',
            [
                'label' => esc_html__('Project Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'project_card_subtitle',
            [
                'label' => esc_html__('Project Subtitle', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Enter your project subtitle', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'project_card_title',
            [
                'label' => esc_html__('Project Title', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Enter your project title', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'project_card_link',
            [
                'label' => esc_html__('Project Link', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_svg_control($repeater, 'project_icon', 'Project Thumbnail', '/assets/svg/arrow.svg');
        $this->add_control(
            'project_list',
            [
                'label' => esc_html__('Project List', 'xroof'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'project_card_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/project/project-img-1.jpg',
                        ],
                        'project_card_subtitle' => __('Residential Roofing', 'xroof'),
                        'project_card_title' => __('Heritage Heights Roof Replacement', 'xroof'),
                    ],
                    [
                        'project_card_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/project/project-img-2.jpg',
                        ],
                        'project_card_subtitle' => __('Commercial Roofing', 'xroof'),
                        'project_card_title' => __('Downtown Office Roof Installation', 'xroof'),
                    ],
                    [
                        'project_card_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/project/project-img-3.jpg',
                        ],
                        'project_card_subtitle' => __('Residential Roofing', 'xroof'),
                        'project_card_title' => __('Lakeview House Roof Renovation', 'xroof'),
                    ],
                    [
                        'project_card_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/project/project-img-1.jpg',
                        ],
                        'project_card_subtitle' => __('Industrial Roofing', 'xroof'),
                        'project_card_title' => __('Factory Roof Upgrade', 'xroof'),
                    ],
                ],
                'title_field' => '{{{ project_card_title }}}',
            ]
        );
        $this->end_controls_section();
    }

    // 🔹 Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'project_content_style_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('project_subtitle', 'projects__subtitle', 'Subtitle');
        $this->register_text_style_controls('project_title', 'projects__title', 'Title');
        $this->register_text_style_controls('project_desc', 'projects__desc', 'Description');
        $this->end_controls_section();

        $this->start_controls_section(
            'project_sliders_style_section',
            [
                'label' => esc_html__('Sliders', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('slider_subtitle', 'slider__subtitle', 'Subtitle');
        $this->register_text_style_controls('slider_title', 'slider__title', 'Title');
        $this->add_section_heading('project_icon', 'Project Link Icon');
        $this->add_control(
            'project_icon_bg_color',
            [
                'label' => esc_html__('Icon Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider__arrow' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'project_icon_color',
            [
                'label' => esc_html__('Icon Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider__arrow svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_section_heading('slider__content', 'Project Content Wrapper');
        $this->add_control(
            'project_content_bg_color',
            [
                'label' => esc_html__('Content Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider__content' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->register_spacing_controls('content_spacing', 'slider__content');
        $this->register_border_radius_control('content_border_radius', 'slider__content');
        $this->end_controls_section();


        $this->start_controls_section(
            'project_sliders_navigation_style_section',
            [
                'label' => esc_html__('Sliders Navigation', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('navigation_text', 'slider__nav-btn span', 'Navigation Text');
        $this->add_control(
            'navigation_btn_icon',
            [
                'label' => esc_html__('Icon Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider__nav-btn svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'navigation_btn_bg',
            [
                'label' => esc_html__('Icon Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider__nav-btn svg' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_section_heading('navigation_wrapper_style', 'Navigation Wrapper');
        $this->register_spacing_controls('navigation_spacing', 'slider__nav');
        $this->register_border_radius_control('navigation_border_radius', 'slider__nav');
        $this->add_control(
            'slider_navigation_bg_color',
            [
                'label' => esc_html__('Navigation Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider__nav' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'project_background_section',
            [
                'label' => esc_html__('Background', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_background_controls('project_section_bg', 'projects', 'Background', [
            'image' => [
                'id' => 0,
                'url' => get_template_directory_uri() . '/assets/img/project/project-bg-2.jpg',
            ]
        ]);
        $this->end_controls_section();
    }

    // 🔹 Render Section
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <section class="projects projects--style-2">
            <div class="projects__container container">
                <?php if (!empty($settings['project_subtitle'])): ?>
                    <p class="projects__subtitle subtitle-white"><?php echo esc_html($settings['project_subtitle']); ?></p>
                <?php endif; ?>

                <div class="projects__header">
                    <?php if (!empty($settings['project_title'])): ?>
                        <h2 class="projects__title title-xl-white"><?php echo esc_html($settings['project_title']); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['project_desc'])): ?>
                        <p class="projects__desc bodey-text mt-4 mb-0"><?php echo esc_html($settings['project_desc']); ?></p>
                    <?php endif; ?>
                </div>

                <div class="projects__slider-wrap mt-10 mt-xl-15 mt-xxl-20">
                    <div id="project-slider-1" class="projects__slider">
                        <?php foreach ($settings['project_list'] as $item): ?>
                            <div class="projects__slide" data-bg-img="<?php echo esc_url($item['project_card_image']['url']); ?>">
                                <div class="slider__content">
                                    <?php if ($item['project_card_subtitle']): ?>
                                        <span
                                            class="slider__subtitle mb-2 mb-lg-3"><?php echo esc_html($item['project_card_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if ($item['project_card_title']): ?>
                                        <h3 class="slider__title mb-0"><?php echo esc_html($item['project_card_title']); ?></h3>
                                    <?php endif; ?>
                                </div>

                                <?php if ($item['project_card_link']): ?>
                                    <a <?php echo xroof_get_link_attribute($item['project_card_link']); ?> class="slider__arrow">
                                        <?php echo $this->render_svg($item['project_icon']['url']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="slider__nav mt-10 mt-xl-15 mt-xxl-20">
                        <div class="slider__nav-btn">
                            <svg id="prevButton" width="12" height="8" viewBox="0 0 12 8" fill="none">
                                <path
                                    d="M0.208915 3.97463C0.206245 4.009 0.20799 4.04358 0.214109 4.0775L0.214908 4.0801C0.223714 4.12131 0.239092 4.16083 0.260452 4.19716C0.277588 4.22828 0.298818 4.25697 0.323574 4.28245L3.91916 7.87803C3.95601 7.91619 4.00009 7.94663 4.04884 7.96757C4.09758 7.9885 4.15 7.99952 4.20305 7.99998C4.25609 8.00045 4.3087 7.99034 4.3578 7.97025C4.4069 7.95016 4.45151 7.9205 4.48902 7.88299C4.52653 7.84548 4.55619 7.80087 4.57628 7.75177C4.59637 7.70267 4.60647 7.65007 4.60601 7.59702C4.60555 7.54397 4.59453 7.49155 4.57359 7.44281C4.55266 7.39407 4.52222 7.34998 4.48406 7.31313L1.57044 4.39951L11.3928 4.39951C11.4987 4.39951 11.6004 4.35742 11.6753 4.28249C11.7502 4.20757 11.7923 4.10596 11.7923 4C11.7923 3.89404 11.7502 3.79243 11.6753 3.7175C11.6004 3.64258 11.4987 3.60049 11.3928 3.60049L1.57044 3.60049L4.48406 0.686869C4.52222 0.650016 4.55266 0.605932 4.57359 0.55719C4.59453 0.508449 4.60555 0.456026 4.60601 0.402979C4.60647 0.349933 4.59637 0.297325 4.57628 0.248227C4.55619 0.199129 4.52653 0.154522 4.48902 0.117012C4.45151 0.0795007 4.4069 0.0498362 4.3578 0.0297484C4.3087 0.00966072 4.25609 -0.000447273 4.20305 1.33514e-05C4.15 0.000474453 4.09758 0.0114942 4.04884 0.0324321C4.00009 0.05337 3.95601 0.0838056 3.91916 0.121963L0.323574 3.71755C0.317582 3.72354 0.313387 3.73033 0.307993 3.73672C0.302002 3.74356 0.296272 3.75062 0.290815 3.7579C0.269616 3.78468 0.251959 3.81409 0.238279 3.84539C0.23788 3.84619 0.23728 3.84659 0.23708 3.84739L0.236881 3.84799C0.220689 3.88838 0.211241 3.93117 0.208915 3.97463Z"
                                    fill="black" />
                            </svg>
                            <span class="nav__btn-text">Prev</span>
                        </div>

                        <div class="slider__nav-btn slider__nav-btn--green">
                            <span class="nav__btn-text">Next</span>
                            <svg id="nextButton" width="12" height="8" viewBox="0 0 12 8" fill="none">
                                <path
                                    d="M11.7911 4.02537C11.7938 3.991 11.792 3.95642 11.7859 3.9225L11.7851 3.9199C11.7763 3.87869 11.7609 3.83917 11.7395 3.80284C11.7224 3.77172 11.7012 3.74303 11.6764 3.71755L8.08084 0.121966C8.04399 0.0838085 7.99991 0.0533728 7.95116 0.0324349C7.90242 0.011497 7.85 0.000476044 7.79695 1.50838e-05C7.74391 -0.000445876 7.6913 0.00966268 7.6422 0.0297504C7.5931 0.049838 7.54849 0.0795028 7.51098 0.117014C7.47347 0.154525 7.44381 0.199131 7.42372 0.248229C7.40363 0.297327 7.39353 0.349934 7.39399 0.402981C7.39445 0.456027 7.40547 0.508451 7.42641 0.557193C7.44734 0.605934 7.47778 0.650018 7.51594 0.686872L10.4296 3.60049L0.607222 3.60049C0.501265 3.60049 0.399648 3.64258 0.324725 3.71751C0.249803 3.79243 0.207712 3.89404 0.207712 4C0.207712 4.10596 0.249803 4.20757 0.324725 4.2825C0.399648 4.35742 0.501265 4.39951 0.607222 4.39951L10.4296 4.39951L7.51594 7.31313C7.47778 7.34998 7.44734 7.39407 7.42641 7.44281C7.40547 7.49155 7.39445 7.54397 7.39399 7.59702C7.39353 7.65007 7.40363 7.70267 7.42372 7.75177C7.44381 7.80087 7.47347 7.84548 7.51098 7.88299C7.54849 7.9205 7.5931 7.95016 7.6422 7.97025C7.6913 7.99034 7.74391 8.00045 7.79695 7.99999C7.85 7.99953 7.90242 7.98851 7.95116 7.96757C7.99991 7.94663 8.04399 7.91619 8.08084 7.87804L11.6764 4.28245C11.6824 4.27646 11.6866 4.26967 11.692 4.26328C11.698 4.25644 11.7037 4.24938 11.7092 4.2421C11.7304 4.21532 11.748 4.18591 11.7617 4.15461C11.7621 4.15381 11.7627 4.15341 11.7629 4.15261L11.7631 4.15201C11.7793 4.11162 11.7888 4.06883 11.7911 4.02537Z"
                                    fill="white" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Project_Slider_Widget());
