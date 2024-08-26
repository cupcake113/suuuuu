<?php

$gamers_studio_sldier_section = get_theme_mod( 'gamers_studio_enable_banner_section', false);

if ( ! $gamers_studio_sldier_section ) {
	return;
}

$gamers_studio_slider_content_ids  = array();
$gamers_studio_slider_content_type = get_theme_mod( 'gamers_studio_banner_slider_content_type', 'post' );

for ( $i = 1; $i <= 3; $i++ ) {
	$gamers_studio_slider_content_ids[] = get_theme_mod( 'gamers_studio_banner_slider_content_' . $gamers_studio_slider_content_type . '_' . $i );
}
$gamers_studio_banner_slider_args = array(
	'post_type'           => $gamers_studio_slider_content_type,
	'post__in'            => array_filter( $gamers_studio_slider_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);
$gamers_studio_banner_slider_args = apply_filters( 'gamers_studio_banner_section_args', $gamers_studio_banner_slider_args );

gamers_studio_render_banner_section( $gamers_studio_banner_slider_args );

/**
 * Render Banner Section.
 */
function gamers_studio_render_banner_section( $gamers_studio_banner_slider_args ) {     ?>

	<section id="gamers_studio_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			gamers_studio_section_link( 'gamers_studio_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$query = new WP_Query( $gamers_studio_banner_slider_args );
			if ( $query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider gamers-studio-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php 
					$i = 1;
					while ( $query->have_posts() ) :
						$query->the_post();
						$gamers_studio_button_label = get_theme_mod( 'gamers_studio_banner_button_label_' . $i, '' );
						$gamers_studio_button_link  = get_theme_mod( 'gamers_studio_banner_button_link_' . $i, '' );
						$gamers_studio_second_button_label = get_theme_mod( 'gamers_studio_banner_second_button_label_' . $i, '' );
						$gamers_studio_second_button_link  = get_theme_mod( 'gamers_studio_banner_second_button_link_' . $i, '' );
						$gamers_studio_banner_short_heading_1 = get_theme_mod( 'gamers_studio_banner_short_heading_1' . $i, '' );
						$gamers_studio_banner_short_heading_2 = get_theme_mod( 'gamers_studio_banner_short_heading_2' . $i, '' );
						$gamers_studio_banner_short_heading_3 = get_theme_mod( 'gamers_studio_banner_short_heading_3' . $i, '' );
						$gamers_studio_button_link  = ! empty( $gamers_studio_button_link ) ? $gamers_studio_button_link : get_the_permalink();
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-img">
									<?php the_post_thumbnail( 'full' ); ?>
								</div>
								<div class="banner-caption">
									<div class="asterthemes-wrapper">
										<div class="banner-catption-wrapper">
											<h1 class="banner-caption-title">
												<a href="<?php the_permalink(); ?>">
							                        <?php the_title(); ?>
							                    </a>
											</h1>
											<div class="mag-post-excerpt">
												<?php the_excerpt(); ?>
											</div>
											<?php if ( ! empty( $gamers_studio_button_label ) ) { ?>
												<div class="banner-slider-btn">
													<a href="<?php echo esc_url( $gamers_studio_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $gamers_studio_button_label ); ?></a>
												</div>
											<?php } ?>
											<div class="socail-search">
				                                <div class="social-icons">
				                                    <?php
				                                    if ( has_nav_menu( 'social' ) ) {
				                                        wp_nav_menu(
				                                            array(
				                                                'menu_class'     => 'menu social-links',
				                                                'link_before'    => '<span class="screen-reader-text">',
				                                                'link_after'     => '</span>',
				                                                'theme_location' => 'social',
				                                            )
				                                        );
				                                    }
				                                    ?>
				                                </div>
				                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}
