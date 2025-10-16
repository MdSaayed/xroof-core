<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Award_Widget extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-award';
    }

    public function get_title()
    {
        return esc_html__('Xroof Award ', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-upgrade-crown';
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
            'award_content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'award_subtitle',
            [
                'label' => esc_html__('Subtitle', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('//..Award Winning', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'award_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Award-Winning Flavors That Speak for Themselves', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'award_desc',
            [
                'label' => esc_html__('Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Our passion for culinary excellence has earned us prestigious awards and the love of food lovers  everywhere. Every dish is crafted with the
                                finest ingredient', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'award_button_text',
            [
                'label' => esc_html__('Button Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Award', 'xroof'),
                'placeholder' => esc_html__('Type your button here', 'xroof'),
            ]
        );
        $this->add_control(
            'award_button_link',
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
        $this->end_controls_section();

        $this->start_controls_section(
            'award_list_section',
            [
                'label' => esc_html__('Award List', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'award_item_title',
            [
                'label' => esc_html__('Award Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your Title', 'xroof'),
                'placeholder' => esc_html__('Enter Your Award Title', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'award_content_title',
            [
                'label' => esc_html__('Award Content Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your Content Title', 'xroof'),
                'placeholder' => esc_html__('Enter Your Award Content Title', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'award_item_badge',
            [
                'label' => esc_html__('Choose Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image with size 120 × 98px for best display.', 'xroof'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'award_item_year',
            [
                'label' => esc_html__('Award Year', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Award Year', 'xroof'),
                'placeholder' => esc_html__('Enter Your Award Year', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'award_item_text',
            [
                'label' => esc_html__('Award Content Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Award Content Text Here', 'xroof'),
                'placeholder' => esc_html__('Enter Your Content Text Here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'award_item_img',
            [
                'label' => esc_html__('Choose Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload an image with size 375 × 345px for best display.', 'xroof'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'award_list_item',
            [
                'label' => esc_html__('Repeater List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'award_item_title' => esc_html__('//.. 01. Best Local XRoof 2024', 'xroof'),
                        'award_content_title' => esc_html__('..// 05. Customer’s Choice for Outstanding Service', 'xroof'),
                        'award_item_badge' => [
                            'url' => get_template_directory_uri() . '/assets/img/award/badge.svg',
                        ],
                        'award_item_year' => esc_html__('//.. 2024 ..//', 'xroof'),
                        'award_item_text' => esc_html__('At XRoof, every guest is family — and our  commitment to warm, attentive service has made us a proud winner of the Customer’s Choice for Outstanding Service award. From the moment you walk through our doors to your last delicious', 'xroof'),
                        'award_item_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/award/award-1.png',
                        ],
                    ],
                    [
                        'award_item_title' => esc_html__('//.. 01. Best Local XRoof 2024', 'xroof'),
                        'award_content_title' => esc_html__('..// 05. Customer’s Choice for Outstanding Service', 'xroof'),
                        'award_item_badge' => [
                            'url' => get_template_directory_uri() . '/assets/img/award/badge.svg',
                        ],
                        'award_item_year' => esc_html__('//.. 2024 ..//', 'xroof'),
                        'award_item_text' => esc_html__('At XRoof, every guest is family — and our commitment to warm, attentive service has made us a proud winner of the Customer’s Choice for Outstanding Service award. From the moment you walk through our doors to your last delicious', 'xroof'),
                        'award_item_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/award/award-2.png',
                        ],
                    ],
                    [
                        'award_item_title' => esc_html__('//.. 01. Best Local XRoof 2024', 'xroof'),
                        'award_content_title' => esc_html__('..// 05. Customer’s Choice for Outstanding Service', 'xroof'),
                        'award_item_badge' => [
                            'url' => get_template_directory_uri() . '/assets/img/award/badge.svg',
                        ],
                        'award_item_year' => esc_html__('//.. 2024 ..//', 'xroof'),
                        'award_item_text' => esc_html__('At XRoof, every guest is family — and our commitment to warm, attentive service has made us a proud winner of the Customer’s Choice for Outstanding Service award. From the moment you walk through our doors to your last delicious', 'xroof'),
                        'award_item_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/award/award-3.png',
                        ],
                    ],
                    [
                        'award_item_title' => esc_html__('//.. 01. Best Local XRoof 2024', 'xroof'),
                        'award_content_title' => esc_html__('..// 05. Customer’s Choice for Outstanding Service', 'xroof'),
                        'award_item_badge' => [
                            'url' => get_template_directory_uri() . '/assets/img/award/badge.svg',
                        ],
                        'award_item_year' => esc_html__('//.. 2024 ..//', 'xroof'),
                        'award_item_text' => esc_html__('At XRoof, every guest is family — and our commitment to warm, attentive service has made us a proud winner of the Customer’s Choice for Outstanding Service award. From the moment you walk through our doors to your last delicious', 'xroof'),
                        'award_item_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/award/award-4.png',
                        ],
                    ],
                ],
                'title_field' => '{{{ award_item_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'award_content_style',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('award_subtitle', 'award__subtitle', 'Subtitle');
        $this->register_text_style_controls('award_title', 'award__title', 'Title');
        $this->register_text_style_controls('award_desc', 'award__desc', 'Description');
        $this->register_text_style_controls('award_btn_text', 'award__btn', 'Button');
        $this->start_controls_tabs(
            'award_style_tabs'
        );
        $this->start_controls_tab(
            'award_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xroof'),
            ]
        );
        $this->add_control(
            'award_btn_bg_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .award__btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'award_btn_border_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .award__btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'award_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'xroof'),
            ]
        );
        $this->add_control(
            'award_btn_hover_color',
            [
                'label' => esc_html__('Text Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .award__btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'award_btn_bg_hover_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .award__btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'award_btn_border_hover_color',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .award__btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->register_border_radius_control('award_btn_radius', 'award__btn');
        $this->end_controls_section();

        $this->start_controls_section(
            'award_list_style',
            [
                'label' => __('Award List', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('award_item_title', 'award__item-title', 'Award Title');
        $this->register_text_style_controls('award_content_title', 'award__item-heading', 'Award Content Title');
        $this->register_text_style_controls('award_year', 'award__item-year', 'Award Year');
        $this->register_text_style_controls('award_content_text', 'award__item-text', 'Award Content Text');
        $this->add_section_heading('award_icon', 'Arrow Icon');
        $this->add_control(
            'award_icon_bg_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .award__item-arrow' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'award_icon_color',
            [
                'label' => esc_html__('Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .award__item-arrow svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $total_items = count($settings['award_list_item']);

        ?>

        <section class="award award--style-1">
            <div class="award__container container">
                <div class="award__header d-flex justify-content-between flex-wrap gap-4">
                    <div class="award__header-left">
                        <?php if (!empty($settings['award_subtitle'])): ?>
                            <p class="award__subtitle subtitle-white">
                                <?php echo esc_html($settings['award_subtitle']); ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($settings['award_title'])): ?>
                            <h2 class="award__title title-xl-white">
                                <?php echo esc_html($settings['award_title']); ?>
                            </h2>
                        <?php endif; ?>
                    </div>

                    <div class="award__header-right">
                        <?php if (!empty($settings['award_desc'])): ?>
                            <p class="award__desc body-text mb-6">
                                <?php echo esc_html($settings['award_desc']); ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($settings['award_button_text'])): ?>
                            <a <?php echo xroof_get_link_attribute($settings['award_button_link']); ?>
                                class="award__btn btn btn-primary">
                                <?php echo esc_html($settings['award_button_text']) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="award__list mt-10 mt-xl-15 mt-xxl-20">
                    <?php foreach ($settings['award_list_item'] as $key => $item):
                        $active_class = ($key === $total_items - 1) ? 'award__item--active' : '';
                        ?>
                        <div class="award__item <?php echo esc_attr($active_class); ?>">
                            <div class="award__item-header">
                                <div class="award__item-arrow">
                                    <svg width="21" height="12.92" viewBox="0 0 13 8" fill="none">
                                        <path
                                            d="M0.487755 3.81637C0.292493 4.01163 0.292493 4.32821 0.487755 4.52348L3.66974 7.70546C3.865 7.90072 4.18158 7.90072 4.37684 7.70546C4.5721 7.51019 4.5721 7.19361 4.37684 6.99835L1.54842 4.16992L4.37684 1.34149C4.5721 1.14623 4.5721 0.82965 4.37684 0.634388C4.18158 0.439126 3.865 0.439126 3.66974 0.634388L0.487755 3.81637ZM11.6911 4.66992C11.9672 4.66992 12.1911 4.44606 12.1911 4.16992C12.1911 3.89378 11.9672 3.66992 11.6911 3.66992V4.16992V4.66992ZM0.841309 4.16992V4.66992H11.6911V4.16992V3.66992H0.841309V4.16992Z"
                                            fill="#0A1514" />
                                    </svg>
                                </div>
                                <?php if ($item['award_item_title']): ?>
                                    <span class="award__item-title mb-0">
                                        <?php echo esc_html($item['award_item_title']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="award__item-body">
                                <div
                                    class="award__item-body-top d-flex justify-content-between gap-4 pb-6 pb-12 pb-xl-10 pb-xxl-20">
                                    <?php if (!empty($item['award_content_title'])): ?>
                                        <h3 class="award__item-heading">
                                            <?php echo esc_html($item['award_content_title']); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <div class="award__item-arrow award__item-arrow-content">
                                        <svg width="21" height="12.92" viewBox="0 0 13 8" fill="none">
                                            <path
                                                d="M0.487755 3.81637C0.292493 4.01163 0.292493 4.32821 0.487755 4.52348L3.66974 7.70546C3.865 7.90072 4.18158 7.90072 4.37684 7.70546C4.5721 7.51019 4.5721 7.19361 4.37684 6.99835L1.54842 4.16992L4.37684 1.34149C4.5721 1.14623 4.5721 0.82965 4.37684 0.634388C4.18158 0.439126 3.865 0.439126 3.66974 0.634388L0.487755 3.81637ZM11.6911 4.66992C11.9672 4.66992 12.1911 4.44606 12.1911 4.16992C12.1911 3.89378 11.9672 3.66992 11.6911 3.66992V4.16992V4.66992ZM0.841309 4.16992V4.66992H11.6911V4.16992V3.66992H0.841309V4.16992Z"
                                                fill="#0A1514" />
                                        </svg>
                                    </div>
                                </div>

                                <div
                                    class="award__item-content d-flex flex-column flex-xxl-row justify-content-between align-items-center gap-5">
                                    <div class="award__item-text">
                                        <?php if (!empty($item['award_item_badge']['url'])): ?>
                                            <div class="award__item-badge d-flex align-items-center flex-wrap gap-3 gap-xxl-4 ">
                                                <?php if (!empty($item['award_item_badge']['url'])): ?>
                                                    <img src="<?php echo esc_url($item['award_item_badge']['url']); ?>" alt="Badge"
                                                        class="award__item-badge-img">
                                                <?php endif; ?>
                                                <?php if (!empty($item['award_item_year'])): ?>
                                                    <p class="award__item-year"><?php echo esc_html($item['award_item_year']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($item['award_item_text'])): ?>
                                            <p class="award__item-text body-text mt-6 mt-xxl-8">
                                                <?php echo esc_html($item['award_item_text']); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($item['award_item_img']['url'])): ?>
                                        <div class="award__item-img">
                                            <img src="<?php echo esc_url($item['award_item_img']['url']); ?>"
                                                alt="<?php echo esc_html($item['award_content_title']); ?>" class="award__item-img-el">
                                        </div>
                                    <?php endif; ?>
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

$widgets_manager->register(new Xroof_Award_Widget());
