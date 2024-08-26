<?php

/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gamers_studio
 */
$gamers_studio_menu_text_transform = get_theme_mod( 'menu_text_transform', 'capitalize' );
$gamers_studio_menu_text_transform_css = ( $gamers_studio_menu_text_transform !== 'capitalize' ) ? 'text-transform: ' . $gamers_studio_menu_text_transform . ';' : '';
$gamers_studio_header_button_label = get_theme_mod( 'gamers_studio_header_button_label_', '' );
$gamers_studio_header_button_link  = get_theme_mod( 'gamers_studio_header_button_link_', '' );
$gamers_studio_header_button_label_1 = get_theme_mod( 'gamers_studio_header_button_label_1', '' );
$gamers_studio_header_button_link_1  = get_theme_mod( 'gamers_studio_header_button_link_1', '' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(get_theme_mod('gamers_studio_website_layout', false) ? 'site-boxed--layout' : ''); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site asterthemes-site-wrapper">
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'gamers-studio' ); ?></a>
	 <?php
	if ( get_theme_mod( 'gamers_studio_enable_preloader', false ) === true ) { ?>
		<div id="loader">
			<div class="loader-container">
				<div id="preloader">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/resource/loader.gif' ); ?>">
				</div>
			</div>
		</div>
	<?php } ?>
<header id="masthead" class="site-header">
    <div class="header-main-wrapper">
        <div class="bottom-header-outer-wrapper">
            <div class="bottom-header-part">
                <div class="asterthemes-wrapper">
                    <div class="bottom-header-part-wrapper">
                        <div class="bottom-header-menu-part">
                            <div class="navigation-part hello  <?php echo esc_attr( get_theme_mod( 'gamers_studio_enable_sticky_header', false ) ? 'sticky-header' : '' ); ?>">
                                <nav id="site-navigation" class="main-navigation">
                                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                    <div class="main-navigation-links"  style="<?php echo esc_attr( $gamers_studio_menu_text_transform_css ); ?>">
                                        <?php
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => 'primary',
                                                )
                                            );
                                        ?>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="bottom-header-middle-part">
                            <div class="site-branding">
                                <?php if ( has_custom_logo() ) { ?>
                                <div class="site-logo">
                                    <?php the_custom_logo(); ?>
                                </div>
                                <?php } ?>
                                <div class="site-identity">
                                        <?php
                                        if ( get_theme_mod( 'gamers_studio_enable_site_title_setting', true ) ) {
                                            if ( is_front_page() && is_home() ) :
                                                ?>
                                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                                <?php
                                            else :
                                                ?>
                                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                                <?php
                                            endif;
                                        }

                                        if ( get_theme_mod( 'gamers_studio_enable_tagline_setting', false ) ) :
                                            $gamers_studio_description = get_bloginfo( 'description', 'display' );

                                            if ( $gamers_studio_description || is_customize_preview() ) :
                                                ?>
                                            <p class="site-description">
                                                <?php
                                                echo esc_html( $gamers_studio_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                ?>
                                            </p>
                                                <?php
                                            endif;
                                                ?>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-header-right-part head-btn">
                            <?php if ( ! empty( $gamers_studio_header_button_label ) ) { ?>
                                <div class="header-btn">
                                    <a href="<?php echo esc_url( $gamers_studio_header_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $gamers_studio_header_button_label ); ?></a>
                                </div>
                            <?php } ?>
                            <?php if ( ! empty( $gamers_studio_header_button_label_1 ) ) { ?>
                                <div class="header-btn">
                                    <a href="<?php echo esc_url( $gamers_studio_header_button_link_1 ); ?>" class="asterthemes-button"><?php echo esc_html( $gamers_studio_header_button_label_1 ); ?></a>
                                </div>
                            <?php } ?>
                            <?php
                                $gamers_studio_enable_header_search_section = get_theme_mod( 'gamers_studio_enable_header_search_section', false );
                                if ( $gamers_studio_enable_header_search_section ) : ?>
                                <span class="search-main">
                                  <span class="btn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                  </span>
                                  <div class="form">
                                    <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <label>
                                            <span class="screen-reader-text"><?php echo esc_html( 'Search for:', 'label', 'gamers-studio' ); ?></span>
                                            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'gamers-studio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                                        </label>
                                        <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo esc_html( 'Search', 'submit button', 'gamers-studio' ); ?></span></button>
                                    </form>
                                  </div>
                                </span>
                            <?php endif; ?>
                            <?php if ( class_exists( 'woocommerce' ) ) {?>
                                <a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','gamers-studio' ); ?>"><i class="fas fa-shopping-bag"></i></a>
                            <?php }?>
                            <?php if(class_exists('woocommerce')){ ?>
                                <span class="user-account">
                                    <?php if ( is_user_logged_in() ) { ?>
                                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','gamers-studio'); ?>"><i class="fas fa-sign-out-alt"></i></a>
                                    <?php } 
                                    else { ?>
                                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','gamers-studio'); ?>"><i class="fas fa-user"></i></a>
                                    <?php } ?>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
if ( ! is_front_page() || is_home() ) {

	if ( is_front_page() ) {

		require get_template_directory() . '/sections/sections.php';
		gamers_studio_homepage_sections();
	}

	?>

	<div id="content" class="site-content">
		<div class="asterthemes-wrapper">
			<div class="asterthemes-page">
			<?php } ?>
