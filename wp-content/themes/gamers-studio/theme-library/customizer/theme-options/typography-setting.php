<?php

/**
 * Typography Settings
 *
 * @package gamers_studio
 */

// Typography Settings
$wp_customize->add_section(
    'gamers_studio_typography_setting',
    array(
        'panel' => 'gamers_studio_theme_options',
        'title' => esc_html__( 'Typography Settings', 'gamers-studio' ),
    )
);

$wp_customize->add_setting(
    'gamers_studio_site_title_font',
    array(
        'default'           => 'Raleway',
        'sanitize_callback' => 'gamers_studio_sanitize_google_fonts',
    )
);

$wp_customize->add_control(
    'gamers_studio_site_title_font',
    array(
        'label'    => esc_html__( 'Site Title Font Family', 'gamers-studio' ),
        'section'  => 'gamers_studio_typography_setting',
        'settings' => 'gamers_studio_site_title_font',
        'type'     => 'select',
        'choices'  => gamers_studio_get_all_google_font_families(),
    )
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'gamers_studio_site_description_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'gamers_studio_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'gamers_studio_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'gamers-studio' ),
		'section'  => 'gamers_studio_typography_setting',
		'settings' => 'gamers_studio_site_description_font',
		'type'     => 'select',
		'choices'  => gamers_studio_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'gamers_studio_header_font',
	array(
		'default'           => 'Epilogue',
		'sanitize_callback' => 'gamers_studio_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'gamers_studio_header_font',
	array(
		'label'    => esc_html__( 'Heading Font Family', 'gamers-studio' ),
		'section'  => 'gamers_studio_typography_setting',
		'settings' => 'gamers_studio_header_font',
		'type'     => 'select',
		'choices'  => gamers_studio_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'gamers_studio_content_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'gamers_studio_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'gamers_studio_content_font',
	array(
		'label'    => esc_html__( 'Content Font Family', 'gamers-studio' ),
		'section'  => 'gamers_studio_typography_setting',
		'settings' => 'gamers_studio_content_font',
		'type'     => 'select',
		'choices'  => gamers_studio_get_all_google_font_families(),
	)
);
