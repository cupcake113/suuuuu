<?php

/**
 * Dynamic CSS
 */
function gamers_studio_dynamic_css() {
	$primary_color = get_theme_mod( 'primary_color', 'linear-gradient(90.09deg, #F213FF 0%, #07D0ED 99.23%)' );

	$gamers_studio_site_title_font       = get_theme_mod( 'gamers_studio_site_title_font', 'Raleway' );
	$gamers_studio_site_description_font = get_theme_mod( 'gamers_studio_site_description_font', 'Raleway' );
	$gamers_studio_header_font           = get_theme_mod( 'gamers_studio_header_font', 'Epilogue' );
	$gamers_studio_content_font             = get_theme_mod( 'gamers_studio_content_font', 'Raleway' );

	// Enqueue Google Fonts
	$fonts_url = gamers_studio_get_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'gamers-studio-google-fonts', esc_url( $fonts_url ), array(), null );
	}

	$gamers_studio_custom_css  = '';
	$gamers_studio_custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $primary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$gamers_studio_custom_css .= '
    /* Typography */
    :root {
        --font-heading: "' . esc_attr( $gamers_studio_header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont, "' . esc_attr( $gamers_studio_content_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea, p {
        font-family: "' . esc_attr( $gamers_studio_content_font ) . '", serif;
	}

	.site-identity p.site-title, h1.site-title a, h1.site-title, p.site-title a, .site-branding h1.site-title a {
        font-family: "' . esc_attr( $gamers_studio_site_title_font ) . '", serif;
	}
    
	p.site-description {
        font-family: "' . esc_attr( $gamers_studio_site_description_font ) . '", serif !important;
	}
    ';

	wp_add_inline_style( 'gamers-studio-style', $gamers_studio_custom_css );
}
add_action( 'wp_enqueue_scripts', 'gamers_studio_dynamic_css', 99 );
