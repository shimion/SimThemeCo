<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;
use \ST\Providers\SliderData;
use \ST\Scss\scssphp;
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
         }
   
    public function register(){
                return 'sliders';
            }
    
    public function Script(){
        \ST\Helpers::AddAdditionalScript(array('sliders'=> _CSS.'sliders.css', 'css'), 'css');
    }
    
    
        public function Set(){
                
                $Array = [];
                $Array = new SliderData(array('ID' => $this->instance['slider_id'] ?? false));
                $this->data['Sliders'] = $Array->data['items'];
            $this->data['Settings'] = $Array->data['settings'];
           // print_r($this->data);
                /*$Array['nevi'] = true;
                $Array['pagination'] = true;
                $Array['caption'] = true;
                $Array['font_size'] = '560%';
                $Array['data'] = array(
                        array(
                            'image' => '//dev.simtheme.com/wp-content/uploads/2017/11/Sunbrella-2nd-Place.jpg',
                             'link' => '/#new1',
                             'readmore' => 'Read More',
                             'title' => 'SimTheme',
                             'active' => true,
                             'text' => 'Simple, Impressive & Modern WordPress Theme',
                            'captionbg' => '#fff', // optional
                        ),
                       array(
                            'image' => '//dev.simtheme.com/wp-content/uploads/2017/11/metal-wall-art-entry-industrial-with-exposed-beams-contemporary-floor-mirrors.jpg',
                             'link' => '/#new1',
                             'readmore' => 'Read More',
                             'title' => 'Simple',
                             'active' => false,
                             'text' => 'Simple is the best.',
                             'captionbg' => '#b52015',
                        ),
                       array(
                            'image' => '//cl.ly/image/1a3i3k0F3B3h/banner_03.jpg',
                             'link' => '/#new1',
                             'readmore' => 'Read More',
                             'title' => 'Impressive',
                             'active' => false,
                             'text' => 'Simple, Impressive & Modern WordPress Theme.',
                             'captionbg' => '#eeee',
                        ),
                       array(
                            'image' => '//cl.ly/image/2J0z1t033B25/banner_01.jpg',
                             'link' => '/#new1',
                             'readmore' => 'Read More',
                             'title' => 'Mordern',
                             'active' => false,
                             'text' => 'Mordern and elegient view with responsive solution.',
                             'captionbg' => '#b52015',
                        ),
                       array(
                            'image' => 'https://cl.ly/image/3J45082V2c1L/banner_02.jpg',
                             'link' => '/#new1',
                             'readmore' => 'Read More',
                             'title' => 'SimTheme',
                             'active' => false,
                             'text' => 'Simple, Impressive & Modern WordPress Theme',
                             'captionbg' => '#ccc',
                        ),
                    );*/
            return $Array;
            }
   
        
        public function Css(){
            
            return array(
                'div#carouselExampleCaptions .carousel-caption h3' => array('font-size' => '560%', 'font-weight' => 'bold'),
                        'div#carouselExampleCaptions .carousel-item ' => array('height' => '560px', 'font-weight' => 'bold'),
                'div#carouselExampleCaptions .carousel-item .st_image_wapper' => array('background-repeat' => 'no-repeat', 'background-size'=>'cover', 'width' => '100%', 'height' => '100%', 'display' => 'block', 'position' => 'absolute', 'left' => '0', 'top' => '0', 'background-attachment' => 'fixed'),
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
    
 
       public function Scss(){
        
            return '
            $color: #fff;
            .shimion{
                    color: $color;
                .Aspasia{
                    color: $color;
                }
            }';
          
            
        }
    
 
    
    
    
}