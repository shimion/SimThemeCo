<?php 
namespace ST\Controller;
use \ST\Base\Base;
use \ST\bs4navwalker;
class Nevi extends Base{
    
    private $postID;
    private $menu_array = array();
    private $data = array();
    
    public function __construct(){      
            $this->postID = get_the_ID();  
        }
    
        public function register(){
            return 'menu';
    }
    

    
      public static function Data(){ 
               $return =     wp_nav_menu(array( 
								
                                 'theme_location'  => 'main_nav',
                                 'container'       => '',
                                  'echo'           => false,
                                 'container_id'    => 'navbarSupportedContent',
                                 'container_class' => 'collapse navbar-collapse',
                                 'menu_id'         => false,
                                 'menu_class'      => 'navbar-nav ml-auto mr-0',
                                 'depth'           => 2,
                                 'items_wrap'     => self::Filters(),
                                 'fallback_cb'     => '\ST\bs4navwalker::fallback',
                                 'walker'          => new \ST\bs4navwalker
                                 
								
							));
          
                return apply_filters('action_nevigation_additional_elements', $return);
          
            
          
            } 
    
    
    public static   function Filters(){
        $html = '<ul id="%1$s" class="%2$s">%3$s</ul>';
         return   apply_filters('filter_menu_implementation', $html);
       } 
    

        
}