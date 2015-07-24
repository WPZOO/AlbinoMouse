<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package AlbinoMouse
 */

/**
 * Define colors dynamically 
 */
function albinomouse_change_color( $color, $per ) {

	$color = substr( $color, 1 ); // Removes first character of hex string (#)
	$rgb = ''; // Empty variable
	$per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control color temperature

	// Check to see if the percentage is a negative number
	if ( $per < 0 ) {
		// DARKER
		$per =  abs( $per ); // Turns Neg Number to Pos Number
		for ($x=0;$x<3;$x++) {
			$c = hexdec(substr($color,(2*$x),2)) - $per;
			$c = ($c < 0) ? 0 : dechex($c);
			$rgb .= (strlen($c) < 2) ? '0'.$c : $c;
		}
	} else {
		// LIGHTER
		for ($x=0;$x<3;$x++) {
			$c = hexdec(substr($color,(2*$x),2)) + $per;
			$c = ($c > 255) ? 'ff' : dechex($c);
			$rgb .= (strlen($c) < 2) ? '0'.$c : $c;
		}
	}
	return '#'.$rgb;
}

if ( ! function_exists( 'customizer_library_albinomouse_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_albinomouse_build_styles() {

	// Link and footer color
	$setting = 'link_footer_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		$d5  = -5;
		$d8  = -8;
		$d10 = -10;
		$d12 = -12;
		$d15 = -15;
		$l40 = 40;

		$color_b40 = albinomouse_change_color( $color, $l40 );
		$color_d5  = albinomouse_change_color( $color, $d5 );
		$color_d8  = albinomouse_change_color( $color, $d8 );
		$color_d10 = albinomouse_change_color( $color, $d10 );
		$color_d12 = albinomouse_change_color( $color, $d12 );
		$color_d15 = albinomouse_change_color( $color, $d15 );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#colophon',
				'.dropdown-menu > .active > a',
				'.dropdown-menu > .active > a:hover',
				'.dropdown-menu > .active > a:focus',
				'.nav-pills > li.active > a',
				'.nav-pills > li.active > a:hover',
				'.nav-pills > li.active > a:focus',
				'.navbar-default .navbar-nav > .active > a',
				'.navbar-default .navbar-nav > .active > a:hover',
				'.navbar-default .navbar-nav > .active > a:focus',
				'.navbar-default .navbar-toggle .icon-bar',
				'.navbar-default .navbar-nav > .open > a',
				'.navbar-default .navbar-nav > .open > a:hover',
				'.navbar-default .navbar-nav > .open > a:focus',
				'.navbar-default .navbar-nav .open .dropdown-menu > .active > a',
				'.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover',
				'.navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus',
				'.label-primary',
				'.progress-bar'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.list-group-item.active',
				'.list-group-item.active:hover',
				'.list-group-item.active:focus',
				'.panel-primary > .panel-heading'
			),
			'declarations' => array(
				'background-color' => $color,
				'border-color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.pagination > .active > a',
				'.pagination > .active > span',
				'.pagination > .active > a:hover',
				'.pagination > .active > span:hover',
				'.pagination > .active > a:focus',
				'.pagination > .active > span:focus'
			),
			'declarations' => array(
				'background-color' => $color,
				'color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.nav .open > a',
				'.nav .open > a:hover',
				'.nav .open > a:focus',
				'.navbar-default .navbar-toggle',
				'a.thumbnail:hover',
				'a.thumbnail:focus',
				'.panel-primary',
				'.format-link .entry-content p:first-child'
			),
			'declarations' => array(
				'border-color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.panel-primary > .panel-heading + .panel-collapse .panel-body'
			),
			'declarations' => array(
				'border-top-color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.panel-primary > .panel-footer + .panel-collapse .panel-body'
			),
			'declarations' => array(
				'border-bottom-color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.panel-primary > .panel-footer + .panel-collapse .panel-body'
			),
			'declarations' => array(
				'border-bottom-color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
					'a',
					'.text-primary',
					'.btn-link',
					'.navbar-default .navbar-brand',
					'a.list-group-item.active > .badge',
					'.nav-pills > .active > a > .badge'
			),
			'declarations' => array(
				'color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.btn-primary',
				'.btn-primary.disabled',
				'.btn-primary[disabled]',
				'fieldset[disabled] .btn-primary',
				'.btn-primary.disabled:hover',
				'.btn-primary[disabled]:hover',
				'fieldset[disabled] .btn-primary:hover',
				'.btn-primary.disabled:focus',
				'.btn-primary[disabled]:focus',
				'fieldset[disabled] .btn-primary:focus',
				'.btn-primary.disabled:active',
				'.btn-primary[disabled]:active',
				'fieldset[disabled] .btn-primary:active',
				'.btn-primary.disabled.active',
				'.btn-primary[disabled].active',
				'fieldset[disabled] .btn-primary.active'
			),
			'declarations' => array(
				'background-color' => $color,
				'color' => $color_d5
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a:hover',
				'a:focus',
				'.btn-link:hover',
				'.btn-link:focus',
				'.nav .open > a .caret',
				'.nav .open > a:hover .caret',
				'.nav .open > a:focus .caret'
			),
			'declarations' => array(
				'color' => $color_d15
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.text-primary:hover',
				'.navbar-default .navbar-brand:hover',
				'.navbar-default .navbar-brand:focus'
			),
			'declarations' => array(
				'color' => $color_d10
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.label-primary[href]:hover',
				'.label-primary[href]:focus'
			),
			'declarations' => array(
				'background-color' => $color_d10
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.btn-primary:hover',
				'.btn-primary:focus',
				'.btn-primary:active',
				'.btn-primary.active',
				'.open .dropdown-toggle.btn-primary'
			),
			'declarations' => array(
				'background-color' => $color_d8,
				'border-color' => $color_d12
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.list-group-item.active .list-group-item-text',
				'.list-group-item.active:hover .list-group-item-text',
				'.list-group-item.active:focus .list-group-item-text'
			),
			'declarations' => array(
				'color' => $color_b40
			)
		) );

	}

	// Primary font
	$setting = 'general_font';
	$primaryfont = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $primaryfont !== customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body', 
				'button', 
				'input', 
				'select', 
				'textarea'
			),
			'declarations' => array(
				'font-family' => $primaryfont
			)
		) );

	}

	// Secondary font
	$setting = 'title_font';
	$secondaryfont = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $secondaryfont !== customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1', 
				'h2', 
				'h3', 
				'h4', 
				'h5', 
				'h6', 
				'.navbar-brand'
			),
			'declarations' => array(
				'font-family' => $secondaryfont
			)
		) );

	}
}
endif;

add_action( 'customizer_library_styles', 'customizer_library_albinomouse_build_styles' );

if ( ! function_exists( 'customizer_library_albinomouse_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_albinomouse_styles() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"albinomouse-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'customizer_library_albinomouse_styles', 11 );