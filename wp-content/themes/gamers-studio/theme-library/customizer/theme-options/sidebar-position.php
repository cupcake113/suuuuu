<?php

/**
 * Sidebar Position
 *
 * @package gamers_studio
 */

$wp_customize->add_section(
	'gamers_studio_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'gamers-studio' ),
		'panel' => 'gamers_studio_theme_options',
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_global_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_global_sidebar_separator', array(
	'label' => __( 'Global Sidebar Position', 'gamers-studio' ),
	'section' => 'gamers_studio_sidebar_position',
	'settings' => 'gamers_studio_global_sidebar_separator',
)));

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'gamers_studio_sidebar_position',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'gamers_studio_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'gamers-studio' ),
		'section' => 'gamers_studio_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'gamers-studio' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'gamers-studio' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'gamers-studio' ),
		),
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_post_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_post_sidebar_separator', array(
	'label' => __( 'Post Sidebar Position', 'gamers-studio' ),
	'section' => 'gamers_studio_sidebar_position',
	'settings' => 'gamers_studio_post_sidebar_separator',
)));

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'gamers_studio_post_sidebar_position',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'gamers_studio_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'gamers-studio' ),
		'section' => 'gamers_studio_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'gamers-studio' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'gamers-studio' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'gamers-studio' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_page_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_page_sidebar_separator', array(
	'label' => __( 'Page Sidebar Position', 'gamers-studio' ),
	'section' => 'gamers_studio_sidebar_position',
	'settings' => 'gamers_studio_page_sidebar_separator',
)));

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'gamers_studio_page_sidebar_position',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'gamers_studio_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'gamers-studio' ),
		'section' => 'gamers_studio_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'gamers-studio' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'gamers-studio' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'gamers-studio' ),
		),
	)
);
