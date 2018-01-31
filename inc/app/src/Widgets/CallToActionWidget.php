<?php 
namespace ST\Widgets;
use ST\Widgets\Load as NewLoad;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class CallToActionWidget extends NewLoad {
      protected $data = [];
    function __construct() {
      $widget_ops     = array(
        'classname'   => 'call_to_action_widget',
        'description' => 'Widget for displaying call to action button with additional info.'
      );

      parent::__construct( 'call_to_action_widget', 'Call To Action Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
       // print_r($instance);
      echo apply_filters( 'Action_Call_To_Action', $instance );
      echo '</div>';

      echo $after_widget;

    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance = Load::preupdate($new_instance, $old_instance);
        $instance['button_text']        =   $new_instance['button_text'];
        $instance['button_url']         =   $new_instance['button_url'];

      return $instance;

    }

    public function UpdateForm( $instance ) {

      // Call to action button text
      // -------------------------------------------------
      $date_value = esc_attr( $instance['button_text'] );
      $date_field = array(
        'id'    => $this->get_field_name('button_text'),
        'name'  => $this->get_field_name('button_text'),
        'type'  => 'text',
        'title' => 'Button Text Here',
        'default' => '',
        'info'  => 'Change the call to action button text from here.',
      );

      $html .= cs_add_element( $date_field, $date_value );

     // Call to action button url
      // -------------------------------------------------
      $date_value = esc_attr( $instance['button_url'] );
      $date_field = array(
        'id'    => $this->get_field_name('button_url'),
        'name'  => $this->get_field_name('button_url'),
        'type'  => 'text',
        'title' => 'Button Url Here',
        'default' => '',
        'info'  => 'Change the call to action button url.',
      );
        
        $html .= cs_add_element( $date_field, $date_value );
        return $html;


    }
      
      
      
  }