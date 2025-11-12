<?php
use Xroof\Core\Traits\Xroof_Controls_Trait;
class Xroof_Why_Choose_Us_Widget extends \Elementor\Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof_why_choose_us';
    }

    public function get_title()
    {
        return esc_html__('Xroof Why Choose Us', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-info-box';
    }

    public function get_categories()
    {
        return ['xroof-category'];
    }

    protected function register_controls()
    {
        $this->register_controls_section();
        $this->register_style_section();
    }

    protected function register_controls_section()
    {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->register_subtitle_content_controls('why-choose-us__subtitle');
        $this->add_universal_input_control('why-choose-us-title', 'Title', 'text', [
            'default' => esc_html__('Why You Should Choose Us', 'xroof'),
        ]);
        $this->add_universal_input_control('why-choose-us-desc', 'Description', 'textarea', [
            'default' => esc_html__('We stand out by providing reliable, professional, and high-quality roofing services. Our experienced team ensures every project is completed efficiently, safely, and with lasting results for your home or business.'),
        ]);
        $this->register_button_content_controls('why-choose-us-btn', 'why-choose-us__btn', 'Button');
        $this->end_controls_section();

        // Cards Section
        $this->start_controls_section(
            'cards_section',
            [
                'label' => esc_html__('Why Choose Us List', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater for Cards
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_icon',
            [
                'label' => esc_html__('Card Icon (SVG or Image)', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'png', 'jpg', 'jpeg'],
                'default' => [
                    'url' => '',
                ],
                'description' => esc_html__('Upload an SVG or image for the card icon.', 'xroof'),
            ]
        );

        $repeater->add_control(
            'card_title',
            [
                'label' => esc_html__('Card Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Card Title', 'xroof'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'card_description',
            [
                'label' => esc_html__('Card Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Card description goes here.', 'xroof'),
            ]
        );

        $this->add_control(
            'why_choose_us_cards',
            [
                'label' => esc_html__('Why Choose Us List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_title' => esc_html__('Fast & Reliable Service', 'xroof'),
                        'card_description' => esc_html__('We provide fast and reliable roofing solutions, ensuring each project is completed efficiently with lasting protection.', 'xroof'),
                    ],
                    [
                        'card_title' => esc_html__('Fully Licensed & Insured', 'xroof'),
                        'card_description' => esc_html__('Our team is fully licensed and insured, providing safe, professional, and dependable roofing services for every project.', 'xroof'),
                    ],
                    [
                        'card_title' => esc_html__('Top-Quality Materials', 'xroof'),
                        'card_description' => esc_html__('We use top-quality materials to ensure durable, long-lasting, and reliable roofing for every home or business project.', 'xroof'),
                    ],
                    [
                        'card_title' => esc_html__('24/7 Premium Support', 'xroof'),
                        'card_description' => esc_html__('We provide 24/7 premium support, ensuring fast, reliable assistance for all your roofing needs anytime, day or night.', 'xroof'),
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ]
        );

        $this->add_control(
            'mobile_columns',
            [
                'label' => esc_html__('Columns on Mobile', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ]
        );

        $this->add_control(
            'tablet_columns',
            [
                'label' => esc_html__('Columns on Tablet', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ]
        );

        $this->end_controls_section();

        // Award Section
        $this->start_controls_section(
            'award_section',
            [
                'label' => esc_html__('Award Winning', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'award_icon',
            [
                'label' => esc_html__('Award Icon (SVG or Image)', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'png', 'jpg', 'jpeg'],
                'default' => [
                    'url' => '',
                ],
                'description' => esc_html__('Upload an SVG or image for the award icon.', 'xroof'),
            ]
        );

        $this->add_universal_input_control('award-title', 'Award Title', 'text', [
            'default' => esc_html__('Award Winning', 'xroof'),
        ]);
        $this->add_universal_input_control('award-text', 'Award Text', 'textarea', [
            'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'xroof'),
        ]);

        $this->end_controls_section();
    }

    protected function register_style_section()
    {
        // Top Content Style Section
        $this->start_controls_section(
            'top_content_style_section',
            [
                'label' => esc_html__('Top Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_background_controls('why-choose-us-bg', 'why-choose-us--style-1', 'Background', [
            'image' => [
                'id' => 0,
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ]
        ]);

        $this->register_subtitle_style_controls('why-choose-us-subtitle', 'why-choose-us__subtitle');
        $this->register_text_style_controls('why-choose-us-title', 'why-choose-us__title', 'Tittle');
        $this->register_text_style_controls('why-choose-us-desc', 'why-choose-us__desc', 'Description');
        $this->end_controls_section();

        // Content Background Shape Section
        $this->start_controls_section(
            'content_bg_shape_section',
            [
                'label' => esc_html__('Content Bg Shape', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_background_controls('shape-background', 'why-choose-us__shape', 'Background', [
            'image' => [
                'id' => 0,
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ]
        ]);
        $this->end_controls_section();

        // Button Style Section
        $this->start_controls_section(
            'button-style-section',
            [
                'label' => esc_html__('Button', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->register_button_style_controls('why-choose-us-btn', '.why-choose-us__btn', 'Button');
        $this->end_controls_section();

        // Card Style Section
        $this->start_controls_section(
            'card_style_section',
            [
                'label' => esc_html__('Card', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->register_text_style_controls('card-title', '.why-choose-us__card-title', 'Card Title');
        $this->register_text_style_controls('card-desc', '.why-choose-us__card-description', 'Card Description');

        $this->start_controls_tabs('card_icon_tabs');



        $this->add_control(
            'card-icon-fill-color',
            [
                'label' => esc_html__('Card Icon Fill Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__card-icon-wrap svg path, {{WRAPPER}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'card-icon-width',
            [
                'label' => esc_html__('Card Icon Width', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__card-icon-wrap svg, {{WRAPPER}} .why-choose-us__card-icon-wrap img, {{WRAPPER}} .why-choose-us__award-icon-wrap svg, {{WRAPPER}} .why-choose-us__award-icon-wrap img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_icon_height',
            [
                'label' => esc_html__('Card Icon Height', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__card-icon-wrap svg, {{WRAPPER}} .why-choose-us__card-icon-wrap img, {{WRAPPER}} .why-choose-us__award-icon-wrap svg, {{WRAPPER}} .why-choose-us__award-icon-wrap img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'award_style_section',
            [
                'label' => esc_html__('Award', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'award-icon-fill-color',
            [
                'label' => esc_html__('Award Icon', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__award-icon-wrap svg path' => 'fill: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'award-icon-width',
            [
                'label' => esc_html__('Award Icon Width', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 29,
                ],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__award-icon-wrap svg, {{WRAPPER}} .why-choose-us__award-icon-wrap img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'award-icon-height',
            [
                'label' => esc_html__('Award Icon Height', 'xroof'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 28,
                ],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__award-icon-wrap svg, {{WRAPPER}} .why-choose-us__award-icon-wrap img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $mobile_col = 12 / max(1, (int) $settings['mobile_columns']);
        $tablet_col = 12 / max(1, (int) $settings['tablet_columns']);
        $col_class = "col col-{$mobile_col} col-sm-{$tablet_col}";

        $default_card_icons = [
            '<svg width="29" height="28" viewBox="0 0 29 28" fill="none"><path d="M25.1989 0.000976562C20.5395 0.000976562 14.2922 3.19632 10.0954 8.68988H6.6155C4.10224 8.68988 2.66205 10.5667 1.66934 12.5499L0.337769 15.2066H6.6155L9.87384 18.4649L13.1322 21.7232V27.9988L15.7888 26.6694C17.7721 25.6789 19.6489 24.2365 19.6489 21.7232V18.2433C25.1424 14.0466 28.3378 7.7971 28.3378 3.13984V0.000976562H25.1989ZM19.6489 6.51766C20.225 6.51766 20.7775 6.74652 21.1849 7.15389C21.5922 7.56126 21.8211 8.11377 21.8211 8.68988C21.8211 9.26599 21.5922 9.81851 21.1849 10.2259C20.7775 10.6332 20.225 10.8621 19.6489 10.8621C19.0728 10.8621 18.5202 10.6332 18.1129 10.2259C17.7055 9.81851 17.4766 9.26599 17.4766 8.68988C17.4766 8.11377 17.7055 7.56126 18.1129 7.15389C18.5202 6.74652 19.0728 6.51766 19.6489 6.51766ZM5.52939 19.551L4.44328 20.6371C2.87493 22.2055 2.27105 26.0677 2.27105 26.0677C2.27105 26.0677 5.95949 25.6376 7.70162 23.8955L8.78773 22.8094L5.52939 19.551Z" fill="#EE212B"/></svg>',
            '<svg width="23" height="28" viewBox="0 0 23 28" fill="none"><path d="M18.0124 12.2495C15.3591 12.2495 13.2001 14.4085 13.2001 17.0619C13.2001 19.7152 15.3591 21.8742 18.0124 21.8742C20.6658 21.8742 22.8247 19.7152 22.8247 17.0619C22.8247 14.4085 20.6658 12.2495 18.0124 12.2495ZM20.0527 16.2897C18.6538 18.3884 19.0505 17.7934 18.3028 18.9146C18.0342 19.3174 17.4905 19.4243 17.0893 19.1569L15.7769 18.2819C15.3749 18.0139 15.2667 17.4709 15.5346 17.0684C15.8026 16.6665 16.3456 16.5582 16.7481 16.8262L17.3321 17.2155C18.7276 15.1227 18.6526 15.1806 18.8874 15.0467C19.6843 14.5857 20.5649 15.5205 20.0527 16.2897ZM14.0751 22.3084V27.124C14.0751 27.7944 14.8012 28.2169 14.3842 27.8836L18.0124 26.3819L20.6406 27.8836C21.2213 28.2164 21.9498 27.7962 21.9498 27.124V22.3084C19.6186 24.0623 16.4095 24.0648 14.0751 22.3084ZM19.7623 10.7369V1.90032C19.7623 0.852546 18.9098 0 17.862 0H2.41338C1.36561 0 0.513062 0.852546 0.513062 1.90032V22.1613C0.513062 23.2091 1.36561 24.0616 2.41338 24.0616H12.3251C12.3251 20.2963 12.3193 20.5294 12.3388 20.3561C9.40973 15.3345 14.0738 9.15719 19.7623 10.7369ZM5.76287 4.37484H13.2001C13.6835 4.37484 14.0751 4.76639 14.0751 5.2498C14.0751 5.73322 13.6835 6.12477 13.2001 6.12477H5.76287C5.27945 6.12477 4.8879 5.73322 4.8879 5.2498C4.8879 4.76639 5.27945 4.37484 5.76287 4.37484ZM10.1377 13.1245H5.76287C5.27945 13.1245 4.8879 12.733 4.8879 12.2495C4.8879 11.7661 5.27945 11.3746 5.76287 11.3746H10.1377C10.6211 11.3746 11.0127 11.7661 11.0127 12.2495C11.0127 12.733 10.6211 13.1245 10.1377 13.1245ZM5.76287 9.62464C5.27945 9.62464 4.8879 9.23309 4.8879 8.74967C4.8879 8.26626 5.27945 7.87471 5.76287 7.87471H13.2001C13.6835 7.87471 14.0751 8.26626 14.0751 8.74967C14.0751 9.23309 13.6835 9.62464 13.2001 9.62464H5.76287Z" fill="#EE212B"/></svg>',
            '<svg width="17" height="31" viewBox="0 0 17 31" fill="none"><path d="M15.6922 30.565C15.6461 30.565 15.577 30.565 15.5309 30.5419L8.33777 27.7753L1.14469 30.5419C0.914137 30.6341 0.637481 30.5189 0.545262 30.2883C0.453043 30.0578 0.568316 29.7811 0.798864 29.6889L8.15333 26.8532C8.2686 26.807 8.38388 26.807 8.4761 26.8532L15.8306 29.6889C16.0611 29.7811 16.1764 30.0578 16.0842 30.2883C16.0611 30.4497 15.8767 30.565 15.6922 30.565ZM3.12739 11.8676C2.87379 11.8676 2.6663 12.0751 2.6663 12.3287V15.1644C2.6663 15.418 2.87379 15.6255 3.12739 15.6255C3.381 15.6255 3.58849 15.418 3.58849 15.1644V12.3287C3.58849 12.0751 3.381 11.8676 3.12739 11.8676ZM6.60866 11.8676C6.35506 11.8676 6.14757 12.0751 6.14757 12.3287V15.1644C6.14757 15.418 6.35506 15.6255 6.60866 15.6255C6.86227 15.6255 7.06976 15.418 7.06976 15.1644V12.3287C7.06976 12.0751 6.86227 11.8676 6.60866 11.8676ZM10.0669 11.8676C9.81327 11.8676 9.60578 12.0751 9.60578 12.3287V15.1644C9.60578 15.418 9.81327 15.6255 10.0669 15.6255C10.3205 15.6255 10.528 15.418 10.528 15.1644V12.3287C10.528 12.0751 10.3205 11.8676 10.0669 11.8676ZM13.5481 11.8906C13.2945 11.8906 13.087 12.0981 13.087 12.3517V15.1874C13.087 15.441 13.2945 15.6485 13.5481 15.6485C13.8017 15.6485 14.0092 15.441 14.0092 15.1874V12.3517C14.0092 12.0751 13.8017 11.8906 13.5481 11.8906ZM3.12739 17.3085C2.87379 17.3085 2.6663 17.516 2.6663 17.7696V24.5477C2.6663 24.8013 2.87379 25.0088 3.12739 25.0088C3.381 25.0088 3.58849 24.8013 3.58849 24.5477V17.7696C3.58849 17.516 3.381 17.3085 3.12739 17.3085ZM6.60866 17.3085C6.35506 17.3085 6.14757 17.516 6.14757 17.7696V24.5477C6.14757 24.8013 6.35506 25.0088 6.60866 25.0088C6.86227 25.0088 7.06976 24.8013 7.06976 24.5477V17.7696C7.06976 17.516 6.86227 17.3085 6.60866 17.3085ZM10.0669 17.3085C9.81327 17.3085 9.60578 17.516 9.60578 17.7696V24.5477C9.60578 24.8013 9.81327 25.0088 10.0669 25.0088C10.3205 25.0088 10.528 24.8013 10.528 24.5477V17.7696C10.528 17.516 10.3205 17.3085 10.0669 17.3085ZM13.5481 17.3085C13.2945 17.3085 13.087 17.516 13.087 17.7696V24.5477C13.087 24.8013 13.2945 25.0088 13.5481 25.0088C13.8017 25.0088 14.0092 24.8013 14.0092 24.5477V17.7696C14.0092 17.516 13.8017 17.3085 13.5481 17.3085ZM16.3378 6.72635C16.3378 8.70906 14.7239 10.3459 12.7182 10.3459H3.95737C1.97466 10.3459 0.337769 8.73211 0.337769 6.72635C0.337769 4.72058 1.9516 3.10675 3.95737 3.10675H4.11875C4.94872 1.6543 6.5395 0.639893 8.33777 0.639893C10.136 0.639893 11.7268 1.63125 12.5568 3.10675H12.7182C14.7009 3.10675 16.3378 4.72058 16.3378 6.72635Z" fill="#EE212B"/></svg>',
            '<svg width="29" height="28" viewBox="0 0 29 28" fill="none"><path d="M27.7939 11.8125V16.1875C27.7939 17.3941 26.813 18.375 25.6064 18.375H25.0114C24.174 23.3328 19.862 27.125 14.6689 27.125C14.4368 27.125 14.2143 27.0328 14.0502 26.8687C13.8861 26.7046 13.7939 26.4821 13.7939 26.25C13.7939 26.0179 13.8861 25.7954 14.0502 25.6313C14.2143 25.4672 14.4368 25.375 14.6689 25.375C19.4936 25.375 23.4189 21.4497 23.4189 16.625V11.375C23.4189 6.55025 19.4936 2.625 14.6689 2.625C9.84413 2.625 5.91888 6.55025 5.91888 11.375V17.5C5.91888 17.7321 5.8267 17.9546 5.6626 18.1187C5.49851 18.2828 5.27595 18.375 5.04388 18.375H3.73138C3.15137 18.3745 2.59524 18.1439 2.1851 17.7338C1.77496 17.3236 1.54435 16.7675 1.54388 16.1875V11.8125C1.54388 10.6059 2.52476 9.625 3.73138 9.625H4.32638C5.16463 4.66725 9.47663 0.875 14.6689 0.875C19.8611 0.875 24.174 4.66725 25.0114 9.625H25.6064C26.813 9.625 27.7939 10.6059 27.7939 11.8125ZM14.6689 4.375C10.8093 4.375 7.66888 7.51538 7.66888 11.375V15.75C7.66888 19.6096 10.8093 22.75 14.6689 22.75C18.5285 22.75 21.6689 19.6096 21.6689 15.75V11.375C21.6689 7.51538 18.5285 4.375 14.6689 4.375Z" fill="#EE212B"/></svg>',
        ];

        ?>

        <section class="why-choose-us why-choose-us--style-1">
            <div class="why-choose-us__container container">
                <div class="row flex-items-center g-5 g-xxl-1">
                    <div class="col col-12 col-xxl-5 mb-5 mb-xxl-0">
                        <div class="why-choose-us__left position-relative">
                            <?php $this->render_subtitle('why-choose-subtile', 'why-choose-us__subtitle'); ?>
                            <?php if (!empty($settings['why-choose-us-title'])): ?>
                                <h2 class="why-choose-us__title title-xl"><?php echo esc_html($settings['why-choose-us-title']); ?>
                                </h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['why-choose-us-desc'])): ?>
                                <p class="why-choose-us__desc mt-4"><?php echo esc_html($settings['why-choose-us-desc']); ?></p>
                            <?php endif; ?>
                            <?php $this->render_button('why-choose-us-btn', 'why-choose-us__btn'); ?>
                            <div class="why-choose-us__shape"></div>
                        </div>
                    </div>

                    <div class="col col-12 col-xxl-6 offset-xxl-1">
                        <div class="why-choose-us__cards row g-4 position-relative">
                            <?php foreach ($settings['why_choose_us_cards'] as $index => $card): ?>
                                <?php if (!empty($card['card_title']) || !empty($card['card_description'])): ?>
                                    <div class="<?php echo esc_attr($col_class); ?>">
                                        <div class="why-choose-us__card">
                                            <div class="why-choose-us__card-header">
                                                <div class="why-choose-us__card-icon-wrap">
                                                    <?php
                                                    if (!empty($card['card_icon']['url'])) {
                                                        $icon_url = $card['card_icon']['url'];
                                                        if (pathinfo($icon_url, PATHINFO_EXTENSION) === 'svg') {
                                                            $svg_content = wp_remote_get($icon_url);
                                                            if (!is_wp_error($svg_content) && !empty($svg_content['body'])) {
                                                                echo xroof_kses($svg_content['body']);
                                                            }
                                                        } else {
                                                            echo '<img src="' . esc_url($icon_url) . '" alt="' . esc_attr($card['card_title']) . '" style="width: inherit; height: inherit;">';
                                                        }
                                                    } else {
                                                        echo xroof_kses($default_card_icons[$index % count($default_card_icons)]);
                                                    }
                                                    ?>
                                                </div>

                                                <?php if (!empty($card['card_title'])): ?>
                                                    <h3 class="why-choose-us__card-title"><?php echo esc_html($card['card_title']); ?></h3>
                                                <?php endif; ?>
                                            </div>

                                            <?php if (!empty($card['card_description'])): ?>
                                                <p class="why-choose-us__card-description">
                                                    <?php echo esc_html($card['card_description']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if (!empty($settings['award-title']) || !empty($settings['award-text'])): ?>
                                <div class="why-choose-us__award-area">
                                    <div class="why-choose-us__award">
                                        <?php if (!empty($settings['award_icon']['url'])): ?>
                                            <div class="why-choose-us__award-icon-wrap">
                                                <?php
                                                $award_icon_url = $settings['award_icon']['url'];
                                                if (pathinfo($award_icon_url, PATHINFO_EXTENSION) === 'svg') {
                                                    $svg_content = wp_remote_get($award_icon_url);
                                                    if (!is_wp_error($svg_content) && !empty($svg_content['body'])) {
                                                        echo wp_kses($svg_content['body'], ['svg' => ['width' => [], 'height' => [], 'viewBox' => [], 'fill' => [], 'xmlns' => []], 'path' => ['d' => [], 'fill' => [], 'fill-rule' => [], 'clip-rule' => []]]);
                                                    }
                                                } else {
                                                    echo '<img src="' . esc_url($award_icon_url) . '" alt="' . esc_attr($settings['award-title']) . '" style="width: inherit; height: inherit;">';
                                                }
                                                ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="why-choose-us__award-icon-wrap">
                                                <svg width="22" height="30" viewBox="0 0 22 30" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.6426 29.3435L11.9097 22.8762C12.5087 22.7232 13.0594 22.4212 13.5103 21.9983C13.7136 21.8078 13.9382 21.7477 14.2094 21.811C16.0859 22.2487 17.9846 21.1581 18.5523 19.3173L20.7299 27.4445L16.65 26.3925L13.6426 29.3435V29.3435ZM9.5006 1.5437C8.93619 2.07245 8.20787 2.26764 7.45465 2.09191C6.32973 1.82952 5.19286 2.48585 4.85765 3.59131C4.63323 4.3314 4.09999 4.86464 3.3599 5.08906C2.2545 5.42426 1.59811 6.56113 1.8605 7.68605C2.03618 8.43922 1.84104 9.16759 1.3123 9.73201C0.522285 10.5753 0.522285 11.8874 1.3123 12.7308C1.84104 13.2952 2.03618 14.0236 1.8605 14.7768C1.59811 15.9017 2.2545 17.0386 3.3599 17.3738C4.09999 17.5982 4.63323 18.1314 4.85765 18.8715C5.19286 19.977 6.32973 20.6333 7.45465 20.3709C8.20781 20.1952 8.93619 20.3904 9.5006 20.9191C10.3439 21.7091 11.656 21.7092 12.4994 20.9191C13.0638 20.3904 13.7922 20.1952 14.5454 20.3709C15.6703 20.6333 16.8071 19.9769 17.1424 18.8715C17.3668 18.1314 17.9 17.5982 18.6401 17.3738C19.7455 17.0386 20.4019 15.9017 20.1395 14.7768C19.9638 14.0236 20.159 13.2952 20.6877 12.7308C21.4777 11.8875 21.4778 10.5754 20.6877 9.73201C20.159 9.16759 19.9638 8.43922 20.1395 7.68605C20.402 6.56113 19.7455 5.42426 18.6401 5.08906C17.9 4.86464 17.3668 4.3314 17.1424 3.59131C16.8071 2.48585 15.6703 1.82952 14.5454 2.09191C13.7922 2.26759 13.0638 2.07245 12.4994 1.5437C11.656 0.753632 10.344 0.753691 9.5006 1.5437ZM11 5.69014L12.6314 9.57094L16.8264 9.92324L13.6396 12.674L14.6009 16.7726L11 14.5918L7.39911 16.7726L8.36036 12.674L5.17363 9.92324L9.36864 9.57094L11 5.69014ZM8.3574 29.3435L5.35002 26.3925L1.27006 27.4445L3.44774 19.3172C4.01535 21.158 5.9142 22.2486 7.79062 21.8109C8.06183 21.7476 8.28642 21.8078 8.48966 21.9982C8.94061 22.4212 9.49125 22.7232 10.0903 22.8761L8.3574 29.3434V29.3435Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($settings['award-title'])): ?>
                                            <h2 class="why-choose-us__award-title"><?php echo esc_html($settings['award-title']); ?>
                                            </h2>
                                        <?php endif; ?>

                                        <?php if (!empty($settings['award-text'])): ?>
                                            <h2 class="why-choose-us__award-text"><?php echo esc_html($settings['award-text']); ?></h2>
                                        <?php endif; ?>
                                    </div>
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

$widgets_manager->register(new Xroof_Why_Choose_Us_Widget());
