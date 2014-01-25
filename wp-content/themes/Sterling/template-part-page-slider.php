<?php
// Check if we are on the main posts archive or not.
if ( is_home() ) {
    $post_id            = get_option( 'page_for_posts' );
    $slider_shortcode   = get_post_meta( $post_id, 'truethemes_slider_shortcode', true );
    $slider_cu3er       = get_post_meta( $post_id, 'truethemes_slider_cu3er', true );
} else {
    global $post;
    $post_id            = $post->ID;
    $slider_shortcode   = get_post_meta( $post_id, 'truethemes_slider_shortcode', true );
    $slider_cu3er       = get_post_meta( $post_id, 'truethemes_slider_cu3er', true );
}

// Check for custom slider value.

if ( ( '' != $slider_shortcode ) || ( '' != $slider_cu3er ) ) : ?>

    <section class="banner-slider tt-custom-slider-wrap">
        <div class="center-wrap">
            <!--nicholas added menu bar-->
            <nav>
                <ul>
                    <?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'Main Menu', 'depth' => 0 ) ); ?>
                 </ul>
            </nav>
            <!--end manu bar-->

            <?php
                if ( '' != $slider_cu3er ) {
                    if ( function_exists( 'display_cu3er' ) )
                        display_cu3er( '' . $slider_cu3er . '' );
                } else {
                    echo do_shortcode( '' . strip_tags(html_entity_decode($slider_shortcode)) . '' );
                }
            ?>
        </div><!-- end .center-wrap -->
        <div class="shadow top"></div>
        <div class="shadow bottom"></div>
        <div class="tt-overlay"></div>
    </section>
<?php else : ?>
    <section class="small_banner" >
        <?php get_template_part( 'template-part-small-banner', 'childtheme' ); ?>
    </section>
<?php endif; ?>