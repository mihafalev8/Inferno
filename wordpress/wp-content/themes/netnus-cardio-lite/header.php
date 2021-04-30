<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Netnus Cardio Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php _e( 'Skip to content', 'netnus-cardio-lite' ); ?>
</a>

<header id="header" class="header">
	<?php
		$hidetphead = get_theme_mod('hide_tophead','1');
		if( $hidetphead == '' ){ 

		$tpphn = get_theme_mod('call-txt');
		$tpmail = get_theme_mod('email-txt');

		$fb = get_theme_mod('facebook');
		$gp = get_theme_mod('google-plus');
		$tw = get_theme_mod('twitter');
		$in = get_theme_mod('linkedin');
		$pi = get_theme_mod('pinterest');
	?>
	<div class="top-header">
		<div class="container">
			<div class="flex justify-content-between align-items-center">
				<?php if( $tpphn != '' || $tpmail != '' ){ ?>
				<div class="top-header-left">
					<div class="flex">
						<?php if( !empty( $tpphn) ) { ?>
						<div class="top-head-col">
							<span class="col-ph"><i class="fa fa-phone-square" aria-hidden="true"></i><?php echo esc_html($tpphn); ?></span>
						</div><!-- top-head-col -->
						<?php } if( !empty( $tpmail) ) { ?>
						<div class="top-head-col">
							<span class="col-mail">
								<a href="mailto:<?php echo esc_attr($tpmail);?>"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html($tpmail);?></a>
							</span>
						</div><!-- top-head-col -->
						<?php } ?>
					</div><!-- flex -->
				</div><!-- top left -->
				<?php } 
					if( $fb != '' || $gp != '' || $tw != '' || $in != '' || $pi != ''){
				?>
				<div class="top-header-right">
					<div class="social">
						<?php if( $fb != '' ){ ?>
							<a href="<?php echo esc_url($fb); ?>" target="_blank" title="facebook"><i class="fa fa-facebook-f"></i></a>
						<?php } if( $gp != '' ){ ?>
							<a href="<?php echo esc_url($gp); ?>" target="_blank" title="google-plus"><i class="fa fa-google-plus"></i></a>
						<?php } if( $tw != '' ){ ?>
							<a href="<?php echo esc_url($tw); ?>" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a>
						<?php } if( $in != '' ){ ?>
							<a href="<?php echo esc_url($in); ?>" target="_blank" title="linkedin"><i class="fa fa-linkedin"></i></a>
						<?php } if( $pi != '' ){ ?>
							<a href="<?php echo esc_url($pi); ?>" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a>
						<?php } ?>
					</div><!-- social -->
				</div><!-- top right -->
				<?php
					}
				?>
			</div><!-- flex -->
		</div><!-- container -->
	</div><!-- top header -->
	<?php
		}
	?>

	<div class="container">
		<div class="flex justify-content-between align-items-center tab-block">
			<div class="header-left">
				<div class="logo">
					<?php netnus_cardio_lite_the_custom_logo(); ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
						<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_html($description); ?></p>
					<?php endif; ?>
				</div><!-- .logo -->
			</div><!-- header-left -->
			<div class="header-right">
				<div class="toggle">
					<a class="toggleMenu" href="#"><?php esc_html_e('Menu','netnus-cardio-lite'); ?></a>
				</div><!-- toggle -->
				<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">
						<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
				</nav>
			</div><!-- header-right -->
		</div><!-- flex -->
	</div><!-- container -->
</header><!-- header -->