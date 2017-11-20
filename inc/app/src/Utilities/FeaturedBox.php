<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;

class FeaturedBox extends Utilities
{
    public $data;
     
    public function __construct($DATA){
        parent::__construct($DATA);
      
               $this->data['Featured'] = $this->Set();
        }
   
    public function register(){
                return 'featured-box';
            }
    
         public function Set(){
                $Array = [];
                $Array['text'] = $this->data['text'] ?? '';
                $Array['image'] = $this->data['image'] ?? '';
                $Array['link'] = $this->data['link'] ?? '';
                $Array['button_text'] = $this->data['button_text'] ?? '';
                $Array['social_share'] = $this->data['social_share'] ?? false;
            //print_r($Array);
            return $Array;
            }
   
    
    
    
     
    
}