<?php
/**
 * Template Name: No Breadcrumbs
 * @package AlbinoMouse
 */

$options = get_option( 'albinomouse' );

get_header(); ?>

<?php if(!isset($options['sidebar-layout']) or $options['sidebar-layout'] == '2c-r') : ?>
	<div id="primary" class="content-area col-md-7">
<?php elseif($options['sidebar-layout'] == '2c-rs') : ?>
	<div id="primary" class="content-area col-md-8">
<?php elseif($options['sidebar-layout'] == '2c-l') : ?>
	<div id="primary" class="content-area col-md-7 col-md-offset-1 pull-right">
<?php elseif($options['sidebar-layout'] == '2c-ls') : ?>
	<div id="primary" class="content-area col-md-8 col-md-offset-1 pull-right">
<?php else : ?>
	<div id="primary" class="content-area col-md-12">
<?php endif; ?>

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if($options['sidebar-layout'] != '1col') :
	get_sidebar(); 
endif; ?>

<?php get_footer(); ?>
