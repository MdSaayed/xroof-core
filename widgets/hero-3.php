<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
	exit;


class Xroof_Hero_Widget_3 extends Widget_Base
{
	use Xroof_Controls_Trait;

	public function get_name()
	{
		return 'xroof-hero-3';
	}

	public function get_title()
	{
		return esc_html__('Xroof Hero 3', 'xroof');
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
			'hero_content_section_',
			[
				'label' => esc_html__('Content', 'xroof'),
			]
		);
		$this->add_universal_input_control('hero_subtitle_text', 'Subtitle', 'textarea', [
			'default' => 'Great Design Services Without The Roofing Solutions!',
			'placeholder' => 'Enter subtitle',
			'row' => 3,
		]);
		$this->add_universal_input_control('hero_title_text', 'Title', 'text', [
			'default' => 'Roofing',
			'placeholder' => 'Enter hero title',
			'row' => 3,
		]);
		$this->add_universal_input_control('hero_title_text_2', 'Title 2', 'text', [
			'default' => 'Solutions',
			'placeholder' => 'Enter hero title 2',
			'row' => 3,
		]);
		$this->add_universal_input_control('hero_desc_text', 'Description', 'textarea', [
			'default' => 'Your roof is your first line of defense against the elements — and we’re here to make sure it stays strong, beautiful, and durable. With expert craftsmanship, quality materials, and a commitment to excellence, we provide roofing services',
			'placeholder' => 'Enter hero description',
			'row' => 3,
		]);
		$this->add_universal_input_control('hero_btn_text', 'Button Text', 'text', [
			'default' => 'View all Services',
			'placeholder' => 'Enter Button Text',
			'row' => 3,
		]);
		$this->add_control(
			'hero_btn_link',
			[
				'label' => esc_html__('Button Link', 'xroof'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['#', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'hero_reviews_section_',
			[
				'label' => esc_html__('Reviews', 'xroof'),
			]
		);
		$this->add_universal_input_control('hero_reviews_text', 'Reviews Text', 'text', [
			'default' => 'Excellent 4.000+ Reviews',
			'placeholder' => 'Enter your text',
			'row' => 3,
		]);
		$this->add_control(
			'hero_reviews_avatar',
			[
				'label' => esc_html__('Select Avatars', 'xroof'),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'description' => esc_html__('Recommended image size: 48px × 48px for best visual consistency.', 'xroof'),
				'default' => [
					[
						'id' => 0,
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					[
						'id' => 0,
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					[
						'id' => 0,
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
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

		$this->start_controls_section(
			'hero_social_section_',
			[
				'label' => esc_html__('Social Links', 'xroof'),
			]
		);
		$this->add_control(
			'social_link_switch',
			[
				'label' => esc_html__('Show Social Links', 'xroof'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'xroof'),
				'label_off' => esc_html__('Hide', 'xroof'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'x_link',
			[
				'label' => esc_html__('X(Twitter) URL', 'xroof'),
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
			'facebook_link',
			[
				'label' => esc_html__('Facebook URL', 'xroof'),
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
			'dribbble_link',
			[
				'label' => esc_html__('Dribbble URL', 'xroof'),
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
			'instagram_link',
			[
				'label' => esc_html__('Instagram URL', 'xroof'),
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
			'hero_video_section_',
			[
				'label' => esc_html__('Video & Links', 'xroof'),
			]
		);
		$this->add_control(
			'video_thumbnail',
			[
				'label' => esc_html__('Thumbnail Image', 'xroof'),
				'description' => esc_html__('Recommended image size: 350 × 155 pixels.', 'xroof'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'video_link',
			[
				'label' => esc_html__('Video URL', 'xroof'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => get_template_directory_uri() . 'https://youtu.be/u31qwQUeGuM',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();
	}

	// Register Style Section
	protected function register_style_section()
	{
		$this->start_controls_section(
			'hero_content_style_section_',
			[
				'label' => esc_html__('Content', 'xroof'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->register_text_style_controls('hero_subtitle', 'hero__subtitle', 'Subtitle');
		$this->register_text_style_controls('hero_title', 'hero__title', 'Title');
		$this->register_text_style_controls('hero_desc', 'hero__desc', 'Description');
		$this->register_text_style_controls('hero_bg_desc', 'hero__bg-text', 'Main Title');
		$this->register_text_style_controls('hero_button', 'hero__btn', 'Button');
		$this->start_controls_tabs(
			'button_style_tabs'
		);
		$this->start_controls_tab(
			'button_style_normal_tab',
			[
				'label' => esc_html__('Normal', 'xroof'),
			]
		);
		$this->add_control(
			'btn_text_color',
			[
				'label' => esc_html__('Text Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_circle_color',
			[
				'label' => esc_html__('Circle Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__btn::before' => 'background: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'button_style_hover_tab',
			[
				'label' => esc_html__('Hover', 'xroof'),
			]
		);
		$this->add_control(
			'btn_text_hover_color',
			[
				'label' => esc_html__('Text Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_circle_hover_color',
			[
				'label' => esc_html__('Circle Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__btn:hover::before' => 'background: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'hero_reviews_style_section_',
			[
				'label' => esc_html__('Reviews', 'xroof'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->register_text_style_controls('review_text', 'hero__review-desc', 'Review Text');
		$this->register_border_radius_control('avatar_radius', 'hero__avatar-wrap');
		$this->end_controls_section();

		$this->start_controls_section(
			'hero_social_style_section_',
			[
				'label' => esc_html__('Social Links', 'xroof'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'social_icon_style_tabs'
		);
		$this->start_controls_tab(
			'social_icon__normal_tab',
			[
				'label' => esc_html__('Normal', 'xroof'),
			]
		);
		$this->add_control(
			'social_icon_bg_color',
			[
				'label' => esc_html__('Icon Background Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__socials-link' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'social_icon_color',
			[
				'label' => esc_html__('Icon Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__socials-link svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'social_icon_border_color',
			[
				'label' => esc_html__('Icon Border Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__socials-link' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'social_icon__hover_tab',
			[
				'label' => esc_html__('Hover', 'xroof'),
			]
		);
		$this->add_control(
			'social_icon_bg_hover_color',
			[
				'label' => esc_html__('Icon Background Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__socials-link:hover' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'social_icon_hover_color',
			[
				'label' => esc_html__('Icon Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__socials-link:hover svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'social_icon_border_hover_color',
			[
				'label' => esc_html__('Icon Border Color', 'xroof'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero__socials-link:hover' => 'border-color: {{VALUE}}',
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

		<section class="hero hero--style-3">
			<div class="hero__container container py-15 py-xxl-20">
				<div class="hero__top-area d-flex">
					<?php if (!empty($settings['hero_subtitle_text'])): ?>
						<div class="hero__subtitle-wrap">
							<p class="hero__subtitle mb-0">
								<?php echo esc_html($settings['hero_subtitle_text']); ?>
							</p>
						</div>
					<?php endif; ?>

					<div class="hero__review-area">
						<?php if (!empty($settings['hero_reviews_text'])): ?>
							<p class="hero__review-desc mb-6">
								<?php echo esc_html($settings['hero_reviews_text']); ?>
							</p>
						<?php endif; ?>

						<?php if (!empty($settings['hero_reviews_avatar'])): ?>
							<div class="hero__review-avatars d-flex align-items-center">
								<?php foreach ($settings['hero_reviews_avatar'] as $image): ?>
									<div class="hero__avatar-wrap">
										<img src="<?php echo esc_url($image['url']); ?>" alt="Customer Avatar" class="hero__avatar">
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="hero__middle-area mt-8 mt-md-0">
					<?php if (!empty($settings['hero_title_text'])): ?>
						<div class="hero__middle-left">
							<h1 class="hero__title">
								<?php echo xroof_kses($settings['hero_title_text']); ?>
							</h1>
						</div>
					<?php endif; ?>

					<div class="hero__middle-right">
						<?php if (!empty($settings['hero_desc_text'])): ?>
							<p class="hero__desc mb-0">
								<?php echo esc_html($settings['hero_desc_text']); ?>
							</p>
						<?php endif; ?>

						<?php if (!empty($settings['hero_btn_text'])): ?>
							<div class="hero__btn-wrap d-flex justify-content-between ">
								<a <?php echo xroof_get_link_attribute($settings['hero_btn_link']); ?>
									class="hero__btn body-text mt-8">
									<?php echo esc_html($settings['hero_btn_text']); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="hero__bottom-area mt-10 mt-xxl-0">
					<?php if (!empty($settings['video_thumbnail'])): ?>
						<div class="hero__video-wrap">
							<img src="<?php echo esc_url($settings['video_thumbnail']['url']); ?>" alt="Video Thumb"
								class="hero__video-thumb">

							<a <?php echo xroof_get_link_attribute($settings['video_link']); ?>
								class="hero__video-play-btn glightbox">
								<svg xmlns="http://www.w3.org/2000/svg" width="81" height="81" viewBox="0 0 81 81" fill="none">
									<circle cx="40.1206" cy="40.6809" r="40" fill="white" fill-opacity="0.3" />
									<circle cx="40.1206" cy="40.6806" r="33.4612" fill="white" fill-opacity="0.5" />
									<rect x="24.8682" y="26.4842" width="33.7271" height="33.7271" fill="#0B1714" />
									<path
										d="M40.1205 12.8351C24.8274 12.8351 12.3872 25.3269 12.3872 40.6807C12.3872 56.0345 24.8274 68.5262 40.1205 68.5262C55.4136 68.5262 67.8539 56.0345 67.8539 40.6807C67.8539 25.3269 55.4136 12.8351 40.1205 12.8351ZM51.1457 41.6563L34.968 52.0983C34.7817 52.2191 34.5646 52.2832 34.3428 52.283C34.1532 52.283 33.9614 52.2354 33.7899 52.1414C33.6074 52.0418 33.4551 51.8945 33.3491 51.7153C33.243 51.536 33.1871 51.3313 33.1872 51.1228V30.2386C33.1872 29.8137 33.4174 29.4239 33.7899 29.22C34.1555 29.0183 34.6136 29.0307 34.968 29.263L51.1457 39.7051C51.4753 39.9181 51.6761 40.2864 51.6761 40.6807C51.6761 41.075 51.4753 41.4432 51.1457 41.6563Z"
										fill="#E9E9E9" />
								</svg>
							</a>
						</div>
					<?php endif; ?>

					<?php if (!empty($settings['hero_title_text_2'])): ?>
						<h2 class="hero__title">
							<?php echo xroof_kses($settings['hero_title_text_2']); ?>
						</h2>
					<?php endif; ?>
				</div>

				<?php if ($settings['social_link_switch'] == 'yes'): ?>
					<div class="hero__socials">
						<?php if (!empty($settings['x_link']['url'])): ?>
							<a <?php echo xroof_get_link_attribute($settings['x_link']); ?> class="hero__socials-link">
								<svg width="20" height="20" viewBox="0 0 13 13" fill="none">
									<path
										d="M7.45359 5.8791L11.7951 0.697266H10.7663L6.99657 5.19658L3.98572 0.697266H0.513062L5.06606 7.50102L0.513062 12.935H1.54191L5.52281 8.18354L8.70249 12.935H12.1752L7.45334 5.8791H7.45359ZM6.04444 7.56097L5.58313 6.88347L1.91262 1.49252H3.49287L6.45501 5.84319L6.91633 6.52069L10.7668 12.1759H9.18651L6.04444 7.56123V7.56097Z"
										fill="white" />
								</svg>
							</a>
						<?php endif; ?>
						<?php if (!empty($settings['facebook_link']['url'])): ?>
							<a <?php echo xroof_get_link_attribute($settings['facebook_link']); ?> class="hero__socials-link">
								<svg width="15" height="20" viewBox="0 0 7 13" fill="none">
									<path
										d="M4.34408 12.7748V7.33868H6.16803L6.44168 5.2195H4.34408V3.86671C4.34408 3.25335 4.51371 2.83535 5.39426 2.83535L6.51551 2.83489V0.939415C6.3216 0.914217 5.656 0.856445 4.88131 0.856445C3.26363 0.856445 2.15614 1.84386 2.15614 3.65683V5.2195H0.32666V7.33868H2.15614V12.7748H4.34408Z"
										fill="black" />
								</svg>
							</a>
						<?php endif; ?>
						<?php if (!empty($settings['dribbble_link']['url'])): ?>
							<a <?php echo xroof_get_link_attribute($settings['dribbble_link']); ?> class="hero__socials-link">
								<svg width="26" height="26" fill="#fff" viewBox="0 0 256 256" id="Flat">
									<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
									<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
									<g>
										<path
											d="M86.26123,32.74414a103.85849,103.85849,0,0,1,100.148,9.25537,153.22442,153.22442,0,0,1-44.543,40.48438A169.26114,169.26114,0,0,0,86.26123,32.74414Zm41.31543,57.28955A152.978,152.978,0,0,0,69.4624,42.09863a104.382,104.382,0,0,0-41.543,57.561A151.8095,151.8095,0,0,0,64,103.99805,151.0488,151.0488,0,0,0,127.57666,90.03369Zm104.22119,31.65772a103.76547,103.76547,0,0,0-32.88965-69.689,169.34119,169.34119,0,0,1-48.39453,43.94092,167.29388,167.29388,0,0,1,13.542,29.89746,168.13983,168.13983,0,0,1,67.74219-4.14941Zm-63.33008,19.53125a167.82141,167.82141,0,0,1,4.44922,38.46972,168.65237,168.65237,0,0,1-6.084,44.77832,104.24218,104.24218,0,0,0,64.68213-86.65185,152.38875,152.38875,0,0,0-63.04737,3.40381Zm-19.64062-10.45459a151.39932,151.39932,0,0,0-12.3916-27.20557A166.974,166.974,0,0,1,64,119.99805a167.82812,167.82812,0,0,1-39.23633-4.6377,103.89032,103.89032,0,0,0,35.958,91.88281A168.9649,168.9649,0,0,1,148.82715,130.76807ZM73.78369,216.72021a103.93363,103.93363,0,0,0,74.58447,13.27051,152.66635,152.66635,0,0,0,8.54883-50.29834,151.825,151.825,0,0,0-3.73291-33.46289A152.89185,152.89185,0,0,0,73.78369,216.72021Z">
										</path>
									</g>
								</svg>
							</a>
						<?php endif; ?>
						<?php if (!empty($settings['instagram_link']['url'])): ?>
							<a <?php echo xroof_get_link_attribute($settings['instagram_link']); ?> class="hero__socials-link">
								<svg width="20" height="20" viewBox="0 0 13 13" fill="none">
									<g clip-path="url(#clip0_619_1630)">
										<path
											d="M9.30788 0.697266H3.84191C2.06296 0.697266 0.615723 2.18328 0.615723 4.0099V9.62241C0.615723 11.4489 2.06296 12.9349 3.84191 12.9349H9.30797C11.0868 12.9349 12.5341 11.4489 12.5341 9.62241V4.0099C12.5341 2.18328 11.0868 0.697266 9.30788 0.697266ZM11.8354 9.62241C11.8354 11.0533 10.7016 12.2175 9.30788 12.2175H3.84191C2.44823 12.2175 1.31443 11.0533 1.31443 9.62241V4.0099C1.31443 2.57887 2.44823 1.41469 3.84191 1.41469H9.30797C10.7016 1.41469 11.8354 2.57887 11.8354 4.0099V9.62241Z"
											fill="black" />
										<path
											d="M6.57487 3.46973C4.77792 3.46973 3.31604 4.97077 3.31604 6.81587C3.31604 8.66098 4.77792 10.162 6.57487 10.162C8.37182 10.162 9.8337 8.66098 9.8337 6.81587C9.8337 4.97077 8.37182 3.46973 6.57487 3.46973ZM6.57487 9.4446C5.16328 9.4446 4.01474 8.26538 4.01474 6.81587C4.01474 5.36646 5.16328 4.18715 6.57487 4.18715C7.98656 4.18715 9.135 5.36646 9.135 6.81587C9.135 8.26538 7.98656 9.4446 6.57487 9.4446Z"
											fill="black" />
										<path
											d="M9.91168 2.28125C9.38065 2.28125 8.94873 2.72483 8.94873 3.27C8.94873 3.81526 9.38065 4.25884 9.91168 4.25884C10.4427 4.25884 10.8747 3.81526 10.8747 3.27C10.8747 2.72474 10.4427 2.28125 9.91168 2.28125ZM9.91168 3.54132C9.76601 3.54132 9.64743 3.41957 9.64743 3.27C9.64743 3.12033 9.76601 2.99868 9.91168 2.99868C10.0574 2.99868 10.176 3.12033 10.176 3.27C10.176 3.41957 10.0574 3.54132 9.91168 3.54132Z"
											fill="black" />
									</g>
									<defs>
										<clipPath id="clip0_619_1630">
											<rect width="11.9184" height="12.2377" fill="white"
												transform="translate(0.615723 0.697266)" />
										</clipPath>
									</defs>
								</svg>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>

		<?php
	}
}

$widgets_manager->register(new Xroof_Hero_Widget_3());