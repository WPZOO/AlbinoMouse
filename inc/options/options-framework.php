<?php
/*
This options were built with the theme options framework v1.4 by Devin Price (http://www.wptheming.com). The framework is licensed under GPLv2. 
*/

add_action('init', 'albinomouseoptions_rolescheck' );

function albinomouseoptions_rolescheck () {
	if ( current_user_can( 'edit_theme_options' ) ) {
		// If the user can edit theme options, let the fun begin!
		add_action( 'admin_menu', 'albinomouseoptions_add_page');
		add_action( 'admin_init', 'albinomouseoptions_init' );
		add_action( 'admin_init', 'albinomouseoptions_mlu_init' );
		add_action( 'wp_before_admin_bar_render', 'albinomouseoptions_adminbar' );
	}
}

/* Loads the file for option sanitization */

add_action('init', 'albinomouseoptions_load_sanitization' );

function albinomouseoptions_load_sanitization() {
	require_once dirname( __FILE__ ) . '/options-sanitize.php';
}

/* 
 * Creates the settings in the database by looping through the array
 * we supplied in options.php.  This is a neat way to do it since
 * we won't have to save settings for headers, descriptions, or arguments.
 *
 * Read more about the Settings API in the WordPress codex:
 * http://codex.wordpress.org/Settings_API
 *
 */

function albinomouseoptions_init() {

	// Include the required files
	require_once dirname( __FILE__ ) . '/options-interface.php';
	require_once dirname( __FILE__ ) . '/options-medialibrary-uploader.php';
	
	// Loads the options array from the theme
	if ( $optionsfile = locate_template( array('options.php') ) ) {
		require_once($optionsfile);
	}
	else if (file_exists( dirname( __FILE__ ) . '/options.php' ) ) {
		require_once dirname( __FILE__ ) . '/options.php';
	}
	
	$albinomouseoptions_settings = get_option('albinomouseoptions' );
	
	// Updates the unique option id in the database if it has changed
	albinomouseoptions_option_name();
	
	// Gets the unique id, returning a default if it isn't defined
	if ( isset($albinomouseoptions_settings['id']) ) {
		$option_name = $albinomouseoptions_settings['id'];
	}
	else {
		$option_name = 'albinomouseoptions';
	}
	
	// If the option has no saved data, load the defaults
	if ( ! get_option($option_name) ) {
		albinomouseoptions_setdefaults();
	}
	
	// Registers the settings fields and callback
	register_setting( 'albinomouseoptions', $option_name, 'albinomouseoptions_validate' );
	
	// Change the capability required to save the 'albinomouseoptions' options group.
	add_filter( 'option_page_capability_albinomouseoptions', 'albinomouseoptions_page_capability' );
}

/**
 * Ensures that a user with the 'edit_theme_options' capability can actually set the options
 * See: http://core.trac.wordpress.org/ticket/14365
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */

function albinomouseoptions_page_capability( $capability ) {
	return 'edit_theme_options';
}

/* 
 * Adds default options to the database if they aren't already present.
 * May update this later to load only on plugin activation, or theme
 * activation since most people won't be editing the options.php
 * on a regular basis.
 *
 * http://codex.wordpress.org/Function_Reference/add_option
 *
 */

function albinomouseoptions_setdefaults() {
	
	$albinomouseoptions_settings = get_option('albinomouseoptions');

	// Gets the unique option id
	$option_name = $albinomouseoptions_settings['id'];
	
	/* 
	 * Each theme will hopefully have a unique id, and all of its options saved
	 * as a separate option set.  We need to track all of these option sets so
	 * it can be easily deleted if someone wishes to remove the plugin and
	 * its associated data.  No need to clutter the database.  
	 *
	 */
	
	if ( isset($albinomouseoptions_settings['knownoptions']) ) {
		$knownoptions =  $albinomouseoptions_settings['knownoptions'];
		if ( !in_array($option_name, $knownoptions) ) {
			array_push( $knownoptions, $option_name );
			$albinomouseoptions_settings['knownoptions'] = $knownoptions;
			update_option('albinomouseoptions', $albinomouseoptions_settings);
		}
	} else {
		$newoptionname = array($option_name);
		$albinomouseoptions_settings['knownoptions'] = $newoptionname;
		update_option('albinomouseoptions', $albinomouseoptions_settings);
	}
	
	// Gets the default options data from the array in options.php
	$options = albinomouseoptions_options();
	
	// If the options haven't been added to the database yet, they are added now
	$values = of_get_default_values();
	
	if ( isset($values) ) {
		add_option( $option_name, $values ); // Add option with default settings
	}
}

