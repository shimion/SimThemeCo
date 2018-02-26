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
                'default' => false,
                //'calss' => 'customizer-enable-button'
            ),

            array(
              'id'    => 'customizer-import',
              'type'  => 'importer',
              'title' => 'Import Layout',
                'class' => 'customizer-upload-button',
                    'default' => false,


            ),

          array(
              'id'    => 'disable_sidebar',
              'type'  => 'switcher',
              'title' => 'Disable Sidebar',
                'default' => false
            ),

         /* array(
              'id'    => 'disable_page_content_section',
              'type'  => 'switcher',
              'title' => 'Disable page Title',
              'default' => false,
              'dependency'   => array( 'disable_page_content_section', '!=', false ),
            ),*/
         array(
              'id'    => 'disable_title',
              'type'  => 'switcher',
              'title' => 'Disable Page Title',
                'default' => false
            ),
          array(
              'id'    => 'disable_content',
              'type'  => 'switcher',
              'title' => 'Disable Page Content',
                'default' => false
            ),

         array(
              'id'    => 'disable_postmeta',
              'type'  => 'switcher',
              'title' => 'Disable Page Meta Information',
                'default' => false
            ),

        ),
    ),


   /* // begin: a section
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
    ), // end: a section*/


  ),
);

CSFramework_Metabox::instance( $options );
