<?php

/**
 * Banner Section
 *
 * @package gamers_studio
 */

$wp_customize->add_section(
	'gamers_studio_banner_section',
	array(
		'panel'    => 'gamers_studio_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'gamers-studio' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'gamers_studio_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'gamers_studio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Gamers_Studio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'gamers_studio_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'gamers-studio' ),
			'section'  => 'gamers_studio_banner_section',
			'settings' => 'gamers_studio_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'gamers_studio_enable_banner_section',
		array(
			'selector' => '#gamers_studio_banner_section .section-link',
			'settings' => 'gamers_studio_enable_banner_section',
		)
	);
}


// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'gamers_studio_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'gamers_studio_sanitize_select',
	)
);

$wp_customize->add_control(
	'gamers_studio_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'gamers-studio' ),
		'section'         => 'gamers_studio_banner_section',
		'settings'        => 'gamers_studio_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'gamers_studio_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'gamers-studio' ),
			'post' => esc_html__( 'Post', 'gamers-studio' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'gamers_studio_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'gamers_studio_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'gamers-studio' ), $i ),
			'section'         => 'gamers_studio_banner_section',
			'settings'        => 'gamers_studio_banner_slider_content_post_' . $i,
			'active_callback' => 'gamers_studio_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => gamers_studio_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'gamers_studio_banner_slider_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'gamers_studio_banner_slider_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'gamers-studio' ), $i ),
			'section'         => 'gamers_studio_banner_section',
			'settings'        => 'gamers_studio_banner_slider_content_page_' . $i,
			'active_callback' => 'gamers_studio_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => gamers_studio_get_page_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'gamers_studio_banner_button_label_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'gamers_studio_banner_button_label_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Label 1 %d', 'gamers-studio' ), $i ),
			'section'         => 'gamers_studio_banner_section',
			'settings'        => 'gamers_studio_banner_button_label_' . $i,
			'type'            => 'text',
			'active_callback' => 'gamers_studio_is_banner_slider_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'gamers_studio_banner_button_link_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'gamers_studio_banner_button_link_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Link 1 %d', 'gamers-studio' ), $i ),
			'section'         => 'gamers_studio_banner_section',
			'settings'        => 'gamers_studio_banner_button_link_' . $i,
			'type'            => 'url',
			'active_callback' => 'gamers_studio_is_banner_slider_section_enabled',
		)
	);
}