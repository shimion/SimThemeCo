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
                $Array = [];
                $Array['text'] = $this->data['button_text'] ?? '';
                $Array['url'] = $this->data['button_url'] ?? '';
                $Array['addition'] = $this->data['additional_text'] ?? '';
            //print_r($Array);
            return $Array;
            }
    
}