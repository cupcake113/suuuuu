<?php
/**
 * Gamers Studio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gamers_studio
 */

$gamers_studio_theme_data = wp_get_theme();
if( ! defined( 'GAMERS_STUIDO_THEME_VERSION' ) ) define ( 'GAMERS_STUIDO_THEME_VERSION', $gamers_studio_theme_data->get( 'Version' ) );
if( ! defined( 'GAMERS_STUIDO_THEME_NAME' ) ) define( 'GAMERS_STUIDO_THEME_NAME', $gamers_studio_theme_data->get( 'Name' ) );
if( ! defined( 'GAMERS_STUIDO_THEME_TEXTDOMAIN' ) ) define( 'GAMERS_STUIDO_THEME_TEXTDOMAIN', $gamers_studio_theme_data->get( 'TextDomain' ) );

if ( ! defined( 'GAMERS_STUIDO_VERSION' ) ) {
	define( 'GAMERS_STUIDO_VERSION', '1.0.0' );
}

if ( ! function_exists( 'gamers_studio_setup' ) ) :
	
	function gamers_studio_setup() {
		
		load_theme_textdomain( 'gamers-studio', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'gamers-studio' ),
				'social'  => esc_html__( 'Social', 'gamers-studio' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio', 
		) );

		add_theme_support(
			'custom-background',
			apply_filters(
				'gamers_studio_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'gamers_studio_setup' );

function gamers_studio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gamers_studio_content_width', 640 );
}
add_action( 'after_setup_theme', 'gamers_studio_content_width', 0 );

function gamers_studio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gamers-studio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gamers-studio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	// Regsiter 4 footer widgets.
	$gamers_studio_footer_widget_column = get_theme_mod('gamers_studio_footer_widget_column','4');
	for ($i=1; $i<=$gamers_studio_footer_widget_column; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'gamers-studio' )  . $i,
			'id' => 'gamers-studio-footer-widget-' . $i,
			'description' => __( 'The Footer Widget Area', 'gamers-studio' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'gamers_studio_widgets_init' );

function gamers_studio_custom_css() {
    $gamers_studio_slider_section = get_theme_mod('gamers_studio_enable_banner_section', false);
    if (!$gamers_studio_slider_section) {
        echo '<style>
            header.site-header {
                position: relative !important;
                background: linear-gradient(90.09deg, #F213FF 0%, #07D0ED 99.23%);
            }
        </style>';
    }
}
add_action('wp_head', 'gamers_studio_custom_css');

/**
 * Enqueue scripts and styles.
 */
function gamers_studio_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'gamers-studio-slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'gamers-studio-fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Main style.
	wp_enqueue_style( 'gamers-studio-style', get_template_directory_uri() . '/style.css', array(), GAMERS_STUIDO_VERSION );

	// Navigation script.
	wp_enqueue_script( 'gamers-studio-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), GAMERS_STUIDO_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'gamers-studio-slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'gamers-studio-custom-script', get_template_directory_uri() . '/resource/js/custom.js', array( 'jquery' ), GAMERS_STUIDO_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.
	wp_enqueue_style(
		'oswald',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'luckiest-guy',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'jost',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'lilita-one',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Lilita+One&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'gamers_studio_scripts' );

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/theme-library/function-files/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/theme-library/dynamic-css.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';


// Output inline CSS based on Customizer setting
function gamers_studio_customizer_css() {
    $enable_breadcrumb = get_theme_mod('gamers_studio_enable_breadcrumb', true);
    ?>
    <style type="text/css">
        <?php if (!$enable_breadcrumb) : ?>
            nav.woocommerce-breadcrumb {
                display: none;
            }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'gamers_studio_customizer_css');


function gamers_studio_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', 'linear-gradient(90.09deg, #F213FF 0%, #07D0ED 99.23%)' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'gamers_studio_customize_css' );


function add_custom_script_in_footer() {
    if ( get_theme_mod( 'gamers_studio_enable_sticky_header', false ) ) {
        ?>
        <script>
            jQuery(document).ready(function($) {
                $(window).on('scroll', function() {
                    var scroll = $(window).scrollTop();
                    if (scroll > 0) {
                        $('.navigation-part.hello').addClass('is-sticky');
                    } else {
                        $('.navigation-part.hello').removeClass('is-sticky');
                    }
                });
            });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'add_custom_script_in_footer' );


function gamers_studio_enqueue_selected_fonts() {
    $fonts_url = gamers_studio_get_fonts_url();
    if (!empty($fonts_url)) {
        wp_enqueue_style('gamers-studio-google-fonts', $fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'gamers_studio_enqueue_selected_fonts');

function gamers_studio_layout_customizer_css() {
    $margin = get_theme_mod('gamers_studio_layout_width_margin', 0);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'gamers_studio_layout_customizer_css');