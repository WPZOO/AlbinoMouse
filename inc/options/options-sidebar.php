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
				<h3><?php _e('AlbinoMouse Links', 'albinomouse') ?></h3>
					<div class="inside">

						<ul class="icons-ul">
							<li>
								<span class="icon-info"></span> 
								<a href="http://www.pixelstrol.ch/en/wp-themes/albinomouse/albinomouse-documentation/"><?php _e( 'Documentation', 'albinomouse' ); ?></a>
							</li>

							<li>
								<span class="icon-info"></span> 
								<a href="https://wordpress.org/support/theme/albinomouse/"><?php _e( 'Forum on wordpress.org', 'albinomouse' ); ?></a>
							</li>

							<li>
								<span class="icon-bug"></span> 
								<a href="https://github.com/pixelstrolch/AlbinoMouse/issues"><?php _e( 'Report a bug on Github', 'albinomouse' ); ?></a>
							</li>
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
