<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jaime_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jaime' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jaime' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'jaime_widgets_init' );

?>