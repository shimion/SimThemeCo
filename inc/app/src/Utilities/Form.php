<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;

class Form extends Utilities
{
    public $data;
     
    public function __construct($DATA){
        parent::__construct($DATA);
       $this->data['Form'] = $this->Set();
         }
   
    public function register(){
                return 'form';
            }
    
        public function Set(){
                $Array = [];
                $Array['button_text'] = $this->data['button_text'] ?? '';
                $Array['thank_you_url'] = $this->data['thank_you_url'] ?? '';
            return $Array;
            }
   
    
    
}