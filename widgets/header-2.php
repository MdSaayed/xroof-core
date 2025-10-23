<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Header_Two_Widget extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-header-2';
    }

    public function get_title()
    {
        return esc_html__('Xroof Header 2', 'xroof');
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

        $this->add_control(
            'nav_arrow_color',
            [
                'label' => esc_html__('Arrow Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav__arrow svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav_arrow_hover_color',
            [
                'label' => esc_html__('Arrow Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav__arrow:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav_arrow_bg_color',
            [
                'label' => esc_html__('Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav__arrow' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav_arrow_bg_hover_color',
            [
                'label' => esc_html__('Background Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav__arrow:hover' => 'background: {{VALUE}}',
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
            'responsive_menu_style_section',
            [
                'label' => __('Responsive Menu', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <header id="header-2" class="header header--style-2">
            <div class="header__container container py-6 py-xl-8">
                <div class="header__content">
                    <div class="header__logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                            <img src="<?php echo esc_url($settings['site_logo']['url']); ?>" alt="Company Logo"
                                class="header__logo-img">
                        </a>
                    </div>

                    <div class="nav__menu-wrap">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'main-menu',
                                'menu_class' => 'nav__menu',
                                'menu_id' => '',
                                'container' => '',
                                'fallback_cb' => 'Xroof_Walker_Nav_Menu::fallback',
                                'walker' => new Xroof_Walker_Nav_Menu,
                            )
                        );
                        ?>

                        <div class="nav__arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                                <path
                                    d="M13.227 3.34714C13.3452 2.9607 13.1277 2.55166 12.7413 2.43351L6.44394 0.508228C6.0575 0.390083 5.64846 0.607575 5.53031 0.99401C5.41217 1.38045 5.62966 1.78949 6.0161 1.90763L11.6137 3.619L9.90235 9.21662C9.78421 9.60306 10.0017 10.0121 10.3881 10.1302C10.7746 10.2484 11.1836 10.0309 11.3018 9.64446L13.227 3.34714ZM12.5273 3.13322L12.1838 2.48719L0.151862 8.88471L0.495362 9.53074L0.838862 10.1768L12.8708 3.77925L12.5273 3.13322Z"
                                    fill="#FFFDFD" />
                            </svg>
                        </div>
                    </div>

                    <button id="offcanvas-toggle" class="nav__toggle" aria-label="Toggle navigation">☰</button>

                    <?php if ($settings['info_toggle'] == 'yes'): ?>
                        <?php echo get_template_part('template-parts/header/info-panel'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <?php echo get_template_part('template-parts/header/offcanvas'); ?>

        <?php
    }
}

$widgets_manager->register(new Xroof_Header_Two_Widget()); ?>
