<?php
/**
 * The header for our theme
 *
 * @subpackage Fitness Insight
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fitness-insight' ); ?></a>
	<?php if( get_theme_mod('fitness_insight_theme_loader',true) != ''){ ?>
		<div class="preloader">
			<div class="load">
			  <hr/><hr/><hr/><hr/>
			</div>
		</div>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="container">
				<div class="wrap_figure">
					<div class="row">
						<div class="col-lg-3 col-md-3">
							<div class="logo">
						        <?php if ( has_custom_logo() ) : ?>
				            		<?php the_custom_logo(); ?>
					            <?php endif; ?>
				              	<?php $blog_info = get_bloginfo( 'name' ); ?>
				              		<?php if( get_theme_mod('fitness_insight_logo_title',true) != '' ){ ?>
						                <?php if ( ! empty( $blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						                  	<?php else : ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					                  		<?php endif; ?>
						                <?php endif; ?>
						            <?php }?>
					                <?php
				                  		$description = get_bloginfo( 'description', 'display' );
					                  	if ( $description || is_customize_preview() ) :
					                ?>
					                <?php if( get_theme_mod('fitness_insight_logo_text',true) != '' ){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($description); ?>
					                  	</p>
					                <?php } ?>
				              	<?php endif; ?>
						    </div>
						</div>
						<div class="col-lg-9 col-md-9">
							<div class="top_header">
								<div class="row">
									<div class="col-lg-9 col-md-8">
										<?php if( get_theme_mod('fitness_insight_call_text') != '' || get_theme_mod('fitness_insight_call') != ''){ ?>
											<span><i class="fas fa-phone"></i><strong><?php echo esc_html(get_theme_mod('fitness_insight_call_text','')); ?></strong>: <?php echo esc_html(get_theme_mod('fitness_insight_call','')); ?></span>
										<?php }?>
										<?php if( get_theme_mod('fitness_insight_email_text') != '' || get_theme_mod('fitness_insight_email') != ''){ ?>
											<span><i class="far fa-envelope"></i><strong><?php echo esc_html(get_theme_mod('fitness_insight_email_text','')); ?></strong>: <?php echo esc_html(get_theme_mod('fitness_insight_email','')); ?></span>
										<?php }?>
									</div>
									<div class="col-lg-3 col-md-4">
										<div class="links">
											<?php if( get_theme_mod('fitness_insight_facebook') != ''){ ?>
												<a href="<?php echo esc_url(get_theme_mod('fitness_insight_facebook','')); ?>"><i class="fab fa-facebook-f"></i></a>
											<?php }?>
											<?php if( get_theme_mod('fitness_insight_twitter') != ''){ ?>
												<a href="<?php echo esc_url(get_theme_mod('fitness_insight_twitter','')); ?>"><i class="fab fa-twitter"></i></a>
											<?php }?>
											<?php if( get_theme_mod('fitness_insight_youtube') != ''){ ?>
												<a href="<?php echo esc_url(get_theme_mod('fitness_insight_youtube','')); ?>"><i class="fab fa-youtube"></i></a>
											<?php }?>
											<?php if( get_theme_mod('fitness_insight_instagram') != ''){ ?>
												<a href="<?php echo esc_url(get_theme_mod('fitness_insight_instagram','')); ?>"><i class="fab fa-instagram"></i></a>
											<?php }?>
										</div>
									</div>
								</div>
							</div>
							<div class="menu_header">
							   	<?php if(has_nav_menu('primary')){?>
									<div class="toggle-menu gb_menu">
										<button onclick="fitness_insight_gb_Menu_open()" class="gb_toggle"><i class="fas fa-ellipsis-h"></i><p><?php esc_html_e('Menu','fitness-insight'); ?></p></button>
									</div>
								<?php }?>
						   		<?php get_template_part('template-parts/navigation/navigation'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>