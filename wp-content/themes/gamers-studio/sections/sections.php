<?php

/**
 * Render homepage sections.
 */
function gamers_studio_homepage_sections() {
	$homepage_sections = array_keys( gamers_studio_get_homepage_sections() );

	foreach ( $homepage_sections as $section ) {
		require get_template_directory() . '/sections/' . $section . '.php';
	}
}