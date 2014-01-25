<?php
// Remove any filters added by theme functions.
remove_filter( 'pre_get_posts', 'wploop_exclude' );

// Query the database and retrieve the slider posts added by user.
query_posts( 'post_type=slider&posts_per_page=-1' );
if ( have_posts() ) : while ( have_posts() ) : the_post();
    // Process all individual post meta.
    $slider_image           = get_post_meta( $post->ID, 'slider_image', true );
    $slider_image_link      = get_post_meta( $post->ID, 'slider_image_url', true );
    $slider_image_alt_text  = get_post_meta( $post->ID, 'slider_image_alt_text', true );
    $slider_video           = get_post_meta( $post->ID, 'slider_video', true );
    $slider_alignment       = get_post_meta( $post->ID, 'slider_alignment', true );

    // If image = false and video = false, display the content area.
    if ( empty( $slider_image ) && empty( $slider_video ) ) { ?>
        <div class="clearfix home-slider-post" id="slider-post-<?php the_ID(); ?>">
            <?php the_content(); ?>
        </div><!-- end .home-slider-post -->
    <?php }

    // If image = true and alignment = right, output appropriate content.
    if ( ! empty( $slider_image ) && 'align_right' == $slider_alignment ) { ?>
        <div class="clearfix home-slider-post" id="slider-post-<?php the_ID(); ?>">
            <div class="one_half">
                <?php the_content(); ?>
            </div>

            <div class="one_half">
                <?php echo do_shortcode( '[image_frame image_path="' . esc_url( $slider_image ) . '" size="full-half" alt="' . esc_attr( $slider_image_alt_text ) . '" link_to_page="' . esc_url( $slider_image_link ) . '"]' ); ?>
            </div>
        </div><!-- end .home-slider-post -->
    <?php }

    // If image = true and alignment = left, output appropriate content.
    if ( ! empty( $slider_image ) && 'align_left' == $slider_alignment ) { ?>
        <div class="clearfix home-slider-post" id="slider-post-<?php the_ID(); ?>">
            <div class="one_half">
                <?php echo do_shortcode( '[image_frame image_path="' . esc_url( $slider_image ) . '" size="full-half" description="' . esc_attr( $slider_image_alt_text ) . '" link_to_page="' . esc_url( $slider_image_link ) . '"]' ); ?>
            </div>

            <div class="one_half">
                <?php the_content(); ?>
            </div>
        </div><!-- end .home-slider-post -->
    <?php }

    // If video = true and alignment = right, output appropriate content.
    if ( ! empty( $slider_video ) && 'align_right' == $slider_alignment ) { ?>
        <div class="clearfix home-slider-post" id="slider-post-<?php the_ID(); ?>">
            <div class="one_half">
                <?php the_content(); ?>
            </div>

            <div class="one_half">
                <div class="single-post-thumb">
                    <?php
                        global $wp_embed;
                        $shortcode = '[embed width="445" height="273"]' . $slider_video . '[/embed]';
                        echo $wp_embed->run_shortcode( $shortcode );
                    ?>
                </div>
            </div>
        </div><!-- end .home-slider-post -->
    <?php }

    // If video = true and alignment = left, output appropriate content.
    if ( ! empty( $slider_video ) && 'align_left' == $slider_alignment ) { ?>
        <div class="clearfix home-slider-post" id="slider-post-<?php the_ID(); ?>">
            <div class="one_half">
                <div class="single-post-thumb">
                    <?php
                        global $wp_embed;
                        $shortcode = '[embed width="445" height="273"]' . $slider_video . '[/embed]';
                        echo $wp_embed->run_shortcode($shortcode);
                    ?>
                </div>
            </div>

            <div class="one_half">
                <?php the_content(); ?>
            </div>
        </div><!-- end .home-slider-post -->
    <?php }
// That's it for this template!
endwhile; endif; wp_reset_query();