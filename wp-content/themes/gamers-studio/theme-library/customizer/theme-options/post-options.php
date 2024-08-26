<?php

/**
 * Post Options
 *
 * @package gamers_studio
 */

$wp_customize->add_section(
	'gamers_studio_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'gamers-studio' ),
		'panel' => 'gamers_studio_theme_options',
	)
);

// Post Options - Show / Hide Feature Image.
$wp_customize->add_setting(
	'gamers_studio_post_hide_feature_image',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_post_hide_feature_image',
		array(
			'label'   => esc_html__( 'Show / Hide Featured Image', 'gamers-studio' ),
			'section' => 'gamers_studio_post_options',
		)
	)
);

// Post Options - Show / Hide Post Heading.
$wp_customize->add_setting(
	'gamers_studio_post_hide_post_heading',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_post_hide_post_heading',
		array(
			'label'   => esc_html__( 'Show / Hide Post Heading', 'gamers-studio' ),
			'section' => 'gamers_studio_post_options',
		)
	)
);

// Post Options - Show / Hide Post Content.
$wp_customize->add_setting(
	'gamers_studio_post_hide_post_content',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_post_hide_post_content',
		array(
			'label'   => esc_html__( 'Show / Hide Post Content', 'gamers-studio' ),
			'section' => 'gamers_studio_post_options',
		)
	)
);

// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'gamers_studio_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'gamers-studio' ),
			'section' => 'gamers_studio_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'gamers_studio_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'gamers-studio' ),
			'section' => 'gamers_studio_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'gamers_studio_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'gamers-studio' ),
			'section' => 'gamers_studio_post_options',
		)
	)
);

