<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package AlbinoMouse
 */

$breadcrumbs = get_theme_mod( 'page-breadcrumbs', '1' );
$sidebar     = get_theme_mod( 'sidebar-layout', '2c-r' );

get_header();
?>

	<div id="primary" class="content-area <?php echo albinomouse_get_content_class(); ?>">

		<main id="main" class="site-main" role="main">

			<?php if( ! isset( $breadcrumbs ) || $breadcrumbs == '1' ) : ?>
				<div id="breadcrumbs">
					<?php echo albinomouse_breadcrumb(); ?>
				</div>
			<?php endif; ?>

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

<?php
	if( ! isset( $sidebar ) || $sidebar != '1col' ) {
		get_sidebar();
	}
?>
<?php get_footer(); ?>
