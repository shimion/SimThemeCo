<?php 
namespace ST\Providers;
use \ST\Base\Provider;

class FormData extends Provider
{
    private $data = [];    
    private $type;    
    private $wpdb; 
    private $post_type;
    private $post_id;
    
    function __construct($data, $formtype = 'default', $posttype = 'post') {
        global $wpdb; 
        $this->wpdb = $wpdb;
        $this->data = $data;
        $this->type = $formtype;
        $this->post_type = $posttype;
        //$this->buildPostArray();
        self::InsertPost();
        self::InsertMeta();
        self::ApplyAddition();
       // echo $this->post_id;
    }
    
    
    
    
    
    public function register(){
            return 'form-data-provider';
    }
    
        
     
    
    
    private function InsertPost(){
        if($this->type = 'post_submission')
        $this->post_id = wp_insert_post($this->buildPostArray());
    }
    
    
    private function InsertMeta(){
        if( $this->post_id ){
         if ( ! add_post_meta( $this->post_id, 'request_name', $this->data['name'] , true ) ) { 
                update_post_meta( $this->post_id, 'request_location', $this->data['location']  );
             
            }
            
           if($this->post_id)
               return $this->post_id;
        }   
    }
    
    
    
    
    private function ApplyAddition(){
        return apply_filters('Filters_After_Successfull_Call', $this->post_id, $this);
    }
    
    
   public function buildPostArray(){ 
            return array(
                  'post_title'    => wp_strip_all_tags( $this->data['name'] .' '. $this->data['location'] ),
                  'post_content'  => $this->data['comments'],
                  'post_status'   => 'publish',
                  'post_type' => 'request',
                  
                );
        } 
        
    
    
}