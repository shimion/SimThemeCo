<?php 
namespace ST\Base;
use ST\Base\Core;
use \ST\Utilities\Social;
use \ST\Providers\StyleProvider;
use \ST\Providers\ScssProvider;
use \ST\Providers\LessProvider;
class Modules extends Core
{
    protected $instance;
    public $data = [];
    protected $register;   
    protected $root;
    protected $root_url;
    protected $scripts;   
    protected $styles; 
    protected $options;
    protected $module_path;
    protected $file;
    public $sid;
    
    public function __construct($instence){
        $this->data['Instence'] = $instence;
        $this->data['customizer'] = get_option('_cs_customize_options');
        //$this->data['query'] = $query;
        $this->register = $instence['module_name'] ?? false; //$args['register']
        if($this->register == false) return false;
        $this->Get();
        $this->root = 'modules/'.$this->register. '/'; 
        $this->root_url = _VIEW. 'modules/'.$this->register . '/';
        $this->assets = VIEW. 'modules/'.$this->register . '/';
        $this->file = $this->root .  'view';
        $this->scripts =  'js/script.js';
        $this->styles =  'css/style.css';
        $this->sid = sprintf('#%s', $this->sid);
        $this->EnqueryScript();
        print_r($this->data);
        
         
        
        
         }
   
    public static function get_instance(){
            if( is_null( self::$instance ) ){
                self::$instance = new self( $_REQUEST );
            }

            return self::$instance;
        }   
    
            
        public function Output(){ 
                if(file_exists( $this->root_url )){
                    return Blade($this->file, $this->data);
                }else{
                    echo $this->file;
                  echo  var_dump($this->data);
                }
            } 
    
        public function Get(){
             $social = new Social($this->data);  
            $this->data =     array('Socials' => $social->data);
            }
    
    
    
    protected function EnqueryScript(){
            if($this->CheckFile($this->root_url. $this->scripts))
                wp_enqueue_script( $this->register,  $this->assets.$this->scripts, array(), VERSION, true );
            if($this->CheckFile($this->root_url.$this->styles))
                wp_enqueue_style( $this->register,  $this->assets.$this->styles, array(), VERSION, true );
        
        
    }
    
    
       public function CheckFile($url){
                if(file_exists( $url )){
                    return true;
                }else{
                    return false;
                }
            }
    
    
        public function Set(){
                    
            }
    
    
        public function Css(){
            return [];
        }
    
        public function Settings(){
            return [];
        }

        public function Scss(){
            return '';
        }

        public function Less(){
            return '';
        }

        public function StyleSheet(){
                add_filter('filter_minify_css', array($this, 'StyleSheet'), 10, 1);
        }
    
}