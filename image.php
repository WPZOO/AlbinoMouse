<?php
/**
 * The template for displaying image attachments.
 * @package AlbinoMouse
 */

get_header(); ?>

<div id="primary" class="content-area image-attachment col-md-12">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta">
					<?php 
						$metadata = wp_get_attachment_metadata();
							printf( _x( 'Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> in <a href="%3$s" rel="gallery">%4$s</a> | Full size: <a href="%5$s">%6$s pixels &times; %7$s pixels</a>', '1: date attribute, 2: date, 3: parent post link, 4: parent post title, 5: image link, 6: image width, 7: image height', 'albinomouse' ),
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								esc_url( get_permalink( $post->post_parent ) ),
								get_the_title( $post->post_parent ),
								esc_url( wp_get_attachment_url() ),
								$metadata['width'],
								$metadata['height']
							); 
					?>
				</div><!-- .entry-meta -->

				<nav role="navigation" id="image-navigation" class="image-navigation">
					<ul class="pager">
						<li class="previous"><?php previous_image_link( false, '<span class="glyphicon glyphicon-arrow-left"></span>&nbsp;' . __( 'Previous', 'albinomouse' )); ?></li>
						<li class="next"><?php next_image_link( false, __( 'Next', 'albinomouse' ) . '&nbsp;<span class="glyphicon glyphicon-arrow-right"></span>' ); ?></li>
					</ul>
				</nav><!-- #image-navigation -->

			</header><!-- .entry-header -->

			<div class="entry-content">
				<div class="entry-attachment">
						<div class="attachment">
							<?php albinomouse_the_attached_image(); ?>
						</div><!-- .attachment -->

						<?php if ( has_excerpt() ) : ?>
						<div class="entry-caption">
								<?php the_excerpt(); ?>
						</div><!-- .entry-caption -->
						<?php endif; ?>
				</div><!-- .entry-attachment -->

				<?php the_content( '<span class="glyphicon glyphicon-arrow-right"></span>&nbsp;' . __( 'Continue reading', 'albinomouse' ) ); ?>
				<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'albinomouse' ),
					'after'  => '</div>')); 
				?>

			</div><!-- .entry-content -->

			<?php edit_post_link( __( 'Edit', 'albinomouse' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
		</article><!-- #post-## -->

		<?php // If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template(); 
		?>

	<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>