<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Testimonials_Widget_2 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-testimonials-2';
    }

    public function get_title()
    {
        return esc_html__('Xroof Testimonials 2', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-testimonial';
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
            'testimonials_content_section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'testimonials_subtitle',
            [
                'label' => esc_html__('Subtitle', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('//.. Testimonials', 'xroof'),
                'placeholder' => esc_html__('Type your subtitle here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'testimonials_title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our happy client say', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonials_list_section',
            [
                'label' => esc_html__('Testimonials List', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'testimonials_author_img',
            [
                'label' => esc_html__('Author Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'testimonials_rating',
            [
                'label' => esc_html__('Rating', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('5', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'testimonials_author_name',
            [
                'label' => esc_html__('Author Name', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Jhon', 'xroof'),
                'placeholder' => esc_html__('Type author name here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'testimonials_author_role',
            [
                'label' => esc_html__('Author Role', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Jhon', 'xroof'),
                'placeholder' => esc_html__('Type author role here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'testimonials_text',
            [
                'label' => esc_html__('Testimonials Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Testimonials text', 'xroof'),
                'placeholder' => esc_html__('Type your text here', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'testimonials_list',
            [
                'label' => esc_html__('Testimonials List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testimonials_author_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/testimonials/testimonials-author-1.png',
                        ],
                        'testimonials_rating' => esc_html__(4, 'xroof'),
                        'testimonials_author_name' => esc_html__('Nadia Islam', 'xroof'),
                        'testimonials_author_role' => esc_html__('Retail Business Owner', 'xroof'),
                        'testimonials_text' => esc_html__('     From start to finish, the team was professional, punctual, and detail-oriented. My new roof looks fantastic and has held up perfectly through heavy rain. The team  understood our needs from day one and turned a challenging renovation into a stunning space.', 'xroof'),
                    ],
                    [
                        'testimonials_author_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/testimonials/testimonials-author-2.png',
                        ],
                        'testimonials_rating' => esc_html__(3.5, 'xroof'),
                        'testimonials_author_name' => esc_html__('Arman Haque', 'xroof'),
                        'testimonials_author_role' => esc_html__('Property Developer', 'xroof'),
                        'testimonials_text' => esc_html__('Their approach combined creativity with practicality, From the first sketch to the final brick,They responded quickly to my emergency repair call and fixed the leak the same day. Excellent service and great communication throughout the process.', 'xroof'),
                    ],
                    [
                        'testimonials_author_img' => [
                            'url' => get_template_directory_uri() . '/assets/img/testimonials/testimonials-author-3.png',
                        ],
                        'testimonials_rating' => esc_html__(5, 'xroof'),
                        'testimonials_author_name' => esc_html__('Ayesha Karim', 'xroof'),
                        'testimonials_author_role' => esc_html__('Real Estate', 'xroof'),
                        'testimonials_text' => esc_html__('We hired XrooF for our home renovation, and the result was outstanding. The team was detail-oriented and respectful of our timeline. Their designs are fresh, functional, and future-ready. We couldn’t be happier with how our showroom turned out.', 'xroof'),
                    ],
                ],
                'title_field' => '{{{ testimonials_author_name }}}',
            ]
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'testimonials_content-style_section',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_text_style_controls('testimonials_subtitle', 'testimonials__subtitle', 'Subtitle');
        $this->add_control(
            'testimonials_subtitle_dot',
            [
                'label' => esc_html__('Dot Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials__subtitle::before' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->register_text_style_controls('testimonials_title', 'testimonials__title', 'Title');
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonials_card-style_section',
            [
                'label' => __('Testimonials List', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'testimonials_card_bg',
            [
                'label' => esc_html__('Card Background Color', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials__card' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->register_spacing_controls('card_spacing', 'testimonials__card');
        $this->register_border_radius_control('card_radius', 'testimonials__card');
        $this->register_text_style_controls('testimonials_author_name', 'testimonials__card-author-name', 'Author Name');
        $this->register_text_style_controls('testimonials_author_role', 'testimonials__card-author-role', 'Author Role');
        $this->register_text_style_controls('testimonials_card_text', 'testimonials__card-text', 'Testimonials Text');
        $this->add_section_heading('rating_color', 'Rating Color');
        $this->add_control(
            'rating_color_active',
            [
                'label' => esc_html__('Rating Color Active', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials .star.full::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'rating_color_inactive',
            [
                'label' => esc_html__('Rating Color Inactive', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials .star::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_section_heading('card_shape_bg', 'Card Shape Background');
        $this->add_control(
            'card_shape_bg',
            [
                'label' => esc_html__('Shape Background', 'xroof'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials__card:before' => 'background: {{VALUE}}',
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

        <section class="testimonials testimonials--style-2">
            <div class="testimonials__container container">
                <?php if ($settings['testimonials_subtitle']): ?>
                    <p class="testimonials__subtitle subtitle-white">
                        <?php echo esc_html($settings['testimonials_subtitle']); ?>
                    </p>
                <?php endif; ?>
                <?php if ($settings['testimonials_title']): ?>
                    <h2 class="testimonials__title title-xl-white">
                        <?php echo esc_html($settings['testimonials_title']); ?>
                    </h2>
                <?php endif; ?>

                <div class="row g-4 mt-10 mt-xl-15 mt-xxl-20">
                    <?php foreach ($settings['testimonials_list'] as $key => $item):
                        $card_shift_down = $key % 2 !== 0 ? 'testimonials__card-shift-down' : '';
                        ?>
                        <div class="col col-12 col-md-6 col-xl-4">
                            <div class="testimonials__card <?php echo esc_attr($card_shift_down); ?>">
                                <div class="testimonials__card-rating">
                                    <?php
                                    $rating = floatval($item['testimonials_rating']);
                                    $full_stars = floor($rating);
                                    $half_star = ($rating - $full_stars >= 0.5) ? 1 : 0;
                                    $empty_stars = 5 - ($full_stars + $half_star);
                                    ?>
                                    <div class="star-rating">
                                        <?php for ($i = 0; $i < $full_stars; $i++): ?>
                                            <span class="star full"></span>
                                        <?php endfor; ?>

                                        <?php if ($half_star): ?>
                                            <span class="star half"></span>
                                        <?php endif; ?>

                                        <?php for ($i = 0; $i < $empty_stars; $i++): ?>
                                            <span class="star"></span>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <div class="testimonials__card-content">
                                    <?php if (!empty($item['testimonials_text'])): ?>
                                        <p class="testimonials__card-text my-10 my-sm-15 my-xxl-20">
                                            <?php echo esc_html($item['testimonials_text']); ?>
                                        </p>
                                    <?php endif; ?>

                                    <div class="testimonials__card-author">
                                        <?php if (!empty($item['testimonials_author_img'])): ?>
                                            <div class="testimonials__card-author-img-wrap">
                                                <img src="<?php echo esc_url($item['testimonials_author_img']['url']); ?>"
                                                    class="testimonials__card-author-img" alt="Author Photo">
                                            </div>
                                        <?php endif; ?>

                                        <div class="testimonials__card-author-info">
                                            <?php if (!empty($item['testimonials_author_name'])): ?>
                                                <h3 class="testimonials__card-author-name">
                                                    <?php echo esc_html($item['testimonials_author_name']) ?>
                                                </h3>
                                            <?php endif; ?>
                                            <?php if (!empty($item['testimonials_author_role'])): ?>
                                                <p class="testimonials__card-author-role body-text mb-0">
                                                    <?php echo esc_html($item['testimonials_author_role']) ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Testimonials_Widget_2());
