<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// CUSTOMIZE SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options              = array();
//$postID =   GetDynamicContent();
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
$options[]            = array(
  'name'              => 'widgets',
  'title'             => 'Body Content',
  'description'       => 'Main Content Section',
  'sections'          => array(

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
$content_section = [];
      // begin: Sidebar section
  $content_section[]=  array(
      'name'          => 'sidebar-widgets-hwcwd',   
      'title'         => 'Before Content Section',
      'settings'      => array(
          
       ),
    );
    // end: section
    
    $content_section[] =   array(
              'name'          => 'panel-widgets',   
              'title'         => 'Content Editor',
              'settings'      => array(

               )
            );
      
      
      // begin: Sidebar section
   $content_section[] =   array(
      'name'          => 'sidebar-widgets-hacwd',   
      'title'         => 'After Content Section',
      'settings'      => array(
          
       ),
    );
    // end: section
    
      
      
     
      
      
      
      
    // begin: Sidebar section
    $content_section[] =  array(
      'name'          => 'sidebar-widgets-sidebar',
      'title'         => 'Main Sidebar Section',
      'settings'      => array(
          
       ),
    );
    // end: section
      
       // begin: section
    $content_section[] =  array(
      'name'          => 'content-additional',
      'title'         => 'Additional Settings',
      'settings'      => array(

        array(
              'name'          => 'fullwidth_layout',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'switcher',
                  'title'     => 'Enable Fullwidth Layout',
                  'label'     => 'Enable to set the content section fullwidth.',
                  'help'      => '',
                  'default'      => false,
                ),
              ),
            ),

        
       array(
              'name'          => 'disable_sidebar',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'switcher',
                  'title'     => 'Disable Sidebar',
                  'label'     => 'Disable to hide the sidebar from content area.',
                  'help'      => '',
                  'default'      => false,
                ),
              ),
            ),

 
          
      array(
              'name'          => 'disable_content_section',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'switcher',
                  'title'     => 'Disable Default Content Section',
                  'label'     => 'It will let you hide the default title and content section.',
                  'help'      => '',
                  'default'      => false,
                ),
              ),
            ),

        

          
          
          

       array(
              'name'          => 'disable_title',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'switcher',
                  'title'     => 'Disable Default Title',
                  'label'     => 'Enable to hide title from the page.',
                  'help'      => '',
                  'default'      => false,
                'dependency'   => array( 'disable_content_section', '!=', 'true' ), 
                ),
              ),
            ),

        

       array(
              'name'          => 'disable_content',
              'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                  'type'      => 'switcher',
                  'title'     => 'Disable Default Content',
                  'label'     => 'Enable to hide content from the page.',
                  'help'      => '',
                  'default'      => false,
                    'dependency'   => array( 'disable_content_section', '!=', 'true' ), 
                ),
              ),
            ),

        

      ),
    );
    // end: section


$options[]            = array(
  'name'              => 'content_section',
  'title'             => 'Content Section',
  'description'       => 'Customize the content section.',
  'sections'          => $content_section

      
      

  
    
  // end: sections

);


 $options[]            = array(
  'name'              => 'footer',
  'title'             => 'Footer Section',
  'description'       => 'Customize the footer section.',
  'sections'          => array(

      
      
      // begin: Sidebar section
    array(
      'name'          => 'sidebar-widgets-before-footer',   
      'title'         => 'Widget Before Footer Section',
      'settings'      => array(
          
       ),
    ),
    // end: section
    
          // begin: Footer Widget
    array(
      'name'          => 'sidebar-widgets-footer-widget-section',   
      'title'         => 'Footer Widget Section',
      'settings'      => array(
          
       ),
    ),  
      
        // end: section  
      
      
      
      // begin: Sidebar section
    array(
      'name'          => 'sidebar-widgets-footer',   
      'title'         => 'Widget Coppy Right',
      'settings'      => array(
          
       ),
    ),
    // end: section
      
      
      
      

  ),
  // end: sections

);
        
     $options[]            = array(
              'name'              => 'additional',
              'title'             => 'Additional Setting',
              'description'       => 'Site additional Settings',
              'sections'          => array(

                             array(
                              'name'          => 'general',
                              'title'         => 'General Setting',
                              'settings'      => array(

                                /*
                                 * -T: Phone             
                                */    
                                    array(
                                      'name'          => 'business_phone',
                                      'control'       => array(
                                        'type'        => 'cs_field',
                                        'options'     => array(
                                          'type'      => 'text',
                                          'desc'      => 'Get the phone text here.',
                                          'title'     => 'Phone Number',
                                          'default'      => '(000) 111-1234',  
                                          //'dependency'   => array( 'switcher_title_tagline', '!=', false ),  
                                        ),
                                      ),
                                    ),



                                /*
                                 * -T: Address           
                                */    
                                    array(
                                      'name'          => 'business_address',
                                      'control'       => array(
                                        'type'        => 'cs_field',
                                        'options'     => array(
                                          'type'      => 'text',
                                          'desc'      => 'Provide the Business Address here.',
                                          'title'     => 'Business Address',
                                          'default'      => '3258 Westheimer Rd, Houston, TX 77098, USA',
                                          //'dependency'   => array( 'switcher_title_tagline', '!=', false ),
                                        ),
                                      ),
                                    ),



                                /*
                                 * -T: Show Hide Title & Tagline            
                                 */    
                                    array(
                                      'name'          => 'coppy_right',
                                      'control'       => array(
                                        'type'        => 'cs_field',
                                        'options'     => array(
                                          'type'      => 'text',
                                          'title'     => 'Copyright Text',
                                          'default'     => '© Copyright 2017 by SimTheme.com',
                                          'desc'      => 'Website Copyright text',
                                          'help'      => '',
                                         // 'default'      => true,
                                        ),
                                      ),
                                    ),

                              ),
                            ),

      

  ),
  // end: sections

);
        
          


CSFramework_Customize::instance( $options );
