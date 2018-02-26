<?php
namespace ST\Utilities;
use \ST\Base\Utilities;

class FeaturedBox extends Utilities
{
    public $data = [];
    protected $instance = [];

    public function __construct($DATA){
        parent::__construct($DATA);
                $this->instance = $DATA;
                print_r( $this->instance);
                $this->data['Settings'] = $this->Set();
                $this->data['Query'] = $this->Query();

        }

    public function register(){
                return 'featured-box';
            }

         public function Set(){
               $Array = $this->data;
              //  $Array['title'] = $this->data['title'] ?? '';
               // $Array['content'] = $this->data['content'] ?? '';
             //   $Array['image'] = $this->data['image'] ?? '';
               // $Array['link'] = $this->data['link'] ?? '';
              //  $Array['button_text'] = $this->data['button_text'] ?? '';


            //print_r($Array);
            return $Array;
            }



        public function Query(){
                $htmlarg = [];
                print_r($this->instance['featured_box']);
                $datas =   maybe_unserialize($this->instance['featured_box']);
                if(empty($datas)) return [];
                foreach($datas as $data){
                $helper_data = [];
                $helper_data = $data;
            $helper_data['title'] = sprintf('<h3>%s</h3>',  $data['title']);
            $helper_data['text'] = sprintf('<div class="featured-text card-text">%s</div>', $data['text']);
            $helper_data['link'] = $data['link'] ?? '';
            $helper_data['box_size'] = $data['box_size'] ?? '3';

            $htmlarg[] = $helper_data;
        }

                return $htmlarg;
    }


   `


}