<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Started_Widget extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-started';
    }

    public function get_title()
    {
        return esc_html__('Xroof Started', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-user-preferences';
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
            'started-content-section',
            [
                'label' => esc_html__('Cta Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'started_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Roofing Process for Quality You Can Trust', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'started-list-section',
            [
                'label' => esc_html__('Statistics', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'statistics_number',
            [
                'label' => esc_html__('Number', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('15', 'xroof'),
                'placeholder' => esc_html__('Enter your number', 'xroof'),
                'label_block' => false,
            ]
        );
        $repeater->add_control(
            'statistics_description',
            [
                'label' => esc_html__('Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Your text here', 'xroof'),
                'placeholder' => esc_html__('Enter your text here', 'xroof'),
                'label_block' => false,
            ]
        );
        $repeater->add_control(
            'statistics_suffix',
            [
                'label' => esc_html__('Suffix', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'xroof'),
                'placeholder' => esc_html__('Enter your suffix here', 'xroof'),
                'label_block' => false,
            ]
        );
        $this->add_control(
            'statistics_list',
            [
                'label' => esc_html__('Statistics List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'statistics_number' => esc_html__('1.5M', 'xroof'),
                        'statistics_description' => esc_html__('We helped to get companies with $100 M+ funding', 'xroof'),
                        'statistics_suffix' => esc_html__('', 'xroof'),
                    ],
                    [
                        'statistics_number' => esc_html__('230', 'xroof'),
                        'statistics_description' => esc_html__('Crated responsive User - centered website & app.', 'xroof'),
                        'statistics_suffix' => esc_html__('+', 'xroof'),
                    ],
                    [
                        'statistics_number' => esc_html__('12', 'xroof'),
                        'statistics_description' => esc_html__('We have had quite a run in our 12+ years of working.', 'xroof'),
                        'statistics_suffix' => esc_html__('+', 'xroof'),
                    ],
                    [
                        'statistics_number' => esc_html__('80', 'xroof'),
                        'statistics_description' => esc_html__('Professional skilled designers and developers', 'xroof'),
                        'statistics_suffix' => esc_html__('+', 'xroof'),
                    ],
                ],
                'title_field' => '{{{ statistics_number }}}',
            ]
        );

        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'started_style_section',
            [
                'label' => __('Title', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('started_title', 'started__title', 'Title');
        $this->end_controls_section();

        $this->start_controls_section(
            'statistics_style_section',
            [
                'label' => __('Statistics', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('statistics_number', 'statistics__number', 'Number');
        $this->register_text_style_controls('statistics_description', 'statistics__description', 'Text');
        $this->end_controls_section();

        $this->start_controls_section(
            'statistics_line_style_section',
            [
                'label' => __('Line', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'line_bg_color',
            [
                'label' => esc_html__('Line Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .statistics__item-wrap::before, {{WRAPPER}} .statistics__item-wrap::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $left_items = [];
        $right_items = [];

        foreach ($settings['statistics_list'] as $index => $value) {
            if ($index % 2 !== 0) {
                $right_items[] = $value;
            } else {
                $left_items[] = $value;
            }
        }
        ?>

        <section class="started started--style-1">
            <div class="started__container container">
                <div class="row g-5">
                    <?php if (!empty($settings['started_title'])): ?>
                        <div class="col-xxl-6">
                            <h2 class="started__title title-xl"><?php echo esc_html($settings['started_title']); ?></h2>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['statistics_list'])): ?>
                        <div class="col-xxl-6">
                            <div class="statistics__list row g-4">
                                <div class="statistics__item-wrap col-12 col-sm-6">
                                    <?php foreach ($left_items as $item): ?>
                                        <div class="statistics__item">
                                            <?php if ($item['statistics_number']): ?>
                                                <h3 class="statistics__number mb-4">
                                                    <?php echo esc_html($item['statistics_number']); ?>
                                                    <?php echo !empty($item['statistics_suffix']) ? esc_html($item['statistics_suffix']) : ''; ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if ($item['statistics_description']): ?>
                                                <p class="statistics__description">
                                                    <?php echo esc_html($item['statistics_description']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="statistics__item-wrap col-12 col-sm-6">
                                    <?php foreach ($right_items as $item): ?>
                                        <div class="statistics__item">
                                            <?php if ($item['statistics_number']): ?>
                                                <h3 class="statistics__number mb-4">
                                                    <?php echo esc_html($item['statistics_number']); ?>
                                                    <?php echo !empty($item['statistics_suffix']) ? esc_html($item['statistics_suffix']) : ''; ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if ($item['statistics_description']): ?>
                                                <p class="statistics__description">
                                                    <?php echo esc_html($item['statistics_description']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Started_Widget());
