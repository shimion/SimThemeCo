<?php 
namespace ST\Base;
use ST\Base\Core;
use \ST\Providers\StyleProvider;
use \ST\Providers\ScssProvider;
use \ST\Providers\LessProvider;
use \ST\Controller\Layout;
abstract class Utilities extends Layout
{
    protected $instance;
    public $data = [];
    protected $register;   
    protected $path;
    protected $path_url;
    protected $file;
    protected $css = [];
    public $sid;
    
    public function __construct($DATA){
       
        $this->register = $this->register();
        $this->path = 'utilities/';
        $this->path_url = _VIEW. 'utilities/';
        $this->file = $this->path.$this->register;
        $this->data = $DATA;
       
        //print_r($this->data);
         parent::__construct($DATA);
         
        
        
         }
   
    public static function get_instance(){
            if( is_null( self::$instance ) ){
                self::$instance = new self( $_REQUEST );
            }

            return self::$instance;
        }   
    

    
        public function register(){
            
            }
         
        public function Output(){ 
                if(file_exists( $this->path_url )){
                    return Blade($this->file, $this->data);
                }else{
                    //echo $this->file;
                 // echo  var_dump($this->data);
                }
            } 
    
        public function Get(){
        
            }
    
    
        public function Set(){
                    return $this->data;
            }
    
        public function StyleSheet(){
                add_filter('filter_minify_css', array($this, 'StyleSheet'), 10, 1);
        }
    
}