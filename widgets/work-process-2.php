<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Work_Process_Widget_2 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-work-process-2';
    }

    public function get_title()
    {
        return esc_html__('Xroof Work Process 2', 'xroof');
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
                'default' => esc_html__('Our Proven Step-by-Step Process for Roofing Excellence', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'work_process_list_section',
            [
                'label' => esc_html__('Process', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $this->add_svg_control($repeater, 'work_process_icon', 'Icon', '/assets/svg/work-process.svg');
        $repeater->add_control(
            'work_process_date',
            [
                'label' => esc_html__('Date', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('l... August 2 , 2025', 'xroof'),
                'placeholder' => esc_html__('Add your date here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'work_process_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Add Your Title', 'xroof'),
                'placeholder' => esc_html__('Add your title here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'work_process_text',
            [
                'label' => esc_html__('Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Add Your Text', 'xroof'),
                'placeholder' => esc_html__('Add your text here', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'work_process_list',
            [
                'label' => esc_html__('Work Process List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'work_process_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/work-process.svg',
                        ],
                        'work_process_date' => esc_html__('l... August 1 , 2025', 'xroof'),
                        'work_process_title' => esc_html__('Roof Replacement', 'xroof'),
                        'work_process_text' => esc_html__('Our team provides expert assessment and high-quality materials to give your home or business.', 'xroof'),
                    ],
                    [
                        'work_process_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/work-process-2.svg',
                        ],
                        'work_process_date' => esc_html__('l... August 2 , 2025', 'xroof'),
                        'work_process_title' => esc_html__('Material Selection', 'xroof'),
                        'work_process_text' => esc_html__('Our team provides expert assessment and high-quality materials to give your home or business.', 'xroof'),
                    ],
                    [
                        'work_process_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/work-process-3.svg',
                        ],
                        'work_process_date' => esc_html__('l... August 3 , 2025', 'xroof'),
                        'work_process_title' => esc_html__('Detailed Quote', 'xroof'),
                        'work_process_text' => esc_html__('Brighten your space naturally with our expert skylight installation services. looking to enhance', 'xroof'),
                    ],
                    [
                        'work_process_icon' => [
                            'url' => get_template_directory_uri() . '/assets/svg/work-process-4.svg',
                        ],
                        'work_process_date' => esc_html__('l... August 4 , 2025', 'xroof'),
                        'work_process_title' => esc_html__('Ongoing Support', 'xroof'),
                        'work_process_text' => esc_html__('Brighten your space naturally with our expert skylight installation services. looking to enhance', 'xroof'),
                    ],
                ],
                'title_field' => '{{{ work_process_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'work_process_img_section',
            [
                'label' => esc_html__('Image', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'work_process_img',
            [
                'label' => esc_html__('Choose Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/global/work-process-1.png',
                ],
            ]
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'work_process_content_style',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('work_process_title', 'work-process__title', 'Title');
        $this->end_controls_section();

        $this->start_controls_section(
            'work_process_style',
            [
                'label' => __('Process', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_section_heading('process_icon', 'Icon');
        $this->add_control(
            'process_item_icon',
            [
                'label' => esc_html__('Icon', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-item__icon-wrap svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'process_item_icon_wrap',
            [
                'label' => esc_html__('Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-item__icon-wrap' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->register_text_style_controls('process_date', 'process-item__number');
        $this->register_text_style_controls('process_title', 'process-item__title');
        $this->register_text_style_controls('process_text', 'process-item__text');
        $this->add_section_heading('process_card', 'Process Card');
        $this->add_control(
            'process_card_bg',
            [
                'label' => esc_html__('Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-item' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'process_card_hover_border',
            [
                'label' => esc_html__('Border Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-item::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $work_process_list = $settings['work_process_list'];
        $left_item = [];
        $right_item = [];

        foreach ($work_process_list as $index => $item) {
            if ($index % 2 === 0) {
                $left_item[] = $item;
            } else {
                $right_item[] = $item;
            }
        } ?>

        <section class="work-process work-process--style-2">
            <div class="work-process__container container">
                <?php if (!empty($settings['work_process_title'])): ?>
                    <h2 class="work-process__title title-xl-white">
                        <?php echo esc_html($settings['work_process_title']) ?>
                    </h2>
                <?php endif; ?>

                <div class="row g-4 mt-10 mt-xl-15 mt-xxl-20 align-items-center">
                    <?php if (!empty($left_item)): ?>
                        <div class="col-12 col-xl-3">
                            <div class="row g-4">
                                <?php foreach ($left_item as $item): ?>
                                    <div class="col-12 col-sm-6 col-xl-12">
                                        <div class="process-item">
                                            <div class="process-item__top flex-items-center flex-wrap justify-content-between gap-3">
                                                <?php if ($item['work_process_icon']['url']): ?>
                                                    <div class="process-item__icon-wrap mb-0">
                                                        <?php echo $this->render_svg($item['work_process_icon']['url']) ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($item['work_process_date'])): ?>
                                                    <span class="process-item__number">
                                                        <?php echo esc_html($item['work_process_date']); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            <?php if (!empty($item['work_process_title'])): ?>
                                                <h3 class="process-item__title card-title mt-8 mt-xl-10 mt-xxl-12">
                                                    <?php echo esc_html($item['work_process_title']); ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if (!empty($item['work_process_text'])): ?>
                                                <p class="process-item__text body-text mt-8 mt-xl-10 mt-xxl-12 mb-0">
                                                    <?php echo esc_html($item['work_process_text']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['work_process_img']['url'])): ?>
                        <div class="col-12 col-xl-6">
                            <div class="work-process__img-wrap">
                                <img src="<?php echo esc_url($settings['work_process_img']['url']); ?>" alt="Work Process"
                                    class="work-process__img">
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="col-12 col-xl-3">
                        <div class="row g-4">
                            <?php foreach ($right_item as $item): ?>
                                <div class="col-12 col-sm-6 col-xl-12">
                                    <div class="process-item">
                                        <div class="process-item__top flex-items-center flex-wrap justify-content-between gap-3">
                                            <?php if ($item['work_process_icon']['url']): ?>
                                                <div class="process-item__icon-wrap mb-0">
                                                    <?php echo $this->render_svg($item['work_process_icon']['url']) ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($item['work_process_date'])): ?>
                                                <span class="process-item__number">
                                                    <?php echo esc_html($item['work_process_date']); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <?php if (!empty($item['work_process_title'])): ?>
                                            <h3 class="process-item__title card-title mt-8 mt-xl-10 mt-xxl-12">
                                                <?php echo esc_html($item['work_process_title']); ?>
                                            </h3>
                                        <?php endif; ?>
                                        <?php if (!empty($item['work_process_text'])): ?>
                                            <p class="process-item__text body-text mt-8 mt-xl-10 mt-xxl-12 mb-0">
                                                <?php echo esc_html($item['work_process_text']); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Work_Process_Widget_2());
