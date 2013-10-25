<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package AlbinoMouse
 */

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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php printf( __( 'Search Results for: %s', 'albinomouse' ), '<span>' . get_search_query() . '</span>' ); ?>
				</h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php albinomouse_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'search' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if($options['sidebar-layout'] != '1col') :
	get_sidebar(); 
endif; ?>

<?php get_footer(); ?>