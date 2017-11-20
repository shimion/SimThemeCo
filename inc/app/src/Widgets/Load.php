<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class Load extends DWP_Widget {
/**
     * Echoes the widget content.
     *
     * Sub-classes should over-ride this function to generate their widget code.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance The settings for the particular instance of the widget.
     */
        public function widget( $args, $instance ) {
            die('function WP_Widget::widget() must be over-ridden in a sub-class.');
        }
      
      
      
}