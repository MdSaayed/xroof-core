<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Contact_Widget_1 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-contact-1';
    }

    public function get_title()
    {
        return esc_html__('Xroof Contact 1', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-contact';
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
            'contact_form_section',
            [
                'label' => esc_html__('Contact Form', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'contact_title',
            [
                'label' => esc_html__('Form Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Have questions? Contact with us today', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'form_shortcode',
            [
                'label' => esc_html__('Contact Form Shortcode', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'xroof'),
                'placeholder' => esc_html__('Insert your form shortcode', 'xroof'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'contact_information_section',
            [
                'label' => esc_html__('Contact Information', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'information_title',
            [
                'label' => esc_html__('Information Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get in touch with our XRooF !', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'information_desc',
            [
                'label' => esc_html__('Information description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('We’re here to help! Whether you have questions, need support, or want to learn more about XRooF , don’t hesitate to reach out.', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $this->add_svg_control($repeater, 'information_icon', 'Icon', '/assets/svg/phone-icon.svg');
        $repeater->add_control(
            'information_item_link_text',
            [
                'label' => esc_html__('Link Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Link Text Here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'information_item_link',
            [
                'label' => esc_html__('Link', 'xroof'),
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
            'information_item_text',
            [
                'label' => esc_html__('Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Text Here', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'information_item_list',
            [
                'label' => esc_html__('Information List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'information_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/phone-icon.svg',
                        ],
                        'information_item_link_text' => esc_html__('+555 6666 99 098', 'xroof'),
                        'information_item_link' => esc_html__('tel:+555666699098', 'xroof'),
                        'information_item_text' => esc_html__('Call Us Anytime', 'xroof'),
                    ],
                    [
                        'information_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/email.svg',
                        ],
                        'information_item_link_text' => esc_html__('info.elevix@gmail.com', 'xroof'),
                        'information_item_link' => esc_html__('mailto:info.elevix@gmail.com', 'xroof'),
                        'information_item_text' => esc_html__('Business marketing questions?', 'xroof'),
                    ],
                    [
                        'information_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/location.svg',
                        ],
                        'information_item_link_text' => esc_html__('78/7 TX, Austin,USA', 'xroof'),
                        'information_item_link' => esc_html__('#', 'xroof'),
                        'information_item_text' => esc_html__('Call Us Anytime', 'xroof'),
                    ],
                ],
                'title_field' => '{{{ information_item_link_text }}}',
            ]
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'contact_form_style',
            [
                'label' => __('Contact Form', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('contact_form', 'contact__title', 'Form Title');
        $this->add_section_heading('contact_input_spacing', 'Input');
        $this->add_control(
            'input_border_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact__form-input' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .contact__form-message' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_section_heading('input_spacing', 'Normal Input');
        $this->register_spacing_controls('input_spacing', 'contact__form-input');
        $this->add_section_heading('input_msg_spacing', 'Message Input');
        $this->register_spacing_controls('input_msg_spacing', 'contact__form-message');
        $this->register_text_style_controls('submit_button', 'contact__form-submit', 'Submit Button');
        $this->start_controls_tabs(
            'submit_btn_style_tabs'
        );
        $this->start_controls_tab(
            'submit_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'submit_bg_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact__form-submit' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'submit_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'submit_hover_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact__form-submit:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'submit_bg_hover_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact__form-submit:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'contact_form_information_style',
            [
                'label' => __('Contact Information', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('contact_form_info_title', 'contact__info-title', 'Information Title');
        $this->register_text_style_controls('contact_form_info_text', 'contact__info-text', 'Information Text');

        $this->add_section_heading('information_item', 'Icon');
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-card__icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-card__icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->register_text_style_controls('info_card__link', 'info-card__link', 'Link Text');
        $this->register_text_style_controls('info_card__text', 'info-card__text', 'Text');
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <section class="contact contact--style-1">
            <div class="contact__container container">
                <div class="row g-4">
                    <div class="col-12 col-xl-7">
                        <div class="contact__left mr-0 mr-x2l-5 mr-xxl-10">
                            <?php if (!empty($settings['contact_title'])): ?>
                                <h2 class="contact__title title-xl">
                                    <?php echo esc_html($settings['contact_title']); ?>
                                </h2>
                            <?php endif; ?>

                            <div class="contact__form-wrap mt-8 mt-xxl-12">
                                <?php if (!empty($settings['form_shortcode'])): ?>
                                    <?php echo do_shortcode($settings['form_shortcode']); ?>
                                <?php else: ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo esc_html__('Please configure the form shortcode in the widget settings to display the contact form here.', 'xroof'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-5">
                        <div class="contact__right">
                            <?php if (!empty($settings['information_title'])): ?>
                                <h3 class="contact__info-title">
                                    <?php echo esc_html($settings['information_title']); ?>
                                </h3>
                            <?php endif; ?>
                            <?php if (!empty($settings['information_desc'])): ?>
                                <p class="contact__info-text body-text mt-4 mb-10 mb-xl-15">
                                    <?php echo esc_html($settings['information_desc']); ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($settings['information_item_list'])): ?>
                                <div class="info-card__list d-flex flex-wrap ">
                                    <?php foreach ($settings['information_item_list'] as $key => $item): ?>
                                        <div class="info-card p-4 p-xxl-7">
                                            <?php if (!empty($item['information_icon']['url'])): ?>
                                                <div class="info-card__icon">
                                                    <?php echo $this->render_svg($item['information_icon']['url']) ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="info-card__content">
                                                <?php if ($item['information_item_link_text']): ?>
                                                    <a href="tel:<?php echo esc_url($item['information_item_link']['url']); ?>"
                                                        class="info-card__link"><?php echo esc_html($item['information_item_link_text']); ?></a>
                                                <?php endif; ?>
                                                <?php if (!empty($item['information_item_text'])): ?>
                                                    <p class="info-card__text body-text">
                                                        <?php echo esc_html($item['information_item_text']); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Contact_Widget_1());
