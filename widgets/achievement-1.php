<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Achievement_Widget_1 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-achievement-1';
    }

    public function get_title()
    {
        return esc_html__('Xroof Achievement 1', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-price-list';
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
            'achievement-image-section',
            [
                'label' => esc_html__('Images', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'achievement-main-img',
            [
                'label' => esc_html__('Main Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'achievement-video-thumbnail-section',
            [
                'label' => esc_html__('Video Thumbnail', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'achievement-video-img',
            [
                'label' => esc_html__('Video Thumbnail', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'achievement-video-icon',
            [
                'label' => esc_html__('Subtitle Icon', 'text-domain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => '',
                    'library' => 'fa-solid',
                ],
                'fa4compatibility' => 'full',
            ]
        );
        $this->add_control(
            'achievement-video-link',
            [
                'label' => esc_html__('Video Link', 'xroof'),
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
            'achievement-phone',
            [
                'label' => esc_html__('Phone Number', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '+(234) 567-8912',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'achievement-content-section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->register_subtitle_content_controls('achievement__subtitle');
        $this->add_universal_input_control('achievement-title', 'Title', 'text', [
            'default' => esc_html__('Building Trust, One Roof at a Time', 'xroof'),
            'placeholder' => esc_html__('Type your title here', 'xroof'),
        ]);
        $this->add_universal_input_control(
            'achievement-desc',
            'Description',
            'textarea',
            [
                'default' => esc_html__(
                    'At Xroof, roofing is more than a service—it’s a promise. What began as a small, local team with big dreams has grown into a trusted name known for reliability, quality, and care.',
                    'xroof'
                ),
                'placeholder' => esc_html__('Type your description here', 'xroof'),
            ]
        );
        $this->register_button_content_controls('achievement-btn', 'achievement__btn');
        $this->end_controls_section();

        $this->start_controls_section(
            'achievement-stats-section',
            [
                'label' => esc_html__('Stats', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'stat_number',
            [
                'label' => esc_html__('Stat Number', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 850,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'stat_text',
            [
                'label' => esc_html__('Stat Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Roofs Completed',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'achievement-stats',
            [
                'label' => esc_html__('Stats List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'stat_number' => 850,
                        'stat_text' => 'Roofs Completed',
                    ],
                    [
                        'stat_number' => 600,
                        'stat_text' => '5-Star Reviews',
                    ],
                    [
                        'stat_number' => 350,
                        'stat_text' => 'Happy Customers',
                    ],
                ],
                'title_field' => '{{{ stat_number }}} - {{{ stat_text }}}',
            ]
        );

        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'achievement-content-style',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_subtitle_style_controls('achievement-subtitle', 'achievement__subtitle');
        $this->register_text_style_controls('achievement-title', 'achievement__title', 'Title');
        $this->register_text_style_controls('achievement-desc', 'achievement__desc', 'Description');
        $this->add_control(
            'achievement-btn-style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('Button', 'xroof')),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'achievement-btn-divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->register_button_style_controls('achievement-btn', 'achievement__btn');
        $this->end_controls_section();

        $this->start_controls_section(
            'achievement-stats-style',
            [
                'label' => __('Stas', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_spacing_controls('achievement-spacing', 'achievement__stats');
        $this->register_text_style_controls('stat-number', 'achievement__stat-number', 'Number');
        $this->register_text_style_controls('stat-text', 'achievement__stat-text', 'Text');
        $this->end_controls_section();

        $this->start_controls_section(
            'achievement-bg-image-style',
            [
                'label' => __('Background Image', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'achievement-bg-image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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

        <section class="achievement achievement--style-1"
            data-bg-img="<?php echo $settings['achievement-bg-image']['url'] ?>">
            <div class="achievement__container container">
                <div class="row g-5 align-items-center">
                    <div class="col col-12 col-x2l-6">
                        <div class="achievement__left position-relative">
                            <?php if (!empty($settings['achievement-main-img']['url'])): ?>
                                <div class="achievement__img-wrap pb-10">
                                    <img src="<?php echo esc_url($settings['achievement-main-img']['url']); ?>"
                                        alt="Achievement Image" class="achievement__img">
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['achievement-phone']['url'])): ?>
                                <a href="tel:<?php echo esc_html($settings['achievement-phone']['url']); ?>"
                                    class="achievement__phn-number">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none">
                                        <path
                                            d="M19.4755 15.601L16.6786 12.804C15.6797 11.8051 13.9816 12.2047 13.582 13.5033C13.2823 14.4023 12.2834 14.9018 11.3844 14.7019C9.38661 14.2025 6.68957 11.6053 6.19012 9.50764C5.89045 8.60859 6.48979 7.60968 7.3888 7.31005C8.68738 6.91049 9.08694 5.21235 8.08804 4.21345L5.2911 1.41651C4.49198 0.717282 3.29329 0.717282 2.59406 1.41651L0.696143 3.31443C-1.20177 5.31224 0.895924 10.6064 5.59077 15.3013C10.2856 19.9961 15.5798 22.1938 17.5776 20.1959L19.4755 18.298C20.1748 17.4989 20.1748 16.3002 19.4755 15.601Z"
                                            fill="#EE212B" />
                                    </svg>
                                    <?php echo esc_html($settings['achievement-phone']['url']); ?>
                                </a>
                            <?php endif; ?>

                            <div class="achievement__video">
                                <div class="achievement__video-thumb-wrap position-relative">
                                    <a href="<?php echo esc_url($settings['achievement-video-link']['url']); ?>"
                                        class="achievement__video-link glightbox" data-glightbox="type: video">
                                        <?php
                                        if (!empty($settings['achievement-video-icon']['value'])) {
                                            Icons_Manager::render_icon(
                                                $settings['achievement-video-icon'],
                                                ['aria-hidden' => 'true']
                                            );
                                        } else {
                                            ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="81" height="81" viewBox="0 0 81 81"
                                                fill="none">
                                                <circle cx="40.6409" cy="40.6909" r="40" fill="white" fill-opacity="0.3" />
                                                <circle cx="40.6409" cy="40.6907" r="33.4612" fill="white" fill-opacity="0.5" />
                                                <rect x="25.3885" y="26.4941" width="33.7271" height="33.7271" fill="#0B1714" />
                                                <path
                                                    d="M40.6409 12.8452C25.3478 12.8452 12.9076 25.337 12.9076 40.6908C12.9076 56.0445 25.3478 68.5363 40.6409 68.5363C55.934 68.5363 68.3743 56.0445 68.3743 40.6908C68.3743 25.337 55.934 12.8452 40.6409 12.8452ZM51.6661 41.6663L35.4884 52.1084C35.3021 52.2292 35.085 52.2933 34.8632 52.2931C34.6736 52.2931 34.4817 52.2455 34.3103 52.1515C34.1278 52.0518 33.9755 51.9046 33.8694 51.7253C33.7634 51.5461 33.7075 51.3414 33.7076 51.1328V30.2487C33.7076 29.8238 33.9378 29.434 34.3103 29.23C34.6759 29.0284 35.134 29.0408 35.4884 29.2731L51.6661 39.7152C51.9957 39.9282 52.1965 40.2965 52.1965 40.6908C52.1965 41.085 51.9957 41.4532 51.6661 41.6663Z"
                                                    fill="#E9E9E9" />
                                            </svg>
                                            <?php
                                        }
                                        ?>
                                    </a>
                                    <?php if (!empty($settings['achievement-video-img']['url'])): ?>
                                        <img src="<?php echo esc_html($settings['achievement-video-img']['url']); ?>"
                                            class="achievement__video-thumb" alt="Video Thumbnail">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="achievement__home-icon">
                                <svg width="49" height="54" viewBox="0 0 49 54" fill="none">
                                    <path
                                        d="M48.0377 25.2596L43.291 33.6228L40.3404 31.6241L25.8594 21.8129C25.3236 21.444 24.6883 21.2464 24.0377 21.2464C23.3871 21.2464 22.7519 21.444 22.216 21.8129L7.73509 31.6241L4.78443 33.6228L0.0377197 25.2596L22.216 10.234C22.7519 9.86503 23.3871 9.6675 24.0377 9.6675C24.6883 9.6675 25.3236 9.86503 25.8594 10.234L48.0377 25.2596ZM39.8864 18.1491V8.1958H31.7009V12.6044L39.8864 18.1491Z"
                                        fill="#EE212B" />
                                    <path
                                        d="M39.1126 0.694824H32.4745C30.7664 0.694824 29.3817 2.0795 29.3817 3.78759C29.3817 5.49567 30.7664 6.88035 32.4745 6.88035H39.1126C40.8207 6.88035 42.2054 5.49567 42.2054 3.78759C42.2054 2.0795 40.8207 0.694824 39.1126 0.694824Z"
                                        fill="#EE212B" />
                                    <path
                                        d="M25.1213 22.9042C24.8029 22.6821 24.424 22.563 24.0358 22.563C23.6475 22.563 23.2687 22.6821 22.9502 22.9042L7.73511 33.2128V53.3259H40.3404V33.2128L25.1213 22.9042ZM23.3798 43.7667H17.5575V37.945H23.3798V43.7667ZM23.3798 36.6292H17.5904C17.7422 35.1455 18.4009 33.7595 19.4555 32.7049C20.5101 31.6502 21.8961 30.9915 23.3798 30.8397V36.6292ZM24.6956 30.8397C26.1793 30.9915 27.5653 31.6502 28.62 32.7049C29.6746 33.7595 30.3333 35.1455 30.4851 36.6292H24.6956V30.8397ZM30.518 43.7667H24.6956V37.945H30.518V43.7667Z"
                                        fill="#EE212B" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="col col-12 col-x2l-6">
                        <div class="achievement__right">
                            <?php $this->render_subtitle('achievement-subtitle', 'achievement__subtitle'); ?>
                            <?php if (!empty($settings['achievement-title'])): ?>
                                <h2 class="achievement__title title-xl"><?php echo esc_html($settings['achievement-title']); ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($settings['achievement-desc'])): ?>
                                <p class="achievement__desc mt-8"><?php echo esc_html($settings['achievement-desc']); ?></p>
                            <?php endif; ?>

                            <?php
                            if (!empty($settings['achievement-stats'])) {
                                echo '<div class="achievement__stats d-flex gap-5 flex-wrap justify-content-between mt-10 mb-8">';
                                foreach ($settings['achievement-stats'] as $item) {
                                    $stat_number = isset($item['stat_number']) ? esc_html($item['stat_number']) : '';
                                    $stat_text = isset($item['stat_text']) ? esc_html($item['stat_text']) : '';
                                    $stat_suffix = '+';
                                    ?>
                                    <div class="achievement__stat">
                                        <h3 class="achievement__stat-number" stat-data-start="0"
                                            stat-data-end="<?php echo esc_attr($stat_number); ?>" data-duration="3000"
                                            data-format="full" data-suffix="<?php echo esc_attr($stat_suffix); ?>">
                                            <?php echo esc_html($stat_number . $stat_suffix); ?>
                                        </h3>
                                        <h3 class="achievement__stat-text">
                                            <?php echo esc_html($stat_text); ?>
                                        </h3>
                                    </div>
                                    <?php
                                }
                                echo '</div>';
                            }
                            ?>
                            <?php $this->render_button('achievement-btn', 'achievement__btn'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new Xroof_Achievement_Widget_1());
