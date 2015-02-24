<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'albinomouse';
}


function optionsframework_options() {

	// Footer widgets array
	$footer_widgets_array = array(
		'one'               => __('One', 'albinomouse'),
		'two'               => __('Two', 'albinomouse'),
		'three'             => __('Three', 'albinomouse'),
		'four'              => __('Four', 'albinomouse'),
	);

	// Background Defaults
	$background_defaults = array(
		'color'             => '',
		'image'             => '',
		'repeat'            => 'repeat',
		'position'          => 'top center',
		'attachment'        => 'scroll' );

	// Directory path to image radio buttons
	$imagepath =  get_template_directory_uri() . '/inc/options/images/';

	$options = array();

	$options[] = array(
		'name'              => __('Global', 'albinomouse'),
		'type'              => 'heading');

	$options[] = array(
		'name'              => __('Link and Footer Color', 'albinomouse'),
		'desc'              => __('Choose your own link and footer color.', 'albinomouse'),
		'id'                => 'link_footer_color',
		'std'               => '#e3272d',
		'type'              => 'color' );

	$options[] = array(
		'name'              => __('General Background', 'albinomouse'),
		'desc'              => __('Change the background of your site.', 'albinomouse'),
		'id'                => 'general-background',
		'std'               => $background_defaults,
		'type'              => 'background' );

	$options[] = array(
		'name'              => __('Favicon', 'albinomouse'),
		'desc'              => __('Customize your website with your own Favicon.', 'albinomouse'),
		'id'                => 'favicon-upload',
		'std'               => '',
		'type'              => 'upload');

	$options[] = array(
		'name'              => __('Title Font', 'albinomouse'),
		'desc'              => __('Choose your favorite google web font.', 'albinomouse'),
		'id'                => 'title_font',
		'std'               => 'Bitter',
		'type'              => 'images',
		'options'           => array(
		'Anton'             => $imagepath . 'Font_Anton.png',
		'Bitter'            => $imagepath . 'Font_Bitter.png',
		'Droid Sans'        => $imagepath . 'Font_Droid_Sans.png',
		'Droid Serif'       => $imagepath . 'Font_Droid_Serif.png',
		'Open Sans'         => $imagepath . 'Font_Open_Sans.png',
		'Source Sans Pro'   => $imagepath . 'Font_Source_Sans_Pro.png',
		'Ubuntu'            => $imagepath . 'Font_Ubuntu.png',
		'Yanone Kaffeesatz' => $imagepath . 'Font_Yanone_Kaffeesatz.png'));

	$options[] = array(
		'name'              => __('General Font', 'albinomouse'),
		'desc'              => __('Choose your favorite google web font.', 'albinomouse'),
		'id'                => 'general_font',
		'std'               => 'Open Sans',
		'type'              => 'images',
		'options'           => array(
		'Droid Sans'        => $imagepath . 'Font_Droid_Sans.png',
		'Droid Serif'       => $imagepath . 'Font_Droid_Serif.png',
		'Open Sans'         => $imagepath . 'Font_Open_Sans.png',
		'Source Sans Pro'   => $imagepath . 'Font_Source_Sans_Pro.png',
		'Ubuntu'            => $imagepath . 'Font_Ubuntu.png'));

	/*-----------------------------------------------*/

	$options[] = array(
		'name'              => __('Header', 'albinomouse'),
		'type'              => 'heading');

	$options[] = array(
		'name'              => __('Header Background', 'albinomouse'),
		'desc'              => __('Set the header background.', 'albinomouse'),
		'id'                => 'header-background',
		'std'               => 'light-gray',
		'type'              => 'radio',
		'options'           => array(
		'transparent'       => __('Transparent', 'albinomouse'),
		'light-gray'        => __('Gray semi-transparent', 'albinomouse')));
		
	$options[] = array(
		'name'              => __('Replace the title with your logo', 'albinomouse'),
		'desc'              => __('Upload your logo via the familiar media upload window. Press &#171;Use This Image&#187; to close the window. The Logo will now appear instead of the title of your website.', 'albinomouse'),
		'id'                => 'logo-upload',
		'std'               => '',
		'type'              => 'upload');

	$options[] = array(
		'name'              => __('Title and description alignment', 'albinomouse'),
		'desc'              => __('Set the alignment of the title/logo and your site description.', 'albinomouse'),
		'id'                => 'branding-alignment',
		'std'               => 'left',
		'type'              => 'radio',
		'options'           => array(
		'left'              => __('Left', 'albinomouse'),
		'center'            => __('Center (not recommend if you use the secondary menu)', 'albinomouse')));

	$options[] = array(
		'name'              => __('Description of your Site', 'albinomouse'),
		'desc'              => __('Display the description (Tagline) on your site.', 'albinomouse'),
		'id'                => 'site-description',
		'std'               => '1',
		'type'              => 'checkbox');

	$options[] = array(
		'name'              => __('Header Search Box', 'albinomouse'),
		'desc'              => __('Display the search box in the header of your site.', 'albinomouse'),
		'id'                => 'search-box',
		'std'               => '1',
		'type'              => 'checkbox');

	/*-----------------------------------------------*/

	$options[] = array(
		'name'              => __('Content', 'albinomouse'),
		'type'              => 'heading');
	
	$options[] = array(
		'name'              => __('Post Thumbnails', 'albinomouse'),
		'desc'              => __('Choose the size of your post thumbnails.', 'albinomouse'),
		'id'                => 'thumbnail-size',
		'std'               => 'banner',
		'type'              => 'radio',
		'options'           => array(
		'thumbnail'         => __('Content thumbnail (floated). See general settings.', 'albinomouse'),
		'banner'            => __('Header banner (750 x 250 pixel). Already existing images need to be regenerated.', 'albinomouse')));
		
	$options[] = array(
		'name'              => __('Sidebar Layout', 'albinomouse'),
		'desc'              => __('Choose one of the possible layout options.', 'albinomouse'),
		'id'                => 'sidebar-layout',
		'std'               => '2c-r',
		'type'              => 'images',
		'options'           => array(
		'2c-r'              => $imagepath . 'sidebar-right.png',
		'2c-rs'             => $imagepath . 'sidebar-right-small.png',
		'2c-l'              => $imagepath . 'sidebar-left.png',
		'2c-ls'             => $imagepath . 'sidebar-left-small.png',
		'1col'              => $imagepath . 'no-sidebar.png'));

	$options[] = array(
		'name'              => __('All content or excerpt on blog homepage and archives', 'albinomouse'),
		'desc'              => __('You might want the excerpt on blog homepage and the archive pages. With the first option you still can use the read more link.', 'albinomouse'),
		'id'                => 'content-excerpt',
		'std'               => 'content',
		'type'              => 'radio',
		'options'           => array(
		'content'           => __('Show all content on blog homepage and archive pages.', 'albinomouse'),
		'excerpt'           => __('Show post excerpt on blog homepage and archive pages.', 'albinomouse')));

	$options[] = array(
		'name'              => __('Breadcrumbs on default page template', 'albinomouse'),
		'desc'              => __('The default page template you probably use the most. Do you want a breadcrumbs navigation on this pages?', 'albinomouse'),
		'id'                => 'page-breadcrumbs',
		'std'               => 'yes',
		'type'              => 'radio',
		'options'           => array(
		'yes'               => __('Yes', 'albinomouse'),
		'no'                => __('No', 'albinomouse')));

	/*-----------------------------------------------*/

	$options[] = array(
		'name'              => __('Footer', 'albinomouse'),
		'type'              => 'heading');
				
	$options[] = array(
		'name'              => __('Footer Layout', 'albinomouse'),
		'desc'              => __('How many widgets do you have to load into the footer?', 'albinomouse'),
		'id'                => 'footer-layout',
		'std'               => '3col',
		'type'              => 'images',
		'options'           => array(
		'1col'              => $imagepath . 'footer-one-col.png',
		'2col'              => $imagepath . 'footer-two-col.png',
		'3col'              => $imagepath . 'footer-three-col.png',
		'4col'              => $imagepath . 'footer-four-col.png'));

	$options[] = array(
		'name'              => __('Custom Copyright Text', 'albinomouse'),
		'desc'              => __('Change the default copyright text.', 'albinomouse'),
		'id'                => 'copyright-text',
		'std'               => '',
		'type'              => 'textarea');

	$options[] = array(
		'name'              => __('Show some Love!', 'albinomouse'),
		'desc'              => __('Display a link to WordPress and the theme author.', 'albinomouse'),
		'id'                => 'show-love',
		'std'               => '1',
		'type'              => 'checkbox');

	/*-----------------------------------------------*/

	$options[] = array(
		'name'              => __('Advanced', 'albinomouse'),
		'type'              => 'heading');

	$options[] = array(
		'name'              => __('Reduced selection of Bootstrap components', 'albinomouse'),
		'desc'              => __('Load only a selection of Bootstrap components [All common CSS], [Glyphicons], [Navs], [Navbar], [Pager], [Thumbnails], [Media items], [Responsive Embed], [Colapse jQuery Plugin], [Dropdown jQuery Plugin]', 'albinomouse'),
		'id'                => 'reduced-bootstrap',
		'std'               => '',
		'type'              => 'checkbox');

	return $options;
}