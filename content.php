<?php
/**
 * @package AlbinoMouse
 */

$postthumb     = get_theme_mod( 'thumbnail-size' );
$contentoutput = get_theme_mod( 'content-excerpt' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
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
		<?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<small>
				<?php albinomouse_posted_on(); ?>
			</small>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( has_post_thumbnail() && $postthumb == 'banner' ) : ?>
			<div class="post-thumbnail-banner">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'albinomouse' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php echo get_the_post_thumbnail($post->ID, 'post-thumbnail-banner'); ?>
				</a>
			</div><!-- .post-thumbnail-banner -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<?php if ( $contentoutput == 'excerpt' ) : ?>
	<div class="entry-summary clearfix">

		<?php if ( has_post_thumbnail() && $postthumb == 'thumbnail' ) : ?>
			<p class="post-thumbnail-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'albinomouse' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
				</a>
			</p><!-- .post-thumbnail-thumbnail -->
		<?php endif; ?>

		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php endif; ?>


	<?php if ( $contentoutput == 'content') : ?>
	<div class="entry-content clearfix">

		<?php if ( has_post_thumbnail() && $postthumb == 'thumbnail' ) : ?>
			<p class="post-thumbnail-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'albinomouse' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
				</a>
			</p><!-- .post-thumbnail-thumbnail -->
		<?php endif; ?>

		<?php the_content( '<span class="glyphicon glyphicon-arrow-right"></span>&nbsp;' . __( 'Continue reading', 'albinomouse' ) ); ?>
		<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'albinomouse' ),
				'after'  => '</div>')); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>


	<footer class="entry-meta">
		<small>
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( ', ' );
					if ( $categories_list && albinomouse_categorized_blog() ) :
				?>
				<span class="cat-links">
					<?php printf( _x( 'Posted in %1$s', 'category list', 'albinomouse' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ) :
				?>
				<span class="sep"> | </span>
				<span class="tags-links">
					<?php printf( _x( 'Tagged %1$s', 'tag list', 'albinomouse' ), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>

				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="sep"> | </span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'albinomouse' ), __( '1 Comment', 'albinomouse' ), __( '% Comments', 'albinomouse' ) ); ?></span>
				<?php endif; // End if ! post_password_required ... ?>

			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( 'page' == get_post_type() ) : // Only for pages ?>
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'albinomouse' ), __( '1 Comment', 'albinomouse' ), __( '% Comments', 'albinomouse' ) ); ?></span>
				<?php endif; // End if ! post_password_required ... ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php edit_post_link( __( 'Edit', 'albinomouse' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</small>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
