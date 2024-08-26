<?php

/**
 * Header Options
 *
 * @package gamers_studio
 */

// ---------------------------------------- GENERAL OPTIONBS ----------------------------------------------------


// ---------------------------------------- PRELOADER ----------------------------------------------------

$wp_customize->add_section(
	'gamers_studio_general_options',
	array(
		'panel' => 'gamers_studio_theme_options',
		'title' => esc_html__( 'General Options', 'gamers-studio' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_preloader_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_preloader_separator', array(
	'label' => __( 'Enable / Disable Site Preloader Section', 'gamers-studio' ),
	'section' => 'gamers_studio_general_options',
	'settings' => 'gamers_studio_preloader_separator',
) ) );

// General Options - Enable Preloader.
$wp_customize->add_setting(
	'gamers_studio_enable_preloader',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'gamers-studio' ),
			'section' => 'gamers_studio_general_options',
		)
	)
);


// ---------------------------------------- PAGINATION ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_pagination_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_pagination_separator', array(
	'label' => __( 'Enable / Disable Pagination Section', 'gamers-studio' ),
	'section' => 'gamers_studio_general_options',
	'settings' => 'gamers_studio_pagination_separator',
) ) );


// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'gamers_studio_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'gamers-studio' ),
			'section'  => 'gamers_studio_general_options',
			'settings' => 'gamers_studio_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'gamers_studio_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'gamers_studio_sanitize_select',
	)
);

$wp_customize->add_control(
	'gamers_studio_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'gamers-studio' ),
		'section'         => 'gamers_studio_general_options',
		'settings'        => 'gamers_studio_pagination_type',
		'active_callback' => 'gamers_studio_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'gamers-studio' ),
			'numeric' => __( 'Numeric', 'gamers-studio' ),
		),
	)
);


// ---------------------------------------- BREADCRUMB ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_breadcrumb_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_breadcrumb_separators', array(
	'label' => __( 'Enable / Disable Breadcrumb Section', 'gamers-studio' ),
	'section' => 'gamers_studio_general_options',
	'settings' => 'gamers_studio_breadcrumb_separators',
)));

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'gamers_studio_enable_breadcrumb',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'gamers-studio' ),
			'section' => 'gamers_studio_general_options',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'gamers_studio_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'gamers_studio_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'gamers-studio' ),
		'active_callback' => 'gamers_studio_is_breadcrumb_enabled',
		'section'         => 'gamers_studio_general_options',
	)
);




// ---------------------------------------- Website layout ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_layuout_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_layuout_separator', array(
	'label' => __( 'Website Layout Setting', 'gamers-studio' ),
	'section' => 'gamers_studio_general_options',
	'settings' => 'gamers_studio_layuout_separator',
)));


$wp_customize->add_setting(
	'gamers_studio_website_layout',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_website_layout',
		array(
			'label'   => esc_html__('Boxed Layout', 'gamers-studio'),
			'section' => 'gamers_studio_general_options',
		)
	)
);


$wp_customize->add_setting('gamers_studio_layout_width_margin', array(
	'default'           => 50,
	'sanitize_callback' => 'absint', // Sanitize as an integer
	'transport'         => 'postMessage', // Enable live preview
));

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	'gamers_studio_layout_width_margin',
	array(
		'label'       => __('Set Width', 'gamers-studio'),
		'description' => __('Adjust the width around the website layout by moving the slider. Use this setting to customize the appearance of your site to fit your design preferences.', 'gamers-studio'),
		'section'     => 'gamers_studio_general_options',
		'settings'    => 'gamers_studio_layout_width_margin',
		'type'        => 'range',
		'active_callback' => 'gamers_studio_is_layout_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 130,
			'step' => 1,
		),
	)
));




// ---------------------------------------- HEADER OPTIONS ----------------------------------------------------	

// Header Options
$wp_customize->add_section(
	'gamers_studio_header_options',
	array(
		'panel' => 'gamers_studio_theme_options',
		'title' => esc_html__( 'Header Options', 'gamers-studio' ),
	)
);


// Add setting for sticky header
$wp_customize->add_setting(
	'gamers_studio_enable_sticky_header',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
		'default'           => false,
	)
);

