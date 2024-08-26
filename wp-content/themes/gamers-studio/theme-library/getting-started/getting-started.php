<?php
/**
 * Getting Started Page.
 *
 * @package gamers_studio
 */


if( ! function_exists( 'gamers_studio_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function gamers_studio_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'gamers-studio' ),
		__( 'Getting Started', 'gamers-studio' ),
		'manage_options',
		'gamers-studio-getting-started',
		'gamers_studio_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'gamers_studio_getting_started_menu' );

if( ! function_exists( 'gamers_studio_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function gamers_studio_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_gamers-studio-getting-started' != $hook ) return;

    wp_enqueue_style( 'gamers-studio-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, GAMERS_STUIDO_THEME_VERSION );

    wp_enqueue_script( 'gamers-studio-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), GAMERS_STUIDO_THEME_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'gamers_studio_getting_started_admin_scripts' );

if( ! function_exists( 'gamers_studio_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function gamers_studio_getting_started_page(){ 
	$gamers_studio_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'gamers-studio' );?> <span class="theme-name"><?php echo esc_html( GAMERS_STUIDO_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$gamers_studio_description = explode( '. ', $gamers_studio_theme->get( 'Description' ) );

						array_pop( $gamers_studio_description );

						$gamers_studio_description = implode( '. ', $gamers_studio_description );

						echo esc_html( $gamers_studio_description . '.' );
					?></p>
					<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'gamers-studio' ); ?></a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/gamers-studio/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'gamers-studio' ); ?>" target="_blank">
			            <?php esc_html_e( 'REVIEW', 'gamers-studio' ); ?>
			        </a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/gamers-studio' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'gamers-studio' ); ?>" target="_blank">
			            <?php esc_html_e( 'CONTACT SUPPORT', 'gamers-studio' ); ?>
			        </a>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'gamers-studio' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'gamers-studio' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;