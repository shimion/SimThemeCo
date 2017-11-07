<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// CUSTOMIZE SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options              = array();

// -----------------------------------------
// Customize Core Fields                   -
// -----------------------------------------
$options[]            = array(
  'name'              => 'branding',
  'title'             => 'Branding',
    'priority'        => 99,
  'settings'          => array(




      

 
  )
);





// -----------------------------------------
// Customize Panel Options Fields          -
// -----------------------------------------
$options[]            = array(
  'name'              => 'header_section',
  'title'             => 'Header',
  'description'       => 'Customize header display settings',
  'sections'          => array(

    // begin: section
    array(
      'name'          => 'branding',
      'title'         => 'Branding',
      'settings'      => array(

        
            // Logo 
            array(
              'name'          => 'logo',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                'type'      => 'upload',
                'title'     => 'Site Logo',
                'upload_type'     => 'image',
                'frame_title'     => 'Upload/Add site logo',  
                ),
              ),
            ),


            // Favicon 
           /* array(
                'name'          => 'favicon',
                'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                'type'      => 'upload',
                'title'     => 'Site Icon/Favicon',
                'upload_type'     => 'image',
                'frame_title'     => 'Upload/Add site icon here',             
                ),
              ),
            ),*/


        /*
         * -T: Site Title             
        */    
            array(
              'name'          => 'site_title',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'text',
                  'desc'      => 'It will not overwrite site default title.',
                  'title'     => 'Site Title',
                  'default'      => get_bloginfo('name'),  
                  'dependency'   => array( 'switcher_title_tagline', '!=', false ),  
                ),
              ),
            ),



        /*
         * -T: Site Tagline             
        */    
            array(
              'name'          => 'site_tagline',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'text',
                  'desc'      => 'It will not overwrite site default tagline.',
                  'title'     => 'Tagline',
                  'default'      => get_bloginfo('description'),
                  'dependency'   => array( 'switcher_title_tagline', '!=', false ),
                ),
              ),
            ),



        /*
         * -T: Show Hide Title & Tagline            
         */    
            array(
              'name'          => 'switcher_title_tagline',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'switcher',
                  'title'     => 'Display Site Title and Tagline',
                  'label'     => 'Do you want to display site title and tagline?',
                  'help'      => '',
                  'default'      => true,
                ),
              ),
            ),

      ),
    ),
    // end: section

    // begin: section
    array(
      'name'          => 'sidebar-widgets-header-top',
      'title'         => 'Top Section',
      'settings'      => array(

      ),
    ),
    // end: section
      
      
   // begin: section
    array(
      'name'          => 'sidebar-widgets-header-bottom',
      'title'         => 'Bottom Section',
      'settings'      => array(
 
      ),
    ),
    // end: section
      
      
      
      
      
    // begin: section
    array(
      'name'          => 'header-custom',
      'title'         => 'Custom Settings',
      'settings'      => array(

        array(
              'name'          => 'enable_search_header',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'switcher',
                  'title'     => 'Enable Search',
                  'label'     => 'Enable to view search on the header',
                  'help'      => '',
                  'default'      => true,
                ),
              ),
            ),

        
       array(
              'name'          => 'custom_text_on_the_header',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'text',
                  'title'     => 'Header Additional Text',
                  'label'     => 'Display additional text on the header',
                  'help'      => '',
                  'default'      => true,
                ),
              ),
            ),

        

      ),
    ),
    // end: section

  ),
  // end: sections

);




$options[]            = array(
  'name'              => 'content_section',
  'title'             => 'Content Section',
  'description'       => 'Customize the content section.',
  'sections'          => array(

      
      
      // begin: Sidebar section
    array(
      'name'          => 'sidebar-widgets-hwcwd',   
      'title'         => 'Before Content Section',
      'settings'      => array(
          
       ),
    ),
    // end: section
    
      
      // begin: Sidebar section
    array(
      'name'          => 'sidebar-widgets-hacwd',   
      'title'         => 'After Content Section',
      'settings'      => array(
          
       ),
    ),
    // end: section
    
      
      
     
      
      
      
      
    // begin: Sidebar section
    array(
      'name'          => 'sidebar-widgets-sidebar',
      'title'         => 'Main Sidebar Section',
      'settings'      => array(
          
       ),
    ),
    // end: section
      
      
      
      

  ),
  // end: sections

);


         
          


CSFramework_Customize::instance( $options );
