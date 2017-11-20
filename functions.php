<?php
/*
Author: Shimion
URL: htp://simtheme.com/
 * @package SimThemeFramework
 * @since 1.0
*/


define('VERSION','0.1'); // Theme Version
define('NAME','SimThemeco'); //Theme NameSpace
define('_D',__dir__.'/');
define('_ASSETS',_D.'assets/');
define('_CSS',_ASSETS.'css/');
define('_JS',_ASSETS.'js/');
define('_INC',_D.'inc/');
define('_APP',_INC.'app/');
define('_RESOURCE',_INC.'resources/');
define('_ADMIN',_INC.'admin/');
define('_VIEW',_RESOURCE.'views/');
define('D',get_template_directory_uri().'/');
define('ASSETS',D.'assets/');
define('INC',D.'inc/');
define('CSS',ASSETS.'css/');
define('JS',ASSETS.'js/');
define('RESOURCE',INC.'resources/');
define('VIEW',RESOURCE.'views/');
define( 'BUILDER_TEMPLATE' , 'builder.php' );
require _ADMIN. "admin.php";
include_once(_INC.'inc.php');
if(file_exists(_D.'extra.php')){
include_once(_D.'extra.php');
}
add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-header', array() );


if ( ! isset( $content_width ) ) {
	$content_width = 1600;
}

add_filter('genesis_category_crumb', 'add_prefix_on_bcamp_archive_layer');
function add_prefix_on_bcamp_archive_layer($crumb, $args){
    return $crumb . ' Category';
}

/**
 * Add SVG capabilities
 */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$st_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', NAME);
    $footer = '<a href="https://simtheme.com/docs">simtheme.com/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};




/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('5.6.4', phpversion(), '>=')) {
    $st_error(__('You must be using PHP 5.6.4 or greater.', NAME), __('Invalid PHP version', NAME));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $st_error(__('You must be using WordPress 4.7.0 or greater.', NAME), __('Invalid WordPress version', NAME));
}


/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 
array_map(function ($file) use ($st_error) {
    $file = "/inc/app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $st_error(sprintf(__('Error locating <code>%s</code> for inclusion.', NAME), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);
*/

// Register Style & Scripts
add_action('wp_enqueue_scripts', 'EnqueryStyleAndScript');
function EnqueryStyleAndScript(){
   wp_register_style( 'main.min', CSS . 'main.min.css', array(), VERSION, 'all' );
    wp_enqueue_style( 'main.min' ); 
    
    wp_register_script( 'main.min', JS. 'main.min.js', 
      array('jquery'), 
      VERSION, true );
    wp_localize_script( 'main.min', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script('main.min');
  
}


