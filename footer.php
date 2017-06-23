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
  <p>made with &#9829; by<a href="http://cgeohagan.github.io" target="_blank" rel="nofollow"> Colleen Geohagan</a></p>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>