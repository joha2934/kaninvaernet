<?php
/**
 * kaninvaernet Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kaninvaernet
 * @since 1.0.0
 */

/*** Define Constants */
define( 'CHILD_THEME_KANINVAERNET_VERSION', '1.0.0' );

/*** Enqueue styles */
function child_enqueue_styles() {

	wp_enqueue_style( 'kaninvaernet-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_KANINVAERNET_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );


/* style der overruler donerings formularen */


function my_custom_override_iframe_template_styles() {
    wp_enqueue_style(
        'givewp-iframes-styles',
        get_stylesheet_directory_uri() . '/form-template-styles.css',
        /**
         *  Below, use give-sequoia-template-css to style the multi-step donation form
         *  or use give-donor-dashboards-app to style the donor dashboard
         */
        'give-sequoia-template-css'
    );
	

}

add_action('wp_print_styles', 'my_custom_override_iframe_template_styles', 10);