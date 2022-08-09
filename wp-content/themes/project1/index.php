<?php get_header(); ?>
    <main id="site-content">
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/loop', get_post_type() );
            }
        }
        ?>
    </main>
<?php  get_footer();