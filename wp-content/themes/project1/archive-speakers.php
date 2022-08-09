<?php get_header(); ?>

<main class="main" id="main">
    <section class="archive-content">
        <div class="container">
            <div class="archive-content__box">
                <div class="archive-content__left">
                    <?php get_sidebar(); ?>
                </div>
    
                <div class="archive-content__right">
                    <div class="archive-content__top">
                        <h2 class="archive-content__title">Speakers</h2>
                    </div>
        
                    <div class="archive-content__tabs">
                        <div class="archive-content__list" id="archive-list">
                            <?php
                                $speakers = new WP_Query(array(
                                    'post_type' => 'speakers',
                                    'posts_per_page' => -1,
                                ));
                            ?>
                            <?php
                            if ( $speakers->have_posts() ) :
                                while ( $speakers->have_posts() ) :
                                    $speakers->the_post();
                                    get_template_part('template-parts/loop','speaker');
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>