<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <?php
        global $ttso;
        $logo             = $ttso->st_sitelogo;
        $custom_logo      = $ttso->st_logo_icon;
        $custom_logo_text = strip_tags( stripslashes( $ttso->st_logo_text ) );
        $toolbar          = $ttso->st_toolbar;
        $responsive       = $ttso->st_responsive;
        $boxedlayout      = $ttso->st_boxedlayout;
    ?>
    <meta charset="utf-8" />
    <?php if ( 'false' == $responsive ) : ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php endif; ?>
    <title><?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />

    <?php wp_head(); ?>

    <!--[if lt IE 9]>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/IE.css" />
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/js/IE.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/js/respond.js"></script>
    <![endif]-->

    <?php get_template_part( 'template-part-page-styling', 'childtheme' ); ?>
</head>
<body <?php body_class();?>>
<?php if ( 'true' == $boxedlayout ) {echo '<div id="tt-boxed-layout">';}else{echo '<div id="tt-wide-layout">';} ?>
<?php if ( 'true' == $toolbar ) { ?>
    <aside class="top-aside clearfix">
        <div class="center-wrap">
            <div class="one_half">
            <!--<?php dynamic_sidebar( 'Top Left Toolbar' ); ?>-->
            </div><!-- end .top-toolbar-left -->

            <div class="one_half">
                <!--nicholas change dynamic sidebar into permanent link-->
                <ul>
                    <li><a herf="#">简体中文</a></li>
                    <li><a herf="#">English</a></li>
                    <li><a herf="#">日本語</a></li>
                </ul>
                <?php dynamic_sidebar( 'Top Right Toolbar' ); ?>
            </div><!-- end .top-toolbar-right -->
        </div><!-- end .center-wrap -->
        <div class="top-aside-shadow"></div>
    </aside>
<?php } ?>
    <header>
        <div class="center-wrap">
            <div class="companyIdentity">
                <?php if ( is_page_template( 'page-template-under-construction.php' ) ) { ?>
                    <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                <?php } else { ?>
                    <?php if ( '' == $custom_logo_text ) { ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                    <?php } else { ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/global/<?php echo esc_attr( $custom_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                        <h1><a href="<?php echo home_url(); ?>"><?php echo esc_html( $custom_logo_text ); ?></a></h1>
                    <?php } ?>
                <?php } ?>
            </div><!-- end .companyIdentity -->
            <nav>
                <ul>
                    <!--<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'Main Menu', 'depth' => 0 ) ); ?>-->
                    <li><a href="./contact">联系我们</a></li>
                </ul>
            </nav>
        </div><!-- end .center-wrap -->
    </header>