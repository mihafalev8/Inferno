<?php
/**
 * Theme functions and definitions
 *
 * @package fitness_business
 */

if ( ! function_exists( 'fitness_business_enqueue_styles' ) ) :
	/**
	 * @since Fitness Business 1.0.0
	 */
	function fitness_business_enqueue_styles() {
		wp_enqueue_style( 'fitness-business-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'fitness-business-style', get_stylesheet_directory_uri() . '/style.css', array( 'fitness-business-style-parent' ), '1.0.0' );
		wp_enqueue_style( 'fitness-business-google-fonts', '//fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700', false );
	}
endif;
add_action( 'wp_enqueue_scripts', 'fitness_business_enqueue_styles', 99 );