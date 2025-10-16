<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Xroof\Core\Traits\Xroof_Controls_Trait;

if (!defined('ABSPATH'))
    exit;

class Xroof_Contact_Card_Widget extends Widget_Base
{
    use Xroof_Controls_Trait;
    public function get_name()
    {
        return 'xroof-contact-card';
    }

    public function get_title()
    {
        return esc_html__('Xroof Contact Card', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-contact';
    }

    public function get_categories()
    {
        return ['xroof-widget-cat'];
    }

    public function get_keywords()
    {
        return ['contact', 'form', 'map', 'location'];
    }

    protected function register_controls()
    {
        $this->register_content_controls();
        $this->register_style_controls();
    }

    protected function register_content_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'xroof'),
            ]
        );

        $this->add_control(
            'contact_title',
            [
                'label' => esc_html__('Section Title', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Have questions? Contact with us today', 'xroof'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_desc',
            [
                'label' => esc_html__('Section Description', 'xroof'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('We’re here to help! Whether you have questions, need support, or want to learn more about Elevix, don’t hesitate to reach out.', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'contact_card_content',
            [
                'label' => esc_html__('Card', 'xroof'),
            ]
        );
        $repeater = new Repeater();
        $this->add_svg_control($repeater, 'card_icon', 'Card Icon', '/assets/svg/location-2.svg');
        $repeater->add_control(
            'card_title',
            [
                'label' => esc_html__('Card Title', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Call Now', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'card_text',
            [
                'label' => esc_html__('Card Description', 'xroof'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec', 'xroof'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'card_link_text',
            [
                'label' => esc_html__('Link Text', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('+555666699098', 'xroof'),
                'label_block' => true,
            ]

        );
        $repeater->add_control(
            'card_link',
            [
                'label' => esc_html__('Link', 'xroof'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'tel:+555666699098',
                    'is_external' => false,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_cards',
            [
                'label' => esc_html__('Contact Cards', 'xroof'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/call.svg'
                        ],
                        'card_title' => esc_html__('Call Now', 'xroof'),
                        'card_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec', 'xroof'),
                        'card_link_text' => esc_html__('+555 6666 99 098', 'xroof'),
                        'card_link' => ['url' => 'tel:+555 6666 99 098'],
                    ],
                    [
                        'card_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/mail.svg'
                        ],
                        'card_title' => esc_html__('Email Us', 'xroof'),
                        'card_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec', 'xroof'),
                        'card_link_text' => esc_html__('example@gmail.com', 'xroof'),
                        'card_link' => ['url' => 'mailto:example@gmail.com'],
                    ],
                    [
                        'card_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/location-2.svg'
                        ],
                        'card_title' => esc_html__('Emergency Roof Repair', 'xroof'),
                        'card_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec', 'xroof'),
                        'card_link_text' => esc_html__('678 Washington DC,USA', 'xroof'),
                        'card_link' => ['url' => '678 Washington DC,USA'],
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ]
        );
        $this->end_controls_section();
    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            'contact_style_section',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->register_text_style_controls('title', 'contact__title', 'Title');
        $this->register_text_style_controls('desc', 'contact__desc', 'Description');
        $this->end_controls_section();

        $this->start_controls_section(
            'contact_card_style_section',
            [
                'label' => __('Card', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_section_heading('icon_style','Icon');
		$this->add_control(
			'icon_bg',
			[
				'label' => esc_html__( 'Icon Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact__card-icon-wrap' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact__card-icon-wrap svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_border_color',
			[
				'label' => esc_html__( 'Icon border Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact__card-icon-wrap' => 'border-color: {{VALUE}}',
				],
			]
		);
        $this->register_text_style_controls('card-title', 'contact__card-title', 'Card Title');
        $this->register_text_style_controls('card-text', 'contact__card-text', 'Card Text');
        $this->register_text_style_controls('card-link', 'contact__card-link', 'Card Link');
        
        $this->add_section_heading('card_bg_color','Card Background');
        $this->add_control(
			'card_background',
			[
				'label' => esc_html__( 'Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact__card' => 'background: {{VALUE}}',
				],
			]
		);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <section class="contact contact--style-2">
            <div class="contact__container container">
                <?php if (!empty($settings['contact_title'])): ?>
                    <h2 class="contact__title title-xl">
                        <?php echo esc_html($settings['contact_title']); ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($settings['contact_desc'])): ?>
                    <p class="contact__desc body-text">
                        <?php echo esc_html($settings['contact_desc']); ?>
                    </p>
                <?php endif; ?>

                <div class="contact__info mt-10 mt-xl-15 mt-xxl-20">
                    <div class="row g-4">
                        <?php foreach ($settings['contact_cards'] as $card): ?>
                            <div class="col col-12 col-sm-6 col-xl-4">
                                <div class="contact__card">
                                    <?php if (!empty($card['card_icon']['url'])): ?>
                                        <div class="contact__card-icon-wrap">
                                            <?php echo $this->render_svg($card['card_icon']['url']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($card['card_title'])): ?>
                                        <h2 class="contact__card-title"><?php echo esc_html($card['card_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($card['card_text'])): ?>
                                        <p class="contact__card-text"><?php echo esc_html($card['card_text']); ?></p>
                                    <?php endif; ?>

                                    <?php
                                    $target = $card['card_link']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $card['card_link']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?>
                                    <a href="<?php echo esc_url($card['card_link']['url']); ?>"
                                        class="contact__card-link mt-4 mt-lg-8" <?php echo $target . $nofollow; ?>>
                                        <?php echo esc_html($card['card_link_text']); ?>
                                    </a>
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

$widgets_manager->register(new Xroof_Contact_Card_Widget());



