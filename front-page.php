<?php
/**
 * Template Name: Front Page
 *
 * @package cg_studio
 */

get_header(); ?>

<div class="border-top"></div>
<div class="border-bottom"></div>
<div class="scroll-text">
  <p>This Way</p>
</div>

<main id="main" role="main" class="col">

    <?php while ( have_posts() ) : the_post(); ?>

    	<section id="home" class="chapter hero visible" data-color="#d5dddf">
    		<div class="hero__wrapper">
          <h1 class="hero__title"><?php bloginfo('name'); ?></h1>
      		<?php get_template_part( 'assets/images/logo-foliage.svg' );
                      ?>
        </div>		
        <p class="hero__text fadeinup">
          <span><?php the_field('tagline_text_1'); ?></span>
          <span><?php the_field('tagline_text_2'); ?></span>
        </p>
      </section>

    <?php endwhile; // end of the loop. ?>

    <section id="work" class="chapter" data-color="#f3eeeb">
      <h2 class="chapter__heading">Work</h2>

      <?php
        $args = array( 'post_type' => 'portfolio');
        $query = new WP_Query( $args );
      ?>

      <?php if ($query->have_posts()) : while ($query->have_posts() ) : $query->the_post(); ?>

          <section class="item">
            <div class="item__content">
              <div class="item__text">             
                <h3><?php the_title(); ?></h3>
                <?php the_field('description'); ?>
                <h4><?php the_field('category'); ?></h4>
              </div>
              <figure class="item__figure">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
              </figure>
            </div>
            <div class="item__links">
              <a href="<?php the_permalink(); ?>">See Details</a>
              <a href="<?php the_field('link'); ?>">Visit Site</a>
            </div>
          </section>

      <?php endwhile; endif; ?>

    </section>

    <?php while ( have_posts() ) : the_post(); ?>

      <section id="services" class="chapter" data-color="#fae8da">
        <h2 class="chapter__heading">Services</h2>
        <?php get_template_part( 'assets/images/ferns.svg' );
                    ?>
        <p class="banner"><?php the_field('services_banner'); ?></p>
        <ul class="services__list">
          <li><h4>First</h4><p><?php the_field('services_1'); ?></p></li>
          <li><h4>Second</h4><p><?php the_field('services_2'); ?></p></li>
          <li><h4>Third</h4><p><?php the_field('services_3'); ?></p></li>
        </ul>
      </section>

      <section id="about" class="chapter" data-color="#d5dddf">
        <h2 class="chapter__heading">About</h2>
        <div class="about__section">
          <ul class="list">           
            <li>
              <span class="list__num">1</span>
              <p>Hi, I'm Colleen. I'm a <i>(sometimes fiery)</i> redhead. When I was little, people thought I was the baby from Willow <i>(you know, that Val Kilmer movie.)</i></p>
<!--               <?php get_template_part( 'assets/images/Colleen.jpg' );
                      ?> -->
              <figure class="colleen-image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Colleen.jpg" alt="Colleen Portrait"/></figure>
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
              <p>I have three cats named Picasso, Catsley Shacklebolt, and Purrmione Grainger.</p>
              <?php get_template_part( 'assets/images/cat.svg' );
                      ?>
            </li>
            <li>
              <span class="list__num">5</span>
              <p>I worked as an Environmental Engineer for 7 years.</p>
              <?php get_template_part( 'assets/images/beaker.svg' );
                      ?>
            </li>
          </ul>

        </div>
      </section>

      <section id="contact" class="chapter" data-color="#fae8da">
        <h2 class="chapter__heading">Contact</h2>
        <?php get_template_part( 'assets/images/ferns.svg' );
                    ?>
        <div class="banner"><?php the_field('contact_banner'); ?></div>
        <?php echo do_shortcode( '[contact-form-7 id="74" title="Contact form 1"]' ); ?>
      </section>

    <?php endwhile; // end of the loop. ?>

</main>

<?php get_footer(); ?>