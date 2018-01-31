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
          
          if(!is_user_logged_in()){
              wp_redirect(GetConfig('account.login_page')); exit();
          }else{
              
          }
            
        }
    
    
    private function GetPageAccessability(){
            $data = get_post_meta($this->post->ID, '_custom_page_options', false);
            $data = Collect($data);
            $this->restriction = $data['restriction'] ?? $this->restriction;
            $this->role  =  $data['select_user_role'];
    }
    
    
    
    
}

