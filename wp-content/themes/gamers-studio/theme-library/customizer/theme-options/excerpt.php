<?php

/**
 * Excerpt
 *
 * @package gamers_studio
 */

$wp_customize->add_section(
	'gamers_studio_excerpt_options',
	array(
		'panel' => 'gamers_studio_theme_options',
		'title' => esc_html__( 'Excerpt', 'gamers-studio' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'gamers_studio_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'gamers_studio_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'gamers-studio' ),
		'section'     => 'gamers_studio_excerpt_options',
		'settings'    => 'gamers_studio_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);