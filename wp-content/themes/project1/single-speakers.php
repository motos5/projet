<?php get_header(); ?>

<main class="main">
    <div class="top-button">
        <div class="container">
            <a class="top-button__link" href="<?php echo get_post_type_archive_link('speakers'); ?>">
                <svg class="top-button__arrow" width="31" height="8" viewBox="0 0 31 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.646447 3.64645C0.451184 3.84171 0.451184 4.15829 0.646447 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976311 4.7308 0.659728 4.53553 0.464466C4.34027 0.269204 4.02369 0.269204 3.82843 0.464466L0.646447 3.64645ZM31 3.5H1V4.5H31V3.5Z" fill="#505050"/>
                </svg>
                All speakers
            </a>
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="content__inner">
                <div class="content__left">
                    <h2 class="content__title"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
                <div class="content__right">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
            </div>
        </div>
    </section>
    <div class="sessions">
        <div class="container">
            <div class="sessions__inner">
            <h3 class="sessions__title">Sessions</h3>
            <?php
                $sessions = new WP_Query(array(
                    'post_type' => 'sessions',
                    'posts_per_page' => -1,
                ));
                ?>
                <?php if ( $sessions->have_posts() ) : while ( $sessions->have_posts() ) : $sessions->the_post();?>
                
                <?php 
                    $post_objects = get_field('session');

                    if( $post_objects ): ?>
                        <a href="<?php the_permalink(); ?>" class="sessions__link"><?php the_title(); ?></a>
                        <?php wp_reset_postdata(); ?>
                    <?php endif;
                 ?>
                <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="questions">
        <div class="container questions__container">
            <p class="questions__text">Do you have any <span>questions?</span></p>
            <a class="arrow-btn questions__btn" href="#">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.7279 12C25.7279 11.4477 25.2802 11 24.7279 11L15.7279 11C15.1756 11 14.7279 11.4477 14.7279 12C14.7279 12.5523 15.1756 13 15.7279 13L23.7279 13L23.7279 21C23.7279 21.5523 24.1756 22 24.7279 22C25.2802 22 25.7279 21.5523 25.7279 21V12ZM12.7071 25.435L25.435 12.7071L24.0208 11.2929L11.2929 24.0208L12.7071 25.435Z" fill="#202020"/>
                    <circle cx="18" cy="18" r="17" stroke="#202020" stroke-width="2"/>
                </svg>
                Contact us
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>