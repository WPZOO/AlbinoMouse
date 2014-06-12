<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package AlbinoMouse
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo albinomouse_get_content_class(); ?>">

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

<?php
$options = get_option( 'albinomouse' );
if($options['sidebar-layout'] != '1col') :
	get_sidebar();
endif; ?>

<?php get_footer(); ?>
