<?php 
namespace ST\Controller;
use \ST\Base\Base;
use Northwoods\Config\ConfigFactory;
class Config extends Base{
    protected static $instance;
    private $data;
    private $config;
    
    
      public static function get_instance(){
            if( is_null( self::$instance ) ){
                self::$instance = new self( $_REQUEST );
            }

            return self::$instance;
        }   
    
    
    
    	public function __construct(){
            
                    $this->data = new ConfigFactory();
            
               $this->config = $this->data::make([
                    'directory' => _INC . 'config',
                ]); 
            
            }
    
            
    
        public static function Data(){
            
        }
    
        public function register(){
            return 'config';
        }
    
    
        public function Get($get){
            return $this->config->get($get);
        }
    

       public function Set($set, $value){
            return $this->config->set($set, $value);
        }
    

} 