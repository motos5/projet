<?php
function pro_setup() {
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'speakers_archive', 180, 180, true );
	// add_image_size( 'vertical_testimonial', 225, 332, true );
	// add_image_size( 'thumbnails_feature', 438, 455, true );
	// add_image_size('news-thumb', 733, 9999, false);

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
add_action( 'after_setup_theme', 'pro_setup', 20 );

// Enqueue scripts and styles.
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
add_action( 'wp_enqueue_scripts', 'pro_scripts' );



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

// Register Sidebar and Widgets
function pro_widgets_init() {
	// Sidebar for News
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
	register_widget( 'pro_widget_filter' );
}
add_action( 'widgets_init', 'pro_widgets_init' );

// Add Widget Filter

class Pro_Widget_Filter extends WP_Widget {
    public function __construct() {
        $widget_options = array(
            'classname' => 'pro_widget_filter',
            'description' => esc_html__('Widget for filter', 'pro'),
        );
        parent::__construct( 'pro_widget_filter', esc_html__('Widget Filter', 'pro'), $widget_options );
    }

    public function widget( $args, $instance ) {
    // Params
        $title_1 = apply_filters( 'widget_title', $instance['title_1'] );
        $title_2 = apply_filters( 'widget_title', $instance['title_2'] );
    
    // Display
        echo $args['before_widget']; ?>
		
        <div class="sidebar-filter">
			<form class="sidebar-filter__form" method="$_POST">
				<h3 class="sidebar-filter__title"><?php echo esc_html_e($title_1, 'pro'); ?></h3>
				<div class="sidebar-filter__items items-1">
					<input type="hidden" name="action" value="filter">
					<select class="sidebar-filter__item" name="positions" id="positions">
						<option value="1"></option>
						<?php
						// Get Taxonomy Positions
							$position_types = get_terms( array(
							'taxonomy' => 'category-positions',
							'hide_empty' => false,
							) );
							if( ! empty( $position_types ) ) {
								foreach( $position_types as $position ) { ?>
									<option value="<?php echo $position->term_id ?>"><?php echo esc_html__($position->name, 'pro'); ?></option>
								<?php }
							}
						?>
					</select>
				</div>

				<h3 class="sidebar-filter__title"><?php echo esc_html_e($title_2, 'pro'); ?></h3>
				<div class="sidebar-filter__items items-2">
					<select class="sidebar-filter__item" name="countries" id="countries">
						<option value="1"></option>
					<?php
						// Get Taxonomy Countries
							$country_types = get_terms( array(
							'taxonomy' => 'category-countries',
							'hide_empty' => false,
							) );
							if( ! empty( $country_types ) ) {
								foreach( $country_types as $country ) { ?>
									<option value="<?php echo $country->term_id ?>"><?php echo esc_html__($country->name, 'pro'); ?></option>
								<?php }
							}
						?>
					</select>
				</div>
			</form>
		</div>
    <?php   
        echo $args['after_widget'];
    }

    public function form( $instance ) {
    // Params
        $title_1 = @ $instance['title_1'] ?: esc_html__('Select Position', 'pro');
        $title_2 = @ $instance['title_2'] ?: esc_html__('Select Country', 'pro');
        
    // Display
    ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title_1' ); ?>"><?php _e( 'Title 1:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title_1' ); ?>" name="<?php echo $this->get_field_name( 'title_1' ); ?>" type="text" value="<?php echo esc_attr( $title_1 ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title_2' ); ?>"><?php _e( 'Title 2:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title_2' ); ?>" name="<?php echo $this->get_field_name( 'title_2' ); ?>" type="text" value="<?php echo esc_attr( $title_2 ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title_1'] = ( ! empty( $new_instance['title_1'] ) ) ? strip_tags( $new_instance['title_1'] ) : '';
		$instance['title_2'] = ( ! empty( $new_instance['title_2'] ) ) ? strip_tags( $new_instance['title_2'] ) : '';
		return $instance;
	}
}

// Function for Return Products AJAX

