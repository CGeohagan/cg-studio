<?php
/**
 * Template Name: Front Page
 *
 * @package cg_studio
 */

get_header(); ?>

<div class="border-top"></div>
<div class="border-bottom"></div>

<main id="main" role="main" class="col">

    <?php while ( have_posts() ) : the_post(); ?>

    	<div id="home">
        <section class="hero">
      		<h1 class="hero__title"><?php bloginfo('name'); ?></h1>
      		<?php get_template_part( 'assets/images/logo-foliage.svg' );
                      ?>		
    		</section>
    		<section class="intro">
    			<p class="intro__text"><?php the_field('tagline_text'); ?></p>
    		</section>
      </div>

      <div id="work">
        <h2>Work</h2>

        <?php
          $args = array( 'post_type' => 'portfolio');
          $query = new WP_Query( $args );
        ?>

        <?php if ($query->have_posts()) : while ($query->have_posts() ) : $query->the_post(); ?>

          <section class="item">
            <h3><?php the_title(); ?></h3>
            <p class="item__text">
              <?php the_field('portfolio_description'); ?>
            </p>
            <figure class="item__figure">
              <a href="<?php the_permalink(); ?>" class="item__link"><?php the_post_thumbnail('large'); ?></a>
            </figure>

          </section>

        <?php endwhile; endif; ?>
      </div>

      <div id="about">
        <h2>About</h2>
        <section class="about__section">
          <p class="about__text"><?php the_field('tagline_text'); ?></p>
          <?php get_template_part( 'assets/images/colleen.svg' );
                      ?>
        </section>
      </div>

      <div id="etcetera">
        <h2>Etcetera</h2>
      </div>


    <?php endwhile; // end of the loop. ?>

</main>

<?php get_footer(); ?>