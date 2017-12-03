<?php 
namespace ST\Providers;
use ST\Base\Provider;

class StyleProvider extends Provider
{
    
    protected $style = [];
    protected $config = [];

    
    
        public function __construct($style){ 
            $this->Get($style);
            add_filter('filter_dynamic_css', array($this, 'Set'), 1);
        }
    
     
    
    
    public function Set($style){
           
             return $style . $this->GenerateDynamicCss();
        }
    
    
    
    public function Get( $style){
        
        $this->style = array_merge($this->style, $style);
        //print_r($this->style);
    }
    
    
    public function GenerateDynamicCss(){
    $css = [];
    $output = '';
        $css = $this->style;
       // print_r($css);
        foreach($css as $key => $value){
            if( !empty($key) && !empty($value)){ 
                    if(is_array($value)){
                        $ot = '';
                        foreach($value as $k=>$v){
                            $ot .= sprintf('%s:%s;', $k, $v);
                        }
                        $value = $ot;
                    }
                    $output .= sprintf('%s{%s}', $key, $value);
                }
            }
    
    //$output = sprintf('<style>%s</style>', $output);
    return $output;
    }
    
    
    
    
}