function pro_filter() {
	$query_data = $_POST;
	
	$args = [
		'post_type' => 'speakers',
	];
	if( ! empty( $query_data['position'] ) AND ! empty( $query_data['country'] )  ) {
        $args['tax_query'] = [
                'relation' => 'AND',
            [
                'taxonomy' => 'category-countries',
                'field' => 'term_id',
                'terms' => intval($query_data['country']),
            ],
            [
                'taxonomy' => 'category-positions',
                'field' => 'term_id',
                'terms' => intval($query_data['position']),
            ]
        ];
    } else {
        if( ! empty( $query_data['position'] )  ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'category-positions',
                    'field' => 'term_id',
                    'terms' => intval($query_data['position']),
                ]
            ];
        }
        if( ! empty( $query_data['country'] )  ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'category-countries',
                    'field' => 'term_id',
                    'terms' => intval($query_data['country']),
                ]
            ];
        }
    }
	
	
	$speakers = new WP_Query($args);
    if ( $speakers->have_posts() ) : while ( $speakers->have_posts() ) : $speakers->the_post();?>
		<div class="archive-content__item">
			<a class="archive-content__flag-link" href="#">
				<?php
				if( get_field('flag') == 'germany' ) { ?>
					
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8 15.5C12.1421 15.5 15.5 12.1421 15.5 8C15.5 3.85786 12.1421 0.5 8 0.5C3.85786 0.5 0.5 3.85786 0.5 8C0.5 12.1421 3.85786 15.5 8 15.5Z" fill="#ED4C5C"/>
							<path d="M11.75 6.75H9.25V4.25H6.75V6.75H4.25V9.25H6.75V11.75H9.25V9.25H11.75V6.75Z" fill="white"/>
							<path d="M7.97344 0.5C4.69844 0.5 1.92344 2.6 0.898438 5.5H15.0484C14.0234 2.6 11.2484 0.5 7.97344 0.5Z" fill="#3E4347"/>
							<path d="M7.97344 15.5C11.2484 15.5 14.0234 13.425 15.0484 10.5H0.898438C1.92344 13.425 4.69844 15.5 7.97344 15.5Z" fill="#FFE62E"/>
							<path d="M0.901562 5.5C0.626562 6.275 0.476562 7.125 0.476562 8C0.476562 8.875 0.626562 9.725 0.901562 10.5H15.0516C15.3266 9.725 15.4766 8.875 15.4766 8C15.4766 7.125 15.3266 6.275 15.0516 5.5H0.901562Z" fill="#ED4C5C"/>
						</svg>
					
				<?php } if( get_field('flag') == 'switzerland' ) { ?>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8 15.5C12.1421 15.5 15.5 12.1421 15.5 8C15.5 3.85786 12.1421 0.5 8 0.5C3.85786 0.5 0.5 3.85786 0.5 8C0.5 12.1421 3.85786 15.5 8 15.5Z" fill="#ED4C5C"/>
							<path d="M11.75 6.75H9.25V4.25H6.75V6.75H4.25V9.25H6.75V11.75H9.25V9.25H11.75V6.75Z" fill="white"/>
						</svg>
				<?php } ?>
			</a>
			<a class="archive-content__country-link" href="<?php the_permalink(); ?>">
				<?php echo get_the_post_thumbnail(get_the_ID(), 'speakers_archive', array('class' => "archive-content__country-img",)); ?>
			</a>
			<div class="archive-content__info">
				<a class="archive-content__name-link" href="<?php the_permalink(); ?>">
					<h4 class="archive-content__name"><?php the_title(); ?></h4>
				</a>
				<a class="archive-content__position-link" href="#">
					<p class="archive-content__position"><?php the_excerpt(); ?></p>
				</a>
			</div>
		</div>
	<?php endwhile;
		wp_reset_postdata();
	endif;
	die();
}

//Add Ajax Actions
add_action('wp_ajax_pro_filter', 'pro_filter');
add_action('wp_ajax_nopriv_pro_filter', 'pro_filter');