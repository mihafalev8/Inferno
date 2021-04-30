<?php 

	$fitness_insight_sticky_header = get_theme_mod('fitness_insight_sticky_header');

	$fitness_insight_custom_style= "";

	if($fitness_insight_sticky_header != true){

		$fitness_insight_custom_style .='.menu_header.fixed{';

			$fitness_insight_custom_style .='position: static;';
			
		$fitness_insight_custom_style .='}';
	}