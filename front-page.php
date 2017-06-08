<?php
/**
 * Template Name: Front Page
 *
 * @package cg_studio
 */

get_header(); ?>

<div class="border-top scene_element scene_element--bordertop"></div>
<div class="border-bottom scene_element scene_element--borderbottom"></div>

<main id="main" role="main" class="col">

    <?php while ( have_posts() ) : the_post(); ?>

    	<section id="home" class="hero">
    		<h1 class="hero__title"><?php bloginfo('name'); ?></h1>
    		<?php get_template_part( 'assets/images/logo-foliage.svg' );
                    ?>		
        <p class="hero__text scene_element scene_element--fadeinup"><?php the_field('tagline_text'); ?></p>
      </section>

      <section id="work" class="chapter">
        <h2 class="chapter__heading">Work</h2>

        <?php
          $args = array( 'post_type' => 'portfolio');
          $query = new WP_Query( $args );
        ?>

        <?php if ($query->have_posts()) : while ($query->have_posts() ) : $query->the_post(); ?>

          <section class="item">
            <div class="item__content">
              <div class="item__text scene_element scene_element--fadeinup">             
                <h3><?php the_title(); ?></h3>
                <?php the_field('description'); ?>
                <h4><?php the_field('category'); ?></h4>
              </div>
              <figure class="item__figure scene_element scene_element--fadein">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
              </figure>
            </div>
            <div class="item__links">
              <a href="<?php the_permalink(); ?>">Details</a>
              <a href="<?php the_field('link'); ?>">Visit Site</a>
            </div>
          </section>

        <?php endwhile; endif; ?>

      </section>

      <section id="services" class="chapter">
        <h2 class="chapter__heading">Services</h2>
      </section>

      <section id="about" class="chapter">
        <h2 class="chapter__heading">About</h2>
        <div class="about__section">
          <ul class="list">           
            <li>
              <span class="list__num">1</span>
              <p>Hi, I'm Colleen. I'm a <i>(sometimes firey)</i> redhead. When I was a baby, people thought I was Willow from Willow <i>(you know, that Val Kilmer movie.)</i></p>
              <?php get_template_part( 'assets/images/colleen.svg' );
                      ?>
            </li>
            <li>
              <span class="list__num">2</span>
              <p>Books are my love language. My favorite days are spent reading on my front porch swing.</p>
              <?php get_template_part( 'assets/images/books.svg' );
                      ?>
            </li>
            <li>
              <span class="list__num">3</span>
              <p>My life goals are to learn French and move to Paris. Or St. Remy. Or Dingle. And to learn the piano.</p>
              <?php get_template_part( 'assets/images/eiffel.svg' );
                      ?>
            </li>
            <li>
              <span class="list__num">4</span>
              <p>I have two cats named Catsley Shacklebolt and Picasso.</p>
              <?php get_template_part( 'assets/images/cat.svg' );
                      ?>
            </li>
            <li>
              <span class="list__num">5</span>
              <p>I've worked as an Environmental Engineer for 7 years. You could say I'm a late bloomer, or a late dreamer.</p>
              <?php get_template_part( 'assets/images/beaker.svg' );
                      ?>
            </li>
          </ul>

        </div>
      </section>

      <section id="etcetera" class="chapter">
        <h2 class="chapter__heading">Etcetera</h2>
      </section>


    <?php endwhile; // end of the loop. ?>

</main>

<?php get_footer(); ?>