<?php

add_action('init', 'pro_post_types');
function pro_post_types() {
    register_taxonomy(
        'category-positions',
        'speakers',
        array(
            "label" => esc_html__('Category for Positions', 'pro'),
            "singular_label" => esc_html__('Category for Position', 'pro'),
            'rewrite' => array( 'slug' => 'positions' ), // Slug Taxpnomy
            "hierarchical" => false,
        )
    );
    register_taxonomy(
        'category-countries',
        'speakers',
        array(
            "label" => esc_html__('Category for Countries', 'pro'),
            "singular_label" => esc_html__('Category for Countrie', 'pro'),
            'rewrite' => array( 'slug' => 'countries' ), // Slug Taxpnomy
            "hierarchical" => false,
        )
    );
    register_post_type('speakers', array(
        'labels'             => array(
            'name'               => esc_html__('Speakers', 'pro'),
            'singular_name'      => esc_html__('Speaker', 'pro'),
            'add_new'            => esc_html__('Add new', 'pro'),
            'add_new_item'       => esc_html__('Add new speaker', 'pro'),
            'edit_item'          => esc_html__('Edit speaker', 'pro'),
            'new_item'           => esc_html__('New speaker', 'pro'),
            'view_item'          => esc_html__('View speaker', 'pro'),
            'search_items'       => esc_html__('Search speaker', 'pro'),
            'not_found'          => esc_html__('Not found speakers', 'pro'),
            'not_found_in_trash' => esc_html__('Not found speakers in trash', 'pro'),
            'parent_item_colon'  => esc_html__('', 'pro'),
            'menu_name'          => esc_html__('Speakers', 'pro'),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'speakers'),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-megaphone',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','thumbnail','excerpt')
    ) );
    register_post_type('sessions', array(
        'labels'             => array(
            'name'               => esc_html__('Sessions', 'pro'),
            'singular_name'      => esc_html__('Session', 'pro'),
            'add_new'            => esc_html__('Add new', 'pro'),
            'add_new_item'       => esc_html__('Add new  session', 'pro'),
            'edit_item'          => esc_html__('Edit speake session', 'pro'),
            'new_item'           => esc_html__('New speake session', 'pro'),
            'view_item'          => esc_html__('View speake session', 'pro'),
            'search_items'       => esc_html__('Search speake session', 'pro'),
            'not_found'          => esc_html__('Not found sessions', 'pro'),
            'not_found_in_trash' => esc_html__('Not found sessions in trash', 'pro'),
            'parent_item_colon'  => esc_html__('', 'pro'),
            'menu_name'          => esc_html__('Sessions', 'pro'),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'sessions'),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-format-aside',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ) );
}