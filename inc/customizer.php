<?php
/**
 * Espira Theme Customizer
 *
 * @package Espira
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function espira_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'espira_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'espira_customize_partial_blogdescription',
		) );
	}

	/* Custom codes for customizer
	.........................................  */

	$wp_customize->add_panel('espira_setting_panel', array(
				'capability' 		=> 'edit_theme_options',
				'theme_supports' 	=> '',
				'title' 			=> __('ESPIRA Settings', 'espira'),
				'description' 		=> __('Setup website Settings', 'espira'),
				'priority' 			=> 12,
		));

   /* Searchox Section */

	$wp_customize->add_section(
		'section_headersetting' ,
		array(
			'title'       	=> __( 'Header Setting', 'espira' ),
			'description' 	=> __( 'Setup header settings.', 'espira' ),
			'panel'			=> 'espira_setting_panel',
		)
	);

	/* Main Logo*/
	$wp_customize->add_setting(
	 'main_logo',
	 array(
		 'default'			=> get_template_directory_uri() . '/images/espira-logo.png',
	 )
	);

	$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'main_logo',
			array(
				'label'    => __( 'Main logo', 'espira' ),
				'section'  => 'section_headersetting',
				'settings' => 'main_logo',
			)
		)
	);
	

	/* Transparent Logo*/
	$wp_customize->add_setting(
		 'transparent_logo',
		 array(
			 'default'			=> get_template_directory_uri() . '/images/espira-logo.png',
		 )
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
		'transparent_logo',
			array(
				'label'    => __( 'Transparent logo', 'espira' ),
				'section'  => 'section_headersetting',
				'settings' => 'transparent_logo',
			)
		)
	);

	/* Search Logo*/
	$wp_customize->add_setting(
	 'search_logo',
	 array(
		 'default'			=> get_template_directory_uri() . '/images/espira-logo.png',
	 )
	);

	$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'search_logo',
			array(
				'label'    => __( 'Kindergarden & Search Page logo', 'espira' ),
				'section'  => 'section_headersetting',
				'settings' => 'search_logo',
			)
		)
	);
	
	/* Header Text*/
	$wp_customize->add_setting(
		'header_text',
		array(
			'default'			=> 'FINN DIN NAERMESTE ESPIRA-BARNERHAGE',
		)
   );
	$wp_customize->add_control(
		'header_text',
			array(
			 'label'		=> __('Text for Header', 'espira'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'textarea',
			 'settings'	=> 'header_text',
			)
	);
	/* Search Text*/
	$wp_customize->add_setting(
		'search_box',
		array(
			'default'			=> 'skriv inn ditt postnummer her',
		)
   );
	$wp_customize->add_control(
		'search_box',
			array(
			 'label'		=> __('Text for search-box.', 'espira'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'textarea',
			 'settings'	=> 'search_box',
			)
	);
	/* Search button Text*/
	$wp_customize->add_setting(
		'search_button',
		array(
			'default'			=> 'FINN',
		)
   );
	$wp_customize->add_control(
		'search_button',
			array(
			 'label'		=> __('Text for Search button.', 'espira'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'textarea',
			 'settings'	=> 'search_button',
			)
	);

	/*Archive Page*/
	$wp_customize->add_section(
		'section_archieve_page' ,
			array(
				'title'       	=> __( 'Archive Page Setting', 'espira' ),
				'description' 	=> __( 'Setup Archive Page.', 'espira' ),
				'panel'			=> 'espira_setting_panel',
			)
	   );
	   $wp_customize->add_setting(
		'archive_banner',
		array(
			'default' 			=> get_template_directory_uri() . '/images/pagebanner-img.jpg',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'archive_banner_image',
			array(
				'label'    => __( 'Upload Image Archive Page', 'espira' ),
				'section'  => 'section_archieve_page',
				'settings' => 'archive_banner',
			)
		)

	);
	$wp_customize->add_setting(
		'archive_header',
			array(
			 'default' 			=>  __( 'Archive Page', 'espira' ),
		 )
	);
	$wp_customize->add_control(
		'archive_header',
			array(
			 'label'		=> __('Add Title for archive page.', 'espira'),
			 'section' 	=> 'section_archieve_page',
			 'type' 		=> 'textarea',
			 'settings'	=> 'archive_header',
			)
	);
	/* Footer Section */
	$wp_customize->add_section(
	 'section_footer' ,
		 array(
			 'title'       	=> __( 'Footer Settings', 'espira' ),
			 'description' 	=> __( 'Setup footer settings.', 'espira' ),
			 'panel'			=> 'espira_setting_panel',
		 )
	);

	$wp_customize->add_setting(
		'btm_footer_text',
			array(
			 'default' 			=>  __( '&copy; 2018 <a href="/">espira</a>. All Rights Reserved.', 'espira' ),
		 )
	);

	$wp_customize->add_control(
		'btm_footer_text',
			array(
			 'label'		=> __('Bottom Footer Text', 'espira'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'textarea',
			 'settings'	=> 'btm_footer_text',
			)
	);

	$wp_customize->add_setting(
		'footer_text',
			array(
			 'default' 			=>  __( 'Intranett', 'espira' ),
		 )
	);

	$wp_customize->add_control(
		'footer_text',
			array(
			 'label'		=> __('Link Text Footer', 'espira'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'text',
			 'settings'	=> 'footer_text',
			)
	);

	$wp_customize->add_setting(
		'link_footer_text',
			array(
			 'default' 			=>  __( '#', 'espira' ),
		 )
	);

	$wp_customize->add_control(
		'link_footer_text',
			array(
			 'label'		=> __('Link Text Footer', 'espira'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'text',
			 'settings'	=> 'link_footer_text',
			)
	);

	$wp_customize->add_setting(
		'cookies_policy',
			array(
			 'default' 			=>  __( 'Personvern og cookies', 'espira' ),
		 )
	);

	$wp_customize->add_control(
		'cookies_policy',
			array(
			 'label'		=> __('Text For Cookies Policy', 'espira'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'text',
			 'settings'	=> 'cookies_policy',
			)
	);

	$wp_customize->add_setting(
		'cookies_policy_link',
			array(
			 'default' 			=>  __( '#', 'espira' ),
		 )
	);

	$wp_customize->add_control(
		'cookies_policy_link',
			array(
			 'label'		=> __('Link For Cookies Policy', 'espira'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'text',
			 'settings'	=> 'cookies_policy_link',
			)
	);
}
add_action( 'customize_register', 'espira_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function espira_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function espira_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function espira_customize_preview_js() {
	wp_enqueue_script( 'espira-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'espira_customize_preview_js' );
