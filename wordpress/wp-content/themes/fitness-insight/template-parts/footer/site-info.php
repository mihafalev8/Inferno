<?php
/**
 * Displays footer site info
 *
 * @subpackage Fitness Insight
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info">
	<?php
		echo esc_html( get_theme_mod( 'fitness_insight_footer_text' ) );
		printf(
			/* translators: %s: Fitness WordPress Theme. */
			esc_html__( ' %s ', 'fitness-insight' ),
			'<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-fitness-wordpress-theme/', 'fitness-insight' ) . '"> Fitness WordPress Theme</a>'
		);
	?>
</div>