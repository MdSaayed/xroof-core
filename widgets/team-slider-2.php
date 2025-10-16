<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Team_Slider_Widget_2 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-team-slider-2';
    }

    public function get_title()
    {
        return esc_html__('Xroof Team Slider 2', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
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
            'team_content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'team_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Meet the Skilled Roofing Experts', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'team_desc',
            [
                'label' => esc_html__('Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our team is made up of experienced, certified roofing professionals who take pride in delivering exceptional results.', 'xroof'),
                'placeholder' => esc_html__('Type your description here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_slider_section',
            [
                'label' => esc_html__('Slider Items', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'team_img',
            [
                'label' => esc_html__('Member Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Image size should be 235 × 310px', 'xroof'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'team_name',
            [
                'label' => esc_html__('Name', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Member Name', 'xroof'),
                'placeholder' => esc_html__('Enter name', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'team_role',
            [
                'label' => esc_html__('Member Role', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Member Role', 'xroof'),
                'placeholder' => esc_html__('Enter role', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'x_link',
            [
                'label' => esc_html__('X(twitter)', 'xroof'),
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
        $repeater->add_control(
            'facebook_link',
            [
                'label' => esc_html__('Facebook', 'xroof'),
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
        $repeater->add_control(
            'behance_link',
            [
                'label' => esc_html__('Behance', 'xroof'),
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
        $repeater->add_control(
            'instagram_link',
            [
                'label' => esc_html__('Instagram', 'xroof'),
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
        $this->add_control(
            'team_member_list',
            [
                'label' => esc_html__('Member List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'team_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/team/team-member-11.png',
                        ],
                        'team_name' => esc_html__('Michael Lopez', 'xroof'),
                        'team_role' => esc_html__('Maintenance Technician', 'xroof'),
                    ],
                    [
                        'team_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/team/team-member-12.png',
                        ],
                        'team_name' => esc_html__('Sophia Turner', 'xroof'),
                        'team_role' => esc_html__('Project Manager', 'xroof'),
                    ],
                    [
                        'team_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/team/team-member-13.png',
                        ],
                        'team_name' => esc_html__('David Kim', 'xroof'),
                        'team_role' => esc_html__('Lead Developer', 'xroof'),
                    ],
                    [
                        'team_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/team/team-member-14.png',
                        ],
                        'team_name' => esc_html__('Olivia Brown', 'xroof'),
                        'team_role' => esc_html__('UI/UX Designer', 'xroof'),
                    ],
                    [
                        'team_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/team/team-member-15.png',
                        ],
                        'team_name' => esc_html__('James Carter', 'xroof'),
                        'team_role' => esc_html__('Marketing Specialist', 'xroof'),
                    ],
                ],
                'title_field' => '{{{ team_name }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_slider_navigation_section',
            [
                'label' => esc_html__('Navigation', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_svg_control(
            $this,
            'nav_icon_left',
            'Prev',
            '/assets/svg/team-slider-nav-1.svg'
        );
        $this->add_svg_control(
            $this,
            'nav_icon_right',
            'Next',
            '/assets/svg/team-slider-nav-2.svg'
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'team_slider_style_title',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('team_title', 'team__title', 'Title');
        $this->register_text_style_controls('team_desc', 'team__desc', 'Description');
        $this->end_controls_section();

        $this->start_controls_section(
            'team_slider_style_section',
            [
                'label' => __('Slider', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('team_name', 'team-slider__title', 'Name');
        $this->register_text_style_controls('team_role', 'team-slider__role', 'Name');
        $this->add_section_heading('content_wrapper', 'Slider Item');
        $this->add_control(
            'content_wrapper_bg',
            [
                'label' => esc_html__('Card Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-slider__item' => 'Background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'content_wrapper_bg_hover',
            [
                'label' => esc_html__('Card Hover Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-slider__item:hover' => 'Background: {{VALUE}}',
                ],
            ]
        );
        $this->register_spacing_controls('team_slider_item_spacing', 'team-slider__item');
        $this->register_border_radius_control('team_slider_item_border', 'team-slider__item');
        $this->end_controls_section();

        $this->start_controls_section(
            'team_slider_navigation',
            [
                'label' => __('Navigation', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_nav_tabs'
        );
        $this->start_controls_tab(
            'slider_nav_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'slider_btn_icon',
            [
                'label' => esc_html__('Icon Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__slider-btn svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'slider_btn',
            [
                'label' => esc_html__('Navigation', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__slider-btn' => 'Background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'slider_nav_hover_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'slider_btn_icon_hover',
            [
                'label' => esc_html__('Icon Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__slider-btn:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'slider_btn_hover',
            [
                'label' => esc_html__('Navigation', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__slider-btn:hover' => 'Background: {{VALUE}}',
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

        ?>

        <section class="team team--style-3">
            <div class="team__container container">
                <div class="team__header d-flex justify-content-between align-items-end flex-wrap gap-4">
                    <div class="team__header-left">
                        <?php if (!empty($settings['team_title'])): ?>
                            <h2 class="team__title title-xl">
                                <?php echo esc_html($settings['team_title']) ?>
                            </h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['team_desc'])): ?>
                            <p class="team__desc body-text mt-4 mb-0">
                                <?php echo esc_html($settings['team_desc']) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="team__header-right d-flex flex-wrap gap-4 mt-4">
                        <div id="team-slider-3-prev" class="team__slider-btn team__slider-btn--prev">
                            <?php if (!empty($settings['nav_icon_left']['url'])): ?>
                                <?php echo $this->render_svg($settings['nav_icon_left']['url']); ?>
                            <?php endif; ?>
                        </div>

                        <div id="team-slider-3-next" class="team__slider-btn team__slider-btn--next">
                            <?php if (!empty($settings['nav_icon_right']['url'])): ?>
                                <?php echo $this->render_svg($settings['nav_icon_right']['url']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div id="team-slider-3" class="team-slider team-slider--3 mt-10 mt-xl-15 mt-xxl-20">
                    <div class="team-slider__wrapper d-flex">
                        <?php foreach ($settings['team_member_list'] as $key => $item): ?>
                            <div class="team-slider__slide">
                                <div class="team-slider__item">
                                    <div class="team-slider__image-wrap">
                                        <img src="<?php echo esc_url($item['team_img']['url']) ?>"
                                            alt="<?php echo esc_html($item['team_name']); ?>" class="team-slider__image">
                                    </div>
                                    <div class="team-slider__info">
                                        <?php if (!empty($item['team_name'])): ?>
                                            <h3 class="team-slider__title">
                                                <?php echo esc_html($item['team_name']); ?>
                                            </h3>
                                        <?php endif; ?>
                                        <?php if (!empty($item['team_role'])): ?>
                                            <p class="team-slider__role body-text">
                                                <?php echo esc_html($item['team_role']); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Team_Slider_Widget_2());
