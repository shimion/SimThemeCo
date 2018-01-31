<?php 
namespace ST\Providers;
use ST\Base\Provider;
use \ST\Less\Less;

class LessProvider extends Provider
{
    
    protected $style = [];
    protected $config = [];
    protected $less;
     protected $sid;
    
    
        public function __construct($less, $var){ 
            
           //$this->Get($less);
           
            $this->Get($less, $var);
            add_filter('filter_dynamic_css', array($this, 'Set'), 1);
        }
    
     
    
    
        public function Set($style){
           
             return $style . $this->style;
        }
    
    
    
        public function Get( $css, $var ){
        $this->less = new Less($css, $var);
        $this->style = $this->less->Build();
        //print_r($this->style);
        }
    
    public function SetId(){
        $this->less->registerFunction("sid", function () {
            $args = '';
			$args = apply_filters('SS_Test', $args);
			return $args;
		});
    }
    
    
    
}