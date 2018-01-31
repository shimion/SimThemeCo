<?php 
namespace ST\Controller;
use \ST\Base\Base;
class DynamicContent extends Base{
    
    private $postID;
    private $postTitle;
    private $permission;
    private $data = array();
    public function __construct(){   
        global $post;
        $this->postID = $post->ID ?? get_the_ID();
        $this->postTitle = $post->post_title ?? get_the_title(get_the_ID());
        $this->permission = get_post_meta($post->ID, 'customizer') ?? false;
        }
    
    public function register(){
            return 'dynamic-content';
    }
    
     public static function Data(){ 
            
            } 
    
    
     public static function RanderContent(){ 
                global $post;
                ob_start();
                dynamic_sidebar('st-sidebar-' . $post->ID);
                $content = ob_get_contents();
                ob_end_clean();
               // $content .= $post->ID;
                return $content;
            } 
    
    
        
    

        
}