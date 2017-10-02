<?php
/*
Author: Shimion
URL: htp://simtheme.com/
 * @package SimThemeFramework
 * @since 1.0
*/

// Get Bones Core Up & Running!

define('ST',__dir__.'/');
define('ASSETS',__dir__.'/assets/');
define('INC',ST.'inc/');
define('APP',INC.'app/');
define('SCSS',INC.'app/src/Minify/css/scss/');
define('STU',get_template_directory_uri().'/');
define('ASSETSU',STU.'assets/');
define('INCU',STU.'inc/');
define('CSSU',ASSETSU.'css/');
define('JSU',ASSETSU.'js/');
define('SCSSU',INCU.'app/src/Minify/css/scss');
define('st_taxture_uri',get_template_directory_uri().'/assets/images/taxture/');
define('st_taxture',st_asset.'images/taxture/');

include_once(INC.'inc.php');

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