<?php 
namespace ST\Providers;
use \ST\Base\Post;

class SliderData extends Post
{
    public $data = [];    
   protected  $slider_data = [];    
    protected  $settings = [];  
   protected  $items = [];
   protected  $meta_key = '_slider_setting';    
    protected  $items_key = 'slide';
    
   public function __construct($args = array()) {
        parent::__construct( $args );
        $this->GetSliderDataByID();
        $this->GetSliderData(); // get all slider Data
        $this->GetSliderItems();// get all the items of the slider
        $this->GetSliderSettings();
       $this->GetData();
      // echo $this->GetData();
      
    }
    
    
    
    protected function GetSliderData(){
       if(array_key_exists ($this->meta_key, $this->meta_data)){
            $this->slider_data = $this->meta_data[$this->meta_key];
            $this->slider_data = maybe_unserialize($this->slider_data[0]);
       }
   } 
    
     
    protected function GetSliderDataByID(){
       if($this->GetID()){
            $this->slider_data = get_post_meta($this->GetID(), $this->items_key);
           // print_r($this->slider_data);
       }
   } 
    
     
    protected function GetSliderItems(){
       if(array_key_exists ($this->items_key, $this->slider_data)){
          $this->items = $this->slider_data[$this->items_key];
       }
   } 
    
     
    protected function GetSliderSettings(){
       if(array_key_exists ($this->items_key, $this->slider_data)){
          $this->settings['caption'] = $this->slider_data['caption'];
           $this->settings['pagination'] = $this->slider_data['pagination'];
           $this->settings['pagination_color_normal'] = $this->slider_data['pagination_color']['normal'] ?? '#ddd';
           $this->settings['pagination_color_hover'] = $this->slider_data['pagination_color']['hover'] ?? '#fff';
           $this->settings['nevi'] = $this->slider_data['nevi'];
           $this->settings['nevi_color'] = $this->slider_data['nevi_color'] ?? '#c81c1c';
           $this->settings['paralax'] = $this->slider_data['paralax'];
           $this->settings['layout'] = $this->slider_data['layout'];
           $this->settings['pagination'] = $this->slider_data['pagination'];
           $this->settings['active'] = 1;
           $this->settings['height'] = $this->slider_data['slider_height'] . 'px';
       }
   } 
    
    
    public function GetData(){
            $this->data['settings'] = $this->settings;
            $this->data['items'] = $this->items;
                    $this->data = Collect($this->data);

    }
    
    
     
        
    
    
}