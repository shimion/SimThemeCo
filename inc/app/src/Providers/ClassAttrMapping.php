<?php
namespace ST\Providers;
use ST\App;
class ClassAttrMapping(){
        private $class_name;
        public $button;
        

         public function __construct(){  
                
                $this->button =  App::Config()->Get('global.button_class');
                 
            }

        // @pram $type string 
        // return string
        private function Set($class_name){
             $this->class_name = $class_name;
            if(empty($this->{$class_name})) return false;
            return $this->{$class_name};
        }    
    
    
        public static function Get($name){
            print($name);
            self::Set($name);
        }
        


}