<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package gamers_studio
 */

function gamers_studio_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = gamers_studio_sidebar_layout();

	return $classes;
}
add_filter( 'body_class', 'gamers_studio_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function gamers_studio_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'gamers_studio_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function gamers_studio_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'gamers-studio' ) );
	$args    = array( 'numberposts' => -1 );
	$posts   = get_posts( $args );

	foreach ( $posts as $post ) {
		$id             = $post->ID;
		$title          = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function gamers_studio_get_page_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'gamers-studio' ) );
	$pages   = get_pages();

	foreach ( $pages as $page ) {
		$choices[ $page->ID ] = $page->post_title;
	}

	return $choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function gamers_studio_get_post_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'gamers-studio' ) );
	$cats    = get_categories();

	foreach ( $cats as $cat ) {
		$choices[ $cat->term_id ] = $cat->name;
	}

	return $choices;
}

/**
 * Get all donation forms for customizer form content type.
 */
function gamers_studio_get_post_donation_form_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'gamers-studio' ) );
	$posts   = get_posts(
		array(
			'post_type'   => 'give_forms',
			'numberposts' => -1,
		)
	);
	foreach ( $posts as $post ) {
		$choices[ $post->ID ] = $post->post_title;
	}
	return $choices;
}

if ( ! function_exists( 'gamers_studio_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function gamers_studio_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'gamers_studio_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'gamers_studio_excerpt_length', 999 );

if ( ! function_exists( 'gamers_studio_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function gamers_studio_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'gamers_studio_excerpt_more' );

if ( ! function_exists( 'gamers_studio_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function gamers_studio_sidebar_layout() {
		$gamers_studio_sidebar_position      = get_theme_mod( 'gamers_studio_sidebar_position', 'right-sidebar' );
		$gamers_studio_sidebar_position_post = get_theme_mod( 'gamers_studio_post_sidebar_position', 'right-sidebar' );
		$gamers_studio_sidebar_position_page = get_theme_mod( 'gamers_studio_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$gamers_studio_sidebar_position = $gamers_studio_sidebar_position_post;
		} elseif ( is_page() ) {
			$gamers_studio_sidebar_position = $gamers_studio_sidebar_position_page;
		}

		return $gamers_studio_sidebar_position;
	}
}

if ( ! function_exists( 'gamers_studio_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function gamers_studio_is_sidebar_enabled() {
		$gamers_studio_sidebar_position      = get_theme_mod( 'gamers_studio_sidebar_position', 'right-sidebar' );
		$gamers_studio_sidebar_position_post = get_theme_mod( 'gamers_studio_post_sidebar_position', 'right-sidebar' );
		$gamers_studio_sidebar_position_page = get_theme_mod( 'gamers_studio_page_sidebar_position', 'right-sidebar' );

		$sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $gamers_studio_sidebar_position ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $gamers_studio_sidebar_position || 'no-sidebar' === $gamers_studio_sidebar_position_post ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $gamers_studio_sidebar_position || 'no-sidebar' === $gamers_studio_sidebar_position_page ) {
				$sidebar_enabled = false;
			}
		}
		return $sidebar_enabled;
	}
}

if ( ! function_exists( 'gamers_studio_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function gamers_studio_get_homepage_sections() {
		$sections = array(
			'banner'  => esc_html__( 'Banner Section', 'gamers-studio' ),
			'about' => esc_html__( 'Offer Section', 'gamers-studio' ),
		);
		return $sections;
	}
}

/**
 * Renders customizer section link
 */
function gamers_studio_section_link( $section_id ) {
	$gamers_studio_section_name      = str_replace( 'gamers_studio_', ' ', $section_id );
	$gamers_studio_section_name      = str_replace( '_', ' ', $gamers_studio_section_name );
	$gamers_studio_starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $gamers_studio_section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $gamers_studio_starting_notation . $section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

/**
 * Adds customizer section link css
 */
function gamers_studio_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}

			.section-link-title {
				padding: 0 10px;
			}

			.banner-section {
				position: relative;
			}

			.banner-section .section-link {
				position: absolute;
				top: 100px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'gamers_studio_section_link_css' );

/**
 * Breadcrumb.
 */
function gamers_studio_breadcrumb( $args = array() ) {
	if ( ! get_theme_mod( 'gamers_studio_enable_breadcrumb', true ) ) {
		return;
	}

	$args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $args );
}
add_action( 'gamers_studio_breadcrumb', 'gamers_studio_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function gamers_studio_breadcrumb_trail_print_styles() {
	$breadcrumb_separator = get_theme_mod( 'gamers_studio_breadcrumb_separator', '/' );

	$style = '
		.trail-items li::after {
			content: "' . $breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$style = apply_filters( 'gamers_studio_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'gamers_studio_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function gamers_studio_render_posts_pagination() {
	$gamers_studio_is_pagination_enabled = get_theme_mod( 'gamers_studio_enable_pagination', true );
	if ( $gamers_studio_is_pagination_enabled ) {
		$gamers_studio_pagination_type = get_theme_mod( 'gamers_studio_pagination_type', 'default' );
		if ( 'default' === $gamers_studio_pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'gamers_studio_posts_pagination', 'gamers_studio_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function gamers_studio_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'gamers_studio_post_navigation', 'gamers_studio_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function gamers_studio_output_footer_copyright_content() {
    $gamers_studio_theme_data = wp_get_theme();
    $gamers_studio_copyright_text = get_theme_mod('gamers_studio_footer_copyright_text');

    if (!empty($gamers_studio_copyright_text)) {
        $gamers_studio_text = esc_html($gamers_studio_copyright_text);
    } else {
        $gamers_studio_default_text = esc_html($gamers_studio_theme_data->get('Name')) . '&nbsp;' . esc_html__('by', 'gamers-studio') . '&nbsp;<a target="_blank" href="' . esc_url($gamers_studio_theme_data->get('AuthorURI')) . '">' . esc_html(ucwords($gamers_studio_theme_data->get('Author'))) . '</a>';
        $gamers_studio_default_text .= sprintf(esc_html__(' | Powered by %s', 'gamers-studio'), '<a href="' . esc_url(__('https://wordpress.org/', 'gamers-studio')) . '" target="_blank">WordPress</a>. ');

        $gamers_studio_text = $gamers_studio_default_text;
    }
    ?>
    <span><?php echo wp_kses_post($gamers_studio_text); ?></span>
    <?php
}
add_action('gamers_studio_footer_copyright', 'gamers_studio_output_footer_copyright_content');


if ( ! function_exists( 'gamers_studio_footer_widget' ) ) :
function gamers_studio_footer_widget() {
	$gamers_studio_footer_widget_column	= get_theme_mod('gamers_studio_footer_widget_column','4'); 
		if ($gamers_studio_footer_widget_column == '4') {
			$gamers_studio_column = '3';
		} elseif ($gamers_studio_footer_widget_column == '3') {
			$gamers_studio_column = '4';
		} elseif ($gamers_studio_footer_widget_column == '2') {
			$gamers_studio_column = '6';
		} else{
			$gamers_studio_column = '12';
		}
	if($gamers_studio_footer_widget_column !==''): 
	?>
	<div class="dt_footer-widgets">
		
    <div class="footer-widgets-column">
    	<?php
		$gamers_studio_footer_widget_column = get_theme_mod('gamers_studio_footer_widget_column','4');
	for ($i=1; $i<=$gamers_studio_footer_widget_column; $i++) { ?>
        <?php if ( is_active_sidebar( 'gamers-studio-footer-widget-' .$i ) ) : ?>
            <div class="footer-one-column" >
                <?php dynamic_sidebar( 'gamers-studio-footer-widget-'.$i); ?>
            </div>
        <?php endif; ?>
        <?php  } ?>
    </div>

</div>
	<?php 
	endif; } 
endif;
add_action( 'gamers_studio_footer_widget', 'gamers_studio_footer_widget' );


function gamers_studio_footer_text_transform_css() {
    $gamers_studio_footer_text_transform = get_theme_mod('footer_text_transform', 'none');
    ?>
    <style type="text/css">
        .site-footer h4 {
            text-transform: <?php echo esc_html($gamers_studio_footer_text_transform); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'gamers_studio_footer_text_transform_css');