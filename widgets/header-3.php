<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Header_Three_Widget extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-header-3';
    }

    public function get_title()
    {
        return esc_html__('Xroof Header 3', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-header';
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
            'nav_section',
            [
                'label' => esc_html__('Navbar', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'site_logo',
            [
                'label' => esc_html__('Logo Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('The oogo will be displayed at 140×50 pixels. Please upload an image with these dimensions for best results.', 'xroof'),
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/global/logo.png',
                ],
            ]
        );
        $this->add_control(
            'info_toggle',
            [
                'label' => esc_html__('Show Information Toggle', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'nav_bottom_section',
            [
                'label' => esc_html__('Navbar Bottom', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'nav_bottom_switcher',
            [
                'label' => esc_html__('Show Navbar Bottom', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'nav_bottom_button_text',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'textdomain'),
                'placeholder' => esc_html__('Type your text here', 'textdomain'),
            ]
        );
        $this->add_control(
            'nav_bottom_button_link',
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'nav_info_text',
            [
                'label' => esc_html__('Navbar Bottom Info Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'nav_info_list',
            [
                'label' => esc_html__('Info List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'nav_info_text' => esc_html__('+066690 676- 48-23', 'textdomain'),
                    ],
                    [
                        'nav_info_text' => esc_html__('info,example@gmail.com', 'textdomain'),
                    ],
                    [
                        'nav_info_text' => esc_html__('Broadway, 23th floor, San Francisco', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ nav_info_text }}}',
            ]
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'nav_style_section',
            [
                'label' => __('Navbar', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('nav_item', 'nav__link', 'Nav Link');
        $this->add_control(
            'nav_link_hover',
            [
                'label' => esc_html__('Nav Link Hover', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav__link:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'nav_link_active',
            [
                'label' => esc_html__('Nav Link Active', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .current-menu-item > .nav__link' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'submenu_bg_color',
            [
                'label' => esc_html__('Submenu Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav__submenu' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav_bg_color',
            [
                'label' => esc_html__('Nav Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav__menu-wrap' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_section_heading('info_toggle', 'Info Toggle');
        $this->add_control(
            'info_toggle_color',
            [
                'label' => esc_html__('Toggle Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header__info-toggle svg path' => 'fill: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'info_toggle_border_color',
            [
                'label' => esc_html__('Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header__info-toggle' => 'border-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'navbar_bottom_style_section',
            [
                'label' => __('Navbar Bottom', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('nav_info_text', 'header__contact-item', 'Navbar Bottom Info Text');
        $this->add_control(
            'nav_bottom_bg_color',
            [
                'label' => esc_html__('Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header__bottom' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->register_text_style_controls('nav_bottom_button', 'header__cta-btn', 'Button');
        $this->register_border_radius_control('nav_bottom_button_radius', 'header__cta-btn');
        $this->add_control(
            'nav_bottom_button_bg_color',
            [
                'label' => esc_html__('Background', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header__cta-btn' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'nav_bottom_button_hover_color',
            [
                'label' => esc_html__('Color Hover', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header__cta-btn:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'nav_bottom_button_hover_bg_color',
            [
                'label' => esc_html__('Background Hover', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header__cta-btn:hover' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_section_heading('bottom_wrapper','Wrapper');
        $this->add_control(
            'nav_bottom_button_hover_bg_color',
            [
                'label' => esc_html__('Background Hover', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header__bottom' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->register_border_radius_control('nav_bottom_radius', 'header__bottom');
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <header class="header header--style-3">
            <div class="header__container container py-6">
                <div class="header__top">
                    <div class="header__logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                            <img src="<?php echo esc_url($settings['site_logo']['url']); ?>" alt="Company Logo"
                                class="header__logo-img">
                        </a>
                    </div>

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-two',
                            'menu_class' => 'nav__menu',
                            'menu_id' => '',
                            'container' => '',
                            'fallback_cb' => 'Xroof_Walker_Nav_Menu::fallback',
                            'walker' => new Xroof_Walker_Nav_Menu,
                        )
                    );
                    ?>

                    <button id="offcanvas-toggle" class="nav__toggle" aria-label="Toggle navigation">☰</button>

                    <?php if ($settings['info_toggle'] == 'yes'): ?>
                        <?php echo get_template_part('template-parts/header/info-panel'); ?>
                    <?php endif; ?>
                </div>

                <?php if ($settings['nav_bottom_switcher'] == 'yes'): ?>
                    <div class="header__bottom d-flex px-8 py-4">
                        <?php if (!empty($settings['nav_info_list'])): ?>
                            <ul class="header__contact-list d-flex m-0 p-0">
                                <?php foreach ($settings['nav_info_list'] as $key => $item): ?>
                                    <li class="header__contact-item">
                                        <?php echo esc_html($item['nav_info_text']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($settings['nav_bottom_button_text'])): ?>
                            <a <?php echo xroof_get_link_attribute($settings['nav_bottom_button_link']); ?> class="header__cta-btn">
                                <span class="services__btn-decor"></span>
                                <?php echo esc_html($settings['nav_bottom_button_text']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <?php echo get_template_part('template-parts/header/offcanvas'); ?>

        <?php
    }
}

$widgets_manager->register(new Xroof_Header_Three_Widget());