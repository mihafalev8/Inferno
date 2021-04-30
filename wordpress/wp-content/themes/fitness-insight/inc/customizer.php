<?php
/**
 * Fitness Insight: Customizer
 *
 * @subpackage Fitness Insight
 * @since 1.0
 */

function fitness_insight_customize_register( $wp_customize ) {

	wp_enqueue_style('fitness-insight-customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	// Register the custom control type.
	$wp_customize->register_control_type( 'Fitness_Insight_Toggle_Control' );

 	$wp_customize->add_section('fitness_insight_pro', array(
        'title'    => __('UPGRADE FITNESS PREMIUM', 'fitness-insight'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('fitness_insight_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Fitness_Insight_Pro_Control($wp_customize, 'fitness_insight_pro', array(
        'label'    => __('FITNESS PREMIUM', 'fitness-insight'),
        'section'  => 'fitness_insight_pro',
        'settings' => 'fitness_insight_pro',
        'priority' => 1,
    )));

    // Theme General Settings
    $wp_customize->add_section('fitness_insight_theme_settings',array(
        'title' => __('Theme General Settings', 'fitness-insight'),
    ) );

    $wp_customize->add_setting( 'fitness_insight_sticky_header', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Fitness_Insight_Toggle_Control( $wp_customize, 'fitness_insight_sticky_header', array(
		'label'       => esc_html__( 'Show Sticky Header', 'fitness-insight' ),
		'section'     => 'fitness_insight_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'fitness_insight_sticky_header',
	) ) );

    $wp_customize->add_setting( 'fitness_insight_theme_loader', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Fitness_Insight_Toggle_Control( $wp_customize, 'fitness_insight_theme_loader', array(
		'label'       => esc_html__( 'Show Site Loader', 'fitness-insight' ),
		'section'     => 'fitness_insight_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'fitness_insight_theme_loader',
	) ) );

    // Post Layouts
    $wp_customize->add_section('fitness_insight_layout',array(
        'title' => __('Post Layout', 'fitness-insight'),
        'description' => __( 'Change the post layout from below options', 'fitness-insight' ),
    ) );

	$wp_customize->add_setting( 'fitness_insight_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Fitness_Insight_Toggle_Control( $wp_customize, 'fitness_insight_post_sidebar', array(
		'label'       => esc_html__( 'Show Fullwidth', 'fitness-insight' ),
		'section'     => 'fitness_insight_layout',
		'type'        => 'toggle',
		'settings'    => 'fitness_insight_post_sidebar',
	) ) );

	$wp_customize->add_setting( 'fitness_insight_single_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Fitness_Insight_Toggle_Control( $wp_customize, 'fitness_insight_single_post_sidebar', array(
		'label'       => esc_html__( 'Show Single Post Fullwidth', 'fitness-insight' ),
		'section'     => 'fitness_insight_layout',
		'type'        => 'toggle',
		'settings'    => 'fitness_insight_single_post_sidebar',
	) ) );

    $wp_customize->add_setting('fitness_insight_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'fitness_insight_sanitize_select'
	));
	$wp_customize->add_control('fitness_insight_post_option',array(
		'label' => esc_html__('Select Layout','fitness-insight'),
		'section' => 'fitness_insight_layout',
		'setting' => 'fitness_insight_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','fitness-insight'),
            'grid_post' => __('Grid Post','fitness-insight'),
        ),
	));

    $wp_customize->add_setting('fitness_insight_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'fitness_insight_sanitize_select'
	));
	$wp_customize->add_control('fitness_insight_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','fitness-insight'),
		'section' => 'fitness_insight_layout',
		'setting' => 'fitness_insight_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','fitness-insight'),
            '2_column' => __('2','fitness-insight'),
            '3_column' => __('3','fitness-insight'),
            '4_column' => __('4','fitness-insight'),
            '5_column' => __('6','fitness-insight'),
        ),
	));

	$wp_customize->add_setting( 'fitness_insight_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Fitness_Insight_Toggle_Control( $wp_customize, 'fitness_insight_date', array(
		'label'       => esc_html__( 'Hide Date', 'fitness-insight' ),
		'section'     => 'fitness_insight_layout',
		'type'        => 'toggle',
		'settings'    => 'fitness_insight_date',
	) ) );

	$wp_customize->add_setting( 'fitness_insight_admin', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Fitness_Insight_Toggle_Control( $wp_customize, 'fitness_insight_admin', array(
		'label'       => esc_html__( 'Hide Author/Admin', 'fitness-insight' ),
		'section'     => 'fitness_insight_layout',
		'type'        => 'toggle',
		'settings'    => 'fitness_insight_admin',
	) ) );

	$wp_customize->add_setting( 'fitness_insight_comment', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Fitness_Insight_Toggle_Control( $wp_customize, 'fitness_insight_comment', array(
		'label'       => esc_html__( 'Hide Comment', 'fitness-insight' ),
		'section'     => 'fitness_insight_layout',
		'type'        => 'toggle',
		'settings'    => 'fitness_insight_comment',
	) ) );

	// Top Header
    $wp_customize->add_section('fitness_insight_top',array(
        'title' => __('Contact info', 'fitness-insight'),
        'description' => __( 'Add contact info in the below feilds', 'fitness-insight' ),
    ) );

    $wp_customize->add_setting('fitness_insight_call_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('fitness_insight_call_text',array(
		'label' => esc_html__('Add Text','fitness-insight'),
		'section' => 'fitness_insight_top',
		'setting' => 'fitness_insight_call_text',
		'type'    => 'text'
	));
    
	$wp_customize->add_setting('fitness_insight_call',array(
		'default' => '',
		'sanitize_callback' => 'fitness_insight_sanitize_phone_number'
	)); 
	$wp_customize->add_control('fitness_insight_call',array(
		'label' => esc_html__('Add Phone Number','fitness-insight'),
		'section' => 'fitness_insight_top',
		'setting' => 'fitness_insight_call',
		'type'    => 'text'
	));

    $wp_customize->add_setting('fitness_insight_email_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('fitness_insight_email_text',array(
		'label' => esc_html__('Add Text','fitness-insight'),
		'section' => 'fitness_insight_top',
		'setting' => 'fitness_insight_email_text',
		'type'    => 'text'
	));

	$wp_customize->add_setting('fitness_insight_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	)); 
	$wp_customize->add_control('fitness_insight_email',array(
		'label' => esc_html__('Add Email Address','fitness-insight'),
		'section' => 'fitness_insight_top',
		'setting' => 'fitness_insight_email',
		'type'    => 'text'
	));

	// Social Media
    $wp_customize->add_section('fitness_insight_urls',array(
        'title' => __('Social Media', 'fitness-insight'),
        'description' => __( 'Add social media links in the below feilds', 'fitness-insight' ),
    ) );
    
	$wp_customize->add_setting('fitness_insight_facebook',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('fitness_insight_facebook',array(
		'label' => esc_html__('Facebook URL','fitness-insight'),
		'section' => 'fitness_insight_urls',
		'setting' => 'fitness_insight_facebook',
		'type'    => 'url'
	));

	$wp_customize->add_setting('fitness_insight_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('fitness_insight_twitter',array(
		'label' => esc_html__('Twitter URL','fitness-insight'),
		'section' => 'fitness_insight_urls',
		'setting' => 'fitness_insight_twitter',
		'type'    => 'url'
	));

	$wp_customize->add_setting('fitness_insight_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('fitness_insight_youtube',array(
		'label' => esc_html__('Youtube URL','fitness-insight'),
		'section' => 'fitness_insight_urls',
		'setting' => 'fitness_insight_youtube',
		'type'    => 'url'
	));

	$wp_customize->add_setting('fitness_insight_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('fitness_insight_instagram',array(
		'label' => esc_html__('Instagram URL','fitness-insight'),
		'section' => 'fitness_insight_urls',
		'setting' => 'fitness_insight_instagram',
		'type'    => 'url'
	));

    //Slider
	$wp_customize->add_section( 'fitness_insight_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'fitness-insight' ),
    	'description' => __( 'Image Dimension ( 1400 x 650 ) px', 'fitness-insight' ),
		'priority'   => null,
	) );

	$wp_customize->add_setting('fitness_insight_slider_arrows',array(
       'default' => true,
       'sanitize_callback'	=> 'fitness_insight_sanitize_checkbox'
    ));
    $wp_customize->add_control('fitness_insight_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Check to show slider','fitness-insight'),
       'section' => 'fitness_insight_slider_section',
    ));

	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$i = 0;	
	$pst_sls[]= __('Select','fitness-insight');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('fitness_insight_post_setting'.$i,array(
			'sanitize_callback' => 'fitness_insight_sanitize_choices',
		));
		$wp_customize->add_control('fitness_insight_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','fitness-insight'),
			'section' => 'fitness_insight_slider_section',
		));
	}
	wp_reset_postdata();

	//Middle Section
	$wp_customize->add_section( 'fitness_insight_middle_section' , array(
    	'title'      => __( 'Services Settings', 'fitness-insight' ),
    	'description' => __( 'Image Dimension ( 500 x 500 ) px', 'fitness-insight' ),
		'priority'   => null,
	) );
	
	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$s = 0;	
	$pst_sls[]= __('Select','fitness-insight');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $s = 1; $s <= 4; $s++ ) {
		$wp_customize->add_setting('fitness_insight_mid_section_icon'.$s,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)); 
		$wp_customize->add_control('fitness_insight_mid_section_icon'.$s,array(
			'label' => esc_html__('Icon','fitness-insight'),
			'description' => esc_html__('Add the fontawesome class to add icon ex: fas fa-envelope','fitness-insight'),
			'section' => 'fitness_insight_middle_section',
			'setting' => 'fitness_insight_mid_section_icon',
			'type'    => 'text'
		));

		$wp_customize->add_setting('fitness_insight_middle_sec_settigs'.$s,array(
			'sanitize_callback' => 'fitness_insight_sanitize_choices',
		));
		$wp_customize->add_control('fitness_insight_middle_sec_settigs'.$s,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','fitness-insight'),
			'section' => 'fitness_insight_middle_section',
		));
	}
	wp_reset_postdata();
    
	//Footer
    $wp_customize->add_section( 'fitness_insight_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'fitness-insight' ),
	) );

    $wp_customize->add_setting('fitness_insight_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('fitness_insight_footer_text',array(
		'label'	=> esc_html__('Copyright Text','fitness-insight'),
		'section'	=> 'fitness_insight_footer_copyright',
		'type'		=> 'text'
	));

	//Logo
    $wp_customize->add_setting( 'fitness_insight_logo_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Fitness_Insight_Toggle_Control( $wp_customize, 'fitness_insight_logo_title', array(
		'label'       => esc_html__( 'Show Site Title', 'fitness-insight' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'fitness_insight_logo_title',
	) ) );

    $wp_customize->add_setting( 'fitness_insight_logo_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Fitness_Insight_Toggle_Control( $wp_customize, 'fitness_insight_logo_text', array(
		'label'       => esc_html__( 'Show Site Tagline', 'fitness-insight' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'fitness_insight_logo_text',
	) ) );


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'fitness_insight_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'fitness_insight_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'fitness_insight_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'fitness_insight_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'fitness-insight' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'fitness-insight' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'fitness_insight_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'fitness_insight_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'fitness_insight_customize_register' );

function fitness_insight_customize_partial_blogname() {
	bloginfo( 'name' );
}

function fitness_insight_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function fitness_insight_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function fitness_insight_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('FITNESS_INSIGHT_PRO_LINK',__('https://www.ovationthemes.com/wordpress/fitness-wordpress-theme/','fitness-insight'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Fitness_Insight_Pro_Control')):
    class Fitness_Insight_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( FITNESS_INSIGHT_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE FITNESS PREMIUM','fitness-insight');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="fitness_insight_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">

            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('FITNESS PREMIUM - Features', 'fitness-insight'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'fitness-insight');?> </li>
                   	<li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'fitness-insight');?> </li>
                   	<li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'fitness-insight');?> </li>
                   	<li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'fitness-insight');?> </li>
                   	<li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'fitness-insight');?> </li>                    
                </ul>
        	</div>
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( FITNESS_INSIGHT_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE FITNESS PREMIUM','fitness-insight');?> </a>
		    </div>
			<p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'fitness-insight'), '<a target="blank" href="https://wordpress.org/support/theme/fitness-insight/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;