<?php
/**
 * The header template
 *
 * Displays all of the <head> section and everything up till <main id="main">
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
    <meta name="google-site-verification" content="9MktcrdcpOgm-pFAkGwk0T1LOwVc2k8neEfwcaH2THQ" />
    
    <!-- favicon & links -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="image/x-icon">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- stylesheets are enqueued via functions.php -->

    <!-- all other scripts are enqueued via functions.php -->
    <!-- scripts  -->
    <script>  
        document.getElementsByTagName('html')[0].className += ' js';  
    </script>  
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
                    // If not on the front page, use the secondary menu
                    wp_nav_menu( array( 'theme_location' => 'secondary' ) ); 
                }
                ?>

			</nav><!-- #access -->
		</header>
