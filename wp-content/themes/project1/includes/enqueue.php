<?php

// Enqueue scripts and styles.
add_action( 'wp_enqueue_scripts', 'pro_scripts' );
function pro_scripts() {
    wp_enqueue_style( 'pro-style', get_stylesheet_uri(), array(), '1.0');

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
    wp_enqueue_script( 'jquery');
    // Scripts AJAX Filter
    wp_register_script( 'pro-filter', get_stylesheet_directory_uri() . '/assets/js/pro_filter.js', array( 'jquery' ), '', true );
    wp_localize_script( 'pro-filter', 'pro_settings', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'pro-filter' );
    // Main JS
    wp_enqueue_script( 'pro-main', get_stylesheet_directory_uri() . '/assets/js/maine.js', array(), '1.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}