<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class LayoutWidget extends DWP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'layout_widget',
        'description' => 'It helps to build Awesome layout.'
      );

      parent::__construct( 'layout_widget', 'Layout Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
     //  print_r($instance);
     // echo apply_filters( 'Action_Layout_Widget', $instance );
        $data = maybe_unserialize($instance['layout'] ?? '');
        foreach($data as $d){
            echo '<br>'.$d['title'];
            echo '<br>'.$d['text'];
        }
      echo '</div>';

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
            
            $instance            = $old_instance;
              $instance['title']   = $new_instance['title']?? '';
            $instance['layout']   = maybe_serialize($new_instance['layout']);
        
        
        
        
        
      return $instance;

    }

    function form( $instance ) {
        $lay = array(array('title'=> 'Title Here', 'text' => 'text Here'));
            $instance   = wp_parse_args( $instance, array('title' => '', 'layout' => $lay ));
        
        
         
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

       
     // $value =  $this->get_field_name('layout') ;
        
        
      $layout_value = maybe_unserialize($instance['layout'])  ?? [];
       // print_r($layout_value);
     // $layout_field = 
         $layout = $this->get_field_name('layout');
          
         $layout_field =  array(
         
          'id'      => $layout,
          'title'           => 'Group Field',
          'button_title'    => 'Add New',
          // 'default' => $layout_value,
          'accordion_title' => 'Add New Field',
            'type'            => 'group',
          'fields'          => array(

            array(
             'id'          => 'title',
               // 'id'          => '[title]', 
              'type'        => 'text',
              'title'       => 'Title field Field',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),

            array(
             // 'name'          => $layout.'[text]',
               'id'          => 'text',
              'type'        => 'textarea',
              'title'       => 'Textarea',
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



      echo cs_add_element( $layout_field, $layout_value );

    }
  }

