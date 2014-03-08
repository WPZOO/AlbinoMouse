<?php
/**
 * The template used for displaying page content in page.php
 * @package AlbinoMouse
 */
 $options = get_option( 'albinomouse' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if (has_post_thumbnail() && $options['thumbnail-size'] == 'banner' ) : ?>
			<div class="post-thumbnail-banner">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'albinomouse' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php echo get_the_post_thumbnail($post->ID, 'post-thumbnail-banner'); ?>
				</a>
			</div><!-- .post-thumbnail-banner -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php if (has_post_thumbnail() && $options['thumbnail-size'] == 'thumbnail' ) : ?>
			<p class="post-thumbnail-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'albinomouse' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
				</a>
			</p><!-- .post-thumbnail-thumbnail -->
		<?php endif; ?>
		
		<?php the_content(); ?>
		<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'albinomouse' ),
				'after'  => '</div>',
			)); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'albinomouse' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
