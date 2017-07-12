<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package cg_studio
 */

get_header(); ?>

<section class="chapter">
  <h2 class="chapter__heading">OH NO!</h2>
  <?php get_template_part( 'assets/images/ferns.svg' );
              ?>
  <p class="banner">I can't seem to find what you're looking for, but here is a picture of my kitten Catsley Shacklebolt.</p>
  <figure class="kitten">
  	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/catsley.jpg" alt="Catsley the cat"/>
  </figure>
</section>
<?php get_footer(); ?>