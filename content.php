<?php
/**
 * The default template for displaying content
 *
 * @package cg_studio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<figure class="entry-thumbnail boxshadow">
		<?php the_post_thumbnail(); ?>
		<?php the_category(); ?>
	</figure>

	<div class="entry-content">
		<header class="entry-header">
			<span class="entry-date"><?php echo get_the_date(); ?></span>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'cg-studio' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		</header><!-- .entry-header -->	
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'template-parts/pagination' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->