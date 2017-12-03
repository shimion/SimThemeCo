<?php 
namespace ST\Controller;
use \ST\Base\Base;
use \MatthiasMullie\Minify;
class Minifing {
   protected static $instance; 
    protected $styles = [];
    protected $scripts = [];
    protected $option = [];
    protected $data = [];
    private $option_name;
    public $default = [];
    public $main = [];
    public static function get_instance(){
            if( is_null( self::$instance ) ){
                self::$instance = new self( $_REQUEST );
            }

            return self::$instance;
        }   
  


    
    public function __construct(){
            
            $this->main['css'] = _CSS.'main.min.css';
            $this->main['js'] = _JS.'main.min.js';
            $this->default['css'] = _CSS .  'bootstrap.css';
            $this->default['js'] = _JS   .    'popper.min.js' ;
            //$this->styles['bootstrap'] = _CSS.'bootstrap.css';
            $this->styles['font-awesome'] = _CSS.'font-awesome.min.css';
            $this->styles['style'] = _CSS.'style.css';
            $this->styles['header'] = _CSS.'header.css';    
            $this->styles['wp'] = _CSS.'wp.css';
            $this->styles['form'] = _CSS.'form.css';
            $this->styles['loading'] = _CSS.'loading.css';
            $this->styles['post'] = _CSS.'post.css';
            $this->styles['comments'] = _CSS.'comments.css';
            $this->styles['wp-calender'] = _CSS.'wp-calender.css';
            $this->styles['sidebar'] = _CSS.'sidebar.css';
            $this->styles['footer'] = _CSS.'footer.css';
            /* Load all control css here */  
            $this->styles['search'] = _CSS.'search.css';  
           // $this->styles = apply_filters('filter_minify_css', $this->styles);  
            
        
            //$this->scripts['popper'] =  _JS.'popper.min.js';   
            $this->scripts['bootstrap'] =  _JS.'bootstrap.min.js'; 
            $this->scripts['simthemeco'] =  _JS.'simthemeco.js';  
            $this->option_name = 'st-scripts-register';
            $this->option = Collect(unserialize (get_option( $this->option_name ))) ?? false;
            $this->data['css'] = $this->styles;
            $this->data['js'] = $this->scripts;
            
           $this->SaveScripts();
           $this->GetMinified();
        
            
       
        }
    
    
    
    
    public function register(){
            return 'scripts';
        }
    
     
    
    public function SaveScripts(){
        
            if ( $this->option !== false ) {
                // The option already exists, so we just update it.
                update_option( $this->option_name, serialize ($this->data) );
            } else {
                // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
                $deprecated = null;
                $autoload = 'no';
                add_option( $this->option_name, serialize ($this->data), $deprecated, $autoload );
            }
    }
    
    public function GetMinified(){
        
        $minifier = new Minify\CSS($this->default['css']);
        $jsminifier = new Minify\JS($this->default['js']); 

        $css = $this->option['css'] ?? $this->styles;
       // print_r($css);
        $js = $this->option['js'] ?? $this->scripts;
        foreach($css  as $key => $style){
            $minifier->add($style);
        }

       foreach($js  as $key => $j){
            $jsminifier->add($j);
        }
    
       echo  $jsminifier->minify($this->main['js']);
       echo  $minifier->minify($this->main['css']);

    }
    
    
    public static function Data(){ 
              
        } 
    
    
    
    
}