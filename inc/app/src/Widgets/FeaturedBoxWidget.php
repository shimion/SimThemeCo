<?php
namespace ST\Widgets;
use ST\Widgets\Load;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget
 *
 */

  class FeaturedBoxWidget extends Load {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'featured_box_widget',
        'description' => 'Widget for displaying content with additional features'
      );

      parent::__construct( 'featured_box_widget', 'Featured Box Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;


      echo '<div class="textwidget">';
       // print_r($instance);
     // echo apply_filters( 'Action_Featured_Box_Widget', $instance );
        echo Helpers::GetFeaturedBox($instance);
      echo '</div>';

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance = Load::preupdate($new_instance, $old_instance);
        $instance['text']        =   $new_instance['text'];
        $instance['link']         =   $new_instance['link'];
        $instance['title']   = $new_instance['title'];
        $instance['image']   = $new_instance['image'];
        $instance['text']   = $new_instance['text'];
        $instance['button_text']    = $new_instance['button_text'];
        $instance['link']    = $new_instance['link'];
        $instance['social_share']    = $new_instance['social_share'];
        $instance['text_alignment']    = $new_instance['text_alignment'];
        $instance['featured_box']    = $new_instance['featured_box'];
      return $instance;

    }

    function UpdateForm( $instance ) {

    $lay = array(array('title'=> '', 'text' => ''));
    $instance   = wp_parse_args( $instance, array('title' => '', 'featured_box' => $lay ));



     // $value =  $this->get_field_name('slider') ;

        $html = '';
      $slider_value = maybe_unserialize($instance['featured_box'])  ?? [];
       // print_r($slider_value);
     // $slider_field =
         $featured_box = $this->get_field_name('featured_box');

         $slider_field =  array(

          'id'      => $featured_box,
            'name'      => $featured_box,
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
              'title'       => 'Title',
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
              'title'       => 'Text',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),



          array(
              'type'    => 'content',
              'id'    => 'bts',
              'content' => 'Button Settings',
            ),

             /*array(
             'id'          => 'link_text',
              'type'        => 'text',
              'title'       => 'Button Text',
                'attribute'       => array(
                  'class' =>  'class-captchure'
                ),
            ),*/

            array(
             'id'          => 'link',
               // 'id'          => '[title]',
              'type'        => 'text',
              'title'       => 'Button Url',
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
              'type'    => 'content',
              'id'    => 'bts',
              'content' => 'Box Setting',
            ),


              array(
             'id'          => 'box_size',
             'name'          => 'box_size',
            // 'help'          => '',
              'type'        => 'select',
                'default'     => '4',
              'title'       => 'Box Size',
                'attribute'       => array(
                  'class' =>  'class-captchure',
                   'minlength'   => '1',
                     'maxlength'   => '10',
                ),
                   'options'  => array(
                        '1'  => '1',
                        '2'  => '2',
                       '3'  => '3',
                       '4'  => '4',
                       '5'  => '5',
                       '6'  => '6',
                       '7'  => '7',
                       '8'  => '8',
                       '9'  => '9',
                       '10'  => '10',
                        '11'  => '11',
                        '12'  => '12',
                      ),
            ),


    /*         array(
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

*/






          ),
        );



      $html .= cs_add_element( $slider_field, $slider_value );


        return $html;


    }
  }

