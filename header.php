<?php
/**
 * The header template
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package cg_studio
 */
?>

<!DOCTYPE html>
 
<!--[if lt IE 9]>
<html id="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width">
    
    <!-- favicon & links -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- stylesheets are enqueued via functions.php -->

    <!-- all other scripts are enqueued via functions.php -->
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/html5shiv.js" type="text/javascript"></script>
    <![endif]-->

    <?php // Lets other plugins and files tie into our theme's <head>:
    wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>
	<div id="page" class="marginin">
		<header class="site-header" role="banner" class="row">            
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
				<?php bloginfo('name'); ?>
			</a>
            <a class="screen-reader-text" href="#main">Skip to content</a>
			<nav class="access" role="navigation">
                <div class="mobile-menu">
                    <a href="#">Menu</a>
                </div>
				<?php 
                if ( is_front_page() ) {
                    // If on the home page, use primary menu
                    wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
                ?>
                <?php 
                } elseif ( is_404() ) { ?>
                    <ul class="menu">                          
                        <li>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                Back to Home
                            </a>
                        </li>
                    </ul>
                <?php  
                } else { 
                    // If on portfolio page, use portfolio menu
                ?>
                    <ul class="menu">                          
                        <li>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                Back to Home
                            </a>
                        </li>
                        <li>
                            <?php previous_post_link( '%link','Next Project' ); ?>
                        </li>
                        <li>
                            <?php next_post_link( '%link','Next Project' ); ?>
                        </li>
                    </ul>
                <?php    
                }
                ?>
			</nav><!-- #access -->
		</header>
