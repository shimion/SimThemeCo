<?php
require _APP."vendor/autoload.php";
use Northwoods\Config\ConfigFactory;
use ST\Minify\Minifier;
use MatthiasMullie\Minify;
use Philo\Blade;
use ST\App;
use ST\Helpers; // it helps to set data for config.php
use ST\Controller\Search;
use ST\Providers\WidgetCustomizer;
use ST\Helpers\CommentsWalker;
$template_directory =  _INC . '/resources/views';
if (!is_dir($template_directory)) {
mkdir($template_directory , 0755, true);
}
$wp_content_dir = WP_CONTENT_DIR;
if (!is_dir($wp_content_dir . '/cache/blade')) {
mkdir($wp_content_dir . '/cache/blade', 0755, true);
}

$views = $template_directory;
$cache = $wp_content_dir . '/cache/blade';
$GLOBALS['blade_engine'] = new \Philo\Blade\Blade($views, $cache);



/**
 * -f SetDefault
 * -D Set default value if custom value is not available
 * @param string/array $main
 * @param string/array $default
 */

function SetDefault($main, $default){
    if(!empty($main))
        return $main;
        else
          return  $default;
            
}



/**
 * -f WidgetCustomizer
 * -D Set extra fields for all the widgets
 * @param string/array $default
 */
add_action('init', function(){
    new WidgetCustomizer();
});







/**
 * -f Config
 * -D Data Config for set and retrive custom value
 * @param string/array $main
 * @param string/array $default
 */

function Config(){
        App::Config();
            
}

/**
 * -f GetConfig
 * -D Retrive the configuration data from Config
 * @param string/array $name
 * @param return string/array 
 */

function GetConfig($name){
    if(!empty($name))
        return App::Config()->Get($name);
            
}


/**
 * -f Config
 * -D Data Config for set custom value
 * @param string/array $main
 * @param string/array $default
 */
 function Helpers(){
      /*$clss =  new Helpers();*/
     return  ST\Helpers::get_instance();
    };


/**
 * -f SearchForm()
 * -D Apply_filter to search form to change its layout
 * @return string ST\Controller\Search::Form()
 */
add_filter('get_search_form', 'SearchForm');
function SearchForm(){
        return ST\Controller\Search::Form();
    }



/**
 * -f Excerpt()
 * -D easily call excerpt for title text or anything else
 * @return string text...
 */
function Excerpt($text, $words, $readmore = '...'){
        if(empty($text)) return false;
        if(empty($words) or $words == NULL) return $text;
        $readmore = apply_filters('filter_readmore', $readmore, $readmore);
        return wp_trim_words( $text, $words, $readmore );;
    }



/**
 * -f function
 * -D only apply this title filter  for the loop zone. 
 * -D add extra condition via filter on the title to add ancor on it. 
 * @return string from the_title
 */

add_action('loop_start',function($query){
    global $wp_query;
    if($query === $wp_query){
    add_filter('the_title', function($title){
        if(is_singular() or ! is_main_query()) return $title;

        $title = Excerpt($title,  App::Config()->Get('global.title_limit'), '...');
        $title = sprintf('<a href="%s" >%s</a>', get_the_permalink(),  $title);
        if($title) return $title;
        }, 20);
    }
    
});





/**
 * -f function
 * -D add filter on the_content for extra support
 * @return string from the_content
 */
add_filter('the_content', function($content){
    if( is_singular()) return $content;
    $content = Excerpt($content,  App::Config()->Get('global.excerpt_limit'), '...');
    if($content) return $content;
}, 20);



/**
 * -f function
 * -D add filter on the_content for extra support
 * @return string from the_content
 */
add_filter('action_addditional_fields_after_content', function($post){
    if( ! is_singular())
    return Helpers::Button(['link'=>get_permalink($post->ID), 'text'=>App::Config()->Get('global.readmore_text'), 'class' =>App::Config()->Get('global.readmore_class')]);
}, 20);









/**
 * -f Blade
 * @param string $view, array $attributes
 * @return string
 */
function Blade($view, array $attributes = []){
 $attdata =  collect($attributes) ; 
 return $GLOBALS['blade_engine']->view()->make($view, $attdata);

}

function template($view){
    echo $GLOBALS['blade_engine']->view()->make($view, collect(App::me()));
    
}

/**
 * @param string $view
 * @param array $attributes
 *
 * @return string
 */
function get_rendered_blade_view($view, array $attributes = []){  
return $GLOBALS['blade_engine']->view()->make($view, $attributes);
    
}




/*
@ After Theme Support
@ Menu Registration

*/
add_action('after_setup_theme', function(){
   add_theme_support( 'menus' ); 
       add_theme_support( 'custom-logo', array(
        'height'      => 50,
        'width'       => 150,
        'flex-height' => false,
        'flex-width'  => false,
           
        'header-text' => array( 'site-title', 'site-description' ),
    ) ); 
    
		register_nav_menus(                      
			array( 
				'main_nav' => 'The Main Menu',   
				'footer_links' => 'Footer Menu' 
			)
		); 
    
    
    	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    
    
    
    
    
    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    
    
});




//add_shortcode('STST', 'STST');
//function STST(){
//render_blade_view('components/basic', [
//'title' => "Welcome",
//'text' => 'Welcome TO BD',
//]);   
//}

