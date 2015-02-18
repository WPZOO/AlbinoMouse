<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package AlbinoMouse
 */
?>

	</div><!-- .row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer hidden-print" role="contentinfo">
		<div class="container">

			<?php 
				$options = get_option( 'albinomouse' ); // Load theme options
				$layout  = $options['footer-layout']
			?>
			<div id="footer-widgets" class="row">

				<?php if (is_active_sidebar( 'footer-1' )     && $layout == '1col') : ?>
					<div id="footer1" class="col-md-12">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-1' ) && $layout == '2col') : ?>
					<div id="footer1" class="col-md-6">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-1' ) && $layout == '3col') : ?>
					<div id="footer1" class="col-md-4">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-1' ) && $layout == '4col') : ?>
					<div id="footer1" class="col-md-3">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php endif; ?>

				<?php if (is_active_sidebar( 'footer-2' )     && $layout == '1col') : ?>
					<div id="footer2" class="col-md-12">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-2' ) && $layout == '2col') : ?>
					<div id="footer2" class="col-md-6">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-2' ) && $layout == '3col') : ?>
					<div id="footer2" class="col-md-4">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-2' ) && $layout == '4col') : ?>
					<div id="footer2" class="col-md-3">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php endif; ?>

				<?php if (is_active_sidebar( 'footer-3' )     && $layout == '1col') : ?>
					<div id="footer3" class="col-md-12">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-3' ) && $layout == '2col') : ?>
					<div id="footer3" class="col-md-6">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-3' ) && $layout == '3col') : ?>
					<div id="footer3" class="col-md-4">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-3' ) && $layout == '4col') : ?>
					<div id="footer3" class="col-md-3">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php endif; ?>

				<?php if (is_active_sidebar( 'footer-4' )     && $layout == '1col') : ?>
					<div id="footer4" class="col-md-12">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-4' ) && $layout == '2col') : ?>
					<div id="footer4" class="col-md-6">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-4' ) && $layout == '3col') : ?>
					<div id="footer4" class="col-md-4">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-4' ) && $layout == '4col') : ?>
					<div id="footer4" class="col-md-3">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				<?php endif; ?>

			</div><!-- #footer-widgets -->

			<div class="site-info">
				<?php do_action( 'albinomouse_credits' ); ?>
				
				<?php if(!isset($options['show-love']) or $options['show-love'] == '1' ) : ?>

					<a href="http://wordpress.org/themes/albinomouse">AlbinoMouse WordPress Theme</a>, 

				<?php endif ?>	

				<?php if(!isset($options['copyright-text']) or $options['copyright-text'] == '' ) { ?>
						&#169; Copyright <?php echo date("Y"); ?> <?php echo(bloginfo( 'name' ));
					} else {
						echo $options['copyright-text']; 
					} ?>

			</div><!-- .site-info -->
			
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>