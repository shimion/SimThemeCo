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

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
       // print_r($instance);
      echo apply_filters( 'Action_Featured_Box_Widget', $instance );
      echo '</div>';

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['image']   = $new_instance['image'];
      $instance['text']   = $new_instance['text'];  
      $instance['button_text']    = $new_instance['button_text'];
      $instance['link']    = $new_instance['link'];
      $instance['social_share']    = $new_instance['social_share'];
       $instance['text_alignment']    = $new_instance['text_alignment'];  

      return $instance;

    }

    function form( $instance ) {

      //
      // set defaults
      // -------------------------------------------------
      $instance   = wp_parse_args( $instance, array(
        'title'   => 'Latest Events',
        'image'    => '',
        'text'    => '',
        'button_text'    => 'Find Out More',
        'link'    => '',
        'social_share'    => false,
          'text_alignment'  => 'center'
      ));


      $text_value = esc_attr( $instance['title'] );
      $text_field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
      );

      echo cs_add_element( $text_field, $text_value );

      $ivalue = esc_attr( $instance['image'] );
      $ifield = array(
        'id'    => $this->get_field_name('image'),
        'name'  => $this->get_field_name('image'),
        'type'  => 'upload',
        'title' => 'Upload Image',
        'default' => '',
        'info'  => '',
      );

      echo cs_add_element( $ifield, $ivalue );

    
        $tvalue = esc_attr( $instance['text'] );
      $tfield = array(
        'id'    => $this->get_field_name('text'),
        'name'  => $this->get_field_name('text'),
        'type'  => 'textarea',
        'title' => 'Text',
        'default' => '',
        'info'  => '',
      );

      echo cs_add_element( $tfield, $tvalue );
       
      $bvalue = esc_attr( $instance['button_text'] );
      $bfield = array(
        'id'    => $this->get_field_name('button_text'),
        'name'  => $this->get_field_name('button_text'),
        'type'  => 'text',
        'title' => 'Button Text',
        'default' => '',
        'info'  => '',
      );

      echo cs_add_element( $bfield, $bvalue );

      $link_value = esc_attr( $instance['link'] );
      $link_field = array(
        'id'    => $this->get_field_name('link'),
        'name'  => $this->get_field_name('link'),
        'type'  => 'text',
        'title' => 'Link',
        'default' => '',
        'info'  => '',
      );

      echo cs_add_element( $link_field, $link_value );
        
     $social_share_value = esc_attr( $instance['social_share'] );
      $social_share_field = array(
        'id'    => $this->get_field_name('social_share'),
        'name'  => $this->get_field_name('social_share'),
        'type'  => 'switcher',
        'title' => 'Social Share Buttons',
        'default' => '',
        'info'  => 'Enable to view social share buttons',
      );

      echo cs_add_element( $social_share_field, $social_share_value );
        
     $social_share_value = esc_attr( $instance['text_alignment'] );
      $social_share_field = array(
        'id'    => $this->get_field_name('text_alignment'),
        'name'  => $this->get_field_name('text_alignment'),
        'type'  => 'select',
        'title' => 'Social Share Buttons',
        'default' => '',
        'options' => array(
            'left'  => 'left',
            'center'  => 'center',
            'right'  => 'Right',
        ),
        'info'  => 'Enable to view social share buttons',
      );

      echo cs_add_element( $social_share_field, $social_share_value );
        
        
        
        
        
        

    }
  }

