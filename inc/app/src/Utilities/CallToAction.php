<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;

class CallToAction extends Utilities
{
    public $data;
     
    public function __construct($DATA){
        parent::__construct($DATA);
      
        $this->data['Action'] = $this->Set();
        }
   
    public function register(){
                return 'call-to-action';
            }
    
        public function Set(){
                $Array = $this->data;
                $Array['title'] = $this->data['heading'] ?? '';  
                $Array['btn'] = $this->data['button_text'] ?? ''; 
                $Array['content'] = $this->data['content'] ?? '';
                $Array['url'] = $this->data['button_url'] ?? '';
             return $Array;
            }
    
    
    
      
    
    
    
    
}