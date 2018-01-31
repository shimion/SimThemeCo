<?php 
namespace ST\Providers;
use WP_Widget as DWP_Widget;
abstract  class ExtendWidget extends DWP_Widget {
      
      public $id;
      public $name;
      public $description;
      public $parse_array = [];
      public $form_array = [];
      public $update = [];
      
      
    function __construct() {
      
      $widget_ops     = array(
        'classname'   => $this->id ?? '',
        'description' => $this->description ?? 'SimThemeco Widget Description'
      );
       
      parent::__construct( $this->id, $this->name ?? $this->id, $widget_ops );
      self::SetFormArrayParses();  
    }

    function widget( $args, $instance ) {

      extract( $args );

      $html .= $before_widget;

      if ( ! empty( $instance['title'] ) ) {
       $html .= $before_title . $instance['title'] . $after_title;
      }

     $html .= '<div class="textwidget">';
     $html .= $this->GetWidget();
     $html .= '</div>';

     $html .= $after_widget;
     echo $html;
    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
        
      foreach($this->update as $value){
          $instance[$value]   = $new_instance[$value];
      }  
 
      return $instance;

    }

    function form( $instance ) {
           
      //
      // set defaults
      // -------------------------------------------------
      $instance   = wp_parse_args( $instance, $this->parse_array);

      
       // print_r($this->form_array);
        $html = [];
        
        if(!empty($this->form_array)){
            foreach($this->form_array as $form){
                $html .= cs_add_element( $form, esc_attr( $instance[$form['name']] ) );
            }
        }
        
        
        echo $html;
        
      
    }
      
      
      public function GetWidget(){
          return '';
      }
      
      
      
      public function GetForm(){          
          return [];    
              
      }
      
      private function SetFormArrayParses(){
          $arr = [];
         // print_r($this->GetForm());
          if(!empty($this->GetForm()) && is_array($this->GetForm())){
              foreach($this->GetForm() as $form){
                  $this->parse_array[$form['name']] = '';
                  $this->update[] = $form['name'];
                  $this->form_array[] = $form; 
                 // $this->form_array[]['id'] = $this->get_field_name($form['id']);
                  //$this->form_array[]['name'] = $this->get_field_name($form['name']); 
              }
          }
         // print_r( $this->update);
      }
      
      
      
  }


