<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package AlbinoMouse
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-12">

		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="jumbotron">
					<header class="entry-header">
						<h1 class="entry-title">
							<strong><?php _e( 'Oops, error 404!', 'albinomouse' ); ?></strong><br/>
							<small><?php _e( 'That page cannot be found.', 'albinomouse' ); ?></small>
						</h1>
					</header><!-- .entry-header -->

					<div class="entry-content clearfix">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'albinomouse' ); ?></p>
						<p><?php get_search_form(); ?></p>

					</div><!-- .entry-content -->
				</div><!-- .jumbotron -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
