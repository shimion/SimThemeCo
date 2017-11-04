<?php 
namespace ST\Base;
use    ST\Base\Core;
abstract class Provider extends Core
{
        private $data;
        
     	public function __construct(){
            
                   
                    $this->Register();
                   
            
            }
    
    
        public function register(){
            
            }
 
    
        public function buildArray(){
            
        }
      public static function getData($arg){
             $this->data = $arg;
        }
}