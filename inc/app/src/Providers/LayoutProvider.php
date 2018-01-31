<?php 
namespace ST\Providers;
use \ST\Base\Provider;

class LayoutProvider extends Provider
{
        
    
    
    public function register(){
            return 'layout-provider';
    }
    

     
    
    
    public function buildArray(){ 
        if(!empty( $this->data) && is_array( $this->data)){
                foreach( $this->data as $layout){
                    $arrg[] = $layout;
                }
            }
        
        if(!empty($arrg) && is_array($arrg)){
            print_r($this->data);
            return $this->data;
            }
        } 
        
    
    
}