// Sidebar Registration
add_action('widgets_init', 'st_register_sidebar');
function st_register_sidebar(){
    
    register_sidebar(array(
    	'id' => 'sidebar',
    	'name' => 'Main Sidebar',
    	'description' => 'Default sidebar for all the pages.',
    	'before_widget' => '<div id="%1$s" class="widget list-group-item %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));  
    
 
    
    register_sidebar(array(
    	'id' => 'header-top',
    	'name' => 'Header Top',
    	'description' => 'Use this wisget to show widget on the very top. Specifically for phone number, social icons, text, call to action button etc ',
    	'before_widget' => '<div id="%1$s" class="col-sm %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));  
    
    

   register_sidebar(array(
    	'id' => 'header-bottom',
    	'name' => 'Header Bottom Widget Area',
    	'description' => 'Use this widget to show content after the header/menu section and before the main content and sidebar section',
    	'before_widget' => '<div id="%1$s" class="col-sm %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));  
    
    

    
    
register_sidebar(array(
    	'id' => 'hwcwd',
    	'name' => 'Home Page Before Content',
    	'description' => 'It will show content before home page content',
    	'before_widget' => '<div id="%1$s" class="col list-group-item %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
    	'id' => 'hacwd',
    	'name' => 'Home Page After Content',
    	'description' => 'It will show content after home page content',
    	'before_widget' => '<div id="%1$s" class="col list-group-item %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));
    
    
     register_sidebar(array(
    	'id' => 'before-footer',
    	'name' => 'Before Footer Widget Area',
    	'description' => 'Use this widget to show content after the main content and sidebar section and before the footer section.',
    	'before_widget' => '<div id="%1$s" class="col-sm %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));  
    
    

    register_sidebar(array(
    	'id' => 'footer-widget-section',
    	'name' => 'Footer Widget Area',
    	'description' => 'Full wapper will be devided depends on the number of widget used on this section.',
    	'before_widget' => '<div id="%1$s" class="col-sm %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));  
    
    

   register_sidebar(array(
    	'id' => 'footer',
    	'name' => 'Footer Coppyright Area',
    	'description' => 'Full wapper will be devided depends on the number of widget used on this section.',
    	'before_widget' => '<div id="%1$s" class="col-sm %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));  
    
    

  
    
}




/**
 * Render page using Blade
 */
/*add_filter('template_include', function ($template) {
global $wp_query;
    $classes = 'builder.php';
$data = collect($wp_query->posts);
    if ( is_rtl() )
        $classes = 'rtl';
 
    if ( is_front_page() )
        $classes = 'home';
    if ( is_home() )
        $classes = 'blog';
    if ( is_archive() )
        $classes = 'archive';
    if ( is_date() )
        $classes = 'date';
    if ( is_search() ) 
        $classes = 'search'; 
    if ( is_paged() )
        $classes = 'paged';
   
    if ( is_attachment() )
        $classes = 'attachment';
    if ( is_404() )
        $classes = '404'; 
    echo $classes;
    
    if(file_exists(_VIEW . $classes.".blade.php")){
    $classes = $classes;
        
           }else{
     $classes = 'index';
         }
    
    if ( is_singular() ) {
        $post_id = $wp_query->get_queried_object_id();
        $post = $wp_query->get_queried_object();
        $post_type = $post->post_type;
 
        if ( is_single() ) {
            
                if ( isset( $post->post_type ) ) {
                    $classes = 'single-' . sanitize_html_class( $post->post_type, $post_id );

                 }
            
                 if(file_exists(_VIEW . $classes.".blade.php")){
                    $classes = $classes;
                    
                }else{
                    $classes = 'single';
                }
            
            }
        
    }
 echo render_blade_view($classes, $data->all());
// Return a blank file to make WordPress happy
return get_theme_file_path('index.php');
}, PHP_INT_MAX);
*/


/*
Add Minify Script 
Run Via ajax call
example: http://mercer.simtheme.com/wp-admin/admin-ajax.php?action=Minify
*/
add_action( 'wp_ajax_Minify', 'Minify' );
add_action( 'wp_ajax_nopriv_Minify', 'Minify' );
function Minify(){
$styles = [];
$bootstrap = _CSS.'bootstrap.css';
   
$styles[] = _CSS.'style.css';
$styles[] = _CSS.'header.css';    
$styles[] = _CSS.'wp.css';
$styles[] = _CSS.'post.css';
$styles[] = _CSS.'comments.css';
$styles[] = _CSS.'wp-calender.css';
$styles[] = _CSS.'sidebar.css';
$styles[] = _CSS.'footer.css';
/* Load all control css here */  
$styles[] = _CSS.'search.css';  
$styles = apply_filters('filter_minify_css', $styles);    
$main = _CSS.'main.min.css';
$mainjs = _JS.'main.min.js';
$js = [];   
$js[] = _JS.'bootstrap.min.js';     
$js[] = _JS.'popper.min.js'; 
$js = apply_filters('filter_minify_js', $js);  
$js  = implode(', ', $js);  
$minifier = new Minify\CSS($bootstrap);
$jsminifier = new Minify\JS($js);    

    foreach($styles  as $style){
        $minifier->add($style);
    }
    
    
    
echo $jsminifier->minify($mainjs);
echo $minifier->minify($main);
    //wp_redirect('/');
    exit();

}