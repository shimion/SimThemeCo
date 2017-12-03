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
        $this->GetSliderData(); // get all slider Data
        $this->GetSliderItems();// get all the items of the slider
        $this->GetSliderSettings();
       $this->GetData();
       //print_r($this->items);
    }
    
    
    
    protected function GetSliderData(){
       if(array_key_exists ($this->meta_key, $this->meta_data)){
            $this->slider_data = $this->meta_data[$this->meta_key];
            $this->slider_data = maybe_unserialize($this->slider_data[0]);
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
           $this->settings['nevi'] = $this->slider_data['nevi'];
           $this->settings['paralax'] = $this->slider_data['paralax'];
           $this->settings['layout'] = $this->slider_data['layout'];
           $this->settings['pagination'] = $this->slider_data['pagination'];
           $this->settings['active'] = 1;
       }
   } 
    
    
    public function GetData(){
            $this->data['settings'] = $this->settings;
            $this->data['items'] = $this->items;
                    $this->data = Collect($this->data);

    }
    
    
     
        
    
    
}