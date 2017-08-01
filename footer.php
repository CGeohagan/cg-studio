<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package cg_studio
 */
?>

<footer id="footer" role="contentinfo" class="footer">
	<div class="copyright">
        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>	        
  </div>
    <div class="social-footer">
  	<a href="https://www.instagram.com/colleengeohagan/?hl=en" target="_blank">
      <?php get_template_part( 'assets/images/instagram.svg' ); ?>
    </a>
    <a href="https://www.pinterest.com/colleenb/" target="_blank">
      <?php get_template_part( 'assets/images/pinterest.svg' ); ?>
    </a>
    <a href="mailto:hello@cgstudio.co" target="_blank">
      <?php get_template_part( 'assets/images/mail.svg' ); ?>
    </a>
  </div>
  <p>made with &#9829; by<a href="https://cgstudio.co" target="_blank" rel="nofollow"> CG Studio</a></p>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>