/* Add a subpage called "Theme Options" to the appearance menu. */

if ( !function_exists( 'albinomouseoptions_add_page' ) ) {

	function albinomouseoptions_add_page() {
		$of_page = add_theme_page(__('Theme Options', 'albinomouse'), __('Theme Options', 'albinomouse'), 'edit_theme_options', 'options-framework','albinomouseoptions_page');
		
		// Load the required CSS and javscript
		add_action('admin_enqueue_scripts', 'albinomouseoptions_load_scripts');
		add_action( 'admin_print_styles-' . $of_page, 'albinomouseoptions_load_styles' );
	}
	
}

/* Loads the CSS */

function albinomouseoptions_load_styles() {
	wp_enqueue_style('albinomouseoptions', OPTIONS_FRAMEWORK_DIRECTORY . 'css/albinomouseoptions.css');

	if ( !wp_style_is( 'wp-color-picker','registered' ) ) {
		wp_register_style('wp-color-picker', OPTIONS_FRAMEWORK_DIRECTORY . 'css/color-picker.min.css');
	}
	wp_enqueue_style( 'wp-color-picker' );
}

/* Loads the javascript */

function albinomouseoptions_load_scripts($hook) {

	if ( 'appearance_page_options-framework' != $hook )
        return;

	// Enqueue colorpicker scripts for versions below 3.5
	// for compatibility
	
	if ( !wp_script_is( 'wp-color-picker', 'registered' ) ) {
		wp_register_script( 'iris', OPTIONS_FRAMEWORK_DIRECTORY . 'js/iris.min.js', array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
		wp_register_script( 'wp-color-picker', OPTIONS_FRAMEWORK_DIRECTORY . 'js/color-picker.min.js', array( 'jquery', 'iris' ) );
		$colorpicker_l10n = array(
			'clear' => __( 'Clear', 'albinomouse' ),
			'defaultString' => __( 'Default', 'albinomouse' ),
			'pick' => __( 'Select Color', 'albinomouse' )
		);
		wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );
	}
	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', OPTIONS_FRAMEWORK_DIRECTORY . 'js/options-custom.js', array( 'jquery','wp-color-picker' ) );

	// Inline scripts from options-interface.php
	add_action( 'admin_head', 'of_admin_head' );
}

function of_admin_head() {
	// Hook to add custom scripts
	do_action( 'albinomouseoptions_custom_scripts' );
}

/* 
 * Builds out the options panel.
 *
 * If we were using the Settings API as it was likely intended we would use
 * do_settings_sections here.  But as we don't want the settings wrapped in a table,
 * we'll call our own custom albinomouseoptions_fields.  See options-interface.php
 * for specifics on how each individual field is generated.
 *
 * Nonces are provided using the settings_fields()
 *
 */

if ( !function_exists( 'albinomouseoptions_page' ) ) :
function albinomouseoptions_page() {
	settings_errors(); ?>

	<div id="albinomouseoptions-wrap" class="wrap">
    <?php screen_icon( 'themes' ); ?>
    <h2 class="nav-tab-wrapper">
        <?php echo albinomouseoptions_tabs(); ?>
    </h2>

    <div id="albinomouseoptions-metabox" class="metabox-holder">
	    <div id="albinomouseoptions" class="postbox">
			<form action="options.php" method="post">
			<?php settings_fields('albinomouseoptions'); ?>
			<?php albinomouseoptions_fields(); /* Settings */ ?>
			<div id="albinomouseoptions-submit">
				<input type="submit" class="button-primary" name="update" value="<?php esc_attr_e( 'Save Options', 'albinomouse' ); ?>" />
				<input type="submit" class="reset-button button-secondary" name="reset" value="<?php esc_attr_e( 'Restore Defaults', 'albinomouse' ); ?>" onclick="return confirm( '<?php print esc_js( __( 'Click OK to reset. Any theme settings will be lost!', 'albinomouse' ) ); ?>' );" />
				<div class="clear"></div>
			</div>
			</form>
		</div> <!-- / #container -->
	</div>
	<?php do_action('albinomouseoptions_after'); ?>
	</div> <!-- / .wrap -->
	
<?php
}
endif;

