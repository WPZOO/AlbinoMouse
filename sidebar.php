<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package AlbinoMouse
 */
?>
<?php $options = get_option( 'albinomouse' ); ?>

<?php if(!isset($options['sidebar-layout']) or $options['sidebar-layout'] == '2c-r') : ?>
	<div id="secondary" class="widget-area hidden-print col-md-4 col-md-offset-1" role="complementary">
<?php elseif($options['sidebar-layout'] == '2c-rs') : ?>
	<div id="secondary" class="widget-area hidden-print col-md-3 col-md-offset-1" role="complementary">
<?php elseif($options['sidebar-layout'] == '2c-l') : ?>
	<div id="secondary" class="widget-area hidden-print col-md-4 pull-left" role="complementary">
<?php elseif($options['sidebar-layout'] == '2c-ls') : ?>
	<div id="secondary" class="widget-area hidden-print col-md-3 pull-left" role="complementary">
<?php endif; ?>

		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'albinomouse' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php _e( 'Meta', 'albinomouse' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
