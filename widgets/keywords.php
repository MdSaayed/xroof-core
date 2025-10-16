<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Xroof\Core\Traits\Xroof_Controls_Trait;

if (!defined('ABSPATH'))
    exit;

class Xroof_Keywords_Widget_1 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-keywords';
    }

    public function get_title()
    {
        return esc_html__('Xroof Keywords', 'xroof');
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

    // 🔹 Content Section
    protected function register_controls_section()
    {
        $this->start_controls_section(
            'keywords_section',
            [
                'label' => esc_html__('Keywords', 'xroof'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'keyword_text',
            [
                'label' => esc_html__('Keyword Text', 'xroof'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('INSTALLATION', 'xroof'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'keywords_list',
            [
                'label' => esc_html__('Keywords List', 'xroof'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    ['keyword_text' => 'INSTALLATION'],
                    ['keyword_text' => 'ROOF REPAIR'],
                    ['keyword_text' => 'REPLACEMENT'],
                    ['keyword_text' => 'RESIDENTIAL'],
                    ['keyword_text' => 'DETECTION'],
                ],
                'title_field' => '{{{ keyword_text }}}',
            ]
        );
        $this->end_controls_section();
    }

    // 🔹 Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'keywords_style_section',
            [
                'label' => esc_html__('Keywords Style', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('keywords_item', 'keywords__item', 'Keyword');
        $this->add_control(
            'keyword_circle_color',
            [
                'label' => esc_html__('Circle Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .keywords__item::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'keywords_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => sprintf(__('Wrapper', 'xroof')),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'keywords_divider',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        $this->add_control(
            'keyword_bg_color',
            [
                'label' => esc_html__('Background Color', 'xroof'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .keywords' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'keyword_padding',
            [
                'label' => esc_html__('Padding', 'xroof'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .keywords__container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    // 🔹 Render Section
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $keywords = $settings['keywords_list'] ?? [];
        ?>

        <section class="keywords">
            <div class="keywords__container container">
                <h2 class="keywords__title visually-hidden">Keywords</h2>

                <div class="keywords__wrapper">
                    <div class="keywords__track">
                        <div class="keywords__group">
                            <?php foreach ($keywords as $item): ?>
                                <?php if (!empty($item['keyword_text'])): ?>
                                    <span class="keywords__item">
                                        <?php echo esc_html($item['keyword_text']); ?>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <!-- Duplicate Items -->
                            <?php foreach ($keywords as $item): ?>
                                <?php if (!empty($item['keyword_text'])): ?>
                                    <span class="keywords__item">
                                        <?php echo esc_html($item['keyword_text']); ?>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Keywords_Widget_1());
