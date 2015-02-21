<?php
/* 
 * This function adds the html that will appear in the sidebar module of the
 * options panel.  Feel free to alter this how you see fit.
 */

add_action( 'optionsframework_after','optionscheck_display_sidebar' );

function optionscheck_display_sidebar() { ?>
	<div id="optionsframework-sidebar">
		<div class="metabox-holder">
			<div class="postbox">
				<div class="inside">
					<a href="http://wpzoo.ch/en/"><?php echo '<img src="' . get_stylesheet_directory_uri() . '/inc/options/images/logo-wpzoo.jpg" width="150px">';?></a>
					<ul class="icons-ul">
						<li><a href="http://www.pixelstrol.ch/en/wp-themes/albinomouse/albinomouse-documentation/"><?php _e( 'Documentation', 'albinomouse' ); ?></a></li>
						<li><a href="https://wordpress.org/support/theme/albinomouse/"><?php _e( 'Forum on wordpress.org', 'albinomouse' ); ?></a></li>
						<li><a href="https://github.com/pixelstrolch/AlbinoMouse/issues"><?php _e( 'Report a bug on Github', 'albinomouse' ); ?></a></li>
					</ul>
					<ul class="icons-ul">
						<li><a href="https://wordpress.org/support/view/theme-reviews/albinomouse"><?php _e( 'Please rate AlbinoMouse on wordpress.org.', 'albinomouse' ); ?></a></li>
					</ul>
				</div><!-- .inside -->
			</div><!-- .postbox -->
		</div><!-- .metabox-holder -->
	</div><!-- #optionsframework-sidebar -->
<?php }

/*
 * This function loads an additional CSS file for the options panel
 * which allows us to style the sidebar
 */

if ( is_admin() ) {
		$of_page= 'appearance_page_options-framework';
		add_action( "admin_print_styles-$of_page", 'optionsframework_custom_css', 100);
}

function optionsframework_custom_css () {
	wp_enqueue_style(
		'optionsframework-custom-css',
		get_stylesheet_directory_uri() .'/options-custom.css'
	);
}
