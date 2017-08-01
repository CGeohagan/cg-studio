<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package cg_studio
 */
?>

<article class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'No things found!', 'cg-studio' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_archive() ) : ?>
		
			<p><?php _e( 'There are no published posts for this archive.', 'cg-studio' ); ?></p>
			<?php get_search_form(); ?>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'No matches were found for your search terms. Please try again with different keywords.', 'cg-studio' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps a search would help?', 'cg-studio' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .entry-content -->
</article>