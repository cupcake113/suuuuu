<?php

/**
 * Theme Options
 *
 * @package gamers_studio
 */

$wp_customize->add_panel(
	'gamers_studio_theme_options',
	array(
		'title'    => esc_html__( 'Theme Options', 'gamers-studio' ),
		'priority' => 10,
	)
);

// Theme Options.
require get_template_directory() . '/theme-library/customizer/theme-options/theme-options.php';

// typography-setting.
require get_template_directory() . '/theme-library/customizer/theme-options/typography-setting.php';

// Excerpt.
require get_template_directory() . '/theme-library/customizer/theme-options/excerpt.php';

// Sidebar Position.
require get_template_directory() . '/theme-library/customizer/theme-options/sidebar-position.php';

// Post Options.
require get_template_directory() . '/theme-library/customizer/theme-options/post-options.php';

// Single Post Options.
require get_template_directory() . '/theme-library/customizer/theme-options/single-post-options.php';

// Footer Options.
require get_template_directory() . '/theme-library/customizer/theme-options/footer-options.php';

// 404 page option.
require get_template_directory() . '/theme-library/customizer/theme-options/404page-customize-setting.php';