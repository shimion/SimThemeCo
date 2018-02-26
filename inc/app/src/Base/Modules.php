<?php 
namespace ST\Base;
use ST\Base\Core;
use \ST\Providers\StyleProvider;
use \ST\Providers\ScssProvider;
use \ST\Providers\LessProvider;
use ST\App;
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
        $this->instence = $instence;
        $this->data['customizer'] = get_option('_cs_customize_options');
        $this->data['title'] = $this->instence['title'] ?? '';
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
        if($this->register){
        $this->EnqueryScript();
        }
        
        
         
        
        if(!empty($this->Less())){
          $styleprovider =  new LessProvider($this->Less(), $this->Settings());
          
            }
       
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
                 // echo  var_dump($this->data);
                }
            } 
    
        public function Get(){

                $this->data['Socials'] = GetConfig('social');
                $this->data['sid'] = $this->instence['sid'] ?? uniqid('section_');
                $this->data['class'] = $this->GetClass();
                $this->data['content'] = $this->instence['content'] ?? '';
                $this->data['App'] = App::Data();
                $this->data['ExtraData'] = $this->ExtraData();
                $this->data['Container'] = $this->TitleContent();
                $this->data['Attr'] = $this->getAttr();
                $this->data['Data'] = $this->instence;
                $this->sid = sprintf('#%s', $this->data['sid']);
            }
    
    
    
    protected function EnqueryScript(){
            if($this->CheckFile($this->root_url. $this->scripts)){
             
                wp_enqueue_script( $this->register,  $this->assets.$this->scripts, array(), VERSION, false );
        }
         
        
            if($this->CheckFile($this->root_url.$this->styles)){
                
                wp_enqueue_style( $this->register,  $this->assets.$this->styles, array(), VERSION, false );
            }
        
    }
        
    protected function GetClass(){
        $class = $this->instence['section_additional_class'] ?? '';
        $enable = $this->instence['section_enable_animation'] ?? false;
        if($enable){
            $class .= ' wow fadeIn';
        }
        
        return $class;
        
    }
    
    
        public function ExtraData(){
            if(!empty($this->instence['enable_paralax_overlay']) && $this->instence['enable_paralax_overlay'] != false){
                $html = sprintf('<div class="%s"></div>', 'st_overlay_css');
                return $html;
            }
            
        }
    
       public function CheckFile($url){
                if(file_exists( $url )){
                    return true;
                }else{
                    return false;
                }
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

        public function Less(){
            return '#'.$this->data['sid'].' {
                padding-top: @section_padding_top !important;
                padding-bottom: @section_padding_bottom !important;
                margin-top: @section_margin_top !important;
                margin-bottom: @section_margin_bottom !important;
                background-image: @section_background_image !important;
                background-color: @section_background_color !important;
                background-repeat: @section_background_repeat;
                background-position: @section_background_position;
                background-attachment: @section_background_attachment;
                background-size: @section_background_size;
                border-left: @border_left;
                border-top: @border_top;
                border-right: @border_right;
                border-bottom: @border_bottom;
                border-color: @border_color;
                border-style: solid;
                color: @section_color;
                position: @section_position;
                h2.section-title{
                    color: @section_title_color;
                    text-align: @title_aligment;
                    margin-bottom: 0;
                    padding-bottom: 0;
                    display: block;
                }
                .section-content{
                    color: @section_color;
                    text-align: @text_aligment;
                    padding-bottom: @section_content_bottom_space;
                    display: block;
                }
                p{color: @section_color;}
                .btn.btn-primary{ background:  @section_link_color;}
                .btn.btn-primary:hover{ background:  @section_link_color_hover;}
                .st_overlay_css{
                    background-color: @paralax_overlay_color;
                    background-attachment: fixed;
                    background-size: auto;
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    z-index: -1;
                    opacity: @paralax_overlay_opacity;
                }
            }';
        }

    
    
        public function Settings(){
            return array(
                'section_padding_top' => !empty($this->instence['section_padding_top']) ?  $this->instence['section_padding_top'] : 'inherit',
                'section_padding_bottom' => !empty($this->instence['section_padding_bottom']) ?  $this->instence['section_padding_bottom'] : 'inherit',
                'section_margin_top' => !empty($this->instence['section_margin_top']) ?  $this->instence['section_margin_top'] : 'inherit',
                'section_margin_bottom' => !empty($this->instence['section_margin_bottom']) ?  $this->instence['section_margin_bottom'] : 'inherit',
                'section_background_image' =>!empty($this->instence['section_background_image']) ?  $this->instence['section_background_image'] : 'inherit',
                'section_background_color' => !empty($this->instence['section_background_color']) ?  $this->instence['section_background_color'] : 'inherit',
                'section_background_repeat' => !empty($this->instence['section_background_repeat']) ?  $this->instence['section_background_repeat'] : 'inherit',
                
                
                'section_background_position' => !empty($this->instence['section_background_position']) ?  $this->instence['section_background_position'] : 'inherit',
                
                
                'section_background_size' => !empty($this->instence['section_background_size']) ?  $this->instence['section_background_size'] : 'inherit',
                
                
                
                'section_background_attachment' => !empty($this->instence['section_background_attachment']) ?  $this->instence['section_background_attachment'] : 'inherit',
                
                'section_margin' => !empty($this->instence['section_margin']) ?  $this->instence['section_margin'] : 'inherit',
                
                'section_padding' => !empty($this->instence['section_padding']) ?  $this->instence['section_padding'] : 'inherit',
                 'section_title_color' => !empty($this->instence['section_title_color']) ?  $this->instence['section_title_color'] : 'inherit',
                 'section_color' => !empty($this->instence['section_color']) ?  $this->instence['section_color'] : 'inherit',
                'border_top' => (!empty($this->instence['border_position_top']) && $this->instence['border_position_top'] == true) ? $this->instence['border_size']  : '0',
                'border_right' => (!empty($this->instence['border_position_right']) && $this->instence['border_position_right'] == true) ? $this->instence['border_size']  : '0',
                'border_bottom' => (!empty($this->instence['border_position_bottom']) && $this->instence['border_position_bottom'] == true) ? $this->instence['border_size']  : '0',
                'border_left' => (!empty($this->instence['border_position_left']) && $this->instence['border_position_left'] == true) ? $this->instence['border_size']  : '0',
                'border_color' => (!empty($this->instence['border_color'])) ? $this->instence['border_color']  : 'none',
                'title_aligment' => (!empty($this->instence['title_aligment'])) ? $this->instence['title_aligment']  : 'none',
                'text_aligment' => (!empty($this->instence['text_aligment'])) ? $this->instence['text_aligment']  : 'none',
                 'section_link_color' => !empty($this->instence['section_link_color']) ? $this->instence['section_link_color']  : 'inherit',
                'section_link_color_hover' => !empty($this->instence['section_link_color_hover ']) ? $this->instence['section_link_color_hover ']  : 'inherit',
                'paralax_overlay_opacity' => !empty($this->instence['paralax_overlay_opacity']) ? $this->instence['paralax_overlay_opacity']  : '1',
                'paralax_overlay_color' => !empty($this->instence['paralax_overlay_color']) ? $this->instence['paralax_overlay_color']  : '1',
                'section_position' => (!empty($this->instence['enable_paralax_overlay']) && $this->instence['enable_paralax_overlay'] != false) ? 'sticky' : 'relative',
                'section_content_bottom_space' =>(!empty($this->instence['section_content_bottom_space']) && $this->instence['section_content_bottom_space'] != false) ? $this->instence['section_content_bottom_space'] : 'inherit',
                
            );
        }
        
    
    
        public function StyleSheet(){
                add_filter('filter_minify_css', array($this, 'StyleSheet'), 10, 1);
        }
    
    
    
        public function TitleContent(){
            $html = '';
                if(!empty($this->instence['title'])){
                       $html .= sprintf('<h2 class="section-title wow slideIn"  data-wow-iteration="5" data-wow-duration="6s" data-wow-delay="10s">%s</h2>', $this->instence['title']);
                    }
                if(!empty($this->instence['content'])){
                    $html .=   sprintf('<div class="text-content">%s</div>', $this->instence['content']);
                }
                    $html = sprintf('<div class="row section-content">%s</div>', $html);
           //$html .= '<div class="span3 st-animator bounceInRight center" ><img src="http://mynameismatthieu.com/WOW/img/wow-11.gif" height="200"></div>';
                return $html;
        }
    
        public function getAttr(){
            $str ='';
            $enable = $this->instence['section_enable_animation'] ?? false;
            if($enable){
                   $array = array( 
                    'data-wow-delay' => '5s',
                    'data-wow-duration' => '5s',
                    //'data-wow-offset' => '',
                   // 'data-wow-iteration' => '',
                    );
                if(!empty($array) && is_array($array)){
                    foreach($array as $key=>$value){
                        $str .=  sprintf('%s="%s" ', $key, $value);
                    }
            }
            
            }
            
            return $str;
            
        }
}