<?php echo get_header(); ?>

<?php

$sidebar = is_active_sidebar('services-details-sidebar');
$col_content = $sidebar ? 'col-lg-8' : 'col-12';

?>
<section class="services-details">
    <div class="container">
        <div class="row g-4 g-xl-5 services-details__row">
            <?php if ($sidebar): ?>
                <aside class="col-lg-4">
                    <?php dynamic_sidebar('services-details-sidebar'); ?>
                </aside>
            <?php endif; ?>

            <div class=" <?php echo esc_attr($col_content); ?>">
                <div class="services-details__right">
                    <div class="services-details__content">
                        <div class="services-details__highlight-thumb">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full', ['class' => 'img-fluid w-100']);
                            }
                            ?>
                        </div>

                        <?php if (get_the_title()): ?>
                            <h2 class="services-details__highlight-title mb-4 mt-6 mt-xl-8">
                                <?php echo esc_html(get_the_title()); ?>
                            </h2>
                        <?php endif; ?>

                        <dv class="services-details__text mb-20"><?php the_content(); ?></dv>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo get_footer(); ?>