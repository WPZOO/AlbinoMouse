<?php
/**
 * The Header for AlbinoMouse.
 *
 * @package AlbinoMouse
 */

$headerbg     = get_theme_mod( 'header-background', 'light-gray' );
$logo         = get_theme_mod( 'logo-upload' );
$description  = get_theme_mod( 'site-description', '1' );
$headeralign  = get_theme_mod( 'branding-alignment', 'left' );
$headersearch = get_theme_mod( 'search-box', '1' );

?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<!--[if lt IE 9]>
    <script src="<?php echo esc_url( home_url( '/' ) );?>wp-content/themes/albinomouse/html5shiv.min.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header hidden-print<?php if( ! isset( $headerbg ) || $headerbg == 'light-gray' ) { echo ' header-gray'; } ?>" role="banner">
		<div class="site-branding container hidden-xs<?php if( ! isset( $description ) || $description == '1' ) { echo ' with-site-description'; } if ( $headeralign != 'left' ) { echo ' centred'; } ?>">

			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php if ( $logo != '' ) : ?>
						<img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo('name'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<?php else : ?>
						<?php bloginfo( 'name' ); ?>
					<?php endif; ?>
				</a>
			</h1><!-- .site-title -->

			<?php

			if( ! isset( $description ) || $description == '1' ) {
				echo '<h2 class="site-description">';
				bloginfo( 'description' );
				echo '</h2>';
			}

			if ( has_nav_menu( 'secondary' ) ) {
				echo '<nav class="secondary-menu hidden-sm hidden-xs pull-right">';
					wp_nav_menu( array(
						'theme_location' => 'secondary',
						'depth'          => 1,
						'container'      => '',
						'fallback_cb'    => false
					));
				echo '</nav>';
			}

			?>
		</div> <!-- .site-branding -->

		<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'albinomouse' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand visible-xs" href="<?php echo home_url(); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</div> <!-- .navbar-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">

				<?php

					wp_nav_menu( array(
						'theme_location' => 'primary',
						'depth'          => 2,
						'container'      => '',
						'menu_class'     => 'nav navbar-nav',
						'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
						'walker'         => new wp_bootstrap_navwalker()
					));

					$bodyclasses = get_body_class();
					if( ! isset( $headersearch ) || $headersearch == '1' && ! in_array( 'error404', $bodyclasses ) ) {
						get_template_part( 'searchform', 'header' );
					}

				?>

				</div><!-- .navbar-collapse -->
			</div><!-- .container -->
		</nav><!-- .navbar .navbar-default -->
	</header><!-- #masthead -->

	<div id="content" class="site-content container">

	<?php
	if ( has_nav_menu( 'secondary' ) ) {
		echo '<nav class="secondary-menu visible-sm visible-xs">';
		wp_nav_menu( array(
			'theme_location' => 'secondary',
			'depth'          => 1,
			'container'      => '',
			'fallback_cb'    => false ));
		echo '</nav>';
	} ?>

	<div class="row">
