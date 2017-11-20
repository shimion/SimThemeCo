<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_options',
  'title'     => 'Custom Page Options',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

      
       // begin: a section
    array(
      'name'  => 'general',
      'title' => 'General Setting',
      'icon'  => 'fa fa-cog',

      // begin: fields
      'fields' => array(

        
        // end: a field

            array(
              'id'    => 'customizer',
              'type'  => 'switcher',
              'title' => 'Enable Customizer for this page',
                'default' => false
            ),

        ),
    ),
      
      
    // begin: a section
    array(
      'name'  => 'membership',
      'title' => 'Membership Setting',
      'icon'  => 'fa fa-cog',

      // begin: fields
      'fields' => array(

        
        // end: a field

        array(
          'id'    => 'restriction',
          'type'  => 'switcher',
          'title' => 'Restrict This Page for Specific User Role',
        ),

       array(
          'id'    => 'select_user_role',
          'type'  => 'select',
          'title' => 'Select Restricted User Role',
          'options'   => array(
            'subscriber' => 'Subscriber',
                'author' => 'Author',
               'editor' => 'Editor'
          ),
        ),

        array(
          'id'    => 'section_1_switcher',
          'type'  => 'switcher',
          'title' => 'Switcher Field',
          'label' => 'Yes, Please do it.',
        ),

      ), // end: fields
    ), // end: a section

    // begin: a section
    array(
      'name'  => 'section_2',
      'title' => 'Section 2',
      'icon'  => 'fa fa-tint',
      'fields' => array(

        array(
          'id'      => 'section_2_color_picker_1',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 1',
          'default' => '#2ecc71',
        ),

        array(
          'id'      => 'section_2_color_picker_2',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 2',
          'default' => '#3498db',
        ),

        array(
          'id'      => 'section_2_color_picker_3',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 3',
          'default' => '#9b59b6',
        ),

        array(
          'id'      => 'section_2_color_picker_4',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 4',
          'default' => '#34495e',
        ),

        array(
          'id'      => 'section_2_color_picker_5',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 5',
          'default' => '#e67e22',
        ),

      ),
    ),
    // end: a section

  ),
);

// -----------------------------------------
// Page Side Metabox Options               -
// -----------------------------------------
$options[]    = array(
  'id'        => '_event_settings',
  'title'     => 'Event Time Setting',
  'post_type' => 'event',
  'context'   => 'side',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'event_setting',
      'fields' => array(

        array(
          'id'        => 'event_start_date',
          'type'      => 'datepicker',
            'class'      => 'datepicker',
            'title'      => 'Start Date',
         'attributes'    => array(
            'placeholder' => 'mm/dd/yyyy'
          )
        ),
       array(
          'id'        => 'event_start_time',
          'type'      => 'select',
            'title'      => 'Start Time',
             'options'    => array(
                 '0' => '0',
                 '1' => '1',
                 '2' => '2',
                 '3' => '3',
                 '4' => '4',
                 '5' => '5',
                 '6' => '6',
                 '7' => '7',
                 '8' => '8',
                 '9' => '9',
                 '10' => '10',
                 '11' => '11',
                 '12' => '12',
                 '13' => '13',
                 '14' => '14',
                 '15' => '15',
                 '16' => '16',
                 '17' => '17',
                 '18' => '18',
                 '19' => '19',
                 '20' => '20',
                 '21' => '21',
                 '22' => '22',
                 '23' => '23',
                 '24' => '24',


              ),
            'default'   => current_time( 'd' ),
        ),


      array(
          'id'        => 'event_end_date',
          'type'      => 'datepicker',
          'class'      => 'datepicker1',
            'title'      => 'End',
         'attributes'    => array(
            'placeholder' => 'mm/dd/yyyy'
          )
        ),

          
       array(
          'id'        => 'event_end_time',
          'type'      => 'select',
            'title'      => 'End Time',
             'options'    => array(
                 '0' => '0',
                 '1' => '1',
                 '2' => '2',
                 '3' => '3',
                 '4' => '4',
                 '5' => '5',
                 '6' => '6',
                 '7' => '7',
                 '8' => '8',
                 '9' => '9',
                 '10' => '10',
                 '11' => '11',
                 '12' => '12',
                 '13' => '13',
                 '14' => '14',
                 '15' => '15',
                 '16' => '16',
                 '17' => '17',
                 '18' => '18',
                 '19' => '19',
                 '20' => '20',
                 '21' => '21',
                 '22' => '22',
                 '23' => '23',
                 '24' => '24',


              ),
            'default'   => current_time( 'd' ) + 1,
        ),

          
          
          
          
        

      ),
    ),

  ),
);

// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_event_additional_settings',
  'title'     => 'Event Additional Settings',
  'post_type' => 'event',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'event_additional_settings',
      'fields' => array(

        array(
          'id'    => 'event_location_address',
          'type'  => 'text',
          'title' => 'Address',
        ),

        array(
          'id'    => 'event_location_zip',
          'type'  => 'text',
          'title' => 'Zip Code',
        ),

        array(
          'id'    => 'event_location_state',
          'type'  => 'text',
          'title' => 'State',
        ),

        array(
          'id'    => 'event_location_city',
          'type'  => 'text',
          'title' => 'City',
          'label' => '',
        ),

      ),
    ),

  ),
);

CSFramework_Metabox::instance( $options );
