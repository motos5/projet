<?php

add_action( 'after_setup_theme', 'pro_setup', 20 );
function pro_setup() {

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'speakers_archive', 180, 180, true );
    add_image_size('home_header_bg', 1500, 9999, false);
    // add_image_size( 'vertical_testimonial', 225, 332, true );
    // add_image_size( 'thumbnails_feature', 438, 455, true );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support(
        'custom-background',
        apply_filters(
            'pro_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support(
        'custom-logo',
        array(
            'height'      => 46,
            'width'       => 99,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}

// Register Sidebar
add_action( 'widgets_init', function() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'pro' ),
            'id'            => 'sidebar_pro',
            'description'   => esc_html__( 'Add widgets here.', 'pro' ),
            'before_widget' => '<section id="%1$s" class="widgets %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="sidebar-filter__title">',
            'after_title'   => '</h3>',
        )
    );
} );

// Register menus
register_nav_menus(
	array(
		'menu-header' => esc_html__( 'Header navigation', 'pro' ),
		'menu-footer' => esc_html__( 'Footer navigation', 'pro' ),
	)
);

function is_active_sidebar_with_content( $sidebar ) {
    $sidebars = wp_get_sidebars_widgets();
    if ( isset( $sidebars[ $sidebar ] ) && ! empty( $sidebars[ $sidebar] ) ) {
        return true;
    }
    return false;
}