<?php

/**
 * Enqueue scripts and styles.
 */
function jaime_scripts() {
    // Add `style.css`
    wp_enqueue_style( 'jaime-style', get_stylesheet_uri() );

    // Add `js/thisscript.js`
    wp_enqueue_script( 'thisscript', get_template_directory_uri() . '/js/thisscript.js', array('jquery') );

    // Add `js/get_instagram.js`
    wp_enqueue_script( 'get_instagram', get_template_directory_uri() . '/js/get_instagram.js', array('jquery') );

    // Add slick-carousel
    wp_enqueue_script( 'slick-carousel', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js', array('jquery') );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'jaime_scripts' );

?>