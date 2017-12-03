<?php 
namespace ST\Base;
use ST\Base\Core;
use \ST\Providers\StyleProvider;
use \ST\Providers\ScssProvider;
abstract class Utilities extends Core
{
    protected $instance;
    public $data = [];
    protected $register;   
    protected $path;
    protected $path_url;
    protected $file;
    protected $css = [];
    protected $sid;
    
    public function __construct($DATA){
        $this->register = $this->register();
        $this->path = 'utilities/';
        $this->path_url = _VIEW. 'utilities/';
        $this->file = $this->path.$this->register;
        $this->data = $DATA;
       // $this->sid = $this->data['sid'];
        $this->sid = sprintf('#%s', $this->sid);
        if(!empty($this->Css()) && is_array($this->Css())){
          $styleprovider =  new StyleProvider($this->Css());
          
        }
        
        if(!empty($this->Scss())){
          $styleprovider =  new ScssProvider($this->Scss());
          
        }
        
        
         
        
        
         }
   
    public static function get_instance(){
            if( is_null( self::$instance ) ){
                self::$instance = new self( $_REQUEST );
            }

            return self::$instance;
        }   
    

    
        public function register(){
            
            }
    
	/**
	 * Initialize this widget in whatever way we need to. Run before rendering widget or form.
	 */
	function initialize(){

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
    
    
        public function Css(){
            return [];
        }

        public function Scss(){
            return '';
        }

        public function StyleSheet(){
                add_filter('filter_minify_css', array($this, 'StyleSheet'), 10, 1);
        }
    
}