// Add control for sticky header setting
$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_enable_sticky_header',
		array(
			'label'   => esc_html__( 'Enable Sticky Header', 'gamers-studio' ),
			'section' => 'gamers_studio_header_options',
		)
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'gamers_studio_enable_header_search_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_enable_header_search_section',
		array(
			'label'    => esc_html__( 'Enable Search Section', 'gamers-studio' ),
			'section'  => 'gamers_studio_header_options',
			'settings' => 'gamers_studio_enable_header_search_section',
		)
	)
);

// Banner Section - Button Label.
$wp_customize->add_setting(
	'gamers_studio_header_button_label_',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'gamers_studio_header_button_label_',
	array(
		'label'           => esc_html__( 'Button Label 1', 'gamers-studio'  ),
		'section'         => 'gamers_studio_header_options',
		'settings'        => 'gamers_studio_header_button_label_',
		'type'            => 'text',
	)
);

// Banner Section - Button Link.
$wp_customize->add_setting(
	'gamers_studio_header_button_link_',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'gamers_studio_header_button_link_',
	array(
		'label'           => esc_html__( 'Button Link 1', 'gamers-studio' ),
		'section'         => 'gamers_studio_header_options',
		'settings'        => 'gamers_studio_header_button_link_',
		'type'            => 'url',
	)
);

// Banner Section - Button Label.
$wp_customize->add_setting(
	'gamers_studio_header_button_label_1',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'gamers_studio_header_button_label_1',
	array(
		'label'           => esc_html__( 'Button Label 2', 'gamers-studio'  ),
		'section'         => 'gamers_studio_header_options',
		'settings'        => 'gamers_studio_header_button_label_1',
		'type'            => 'text',
	)
);

// Banner Section - Button Link.
$wp_customize->add_setting(
	'gamers_studio_header_button_link_1',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'gamers_studio_header_button_link_1',
	array(
		'label'           => esc_html__( 'Button Link 2', 'gamers-studio' ),
		'section'         => 'gamers_studio_header_options',
		'settings'        => 'gamers_studio_header_button_link_1',
		'type'            => 'url',
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_menu_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_menu_separator', array(
	'label' => __( 'Menu Settings', 'gamers-studio' ),
	'section' => 'gamers_studio_header_options',
	'settings' => 'gamers_studio_menu_separator',
)));

$wp_customize->add_setting( 'menu_text_transform', array(
    'default'           => 'capitalize', // Default value for text transform
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'menu_text_transform', array(
    'type'     => 'select',
    'section'  => 'gamers_studio_header_options',
    'label'    => __( 'Menu Text Transform', 'gamers-studio' ),
    'choices'  => array(
        'none'       => __( 'None', 'gamers-studio' ),
        'capitalize' => __( 'Capitalize', 'gamers-studio' ),
        'uppercase'  => __( 'Uppercase', 'gamers-studio' ),
        'lowercase'  => __( 'Lowercase', 'gamers-studio' ),
    ),
) );



// ----------------------------------------SITE IDENTITY----------------------------------------------------

$wp_customize->add_setting( 'gamers_studio_site_title_size', array(
    'default'           => 30, // Default font size in pixels
    'sanitize_callback' => 'absint', // Sanitize the input as a positive integer
) );

// Add control for site title size
$wp_customize->add_control( 'gamers_studio_site_title_size', array(
    'type'        => 'number',
    'section'     => 'title_tagline', // You can change this section to your preferred section
    'label'       => __( 'Site Title Font Size ', 'gamers-studio' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
) );


// Site Title - Enable Setting.
$wp_customize->add_setting(
	'gamers_studio_enable_site_title_setting',
	array(
		'default'           => true,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Disable Site Title', 'gamers-studio' ),
			'section'  => 'title_tagline',
			'settings' => 'gamers_studio_enable_site_title_setting',
		)
	)
);
// Tagline - Enable Setting.
$wp_customize->add_setting(
	'gamers_studio_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'gamers-studio' ),
			'section'  => 'title_tagline',
			'settings' => 'gamers_studio_enable_tagline_setting',
		)
	)
);
