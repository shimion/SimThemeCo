<?php 
namespace ST\Controller;
use \ST\Base\Base;
use \ST\bs4navwalker;
class FooterNevi extends Base{
    
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
								
                                 'theme_location'  => 'footer_links',
                                 'container'       => '',
                                  'echo'           => false,
                                 'menu_id'         => false,
                                 'menu_class'      => 'footer_menu',
                                
                                 
								
							));
            } 
    
    
        
    

        
}