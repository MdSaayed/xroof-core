<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Footer_Widget_2 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-footer-2';
    }

    public function get_title()
    {
        return esc_html__('Xroof Footer 2', 'xroof');
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
            'footer_content_left_section',
            [
                'label' => esc_html__('Footer Left', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'footer_logo',
            [
                'label' => esc_html__('Logo Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                     'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'footer_text',
            [
                'label' => esc_html__('Footer Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Providing trusted roofing services with a commitment to quality, safety, and customer satisfaction. From repairs to full installations.', 'xroof'),
                'placeholder' => esc_html__('Type your description here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_button_text',
            [
                'label' => esc_html__('Footer Button Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Book a 15 -min call', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_button_link',
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
        $this->end_controls_section();

        $this->start_controls_section(
            'footer_right_section',
            [
                'label' => __('Footer Right', 'xroof'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_section_heading('footer_link_item_1', 'Footer Link Item 1');
        $this->add_control(
            'footer_link_title',
            [
                'label' => esc_html__('Footer Link Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Quick Link', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
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
        $this->add_section_heading('footer_link_item_2', 'Footer Link Item 2');
        $this->add_control(
            'footer_link_title_2',
            [
                'label' => esc_html__('Footer Link Title @', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Services', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'select_post_type',
            [
                'label' => __('Select Post Type', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => get_all_post_types_list(),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'show_post_number',
            [
                'label' => __('Show Post Number', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
                'min' => 1,
                'max' => 50,
                'step' => 1,
                'label_block' => true,
            ]
        );
        $this->add_section_heading('footer_link_item_3', 'Footer Link Item 3');
        $this->add_control(
            'footer_link_title_3',
            [
                'label' => esc_html__('Footer Link Title 3', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Services', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'working_hours',
            [
                'label' => esc_html__('Working Hours', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Add your working hours', 'textdomain'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'working_hours_list',
            [
                'label' => esc_html__('Working Hour List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'working_hours' => esc_html__('Monday : 10.00 AM- 4.00PM', 'textdomain'),
                    ],
                    [
                        'working_hours' => esc_html__('Tuesday : 10.00 AM- 4.00PM', 'textdomain'),
                    ],
                    [
                        'working_hours' => esc_html__('Wednesday : 10.00 AM- 4.00PM', 'textdomain'),
                    ],
                    [
                        'working_hours' => esc_html__('Thursday : 10.00 AM- 4.00PM', 'textdomain'),
                    ],
                    [
                        'working_hours' => esc_html__('Friday : Close', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ working_hours }}}',
            ]
        );
        $this->add_section_heading('footer_link_item_4', 'Footer Link Item 4');
        $this->add_control(
            'footer_link_title_4',
            [
                'label' => esc_html__('Footer Link Title 4', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contact Us', 'xroof'),
                'placeholder' => esc_html__('Type your text', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'footer_contact_item',
            [
                'label' => esc_html__('Contact Item', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Add your text here', 'textdomain'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_contact_item_list',
            [
                'label' => esc_html__('Working Hour List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'footer_contact_item' => esc_html__('857,king street road,New York-89009', 'textdomain'),
                    ],
                    [
                        'footer_contact_item' => esc_html__('1209725 -097 9855', 'textdomain'),
                    ],
                    [
                        'footer_contact_item' => esc_html__('info.examplae@gmail.com', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ footer_contact_item }}}',
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
            'back_to_top',
            [
                'label' => esc_html__('Back To Top', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('BACK TO TOP', 'xroof'),
                'placeholder' => esc_html__('Type your button text', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'back_to_top_link',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#header-2',
                    'is_external' => true,
                    'nofollow' => true,
                ],
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
            'footer_style_left_section',
            [
                'label' => __('Footer Left', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('footer_desc', 'footer__desc-small', 'Footer Description');
        $this->register_text_style_controls('footer_button', 'footer__action-btn', 'Footer Button');
        $this->add_control(
            'footer_button_bg_color',
            [
                'label' => esc_html__('Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__action-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_button_bg_hover_color',
            [
                'label' => esc_html__('Hover Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__action-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_button_hover_color',
            [
                'label' => esc_html__('Hover Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__action-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'footer_style_right_section',
            [
                'label' => __('Footer Right', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'footer_link_title_color',
            [
                'label' => esc_html__('Link Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_link_text_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__nav li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .footer__nav-link li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .footer__hour' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .footer__address' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_link_hover_color',
            [
                'label' => esc_html__('Link Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__nav li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .footer__nav-link li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'footer_bottom_style_section',
            [
                'label' => __('Footer Bottom', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('footer_bottom_copyright', 'footer__bottom-text', 'Copyright Text');
        $this->add_control(
            'footer_bottom_copyright_color',
            [
                'label' => esc_html__('Copyright Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__bottom-text' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->register_text_style_controls('footer_bottom_button', 'footer__back-to-top', 'Back To Top Text');
        $this->register_text_style_controls('footer_bottom_link', 'footer__bottom-nav-link', 'Link Text');
        $this->add_section_heading('footer_border', 'Line');
        $this->add_control(
            'footer_line_top',
            [
                'label' => esc_html__('Line Top Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__container--top' => 'border-bottom-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'footer_line_bottom',
            [
                'label' => esc_html__('Line Bottom Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__container--bottom' => 'border-top-color: {{VALUE}}',
                ],
            ]
        );
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
        $selected_posts = get_all_posts($settings['select_post_type'] ?: 'post');
        $post_limit = $settings['show_post_number'] ?: 5;
        $selected_posts = array_slice($selected_posts, 0, $post_limit, true);

        ?>

        <footer class="footer footer--style-2">
            <div class="footer__container footer__container--top container pb-20">
                <div class="footer__inner">
                    <div class="footer__brand">
                        <?php if (!empty($settings['footer_logo']['url'])): ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo-wrap mb-4 d-block">
                                <img src="<?php echo esc_url($settings['footer_logo']['url']); ?>" alt="Logo" class="footer__logo">
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($settings['footer_text'])): ?>
                            <p class="footer__desc-small body-text">
                                <?php echo esc_html($settings['footer_text']); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($settings['footer_button_text'])): ?>
                            <div class="footer__action my-10">
                                <a <?php echo xroof_get_link_attribute($settings['footer_button_link']); ?>
                                    class="footer__action-btn">
                                    <?php echo esc_html($settings['footer_button_text']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($menu_id || $settings['footer_link_title'])): ?>
                        <?php if (!empty($settings['footer_link_title'] || !empty($menu_id))): ?>
                            <div class="footer__links">
                                <?php if (!empty($settings['footer_link_title'])): ?>
                                    <h5 class="footer__title mb-8">
                                        <?php echo esc_html($settings['footer_link_title']) ?>
                                    </h5>
                                <?php endif; ?>

                                <?php
                                if (!empty($menu_id)) {
                                    wp_nav_menu([
                                        'menu' => $menu_id,
                                        'container' => false, // ul wrapper na
                                        'menu_class' => 'footer__nav-link list-unstyled mb-0',
                                        'fallback_cb' => false,
                                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                        'link_before' => '',
                                        'link_after' => '',
                                    ]);
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (!empty($selected_posts || $settings['footer_link_title_2'])): ?>
                        <div class="footer__links">
                            <?php if (!empty($settings['footer_link_title_2'])): ?>
                                <h5 class="footer__title mb-8">
                                    <?php echo esc_html($settings['footer_link_title_2']) ?>
                                </h5>
                            <?php endif; ?>
                            <?php if (!empty($selected_posts)): ?>
                                <ul class="footer__nav list-unstyled mb-0">
                                    <?php foreach ($selected_posts as $post_id => $post_title): ?>
                                        <li class="mb-4">
                                            <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="footer__nav-link body-text">
                                                <?php echo esc_html($post_title); ?> </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['working_hours_list'] || $settings['footer_link_title_3'])): ?>
                        <div class="footer__hours">
                            <?php if (!empty($settings['footer_link_title_3'])): ?>
                                <h5 class="footer__title mb-8">
                                    <?php echo esc_html($settings['footer_link_title_3']) ?>
                                </h5>
                            <?php endif; ?>
                            <ul class="list-unstyled mb-0 small">
                                <?php foreach ($settings['working_hours_list'] as $item): ?>
                                    <li class="footer__hour body-text mb-4">
                                        <?php echo esc_html($item['working_hours']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="footer__hours">
                        <?php if (!empty($settings['footer_link_title_4'])): ?>
                            <h5 class="footer__title mb-8">
                                <?php echo esc_html($settings['footer_link_title_4']) ?>
                            </h5>
                        <?php endif; ?>
                        <ul class="list-unstyled mb-0 small">
                            <?php foreach ($settings['footer_contact_item_list'] as $item): ?>
                                <li class="footer__address body-text mb-4">
                                    <?php echo esc_html($item['footer_contact_item']); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer__container footer__container--bottom container py-0">
                <div class="footer__bottom">
                    <div
                        class="d-flex flex-column gap-3 flex-md-row justify-content-between align-items-center text-center text-md-start">
                        <?php if (!empty($settings['footer_copyright_text'])): ?>
                            <p class="footer__bottom-text body-text mb-0">
                                <?php echo esc_html($settings['footer_copyright_text']); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($settings['back_to_top'])): ?>
                            <a href="<?php echo esc_html($settings['back_to_top_link']['url']); ?>" class="footer__back-to-top body-text">
                                <?php echo esc_html($settings['back_to_top']); ?>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($settings['footer_bottom_link_list'])): ?>
                            <ul class="footer__bootom-nav d-flex flex-wrap justify-content-center list-inline mb-0">
                                <?php foreach ($settings['footer_bottom_link_list'] as $item): ?>
                                    <li class="list-inline-item">
                                        <a <?php echo xroof_get_link_attribute($item['footer_bottom_link']); ?>
                                            class="footer__bottom-nav-link">
                                            <?php echo esc_html($item['footer_bottom_link_text']); ?>
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

$widgets_manager->register(new Xroof_Footer_Widget_2());
