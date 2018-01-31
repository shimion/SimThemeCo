<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class SlidersWidget extends DWP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'slider_widget',
        'description' => 'It helps to build Awesome slider.'
      );

      parent::__construct( 'slider_widget', 'Slider Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
     //  print_r($instance);
            echo apply_filters( 'Action_Sliders', $instance );
      echo '</div>';

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
            
            $instance            = $old_instance;
              $instance['title']   = $new_instance['title']?? '';
            $instance['slider']   = maybe_serialize($new_instance['slider']);
        
        
        
        
        
      return $instance;

    }

    function form( $instance ) {
        $lay = array(array('title'=> '', 'text' => ''));
            $instance   = wp_parse_args( $instance, array('title' => '', 'slider' => $lay ));
        
        
         
      //section_5a357cc97fe2b
      // set defaults
      // -------------------------------------------------
     
      //
      // text field example
      // -------------------------------------------------
        
       $text_value = esc_attr( $instance['title'] ?? '' );
      $text_field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
      );

      echo cs_add_element( $text_field, $text_value );

       
     // $value =  $this->get_field_name('slider') ;
        
        
      $slider_value = maybe_unserialize($instance['slider'])  ?? [];
       // print_r($slider_value);
     // $slider_field = 
         $slider = $this->get_field_name('slider');
          
         $slider_field =  array(
         
          'id'      => $slider,
            'name'      => $slider,
          'title'           => 'Group Field',
          'button_title'    => 'Add New',
          // 'default' => $slider_value,
          'accordion_title' => 'Add New Field',
            'type'            => 'repeat',
          'fields'          => array(

            array(
             'id'          => 'title',
                 'name'          => 'title',
               // 'id'          => '[title]', 
              'type'        => 'text',
              'title'       => 'Slider Title',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),

            array(
             'name'          => 'text',
               'id'          => 'text',
              'type'        => 'textarea',
              'title'       => 'Slider Text',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),
              
              
              
              
                         array(
             'id'          => 'link_text',
              'type'        => 'text',
              'title'       => 'Link Text',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),

            array(
             'id'          => 'link',
               // 'id'          => '[title]', 
              'type'        => 'text',
              'title'       => 'Link Url',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),

              
              
              


           array(
                  'id'           => 'background',
                  'type'         => 'background',
                  'title'        => 'Background Settings',
                  'default'      => array(
                    'image'      => '',
                    'repeat'     => '',
                    'position'   => '',
                    'attachment' => '',
                    'size'       => '',
                    'color'      => '',
                  ),
                ),


              
              
              
              
              


          ),              
        );



      echo cs_add_element( $slider_field, $slider_value );

    }
  }

