<?php 
namespace ST\Providers;
use \ST\Base\Provider;
class DynamicSidebar extends Provider{
    public $class_attr;
   // $instance = apply_filters( 'widget_display_callback', $instance, $this, $args );
    private $postID;
    private $postTitle;
    private $permission;
    private $sidebars = [];
    private $option = [];
    private $entry = [];
    public $fields = [];
    
    public function __construct() {
       global $post;
         $this->fields = array('before_widget' => '<div id="widget-area" class="widget-area" role="complementary">','before_title' => '<h2 class="widget-title">','after_widget' => '</div>', 'after_widget' => '</h2>' );
        $this->option = GetConfig('global.dynamic_widgets') ?? false;
        
       // add_action( 'widgets_init', array(self, 'RegisterSidebar') );
        add_action( 'save_post', array($this, 'RegisterPagesForDynamicContent') );
        $this->init();
       // print_r($this->Option());
       
	}
	
    
    
    public function Option(){
        return $this->option;
    }
    
    
    	/**
	 * Register Dynamic sidebar depends on page posts settings.
	 */
	public function init(){ 
       
        if(!empty($this->option) && is_array($this->option)){
           // print_r($this->option);
			foreach($this->option as $value){
             //  print_r($value);
              //  $this->fields['name'] = $value;
                $this->fields['id'] = $value['id'];
                $this->fields['name'] = $value['name'];
                $this->fields['description'] = $value['description'];
                register_sidebar(  $this->fields );
            }	
            
        
        }
			
	}
    
    
    
     
   public function register(){
            return 'dynamic-sidebar';
    }
    
    
    public function RegisterPagesForDynamicContent($post_id){
        if(empty($post_id)) return error_log($post_id);;
       // error_log($post_id);
        $meta = [];
        $this->postID = $post_id ?? get_the_ID();
        $this->postTitle = get_the_title( $post_id );
        $meta = get_post_meta($post_id, '_custom_page_options', true) ?? false;
       // error_log($meta);
       // print_r($meta);
        $meta  = maybe_unserialize($meta);
        if(empty($meta) or ! is_array($meta))  return false;
        $this->permission = !empty($meta['customizer']) ? $meta['customizer'] : false;
        //add_post_meta($post_id, 'post-meta-option', $meta['customizer'], false);
        if($this->permission){
            if ( ! add_post_meta( $post_id, '_st-page-builder', get_the_title($post_id), true ) ) { 
               update_post_meta( $post_id, '_st-page-builder', get_the_title($post_id) );
            }
        }else{
             delete_post_meta( $post_id, '_st-page-builder');
            
        }
        
        
    }
    
    
    private function NewOption($post_id){
        $array = [];
       // $array[$post_id] = $post_id;
        $array[$post_id] = get_the_title($post_id);
        print_r($this->Option());
        if(array_key_exists($post_id, $this->Option())) return false;
        if(empty($this->option) or $this->option == false) return $array;
        return array_merge($this->option, $array);  
        
        
    }
    

    private function Entry($post_id){
        
        if(! empty($post_id) && $post_id != 0 ){
            if($this->permission == true)
                $this->entry[$post_id] = $this->postTitle;
        }
         
        
        
    }
    


	
}
