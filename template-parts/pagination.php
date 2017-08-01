<?php 
/**
 * Archive pagination
 *
 * @package cg_studio
 */
?>
<nav class="nav-below">

	<?php if( get_previous_post_link()) : ?>
		<div class="nav-previous"><?php previous_post_link( __( '%link','Previous Project' ) ); ?></div>
	<?php endif; ?>

	<?php if( get_next_post_link()) : ?>
		<div class="nav-next"><?php next_post_link( __( '%link','Next Project' ) ); ?></div>
	<?php endif; ?>

</nav><!-- #nav-above -->