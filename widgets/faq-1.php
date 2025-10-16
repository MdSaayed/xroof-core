<?php
use Xroof\Core\Traits\Xroof_Controls_Trait;

if (!defined('ABSPATH')) {
	exit;
}

class Xroof_FAQ_Widget_1 extends \Elementor\Widget_Base
{
	use Xroof_Controls_Trait;

	public function get_name()
	{
		return 'faq_widget';
	}

	public function get_title()
	{
		return esc_html__('FAQ Widget', 'text-domain');
	}

	public function get_icon()
	{
		return 'eicon-help-o';
	}

	public function get_categories()
	{
		return ['xroof-widget-cat'];
	}

	public function get_keywords()
	{
		return ['faq', 'accordion', 'questions'];
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
			'content_section',
			[
				'label' => esc_html__('Content', 'text-domain'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->register_subtitle_content_controls('faq__subtitle');
		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'text-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Frequently Asked Questions', 'text-domain'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'description',
			[
				'label' => esc_html__('Description', 'text-domain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Find answers to common questions about our roofing services, processes, and warranties to help you make informed decisions confidently.', 'text-domain'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'faq_columns',
			[
				'label' => esc_html__('Columns', 'text-domain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => esc_html__('1 Column', 'text-domain'),
					'2' => esc_html__('2 Columns', 'text-domain'),
				],
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'faq_question',
			[
				'label' => esc_html__('Question', 'text-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('How long does roofing last?', 'text-domain'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'faq_answer',
			[
				'label' => esc_html__('Answer', 'text-domain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Most roofs last 20–25 years. Frequent repairs, missing shingles, or sagging areas may signal replacement is needed. We can inspect and advise. Regular maintenance can extend your roof’s lifespan significantly.', 'text-domain'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'is_active',
			[
				'label' => esc_html__('Active by Default', 'text-domain'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'text-domain'),
				'label_off' => esc_html__('No', 'text-domain'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'faqs',
			[
				'label' => esc_html__('FAQs', 'text-domain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'faq_question' => esc_html__('How long does roofing last?', 'text-domain'),
						'faq_answer' => esc_html__('Most roofs last 20–25 years. Frequent repairs, missing shingles, or sagging areas may signal replacement is needed. We can inspect and advise. Regular maintenance can extend your roof’s lifespan significantly.', 'text-domain'),
						'is_active' => 'yes',
					],
					[
						'faq_question' => esc_html__('Do you offer free inspections?', 'text-domain'),
						'faq_answer' => esc_html__('Yes! Our team can inspect your roof at no cost and provide a detailed report of repairs or replacement needs. We also suggest preventive measures to avoid future issues efficiently.', 'text-domain'),
					],
				],
				'title_field' => '{{{ faq_question }}}',
			]
		);
		$this->end_controls_section();
	}

	// Register Style Section
	protected function register_style_section()
	{
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__('Content Style', 'text-domain'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->register_subtitle_style_controls('faq-subtitle', 'faq__subtitle');
		$this->register_text_style_controls('faq-title', 'faq__title');
		$this->register_text_style_controls('faq-desc', 'faq__desc');

		// Icon Style
		$this->start_controls_tabs('icon_style_tabs');
		$this->start_controls_tab(
			'icon_normal',
			[
				'label' => esc_html__('Normal', 'text-domain'),
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'icon_hover',
			[
				'label' => esc_html__('Hover', 'text-domain'),
			]
		);
		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__('Icon Hover Color', 'text-domain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq__subtitle-wrap svg:hover' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'faq_item_style',
			[
				'label' => esc_html__('FAQ Item', 'text-domain'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs('question_style_tabs');
		$this->start_controls_tab(
			'question_normal',
			[
				'label' => esc_html__('Normal', 'text-domain'),
			]
		);
		$this->add_control(
			'question_color',
			[
				'label' => esc_html__('Question Color', 'text-domain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq__question' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'question_typography',
				'label' => esc_html__('Question Typography', 'text-domain'),
				'selector' => '{{WRAPPER}} .faq__question',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'question_background',
				'label' => esc_html__('Question Background', 'text-domain'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .faq__question-wrap',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'question_border',
				'label' => esc_html__('Question Border', 'text-domain'),
				'selector' => '{{WRAPPER}} .faq__question-wrap',
			]
		);
		$this->add_control(
			'question_border_radius',
			[
				'label' => esc_html__('Question Border Radius', 'text-domain'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .faq__question-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'question_box_shadow',
				'label' => esc_html__('Question Box Shadow', 'text-domain'),
				'selector' => '{{WRAPPER}} .faq__question-wrap',
			]
		);
		$this->add_control(
			'question_active_color',
			[
				'label' => esc_html__('Question Active Color', 'text-domain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq__item.active .faq__question' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'faq_question_bg',
			[
				'label' => esc_html__('Background', 'text-domain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq__question-wrap' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'question_hover',
			[
				'label' => esc_html__('Hover', 'text-domain'),
			]
		);
		$this->add_control(
			'question_hover_color',
			[
				'label' => esc_html__('Question Hover Color', 'text-domain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq__question-wrap:hover .faq__question' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'question_hover_background',
				'label' => esc_html__('Question Hover Background', 'text-domain'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .faq__question-wrap:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'answer_color',
			[
				'label' => esc_html__('Answer Color', 'text-domain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq__answer' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'answer_typography',
				'label' => esc_html__('Answer Typography', 'text-domain'),
				'selector' => '{{WRAPPER}} .faq__answer',
			]
		);
		$this->add_responsive_control(
			'answer_spacing',
			[
				'label' => esc_html__('Answer Spacing', 'text-domain'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .faq__answer' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_background',
			[
				'label' => esc_html__('Background', 'text-domain'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->register_spacing_controls('container_spacing', 'faq__container');
		$this->add_control(
			'faq_bg',
			[
				'label' => esc_html__('Container', 'text-domain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq' => 'background: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
	}

	// Render Here
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$column_class = $settings['faq_columns'] === '1' ? 'col-12' : 'col-md-6';
		?>
		<section class="faq faq--style-1">
			<div class="faq__container container">
				<?php $this->render_subtitle(); ?>

				<h2 class="faq__title title-xl"><?php echo esc_html($settings['title']); ?></h2>
				<p class="faq__desc body-text"><?php echo esc_html($settings['description']); ?></p>

				<?php if (!empty($settings['faqs'])): ?>
					<div class="row mt-10 mt-xl-15 mt-xxl-20">
						<?php foreach ($settings['faqs'] as $key => $faq):
							$active_class = $key === 0 ? 'active' : '';
							?>
							<div class="<?php echo esc_attr($column_class); ?> mb-3">
								<div class="faq__item <?php echo esc_attr($active_class); ?>">
									<button class="faq__question-wrap d-flex justify-content-between align-items-center w-100">
										<?php if (!empty($faq['faq_question'])): ?>
											<span class="faq__question">
												<?php echo esc_html($faq['faq_question']); ?>
											</span>
										<?php endif; ?>
										<span class="faq__icon"></span>
									</button>

									<?php if (!empty($faq['faq_answer'])): ?>
										<p class="faq__answer mt-3 pr-4">
											<?php echo esc_html($faq['faq_answer']); ?>
										</p>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<?php
	}
}

$widgets_manager->register(new Xroof_FAQ_Widget_1());