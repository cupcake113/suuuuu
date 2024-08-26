<?php

if ( ! get_theme_mod( 'gamers_studio_enable_service_section', false ) ) {
  return;
}

$gamers_studio_args = '';

gamers_studio_render_service_section( $gamers_studio_args );

/**
 * Render Offer Section.
 */
function gamers_studio_render_service_section( $gamers_studio_args ) { ?>
    <section id="gamers_studio_trending_section" class="asterthemes-frontpage-section trending-section trending-style-1">
    <?php
    if ( is_customize_preview() ) :
      gamers_studio_section_link( 'gamers_studio_service_section' );
    endif;

    $gamers_studio_about_1_heading = get_theme_mod( 'gamers_studio_about_1_heading', '' );
    $gamers_studio_about_2_heading = get_theme_mod( 'gamers_studio_about_2_heading', '' );
    $gamers_studio_about_text = get_theme_mod( 'gamers_studio_about_text', '' );
    $gamers_studio_timmer_text = get_theme_mod( 'gamers_studio_timmer_text', '' );
    $gamers_studio_timmer_heading = get_theme_mod( 'gamers_studio_timmer_heading', '' );
    $gamers_studio_about_1_button_link = get_theme_mod( 'gamers_studio_about_1_button_link', '' );
    $gamers_studio_about_2_button_link = get_theme_mod( 'gamers_studio_about_2_button_link', '' );
    $gamers_studio_about_left_image_1 = get_theme_mod( 'gamers_studio_about_left_image_1', '' );
    $gamers_studio_about_left_image_2 = get_theme_mod( 'gamers_studio_about_left_image_2', '' );
    ?>
    <div class="asterthemes-wrapper">
      <div class="about-us">
        <?php if ( ! empty( $gamers_studio_about_left_image_1 ) || ! empty( $gamers_studio_about_left_image_2 ) ) { ?>
          <div class="about-left-box">
            <div class="about-img-box-1">
              <div class="about-img-2">
                <?php if ( ! empty( $gamers_studio_about_left_image_1 ) ) { ?>
                  <div class="service-img">
                    <img src="<?php echo esc_url( $gamers_studio_about_left_image_1 ); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php if ( ! empty( $gamers_studio_about_1_heading ) ) { ?>
                      <h3 data-text="heading"><?php echo esc_html( $gamers_studio_about_1_heading ); ?></h3>
                    <?php } ?>
                    <?php if ( ! empty( $gamers_studio_about_1_button_link ) ) { ?>
                      <div class="about-btn">
                        <a href="<?php echo esc_url( $gamers_studio_about_1_button_link ); ?>" class="asterthemes-button"><?php echo esc_html('Deal of the Day','gamers-studio' ); ?></a>
                      </div>
                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
              <div class="about-img-3">
                <?php if ( ! empty( $gamers_studio_about_left_image_2 ) ) { ?>
                  <div class="service-img">
                    <img src="<?php echo esc_url( $gamers_studio_about_left_image_2 ); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php if ( ! empty( $gamers_studio_about_2_heading ) ) { ?>
                      <h3 data-text="heading"><?php echo esc_html( $gamers_studio_about_2_heading ); ?></h3>
                    <?php } ?>
                    <?php if ( ! empty( $gamers_studio_about_2_button_link ) ) { ?>
                      <div class="about-btn">
                        <a href="<?php echo esc_url( $gamers_studio_about_2_button_link ); ?>" class="asterthemes-button"><?php echo esc_html('Deal of the Day','gamers-studio' ); ?></a>
                      </div>
                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if ( ! empty( $gamers_studio_about_text ) || ! empty( $gamers_studio_timmer_heading ) || ! empty( $gamers_studio_timmer_text ) ) { ?>
        <div class="about-right-box">
          <div class="header-contact-inner">
            <?php if ( ! empty( $gamers_studio_timmer_heading ) ) { ?>
              <h4><?php echo esc_html( $gamers_studio_timmer_heading ); ?></h4>
            <?php } ?>
            <p id="timer" class="timmercount">
              <input type="hidden" class="timmer" value="<?php echo esc_html( $gamers_studio_about_text ); ?>">
            </p>
            <?php if ( ! empty( $gamers_studio_timmer_text ) ) { ?>
              <h4><?php echo esc_html( $gamers_studio_timmer_text ); ?></h4>
            <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php
}
