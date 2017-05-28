<?php
/**
 * Template Name: Redirect to URL
 * 
 * @package cg_studio
 */

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		if ( get_field('url') ) :
			$redirecturl = get_field('url');
			wp_redirect( $redirecturl );
			exit;
		else :
			_e('Your theme is not set up to use this template, or you have not specified a URL.', 'cg-studio');
		endif;
	endwhile;
endif; 
?>