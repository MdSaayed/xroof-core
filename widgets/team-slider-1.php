<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Team_Slider_Widget_1 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-team-slider-1';
    }

    public function get_title()
    {
        return esc_html__('Xroof Team Slider 1', 'xroof');
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
        $this->register_text_style_controls('team_title', 'team_title', 'Title');
        $this->register_text_style_controls('team_desc', 'team__desc', 'Description');
        $this->end_controls_section();

        $this->start_controls_section(
            'team_slider_style_section',
            [
                'label' => __('Slider', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('team_name', 'team__name', 'Name');
        $this->register_text_style_controls('team_role', 'team__role', 'Name');
        $this->add_section_heading('content_wrapper', 'Content Wrapper');
        $this->add_control(
            'content_wrapper_bg',
            [
                'label' => esc_html__('Content Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__card-content' => 'Background: {{VALUE}}',
                ],
            ]
        );
        $this->register_spacing_controls('content_wrapper_spacing', 'team__card-content');
        $this->register_border_radius_control('content_wrapper_radius', 'team__card-content');
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
                    '{{WRAPPER}} .slider__btn svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'slider_btn',
            [
                'label' => esc_html__('Navigation', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider__btn' => 'Background: {{VALUE}}',
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
                    '{{WRAPPER}} .slider__btn:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'slider_btn_hover',
            [
                'label' => esc_html__('Navigation', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider__btn:hover' => 'Background: {{VALUE}}',
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

        <section class="team team--style-2">`
            <div class="team__container container">
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <div class="team__left">
                            <?php if (!empty($settings['team_title'] || !empty($settings['team_desc']))): ?>
                                <div class="team__title-wrap">
                                    <?php if ($settings['team_title']): ?>
                                        <h2 class="team__title title-xl"><?php echo esc_html($settings['team_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if ($settings['team_desc']): ?>
                                        <p class="team__desc body-text mt-4"><?php echo esc_html($settings['team_desc']); ?> </p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="slider__nav slider__nav--team d-flex flex-wrap gap-4 mt-4">
                                <div id="team-prev-btn" class="slider__btn slider__btn--prev">
                                    <?php if (!empty($settings['nav_icon_left']['url'])): ?>
                                        <?php echo $this->render_svg($settings['nav_icon_left']['url']); ?>
                                    <?php endif; ?>
                                </div>

                                <div id="team-next-btn" class="slider__btn slider__btn--next">
                                    <?php if (!empty($settings['nav_icon_right']['url'])): ?>
                                        <?php echo $this->render_svg($settings['nav_icon_right']['url']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-6">
                        <div class="team__right">
                            <div id="team-2" class="team__cards">
                                <?php foreach ($settings['team_member_list'] as $key => $item): ?>
                                    <div class="team__card">
                                        <?php if (empty($settings['team_img'])): ?>
                                            <div class="team__img-wrap">
                                                <img src="<?php echo esc_url($item['team_img']['url']) ?>" alt="Team Member"
                                                    class="team__img">
                                            </div>
                                        <?php endif; ?>

                                        <div class="team__card-content mt-4">
                                            <div class="team__info">
                                                <?php if (!empty($item['team_name'])): ?>
                                                    <h3 class="team__name m-0"><?php echo esc_html($item['team_name']); ?></h3>
                                                <?php endif; ?>
                                                <?php if (!empty($item['team_role'])): ?>
                                                    <p class="team__role body-text mt-1"><?php echo esc_html($item['team_role']); ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <div class="team__socials d-flex gap-2 mt-3">
                                                <?php if (!empty($item['x_link']['url'])): ?>
                                                    <a <?php echo xroof_get_link_attribute($item['x_link']); ?>
                                                        class="team__social-link">
                                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                                                            <path
                                                                d="M7.45359 5.8791L11.7951 0.697266H10.7663L6.99657 5.19658L3.98572 0.697266H0.513062L5.06606 7.50102L0.513062 12.935H1.54191L5.52281 8.18354L8.70249 12.935H12.1752L7.45334 5.8791H7.45359ZM6.04444 7.56097L5.58313 6.88347L1.91262 1.49252H3.49287L6.45501 5.84319L6.91633 6.52069L10.7668 12.1759H9.18651L6.04444 7.56123V7.56097Z"
                                                                fill="white" />
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (!empty($item['facebook_link']['url'])): ?>
                                                    <a <?php echo xroof_get_link_attribute($item['facebook_link']); ?>
                                                        class="team__social-link">
                                                        <svg width="7" height="13" viewBox="0 0 7 13" fill="none">
                                                            <path
                                                                d="M4.34408 12.7748V7.33868H6.16803L6.44168 5.2195H4.34408V3.86671C4.34408 3.25335 4.51371 2.83535 5.39426 2.83535L6.51551 2.83489V0.939415C6.3216 0.914217 5.656 0.856445 4.88131 0.856445C3.26363 0.856445 2.15614 1.84386 2.15614 3.65683V5.2195H0.32666V7.33868H2.15614V12.7748H4.34408Z"
                                                                fill="black" />
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (!empty($item['behance_link']['url'])): ?>
                                                    <a <?php echo xroof_get_link_attribute($item['behance_link']); ?>
                                                        class="team__social-link">
                                                        <svg width="26" height="26" fill="#fff" viewBox="0 0 256 256">
                                                            <g stroke-width="0"></g>
                                                            <g stroke-linecap="round" stroke-linejoin="round"></g>
                                                            <g>
                                                                <path
                                                                    d="M86.26123,32.74414a103.85849,103.85849,0,0,1,100.148,9.25537,153.22442,153.22442,0,0,1-44.543,40.48438A169.26114,169.26114,0,0,0,86.26123,32.74414Zm41.31543,57.28955A152.978,152.978,0,0,0,69.4624,42.09863a104.382,104.382,0,0,0-41.543,57.561A151.8095,151.8095,0,0,0,64,103.99805,151.0488,151.0488,0,0,0,127.57666,90.03369Zm104.22119,31.65772a103.76547,103.76547,0,0,0-32.88965-69.689,169.34119,169.34119,0,0,1-48.39453,43.94092,167.29388,167.29388,0,0,1,13.542,29.89746,168.13983,168.13983,0,0,1,67.74219-4.14941Zm-63.33008,19.53125a167.82141,167.82141,0,0,1,4.44922,38.46972,168.65237,168.65237,0,0,1-6.084,44.77832,104.24218,104.24218,0,0,0,64.68213-86.65185,152.38875,152.38875,0,0,0-63.04737,3.40381Zm-19.64062-10.45459a151.39932,151.39932,0,0,0-12.3916-27.20557A166.974,166.974,0,0,1,64,119.99805a167.82812,167.82812,0,0,1-39.23633-4.6377,103.89032,103.89032,0,0,0,35.958,91.88281A168.9649,168.9649,0,0,1,148.82715,130.76807ZM73.78369,216.72021a103.93363,103.93363,0,0,0,74.58447,13.27051,152.66635,152.66635,0,0,0,8.54883-50.29834,151.825,151.825,0,0,0-3.73291-33.46289A152.89185,152.89185,0,0,0,73.78369,216.72021Z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (!empty($item['instagram_link']['url'])): ?>
                                                    <a <?php echo xroof_get_link_attribute($item['instagram_link']); ?>
                                                        class="team__social-link">
                                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                                                            <g clip-path="url(#clip0_619_1630)">
                                                                <path
                                                                    d="M9.30788 0.697266H3.84191C2.06296 0.697266 0.615723 2.18328 0.615723 4.0099V9.62241C0.615723 11.4489 2.06296 12.9349 3.84191 12.9349H9.30797C11.0868 12.9349 12.5341 11.4489 12.5341 9.62241V4.0099C12.5341 2.18328 11.0868 0.697266 9.30788 0.697266ZM11.8354 9.62241C11.8354 11.0533 10.7016 12.2175 9.30788 12.2175H3.84191C2.44823 12.2175 1.31443 11.0533 1.31443 9.62241V4.0099C1.31443 2.57887 2.44823 1.41469 3.84191 1.41469H9.30797C10.7016 1.41469 11.8354 2.57887 11.8354 4.0099V9.62241Z"
                                                                    fill="black" />
                                                                <path
                                                                    d="M6.57487 3.46973C4.77792 3.46973 3.31604 4.97077 3.31604 6.81587C3.31604 8.66098 4.77792 10.162 6.57487 10.162C8.37182 10.162 9.8337 8.66098 9.8337 6.81587C9.8337 4.97077 8.37182 3.46973 6.57487 3.46973ZM6.57487 9.4446C5.16328 9.4446 4.01474 8.26538 4.01474 6.81587C4.01474 5.36646 5.16328 4.18715 6.57487 4.18715C7.98656 4.18715 9.135 5.36646 9.135 6.81587C9.135 8.26538 7.98656 9.4446 6.57487 9.4446Z"
                                                                    fill="black" />
                                                                <path
                                                                    d="M9.91168 2.28125C9.38065 2.28125 8.94873 2.72483 8.94873 3.27C8.94873 3.81526 9.38065 4.25884 9.91168 4.25884C10.4427 4.25884 10.8747 3.81526 10.8747 3.27C10.8747 2.72474 10.4427 2.28125 9.91168 2.28125ZM9.91168 3.54132C9.76601 3.54132 9.64743 3.41957 9.64743 3.27C9.64743 3.12033 9.76601 2.99868 9.91168 2.99868C10.0574 2.99868 10.176 3.12033 10.176 3.27C10.176 3.41957 10.0574 3.54132 9.91168 3.54132Z"
                                                                    fill="black" />
                                                            </g>
                                                            <defs>
                                                                <clipPath>
                                                                    <rect width="11.9184" height="12.2377" fill="white"
                                                                        transform="translate(0.615723 0.697266)" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Team_Slider_Widget_1());
