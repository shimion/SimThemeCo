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
               return     wp_nav_menu(array( 
								
                                 'theme_location'  => 'main_nav',
                                 'container'       => '',
                                  'echo'           => false,
                                 'container_id'    => 'navbarSupportedContent',
                                 'container_class' => 'collapse navbar-collapse',
                                 'menu_id'         => false,
                                 'menu_class'      => 'navbar-nav mr-auto',
                                 'depth'           => 2,
                                 'fallback_cb'     => '\ST\bs4navwalker::fallback',
                                 'walker'          => new \ST\bs4navwalker
                                 
								
							));
            } 
    
    
        
    

        
}