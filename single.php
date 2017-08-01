<?php
/**
 * Single post template
 *
 * @package cg_studio
 */

get_header(); ?>

<section id="primary" class="col">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content' ); ?>

	<?php endwhile; // end of the loop. ?>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>