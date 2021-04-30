<?php
/**
 * Netnus Cardio Lite functions and definitions
 *
 * @package Netnus Cardio Lite
 */

if ( ! function_exists( 'netnus_cardio_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function netnus_cardio_lite_setup() {
	
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'netnus-cardio-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('netnus-cardio-lite-homepage-thumb',true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'netnus-cardio-lite' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	add_theme_support( 'custom-color', array(
		'default-color' => '5c5c5c'
	) );
	add_editor_style( array( 'editor-style.css', netnus_cardio_lite_font_url() ) );
}
endif; // netnus_cardio_lite_setup
add_action( 'after_setup_theme', 'netnus_cardio_lite_setup' );


function netnus_cardio_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'netnus-cardio-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'netnus-cardio-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'netnus_cardio_lite_widgets_init' );

function netnus_cardio_lite_font_url(){
		$font_url = '';
		
		/* Translators: If there are any character that are
		* not supported by Rajdhani, translate this to off, do not
		* translate into your own language.
		*/
		$rajdh = _x('on', 'Rajdhani font:on or off','netnus-cardio-lite');
		
		
		if( 'off' !== $rajdh ){
			$font_family = array();
			
			if('off' !== $rajdh){
				$font_family[] = 'Rajdhani:400,500,700';
			}			
			
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'https://fonts.googleapis.com/css');
		}
		
	return $font_url;
	}

function netnus_cardio_lite_scripts() {
	wp_enqueue_style( 'netnus-cardio-lite-font', netnus_cardio_lite_font_url(), array() );
	wp_enqueue_style( 'netnus-cardio-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'netnus-cardio-lite-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );
	wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css');
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/css/font-awesome.css' );	
	wp_enqueue_script( 'netnus-cardio-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20190715', true );
	wp_enqueue_script( 'jquery-nivo-slider-js', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'netnus-cardio-lite-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_localize_script( 'netnus-cardio-lite-navigation', 'NavigationScreenReaderText', array() );
}
add_action( 'wp_enqueue_scripts', 'netnus_cardio_lite_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function netnus_cardio_lite_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'netnus_cardio_lite_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Load customize pro
 */
require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );
