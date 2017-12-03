<?php
require _APP."vendor/autoload.php";
//require _APP."src//scss.inc.php";
//use ST\Scss\scssphp;
use Northwoods\Config\ConfigFactory;
use ST\Minify\Minifier;
use MatthiasMullie\Minify;
use \ST\Controller\Minifing;
use Philo\Blade;
use ST\Providers\SliderData;
use ST\App;
use ST\Helpers; // it helps to set data for config.php
use ST\Providers\DynamicSidebar;
use ST\Controller\Search;
use ST\Controller\DynamicContent;

use ST\Providers\WidgetCustomizer;
use ST\Helpers\CommentsWalker;
use ST\Providers\PostTypeProvider;
use ST\Providers\ButtonWidget;
use ST\Ajax\Ajax;
use ST\Helpers\Sidebar;
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



/*function Scss($style){
    if(empty($style)) return false;
    $scss = new scssphp();
    return $scss->compile($style);
}

function TheScss(){
    new scssphp();
   
}

*/


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
 * -f Post
 * -D Set extra fields for all the widgets
 * @param string/array $default
 */
add_action('wp_head', function(){
    new SliderData();
});



/**
 * -f WidgetCustomizer
 * -D Set extra fields for all the widgets
 * @param string/array $default
 */
add_action('init', function(){
    new WidgetCustomizer();
});




/**
 * -f Ajax Inisilize
 * -D Ini Ajax
 * @param string/array $default
 */
add_action('init', function(){
    new Ajax();
});




/**
 * -f Dynamic Sidebar Inisilize
 */
add_action('widgets_init', function(){
    new Sidebar();
});

/**
 * -f Dynamic COntent Inisilize
 */
