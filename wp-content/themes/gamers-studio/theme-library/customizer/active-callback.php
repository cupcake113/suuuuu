<?php

/**
 * Active Callbacks
 *
 * @package gamers_studio
 */

// Theme Options.
function gamers_studio_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'gamers_studio_enable_pagination' )->value() );
}
function gamers_studio_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'gamers_studio_enable_breadcrumb' )->value() );
}
function gamers_studio_is_layout_enabled( $control ) {
	return ( $control->manager->get_setting( 'gamers_studio_website_layout' )->value() );
}

// Header Options.
function gamers_studio_is_topbar_enabled( $control ) {
	return ( $control->manager->get_Setting( 'gamers_studio_enable_topbar' )->value() );
}

// Banner Slider Section.
function gamers_studio_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'gamers_studio_enable_banner_section' )->value() );
}
function gamers_studio_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'gamers_studio_banner_slider_content_type' )->value();
	return ( gamers_studio_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function gamers_studio_is_banner_slider_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'gamers_studio_banner_slider_content_type' )->value();
	return ( gamers_studio_is_banner_slider_section_enabled( $control ) && ( 'page' === $content_type ) );
}

//Offer Section.
function gamers_studio_is_service_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'gamers_studio_enable_service_section' )->value() );
}
function gamers_studio_is_service_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'gamers_studio_service_content_type' )->value();
	return ( gamers_studio_is_service_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function gamers_studio_is_service_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'gamers_studio_service_content_type' )->value();
	return ( gamers_studio_is_service_section_enabled( $control ) && ( 'page' === $content_type ) );
}