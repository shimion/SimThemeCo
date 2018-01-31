<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;

class Slider extends Utilities
{
    public $data;
     
    public function __construct($DATA){
        parent::__construct($DATA);
        
        $this->data['Action'] = $this->Set();
        
        }
   
    public function register(){
                return 'slider';
            }
    
        public function Set(){
                $Array = $this->data;
                $Array['title'] = $this->data['heading'] ?? '';
                $Array['pagination'] = $this->data['pagination'] ?? true;
                $Array['arrow'] = $this->data['arrow'] ?? true;  
                $Array['paralax'] = $this->data['paralax'] ?? false;
                $Array['sliders'] = maybe_unserialize($this->data['slider'] ?? ''); 
        // print_r($Array['sliders']);
             return $Array;
            }
    
    
    
      
    
    
    
    
}