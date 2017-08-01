<?php
/**
 * Shortened content for use in main blog page or archive page
 *
 * @package cg_studio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'cg-studio' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<span class="entry-date"><?php echo get_the_date(); ?></span>
	</header><!-- .entry-header -->

	<?php if( has_post_thumbnail() ): ?>
		<figure>
			<?php the_post_thumbnail(); ?>
		</figure>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">Read More </a>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->