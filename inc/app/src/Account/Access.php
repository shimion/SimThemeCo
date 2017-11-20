<?php 
namespace ST\Account;

class Access
{
    // User
    private $User = [];
    private $post = [];
    private $redirection;
    private $role;
    
    
      public function __construct(){
          global $post, $wp_query;
          self::GetPageAccessability();
          if(is_user_logged_in())
            $this->User = wp_get_current_user();         
          if(is_singular() or is_single() or is_home() )
            $this->post = $post;
           $this->restriction = false;
        }
    
    
    private function GetPageAccessability(){
            $data = get_post_meta($this->post->ID, '_custom_page_options', false);
            $data = Collect($data);
            $this->restriction = $data['restriction'] ?? $this->restriction;
            $this->role  =  $data['select_user_role'];
    }
    
    
    
    
}