<?php
/**
 * Shortened content without any text
 *
 * @package cg_studio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( has_post_thumbnail() ): ?>
		<figure class="entry-thumbnail boxshadow">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<figcaption class="entry-caption">
				<div class="entry-excerpt">
					<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
				</div>
			</figcaption>
		</figure>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'cg-studio' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
