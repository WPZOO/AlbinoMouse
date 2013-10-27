<?php
/**
 * The Header for AlbinoMouse.
 * @package AlbinoMouse
 */
?>
<!DOCTYPE html>
<?php $options = get_option( 'albinomouse' ); ?>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php if(isset($options['favicon-upload']) and $options['favicon-upload'] != '' ) : ?>
	<link rel="shortcut icon" type="image/ico" href="<?php echo $options['favicon-upload']; ?>" />
<?php endif ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header hidden-print<?php if(!isset($options['header-background']) or $options['header-background'] == 'light-gray' ) : ?> header-gray<?php endif; ?>" role="banner">
		<div class="site-branding container hidden-xs<?php if(!isset($options['site-description']) or $options['site-description'] == '1' ) : ?> with-site-description<?php endif; ?><?php if ($options['branding-alignment'] == 'center' ) : ?> centred<?php endif; ?>">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if(isset($options['logo-upload']) and $options['logo-upload'] != '' ) : ?>
					<img src="<?php echo $options['logo-upload']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				<?php else : ?>
					<?php bloginfo( 'name' ); ?>
				<?php endif; ?>
			</a></h1>
			<?php if(!isset($options['site-description']) or $options['site-description'] == true ) : ?>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</div>

		<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
					<a class="navbar-brand visible-xs" href="<?php bloginfo('url'); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">			
					
				<?php wp_nav_menu( array(
					'menu'				=> 'primary',
					'theme_location'	=> 'primary',
					'depth'				=> 2,
					'container'			=> '',
					'menu_class'		=> 'nav navbar-nav',
					'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback',
					'walker'			=> new wp_bootstrap_navwalker()));
				?>
		
				<?php $bodyclasses = get_body_class();
					if(!isset($options['search-box']) or $options['search-box'] == true && !in_array('error404',$bodyclasses)) :
						get_template_part( 'searchform', 'header' );
					endif; 
				?>
							   
				</div><!-- .navbar-collapse -->
								
			</div><!-- .container -->
		</nav> 
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
	<div class="row">