add_action('widgets_init', function(){
    new DynamicSidebar();
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
        return apply_filters('search_form_filter', ST\Controller\Search::Form());
    }


/**
 * -f SearchForm()
 * -D Apply_filter to the_content to rander Dynamic Sidebar
 * @return string ST\Controller\Search::Form()
 */
add_filter('the_content', 'RanderContent');
function RanderContent($content){
        $html = apply_filters('FIlter_dynamic_content', ST\Controller\DynamicContent::RanderContent(get_the_ID()));
        $html .= $content;
        return $html;
    }



function GetDynamicContent(){
    global $post, $wp;
       $url = $_REQUEST['url'] ?? NULL;
       //parse_str( $_SERVER['HTTP_REFERER'], $url);
       $postID = url_to_postid( $url ) ?? $post->ID;
        //print_r( $wp);
        $meta = get_post_meta($postID, '_custom_page_options', true);
        $meta  = maybe_unserialize($meta);
        $customizer = $meta['customizer'];
    if($customizer){
        $array = [];
       // $array[$postID] = get_the_title($postID);
        $array[] = array(
              'name'          => 'sidebar-widgets-st-sidebar-'.$postID,   
              'title'         => 'Content Editor',
              'settings'      => array(

               )
            );
        return $postID;
        
        /*$content = maybe_unserialize(get_option( 'st_dynamic_content' )) ?? false;   
        //add_option( 'st_dynamic_content', maybe_serialize($customizer) );
            
            if( ! is_array($content) OR $content != false){

            }*/
        }
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


   
    add_filter('the_title', function($title){
         global $wp_query;
        if(is_singular() or ! $wp_query->in_the_loop) return $title;

        $title = Excerpt($title,  App::Config()->Get('global.title_limit'), '...');
        $title = sprintf('<a href="%s" >%s</a>', get_the_permalink(),  $title);
        if($title) return $title;
               
        }, 20);
    
    





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
 * -D add filter on get_the_archive_title to customize Archive title
 * @return string $title
 */
add_filter('get_the_archive_title', function($title){
   if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
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
 * -f function
 * -D add filter on Latest event listing widget to inject latest event widget utilities
 * @return string that built from widget $instance
 */

add_filter('Action_Latest_Event_listing', function($instance){
    //if( ! is_singular())
    return Helpers::GetLatestEvents($instance);
}, 20);


/**
 * -f function
 * -D add filter on Posts widget to inject latest posts widget utilities
 * @return string that built from widget $instance
 */

add_filter('Action_Post_Type', function($instance){
    //if( ! is_singular())
    return Helpers::GetPosts($instance);
}, 20);



/**
 * -f function
 * -D add filter on call to action widget to inject call to action utilities
 * @return string that built from widget $instance
 */

add_filter('Action_Call_To_Action', function($instance){
    //if( ! is_singular())
    return Helpers::GetCallToAction($instance);
}, 20);



/**
 * -f function
 * -D add filter on call to action widget to inject call to action utilities
 * @return string that built from widget $instance
 */

add_filter('Action_Featured_Box_Widget', function($instance){
    //if( ! is_singular())
    return Helpers::GetFeaturedBox($instance);
}, 20);


/**
 * -f function
 * -D add filter on form widget to inject call to action utilities
 * @return string that built from widget $instance
 */

add_filter('Action_Form', function($instance){
    //if( ! is_singular())
    return Helpers::GetForm($instance);
}, 20);


/**
 * -f function
 * -D add filter on slider widget to inject call to action utilities
 * @return string that built from widget $instance
 */

add_filter('Action_Sliders', function($instance){
    //if( ! is_singular())
    return Helpers::GetSlider($instance);
}, 20);



/**
 * -f function
 * -D add filter on call to action widget to inject call to action utilities
 * @return string that built from widget $instance
 */

add_filter('filter_AjaxData', function($data, $type, $init){
    //if( ! is_singular())
    return Helpers::ImportFormData($data, $type);
}, '3', 20);




/**
 * -f function
 * -D add filter on Latest Request listing widget to inject latest Request widget utilities
 * @return string that built from widget $instance
 */

add_filter('Action_Latest_Requests_listing', function($instance){
    //if( ! is_singular())
    return Helpers::GetLatestRequests($instance);
}, 20);



/**
 * -filter filter_copy_right_wapper
 * -D Footer coppyrightfilter
 * @param string $content
 * @return string
 */
add_filter('filter_copy_right_wapper', function($content){
    
    return sprintf('<p>%s</p>', $content);
    
}, 20);

/**
 * -filter filter_header_extra_text
 * -D Header filter for additional text
 * @param string $content
 * @return string
 */
add_filter('filter_header_extra_text', function($content){
    if(Helpers()->Option('enable_header_text'))
    return sprintf('<div class="header-custom-text pl-2 pr-2">%s</div>', $content);
    
}, 20);



/**
 * -filter action_nevigation_additional_elements
 * -D Header add elements to header menu section. can apply other elements via this filter beside menu/nevigation.
 * @param string $menu
 * @return string
 */
add_filter('action_nevigation_additional_elements', function($menu){
   // if(Helpers()->Option('enable_header_text'))
    return $menu . GetConfig('global.menu_text');
    
}, 20);


/**
 * -filter action_nevigation_additional_elements
 * -D Header filter for additional text
 * @param string $content
 * @return string
 */
add_filter('action_nevigation_additional_elements', function($menu){
   if(GetConfig('global.menu_search')){
    return $menu . Search::Data();
    }else{
       return $menu;
   }
}, 20);



/**
 * -filter action_nevigation_additional_elements
 * -D Header filter for additional text
 * @param string $content
 * @return string
 */
add_filter('action_nevigation_additional_elements', function($menu){
   if(GetConfig('global.menu_button_enable')){
    $data = array(
        'class' => sprintf('d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3 %s', GetConfig('global.button_class')),
        'link' => GetConfig('global.menu_button_link'),
        'text' => GetConfig('global.menu_button_text')
    );   
    return $menu . Helpers()->Button($data);
    }else{
       return $menu;
   }
}, 15);




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
   add_theme_support( 'customize-selective-refresh-widgets' ); 
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



/**
 * @param array $type, $tax
 * @param array $attributes
 * -D Register Post Type and Taxonomy
 * -Exm:  add_action('init', function(){
    $type = array(
        'name' => 'event',
        'slug' => 'events',
        'singular' => 'Event',
        'plural' => 'Events',
        'taxonomy_support' => true
        );
    $tax = array(
        'name' => 'type',
        'slug' => 'types',
        'singular' => 'Type',
        'plural' => 'Types',
    );
   PostType($type, $tax); 
});
 * @return Object PostType
 */

    function PostType($type = [], $tax){
        $type['taxonomies'] = $tax ?? '';
        $type['taxonomies']['post_type'] = $tax['post_type'] ?? $type['name'];
        new PostTypeProvider($type); 
    }


/**
 * -D Register Custom Widgets
 */
add_action( 'widgets_init', function(){
    $classes = ST\Widgets\init::init();
    foreach($classes as $class){
        register_widget( $class );
    }
}, 2 );





add_action('wp_footer', function(){
   echo sprintf('<style>%s</style>', apply_filters('filter_dynamic_css', GetConfig('global.dynamic_css')));
});




/*
Add Minify Script 
Run Via ajax call
example: http://mercer.simtheme.com/wp-admin/admin-ajax.php?action=Minify
*/
add_action( 'wp_ajax_Minify', 'Minify' );
add_action( 'wp_ajax_nopriv_Minify', 'Minify' );
function Minify(){
    $class = new Minifing();
    //print_r($class);
    exit();

}