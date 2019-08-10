<?php
/* Functions and stuff for the WP-Evetually theme
   
   Based on HTML5up html5up.net
   
   mods by and blame go to http://cog.dog
*/


// --------- theme setup ----------------------------------------------------------------
add_action( 'after_setup_theme', 'eventually_setup' );

// better title support https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
function eventually_setup() {
   add_theme_support( 'title-tag' );
   	
	// give us custom headers to be used as background slider
	$defaults = array(
		'default-image'          => '%s/images/headers/aspen.jpg',
		'width'                  => 1920,
		'height'                 => 900,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => false,
	);

	add_theme_support( 'custom-header', $defaults );
	
	// load default headers
	register_default_headers( eventually_default_header_images() );

}



// --------- clear posts ---------------------------------------------------------------




// --------- add menu location -----------------------------------------------------------


add_action( 'init', 'eventually_register_my_menu' );

function eventually_register_my_menu() {
	register_nav_menu( 'eventually-social', __( 'Social Media' ) );
}


// --------- scripts and styles ----------------------------------------------------------
// enqueue the scripts'n styles... do it right!

add_action( 'wp_enqueue_scripts', 'eventually_scripts' );

function eventually_scripts() {

	// eventually base CSS
	wp_register_style( 'eventually-style', get_stylesheet_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'eventually-style' );

	// eventually base CSS
	wp_register_style( 'eventually-style-wp', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'eventually-style-wp' );	
	

	wp_register_script( 'eventually-main' , get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), false, true );
	
	// send to the script an array of the header images
	wp_localize_script(
	  'eventually-main',
	  'theTransporter',
	  array(
		'backgrounds' => eventually_get_backgrounds()
	  )
	);

	wp_enqueue_script( 'eventually-main' );
	
}

add_action( 'wp_head', 'eventually_custom_css_output', 20);

function eventually_custom_css_output() {
  echo '<style type="text/css" id="custom-theme-css">' .
  '.icons {font-size: ' . get_theme_mod( 'eventually_social_icon_size', '1.5' ) . 'em;}' 
  . '</style>';
}


// --------- Front Page  ----------------------------------------------------------------

// limit the front loop to just one post and skip "hello world"
add_action('pre_get_posts','eventually_one_post_loop');

function eventually_one_post_loop( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 1 );
        $query->set( 'post__not_in', array(1));
    }
}



// --------- Customizer Controls  --------------------------------------------------------
/*** Customizer settings to allow editing of a front quote, customizing the footer, and ivon ***/

add_action( 'customize_register', 'eventually_register_theme_customizer' );

// register custom customizer stuff

function eventually_register_theme_customizer( $wp_customize ) {

	// Add section in customizer for this stuff
	$wp_customize->add_section( 'eventually_stuff' , array(
		'title'    => __('Eventually Mods','eventually'),
		'priority' => 500
	) );


	$wp_customize->add_setting( 'eventually_footer_content', array(
		 'default'           => __( 'This text ought to be customized! ', 'eventually' ),
		 'sanitize_callback' => 'eventually_sanitize_html'
	) );
	
	// Add control for footer text
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'content_footer_text',
		    array(
		        'label'    => __( 'Footer Text', 'eventually' ),
		        'description' => __( 'Allowable HTML tags are: "a, img, em, strong, br" all others will be stripped out'),
		        'section'  => 'eventually_stuff',
		        'settings' => 'eventually_footer_content',
		        'type'     => 'textarea'
		    )
	    )
	);
	
	$wp_customize->add_setting( 'eventually_social_icon_size', array(
		 'default'           => __( '1.5', 'eventually' ),
	) );
	
	
	$wp_customize->add_control( 'eventually_social_icon_size', array(
	  'type' => 'range',
	  'section' => 'eventually_stuff',
	  'label' => __( 'Social Media Font Size' ),
	  'description' => __( 'Select size for the Font Awesome menu icons (1-5em)' ),
	  'input_attrs' => array(
		'min' => 1,
		'max' => 5,
		'step' => 0.5,
	  ),
	) );	
		

 	// Allow just some html
	function eventually_sanitize_html( $value ) {
	
		$allowed_html = [
			'a'      => [
				'href'  => [],
				'title' => [],
			],
			'img'    => [
				'src' => [],
				'alt' => [],
				'title' => [],
			],
			'br'     => [],
			'em'     => [],
			'strong' => [],
		];

		return  wp_kses( $value, $allowed_html );
	}	
	
 	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
}

