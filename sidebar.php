<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package AlbinoMouse
 */
?>

	<div id="secondary" class="widget-area hidden-print <?php echo albinomouse_get_sidebar_class(); ?>" role="complementary">

		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php _e( 'Archives', 'albinomouse' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Meta', 'albinomouse' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
