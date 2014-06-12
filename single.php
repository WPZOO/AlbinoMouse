<?php
/**
 * The Template for displaying all single posts.
 *
 * @package AlbinoMouse
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo albinomouse_get_content_class(); ?>">

		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php albinomouse_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
$options = get_option( 'albinomouse' );
if($options['sidebar-layout'] != '1col') :
	get_sidebar();
endif; ?>

<?php get_footer(); ?>
