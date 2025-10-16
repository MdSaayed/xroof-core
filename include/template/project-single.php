<?php

echo get_header();

$sidebar = is_active_sidebar('services-details-sidebar');
$col_content = $sidebar ? 'col-lg-8' : 'col-12';
?>

<section class="project-details">
    <div class="project__container container">
        <div class="row g-4 g-xl-5">
            <div class="<?php echo esc_attr($col_content); ?>">
                <?php if (has_post_thumbnail()): ?>
                    <div class="project__thumb-wrap">
                        <?php the_post_thumbnail('large', ['class' => 'img-fluid w-100']); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_the_title()): ?>
                    <h2 class="project-details__highlight-title my-6">
                        <?php echo esc_html(get_the_title()); ?>
                    </h2>
                <?php endif; ?>

                <div class="project-details__text">
                    <?php the_content(); ?>
                </div>
            </div>

            <?php if (!empty($sidebar)): ?>
                <div class="col-lg-4">
                    <?php dynamic_sidebar('project-details-sidebar'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php echo get_footer(); ?>