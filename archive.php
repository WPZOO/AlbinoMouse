<?php
/**
 * The template for displaying Archive pages.
 * @package AlbinoMouse
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo albinomouse_get_content_class(); ?>">

		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							printf( _x( 'Posts in category %s', 'category', 'albinomouse' ), '<span class="archived">' . single_cat_title( '', false ) . '</span>' );

						elseif ( is_tag() ) :
							printf( _x( 'Posts tagged with %s', 'tag', 'albinomouse' ), '<span class="archived">' . single_tag_title( '', false ) . '</span>' );

						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Posts written by %s', 'albinomouse' ), '<span class="archived">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Posts published on %s', 'albinomouse' ), '<span class="archived">' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Posts published in %s', 'albinomouse' ), '<span class="archived">' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Posts published in %s', 'albinomouse' ), '<span class="archived">' . get_the_date( 'Y' ) . '</span>' );

						else :
							_e( 'Archives', 'albinomouse' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php albinomouse_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
$options = get_option( 'albinomouse' );
if($options['sidebar-layout'] != '1col') :
	get_sidebar();
endif; ?>

<?php get_footer(); ?>
