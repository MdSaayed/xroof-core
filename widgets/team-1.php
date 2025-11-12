<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Xroof\Core\Traits\Xroof_Controls_Trait;


if (!defined('ABSPATH'))
    exit;


class Xroof_Team_Widget_1 extends Widget_Base
{
    use Xroof_Controls_Trait;

    public function get_name()
    {
        return 'xroof-team-1';
    }

    public function get_title()
    {
        return esc_html__('Xroof Team 1', 'xroof');
    }

    public function get_icon()
    {
        return 'eicon-accessibility';
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
        $this->register_subtitle_content_controls('team__subtitle');
        $this->add_control(
            'team-title',
            [
                'label' => esc_html__('Title', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trained Roofers Team', 'xroof'),
                'placeholder' => esc_html__('Type your title here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'team-desc',
            [
                'label' => esc_html__('Description', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Professional roofers delivering quality, reliable, and efficient roofing services consistently.', 'xroof'),
                'placeholder' => esc_html__('Type your description here', 'xroof'),
                'rows' => 6,
                'label_block' => true,
            ]
        );
        $this->register_button_content_controls('team-btn', 'team__btn', 'Button');
        $this->end_controls_section();

        $this->start_controls_section(
            'team_card_section',
            [
                'label' => esc_html__('Team Members', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'team_member_img',
            [
                'label' => esc_html__('Choose Image', 'xroof'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'team_member_title',
            [
                'label' => esc_html__('Name', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Aisha Rahman', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'team_member_role',
            [
                'label' => esc_html__('Role', 'xroof'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Home Cleaning Supervisor', 'xroof'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'team_member_x',
            [
                'label' => esc_html__('X / Twitter URL', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => ['url' => '#', 'is_external' => true, 'nofollow' => true],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'team_member_facebook',
            [
                'label' => esc_html__('Facebook URL', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => ['url' => '#', 'is_external' => true, 'nofollow' => true],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'team_member_dribbble',
            [
                'label' => esc_html__('Dribbble URL', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => ['url' => '#', 'is_external' => true, 'nofollow' => true],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'team_member_instagram',
            [
                'label' => esc_html__('Instagram URL', 'xroof'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => ['url' => '#', 'is_external' => true, 'nofollow' => true],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'team_members',
            [
                'label' => esc_html__('Team Member List', 'xroof'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'team_member_title' => 'Aisha Rahman',
                        'team_member_role' => 'Home Cleaning Supervisor',
                         'team_member_img' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
                    ],
                    [
                        'team_member_title' => 'Hafsa Begum',
                        'team_member_role' => 'Cleaner',
                         'team_member_img' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
                    ],
                    [
                        'team_member_title' => 'Sayed Sarker',
                        'team_member_role' => 'Cleaner',
                         'team_member_img' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
                    ],
                ],
                'title_field' => '{{{ team_member_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_card_responsive_section',
            [
                'label' => esc_html__('Responsive Columns', 'xroof'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_responsive_control(
            'team_columns',
            [
                'label' => esc_html__('Columns', 'xroof'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    1 => '1 Column',
                    2 => '2 Columns',
                    3 => '3 Columns',
                    4 => '4 Columns',
                ],
                'default' => 3,
                'tablet_default' => 2,
                'mobile_default' => 1,
            ]
        );
        $this->end_controls_section();
    }

    // Register Style Section
    protected function register_style_section()
    {
        $this->start_controls_section(
            'team_style_section',
            [
                'label' => __('Content', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_subtitle_style_controls('team-subtitle', 'team__subtitle');
        $this->register_text_style_controls('team-title', 'team__title', 'Title');
        $this->register_text_style_controls('team-desc', 'team__desc', 'Description');
        $this->register_button_style_controls('team-button', 'team__btn');
        $this->end_controls_section();

        $this->start_controls_section(
            'team_member_section',
            [
                'label' => __('Team Members', 'xroof'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->register_spacing_controls('member-info','team__member-info');
        $this->register_text_style_controls('member-title', 'team__member-title', 'Member Name');
        $this->register_text_style_controls('member-role', 'team__member-role', 'Member Role');
        $this->end_controls_section();
    }

    // Render Here
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (!empty($settings['team_columns'])) {
            $columns = intval($settings['team_columns']);
            switch ($columns) {
                case 1:
                    $desktop_class = 'col-xl-12';
                    break;
                case 2:
                    $desktop_class = 'col-xl-6';
                    break;
                case 3:
                    $desktop_class = 'col-xl-4';
                    break;
                case 4:
                    $desktop_class = 'col-xl-3';
                    break;
                default:
                    $desktop_class = 'col-xl-4';
            }
        }
        ?>

        <section class="team team--style-1">
            <div class="team__container container">
                <div class="team__header flex-wrap gap-4 gap-md-5 flex-items-center justify-content-between">
                    <div class="team__title-wrap">
                        <?php $this->render_subtitle('team-subtitle', 'team__subtitle'); ?>
                        <?php if (!empty($settings['team-title'])): ?>
                            <h2 class="team__title title-xl"><?php echo esc_html($settings['team-title']); ?></h2>
                        <?php endif ?>
                    </div>

                    <?php if (!empty($settings['team-title'])): ?>
                        <p class="team__desc"><?php echo esc_html($settings['team-desc']); ?></php>
                        </p>
                    <?php endif ?>

                    <?php $this->render_button('team-btn', 'team__btn'); ?>
                </div>

                <div class="row g-4 mt-10 mt-xl-15 mt-xxl-20 overflow-hidden">
                    <?php if (!empty($settings['team_members'])): ?>
                        <?php foreach ($settings['team_members'] as $item): ?>
                            <div class="col col-12 col-md-6 <?php echo esc_attr($desktop_class); ?>">
                                <div class="team__member">
                                    <?php if (!empty($item['team_member_img']['url'])): ?>
                                        <div class="team__member-img-wrap">
                                            <img src="<?php echo esc_url($item['team_member_img']['url']); ?>"
                                                alt="<?php echo esc_html($item['team_member_title']); ?> Image" class="team__member-img">
                                        </div>
                                    <?php endif; ?>

                                    <div class="team__member-content">
                                        <div class="team__member-info">
                                            <h3 class="team__member-title"><?php echo esc_html($item['team_member_title']); ?></h3>
                                            <p class="team__member-role"><?php echo esc_html($item['team_member_role']); ?></p>
                                        </div>
                                    </div>

                                    <div class="team__member-social-links">
                                        <?php if (!empty($item['team_member_x']['url'])): ?>
                                            <a <?php echo xroof_get_link_attribute($item['team_member_x']); ?>
                                                class="team__member-social-link">
                                                <svg width="18" height="18" viewBox="0 0 26 26" fill="none">
                                                    <path
                                                        d="M15.3078 11.1708L24.338 0.392578H22.1981L14.3572 9.75115L8.09459 0.392578H0.87146L10.3417 14.5444L0.87146 25.847H3.01147L11.2917 15.964L17.9055 25.847H25.1286L15.3072 11.1708H15.3078ZM12.3767 14.6691L11.4172 13.2599L3.78254 2.0467H7.06947L13.2307 11.0961L14.1903 12.5053L22.1992 24.2681H18.9122L12.3767 14.6696V14.6691Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($item['team_member_facebook']['url'])): ?>
                                            <a <?php echo xroof_get_link_attribute($item['team_member_facebook']); ?>
                                                class="team__member-social-link">
                                                <svg width="18" height="18" viewBox="0 0 26 26" fill="none">
                                                    <g clip-path="url(#clip0_328_1833)">
                                                        <path
                                                            d="M14.92 25.4753V14.1681H18.7138L19.283 9.76021H14.92V6.94641C14.92 5.67061 15.2728 4.80118 17.1043 4.80118L19.4365 4.80022V0.857636C19.0332 0.805223 17.6488 0.685059 16.0374 0.685059C12.6726 0.685059 10.369 2.73888 10.369 6.50985V9.76021H6.56372V14.1681H10.369V25.4753H14.92Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <clipPath>
                                                            <rect width="24.7902" height="24.7902" fill="white"
                                                                transform="translate(0.60498 0.685059)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($item['team_member_dribbble']['url'])): ?>
                                            <a <?php echo xroof_get_link_attribute($item['team_member_dribbble']); ?>
                                                class="team__member-social-link">
                                                <svg width="20" height="20" fill="#fff" viewBox="0 0 256 256">
                                                    <g stroke-width="0"></g>
                                                    <g stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g>
                                                        <path
                                                            d="M86.26123,32.74414a103.85849,103.85849,0,0,1,100.148,9.25537,153.22442,153.22442,0,0,1-44.543,40.48438A169.26114,169.26114,0,0,0,86.26123,32.74414Zm41.31543,57.28955A152.978,152.978,0,0,0,69.4624,42.09863a104.382,104.382,0,0,0-41.543,57.561A151.8095,151.8095,0,0,0,64,103.99805,151.0488,151.0488,0,0,0,127.57666,90.03369Zm104.22119,31.65772a103.76547,103.76547,0,0,0-32.88965-69.689,169.34119,169.34119,0,0,1-48.39453,43.94092,167.29388,167.29388,0,0,1,13.542,29.89746,168.13983,168.13983,0,0,1,67.74219-4.14941Zm-63.33008,19.53125a167.82141,167.82141,0,0,1,4.44922,38.46972,168.65237,168.65237,0,0,1-6.084,44.77832,104.24218,104.24218,0,0,0,64.68213-86.65185,152.38875,152.38875,0,0,0-63.04737,3.40381Zm-19.64062-10.45459a151.39932,151.39932,0,0,0-12.3916-27.20557A166.974,166.974,0,0,1,64,119.99805a167.82812,167.82812,0,0,1-39.23633-4.6377,103.89032,103.89032,0,0,0,35.958,91.88281A168.9649,168.9649,0,0,1,148.82715,130.76807ZM73.78369,216.72021a103.93363,103.93363,0,0,0,74.58447,13.27051,152.66635,152.66635,0,0,0,8.54883-50.29834,151.825,151.825,0,0,0-3.73291-33.46289A152.89185,152.89185,0,0,0,73.78369,216.72021Z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($item['team_member_instagram']['url'])): ?>
                                            <a <?php echo xroof_get_link_attribute($item['team_member_instagram']); ?>
                                                class="team__member-social-link">
                                                <svg width="20" height="20" viewBox="0 0 26 26" fill="none">
                                                    <g clip-path="url(#clip0_328_333)">
                                                        <path
                                                            d="M18.6847 0.272461H7.31545C3.61524 0.272461 0.60498 3.36337 0.60498 7.16273V18.8368C0.60498 22.6359 3.61524 25.7268 7.31545 25.7268H18.6849C22.3849 25.7268 25.3951 22.6359 25.3951 18.8368V7.16273C25.3951 3.36337 22.3849 0.272461 18.6847 0.272461ZM23.9418 18.8368C23.9418 21.8131 21.5835 24.2346 18.6847 24.2346H7.31545C4.4166 24.2346 2.05829 21.8131 2.05829 18.8368V7.16273C2.05829 4.1862 4.4166 1.76471 7.31545 1.76471H18.6849C21.5835 1.76471 23.9418 4.1862 23.9418 7.16273V18.8368Z"
                                                            fill="white" />
                                                        <path
                                                            d="M13 6.04004C9.26239 6.04004 6.22168 9.16222 6.22168 13C6.22168 16.8378 9.26239 19.96 13 19.96C16.7377 19.96 19.7784 16.8378 19.7784 13C19.7784 9.16222 16.7377 6.04004 13 6.04004ZM13 18.4678C10.0639 18.4678 7.67498 16.015 7.67498 13C7.67498 9.98524 10.0639 7.53228 13 7.53228C15.9364 7.53228 18.3251 9.98524 18.3251 13C18.3251 16.015 15.9364 18.4678 13 18.4678Z"
                                                            fill="white" />
                                                        <path
                                                            d="M19.9405 3.56836C18.836 3.56836 17.9376 4.49101 17.9376 5.62495C17.9376 6.75909 18.836 7.68174 19.9405 7.68174C21.0451 7.68174 21.9437 6.75909 21.9437 5.62495C21.9437 4.49082 21.0451 3.56836 19.9405 3.56836ZM19.9405 6.1893C19.6376 6.1893 19.3909 5.93606 19.3909 5.62495C19.3909 5.31365 19.6376 5.0606 19.9405 5.0606C20.2437 5.0606 20.4904 5.31365 20.4904 5.62495C20.4904 5.93606 20.2437 6.1893 19.9405 6.1893Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <clipPath>
                                                            <rect width="24.7902" height="25.4544" fill="white"
                                                                transform="translate(0.60498 0.272461)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
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

$widgets_manager->register(new Xroof_Team_Widget_1());
