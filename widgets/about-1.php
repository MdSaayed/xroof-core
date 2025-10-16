<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Xroof\Core\Traits\Xroof_Controls_Trait;

if (!defined('ABSPATH')) {
	exit;
}

class Xroof_About_Widget_1 extends Widget_Base
{
	use Xroof_Controls_Trait;

	public function get_name()
	{
		return 'xroof-about-1';
	}

	public function get_title()
	{
		return esc_html__('Xroof About 1', 'xroof');
	}

	public function get_icon()
	{
		return 'eicon-wordart';
	}

	public function get_categories()
	{
		return ['xroof-widget-cat'];
	}

	public function get_keywords()
	{
		return ['about', 'xroof', 'company', 'info'];
	}

	protected function register_controls()
	{
		$this->register_content_controls();
		$this->register_style_controls();
	}

	protected function register_content_controls()
	{
		$this->start_controls_section(
			'about-content-section',
			[
				'label' => esc_html__('Content', 'xroof'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->start_controls_tabs('left-side-tabs');
		$this->start_controls_tab(
			'left-side-content-tab',
			[
				'label' => esc_html__('Image & Stat', 'xroof'),
			]
		);

		$this->add_universal_input_control('about-main-image', 'About Main Image', 'media', [
			'default' => [
				'url' => get_template_directory_uri() . '/assets/img/about/about-img-1.png',
			],
		]);

		$this->add_universal_input_control('about-shape-image', 'Shape Image', 'media', [
			'default' => [
				'url' => get_template_directory_uri() . '/assets/img/shape/about-shape-1.png',
			],
		]);

		$this->add_universal_input_control('about-stat-number', 'Stat Number', 'text', [
			'default' => '99%',
			'placeholder' => esc_html__('Enter stat number', 'xroof'),
		]);

		$this->add_universal_input_control('about-stat-text', 'Stat Text', 'text', [
			'default' => 'Satisfied Customers',
			'placeholder' => esc_html__('Enter stat text', 'xroof'),
		]);

		$this->add_universal_input_control('stat-icon', 'Stat Text', 'media', [
			'default' => [
				'url' => '',
			],
			'description' => esc_html__('Upload SVG icon for stat section (default icon will be used if none uploaded)', 'xroof'),
		]);

		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->start_controls_tabs('right-side-tabs');
		$this->start_controls_tab(
			'right-side-content-tab',
			[
				'label' => esc_html__('Right Side Content', 'xroof'),
			]
		);

		$this->register_subtitle_content_controls('about_subtitle');

		$this->add_universal_input_control('about_title', 'Title', 'text', [
			'default' => 'Committed to Excellence in Roofing Services',
			'placeholder' => esc_html__('Enter title text', 'xroof'),
		]);

		$this->add_universal_input_control('about_description', 'Description', 'textarea', [
			'default' => 'We deliver top-quality roofing services with precision and care. Our skilled team ensures every project is completed efficiently, using durable materials to provide long-lasting protection and peace of mind for your home or business.',
			'placeholder' => esc_html__('Enter description', 'xroof'),
			'rows' => 5,
		]);

		$this->add_control(
			'service_items',
			[
				'label' => esc_html__('Service Items', 'xroof'),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'service_icon',
						'label' => esc_html__('Icon', 'xroof'),
						'type' => Controls_Manager::MEDIA,
						'media_types' => ['svg'],
						'default' => [
							'url' => '',
						],
						'description' => esc_html__('Upload SVG icon for service item (default icon will be used if none uploaded)', 'xroof'),
					],
					[
						'name' => 'service_title',
						'label' => esc_html__('Title', 'xroof'),
						'type' => Controls_Manager::TEXT,
						'default' => 'Quality Workmanship',
						'label_block' => true,
					],
					[
						'name' => 'service_text',
						'label' => esc_html__('Description', 'xroof'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => 'We focus on precision and attention to detail, delivering results that meet the highest standards every single time.',
						'rows' => 3,
					],
				],
				'default' => [
					[
						'service_title' => 'Quality Workmanship',
						'service_text' => 'We focus on precision and attention to detail, delivering results that meet the highest standards every single time.',
						'service_icon' => ['url' => ''],
					],
					[
						'service_title' => 'Reliable Customer Support',
						'service_text' => 'Our team is always ready to assist you with timely solutions, ensuring a smooth and worry-free experience from start to finish.',
						'service_icon' => ['url' => ''],
					],
				],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'about-button-section',
			[
				'label' => esc_html__('Buttons', 'xroof'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->register_button_content_controls('about-btn', 'about__btn', 'Appointment');
		$this->register_button_content_controls('about-btn-info', 'about__btn-info', 'Phone');

		$this->end_controls_section();
	}

	protected function register_style_controls()
	{
		// Section Styles
		$this->start_controls_section(
			'about-style-section',
			[
				'label' => esc_html__('Section', 'xroof'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_background_controls('about-section-background', 'about--style-1', 'About Background');
		$this->register_spacing_controls('about-section-spacing', 'about');
		$this->end_controls_section();

		$this->start_controls_section(
			'left_side_style_section',
			[
				'label' => esc_html__('Left Side', 'xroof'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'label' => esc_html__('Image Box Shadow', 'xroof'),
				'selector' => '{{WRAPPER}} .about__img',
			]
		);

		$this->add_control(
			'stat_box_heading',
			[
				'label' => esc_html__('Stat Box', 'xroof'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_background_controls('stat_box_background', 'about__stat', 'Stat Box Background');
		$this->register_text_style_controls('stat-number-style', 'about__stat-number', 'Stat Number');
		$this->register_text_style_controls('stat-text-style', 'about__stat-text', 'Stat Text');

		$this->add_control(
			'stat_icon_section',
			[
				'label' => esc_html__('Stat Icon', 'xroof'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs('stat_icon_tabs');
		$this->add_universal_input_control('stat_icon_fill_color', 'Stat Icon Fill Color', 'color', [
			'selectors' => [
				'{{WRAPPER}} .stat__icon svg path' => 'fill: {{VALUE}};',
			],
		]);
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Right Side Styles
		$this->start_controls_section(
			'right_side_style_section',
			[
				'label' => esc_html__('Right Side', 'xroof'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->register_subtitle_style_controls('about_subtitle');
		$this->register_text_style_controls('about_title_style', 'about__title', 'Title');

		// Service Items Styles
		$this->add_control(
			'service_items_heading',
			[
				'label' => esc_html__('Service Items', 'xroof'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs('service_icon_tabs');

		$this->start_controls_tab(
			'service_icon_normal',
			[
				'label' => esc_html__('Normal', 'xroof'),
			]
		);

		$this->add_control(
			'service_item_icon_bg_color',
			[
				'label' => esc_html__('Background Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services__item-icon-wrap' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'service_item_icon_fill_color',
			[
				'label' => esc_html__('Fill Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services__item-icon-wrap svg path' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'service_icon_hover',
			[
				'label' => esc_html__('Hover', 'xroof'),
			]
		);

		$this->add_control(
			'service_item_icon_bg_hover_color',
			[
				'label' => esc_html__('Background Hover Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services__item-icon-wrap:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'service_item_icon_fill_hover_color',
			[
				'label' => esc_html__('Fill Hover Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services__item-icon-wrap:hover svg path' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'service_item_title_typography',
				'label' => esc_html__('Service Item Title Typography', 'xroof'),
				'selector' => '{{WRAPPER}} .services__item-title',
			]
		);

		$this->add_control(
			'service_item_title_color',
			[
				'label' => esc_html__('Service Item Title Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services__item-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'service_item_text_typography',
				'label' => esc_html__('Service Item Text Typography', 'xroof'),
				'selector' => '{{WRAPPER}} .services__item-text',
			]
		);

		$this->add_control(
			'service_item_text_color',
			[
				'label' => esc_html__('Service Item Text Color', 'xroof'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services__item-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Button Styles
		$this->start_controls_section(
			'button_style_section',
			[
				'label' => esc_html__('Buttons', 'xroof'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->register_button_style_controls('about-btn', 'about__btn', 'Button 01');
		$this->register_button_style_controls('about-btn-info', 'about__btn-info', 'Button 02');

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$default_stat_icon = '
					<svg width="58" height="46" viewBox="0 0 58 46" fill="none">
                      <path
                        d="M52.5897 10.2265C52.4143 9.7844 52.0707 9.42996 51.6342 9.24093C51.1978 9.05191 50.7042 9.04373 50.2617 9.21821L43.8273 11.7636C43.3853 11.9391 43.0309 12.2827 42.8419 12.7191C42.6529 13.1556 42.6447 13.6491 42.819 14.0916L43.0888 14.7735C40.387 16.1104 38.4078 16.4772 37.3607 15.8278C37.3471 15.8193 37.3332 15.8114 37.319 15.804C36.0868 15.1615 34.7316 14.7898 33.344 14.7135C31.9565 14.6373 30.5686 14.8585 29.2735 15.3622C26.9882 14.2471 24.3198 14.1353 21.336 15.0315C20.1779 15.3994 18.923 15.3101 17.8288 14.7817C17.2915 14.5326 16.7026 14.26 16.0622 13.964C16.1967 13.5322 16.163 13.0656 15.968 12.6575C15.773 12.2495 15.4311 11.9302 15.0106 11.7636L8.57547 9.21821C8.13298 9.04376 7.63937 9.05195 7.20291 9.24097C6.76645 9.42999 6.42279 9.78441 6.2473 10.2265L0.972325 23.5624C0.797887 24.0049 0.806078 24.4985 0.995101 24.9349C1.18412 25.3713 1.53854 25.7149 1.9806 25.8904L8.41565 28.4358C8.82446 28.5977 9.27849 28.6035 9.69136 28.4524C10.1042 28.3012 10.4471 28.0035 10.6547 27.616L11.2712 27.8673C11.3518 27.8975 11.4217 27.9509 11.472 28.0209C11.5222 28.0909 11.5505 28.1742 11.5533 28.2603C11.5667 28.4777 11.5995 28.7597 11.6376 29.0862C11.6822 29.4734 11.7374 29.9439 11.7732 30.4313L10.2963 32.9897C9.96711 33.5591 9.82405 34.2171 9.88705 34.8718C9.95005 35.5265 10.216 36.1451 10.6477 36.6413C11.0794 37.1375 11.6553 37.4864 12.2949 37.6394C12.9346 37.7924 13.6061 37.7417 14.2155 37.4945C14.3197 38.2471 14.6923 38.9368 15.2647 39.4365C15.8371 39.9362 16.5707 40.2123 17.3305 40.2139C17.7399 40.2137 18.1453 40.1345 18.5248 39.9809C18.6286 40.7339 19.001 41.424 19.5735 41.9241C20.1459 42.4242 20.8799 42.7006 21.64 42.7023C21.9192 42.702 22.1972 42.6652 22.4668 42.5927C22.5919 42.5588 22.7149 42.5174 22.8351 42.4687C22.8531 42.5972 22.8788 42.7246 22.9121 42.85C23.0734 43.4532 23.41 43.995 23.8793 44.4068C24.3486 44.8187 24.9295 45.0821 25.5485 45.1637C26.1675 45.2453 26.7968 45.1415 27.3568 44.8654C27.9168 44.5892 28.3823 44.1532 28.6945 43.6124L28.7794 43.4652L29.4887 43.8747C30.0344 44.1904 30.6623 44.3353 31.2912 44.2909C31.9201 44.2464 32.5213 44.0145 33.0172 43.6252C33.5131 43.2358 33.881 42.7069 34.0735 42.1065C34.2659 41.5061 34.2741 40.8618 34.097 40.2567C34.5629 40.2499 35.0214 40.1396 35.4394 39.9337C35.8574 39.7279 36.2244 39.4317 36.5138 39.0666C36.8032 38.7015 37.0078 38.2766 37.1128 37.8227C37.2179 37.3687 37.2206 36.8971 37.1209 36.442C37.2088 36.4494 37.2966 36.4544 37.3842 36.4544C37.869 36.4558 38.3476 36.3454 38.7828 36.1318C39.218 35.9181 39.5981 35.607 39.8935 35.2226C40.1889 34.8382 40.3917 34.3908 40.4861 33.9153C40.5805 33.4398 40.5639 32.9489 40.4377 32.4808C40.4296 32.4503 40.4202 32.4204 40.4112 32.3904C40.6531 32.3823 40.8934 32.3467 41.1273 32.2843C41.6765 32.1386 42.176 31.8468 42.5727 31.44C42.9695 31.0333 43.2488 30.5267 43.3809 29.974L48.282 27.7814C48.5116 28.1168 48.8485 28.3643 49.2372 28.4832C49.626 28.6021 50.0436 28.5854 50.4216 28.4358L56.8566 25.8905C57.2986 25.715 57.653 25.3714 57.842 24.9349C58.0311 24.4985 58.0393 24.0049 57.8649 23.5624L52.5897 10.2265ZM8.90818 27.1905L2.47313 24.645C2.36144 24.6002 2.27196 24.513 2.22413 24.4026C2.1763 24.2921 2.17397 24.1672 2.21766 24.0551L7.49275 10.7191C7.51468 10.6636 7.5474 10.6131 7.58901 10.5703C7.63062 10.5275 7.6803 10.4934 7.73517 10.47C7.79259 10.445 7.85455 10.432 7.9172 10.432C7.97387 10.432 8.03003 10.4427 8.08272 10.4635L14.5178 13.0089C14.6295 13.0537 14.719 13.1408 14.7669 13.2513C14.8147 13.3618 14.817 13.4867 14.7732 13.5989L9.49825 26.9349C9.45371 27.0469 9.3666 27.1367 9.256 27.1846C9.14541 27.2325 9.02034 27.2346 8.90818 27.1905ZM12.1216 36.1438C11.7054 35.9012 11.4019 35.504 11.2773 35.0386C11.1526 34.5733 11.2169 34.0775 11.4561 33.6594L13.2719 30.5143C13.513 30.0966 13.9102 29.7918 14.3761 29.667C14.6068 29.6051 14.8474 29.5894 15.0841 29.6205C15.3209 29.6517 15.5492 29.7292 15.7561 29.8486C15.9629 29.968 16.1442 30.127 16.2896 30.3164C16.435 30.5059 16.5416 30.7221 16.6034 30.9528C16.6653 31.1835 16.681 31.4241 16.6499 31.6609C16.6187 31.8976 16.5412 32.126 16.4218 32.3328L14.6059 35.478C14.3643 35.8953 13.9671 36.1997 13.5014 36.3245C13.0357 36.4493 12.5395 36.3843 12.1216 36.1438ZM17.8112 38.8107C17.464 38.9046 17.0967 38.8932 16.756 38.778C16.4152 38.6629 16.1163 38.4491 15.8973 38.1638C15.6782 37.8785 15.5488 37.5346 15.5255 37.1756C15.5022 36.8167 15.586 36.4589 15.7663 36.1477L17.5822 33.0025V33.0017L18.7318 31.0112C18.8512 30.8044 19.0102 30.6231 19.1997 30.4777C19.3891 30.3324 19.6054 30.2257 19.8361 30.1639C20.0667 30.1021 20.3073 30.0864 20.5441 30.1175C20.7809 30.1487 21.0092 30.2262 21.216 30.3456C21.4229 30.4651 21.6041 30.624 21.7495 30.8135C21.8949 31.003 22.0015 31.2192 22.0633 31.4499C22.1251 31.6806 22.1409 31.9212 22.1097 32.158C22.0785 32.3948 22.001 32.6231 21.8816 32.8299L18.9162 37.9663C18.797 38.1731 18.6379 38.3542 18.4483 38.4991C18.2586 38.6441 18.0421 38.75 17.8112 38.8107ZM22.121 41.2989C21.7738 41.3928 21.4065 41.3814 21.0657 41.2663C20.725 41.1511 20.4261 40.9373 20.207 40.652C19.988 40.3667 19.8586 40.0228 19.8353 39.6638C19.812 39.3049 19.8958 38.9471 20.0761 38.6359L22.3469 34.7018C22.4664 34.495 22.6254 34.3137 22.8149 34.1683C23.0044 34.0229 23.2207 33.9163 23.4514 33.8545C23.6821 33.7928 23.9228 33.777 24.1595 33.8082C24.3963 33.8394 24.6247 33.917 24.8315 34.0364C25.0383 34.1559 25.2196 34.3149 25.365 34.5044C25.5103 34.6939 25.617 34.9102 25.6788 35.1409C25.7405 35.3716 25.7563 35.6123 25.7251 35.8491C25.6939 36.0859 25.6163 36.3142 25.4969 36.521L24.8897 37.5727L23.2258 40.4548C23.1066 40.6616 22.9475 40.8427 22.7577 40.9876C22.568 41.1325 22.3514 41.2383 22.1205 41.2989H22.121ZM27.5358 42.9428C27.2947 43.3606 26.8974 43.6655 26.4315 43.7905C25.9655 43.9154 25.469 43.8501 25.0511 43.6089C24.6333 43.3678 24.3284 42.9705 24.2035 42.5045C24.0786 42.0386 24.1439 41.5421 24.385 41.1242L26.0499 38.2406C26.2912 37.823 26.6886 37.5184 27.1545 37.3938C27.6205 37.2692 28.1168 37.3348 28.5344 37.5762C28.952 37.8175 29.2566 38.2149 29.3812 38.6808C29.5058 39.1468 29.4402 39.6431 29.1988 40.0607L27.5358 42.9428ZM32.644 42.0492C32.4024 42.4665 32.0052 42.7709 31.5394 42.8957C31.0737 43.0205 30.5775 42.9554 30.1597 42.7149L29.4504 42.3054L30.3597 40.7304C30.6829 40.1718 30.826 39.5271 30.7696 38.8842L32.0409 39.6053C32.437 39.8565 32.7208 40.2509 32.8331 40.7063C32.9453 41.1616 32.8774 41.6428 32.6434 42.0492H32.644ZM41.8853 30.146C41.6428 30.5623 41.2456 30.8658 40.7803 30.9905C40.3149 31.1152 39.8192 31.0509 39.401 30.8118L38.9691 30.5623L35.0914 28.3236C34.9377 28.2362 34.7557 28.2131 34.585 28.2594C34.4144 28.3058 34.269 28.4177 34.1805 28.5709C34.0921 28.724 34.0679 28.9059 34.1131 29.0769C34.1583 29.2478 34.2692 29.394 34.4218 29.4834L38.2995 31.7223C38.5064 31.8417 38.6876 32.0007 38.833 32.1901C38.9784 32.3796 39.085 32.5959 39.1468 32.8266C39.2086 33.0572 39.2244 33.2978 39.1932 33.5346C39.162 33.7714 39.0845 33.9997 38.9651 34.2065C38.8457 34.4134 38.6867 34.5946 38.4972 34.74C38.3078 34.8854 38.0915 34.992 37.8608 35.0538C37.6302 35.1156 37.3896 35.1314 37.1528 35.1002C36.916 35.069 36.6877 34.9915 36.4809 34.8721L35.6184 34.3742L35.6168 34.3732L32.1712 32.3839C32.0174 32.2951 31.8346 32.271 31.663 32.317C31.4915 32.363 31.3452 32.4752 31.2564 32.629C31.1676 32.7829 31.1435 32.9657 31.1895 33.1372C31.2355 33.3088 31.3477 33.4551 31.5015 33.5439L34.948 35.5336C35.364 35.7763 35.6673 36.1734 35.7918 36.6386C35.9163 37.1038 35.852 37.5994 35.6129 38.0174C35.3685 38.4329 34.9703 38.7355 34.5045 38.8596C34.0387 38.9837 33.5427 38.9193 33.124 38.6804L32.7578 38.4727C32.7214 38.4495 32.6846 38.4269 32.6473 38.4051L32.6452 38.4088L29.5685 36.6638C29.2164 36.3878 28.8094 36.1902 28.3749 36.0842C27.9403 35.9782 27.4881 35.9661 27.0485 36.0489C27.1351 35.4262 27.0342 34.7918 26.7586 34.2267C26.4829 33.6616 26.0452 33.1914 25.5011 32.8763C24.8698 32.5101 24.1304 32.3761 23.4108 32.4975C23.5413 31.7885 23.4253 31.0562 23.0822 30.4222C22.739 29.7882 22.1893 29.2907 21.5243 29.0122C20.8593 28.7338 20.1191 28.6912 19.4266 28.8916C18.7341 29.092 18.131 29.5232 17.7174 30.1137C17.409 29.4336 16.8688 28.8854 16.1933 28.5671C15.5179 28.2488 14.7512 28.1812 14.0305 28.3762C13.6456 28.4788 13.2836 28.653 12.9633 28.8896C12.9298 28.6003 12.901 28.3505 12.8904 28.1777C12.8712 27.8401 12.7564 27.5149 12.5592 27.2402C12.362 26.9654 12.0907 26.7525 11.777 26.6263L11.1593 26.3758L15.5741 15.2149C16.1851 15.4972 16.7486 15.7581 17.2648 15.9973C18.657 16.6608 20.2484 16.7742 21.7206 16.3149C23.9332 15.6502 25.9309 15.6014 27.6799 16.1635C27.6607 16.1784 27.6424 16.1944 27.625 16.2114C25.2627 18.5026 22.6005 20.4627 19.7112 22.0382C19.6311 22.0822 19.5609 22.1421 19.5048 22.2142C19.4488 22.2863 19.4081 22.3691 19.3852 22.4576C19.3623 22.546 19.3578 22.6382 19.3719 22.7285C19.386 22.8187 19.4184 22.9051 19.4672 22.9824C21.3336 25.9418 23.9053 26.7334 26.906 25.2734C28.7283 24.6674 30.624 24.0958 32.5413 23.5746C32.8846 23.474 33.2451 23.4459 33.5999 23.492C33.9547 23.5381 34.296 23.6574 34.6023 23.8425L41.2196 27.6628C41.6366 27.9044 41.9408 28.3014 42.0656 28.7669C42.1904 29.2323 42.1255 29.7283 41.8853 30.146ZM41.8893 26.5019L35.2724 22.6815C34.8133 22.4078 34.3029 22.231 33.7728 22.1623C33.2427 22.0935 32.7042 22.1341 32.1904 22.2816C30.2341 22.8135 28.2997 23.3971 26.4407 24.0162C26.4118 24.0258 26.3836 24.0374 26.3562 24.0509C24.1546 25.1362 22.4378 24.7572 21.0009 22.8498C23.7277 21.2951 26.2489 19.4048 28.5056 17.2231C29.7342 16.4904 31.1295 16.0835 32.5594 16.0409C33.9892 15.9983 35.4063 16.3214 36.6763 16.9797C38.1625 17.8838 40.4247 17.5719 43.583 16.0246L47.7477 26.5533L43.3809 28.5075C43.2823 28.0891 43.0992 27.6954 42.8427 27.3504C42.5863 27.0055 42.2619 26.7167 41.8897 26.5019H41.8893ZM56.6127 24.4026C56.5893 24.4575 56.5552 24.5072 56.5124 24.5488C56.4697 24.5904 56.4191 24.6231 56.3636 24.645L49.929 27.1905C49.8168 27.2347 49.6917 27.2327 49.5811 27.1848C49.4705 27.1368 49.3834 27.047 49.3389 26.9349L44.0639 13.5989C44.0201 13.4867 44.0224 13.3618 44.0703 13.2513C44.1181 13.1408 44.2076 13.0537 44.3194 13.0089L50.7544 10.4635C50.8666 10.4198 50.9915 10.4222 51.102 10.47C51.2125 10.5179 51.2996 10.6074 51.3444 10.7191L56.6195 24.0551C56.6415 24.1106 56.6522 24.1698 56.6511 24.2295C56.65 24.2892 56.637 24.348 56.613 24.4026H56.6127ZM7.45525 22.0241C7.09506 22.0241 6.74296 22.1309 6.44348 22.331C6.14399 22.5312 5.91057 22.8156 5.77274 23.1484C5.63491 23.4811 5.59885 23.8473 5.66913 24.2006C5.7394 24.5538 5.91286 24.8783 6.16756 25.133C6.42226 25.3877 6.74676 25.5611 7.10003 25.6314C7.45331 25.7016 7.81948 25.6656 8.15224 25.5277C8.48501 25.3899 8.76942 25.1564 8.96951 24.8569C9.16961 24.5574 9.2764 24.2053 9.27638 23.8451C9.27584 23.3623 9.0838 22.8994 8.74239 22.558C8.40097 22.2166 7.93807 22.0246 7.45525 22.0241ZM7.45525 24.327C7.35996 24.327 7.2668 24.2987 7.18757 24.2458C7.10833 24.1928 7.04658 24.1176 7.01011 24.0295C6.97364 23.9415 6.9641 23.8446 6.98269 23.7511C7.00128 23.6577 7.04717 23.5718 7.11455 23.5044C7.18194 23.4371 7.26779 23.3912 7.36125 23.3726C7.45472 23.354 7.55159 23.3635 7.63963 23.4C7.72767 23.4365 7.80292 23.4982 7.85587 23.5775C7.90881 23.6567 7.93707 23.7498 7.93707 23.8451C7.93692 23.9729 7.88611 24.0953 7.79578 24.1857C7.70546 24.276 7.58299 24.3268 7.45525 24.327ZM51.1465 22.0241C50.7864 22.0242 50.4343 22.1311 50.1349 22.3313C49.8354 22.5314 49.6021 22.8159 49.4643 23.1487C49.3266 23.4814 49.2906 23.8476 49.3609 24.2008C49.4312 24.5541 49.6047 24.8785 49.8594 25.1332C50.1142 25.3878 50.4387 25.5612 50.7919 25.6314C51.1452 25.7016 51.5113 25.6655 51.8441 25.5277C52.1768 25.3898 52.4612 25.1564 52.6613 24.8569C52.8613 24.5574 52.9681 24.2053 52.9681 23.8451C52.9676 23.3622 52.7755 22.8993 52.4339 22.5579C52.0924 22.2165 51.6294 22.0245 51.1465 22.0241ZM51.1465 24.327C51.0512 24.3269 50.9581 24.2985 50.879 24.2455C50.7998 24.1925 50.7381 24.1173 50.7017 24.0292C50.6653 23.9412 50.6558 23.8443 50.6745 23.7509C50.6931 23.6574 50.739 23.5716 50.8064 23.5043C50.8738 23.4369 50.9597 23.3911 51.0531 23.3725C51.1466 23.354 51.2434 23.3636 51.3315 23.4C51.4195 23.4365 51.4947 23.4983 51.5476 23.5775C51.6005 23.6567 51.6288 23.7499 51.6288 23.8451C51.6286 23.973 51.5778 24.0955 51.4873 24.1858C51.3969 24.2762 51.2743 24.3269 51.1465 24.327ZM28.7489 8.80068V1.42332C28.7489 1.24571 28.8195 1.07538 28.9451 0.949799C29.0706 0.824215 29.241 0.753662 29.4186 0.753662C29.5962 0.753662 29.7665 0.824215 29.8921 0.949799C30.0177 1.07538 30.0882 1.24571 30.0882 1.42332V8.80068C30.0882 8.97828 30.0177 9.14861 29.8921 9.27419C29.7665 9.39978 29.5962 9.47033 29.4186 9.47033C29.241 9.47033 29.0706 9.39978 28.9451 9.27419C28.8195 9.14861 28.7489 8.97828 28.7489 8.80068ZM18.4193 4.95173C18.3305 4.79791 18.3064 4.61511 18.3524 4.44355C18.3984 4.27199 18.5106 4.12572 18.6644 4.03692C18.8183 3.94812 19.001 3.92406 19.1726 3.97003C19.3442 4.01601 19.4904 4.12825 19.5792 4.28207L23.2678 10.6709C23.3125 10.7471 23.3416 10.8314 23.3536 10.9189C23.3655 11.0064 23.3601 11.0954 23.3375 11.1807C23.3149 11.2661 23.2757 11.3462 23.2221 11.4164C23.1684 11.4865 23.1014 11.5454 23.0249 11.5895C22.9485 11.6337 22.864 11.6623 22.7764 11.6737C22.6888 11.685 22.5999 11.679 22.5146 11.6558C22.4294 11.6327 22.3496 11.5929 22.2798 11.5388C22.21 11.4847 22.1516 11.4173 22.108 11.3406L18.4193 4.95173ZM35.7703 9.92157L39.4587 3.53284C39.5475 3.37902 39.6938 3.26678 39.8653 3.2208C40.0369 3.17483 40.2197 3.19889 40.3735 3.28769C40.5273 3.37649 40.6396 3.52276 40.6856 3.69432C40.7315 3.86588 40.7075 4.04868 40.6187 4.20249L36.9299 10.5912C36.8862 10.668 36.8278 10.7354 36.758 10.7895C36.6882 10.8436 36.6084 10.8834 36.5232 10.9065C36.438 10.9296 36.349 10.9357 36.2614 10.9243C36.1738 10.9129 36.0894 10.8843 36.0129 10.8402C35.9364 10.796 35.8694 10.7372 35.8158 10.667C35.7621 10.5969 35.7229 10.5168 35.7003 10.4314C35.6777 10.346 35.6723 10.257 35.6842 10.1695C35.6962 10.082 35.7254 9.99775 35.77 9.92157H35.7703Z"
                        fill="white" />
                    </svg>';

		$default_service_icon = '
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
							<g clip-path="url(#clip0_99_625)">
								<path d="M19.8373 6.84511L19.0515 6.05935C18.8345 5.84233 18.4828 5.84233 18.2658 6.05935L17.873 6.45206L16.8696 5.44858C17.0651 4.70865 16.8821 3.88956 16.3019 3.30935L14.7307 1.73817C12.5612 -0.431277 9.04353 -0.431277 6.87374 1.73817L10.0164 3.30935V3.96039C10.0164 4.54963 10.2505 5.1149 10.6675 5.53157L12.3737 7.23782C12.9539 7.81803 13.773 8.00101 14.513 7.80553L15.5164 8.809L15.1237 9.20171C14.9067 9.41872 14.9067 9.77046 15.1237 9.98747L15.9095 10.7732C16.1265 10.9903 16.4783 10.9903 16.6953 10.7732L19.838 7.63053C20.0543 7.41386 20.0543 7.06213 19.8373 6.84511ZM9.88173 6.31733C9.75325 6.18886 9.64423 6.04685 9.53971 5.9024L0.682073 14.1722C-0.205774 15.0014 -0.229732 16.401 0.628949 17.26C1.48763 18.1191 2.88763 18.0951 3.7168 17.2069L11.9852 8.35032C11.8477 8.24928 11.7109 8.1465 11.588 8.02358L9.88173 6.31733Z" fill="white"/>
							</g>
							<defs>
								<clipPath id="clip0_99_625">
								<rect width="20" height="17.7778" fill="white" transform="translate(0 0.111084)"/>
								</clipPath>
							</defs>
						</svg>';

		?>
		<section class="about about--style-1">
			<div class="about__container container">
				<div class="row align-items-center g-5">
					<div class="col col-12 col-x2l-6">
						<div class="about__left">
							<?php if (!empty($settings['about-main-image']['url'])): ?>
								<div class="about__img-wrap">
									<img src="<?php echo esc_url($settings['about-main-image']['url']); ?>" alt="About Image"
										class="about__img">
								</div>
							<?php endif; ?>

							<?php if (!empty($settings['about-shape-image']['url'])): ?>
								<div class="about__shape-wrap">
									<img src="<?php echo esc_url($settings['about-shape-image']['url']); ?>" alt="Xroof Image"
										class="about__shape">
								</div>
							<?php endif; ?>

							<?php if (($settings['about-stat-number']) || ($settings['about-stat-text'])): ?>
								<div class="about__stat p-4 py-xl-4 px-xl-7">
									<div
										class="about__stat-top d-flex gap-2 flex-wrap justify-content-between align-items-center mb-4">

										<?php if (!empty($settings['about-stat-number'])): ?>
											<h3 class="about__stat-number title-xl-white mb-0" stat-data-start="0"
												stat-data-end="<?php echo str_replace('%', '', $settings['about-stat-number']); ?>"
												data-duration="1000" data-format="full" data-suffix="%">
												<?php echo esc_html($settings['about-stat-number']); ?>
											</h3>
										<?php endif; ?>

										<div class="stat__icon">
											<?php if (!empty($settings['stat-icon']['url'])): ?>
												<img src="<?php echo esc_url($settings['stat-icon']['url']); ?>" alt="Stat Icon"
													style="width: 58px; height: 46px;">
											<?php else: ?>
												<?php echo xroof_kses($default_stat_icon); ?>
											<?php endif; ?>
										</div>
									</div>

									<?php if (!empty($settings['about-stat-text'])): ?>
										<span class="about__stat-text">
											<?php echo esc_html($settings['about-stat-text']); ?>
										</span>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="col col-12 col-x2l-6">
						<div class="about__right">
							<?php $this->render_subtitle(); ?>

							<?php if (!empty($settings['about_title'])): ?>
								<h2 class="about__title title-xl"><?php echo esc_html($settings['about_title']); ?></h2>
							<?php endif; ?>

							<?php if (!empty($settings['about_description'])): ?>
								<p class="about__desc mt-4 mt-md-8"><?php echo esc_html($settings['about_description']); ?></p>
							<?php endif; ?>

							<?php if (!empty($settings['service_items'])): ?>
								<div class="about__service-items mt-8 mt-xl-12">
									<div class="row g-5">
										<?php foreach ($settings['service_items'] as $item): ?>
											<?php
											$service_icon_url = !empty($item['service_icon']['url']) ? esc_url($item['service_icon']['url']) : '';
											$service_title = !empty($item['service_title']) ? esc_html($item['service_title']) : '';
											$service_text = !empty($item['service_text']) ? esc_html($item['service_text']) : '';
											?>
											<div class="col col-12 col-sm-6">
												<div class="services__item">
													<div class="services__item-icon-wrap">
														<?php if ($service_icon_url): ?>
															<img src="<?php echo $service_icon_url; ?>" alt="Service Icon"
																style="width: 20px; height: 18px;">
														<?php else: ?>
															<?php echo $default_service_icon; ?>
														<?php endif; ?>
													</div>
													<div class="services__item-content">
														<?php if ($service_title): ?>
															<h3 class="services__item-title"><?php echo $service_title; ?></h3>
														<?php endif; ?>
														<?php if ($service_text): ?>
															<p class="services__item-text body-text"><?php echo $service_text; ?></p>
														<?php endif; ?>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endif; ?>

							<div class="about__btn-wrap d-flex flex-wrap align-items-center gap-4 mt-8">
								<?php $this->render_button('about-btn', 'about__btn'); ?>
								<?php $this->render_button('about-btn-info', 'about__btn-info'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}

$widgets_manager->register(new Xroof_About_Widget_1());