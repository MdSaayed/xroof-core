<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Footer_Widget_3 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-footer-3';
    }

    public function get_title()
    {
        return esc_html__('Xroof Footer 3', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-footer';
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
            'footer_content_top_section',
            [
                'label' => esc_html__('Footer Top', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'item_number',
            [
                'label' => esc_html__('Item Number', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );

        $repeater->add_control(
            'footer_image',
            [
                'label' => esc_html__('Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/global/logo.png',
                ],
            ]
        );
        $this->add_svg_control($repeater, 'footer_social_icon', 'Social Icon', '/assets/svg/instagram.svg');
        $repeater->add_control(
            'footer_image_social_link',
            [
                'label' => esc_html__('Social Link', 'textdomain'),
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
            'footer_gallery',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'footer_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/footer/footer-img-1.png',
                        ],
                        'footer_social_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/instagram.svg',
                        ],
                        'footer_image_social_link' => esc_html__('#', 'textdomain'),
                        'item_number' => esc_html__('1', 'textdomain'),
                    ],
                    [
                        'footer_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/footer/footer-img-2.png',
                        ],
                        'footer_social_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/instagram.svg',
                        ],
                        'footer_image_social_link' => esc_html__('#', 'textdomain'),
                        'item_number' => esc_html__('2', 'textdomain'),
                    ],
                    [
                        'footer_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/footer/footer-img-3.png',
                        ],
                        'footer_social_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/instagram.svg',
                        ],
                        'footer_image_social_link' => esc_html__('#', 'textdomain'),
                        'item_number' => esc_html__('3', 'textdomain'),
                    ],
                    [
                        'footer_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/footer/footer-img-4.png',
                        ],
                        'footer_social_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/instagram.svg',
                        ],
                        'footer_image_social_link' => esc_html__('#', 'textdomain'),
                        'item_number' => esc_html__('4', 'textdomain'),
                    ],
                    [
                        'footer_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/footer/footer-img-5.png',
                        ],
                        'footer_social_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/instagram.svg',
                        ],
                        'footer_image_social_link' => esc_html__('#', 'textdomain'),
                        'item_number' => esc_html__('5', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ item_number }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'footer_middle_section',
            [
                'label' => __('Footer Middle', 'xroof'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'footer_top_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contact Me Today!', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_email',
            [
                'label' => esc_html__('Email Address', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('info@example.com', 'xroof'),
                'placeholder' => esc_html__('Type your email here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_arrow_link',
            [
                'label' => esc_html__('Arrow Link', 'textdomain'),
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

        $this->start_controls_section(
            'footer_bottom_section',
            [
                'label' => __('Footer Bottom', 'xroof'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'footer_copyright_text',
            [
                'label' => esc_html__('Footer Copyright Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('XRooF Themes 2025. All Rights Reserved.', 'xroof'),
                'placeholder' => esc_html__('Type your copyright text', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_menu',
            [
                'label' => esc_html__('Select Menu', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => xroof_get_menus(),
                'label_block' => true,
            ]
        );
        $this->add_section_heading('footer_bottom_link', 'Links');
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'footer_bottom_link_text',
            [
                'label' => esc_html__('Link Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Add your link text here', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'footer_bottom_link',
            [
                'label' => esc_html__('Link', 'textdomain'),
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
            'footer_bottom_link_list',
            [
                'label' => esc_html__('Footer Bottom Link List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'footer_bottom_link_text' => esc_html__('Terms & Conditions', 'textdomain'),
                        'footer_bottom_link' => esc_html__('#', 'textdomain'),
                    ],
                    [
                        'footer_bottom_link_text' => esc_html__('Privacy Policy', 'textdomain'),
                        'footer_bottom_link' => esc_html__('#', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ footer_bottom_link_text }}}',
            ]
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'footer_style_top_section',
            [
                'label' => __('Footer Top', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'footer_gallery_style_tabs'
        );
        $this->start_controls_tab(
            'footer_gallery_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'footer_gallery_color',
            [
                'label' => esc_html__('Social Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__gallery-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_gallery_bg_color',
            [
                'label' => esc_html__('Social Icon Background', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__gallery-icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'footer_gallery_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'footer_gallery_hover_color',
            [
                'label' => esc_html__('Social Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__gallery-icon:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_gallery_bg_hover_color',
            [
                'label' => esc_html__('Social Icon Background', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__gallery-icon:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'footer_style_middle_section',
            [
                'label' => __('Footer Middle', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'footer_title_color',
            [
                'label' => esc_html__('Link Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->register_text_style_controls('footer_title_color', 'footer__cta-title', 'Title');
        $this->register_text_style_controls('footer_email_style', 'footer__cta-link', 'Email');
        $this->start_controls_tabs(
            'footer_arrow_style_tabs'
        );
        $this->start_controls_tab(
            'footer_arrow_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'footer_arrow_bg_color',
            [
                'label' => esc_html__('Background Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_arrow_color',
            [
                'label' => esc_html__('color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_arrow_border_color',
            [
                'label' => esc_html__('Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'footer_arrow_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'footer_arrow_bg_hover_color',
            [
                'label' => esc_html__('Background Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_arrow_hover_color',
            [
                'label' => esc_html__('color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_arrow_border_hover_color',
            [
                'label' => esc_html__('Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__cta-btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'footer_bottom_style_section',
            [
                'label' => __('Footer Bottom', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('footer_bottom_copyright', 'footer__copyright', 'Copyright Text');
        $this->register_text_style_controls('footer_bottom_link', 'footer__nav li a', 'Nav Link');
        $this->register_text_style_controls('footer_bottom_link_privacy', 'footer__policy-link', 'Privacy & Policy Link');
        $this->end_controls_section();

        $this->start_controls_section(
            'footer_bg_style_section',
            [
                'label' => __('Background', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'footer_bg_color',
            [
                'label' => esc_html__('Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer--style-2' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $menu_id = $settings['footer_menu'];

        ?>

        <footer class="footer footer--style-3">
            <div class="footer__container container">
                <?php if (!empty($settings['footer_gallery'])): ?>
                    <div class="footer__top">
                        <div class="footer__gallery">
                            <?php foreach ($settings['footer_gallery'] as $key => $item): ?>
                                <div class="footer__gallery-item">
                                    <?php if (!empty($item['footer_image']['url'])): ?>
                                        <img src="<?php echo esc_url($item['footer_image']['url']); ?>" alt="Roofing Work"
                                            class="footer__gallery-img">
                                    <?php endif; ?>
                                    <?php if (!empty($item['footer_image_social_link']['url'])): ?>
                                        <a <?php xroof_get_link_attribute($item['footer_image_social_link']); ?>
                                            class="footer__gallery-icon">
                                            <?php echo $this->render_svg($item['footer_social_icon']['url']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="footer__middle">
                    <div class="footer__cta py-6 py-xl-8 py-xxl-12">
                        <?php if (!empty($settings['footer_top_title'])): ?>
                            <h2 class="footer__cta-title mb-6 mb-xl-8 mb-xxl-12">
                                <?php echo esc_html($settings['footer_top_title']); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if (!empty($settings['footer_email'] || !empty($settings['footer_arrow_link']))): ?>
                            <div class="footer__cta-email">
                                <?php if (!empty($settings['footer_email'])): ?>
                                    <a href="mailto:<?php echo esc_attr($settings['footer_email']); ?>" class="footer__cta-link title-xxl">
                                        <?php echo esc_html($settings['footer_email']); ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($settings['footer_arrow_link'])): ?>
                                    <a <?php echo xroof_get_link_attribute($settings['footer_arrow_link']); ?>
                                        class="footer__cta-btn mb-0">
                                        <svg width="19" height="17" viewBox="0 0 19 17" fill="none">
                                            <path
                                                d="M18.1055 2.70641C18.151 2.18635 17.7663 1.72789 17.2462 1.68239L8.77148 0.940946C8.25143 0.895447 7.79296 1.28015 7.74746 1.8002C7.70196 2.32025 8.08666 2.77872 8.60671 2.82422L16.1398 3.48328L15.4807 11.0164C15.4352 11.5364 15.8199 11.9949 16.34 12.0404C16.86 12.0859 17.3185 11.7012 17.364 11.1811L18.1055 2.70641ZM0.843779 15.0842C0.443875 15.4198 0.391713 16.016 0.727273 16.4159C1.06283 16.8158 1.65904 16.868 2.05895 16.5324L1.45136 15.8083L0.843779 15.0842ZM17.1638 2.62402L16.5562 1.89993L0.843779 15.0842L1.45136 15.8083L2.05895 16.5324L17.7714 3.34811L17.1638 2.62402Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="footer__bottom">
                    <div class="footer__bottom-wrap  p-5 px-xxl-6 px-xl-4 py-xl-6 py-xxl-8">
                        <?php if (!empty($settings['footer_copyright_text'])): ?>
                            <p class="footer__copyright mb-0">
                                <?php echo esc_html($settings['footer_copyright_text']); ?>
                            </p>
                        <?php endif; ?>

                        <?php
                        if (!empty($menu_id)) {
                            wp_nav_menu([
                                'menu' => $menu_id,
                                'container' => false,
                                'menu_class' => 'footer__nav mb-0',
                                'fallback_cb' => false,
                                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                'link_before' => '',
                                'link_after' => '',
                            ]);
                        }
                        ?>

                        <?php if (!empty($settings['footer_bottom_link_list'])): ?>
                            <ul class="footer__policy mb-0">
                                <?php foreach ($settings['footer_bottom_link_list'] as $key => $item): ?>
                                    <li class="footer__policy-item"><a <?php echo xroof_get_link_attribute($item['footer_bottom_link']) ?> class="footer__policy-link">
                                            <?php echo esc_html($item['footer_bottom_link_text']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </footer>

        <?php
    }
}

$widgets_manager->register(new Xroof_Footer_Widget_3());