// display footer text
function eventually_social_media_font_size() {

	 if ( get_theme_mod( 'eventually_social_icon_size') != "" ) {
	 	echo get_theme_mod( 'eventually_social_icon_size') . 'em';
	 }	else {
	 	echo '1.5em';
	 }
}

// display footer text
function eventually_footer_text() {

	 if ( get_theme_mod( 'eventually_footer_content') != "" ) {
	 	echo get_theme_mod( 'eventually_footer_content');
	 }	else {
	 	echo 'This text ought to be customized!';
	 }
}

/**
 * This function assumes you have a Customizer export file in your theme directory
 * at 'data/customizer.dat'. That file must be created using the Customizer Export/Import
 * plugin found here... https://wordpress.org/plugins/customizer-export-import/
 * h/t - https://gist.github.com/fastlinemedia/9a8070b9a636e38b510f
 */
 
add_action( 'after_switch_theme', 'splot_import_customizer_settings' );
 
function splot_import_customizer_settings()
{
	// Check to see if the settings have already been imported.
	$template = get_template();
	$imported = get_option( $template . '_customizer_import', false );
	
	// Bail if already imported.
	if ( $imported ) {
		return;
	}
	
	// Get the path to the customizer export file.
	$path = trailingslashit( get_stylesheet_directory() ) . 'data/customizer.dat';
	
	// Return if the file doesn't exist.
	if ( ! file_exists( $path ) ) {
		return;
	}
	
	// Get the settings data.
	$data = @unserialize( file_get_contents( $path ) );
	
	// Return if something is wrong with the data.
	if ( 'array' != gettype( $data ) || ! isset( $data['mods'] ) ) {
		return;
	}
	
	// Import options.
	if ( isset( $data['options'] ) ) {
		foreach ( $data['options'] as $option_key => $option_value ) {
			update_option( $option_key, $option_value );
		}
	}
	
	// Import mods.
	foreach ( $data['mods'] as $key => $val ) {
		set_theme_mod( $key, $val );
	}
	
	// Set the option so we know these have already been imported.
	update_option( $template . '_customizer_import', true );
}


function eventually_get_backgrounds() {
	// first look for updloaded header images
	$backgrounds = get_uploaded_header_images();
	
	// if none found use the defaults
	if ( !$backgrounds ) $backgrounds = eventually_default_header_images();
	
	$headers = array();
	
	// construct array with urls as index, format used by template
	foreach ($backgrounds as $image) {
		$headers[$image['url']] = 'center';
	}
	
	
	return ($headers);
}

function eventually_default_header_images() {
	return array(
		'aspen' => array(
		'url' => get_stylesheet_directory_uri() . '/images/headers/aspen.jpg',
		'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/aspen-thumbnail.jpg',
		/* translators: header image description */
		'description' => __( 'Aspen', 'eventually' )
		),	
		'open' => array(
		'url' => get_stylesheet_directory_uri() . '/images/headers/open.jpg',
		'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/open-thumbnail.jpg',
		/* translators: header image description */
		'description' => __( 'Openness', 'eventually' )
		),	
		'through' => array(
		'url' => get_stylesheet_directory_uri() . '/images/headers/through.jpg',
		'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/through-thumbnail.jpg',
		/* translators: header image description */
		'description' => __( 'Through road', 'eventually' )
		),	
		'turntable' => array(
		'url' => get_stylesheet_directory_uri() . '/images/headers/turntable.jpg',
		'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/turntable-thumbnail.jpg',
		/* translators: header image description */
		'description' => __( 'Turntable', 'eventually' )
		),
	);
}

// Load plugin requirements file to display admin notices.
require get_stylesheet_directory() . '/includes/splot-plugins.php';


?>