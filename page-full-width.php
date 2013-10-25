<?php
/**
 * Template Name: Full Width
 * @package AlbinoMouse
 */

$options = get_option( 'albinomouse' );

get_header(); ?>

	<div id="primary" class="content-area col-md-12">

		<main id="main" class="site-main" role="main">
		
			<div id="breadcrumbs">
				<?php echo albinomouse_breadcrumb(); ?>
			</div>
			
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

<?php get_footer(); ?>
