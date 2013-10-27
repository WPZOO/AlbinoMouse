<?php
/**
 * @package AlbinoMouse
 */
 $options = get_option( 'albinomouse' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
		<?php if ( is_sticky() ) : ?>
			<span class="glyphicon glyphicon-fire hidden-xs"></span>
		<?php elseif ( has_post_format('aside')) : ?>
			<span class="glyphicon glyphicon-bullhorn hidden-xs"></span>
		<?php elseif ( has_post_format('chat')) : ?>
			<span class="glyphicon glyphicon-list hidden-xs"></span>
		<?php elseif ( has_post_format('gallery')) : ?>
			<span class="glyphicon glyphicon-picture hidden-xs"></span>
		<?php elseif ( has_post_format('link')) : ?>
			<span class="glyphicon glyphicon-link hidden-xs"></span>
		<?php elseif ( has_post_format('image')) : ?>
			<span class="glyphicon glyphicon-camera hidden-xs"></span>
		<?php elseif ( has_post_format('quote')) : ?>
			<span class="glyphicon glyphicon-comment hidden-xs"></span>
		<?php elseif ( has_post_format('status')) : ?>
			<span class="glyphicon glyphicon-exclamation-sign hidden-xs"></span>
		<?php elseif ( has_post_format('video')) : ?>
			<span class="glyphicon glyphicon-film hidden-xs"></span>
		<?php elseif ( has_post_format('audio')) : ?>
			<span class="glyphicon glyphicon-music hidden-xs"></span>
		<?php elseif ( 'post' == get_post_type() ) : ?>
			<span class="glyphicon glyphicon-file hidden-xs"></span>								
		<?php endif; ?>
		<?php the_title(); ?></h1>

		<div class="entry-meta">
			<small>
				<?php albinomouse_posted_on(); ?>
			</small>
		</div><!-- .entry-meta -->
		
		<?php if (has_post_thumbnail() && $options['thumbnail-size'] == 'banner' ) : ?>
			<div class="post-thumbnail-banner">
			<?php echo get_the_post_thumbnail($post->ID, 'post-thumbnail-banner'); ?>
			</div>
		<?php endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'albinomouse' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<small>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( ', ' );
	
				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( ', ' );
	
				if ( ! albinomouse_categorized_blog() ) {
					// This blog only has 1 category so we just need to worry about tags in the meta text
					if ( '' != $tag_list ) {
						$meta_text = _x( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', '2: tag list, 3: permalink', 'albinomouse' );
					} else {
						$meta_text = _x( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', '3: permalink', 'albinomouse' );
					}
	
				} else {
					// But this blog has loads of categories so we should probably display them here
					if ( '' != $tag_list ) {
						$meta_text = _x( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', '1: category list, 2: tag list, 3: permalink', 'albinomouse' );
					} else {
						$meta_text = _x( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', '1: category list, 3: permalink', 'albinomouse' );
					}
	
				} // end check for categories on this blog
	
				printf(
					$meta_text,
					$category_list,
					$tag_list,
					get_permalink(),
					the_title_attribute( 'echo=0' )
				);
			?>
	
			<?php edit_post_link( __( 'Edit', 'albinomouse' ), '<span class="edit-link">', '</span>' ); ?>
		</small>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
