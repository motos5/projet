<?php

require_once __DIR__ . '/includes/setup.php';
require_once __DIR__ . '/includes/enqueue.php';
require_once __DIR__ . '/includes/post-types.php';
require_once __DIR__ . '/includes/widget.php';
require_once __DIR__ . '/includes/ajax.php';

// Register menus
register_nav_menus(
	array(
		'menu-header' => esc_html__( 'Header navigation', 'pro' ),
		'menu-footer' => esc_html__( 'Footer navigation', 'pro' ),
	)
);