<?php 
namespace ST;
use \ST\Providers;
use ST\Providers\FormData;
use ST\Utilities\Button;
use ST\Utilities\LatestEvents;
use ST\Utilities\LatestRequests;
use ST\Utilities\CallToAction;
use ST\Utilities\FeaturedBox;
use ST\Utilities\Form;
use ST\Utilities\Posts;
use ST\Utilities\Pagination;
class Helpers
{
    
    protected static $instance;
    public $site =  [];
    private $image = [];
    private $post =  [];
    private $config =  [];
    public $logo =  []; 
    public $header_top =  []; 
    private $layoutprovider =  []; 
    
    
    
         public static function get_instance(){
            if( is_null( self::$instance ) ){
                self::$instance = new self( $_REQUEST );
            }

            return self::$instance;
        }   
    
 
    
    
    
    public function __construct(){
        global $post;
        
        $this->config = Config();
        $this->site['url'] = get_bloginfo('url');
        $this->site['name'] = !empty(cs_get_customize_option( 'site_title' )) ? cs_get_customize_option( 'site_title' ) : get_bloginfo('name');
        $this->site['description'] = !empty(cs_get_customize_option( 'site_tagline' )) ? cs_get_customize_option( 'site_tagline' ) : get_bloginfo('description');
        $this->post = $post;
       
        $this->logo = self::Logo();
        $this->logo .= self::DisplayTitleTag();
        $this->header_top = self::DisplayHeaderTop();
       // $this->header_top['enable'] = self::DisplayHeaderTop();
        $this->layoutprovider  = cs_get_customize_option( 'header_top_wapper' ) ?? NULL;
        }
    
    
    public static function Query(){
        global $wp_query;
        return $wp_query;
    }
    

    public function Favicon(){
        
    }
    
    public function Logo(){
        $this->image['id'] = NULL;
        $this->image['href'] = $this->site['url'];
        $this->image['size'] = 'full';
        $this->image['url'] = cs_get_customize_option( 'logo' ) ?? '';
         $this->image['display'] = 'NULL';
        return self::Image();
    }
 
       
   public static function SideBar($name){
        ob_start();
       
        dynamic_sidebar( $name);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
     

    
    public function EnableSidebar(){
        $enable = true;
        if(is_home() or is_page_template('home.php')){
             $enable = self::option('enable_sidebar_homepage');
        }
        
        return $enable;
    }
    
    
    public static function option($data){
        if($data){
            if(function_exists('cs_get_customize_option')){
                return cs_get_customize_option($data);
            }else{
              return  get_option($data);
            }
        }
            
    }
    
    
    public function DisplayHeaderTop(){
        $this->layoutprovider = new \ST\Providers\LayoutProvider();
        return $this->layoutprovider->getData ?? NULL;
    }
    
    
    
    
    public static function ExcerptLimit(){
        return self::option('excerpt_limit') ?? 50;
    }
    

    public static function TitleLimit(){
        return self::option('title_limit') ?? NULL;
    }
    

    public static function ReadMoreText(){
        return self::option('readmore_text') ?? 'Read More';
    }
    

    
    
    
    public function DisplayTitleTag(){
        if(cs_get_customize_option( 'switcher_title_tagline' ) != false)
       return sprintf('<div class="site-title-description-wapper">%s <span>%s</span></div>', $this->site['name'], $this->site['description']);
    }
    
    public static function Button($data){
            $button = new Button($data);
            return $button->output();
    }
    
    public static function GetLatestEvents($data){
            $LatestEvents = new LatestEvents($data);
           return $LatestEvents->output();
    }
    

   public static function GetLatestRequests($data){
            $LatestRequests = new LatestRequests($data);
           return $LatestRequests->output();
    }
    

    
   public static function GetCallToAction($data){
            $LatestRequests = new CallToAction($data);
           return $LatestRequests->output();
    }
    

   public static function GetFeaturedBox($data){
            $FeaturedBox = new FeaturedBox($data);
           return $FeaturedBox->output();
    }
    

   public static function GetForm($data){
            $LatestRequests = new Form($data);
           return $LatestRequests->output();
    }
    
   public static function GetPosts($data){
            $LatestRequests = new Posts($data);
           return $LatestRequests->output();
    }
    

    
   public static function ImportFormData($data, $type){
        $data =  new  \ST\Providers\FormData($data, $type, 'request');
       //print_r(Collect($data));
        return Collect($data);
    }
    

    

    public static function Pagination($data){
        $Pagination = new Pagination($data);
            return $Pagination->output();
    }
    

    
   public static function RestrictSidebar(){
       
        $enable_sidebar = false;
        if(self::Query()->is_home() or self::Query()->is_front_page() or self::Query()->is_post_page)
        $enable_sidebar = self::Option('disable_sidebar');
       
       return $enable_sidebar;
    }
    

    
    public function GetImageUrlByImageId(){
        $image = wp_get_attachment_image_src( $this->image['id'] , $this->image['size'] );
        $this->image['url'] = $image[0];
    }
    
    
    public function Image(){
        
        if(empty($this->image['url'])) return false;
        $image = sprintf('<img src="%s" />', $this->image['url']);
        if(!empty($this->image['href']))
            $image = sprintf('<a href="%s">%s</a>', $this->image['href'], $image);
        if(!empty($this->image['container']))
            $image = sprintf('<%s>%s</%s>', $this->image['container'], $image, $this->image['container']);
        if(!empty($image))
            return $image;
        
    }
    
    public function CustomStyle(){
        return   get_option( 'print_styles' );
    }
    
    
    
    
    public function GetAllDynamicWidget(){
            global $wpdb; 
            $result = [];
                $query = $wpdb->get_results( 
                    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key=%s", '_st-page-builder') 
                 );
            if(!empty($query) && is_array($query)){
                foreach($query as $sidebar){
                    $result[] = array('id' => 'st-sidebar-'.$sidebar->post_id, 'name' => $sidebar->meta_value, 'description' => __( "This sidebar section is used for $sidebar->meta_value Body Content ." ));
                }
                
            }
          //  $result = Collect($result);
            return $result;
        
        
    }
    
    
}