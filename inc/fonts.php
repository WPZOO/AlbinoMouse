<?php 

/**
 * Selection of Google fonts used in AlbinoMouse theme.
 *
 * @package AlbinoMouse
 */

function albinomouse_fonts_selection() {
	$fonts = albinomouse_get_google_fonts();
	return $fonts;
}
add_filter( 'customizer_library_all_fonts', 'albinomouse_fonts_selection' );


if ( ! function_exists( 'albinomouse_get_google_fonts' ) ) :

function albinomouse_get_google_fonts() {
	return apply_filters( 'customizer_library_get_google_fonts', array(
		'Anton' => array(
			'label'    => 'Anton',
			'variants' => array(
				'regular',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Bitter' => array(
			'label'    => 'Bitter',
			'variants' => array(
				'regular',
				'italic',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		),
		'Droid Sans' => array(
			'label'    => 'Droid Sans',
			'variants' => array(
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Droid Serif' => array(
			'label'    => 'Droid Serif',
			'variants' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
			),
		),
		'Open Sans' => array(
			'label'    => 'Open Sans',
			'variants' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'vietnamese',
				'latin-ext',
				'devanagari',
				'cyrillic-ext',
			),
		),
		'Source Sans Pro' => array(
			'label'    => 'Source Sans Pro',
			'variants' => array(
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'900',
				'900italic',
			),
			'subsets' => array(
				'latin',
				'vietnamese',
				'latin-ext',
			),
		),
		'Ubuntu' => array(
			'label'    => 'Ubuntu',
			'variants' => array(
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'700',
				'700italic',
			),
			'subsets' => array(
				'latin',
				'greek-ext',
				'cyrillic',
				'greek',
				'latin-ext',
				'cyrillic-ext',
			),
		),
		'Yanone Kaffeesatz' => array(
			'label'    => 'Yanone Kaffeesatz',
			'variants' => array(
				'200',
				'300',
				'regular',
				'700',
			),
			'subsets' => array(
				'latin',
				'latin-ext',
			),
		)
	) );
}
endif;