<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;

class Button extends Utilities
{
    public $data;
     
    public function __construct($DATA){
        parent::__construct($DATA);
      
        //echo $this->file;
        }
   
    public function register(){
                return 'button-link';
            }
    
    
    
    
}