/**
 * Validate Options.
 *
 * This runs after the submit/reset button has been clicked and
 * validates the inputs.
 *
 * @uses $_POST['reset'] to restore default options
 */
function albinomouseoptions_validate( $input ) {

	/*
	 * Restore Defaults.
	 *
	 * In the event that the user clicked the "Restore Defaults"
	 * button, the options defined in the theme's options.php
	 * file will be added to the option for the active theme.
	 */

	if ( isset( $_POST['reset'] ) ) {
		add_settings_error( 'options-framework', 'restore_defaults', __( 'Default options restored.', 'albinomouse' ), 'updated fade' );
		return of_get_default_values();
	}
	
	/*
	 * Update Settings
	 *
	 * This used to check for $_POST['update'], but has been updated
	 * to be compatible with the theme customizer introduced in WordPress 3.4
	 */
	 
	$clean = array();
	$options = albinomouseoptions_options();
	foreach ( $options as $option ) {

		if ( ! isset( $option['id'] ) ) {
			continue;
		}

		if ( ! isset( $option['type'] ) ) {
			continue;
		}

		$id = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $option['id'] ) );

		// Set checkbox to false if it wasn't sent in the $_POST
		if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) {
			$input[$id] = false;
		}

		// Set each item in the multicheck to false if it wasn't sent in the $_POST
		if ( 'multicheck' == $option['type'] && ! isset( $input[$id] ) ) {
			foreach ( $option['options'] as $key => $value ) {
				$input[$id][$key] = false;
			}
		}

		// For a value to be submitted to database it must pass through a sanitization filter
		if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
			$clean[$id] = apply_filters( 'of_sanitize_' . $option['type'], $input[$id], $option );
		}
		
	}
	
	// Hook to run after validation
	do_action( 'albinomouseoptions_after_validate', $clean );
	
	return $clean;
}

/**
 * Display message when options have been saved
 */
 
function albinomouseoptions_save_options_notice() {
	add_settings_error( 'options-framework', 'save_options', __( 'Options saved.', 'albinomouse' ), 'updated fade' );
}

add_action( 'albinomouseoptions_after_validate', 'albinomouseoptions_save_options_notice' );

/**
 * Format Configuration Array.
 *
 * Get an array of all default values as set in
 * options.php. The 'id','std' and 'type' keys need
 * to be defined in the configuration array. In the
 * event that these keys are not present the option
 * will not be included in this function's output.
 *
 * @return    array     Rey-keyed options configuration array.
 *
 * @access    private
 */
 
function of_get_default_values() {
	$output = array();
	$config = albinomouseoptions_options();
	foreach ( (array) $config as $option ) {
		if ( ! isset( $option['id'] ) ) {
			continue;
		}
		if ( ! isset( $option['std'] ) ) {
			continue;
		}
		if ( ! isset( $option['type'] ) ) {
			continue;
		}
		if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
			$output[$option['id']] = apply_filters( 'of_sanitize_' . $option['type'], $option['std'], $option );
		}
		
	}
	return $output;
}

/**
 * Add Theme Options menu item to Admin Bar.
 */

function albinomouseoptions_adminbar() {

	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
			'parent' => 'appearance',
			'id' => 'of_theme_options',
			'title' => __( 'Theme Options', 'albinomouse' ),
			'href' => admin_url( 'themes.php?page=options-framework' )
		));
}

if ( ! function_exists( 'of_get_option' ) ) {

	/**
	 * Get Option.
	 *
	 * Helper function to return the theme option value.
	 * If no value has been saved, it returns $default.
	 * Needed because options are saved as serialized strings.
	 */
	 
	function of_get_option( $name, $default = false ) {
		$config = get_option( 'albinomouseoptions' );

		if ( ! isset( $config['id'] ) ) {
			return $default;
		}

		$options = get_option( $config['id'] );

		if ( isset( $options[$name] ) ) {
			return $options[$name];
		}

		return $default;
	}
}