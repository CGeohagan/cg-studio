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

	<?php if ( have_posts() ) : ?>

		<?php get_template_part( 'template-parts/archive-header' ); ?>

		<?php /* Start the Loop */ ?>

		<section class="journal-content">
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