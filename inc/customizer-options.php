<?php
/**
 * Defines customizer options
 *
 * @package AlbinoMouse
 */

function albinomouse_options() {

	// Theme defaults
	// $link_color = '#0066cc';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;


	// Colors
	$section = 'colors';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Colors', 'albinomouse' ),
		'priority'      => '50'
	);

	$options['link-color'] = array(
		'id'            => 'link-color',
		'label'         => __( 'Link and Footer Color', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'color',
		'default'       => '#e3272d',
	);

	// Colors
	$section = 'background_image';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Background Image', 'albinomouse' ),
		'priority'      => '55'
	);

	// Header
	$section = 'header';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Header', 'albinomouse' ),
		'priority'      => '75'
	);

	$bachoices = array(
		'left'          => __( 'Left', 'albinomouse' ),
		'center'        => __( 'Center', 'albinomouse' ),
	);

	$hbchoices = array(
		'transparent'   => __( 'Transparent', 'albinomouse' ),
		'light-gray'    => __( 'Gray semi-transparent', 'albinomouse' ),
	);

	$options['logo-upload'] = array(
		'id'            => 'logo-upload',
		'label'         => __( 'Upload your logo', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'upload',
		'default'       => '',
	);

	$options['branding-alignment'] = array(
		'id'            => 'branding-alignment',
		'label'         => __( 'Alignment of the title / the logo', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'radio',
		'default'       => 'left',
		'choices'       => $bachoices,
	);

	$options['site-description'] = array(
		'id'            => 'site-description',
		'label'         => __( 'Show the site description', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'checkbox',
		'default'       => '1',
	);

	$options['search-box'] = array(
		'id'            => 'search-box',
		'label'         => __('Header Search Box', 'albinomouse'),
		'section'       => $section,
		'type'          => 'checkbox',
		'default'       => '1',
	);

	$options['header-background'] = array(
		'id'            => 'header-background',
		'label'         => __( 'Header Background', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'radio',
		'default'       => 'light-gray',
		'choices'       => $hbchoices,
	);	

	// Navigation
	$section = 'nav';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Navigation', 'albinomouse' ),
		'priority'      => '85'
	);

	// Typography
	$section = 'typography';
	$font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Typography', 'albinomouse' ),
		'priority'      => '90'
	);

	$options['primary-font'] = array(
		'id'            => 'primary-font',
		'label'         => __( 'General Font', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'select',
		'choices'       => $font_choices,
		'default'       => 'Open Sans'
	);

	$options['secondary-font'] = array(
		'id'            => 'secondary-font',
		'label'         => __( 'Title Font', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'select',
		'choices'       => $font_choices,
		'default'       => 'Bitter'
	);

	// Content
	$section = 'content';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Content', 'albinomouse' ),
		'priority'      => '95'
	);

	$contentchoices = array(
		'excerpt'       => __( 'Excerpt (trimmed-down output)', 'albinomouse' ),
		'content'       => __( 'Content (full post / custom more tag)', 'albinomouse' ),
	);

	$options['content-excerpt'] = array(
		'id'            => 'content-excerpt',
		'label'         => __( 'Content output of standard posts on home and archive pages', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'radio',
		'choices'       => $contentchoices,
		'default'       => 'content'
	);

	$sidebarchoices = array(
		'2c-r'          => __( 'Sidebar right', 'albinomouse' ),
		'2c-rs'         => __( 'Small sidebar right', 'albinomouse' ),
		'2c-l'          => __( 'Sidebar left', 'albinomouse' ),
		'2c-ls'         => __( 'Small sidebar left', 'albinomouse' ),
		'1col'          => __( 'No sidebar', 'albinomouse' )
	);

	$options['sidebar-layout'] = array(
		'id'            => 'sidebar-layout',
		'label'         => __( 'Sidebar', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'select',
		'choices'       => $sidebarchoices,
		'default'       => '2c-r'
	);

	$thumbnailchoices = array(
		'thumbnail'     => __('Content thumbnail (floated). See general settings.', 'albinomouse'),
		'banner'        => __('Header banner (750 x 250 pixel). Already existing images need to be regenerated.', 'albinomouse')
	);

	$options['thumbnail-size'] = array(
		'id'            => 'thumbnail-size',
		'label'         => __( 'Size of post thumbnails', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'select',
		'choices'       => $thumbnailchoices,
		'default'       => 'banner'
	);

	$options['page-breadcrumbs'] = array(
		'id'            => 'page-breadcrumbs',
		'label'         => __( 'Breadcrumbs on default page template', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'checkbox',
		'default'       => '1'
	);

	// Footer
	$section = 'footer';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Footer', 'albinomouse' ),
		'priority'      => '100'
	);

	$footerchoices = array(
		'1col'          => __( '1 column', 'albinomouse' ),
		'2col'          => __( '2 columns', 'albinomouse' ),
		'3col'          => __( '3 columns', 'albinomouse' ),
		'4col'          => __( '4 columns', 'albinomouse' ),
	);

	$options['footer-layout'] = array(
		'id'            => 'footer-layout',
		'label'         => __( 'Footer columns', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'select',
		'choices'       => $footerchoices,
		'default'       => '3col'
	);

	$options['copyright'] = array(
		'id'            => 'copyright',
		'label'         => __( 'Copyright text', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'text',
		'default'       => '',
	);

	$options['love'] = array(
		'id'            => 'love',
		'label'         => __( 'Show the name of this theme', 'albinomouse' ),
		'section'       => $section,
		'type'          => 'checkbox',
		'default'       => '1',
	);


	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'albinomouse_options' );


function change_default_order_options( $wp_customize ){
	$wp_customize->get_section('static_front_page')->priority = '50';
}
add_action( 'customize_register', 'change_default_order_options' );