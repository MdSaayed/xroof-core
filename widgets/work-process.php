<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Work_Process_Widget extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-work-process';
    }

    public function get_title()
    {
        return esc_html__('Xroof Work Process', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-theme-builder';
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
            'work_process_content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'work_process_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Seamless Roofing Process from Start to Finish', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'work_process_desc',
            [
                'label' => esc_html__('Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Our experts will assess your needs, answer your
                                questions, and recommend the best solution for your home or business. No pressure, no hidden
                                fees — just honest advice and a fair quote you can trust.', 'xroof'),
                'placeholder' => esc_html__('Type your description here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'step-card-list-section',
            [
                'label' => esc_html__('Steps', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'step_card_number',
            [
                'label' => esc_html__('Card Number', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Enter Card Number', 'xroof'),
                'placeholder' => esc_html__('Enter your card number', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'step_card_title',
            [
                'label' => esc_html__('Card Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your title here', 'xroof'),
                'placeholder' => esc_html__('Enter your title here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'step_card_subtitle',
            [
                'label' => esc_html__('Card Subtitle', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Your card subtitle', 'xroof'),
                'placeholder' => esc_html__('Enter your subtitle here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'step_card_desc',
            [
                'label' => esc_html__('Card Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Your card description', 'xroof'),
                'placeholder' => esc_html__('Enter your description here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'step_card_link_text',
            [
                'label' => esc_html__('Card Link Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'xroof'),
                'placeholder' => esc_html__('Enter your link text here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'step_card_link',
            [
                'label' => esc_html__('Card Button Link', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('#', 'xroof'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'show_external' => true,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'step_card_list',
            [
                'label' => esc_html__('Step', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'step_card_number' => esc_html__('I.', 'xroof'),
                        'step_card_title' => esc_html__('Roof Inspection', 'xroof'),
                        'step_card_subtitle' => esc_html__('Achieve full-XRoof Strength', 'xroof'),
                        'step_card_desc' => esc_html__('We start with a  thorough inspection to identify issues, assess the current condition, and understand your needs.', 'xroof'),
                        'step_card_link' => esc_html__('#', 'xroof'),
                        'step_card_link_text' => esc_html__('Read More', 'xroof'),
                    ],
                    [
                        'step_card_number' => esc_html__('II.', 'xroof'),
                        'step_card_title' => esc_html__('Detailed Quote', 'xroof'),
                        'step_card_subtitle' => esc_html__('Achieve full-XRoof Strength', 'xroof'),
                        'step_card_desc' => esc_html__('We start with a thorough inspection to identify issues, assess the current condition, and understand your needs.', 'xroof'),
                        'step_card_link' => esc_html__('#', 'xroof'),
                        'step_card_link_text' => esc_html__('Read More', 'xroof'),
                    ],
                    [
                        'step_card_number' => esc_html__('III.', 'xroof'),
                        'step_card_title' => esc_html__('Material Selection', 'xroof'),
                        'step_card_subtitle' => esc_html__('Achieve full-XRoof Strength', 'xroof'),
                        'step_card_desc' => esc_html__('We start with a thorough inspection to identify issues, assess the current condition, and understand your needs.', 'xroof'),
                        'step_card_link' => esc_html__('#', 'xroof'),
                        'step_card_link_text' => esc_html__('Read More', 'xroof'),
                    ],
                    [
                        'step_card_number' => esc_html__('IV.', 'xroof'),
                        'step_card_title' => esc_html__('Ongoing Support', 'xroof'),
                        'step_card_subtitle' => esc_html__('Achieve full-XRoof Strength', 'xroof'),
                        'step_card_desc' => esc_html__('We start with a thorough inspection to identify issues, assess the current condition, and understand your needs.', 'xroof'),
                        'step_card_link' => esc_html__('#', 'xroof'),
                        'step_card_link_text' => esc_html__('Read More', 'xroof'),
                    ],
                ],
                'title_field' => '{{{ step_card_title }}}',
            ]
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'work_step_style_section',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('work_process_title', 'work-process__title', 'Title');
        $this->register_text_style_controls('work_process_desc', 'work-process__desc', 'Description');
        $this->end_controls_section();

        $this->start_controls_section(
            'work_step_card_style_section',
            [
                'label' => __('Steps', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_section_heading('step_card', 'Step Card');
        $this->add_control(
            'step_card_bg',
            [
                'label' => esc_html__('Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .step-card' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'step_card_hover_bg',
            [
                'label' => esc_html__('Background Hover', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .step-card:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .step-card',
            ]
        );
        $this->register_spacing_controls('step_card_spacing', 'step-card');

        $this->register_text_style_controls('step_card_number', 'step-card__number', 'Card Number');
        $this->register_text_style_controls('step_card_subtitle', 'step-card__subtitle', 'Card Subtitle');
        $this->register_text_style_controls('step_card_title', 'step-card__title', 'Card Title');
        $this->register_text_style_controls('step_card__desc', 'step-card__desc', 'Card Description');
        $this->add_section_heading('step_card_btn', 'Link Button');

        $this->register_text_style_controls('step_card_link_text', 'step-card__link', 'Link Text');
        $this->add_control(
            'step_link_bg',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .step-card__link' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->register_spacing_controls('step_link_spacing', 'step-card__link');
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .step-card__link',
            ]
        );
        $this->register_border_radius_control('step_link_border_radius', 'step-card__link');

        $this->register_text_style_controls('step_card_link_text_hover', 'step-card__link:hover', 'Link Text Hover');
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .step-card__link:hover',
            ]
        );
        $this->add_control(
            'step_link_hover_bg',
            [
                'label' => esc_html__('Background Color Hover', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .step-card__link:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .step-card__link',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'work_step_card_responsive_section',
            [
                'label' => __('Select Column', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'column_count',
            [
                'label' => esc_html__('Columns', 'xroof'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-md-6 col-xl-4 col-xxl-3',
                'options' => [
                    'col-12' => __('1 Column', 'xroof'),
                    'col-12 col-md-6' => __('2 Columns', 'xroof'),
                    'col-12 col-md-4' => __('3 Columns', 'xroof'),
                    'col-12 col-md-3' => __('4 Columns', 'xroof'),
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

        <section class="work-process work-process--style-1">
            <div class="work-process__container container">
                <?php if (!empty($settings['work_process_title'] || !empty($settings['work_process_desc']))): ?>
                    <div class="work-process__header d-flex flex-wrap justify-content-between gap-4">
                        <?php if ($settings['work_process_title']): ?>
                            <h2 class="work-process__title title-xl-white">
                                <?php echo esc_html($settings['work_process_title']); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($settings['work_process_desc']): ?>
                            <p class="work-process__desc body-text mb-0">
                                <?php echo esc_html($settings['work_process_desc']); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-10 mt-xl-15 mt-xxl-20">
                    <?php foreach ($settings['step_card_list'] as $item): ?>
                        <div class="<?php echo esc_attr($settings['column_count']); ?>">
                            <div class="step-card px-6">
                                <?php if (!empty($item['step_card_number'])): ?>
                                    <h4 class="step-card__number body-text"><?php echo esc_html($item['step_card_number']); ?> Step
                                    </h4>
                                <?php endif; ?>

                                <div class="step-card__content mt-8 mt-xxl-10">
                                    <?php if (!empty($item['step_card_title'])): ?>
                                        <h3 class="step-card__title"><?php echo esc_html($item['step_card_title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($item['step_card_subtitle'])): ?>
                                        <p class="step-card__subtitle body-text mb-0">
                                            <?php echo esc_html($item['step_card_subtitle']); ?>
                                        </p>
                                    <?php endif; ?>

                                    <div class="step-card__bottom">
                                        <hr class="step-card__divider">
                                        <?php if (!empty($item['step_card_desc'])): ?>
                                            <p class="step-card__desc body-text mt-6 mt-xl-8 mt-xxl-10 mb-5">
                                                <?php echo esc_html($item['step_card_desc']); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?Php if (!empty($item['step_card_link_text'])): ?>
                                            <a <?php echo xroof_get_link_attribute($item['step_card_link']); ?>
                                                class="step-card__link  mt-6 mt-xl-8 mt-xxl-10">
                                                <?php echo esc_html($item['step_card_link_text']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Work_Process_Widget());
