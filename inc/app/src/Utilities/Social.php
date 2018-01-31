<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;

class Social extends Utilities
{
    public $data;
     
    public function __construct($DATA){
        parent::__construct($DATA);
      
        $this->data = $this->Set();
        
        //print_r( $this->data);
        }
   
    public function register(){
                return 'social';
            }
    
        public function Set(){
                $Array = [];
                $Array = $this->data ?? GetConfig('social');
            return $Array;
            }
    
}