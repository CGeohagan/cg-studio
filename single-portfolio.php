<?php 
/**
 * Template Name: Single Portfolio
 *
 * This is the template that displays the single portfolio pages
 * @package cg_studio
 */

get_header(); ?>

<div class="border-top"></div>
<div class="border-bottom"></div>

<main id="main" class="col" role="main">

  <article class="portfolio__item col-right">

    <?php while ( have_posts() ) : the_post(); ?>

    	<?php the_post_thumbnail('large'); ?>

      <div class="details">
	      <div class="details__text">
	      	<div class="details__text-left">
						<h1><?php the_title(); ?></h1>
						<h3><?php the_field('category'); ?></h3>
					</div>
					<div class="details__text-right">
						<p><?php the_field('details'); ?></p>
					</div>
				</div>
				<button class="pink-button"><a href="<?php the_field('link'); ?>">Visit</a></button>
			</div>

			<div><?php the_field('images'); ?></div>

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

			<div class="pagination">
    		<div class="pagination__links"><?php previous_post_link(); ?></div>
    		<div class="pagination__links"><?php next_post_link(); ?></div>
  		</div>

    <?php endwhile; // end of the loop. ?>

  </article>

</main>

<?php get_footer(); ?>
