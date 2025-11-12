<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Services_Video_Widget extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-services-video';
    }

    public function get_title()
    {
        return esc_html__('Xroof Services Video', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-video-playlist';
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
            'services_content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'layout_style',
            [
                'label' => esc_html__('Layout Style', 'xroof'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => esc_html__('Layout One', 'xroof'),
                    'layout_two' => esc_html__('Layout Two', 'xroof'),
                ],
                'description' => esc_html__('Choose a layout style for displaying content.', 'xroof'),
            ]
        );
        $this->add_control(
            'services_text',
            [
                'label' => esc_html__('Left Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('EXPLORE WORKS', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services_text_right',
            [
                'label' => esc_html__('Right Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__(' PLAY REEL', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services_scroll_btn_text',
            [
                'label' => esc_html__('Scroll Button', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__(' SCROLL DOWN', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services_scroll_btn_link',
            [
                'label' => esc_html__('Link', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['#blog-2', 'is_external', 'nofollow'],
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'services_video_section',
            [
                'label' => esc_html__('Video', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'services_video_link',
            [
                'label' => esc_html__('Video Link', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' =>'https://www.w3schools.com/html/mov_bbb.mp4',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
                'description' => esc_html__('Work only with self-hosted video (mp4)', 'xroof'),
            ]
        );
        $this->add_section_heading('video_footer', 'Video Footer');
        $this->add_control(
            'footer_left_text',
            [
                'label' => esc_html__('Footer Left Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__(' Empowering brands with tailored Communication & Roof', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_right_text',
            [
                'label' => esc_html__('Footer Right Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Let’s works together to create some amazing results', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_btn_text',
            [
                'label' => esc_html__('Footer Button Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get in Touch', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_btn_link',
            [
                'label' => esc_html__('Button Link', 'xroof'),
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
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'services_style_section',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('services_text', 'services__text', 'Left Text');
        $this->register_text_style_controls('services_right', 'services__text--right', 'Right Text');
        $this->register_text_style_controls('services_scroll_text', 'services__text--btn', 'Right Scroll Text');
        $this->end_controls_section();

        $this->start_controls_section(
            'services_video_style_section',
            [
                'label' => __('Video', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'services_video_max_height',
            [
                'label' => esc_html__('Max Height', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 2000,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'description' => esc_html__('Set maximum height for the video', 'xroof'),
                'selectors' => [
                    '{{WRAPPER}} .services__video-container' => 'max-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->register_text_style_controls('video_footer_left', 'services__video-text', 'Footer Text');
        $this->register_text_style_controls('video_footer_btn', 'services__video-btn', 'Footer Button');
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'video_footer_btn_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'video_btn_bg',
            [
                'label' => esc_html__('Button Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__video-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->register_border_radius_control('video_btn_radius', 'services__video-btn');
        $this->add_control(
            'video_btn_text_color',
            [
                'label' => esc_html__('Button text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__video-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'video_footer_btn_hover_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'video_btn_hover_bg',
            [
                'label' => esc_html__('Button Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__video-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'video_btn_text_hover_color',
            [
                'label' => esc_html__('Button text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__video-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'video_footer_border_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__video-bottom' => 'border-color: {{VALUE}}',
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

        <?php if ($settings['layout_style'] == 'layout_one'): ?>
            <section class="services services--style-3">
                <div class="services__container-top container p-0">
                    <h2 class="services__title title-hidden"> Services </h2>
                    <div class="services__top row g-0">
                        <div class=" col col-12 col-md-6">
                            <div class="services__top-left">
                                <?php if (!empty($settings['services_text'])): ?>
                                    <p class="services__text mb-0">
                                        <?php echo esc_html($settings['services_text']); ?>
                                    </p>
                                <?php endif; ?>
                                <div id="playBtn" class="services__play-btn">
                                    <svg width="31" height="35" viewBox="0 0 31 35" fill="none">
                                        <path d="M30.6092 17.4998L0.445408 34.9149V0.0847454L30.6092 17.4998Z" fill="white" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class=" col col-12 col-md-6">
                            <div class="services__top-right">
                                <?php if (!empty($settings['services_text_right'])): ?>
                                    <p class="services__text services__text--right mb-0 ml-6">
                                        <?php echo esc_html($settings['services_text_right']); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if (!empty($settings['services_scroll_btn_text'])): ?>
                                    <a href="<?php echo esc_url($settings['services_scroll_btn_link']['url']); ?>"
                                        class="services__text services__text--btn mb-0">
                                        <?php echo esc_html($settings['services_scroll_btn_text']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="services__video-container container p-0 position-relative">
                    <video id="bgVideo" class="services__video-bg" muted loop>
                        <source src="<?php echo esc_url($settings['services_video_link']['url']); ?>" type="video/mp4">
                        <?php esc_html_e('Your browser does not support HTML5 video.', 'xroof'); ?>
                    </video>

                    <div class="services__video-bottom container">
                        <?php if (!empty($settings['footer_left_text'])): ?>
                            <p class="services__video-text body-text">
                                <?php echo esc_html($settings['footer_left_text']); ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($settings['footer_btn_text'])): ?>
                            <a <?php echo xroof_get_link_attribute($settings['footer_btn_link']); ?>
                                class="services__video-btn body-text">
                                <?php echo esc_html($settings['footer_btn_text']); ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['footer_right_text'])): ?>
                            <p class="services__video-text body-text">
                                <?php echo esc_html($settings['footer_right_text']); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="services services--style-3">
                <div class="services__video-container container p-0 position-relative">
                    <video id="bgVideo" class="services__video-bg" muted loop>
                        <source src="<?php echo esc_url($settings['services_video_link']['url']); ?>" type="video/mp4">
                        <?php esc_html_e('Your browser does not support HTML5 video.', 'xroof'); ?>
                    </video>
                </div>
                <div class="services__container-top container p-0">
                    <h2 class="services__title title-hidden"> Services </h2>
                    <div class="services__top row g-0">
                        <div class=" col col-12 col-md-6">
                            <div class="services__top-left">
                                <?php if (!empty($settings['services_text'])): ?>
                                    <p class="services__text mb-0">
                                        <?php echo esc_html($settings['services_text']); ?>
                                    </p>
                                <?php endif; ?>
                                <div id="playBtn" class="services__play-btn">
                                    <svg width="31" height="35" viewBox="0 0 31 35" fill="none">
                                        <path d="M30.6092 17.4998L0.445408 34.9149V0.0847454L30.6092 17.4998Z" fill="white" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class=" col col-12 col-md-6">
                            <div class="services__top-right">
                                <?php if (!empty($settings['services_text_right'])): ?>
                                    <p class="services__text services__text--right mb-0 ml-6">
                                        <?php echo esc_html($settings['services_text_right']); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if (!empty($settings['services_scroll_btn_text'])): ?>
                                    <a href="<?php echo esc_url($settings['services_scroll_btn_link']['url']); ?>"
                                        class="services__text services__text--btn mb-0">
                                        <?php echo esc_html($settings['services_scroll_btn_text']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php
    }
}

$widgets_manager->register(new Xroof_Services_Video_Widget());
