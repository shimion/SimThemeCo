<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;
use \ST\Providers\SliderData;
use \ST\Providers\StyleProvider;
use \ST\Providers\ScssProvider;
use \ST\Providers\LessProvider;
class Sliders extends Utilities
{
    public $data = [];
    protected $instance = []; 
    public function __construct($DATA){
        parent::__construct($DATA);
        $this->instance = $DATA;
       $this->Set();
       // print_r($this->instance);
        add_action('wp_footer', array($this, 'Script'));
         if(!empty($this->Css()) && is_array($this->Css())){
          $styleprovider =  new StyleProvider($this->Css());
          
        }
        
        if(!empty($this->Scss())){
          $styleprovider =  new ScssProvider($this->Scss());
          
        }
        
        
        if(!empty($this->Less())){
          $styleprovider =  new LessProvider($this->Less(), $this->Settings());
          
            }
         }
   
    public function register(){
                return 'sliders';
            }
    
    public function Script(){
        \ST\Helpers::AddAdditionalScript(array('sliders'=> _CSS.'sliders.css', 'css'), 'css');
    }
    
    
        public function Set(){
              //  print_r();
                $Array = [];
                
                $Array = new SliderData(array('ID' => $this->instance['slider_id'] ?? false));
                //print_r($Array);
                $this->data['Sliders'] = $Array->data['items'];
                $this->data['Settings'] = $Array->data['settings'];
                $this->data['sid'] = $this->instance['sid'];
            }
   
        
        public function Css(){
            
            return array(
                'div#carouselDefaultCaptions .carousel-caption h3' => array('font-size' => '560%', 'font-weight' => 'bold'),
                        'div#carouselDefaultCaptions .carousel-item ' => array('height' => $this->data['Settings']['height'], 'font-weight' => 'bold'),
                'div#carouselDefaultCaptions .carousel-item .st_image_wapper' => array('background-repeat' => 'no-repeat', 'background-size'=>'cover', 'width' => '100%', 'height' => '100%', 'display' => 'block', 'position' => 'absolute', 'left' => '0', 'top' => '0', 'background-attachment' => 'fixed'),
                '.caption-inner-wapper' => array(
                            'width'=> '100%',
                            'max-width'=> '650px',
                            'margin-left'=> 'auto',
                            'margin-right'=> 'auto',
                            'margin-top'=> 'auto',
                            'margin-bottom'=> 'auto',
                            'background' => '#fff',
                            'padding'=> '50px 0',
                            'display'=> 'inline-table',                
                       
                ),
            );
          
            
        }
    
 
       public function Less(){
        
            return '
            
           #'.$this->data['sid'].' {
                div#carouselDefaultCaptions{
                    .carousel-item{
                            height: @height;                   
                    }
                    .carousel-indicators li{ 
                        background: @pagination_color_normal;
                    }
                    .carousel-indicators .active{
                        background-color: @pagination_color_hover;
                    }
                }
            }';
          
            
        }
    
    
    
    
        public function Settings(){
            return array(
                
                'height' => $this->data['Settings']['height'],
                'pagination_color_normal' => $this->data['Settings']['pagination_color_normal'],
                 'pagination_color_hover' => $this->data['Settings']['pagination_color_hover'],
                'nevi_color' => $this->data['Settings']['nevi_color'],
                 
            );
        }
    
 
    
    
    
}