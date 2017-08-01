<?php
/**
 * Main Template File
 * 
 * This file is used to display a page when nothing more specific matches a query.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cg_studio
 */

get_header(); ?>

<section id="primary" role="main" class="col">

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
			<?php get_template_part( 'assets/images/ferns.svg' );
                      ?>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
		<?php get_template_part( 'assets/images/ferns.svg' );
                      ?>
	</header>
	<?php endif; ?>

	<section class="journal-content">
		<?php if ( have_posts() ) : ?>
					
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'noexcerpt' ); ?>

			<?php endwhile; ?>

			<nav id="nav-below">

				<?php if( get_previous_posts_link()) : ?>
					<div class="nav-previous"><?php previous_posts_link( __( 'Older posts', 'cg-studio' ) ); ?></div>
				<?php endif; ?>

				<?php if( get_next_posts_link()) : ?>
					<div class="nav-next"><?php next_posts_link( __( 'Newer posts', 'cg-studio' ) ); ?></div>
				<?php endif; ?>
				
			</nav><!-- #nav-above -->

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	</section>

</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>