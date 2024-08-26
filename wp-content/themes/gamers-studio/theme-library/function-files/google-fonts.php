<?php
function gamers_studio_get_all_google_fonts() {
    $gamers_studio_webfonts_json = get_template_directory() . '/theme-library/google-webfonts.json';
    if ( ! file_exists( $gamers_studio_webfonts_json ) ) {
        return array();
    }

    $gamers_studio_fonts_json_data = file_get_contents( $gamers_studio_webfonts_json );
    if ( false === $gamers_studio_fonts_json_data ) {
        return array();
    }

    $gamers_studio_all_fonts = json_decode( $gamers_studio_fonts_json_data, true );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    $gamers_studio_google_fonts = array();
    foreach ( $gamers_studio_all_fonts as $font ) {
        $gamers_studio_google_fonts[ $font['family'] ] = array(
            'family'   => $font['family'],
            'variants' => $font['variants'],
        );
    }
    return $gamers_studio_google_fonts;
}


function gamers_studio_get_all_google_font_families() {
    $gamers_studio_google_fonts  = gamers_studio_get_all_google_fonts();
    $gamers_studio_font_families = array();
    foreach ( $gamers_studio_google_fonts as $font ) {
        $gamers_studio_font_families[ $font['family'] ] = $font['family'];
    }
    return $gamers_studio_font_families;
}

function gamers_studio_get_fonts_url() {
    $gamers_studio_fonts_url = '';
    $fonts     = array();

    $gamers_studio_all_fonts = gamers_studio_get_all_google_fonts();

    if ( ! empty( get_theme_mod( 'gamers_studio_site_title_font', 'Raleway' ) ) ) {
        $fonts[] = get_theme_mod( 'gamers_studio_site_title_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'gamers_studio_site_description_font', 'Raleway' ) ) ) {
        $fonts[] = get_theme_mod( 'gamers_studio_site_description_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'gamers_studio_header_font', 'Epilogue' ) ) ) {
        $fonts[] = get_theme_mod( 'gamers_studio_header_font', 'Epilogue' );
    }

    if ( ! empty( get_theme_mod( 'gamers_studio_content_font', 'Raleway' ) ) ) {
        $fonts[] = get_theme_mod( 'gamers_studio_content_font', 'Raleway' );
    }

    $fonts = array_unique( $fonts );

    foreach ( $fonts as $font ) {
        $gamers_studio_variants      = $gamers_studio_all_fonts[ $font ]['variants'];
        $gamers_studio_font_family[] = $font . ':' . implode( ',', $gamers_studio_variants );
    }

    $query_args = array(
        'family' => urlencode( implode( '|', $gamers_studio_font_family ) ),
    );

    if ( ! empty( $gamers_studio_font_family ) ) {
        $gamers_studio_fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return $gamers_studio_fonts_url;
}

