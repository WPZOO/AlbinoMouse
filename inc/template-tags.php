<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package AlbinoMouse
 */

if ( ! function_exists( 'albinomouse_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function albinomouse_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?> hidden-print">
		<h1 class="sr-only"><?php _e( 'Post navigation', 'albinomouse' ); ?></h1>
		<ul class="pager">

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<li class="previous-post">%link</li>', '&larr;' . _x( '', 'Previous post link', 'albinomouse' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="next-post">%link</li>', '%title &rarr;' . _x( '', 'Next post link', 'albinomouse' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<li class="older-posts"><?php next_posts_link( '&larr;&nbsp;' . __( 'Older posts', 'albinomouse' )); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<li class="newer-posts"><?php previous_posts_link( __( 'Newer posts', 'albinomouse') . '&nbsp;&rarr;</span>' ); ?></li>
		<?php endif; ?>

	<?php endif; ?>
	
		</ul>
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // albinomouse_content_nav

if ( ! function_exists( 'albinomouse_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function albinomouse_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'albinomouse' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'albinomouse' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body clearfix">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'albinomouse' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'albinomouse' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'albinomouse' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'albinomouse' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply pull-right"><small>',
					'after'     => '</small></div>',
				) ) );
			?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for albinomouse_comment()

if ( ! function_exists( 'albinomouse_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function albinomouse_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'albinomouse_attachment_size', array( 1140, 1140 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'albinomouse_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function albinomouse_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$archive_year  = get_the_time('Y'); 
	$archive_month = get_the_time('m'); 
	$archive_day   = get_the_time('d');
	
	printf( _x( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', '1: date, 2: time', 'albinomouse' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
 			esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function albinomouse_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so albinomouse_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so albinomouse_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in albinomouse_categorized_blog
 */
function albinomouse_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'albinomouse_category_transient_flusher' );
add_action( 'save_post',     'albinomouse_category_transient_flusher' );


/**
 * Add Breadcrumb Navigation
 */
function albinomouse_breadcrumb() {
	global $post;
	$pid = $post->ID;
	$trail = '<a href="'.home_url().'">'. __('Home', 'albinomouse') .'</a>';
 
	if (is_page()) {
		$bcarray = array();
		$pdata = get_post($pid);
		$bcarray[] = '<span class="crumbsep">&raquo;</span>'.$pdata->post_title."\n";
	while ($pdata->post_parent) {
		$pdata = get_post($pdata->post_parent);
		$bcarray[] = '<span class="crumbsep">&raquo;</span><a href="'.get_permalink($pdata->ID).'">'.$pdata->post_title.'</a>';
	}
	$bcarray = array_reverse($bcarray);
		foreach ($bcarray AS $listitem) {
			$trail .= $listitem;
		}
	}
	$trail.="";
	return $trail;
}
?>
