<?php

/**
 * Front Page Options
 *
 * @package Gamers Studio
 */

$wp_customize->add_panel(
	'gamers_studio_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'gamers-studio' ),
		'priority' => 20,
	)
);

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Tranding Offer Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/about.php';