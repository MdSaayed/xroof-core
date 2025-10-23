<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
	exit;


class Xroof_Hero_Widget_1 extends Widget_Base
{
	use Xroof_Controls_Trait;

	public function get_name()
	{
		return 'xroof-hero-1';
	}

	public function get_title()
	{
		return esc_html__('Xroof Hero 1', 'xroof');
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
		//Content Section
		$this->start_controls_section(
			'hero-content-section',
			[
				'label' => esc_html__('Hero Content', 'xroof'),
			]
		);
		$this->register_subtitle_content_controls('hero__subtitle');
		$this->add_universal_input_control('hero-title-text', 'Hero Title', 'text', [
			'default' => 'Reliable Roofing & Fixing Services In USA',
			'placeholder' => 'Enter Hero Title',
		]);
		$this->add_universal_input_control('hero-desc-text', 'Hero Description', 'textarea', [
			'default' => 'We provide professional roofing services with expert care, ensuring durable protection and reliable results.',
			'placeholder' => 'Enter here hero description',
		]);
		$this->add_universal_input_control('hero-man-image', 'Hero Image', 'media', [
			'default' => [
				'url' => get_template_directory_uri() . '/assets/img/hero/hero-1-man.png',
			]
		]);
		$this->add_universal_input_control('hero-arrow-image', 'Hero Arrow Image', 'media', [
			'default' => [
				'url' => get_template_directory_uri() . '/assets/img/shape/hero-1-arrow.png',
			]
		]);
		$this->end_controls_section();

		//Button Section
		$this->start_controls_section(
			'hero-btn-section',
			[
				'label' => esc_html__('Hero Buttons', 'xroof'),
			]
		);
		$this->register_button_content_controls('hero-btn', 'hero__btn', 'Hero Button');
		$this->register_button_content_controls('hero-btn-phn', 'hero__btn-phn', 'Hero Phone Button');
		$this->end_controls_section();

		//Stats Section
		$this->start_controls_section(
			'hero-stats-section',
			[
				'label' => esc_html__('Statistics', 'xroof'),
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'stat-number',
			[
				'label' => esc_html__('Number', 'xroof'),
				'type' => Controls_Manager::NUMBER,
				'default' => 1500,
			]
		);
		$repeater->add_control(
			'stat-start-number',
			[
				'label' => esc_html__('Start Number (for counter)', 'xroof'),
				'type' => Controls_Manager::NUMBER,
				'default' => 300,
			]
		);
		$repeater->add_control(
			'stat-duration',
			[
				'label' => esc_html__('Duration (ms)', 'xroof'),
				'type' => Controls_Manager::NUMBER,
				'default' => 1000,
			]
		);
		$repeater->add_control(
			'stat-suffix',
			[
				'label' => esc_html__('Suffix', 'xroof'),
				'type' => Controls_Manager::TEXT,
				'default' => 'k',
			]
		);
		$repeater->add_control(
			'stat-prefix',
			[
				'label' => esc_html__('Prefix', 'xroof'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
			]
		);
		$repeater->add_control(
			'stat-text',
			[
				'label' => esc_html__('Description', 'xroof'),
				'type' => Controls_Manager::TEXT,
				'default' => 'Completed Projects',
			]
		);
		$this->add_control(
			'stats-list',
			[
				'label' => esc_html__('Stats', 'xroof'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'stat-number' => 1500,
						'stat-start-number' => 300,
						'stat-duration' => 1000,
						'stat-suffix' => 'k',
						'stat-text' => 'Completed Projects',
					],
					[
						'stat-number' => 1800,
						'stat-start-number' => 300,
						'stat-duration' => 1000,
						'stat-suffix' => 'k',
						'stat-text' => 'Happy Customers',
					],
				],
				'title_field' => '{{{ stat-number }}}{{{ stat-suffix }}} - {{{ stat-text }}}',
			]
		);
		$this->end_controls_section();

		// Form Section
		$this->start_controls_section(
			'section_form',
			[
				'label' => esc_html__('Contact Form', 'xroof'),
			]
		);
		$this->add_universal_input_control('form-title', 'Form Title', 'text', [
			'default' => 'Request A Free Quote',
			'placeholder' => 'Enter Form Title',
		]);
		$this->add_universal_input_control('form_shortcode', 'Form Shortcode', 'text', [
			'default' => '',
			'placeholder' => 'Enter your form shortcode here.',
		]);
		$this->end_controls_section();
	}

	// Register Style Section
	protected function register_style_section()
	{
		$this->start_controls_section(
			'hero-content-style-section',
			[
				'label' => esc_html__('Content Styles', 'xroof'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->register_subtitle_style_controls('hero__subtitle');
		$this->register_text_style_controls('hero-title', 'hero__title', 'Title');
		$this->register_text_style_controls('hero-title-highlight', 'hero__title--highlight', 'Highlight Text');
		$this->add_control(
			'highlight-color',
			[
				'label' => esc_html__('Highlight Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__title--highlight' => 'color: {{VALUE}};',
				],
			]
		);
		$this->register_text_style_controls('hero-desc', 'hero__desc', 'Hero Description');
		$this->end_controls_section();

		$this->start_controls_section(
			'button_styles_section',
			[
				'label' => esc_html__('Button Styles', 'xroof'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->register_button_style_controls('hero-btn', 'hero__btn', 'Hero Button 1');
		$this->register_button_style_controls('hero-btn-phn', 'hero__btn-phn', 'Hero Button 2');
		$this->end_controls_section();

		// Form Styles
		$this->start_controls_section(
			'section_style_form',
			[
				'label' => esc_html__('Form Styles', 'xroof'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_universal_input_control('form-wrap-bg', 'Form Background', 'color', [
			'default' => '#ffffff',
			'selectors' => [
				'{{WRAPPER}} .hero__form-wrap' => 'background-color: {{VALUE}};',
			],
		]);
		$this->register_spacing_controls('form-spacing', 'hero__form-wrap');
		$this->register_border_radius_control('form-border-radius', 'hero__form-wrap');
		$this->register_text_style_controls('form-title', 'hero__form-title', 'Form Title');
		$this->add_control(
			'input_field_heading',
			[
				'label' => esc_html__('Input Fields', 'xroof'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'input_bg_color',
			[
				'label' => esc_html__('Background Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__form-input' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'input_text_color',
			[
				'label' => esc_html__('Text Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__form-input' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'input_typography',
				'selector' => '{{WRAPPER}} .hero__form-input',
			]
		);

		// Submit button
		$this->add_control(
			'submit_btn_heading',
			[
				'label' => esc_html__('Submit Button', 'xroof'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs('tabs_submit_button_style');
		$this->start_controls_tab(
			'tab_submit_button_normal',
			[
				'label' => esc_html__('Normal', 'xroof'),
			]
		);
		$this->add_control(
			'submit_btn_text_color',
			[
				'label' => esc_html__('Text Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__form-submit' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'submit_btn_bg_color',
			[
				'label' => esc_html__('Background Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__form-submit' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'submit_btn_typography',
				'selector' => '{{WRAPPER}} .hero__form-submit',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_submit_button_hover',
			[
				'label' => esc_html__('Hover', 'xroof'),
			]
		);
		$this->add_control(
			'submit_btn_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__form-submit:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'submit_btn_bg_color_hover',
			[
				'label' => esc_html__('Background Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__form-submit:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Stats Styles
		$this->start_controls_section(
			'section_style_stats',
			[
				'label' => esc_html__('Stats Styles', 'xroof'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'stat-number_color',
			[
				'label' => esc_html__('Number Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__stats-number' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'stat-number_typography',
				'selector' => '{{WRAPPER}} .hero__stats-number',
			]
		);
		$this->add_control(
			'stat-text_color',
			[
				'label' => esc_html__('Text Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__stats-text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'stat-text_typography',
				'selector' => '{{WRAPPER}} .hero__stats-text',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_hero_bg',
			[
				'label' => esc_html__('Background Images', 'xroof'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_background_controls('hero_bg_image_1xxx', 'hero--style-1', 'Hero Background');
		$this->end_controls_section();
	}

	// Render Here
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		?>

		<section class="hero hero--style-1">
			<div class="hero__container container">
				<div class="row g-5">
					<div class="col col-12 col-xl-6">
						<div class="hero__left">
							<?php $this->render_subtitle('hero__subtitle'); ?>

							<?php if (!empty($settings['hero-title-text'])): ?>
								<h1 class="hero__title title-xxl"><?php echo esc_html($settings['hero-title-text']); ?></h1>
							<?php endif; ?>

							<?php if (!empty($settings['hero-desc-text'])): ?>
								<p class="hero__desc body-text"><?php echo esc_html($settings['hero-desc-text']); ?></p>
							<?php endif; ?>

							<div class="hero__btn-wrap flex-items-center flex-wrap gap-4 mt-8">
								<?php $this->render_button('hero-btn', 'hero__btn'); ?>
								<?php $this->render_button('hero-btn-phn', 'hero__btn-phn'); ?>
							</div>
						</div>
					</div>

					<div class="col col-12 col-xl-6">
						<div class="hero__right d-flex justify-content-end">
							<div class="hero__right-content">
								<?php if (!empty($settings['hero-arrow-image']['url'])): ?>
									<div class="hero__shape-arrow mb-8">
										<img src="<?php echo esc_url($settings['hero-arrow-image']['url']); ?>"
											alt="Hero Arrow Shape" class="hero__shape-arrow-img">
									</div>
								<?php endif; ?>
								<div class="hero__form-wrap px-6 py-8 px-xxl-12 py-xxl-14">
									<?php if (!empty($settings['form-title'])): ?>
										<h2 class="hero__form-title mb-12"><?php echo esc_html($settings['form-title']); ?></h2>
									<?php endif; ?>

									<div class="hero__form -mb-4">
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
						</div>
					</div>
				</div>
			</div>

			<div class="hero__stats">
				<div class="hero__stats-container container">
					<div class="hero__stats d-flex flex-wrap">
						<?php foreach ($settings['stats-list'] as $stat): ?>
							<div class="hero__stats-item">
								<?php if (!empty($stat['stat-start-number'])): ?>
									<h3 class="hero__stats-number" stat-data-start="<?php echo esc_attr($stat['stat-start-number']); ?>"
										stat-data-end="<?php echo esc_attr($stat['stat-number']); ?>"
										data-duration="<?php echo esc_attr($stat['stat-duration']); ?>" data-format="k">
										<?php echo esc_html($stat['stat-prefix']); ?> 				<?php echo esc_html($stat['stat-number']); ?>
										<?php echo esc_html($stat['stat-suffix']); ?>
									</h3>
								<?php endif; ?>
								<?php if (!empty($stat['stat-text'])): ?>
									<p class="hero__stats-text"><?php echo esc_html($stat['stat-text']); ?></p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<?php if (!empty($settings['hero-man-image']['url'])): ?>
				<div class="hero__img-wrap">
					<img src="<?php echo esc_url($settings['hero-man-image']['url']); ?>" alt="Hero Image" class="hero__img">
				</div>
			<?php endif; ?>
		</section>

		<?php
	}
}

$widgets_manager->register(new Xroof_Hero_Widget_1());
