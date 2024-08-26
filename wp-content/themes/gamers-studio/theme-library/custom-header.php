<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package gamers_studio
 */

function gamers_studio_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'gamers_studio_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1360,
		'height'                 => 110,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'gamers_studio_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'gamers_studio_custom_header_setup' );

if ( ! function_exists( 'gamers_studio_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'gamers_studio_header_style' );
function gamers_studio_header_style() {
	if ( get_header_image() ) :
	$gamers_studio_custom_css = "
        header.site-header .header-main-wrapper .bottom-header-outer-wrapper .bottom-header-part{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-size: 100% 100%;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'gamers-studio-style', $gamers_studio_custom_css );
	endif;
}
endif;