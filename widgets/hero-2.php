<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
	exit;


class Xroof_Hero_Widget_2 extends Widget_Base
{
	use Xroof_Controls_Trait;

	public function get_name()
	{
		return 'xroof-hero-2';
	}

	public function get_title()
	{
		return esc_html__('Xroof Hero 2', 'xroof');
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
			'hero_two_content_section_',
			[
				'label' => esc_html__('Hero Content', 'xroof'),
			]
		);
		$this->add_universal_input_control('hero_title_text', 'Title', 'textarea', [
			'default' => 'Reliable <span class="highlight">Roofing</span><br>Built to Last In USA',
			'placeholder' => 'Enter hero title',
			'row' => 3,
		]);
		$this->add_universal_input_control('hero_desc', 'Description', 'textarea', [
			'default' => 'Protect your home or business with top-tier roofing solutions from certified professionals. Whether it’s repair replacement.',
			'placeholder' => 'Enter your description',
			'row' => 6,
		]);
		$this->add_universal_input_control('hero_main_title', 'Big Title', 'text', [
			'default' => 'XROOF',
			'placeholder' => 'Enter your main title',
			'row' => 6,
		]);
		$this->add_universal_input_control('hero_img', 'Hero Image', 'media', [
			'default' => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
			]
		]);
		$this->end_controls_section();

		$this->start_controls_section(
			'hero_two_stats_section_',
			[
				'label' => esc_html__('Hero Stats', 'xroof'),
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'hero_stat_number',
			[
				'label' => esc_html__('Number', 'xroof'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => esc_html__('70', 'xroof'),
				'label_block' => false,
			]
		);
		$repeater->add_control(
			'hero_stat_text',
			[
				'label' => esc_html__('Text', 'xroof'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Average clients', 'xroof'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'hero_stat_suffix',
			[
				'label' => esc_html__('Suffix', 'xroof'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('+', 'xroof'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_stats_list',
			[
				'label' => esc_html__('Stats List', 'xroof'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'hero_stat_number' => esc_html__('70', 'xroof'),
						'hero_stat_text' => esc_html__('Average clients'),
						'hero_stat_suffix' => esc_html__('%'),
					],
					[
						'hero_stat_number' => esc_html__('150', 'xroof'),
						'hero_stat_text' => esc_html__('Successfully Project'),
						'hero_stat_suffix' => esc_html__('+'),
					],
				],
				'title_field' => '{{{ hero_stat_text }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'hero_two_slider_section_',
			[
				'label' => esc_html__('Hero Background Slider', 'xroof'),
			]
		);
		$this->add_control(
			'hero_gallery',
			[
				'label' => esc_html__('Select Images', 'xroof'),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [
					[
						'id' => 0,
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					[
						'id' => 0,
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				],
			]
		);
		$this->end_controls_section();
	}

	// Register Style Section
	protected function register_style_section()
	{
		$this->start_controls_section(
			'hero_two_content_style_section_',
			[
				'label' => esc_html__('Hero Content', 'xroof'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->register_text_style_controls('hero_title', 'hero__title', 'Title');
		$this->register_text_style_controls('hero_title_highlight', 'hero__title span', 'Title Highlight');
		$this->register_text_style_controls('hero_desc', 'hero__desc', 'Description');
		$this->register_text_style_controls('hero_bg_desc', 'hero__bg-text', 'Main Title');
		$this->end_controls_section();

		$this->start_controls_section(
			'hero_two_stats_style_section_',
			[
				'label' => esc_html__('Hero Stats', 'xroof'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->register_text_style_controls('hero_stat_number', 'hero__stat-number', 'Stat Number');
		$this->register_text_style_controls('hero_stat_text', 'hero__stat-text', 'Stat Text');
		$this->end_controls_section();

		$this->start_controls_section(
			'hero_two_slider_style_section_',
			[
				'label' => esc_html__('Hero Background Slider', 'xroof'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'hero_slider_separator',
			[
				'type' => Controls_Manager::HEADING,
				'label' => sprintf(__('Navigation', 'xroof')),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'hero_slider_divider',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);
		$this->register_spacing_controls('hero_slider_nav_wrap', 'hero__nav');
		$this->add_control(
			'hero_slider_nav_wrap_bg',
			[
				'label' => esc_html__('Background Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__nav' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hero_slider_nav_wrap_border',
				'label' => esc_html__('Nav Border', 'xroof'),
				'fields_options' => [
					'border' => [
						'label' => esc_html__('Box Border Type', 'xroof'),
						'default' => '',
					],
					'width' => [
						'label' => esc_html__('Box Border Width', 'xroof'),
						'default' => [
							'top' => '1',
							'right' => '2',
							'bottom' => '3',
							'left' => '4',
							'isLinked' => false,
						],
					],
					'color' => [
						'label' => esc_html__('Box Border Color', 'xroof'),
						'default' => '',
					],
				],
				'selector' => '{{WRAPPER}} .hero__nav',
			]
		);
		$this->register_text_style_controls('hero_slider_nav_text', 'hero_nav', 'Nav Text');
		$this->add_control(
			'hero_slider_nav_text_border',
			[
				'label' => esc_html__('Nav Text Border', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__prev::after, {{WRAPPER}} .hero__next::after' => 'background: {{VALUE}} !important;',
				],
			]
		);
		$this->add_control(
			'hero_nav_btn_separator',
			[
				'type' => Controls_Manager::HEADING,
				'label' => sprintf(__('Nav Button', 'xroof')),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'hero_nav_btn_divider',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);
		$this->start_controls_tabs(
			'style_normal_tabs'
		);
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__('Normal', 'xroof'),
			]
		);
		$this->add_control(
			'hero_slider_nav_btn_bg',
			[
				'label' => esc_html__('Nav Button Background', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__btn' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'hero_slider_nav_btn_color',
			[
				'label' => esc_html__('Nav Button Icon Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__btn svg path' => 'fill: {{VALUE}} !important;',
				],
			]
		);
		$this->end_controls_tab();
 
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__('Hover', 'xroof'),
			]
		);
		$this->add_control(
			'hero_slider_nav_btn_hover_bg',
			[
				'label' => esc_html__('Nav Button Background', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__btn:hover' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'hero_slider_nav_btn_hover_color',
			[
				'label' => esc_html__('Nav Button Icon Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__btn:hover svg path' => 'fill: {{VALUE}} !important;',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	// Render Here
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		?>

		<section id="hero-2" class="hero hero--style-2">
			<div class="hero__container container">
				<div class="hero__content d-flex flex-column justify-content-between">
					<div class="hero__top flex-items-center row-gap-2 column-gap-5 flex-wrap justify-content-between">
						<?php if (!empty($settings['hero_title_text'])): ?>
							<div class="hero__left">
								<h1 class="hero__title title-xxl">
									<?php echo xroof_kses($settings['hero_title_text']); ?>
								</h1>
							</div>
						<?php endif; ?>

						<div class="hero__right">
							<?php if (!empty($settings['hero_desc'])): ?>
								<p class="hero__desc"><?php echo esc_html($settings['hero_desc']); ?></p>
							<?php endif; ?>

							<?php if (!empty($settings['hero_stats_list'])): ?>
								<div class="hero__stats d-flex flex-wrap">
									<?php foreach ($settings['hero_stats_list'] as $item): ?>
										<div class="hero__stat">
											<?php if (!empty($item['hero_stat_number'])): ?>
												<h3 class="hero__stat-number" stat-data-start="0"
													stat-data-end="<?php echo esc_attr($item['hero_stat_number']); ?>" data-duration="1000"
													data-format="full" data-suffix="<?php echo esc_attr($item['hero_stat_suffix']); ?>">
													<?php echo esc_html($item['hero_stat_number']); ?>
												</h3>
											<?php endif; ?>

											<?php if (!empty($item['hero_stat_text'])): ?>
												<p class="hero__stat-text"><?php echo esc_html($item['hero_stat_text']); ?></p>
											<?php endif; ?>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<?php if (!empty($settings['hero_img'])): ?>
						<div class="hero__img-wrapper">
							<img src="<?php echo esc_url($settings['hero_img']['url']); ?>" alt="Worker" class="hero__img">
						</div>
					<?php endif; ?>

					<div class="hero__nav flex-items-center gap-3 flex-wrap justify-content-between py-8 px-12">
						<div class="hero__prev flex-items-center gap-2 flex-shrink-0">
							<div class="hero__btn hero__btn--prev">
								<svg width="12" height="9" viewBox="0 0 12 9" fill="none">
									<path
										d="M0.208915 4.25204C0.206245 4.28641 0.20799 4.32098 0.214109 4.35491L0.214908 4.35751C0.223714 4.39871 0.239092 4.43824 0.260452 4.47456C0.277588 4.50568 0.298818 4.53437 0.323574 4.55986L3.91916 8.15544C3.95601 8.1936 4.00009 8.22403 4.04884 8.24497C4.09758 8.26591 4.15 8.27693 4.20305 8.27739C4.25609 8.27785 4.3087 8.26774 4.3578 8.24765C4.4069 8.22757 4.45151 8.1979 4.48902 8.16039C4.52653 8.12288 4.55619 8.07827 4.57628 8.02918C4.59637 7.98008 4.60647 7.92747 4.60601 7.87442C4.60555 7.82138 4.59453 7.76895 4.57359 7.72021C4.55266 7.67147 4.52222 7.62739 4.48406 7.59053L1.57044 4.67691L11.3928 4.67691C11.4987 4.67691 11.6004 4.63482 11.6753 4.5599C11.7502 4.48498 11.7923 4.38336 11.7923 4.2774C11.7923 4.17145 11.7502 4.06983 11.6753 3.99491C11.6004 3.91999 11.4987 3.87789 11.3928 3.87789L1.57044 3.87789L4.48406 0.964274C4.52222 0.927421 4.55266 0.883337 4.57359 0.834595C4.59453 0.785854 4.60555 0.73343 4.60601 0.680384C4.60647 0.627338 4.59637 0.57473 4.57628 0.525631C4.55619 0.476533 4.52653 0.431927 4.48902 0.394416C4.45151 0.356905 4.4069 0.327241 4.3578 0.307153C4.3087 0.287066 4.25609 0.276958 4.20305 0.277418C4.15 0.277879 4.09758 0.288899 4.04884 0.309837C4.00009 0.330775 3.95601 0.36121 3.91916 0.399368L0.323574 3.99495C0.317582 4.00094 0.313387 4.00773 0.307993 4.01413C0.302002 4.02097 0.296272 4.02803 0.290815 4.0353C0.269616 4.06209 0.251959 4.09149 0.238279 4.12279C0.23788 4.12359 0.23728 4.12399 0.23708 4.12479L0.236881 4.12539C0.220689 4.16579 0.211241 4.20857 0.208915 4.25204Z"
										fill="white" />
								</svg>
							</div>
							<span class="hero_nav hero__prev-text">Prev</span>
						</div>

						<div class="hero__next flex-items-center gap-2 flex-shrink-0">
							<span class="hero_nav hero__next-text">Next</span>
							<div class="hero__btn hero__btn--next">
								<svg width="12" height="9" viewBox="0 0 12 9" fill="none">
									<path
										d="M11.791 4.30277C11.7937 4.2684 11.7919 4.23383 11.7858 4.1999L11.785 4.1973C11.7762 4.1561 11.7608 4.11657 11.7395 4.08025C11.7224 4.04912 11.7011 4.02044 11.6764 3.99495L8.08078 0.39937C8.04393 0.361213 7.99984 0.330778 7.9511 0.30984C7.90236 0.288902 7.84994 0.277881 7.79689 0.27742C7.74384 0.276959 7.69124 0.287067 7.64214 0.307155C7.59304 0.327243 7.54843 0.356908 7.51092 0.394419C7.47341 0.43193 7.44375 0.476535 7.42366 0.525634C7.40357 0.574732 7.39346 0.627339 7.39392 0.680386C7.39439 0.733432 7.40541 0.785856 7.42634 0.834597C7.44728 0.883339 7.47772 0.927423 7.51587 0.964277L10.4295 3.8779L0.607161 3.8779C0.501204 3.8779 0.399587 3.91999 0.324664 3.99491C0.249742 4.06983 0.207651 4.17145 0.207651 4.27741C0.207651 4.38336 0.249742 4.48498 0.324664 4.5599C0.399587 4.63482 0.501204 4.67692 0.607161 4.67692L10.4295 4.67692L7.51587 7.59054C7.47772 7.62739 7.44728 7.67147 7.42634 7.72021C7.40541 7.76896 7.39439 7.82138 7.39392 7.87443C7.39346 7.92747 7.40357 7.98008 7.42366 8.02918C7.44375 8.07828 7.47341 8.12288 7.51092 8.16039C7.54843 8.1979 7.59304 8.22757 7.64214 8.24766C7.69124 8.26774 7.74384 8.27785 7.79689 8.27739C7.84994 8.27693 7.90236 8.26591 7.9511 8.24497C7.99984 8.22403 8.04393 8.1936 8.08078 8.15544L11.6764 4.55986C11.6824 4.55387 11.6866 4.54707 11.6919 4.54068C11.6979 4.53384 11.7037 4.52678 11.7091 4.51951C11.7303 4.49272 11.748 4.46332 11.7617 4.43202C11.7621 4.43122 11.7627 4.43082 11.7629 4.43002L11.7631 4.42942C11.7793 4.38902 11.7887 4.34624 11.791 4.30277Z"
										fill="black" />
								</svg>
							</div>
						</div>
					</div>

					<?php if (!empty($settings['hero_main_title'])): ?>
						<h2 class="hero__bg-text"><?php echo esc_html($settings['hero_main_title']); ?></h2>
					<?php endif; ?>
				</div>

				<?php if (!empty($settings['hero_gallery'])): ?>
					<div id="hero-banner-2" class="hero__bg-slider">
						<?php foreach ($settings['hero_gallery'] as $image): ?>
							<div class="hero__bg-slide" data-bg="<?php echo esc_url($image['url']); ?>"></div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<div id="hero-particles"></div>
		</section>

		<?php
	}
}

$widgets_manager->register(new Xroof_Hero_Widget_2());