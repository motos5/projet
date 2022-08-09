<?php

// Register Widget
add_action( 'widgets_init', function() {
    register_widget( 'Pro_Widget_Filter' );
} );

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
                        <option value=""></option>
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
                        <option value=""></option>
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