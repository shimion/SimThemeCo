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

    $instance                                =  $old_instance;
    $instance['title']                       =  $new_instance['title'] ?? '';
    $instance['slider']                      =  maybe_serialize($new_instance['slider']);
    $instance['pagination_color']            =  $new_instance['pagination_color'];
    $instance['pagination_active_color']     =  $new_instance['pagination_active_color'];
    $instance['slider_height']               =  $new_instance['slider_height'];
    $instance['overlay']                     =  $new_instance['overlay'];
    $instance['slider_height']               =  $new_instance['slider_height'];
    $instance['sid']               =  $new_instance['sid'] ?? uniqid();



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
              'type'    => 'content',
                'id'    => 'tts',
              'content' => 'Title Settings',
            ),
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
             'id'          => 'title_color',
                 'name'          => 'title_color',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Title Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),

          array(
              'type'    => 'content',
              'id'    => 'ts',
              'content' => 'Text Settings',
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
             'id'          => 'text_color',
             'name'          => 'text_color',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Text Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),


          array(
              'type'    => 'content',
              'id'    => 'bts',
              'content' => 'Button Settings',
            ),

             array(
             'id'          => 'link_text',
              'type'        => 'text',
              'title'       => 'Button Text',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),

            array(
             'id'          => 'link',
               // 'id'          => '[title]',
              'type'        => 'text',
              'title'       => 'Button Url',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),


           array(
             'id'          => 'link_color',
             'name'          => 'link_color',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Button Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),



           array(
             'id'          => 'link_color_hover',
             'name'          => 'link_color_hover',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Button Color Hover',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),



           array(
             'id'          => 'link_color_text',
             'name'          => 'link_color_text',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Button Text Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),



             array(
             'id'          => 'link_color_text_hover',
             'name'          => 'link_color_text_hover',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Button Text Hover Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),


          array(
             'id'          => 'link_border_color',
             'name'          => 'link_border_color',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Button Border Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),



             array(
             'id'          => 'link_border_color_hover',
             'name'          => 'link_border_color_hover',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Button Border Hover Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),


           array(
              'type'    => 'content',
                'id'    => 'bs',
              'content' => 'Background Settings',
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



          array(
              'type'    => 'content',
              'id'    => 'cbs',
              'content' => 'Caption Box Settings',
            ),


              array(
             'id'          => 'caption_box_background',
             'name'          => 'caption_box_background',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Box Background Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),



            /*  array(
             'id'          => 'caption_box_background_hver',
             'name'          => 'caption_box_background_hver',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Box Background Hover Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),
*/


              array(
             'id'          => 'caption_box_width',
             'name'          => 'caption_box_width',
            // 'help'          => '',
              'type'        => 'number',
                'default'     => '300',
              'title'       => 'Box Width',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),


             array(
             'id'          => 'caption_box_border',
             'name'          => 'caption_box_border',
            // 'help'          => '',
              'type'        => 'color_picker',
             //   'default'     => '300',
              'title'       => 'Box Border Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),



           /*
             array(
             'id'          => 'caption_box_border_hover',
             'name'          => 'caption_box_border_hover',
            // 'help'          => '',
              'type'        => 'color_picker',
               // 'default'     => '300',
              'title'       => 'Box Border Hover Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),

              */




              array(
             'id'          => 'caption_box_position_x',
             'name'          => 'caption_box_position_x',
           //  'help'          => '',
              'type'        => 'select',
              'title'       => 'Box Horizantal Position',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
                'options'        => array(
                    ''          => 'Default',
                    'left'          => 'Left',
                    'center'          => 'Center',
                    'right'     => 'Right'
              ),
            ),



             array(
             'id'          => 'caption_box_position_y',
             'name'          => 'caption_box_position_y',
           //  'help'          => '',
              'type'        => 'select',
              'title'       => 'Box Vertical Position',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
                'options'        => array(
                     ''          => 'Default',
                    'top'          => 'Top',
                    'middle'          => 'Middle',
                    'bottom'     => 'Bottom'
              ),
            ),

               array(
             'id'          => 'caption_content_aligment',
             'name'          => 'caption_content_aligment',
           //  'help'          => '',
              'type'        => 'select',
              'title'       => 'Content Alignment',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
                'options'        => array(
                     ''          => 'Default',
                    'left'          => 'Left',
                    'center'          => 'Center',
                    'right'     => 'Right'
              ),
            ),




           array(
              'type'    => 'content',
              'id'    => 'ho',
              'content' => 'Overlay Settings',
            ),


        array(
             'id'          => 'overlay',
             'name'          => 'overlay',
               // 'id'          => '[title]',
              'type'        => 'color_picker',
              'title'       => 'Slider Overlay Color',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),







          ),
        );



      echo cs_add_element( $slider_field, $slider_value );




     $text_value = esc_attr( $instance['slider_addition'] ?? '' );
      $text_field = array(
        'id'    => $this->get_field_name('slider_addition'),
        'name'  => $this->get_field_name('slider_addition'),
        'type'  => 'heading',
          'content' => '',
        'title' => 'Slider Additional Settings',
      );

      echo cs_add_element( $text_field, $text_value );



   $text_value = esc_attr( $instance['slider_height'] ?? '' );
      $text_field = array(
        'id'    => $this->get_field_name('slider_height'),
        'name'  => $this->get_field_name('slider_height'),
        'type'  => 'text',
        'title' => 'Slider Height',
      );

      echo cs_add_element( $text_field, $text_value );



  $text_value = esc_attr( $instance['overlay'] ?? '' );
      $text_field = array(
        'id'    => $this->get_field_name('overlay'),
        'name'  => $this->get_field_name('overlay'),
        'type'  => 'color_picker',
        'note'  => '',
        'title' => 'Slider Overlay',
      );

      echo cs_add_element( $text_field, $text_value );



  $text_value = esc_attr( $instance['pagination_color'] ?? '' );
      $text_field = array(
        'id'    => $this->get_field_name('pagination_color'),
        'name'  => $this->get_field_name('pagination_color'),
        'type'  => 'color_picker',
        'note'  => '',
        'title' => 'Pagination & Arrow Color',
      );

      echo cs_add_element( $text_field, $text_value );



  $text_value = esc_attr( $instance['pagination_active_color'] ?? '' );
      $text_field = array(
        'id'    => $this->get_field_name('pagination_active_color'),
        'name'  => $this->get_field_name('pagination_active_color'),
        'type'  => 'color_picker',
        'note'  => '',
        'title' => 'Pagination & Arrow Active Color',
      );

      echo cs_add_element( $text_field, $text_value );








    }
  }

