<?php
/**
 * AlbinoMouse functions and definitions
 *
 * @package AlbinoMouse
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( 'albinomouse_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function albinomouse_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on AlbinoMouse, use a find and replace
	 * to change 'albinomouse' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'albinomouse', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post-thumbnail-banner', 750, 300, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'albinomouse' ),
		'secondary' => __( 'Secondary Menu', 'albinomouse' )
	) );

		// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'penguin_custom_background_args', array(
		'default-color' => '#ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'chat', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'
	) );

}
endif; // albinomouse_setup
add_action( 'after_setup_theme', 'albinomouse_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function albinomouse_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'albinomouse' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'albinomouse' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'albinomouse' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'albinomouse' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'albinomouse' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'albinomouse_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function albinomouse_scripts() {

	$bootstrap = get_theme_mod( 'smbootstrap' );

	if ( $bootstrap != '1' ) :
		wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/style-bootstrap.css' );
		wp_enqueue_script( 'albinomouse-scripts', get_template_directory_uri() . '/scripts.min.js', array('jquery'), '', true );
	else :
		wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/style-bootstrap-reduced.css' );
		wp_enqueue_script( 'albinomouse-scripts', get_template_directory_uri() . '/scripts-reduced.min.js', array('jquery'), '', true );
	endif;

	wp_enqueue_style( 'albinomouse-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Font options
	$fonts = array(
		get_theme_mod( 'primary-font', customizer_library_get_default( 'primary-font' ) ),
		get_theme_mod( 'secondary-font', customizer_library_get_default( 'secondary-font' ) )
	);
	$font_uri = customizer_library_get_google_font_uri( $fonts );
	// Load Google Fonts
	wp_enqueue_style( 'albinomouse_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'albinomouse_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom functions for the layout
 */
require get_template_directory() . '/inc/layout.php';

/**
 * Register Custom Navigation Walker
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Custom Header
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Customizer additions
 */
require get_template_directory() . '/inc/customizer-library/customizer-library.php';
require get_template_directory() . '/inc/customizer-options.php';
require get_template_directory() . '/inc/customizer-styles.php';

/**
 * Custom font list
 */
require get_template_directory() . '/inc/fonts.php';


/**
 * Changing the [...] string in the excerpt
 */
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Read more link on all excerpts
 */
function excerpt_read_more_link($output) {
	global $post;
	return $output . '<p><a href="'. get_permalink($post->ID) . '"><span class="glyphicon glyphicon-arrow-right"></span>&nbsp;' . __( "Continue reading", "albinomouse" ) . '</a></p>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');