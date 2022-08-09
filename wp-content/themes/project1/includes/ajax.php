<?php

//Add Ajax Actions
add_action('wp_ajax_pro_filter', 'pro_filter');
add_action('wp_ajax_nopriv_pro_filter', 'pro_filter');

// Function for Return Products AJAX
function pro_filter() {
    $args = [
        'post_type' => 'speakers',
        'posts_per_page' => -1,
    ];
    if( ! empty( $_POST['position'] ) AND ! empty( $_POST['country'] )  ) {
        $args['tax_query'] = [
            'relation' => 'AND',
            [
                'taxonomy' => 'category-countries',
                'field' => 'term_id',
                'terms' => intval($_POST['country']),
            ],
            [
                'taxonomy' => 'category-positions',
                'field' => 'term_id',
                'terms' => intval($_POST['position']),
            ]
        ];
    } else {
        if( ! empty( $_POST['position'] )  ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'category-positions',
                    'field' => 'term_id',
                    'terms' => intval($_POST['position']),
                ]
            ];
        }
        if( ! empty( $_POST['country'] )  ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'category-countries',
                    'field' => 'term_id',
                    'terms' => intval($_POST['country']),
                ]
            ];
        }
    }

    $speakers = new WP_Query($args);
    if ( $speakers->have_posts() ) :
        while ( $speakers->have_posts() ) :
            $speakers->the_post();
            get_template_part('template-parts/loop','speaker');
        endwhile;
    endif;
    wp_reset_postdata();
    wp_die();
}
