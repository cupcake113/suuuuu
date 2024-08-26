<?php

/**
 * Custom template tags for this theme
 *
 * @package gamers_studio
 */

if ( ! function_exists( 'gamers_studio_posted_on_single' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time on single posts.
     */
    function gamers_studio_posted_on_single() {
        if ( get_theme_mod( 'gamers_studio_single_post_hide_date', false ) ) {
            return;
        }

        $gamers_studio_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $gamers_studio_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $gamers_studio_time_string = sprintf(
            $gamers_studio_time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $gamers_studio_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $gamers_studio_time_string . '</a></span>';

        echo $gamers_studio_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'gamers_studio_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function gamers_studio_posted_on() {
        if ( get_theme_mod( 'gamers_studio_post_hide_date', false ) ) {
            return;
        }

        $gamers_studio_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $gamers_studio_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $gamers_studio_time_string = sprintf(
            $gamers_studio_time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $gamers_studio_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $gamers_studio_time_string . '</a></span>';

        echo $gamers_studio_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;


if ( ! function_exists( 'gamers_studio_posted_by_single' ) ) :
    /**
     * Prints HTML with meta information for the current author on single posts.
     */
    function gamers_studio_posted_by_single() {
        if ( get_theme_mod( 'gamers_studio_single_post_hide_author', false ) ) {
            return;
        }
        $byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

        echo '<span class="post-author"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'gamers_studio_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function gamers_studio_posted_by() {
        if ( get_theme_mod( 'gamers_studio_post_hide_author', false ) ) {
            return;
        }
        $byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

        echo '<span class="post-author"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'gamers_studio_categories_single_list' ) ) :
    function gamers_studio_categories_single_list( $with_background = false ) {
        if ( is_singular( 'post' ) ) {
            $gamers_studio_hide_category = get_theme_mod( 'gamers_studio_single_post_hide_category', false );

            if ( ! $gamers_studio_hide_category ) {
                $categories = get_the_category();
                $separator  = '';
                $output     = '';
                if ( ! empty( $categories ) ) {
                    foreach ( $categories as $category ) {
                        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                    }
                    echo trim( $output, $separator );
                }
            }
        }
    }
endif;

if ( ! function_exists( 'gamers_studio_categories_list' ) ) :
    function gamers_studio_categories_list( $with_background = false ) {
        $gamers_studio_hide_category = get_theme_mod( 'gamers_studio_post_hide_category', False );

        if ( ! $gamers_studio_hide_category ) {
            $categories = get_the_category();
            $separator  = '';
            $output     = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                }
                echo trim( $output, $separator );
            }
        }
    }
endif;

if ( ! function_exists( 'gamers_studio_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function gamers_studio_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && is_singular() ) {
			$gamers_studio_hide_tag = get_theme_mod( 'gamers_studio_post_hide_tags', false );

			if ( ! $gamers_studio_hide_tag ) {
				/* translators: used between list items, there is a space after the comma */
				$gamers_studio_tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'gamers-studio' ) );
				if ( $gamers_studio_tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'gamers-studio' ) . '</span>', $gamers_studio_tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'gamers-studio' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'gamers_studio_post_thumbnail' ) ) :
    /**
     * Display the post thumbnail.
     */
    function gamers_studio_post_thumbnail() {
        // Return early if the post is password protected, an attachment, or does not have a post thumbnail.
        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Display post thumbnail for singular views.
        if ( is_singular() ) :
            // Check theme setting to hide the featured image in single posts.
            if ( get_theme_mod( 'gamers_studio_single_post_hide_feature_image', false ) ) {
                return;
            }
            ?>
            <div class="post-thumbnail">
                <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(); 
                } else {
                    // URL of the default image
                    $gamers_studio_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $gamers_studio_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </div><!-- .post-thumbnail -->
        <?php else :
            // Check theme setting to hide the featured image in non-singular posts.
            if ( get_theme_mod( 'gamers_studio_post_hide_feature_image', false ) ) {
                return;
            }
            ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(
                        'post-thumbnail',
                        array(
                            'alt' => the_title_attribute(
                                array(
                                    'echo' => false,
                                )
                            ),
                        )
                    );
                } else {
                    // URL of the default image
                    $gamers_studio_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $gamers_studio_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </a>
        <?php endif; // End is_singular().
    }
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
