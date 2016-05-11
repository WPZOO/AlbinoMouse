<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package AlbinoMouse
 */

$layout    = get_theme_mod( 'footer-layout', '3col' );
$love      = get_theme_mod( 'love', '1' );
$copyright = get_theme_mod( 'copyright', '' );
?>

	</div><!-- .row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer hidden-print" role="contentinfo">
		<div class="container">

			<div id="footer-widgets" class="row">

				<?php if ( is_active_sidebar( 'footer-1' ) && $layout == '1col' ) : ?>
					<div id="footer1" class="col-md-12">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php elseif ( is_active_sidebar( 'footer-1' ) && $layout == '2col' ) : ?>
					<div id="footer1" class="col-md-6">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php elseif ( is_active_sidebar( 'footer-1' ) && ! isset( $layout ) || $layout == '3col' ) : ?>
					<div id="footer1" class="col-md-4">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php elseif ( is_active_sidebar( 'footer-1' ) && $layout == '4col' ) : ?>
					<div id="footer1" class="col-md-3">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-2' ) && $layout == '2col' ) : ?>
					<div id="footer2" class="col-md-6">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php elseif ( is_active_sidebar( 'footer-2' ) && ! isset( $layout ) || $layout == '3col' ) : ?>
					<div id="footer2" class="col-md-4">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php elseif ( is_active_sidebar( 'footer-2' ) && $layout == '4col' ) : ?>
					<div id="footer2" class="col-md-3">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-3' ) && ! isset( $layout ) || $layout == '3col' ) : ?>
					<div id="footer3" class="col-md-4">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php elseif (is_active_sidebar( 'footer-3' ) && $layout == '4col') : ?>
					<div id="footer3" class="col-md-3">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-4' ) && $layout == '4col' ) : ?>
					<div id="footer4" class="col-md-3">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				<?php endif; ?>

			</div><!-- #footer-widgets -->

			<div class="site-info">
				<?php do_action( 'albinomouse_credits' ); ?>

				<?php if( ! isset( $love ) || $love == '1' ) : ?>
					<a href="<?php _e( 'https://wordpress.org/themes/albinomouse', 'albinomouse' ); ?>"><?php _e( 'AlbinoMouse WordPress Theme', 'albinomouse' ); ?></a>,
				<?php endif ?>

				<?php if( ! isset( $copyright ) || $copyright == '' ) {
						printf( _x( '&#169; Copyright %1$s %2$s', '1: year 2: Site name', 'albinomouse' ), date( 'Y' ), get_bloginfo( 'name' ) );
					} else {
						echo $copyright;
					} ?>

			</div><!-- .site-info -->

		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
