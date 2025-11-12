<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Testimonials_Widget_1 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-testimonials-1';
    }

    public function get_title()
    {
        return esc_html__('Xroof Testimonials 1', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-notes';
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
            'cta-content-section',
            [
                'label' => esc_html__('Content', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->register_subtitle_content_controls('testimonials__top-subtitle');
        $this->add_control(
            'testimonials-title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Clients Testimonials', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'testimonials-desc',
            [
                'label' => esc_html__('Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Read what our clients have to say about our professional, reliable, and high-quality services that exceed expectations consistently.', 'xroof'),
                'placeholder' => esc_html__('Type your description here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonials_card_section',
            [
                'label' => esc_html__('Testimonials', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'testimonials_author_img',
            [
                'label' => esc_html__('Choose Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'testimonials_author_name',
            [
                'label' => esc_html__('Name', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Nadia Islam', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'testimonials_author_role',
            [
                'label' => esc_html__('Role', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Retail Business Owner', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'testimonials_text',
            [
                'label' => esc_html__('Testimonials Text', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Add text here', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'testimonials_rating',
            [
                'label' => esc_html__('Rating Number', 'xroof'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('4.5', 'xroof'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'testimonials',
            [
                'label' => esc_html__('Team Member List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testimonials_author_name' => 'Aisha Rahman',
                        'testimonials_author_role' => 'Retail Business Owner',
                        'testimonials_text' => 'The crew was efficient, knowledgeable, and courteous throughout the project. My roof was replaced seamlessly and has withstood strong winds flawlessly. They listened carefully to our requirements and transformed a difficult repair into an impressive, long-lasting result.',
                        'testimonials_rating' => '4.5',
                        'testimonials_author_img' => ['url' => \Elementor\Utils::get_placeholder_image_src(),],
                    ],
                    [
                        'testimonials_author_name' => 'Hafsa Begum',
                        'testimonials_author_role' => 'Cleaner',
                        'testimonials_text' => 'The team worked diligently, demonstrating great skill and professionalism from start to finish. My new roof was installed with precision and has already proven durable through heavy rain. They paid attention to every detail and turned a stressful situation into a smooth, reliable outcome.',
                        'testimonials_rating' => '5',
                        'testimonials_author_img' => ['url' => \Elementor\Utils::get_placeholder_image_src(),],
                    ],
                ],
                'title_field' => '{{{ testimonials_author_name }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonials_background',
            [
                'label' => esc_html__('Background', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .testimonials--style-1',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                    'image' => [
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
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
            'testimonials_style_section',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_subtitle_style_controls('testimonials-subtitle', 'testimonials__top-subtitle');
        $this->register_text_style_controls('testimonials-title', 'testimonials__title', 'Title');
        $this->register_text_style_controls('testimonials-desc', 'testimonials__desc', 'Description');
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonials_card_style_section',
            [
                'label' => __('Testimonials', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // .testimonials .star.full::before
        $this->add_control(
            'star_active_color',
            [
                'label' => esc_html__('Star Active', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star.full::before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .star.half::after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'star_inactive_color',
            [
                'label' => esc_html__('Star Inactive', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->register_text_style_controls('testimonials_card_text', 'testimonials__card-text', 'Testimonial Text');
        $this->register_text_style_controls('testimonials_card_name_style', 'testimonials__card-author-name', "Author Name");
        $this->register_text_style_controls('testimonials_card_role_style', 'testimonials__card-author-role', 'Author Role');
        $this->add_control(
            'card_bg_color',
            [
                'label' => esc_html__('Card Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials__card' => 'background: {{VALUE}}',
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

        <section class="testimonials testimonials--style-1">
            <div class="testimonials__container container">
                <?php $this->render_subtitle('testimonials-subtitle', 'testimonials__top-subtitle'); ?>

                <?php if (!empty($settings['testimonials-title'])): ?>
                    <h2 class="testimonials__title title-xl-white"><?php echo esc_html($settings['testimonials-title']); ?></h2>
                <?php endif; ?>

                <?php if (!empty($settings['testimonials-desc'])): ?>
                    <p class="testimonials__desc body-text pb-20"><?php echo esc_html($settings['testimonials-desc']); ?>
                    </p>
                <?php endif; ?>

                <div class="row g-4">
                    <?php if (!empty($settings['testimonials'])): ?>
                        <?php foreach ($settings['testimonials'] as $item): ?>
                            <div class="col col-12 col-md-6">
                                <div class="testimonials__card">
                                    <?php if (!empty($item['testimonials_rating'])): ?>
                                        <div class="testimonial__rating">
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
                                    <?php endif; ?>

                                    <div class="testimonials__card-content">
                                        <?php if (!empty($item['testimonials_text'])): ?>
                                            <p class="testimonials__card-text my-10 my-sm-15 my-xxl-20">
                                                <?php echo esc_html($item['testimonials_text']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <div class="testimonials__card-author">
                                            <?php if (!empty($item['testimonials_author_img']['url'])): ?>
                                                <div class="testimonials__card-author-img-wrap">
                                                    <img src="<?php echo esc_url($item['testimonials_author_img']['url']); ?>"
                                                        class="testimonials__card-author-img" alt="Author Photo">
                                                </div>
                                            <?php endif; ?>

                                            <div class="testimonials__card-author-info">
                                                <?php if (!empty($item['testimonials_author_name'])): ?>
                                                    <h3 class="testimonials__card-author-name">
                                                        <?php echo esc_html($item['testimonials_author_name']); ?>
                                                    </h3>
                                                <?php endif; ?>

                                                <?php if (!empty($item['testimonials_author_role'])): ?>
                                                    <p class="testimonials__card-author-role body-text mb-0">
                                                        <?php echo esc_html($item['testimonials_author_role']); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new Xroof_Testimonials_Widget_1());
