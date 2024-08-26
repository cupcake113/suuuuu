<?php

/**
 * Footer Options
 *
 * @package gamers_studio
 */

$wp_customize->add_section(
	'gamers_studio_footer_options',
	array(
		'panel' => 'gamers_studio_theme_options',
		'title' => esc_html__( 'Footer Options', 'gamers-studio' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_footer_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_footer_separators', array(
	'label' => __( 'Footer Settings', 'gamers-studio' ),
	'section' => 'gamers_studio_footer_options',
	'settings' => 'gamers_studio_footer_separators',
)));


	// column // 
$wp_customize->add_setting(
	'gamers_studio_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'gamers_studio_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'gamers_studio_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','gamers-studio'),
	    'section' 		=> 'gamers_studio_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'gamers-studio' ),
			'1' => __( '1 Column', 'gamers-studio' ),
			'2' => __( '2 Column', 'gamers-studio' ),
			'3' => __( '3 Column', 'gamers-studio' ),
			'4' => __( '4 Column', 'gamers-studio' )
		) 
	) 
);

//  BG Color // 
$wp_customize->add_setting('gamers_studio_footer_background_color_setting', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gamers_studio_footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'gamers-studio'),
    'section' => 'gamers_studio_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('gamers_studio_footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gamers_studio_footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'gamers-studio'),
    'section' => 'gamers_studio_footer_options',
)));

$wp_customize->add_setting('footer_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add Footer Text Transform Control
$wp_customize->add_control('footer_text_transform', array(
    'label' => __('Footer Heading Text Transform', 'gamers-studio'),
    'section' => 'gamers_studio_footer_options',
    'settings' => 'footer_text_transform',
    'type' => 'select',
    'choices' => array(
        'none' => __('None', 'gamers-studio'),
        'capitalize' => __('Capitalize', 'gamers-studio'),
        'uppercase' => __('Uppercase', 'gamers-studio'),
        'lowercase' => __('Lowercase', 'gamers-studio'),
    ),
));

$wp_customize->add_setting(
	'gamers_studio_footer_copyright_text',
	array(
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'gamers_studio_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'gamers-studio' ),
		'section'  => 'gamers_studio_footer_options',
		'settings' => 'gamers_studio_footer_copyright_text',
		'type'     => 'textarea',
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'gamers_studio_scroll_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Gamers_Studio_Separator_Custom_Control( $wp_customize, 'gamers_studio_scroll_separators', array(
	'label' => __( 'Scroll Top Settings', 'gamers-studio' ),
	'section' => 'gamers_studio_footer_options',
	'settings' => 'gamers_studio_scroll_separators',
)));

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'gamers_studio_scroll_top',
	array(
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'gamers-studio' ),
			'section' => 'gamers_studio_footer_options',
		)
	)
);
// icon // 
$wp_customize->add_setting(
	'gamers_studio_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Gamers_Studio_Change_Icon_Control($wp_customize, 
	'gamers_studio_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','gamers-studio'),
	    'section' 		=> 'gamers_studio_footer_options',
		'iconset' => 'fa',
	))  
);
$wp_customize->add_setting( 'gamers_studio_scroll_top_position', array(
    'default'           => 'bottom-right',
    'sanitize_callback' => 'gamers_studio_sanitize_scroll_top_position',
) );

// Add control for Scroll Top Button Position
$wp_customize->add_control( 'gamers_studio_scroll_top_position', array(
    'label'    => __( 'Scroll Top Button Position', 'gamers-studio' ),
    'section'  => 'gamers_studio_footer_options',
    'settings' => 'gamers_studio_scroll_top_position',
    'type'     => 'select',
    'choices'  => array(
        'bottom-right' => __( 'Bottom Right', 'gamers-studio' ),
        'bottom-left'  => __( 'Bottom Left', 'gamers-studio' ),
        'bottom-center'=> __( 'Bottom Center', 'gamers-studio' ),
    ),
) );

$wp_customize->add_setting( 'gamers_studio_scroll_top_shape', array(
	'default'           => 'box',
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'gamers_studio_scroll_top_shape', array(
	'label'    => __( 'Scroll to Top Button Shape', 'gamers-studio' ),
	'section'  => 'gamers_studio_footer_options',
	'settings' => 'gamers_studio_scroll_top_shape',
	'type'     => 'radio',
	'choices'  => array(
		'box'        => __( 'Box', 'gamers-studio' ),
		'curved-box' => __( 'Curved Box', 'gamers-studio' ),
		'circle'     => __( 'Circle', 'gamers-studio' ),
	),
) );

