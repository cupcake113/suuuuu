<?php

/**
 * Color Option
 *
 * @package gamers_studio
 */

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => 'linear-gradient(90.09deg, #F213FF 0%, #07D0ED 99.23%)',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'gamers-studio' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
