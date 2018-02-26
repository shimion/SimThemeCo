<?php
namespace ST\Utilities;
use \ST\Base\Utilities;

class Slider extends Utilities
{
    public $data;

    public function __construct($DATA){
        parent::__construct($DATA);

        $this->data['Action'] = $this->Set();

        }

    public function register(){
                return 'slider';
            }

        public function Set(){
                $Array = $this->data;
                $Array['title'] = $this->data['heading'] ?? '';
                $Array['pagination'] = $this->data['pagination'] ?? true;
                $Array['pagination_color'] = $this->data['pagination_color'] ?? 'rgba(255,255,255,.5)';
                $Array['pagination_active_color'] = $this->data['pagination_active_color'] ?? '#FFF';
                $Array['height'] = $this->data['slider_height'] ?? '500px';
                $Array['width'] = $this->data['width'] ?? '100%';
                $Array['arrow'] = $this->data['arrow'] ?? true;
                $Array['overlay'] = $this->data['overlay'] ?? '';
                $Array['paralax'] = $this->data['paralax'] ?? false;
                $Array['sliders'] = $this->HTMLImplementation();

        // print_r($Array['sliders']);
             return $Array;
            }




    public function HTMLImplementation(){
        $slider = [];
        $helper_slider = [];
      $datas =   maybe_unserialize($this->data['slider'] ?? '');
        if(empty($datas)) return [];
        foreach($datas as $data){
            $helper_slider = $data;
            $helper_slider['title'] = sprintf('<h3 style="color:%s">%s</h3>',$data['title_color'] ?? '',  $data['title']);
            $helper_slider['text'] = sprintf('<div class="slider-caption-text" style="color:%s">%s</div>', $data['text_color'] ?? '', $data['text']);
            $helper_slider['link'] = self::ButtonMethod($data);
            $helper_slider['position'] = self::SetPosition($data);
            $helper_slider['overlay'] = $data['overlay'] ?? '';
            $slider[] = $helper_slider;
        }

        return $slider;
    }


    public static function ButtonMethod($arr = []){
     $class =   apply_filters('slider_button_class', 'button-slider');
     return  sprintf('<a class="btn btn-primary js-colorize %s" href="%s" data-color="%s" data-color-hover="%s" data-background="%s" data-background-hover="%s" data-border="%s" data-border-hover="%s"  role="button" style="color:%s">%s</a>', $class, $arr['link'] ?? '', $arr['link_color_text'] ?? '', $arr['link_color_text_hover'] ?? '', $arr['link_color'] ?? '',  $arr['link_color_hover'] ?? '', $arr['link_border_color'] ?? '', $arr['link_border_color_hover'] ?? '', $arr['link_color_text'] ?? '', $arr['link_text'] ?? 'Read More');
    }




    public static function SetPosition($attr){
        $data = '';
        if(!empty($attr['caption_box_position_x'])){
        if($attr['caption_box_position_x'] =='left')
            $data .= 'margin-left:0;';
        if($attr['caption_box_position_x'] =='right')
            $data .= 'margin-right:0;';
        if($attr['caption_box_position_x'] =='center')
            $data .= 'margin-right:auto; margin-right: auto;';

        }
        if(!empty($attr['caption_box_position_y'])){
       if($attr['caption_box_position_y'] =='top')
            $data .= 'margin-top:0;';
       if($attr['caption_box_position_y'] =='bottom')
            $data .= 'margin-bottom:0;';
      if($attr['caption_box_position_y'] =='middle')
            $data .= 'margin-top:auto;margin-bottom:auto;';
        }
        return $data;


    }



}