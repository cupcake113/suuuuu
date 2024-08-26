<?php

/**
 * Gamers Studio Theme Customizer
 *
 * @package gamers_studio
 */

// Sanitize callback.
require get_template_directory() . '/theme-library/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/theme-library/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/theme-library/customizer/custom-controls/custom-controls.php';

// Icon Controls.
require get_template_directory() . '/theme-library/customizer/custom-controls/icon-control.php';

function gamers_studio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'gamers_studio_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'gamers_studio_customize_partial_blogdescription',
			)
		);
	}

	// Upsell Section.
	$wp_customize->add_section(
		new Gamers_Studio_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Gamers Studio Pro', 'gamers-studio' ),
				'button_text'      => __( 'Buy Pro', 'gamers-studio' ),
				'url'              => 'https://asterthemes.com/products/gaming-wordpress-theme',
				'background_color' => 'linear-gradient(90.09deg, #F213FF 0%, #07D0ED 99.23%)',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Doc Section.
	$wp_customize->add_section(
		new Gamers_Studio_Upsell_Section(
			$wp_customize,
			'doc_section',
			array(
				'title'            => __( 'Documentation', 'gamers-studio' ),
				'button_text'      => __( 'Free Doc', 'gamers-studio' ),
				'url'              => 'https://demo.asterthemes.com/docs/gamers-studio-free',
				'background_color' => 'linear-gradient(90.09deg, #F213FF 0%, #07D0ED 99.23%)',
				'text_color'       => '#fff',
				'priority'         => 1,
			)
		)
	);

	// Theme Options.
	require get_template_directory() . '/theme-library/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/theme-library/customizer/front-page-options.php';

	// Colors.
	require get_template_directory() . '/theme-library/customizer/colors.php';

}
add_action( 'customize_register', 'gamers_studio_customize_register' );

function gamers_studio_customize_partial_blogname() {
	bloginfo( 'name' );
}

function gamers_studio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function gamers_studio_customize_preview_js() {
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'gamers-studio-customizer', get_template_directory_uri() . '/resource/js/customizer' . $min . '.js', array( 'customize-preview' ), GAMERS_STUIDO_VERSION, true );
}
add_action( 'customize_preview_init', 'gamers_studio_customize_preview_js' );

function gamers_studio_custom_control_scripts() {
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'gamers-studio-custom-controls-css', get_template_directory_uri() . '/resource/css/custom-controls' . $min . '.css', array(), '1.0', 'all' );

	wp_enqueue_script( 'gamers-studio-custom-controls-js', get_template_directory_uri() . '/resource/js/custom-controls' . $min . '.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'gamers_studio_custom_control_scripts' );