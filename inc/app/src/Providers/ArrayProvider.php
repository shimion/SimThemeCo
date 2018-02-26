<?php
namespace ST\Providers;
//use \ST\Base\Provider;
class ArrayProvider{
    public $path;
     public $filename;
    public $data = [];
    function __construct($arr) {
        $this->filename = $arr;
         $this->Get();
        }
     public function Get(){
      //  $this->path = _INC . 'config/fields/'.$this->filename.'.php';
         $this->path = _INC . 'config/fields/'.$this->filename.'.php';
      echo $this->path;
         $data = [];
        if( ! file_exists($this->path)) return false;
           include_once($this->path);
         $this->data = $data;
         echo $this->path;
         print_r($this->data);
        if(!empty($this->data) && is_array($this->data))
            return $this->data;
    }


/*  public function Get(){
         $Data = [];
      //  $this->path = _INC . 'config/fields/'.$this->filename.'.php';
         $this->path = _INC . 'config/fields';

        $array_files = scandir($this->path);
         $array_files = array_diff($array_files, array('..', '.'));
        // print_r($array_files);
          if(!empty($array_files) && is_array($array_files)){
                foreach($array_files as $file){
                           // echo $file;
                    if(is_file($this->path.'/'.$file)){

                    include_once($this->path.'/'.$file);
                    }
                }
          }

                $this->data = $Data;
       //  print_r( $this->data);

    }


      public function SetWidgetFields($arr, $instance){
        $this->filename = $arr;
        $this->instance = $instance;
        $html = '';
         //print_r($this->data);
          $this->data = $this->data[$this->filename];
        if(empty($this->data)) return false;
            foreach($this->data as $field){
                    $array = $field;
                    /*if(isset($array['id']))
                      /  $array['id'] = WP_Widget::get_field_name($array['id']);
                   if(isset($array['name']))
                     //   $array['name'] = WP_Widget::get_field_name($array['name']);

                $value  =    $array['id'] ?? $array['name'] ;
                $value = esc_attr( $this->instance[$value] ?? '');
                $html .= cs_add_element( $array, $value );

            }

            return $html;
        }*/




}