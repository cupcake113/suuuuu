<?php

/**
 * Offer Section
 *
 * @package gamers_studio
 */

$wp_customize->add_section(
	'gamers_studio_products_section',
	array(
		'panel'    => 'gamers_studio_front_page_options',
		'title'    => esc_html__( 'Offer Section', 'gamers-studio' ),
		'priority' => 10,
	)
);

// Offer Section - Enable Section.
$wp_customize->add_setting(
	'gamers_studio_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Offer Section', 'gamers-studio' ),
			'section'  => 'gamers_studio_products_section',
			'settings' => 'gamers_studio_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'gamers_studio_enable_service_section',
		array(
			'selector' => '#gamers_studio_service_section .section-link',
			'settings' => 'gamers_studio_enable_service_section',
		)
	);
}

// Offer Section - Offer Image.
$wp_customize->add_setting(
	'gamers_studio_about_left_image_1',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'gamers_studio_about_left_image_1',
		array(
			'label'           => esc_html__( 'Offer Image 1', 'gamers-studio'),
			'section'         => 'gamers_studio_products_section',
			'settings'        => 'gamers_studio_about_left_image_1',
			'active_callback' => 'gamers_studio_is_service_section_enabled',
		)
	)
);

// Offer Section - Heading Label.
$wp_customize->add_setting(
	'gamers_studio_about_1_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'gamers_studio_about_1_heading',
	array(
		'label'           => esc_html__( 'Offer Heading', 'gamers-studio' ),
		'section'         => 'gamers_studio_products_section',
		'settings'        => 'gamers_studio_about_1_heading',
		'type'            => 'text',
		'active_callback' => 'gamers_studio_is_service_section_enabled',
	)
);

// Banner Section - Button Link.
$wp_customize->add_setting(
	'gamers_studio_about_1_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'gamers_studio_about_1_button_link',
	array(
		'label'           => esc_html__( 'Offer Button Link', 'gamers-studio'),
		'section'         => 'gamers_studio_products_section',
		'settings'        => 'gamers_studio_about_1_button_link',
		'type'            => 'url',
		'active_callback' => 'gamers_studio_is_service_section_enabled',
	)
);

// Offer Section - Offer Heading.
$wp_customize->add_setting(
	'gamers_studio_about_left_image_2',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'gamers_studio_about_left_image_2',
		array(
			'label'           => esc_html__( 'Offer Image 2', 'gamers-studio'),
			'section'         => 'gamers_studio_products_section',
			'settings'        => 'gamers_studio_about_left_image_2',
			'active_callback' => 'gamers_studio_is_service_section_enabled',
		)
	)
);

// Offer Section - Heading Label.
$wp_customize->add_setting(
	'gamers_studio_about_2_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'gamers_studio_about_2_heading',
	array(
		'label'           => esc_html__( 'Offer Heading', 'gamers-studio' ),
		'section'         => 'gamers_studio_products_section',
		'settings'        => 'gamers_studio_about_2_heading',
		'type'            => 'text',
		'active_callback' => 'gamers_studio_is_service_section_enabled',
	)
);

// Offer Section - Button Link.
$wp_customize->add_setting(
	'gamers_studio_about_2_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'gamers_studio_about_2_button_link',
	array(
		'label'           => esc_html__( 'Offer Button Link', 'gamers-studio'),
		'section'         => 'gamers_studio_products_section',
		'settings'        => 'gamers_studio_about_2_button_link',
		'type'            => 'url',
		'active_callback' => 'gamers_studio_is_service_section_enabled',
	)
);

// Offer Section - Content Label.
$wp_customize->add_setting(
	'gamers_studio_timmer_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'gamers_studio_timmer_heading',
	array(
		'label'           => esc_html__( 'Timer Heading', 'gamers-studio' ),
		'section'         => 'gamers_studio_products_section',
		'settings'        => 'gamers_studio_timmer_heading',
		'type'            => 'text',
		'active_callback' => 'gamers_studio_is_service_section_enabled',
	)
);

// Offer Section - Content Label.
$wp_customize->add_setting(
	'gamers_studio_about_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'gamers_studio_about_text',
	array(
		'label'           => esc_html__( 'Timer Date', 'gamers-studio' ),
		'section'         => 'gamers_studio_products_section',
		'settings'        => 'gamers_studio_about_text',
		'description'	  => esc_html__( 'Exp: June 22 2024', 'gamers-studio' ),
		'type'            => 'text',
		'active_callback' => 'gamers_studio_is_service_section_enabled',
	)
);



// Offer Section - Content Label.
$wp_customize->add_setting(
	'gamers_studio_timmer_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'gamers_studio_timmer_text',
	array(
		'label'           => esc_html__( 'Timer Heading', 'gamers-studio' ),
		'section'         => 'gamers_studio_products_section',
		'settings'        => 'gamers_studio_timmer_text',
		'type'            => 'text',
		'active_callback' => 'gamers_studio_is_service_section_enabled',
	)
);
	
