<?php 
namespace ST\Providers;
use ST\Base\Provider;
require _APP."src/Scss/scss.inc.php";
use scssc as ScssPHP;
class ScssProvider extends Provider
{
    
    protected $style = [];
    protected $config = [];
    protected $scss;
     protected $sid;
    
    
        public function __construct($scss){ 
            
           //$this->Get($scss);
           
            $this->Get($scss);
            add_filter('filter_dynamic_css', array($this, 'Set'), 1);
        }
    
     
    
    
        public function Set($style){
           
             return $style . $this->style;
        }
    
    
    
        public function Get( $css ){
            $this->scss = new ScssPHP();
             $this->SetId();
        $this->style = $this->scss->compile($css);
        //print_r($this->style);
        }
    
    public function SetId(){
        $this->scss->registerFunction("sid", function () {
            $args = '';
			$args = apply_filters('SS_Test', $args);
			return $args;
		});
    }
    
    
}