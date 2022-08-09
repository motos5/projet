<?php get_header(); ?>

<main class="main">
    <section class="archive-content">
        <div class="container">
            <div class="archive-content__top">
                <h2 class="archive-content__title">Speakers</h2>
                <?php
                // Get Taxonomy
                $speakers_types = get_terms( array(
                'taxonomy' => 'category-speakers',
                'hide_empty' => false,
                ) );
                ?>
                <div class="archive-content__buttons-list">
                <?php
                $i = 0;
                $active = '';
                // Displaying Taxonomy Terms
                    foreach ($speakers_types as $type) {
                    if($i == 0) {$active = 'is-active';
                    } else {
                        $active = '';
                    } ?>
                    <?php

                    ?>
                        <a class="archive-content__buttons-link <?php echo esc_attr($active); ?>" href="#tab-<?php echo $i ?>"><?php echo $type->name; ?></a>
                    <?php $i++; } ?>
                </div>
            </div>

            <div class="archive-content__tabs">
                <?php
                $j = 0;
                $tab_active = '';
                foreach($speakers_types as $category) {
                    if($j == 0) {
                        $tab_active = 'is-active';

                    } else {
                        $tab_active = '';
                    } ?>
                <div class="archive-content__list <?php echo esc_attr($tab_active); ?>" id="tab-<?php echo $j ?>">
                    <?php
                        $speakers = new WP_Query(array(
                            'post_type' => 'speakers',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                'taxonomy' => 'category-speakers',
                                'field'    => 'slug',
                                'terms'    => $category->slug
                            )),
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
                <?php $j++; } ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>