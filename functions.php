<?php
/**
 * AlbinoMouse functions and definitions
 * @package AlbinoMouse
 */
 
/**
 * Load theme options.
 */
$options = get_option( 'albinomouse' );

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
	 * Custom Theme Options
	 */
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options/' );
		require_once dirname( __FILE__ ) . '/inc/options/options-framework.php';
	}

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'albinomouse' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ) );

}
endif; // albinomouse_setup
add_action( 'after_setup_theme', 'albinomouse_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function albinomouse_widgets_init() {
	global $options;
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'albinomouse' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	if ($options['footer-layout']) {
		register_sidebar( array(
			'name' => __( 'Footer 1', 'albinomouse' ),
			'id' => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}	
	if ($options['footer-layout'] == '2col' || $options['footer-layout'] == '3col' || $options['footer-layout'] == '4col') {
		register_sidebar( array(
			'name' => __( 'Footer 2', 'albinomouse' ),
			'id' => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	if ($options['footer-layout'] == '3col' || $options['footer-layout'] == '4col') {
		register_sidebar( array(
			'name' => __( 'Footer 3', 'albinomouse' ),
			'id' => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	if ($options['footer-layout'] == '4col') {
		register_sidebar( array(
			'name' => __( 'Footer 4', 'albinomouse' ),
			'id' => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'albinomouse_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function albinomouse_scripts() {
	
	wp_enqueue_style( 'albinomouse-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'albinomouse-scripts', get_template_directory_uri() . '/scripts.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'albinomouse_scripts' );

/**
 * Overwrite Jetpacks social sharing buttons
 */
if(!isset($options['flat-social-btn']) or $options['flat-social-btn'] == '1') {
	function overwrite_jetpack_social_buttons(){ 
			wp_deregister_style('sharedaddy');
			wp_enqueue_style( 'flat-social-buttons', get_template_directory_uri() . '/inc/flat-social-buttons/flat-social-buttons.css' );
	}
	add_action('wp_print_styles', 'overwrite_jetpack_social_buttons');	
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Register Custom Navigation Walker
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


/**
 * Enqueue stylesheet for Google web fonts
 * This function is attached to the wp_head action hook.
 */
function albinomouse_google_web_fonts() {
global $options;

	if ($options['title_font'] == 'Anton') {
		wp_enqueue_style( 'Anton', 'http://fonts.googleapis.com/css?family=Anton' );
	}
	if ($options['title_font'] == 'Bitter') {
		wp_enqueue_style( 'Bitter', 'http://fonts.googleapis.com/css?family=Bitter' );
	}
	if ($options['title_font'] == 'Droid Sans' || $options['general_font'] == 'Droid Sans') {
		wp_enqueue_style( 'DroidSans', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700' );
	}
	if ($options['title_font'] == 'Droid Serif' || $options['general_font'] == 'Droid Serif') {
		wp_enqueue_style( 'DroidSerif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' );
	}
	if ($options['title_font'] == 'Open Sans' || $options['general_font'] == 'Open Sans') {
		wp_enqueue_style( 'OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' );
	}
	if ($options['title_font'] == 'Source Sans Pro' || $options['general_font'] == 'Source Sans Pro') {
		wp_enqueue_style( 'SourceSansPro', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic' );
	}	
	if ($options['title_font'] == 'Ubuntu' || $options['general_font'] == 'Ubuntu') {
		wp_enqueue_style( 'Ubuntu', 'http://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic' );
	}
	if ($options['title_font'] == 'Yanone Kaffeesatz') {
		wp_enqueue_style( 'YanoneKaffeesatz', 'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' );
	}			
}
add_action( 'wp_enqueue_scripts', 'albinomouse_google_web_fonts' );


/**
 * Add a style block with some configurations of the theme options.
 * This function is attached to the wp_head action hook.
 */
 
$originalColor = $options['link_footer_color'];  
$d5 = -5; 
$d8 = -8; 
$d10 = -10; 
$d12 = -12;
$d15 = -15;
$l40 = 40;

function colorCreator($color, $per) {  

    $color = substr( $color, 1 ); // Removes first character of hex string (#) 
    $rgb = ''; // Empty variable 
    $per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control color temperature
     
    if  ($per < 0 ) // Check to see if the percentage is a negative number 
    { 
        // DARKER 
        $per =  abs($per); // Turns Neg Number to Pos Number 
        for ($x=0;$x<3;$x++) 
        { 
            $c = hexdec(substr($color,(2*$x),2)) - $per; 
            $c = ($c < 0) ? 0 : dechex($c); 
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
        }   
    }  
    else 
    { 
        // LIGHTER         
        for ($x=0;$x<3;$x++) 
        {             
            $c = hexdec(substr($color,(2*$x),2)) + $per; 
            $c = ($c > 255) ? 'ff' : dechex($c); 
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
        }    
    } 
    return '#'.$rgb; 
}

$color_b40 = colorCreator($originalColor, $l40);
$color_d5 = colorCreator($originalColor, $d5);
$color_d8 = colorCreator($originalColor, $d8);
$color_d10 = colorCreator($originalColor, $d10);
$color_d12 = colorCreator($originalColor, $d12);
$color_d15 = colorCreator($originalColor, $d15);

function albinomouse_add_custom_styles() {
	global $options;
	global $originalColor;  
	global $color_b40;
	global $color_d5;
	global $color_d8;
	global $color_d10;
	global $color_d12;
	global $color_d15; ?>
	
	<style type="text/css">

	#colophon,
	.dropdown-menu > .active > a,
	.dropdown-menu > .active > a:hover,
	.dropdown-menu > .active > a:focus,
	.nav-pills > li.active > a,
	.nav-pills > li.active > a:hover,
	.nav-pills > li.active > a:focus,
	.navbar-default .navbar-nav > .active > a,
	.navbar-default .navbar-nav > .active > a:hover,
	.navbar-default .navbar-nav > .active > a:focus,
	.navbar-default .navbar-toggle .icon-bar,
	.navbar-default .navbar-nav > .open > a,
	.navbar-default .navbar-nav > .open > a:hover,
	.navbar-default .navbar-nav > .open > a:focus,
	.navbar-default .navbar-nav .open .dropdown-menu > .active > a,
	.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
	.navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus,
	.label-primary,
	.progress-bar {
		background-color: <?php echo $originalColor ?>;
	}
		
	.list-group-item.active,
	.list-group-item.active:hover,
	.list-group-item.active:focus,
	.panel-primary > .panel-heading {
		background-color: <?php echo $originalColor ?>;
		border-color: <?php echo $originalColor ?>;		
	}
		
	.pagination > .active > a,
	.pagination > .active > span,
	.pagination > .active > a:hover,
	.pagination > .active > span:hover,
	.pagination > .active > a:focus,
	.pagination > .active > span:focus {
		background-color: <?php echo $originalColor ?>;
		color: <?php echo $originalColor ?>;
	}

	.nav .open > a,
	.nav .open > a:hover,
	.nav .open > a:focus,
	.navbar-default .navbar-toggle,
	a.thumbnail:hover,
	a.thumbnail:focus,
	.panel-primary,
	.format-link .entry-content p:first-child {
		border-color: <?php echo $originalColor ?>;
	}

	.panel-primary > .panel-heading + .panel-collapse .panel-body {
		border-top-color: <?php echo $originalColor ?>;
	}
	
	.panel-primary > .panel-footer + .panel-collapse .panel-body {
		border-bottom-color: <?php echo $originalColor ?>;
	}
	
	.nav .caret {
		border-top-color: <?php echo $originalColor ?>;
		border-bottom-color: <?php echo $originalColor ?>;
	}
			
	a,
	.text-primary,
	.btn-link,
	.navbar-default .navbar-brand,
	a.list-group-item.active > .badge,
	.nav-pills > .active > a > .badge {
		color: <?php echo $originalColor ?>;
	}	
	
	.btn-primary,
	.btn-primary.disabled,
	.btn-primary[disabled],
	fieldset[disabled] .btn-primary,
	.btn-primary.disabled:hover,
	.btn-primary[disabled]:hover,
	fieldset[disabled] .btn-primary:hover,
	.btn-primary.disabled:focus,
	.btn-primary[disabled]:focus,
	fieldset[disabled] .btn-primary:focus,
	.btn-primary.disabled:active,
	.btn-primary[disabled]:active,
	fieldset[disabled] .btn-primary:active,
	.btn-primary.disabled.active,
	.btn-primary[disabled].active,
	fieldset[disabled] .btn-primary.active {
		background-color: <?php echo $originalColor ?>;
		border-color: <?php echo $color_d5 ?>;
	}
			
	a:hover,
	a:focus,
	.btn-link:hover,
	.btn-link:focus,
	.nav .open > a .caret,
	.nav .open > a:hover .caret,
	.nav .open > a:focus .caret {
		color: <?php echo $color_d15 ?>;
	}
	
	.text-primary:hover,
	.navbar-default .navbar-brand:hover,
	.navbar-default .navbar-brand:focus {
		color: <?php echo $color_d10 ?>;
	}
	
	.label-primary[href]:hover,
	.label-primary[href]:focus {
		background-color: <?php echo $color_d10?> ;
	}
	
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-primary:active,
	.btn-primary.active,
	.open .dropdown-toggle.btn-primary {
		background-color: <?php echo $color_d8 ?>;
		border-color: <?php echo $color_d12 ?>;
	}
		
	.list-group-item.active .list-group-item-text,
	.list-group-item.active:hover .list-group-item-text,
	.list-group-item.active:focus .list-group-item-text {
		color: <?php echo $color_b40 ?>;
	}
	
	/*--- General Background ---*/
	<?php if ($options['general-background']['color'] !='') : ?>
	body { 
		background-color: <?php echo $options['general-background']['color'] ?>;
	}
	<?php endif;
	if ($options['general-background']['image'] != '') : ?>
	body { 
		background-attachment: <?php echo $options['general-background']['attachment'] ?>;
		background-image: url(<?php echo $options['general-background']['image'] ?>);
		background-position: <?php echo $options['general-background']['position'] ?>;
		background-repeat: <?php echo $options['general-background']['repeat'] ?>;
	}
	<?php endif; ?>
		
	/*--- Typography ---*/
	<?php if ($options['title_font'] == 'Anton') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Anton', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Bitter') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Bitter', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Droid Sans') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Droid Sans', sans-serif; } <?php
	}
	if ($options['general_font'] == 'Droid Sans') { ?>
	body, button, input, select, textarea {	font-family: 'Droid Sans', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Droid Serif') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Droid Serif', sans-serif; } <?php
	}
	if ($options['general_font'] == 'Droid Serif') { ?>
	body, button, input, select, textarea {	font-family: 'Droid Serif', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Open Sans') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Open Sans', sans-serif; } <?php
	}
	if ($options['general_font'] == 'Open Sans') { ?>
	body, button, input, select, textarea {	font-family: 'Open Sans', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Source Sans Pro') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Source Sans Pro', sans-serif; } <?php
	}
	if ($options['general_font'] == 'Source Sans Pro') { ?>
	body, button, input, select, textarea {	font-family: 'Source Sans Pro', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Ubuntu') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Ubuntu', sans-serif; <?php
	}
	if ($options['general_font'] == 'Ubuntu') { ?>
	body, button, input, select, textarea {	font-family: 'Ubuntu', sans-serif; } <?php
	}
	if ($options['title_font'] == 'Yanone Kaffeesatz') { ?>
	h1, h2, h3, h4, h5, h6 { font-family: 'Yanone Kaffeesatz', sans-serif; } <?php
	} ?>
	
	</style>
<?php
}
add_action( 'wp_head', 'albinomouse_add_custom_styles' );


/**
 * Add a layout class to the array of body classes.
 * This function is attached to the wp_head filter hook.
 */

function albinomouse_body_class_footer( $existing_classes ) {
	global $options;
	$footer = $options['footer-layout'];
	
	if ($footer == '1col') { 
		$body_class = array( 'footer-one' );
	}
	elseif ($footer == '2col') {
		$body_class = array( 'footer-two' );
	} 
	elseif ($footer == '3col') {
		$body_class = array( 'footer-three' );
	}	
	else {
		$body_class = array( 'footer-four' );
	}
		
	$body_class = apply_filters( 'albinomouse_layout_classes', $body_class, $footer );

	return array_merge( $existing_classes, $body_class );
}
add_filter( 'body_class', 'albinomouse_body_class_footer' );


/** 
 * Customize read more link
 */
function excerpt_readmore($more) {
	global $post;
        return '... <p><a class="more-link" href="'. get_permalink($post->ID) . '"><span class="glyphicon glyphicon-arrow-right"></span>&nbsp;' . __( "Continue reading", "albinomouse" ) . '</a></p>';
}
add_filter('excerpt_more', 'excerpt_readmore');


/**
 * Display a notice that can be dismissed 
 */
add_action('admin_notices', 'albinomouse_200_admin_notice');
function albinomouse_200_admin_notice() {
	global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'albinomouse_200_ignore_notice') ) {
        echo '<div class="updated"><p>';
        printf(__('Please check your posts for shortcodes which were available in older versions of the theme AlbinoMouse. The theme guidelines do not allow shortcodes in themes anymore. <a href="%1$s">Hide Notice</a>', 'albinomouse'), '?albinomouse_200_nag_ignore=0');
        echo "</p></div>";
	}
}
add_action('admin_init', 'albinomouse_200_nag_ignore');
function albinomouse_200_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['albinomouse_200_nag_ignore']) && '0' == $_GET['albinomouse_200_nag_ignore'] ) {
             add_user_meta($user_id, 'albinomouse_200_ignore_notice', 'true', true);
	}
}
?>