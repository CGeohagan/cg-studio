<?php 
/**
 * Template Name: Single Portfolio
 *
 * This is the template that displays the single portfolio pages
 * @package cg_studio
 */

get_header(); ?>


<main id="main" role="main">

  <article class="portfolio__item">

    <?php while ( have_posts() ) : the_post(); ?>

    	<div class="details">
	      <div class="details__text">
	      	<div class="details__text-left">
						<h1><?php the_title(); ?></h1>
						<h4><?php the_field('category'); ?></h4>
						<?php get_template_part( 'assets/images/ferns.svg' );
                    ?>
					</div>
					<div class="details__text-right">
						<p><?php the_field('details'); ?></p>
					</div>
				</div>
				<button class="pink-button"><a href="<?php the_field('link'); ?>">Visit</a></button>
			</div>

			<div class="portfolio__container">

	    	<?php the_post_thumbnail('large'); ?>

				<div class="wrap">

						<?php if( have_rows('iphone_mockups') ): ?>

	    				<?php while ( have_rows('iphone_mockups') ) : the_row();

								// vars
								$image = get_sub_field('iphone');
								?>

								<div class="tile">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
								</div>

							<?php endwhile; ?>

						<?php endif; ?>

				</div>

				<div class="boxshadow"><?php the_field('images'); ?></div>

			</div>

    <?php endwhile; // end of the loop. ?>

  </article>

</main>

<?php get_footer(); ?>
