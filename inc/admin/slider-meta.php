<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.




add_filter( 'cs_metabox_options', function ($options){
$options[]    = array(
  'id'        => '_slider_setting',
  'title'     => 'Slider Settings',
  'post_type' => 'st-slider',
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
              'id'    => 'caption',
              'type'  => 'switcher',
              'title' => 'Enable Caption',
                'default' => true
            ),

          array(
              'id'    => 'pagination',
              'type'  => 'switcher',
              'title' => 'Enable Pagination',
              
                'default' => true
            ),

         array(
              'id'    => 'pagination_color',
              'type'  => 'colors',
              'title' => 'Pagination Colors',
             'dependency'   => array( 'pagination', '!=', false ),  
               
            ),

         array(
              'id'    => 'nevi',
              'type'  => 'switcher',
              'title' => 'Enable Nevigation',
                'default' => true
            ),

        array(
              'id'    => 'paralax',
              'type'  => 'switcher',
              'title' => 'Enable Paralax',
                'default' => false
            ),
       array(
              'id'    => 'fullscreen',
              'type'  => 'switcher',
              'title' => 'Enable Fullscreen',
                'default' => false
            ),
        array(
              'id'    => 'slider_height',
              'type'  => 'number',
              'title' => 'Slider Height',
                'default' => '560',
                'help' => 'It is counted as px.'
            ),  
        array(
              'id'    => 'layout',
              'type'  => 'select',
              'title' => 'Layout',
                'default' => 'default',
                'options' => array(
                    'defaut' => 'Default',
                    'side-by-side'=> 'Side by Side'
                ),
            ),

        ),
    ),
      
      
    // begin: a section
    array(
      'name'  => 'bilding',
      'title' => 'Sliders',
      'icon'  => 'fa fa-sliders',
        'context'   => 'side',
      // begin: fields
      'fields' => array(

        
        // end: a field

        array(
                  'id'              => 'slide',
                  'type'            => 'group',
                  'title'           => 'Slider',
                  'button_title'    => 'Add New Slider',
                  'accordion_title' => 'New Slider',
                  'fields'          => array(
 
 
                      
                      
                                        array(
                                          'id'    => 'title',
                                          'type'  => 'text',
                                          'title' => 'Title',
                                        ),

                                        array(
                                          'id'    => 'image',
                                          'type'  => 'background',
                                          'title' => 'Image',
                                        ),

                                          array(
                                          'id'    => 'text',
                                          'type'  => 'textarea',
                                          'title' => 'Description',
                                        ),
                      
                     
                                           array(
                                          'id'    => 'link',
                                          'type'  => 'text',
                                          'title' => 'Read More Url',
                                        ),
                                        array(
                                          'id'    => 'link_text',
                                          'type'  => 'text',
                                          'title' => 'Read More Text',
                                        ),
                          
                      array(
                      'id'        => 'caption',
                      'type'      => 'fieldset',
                      'title'     => '',
                      'fields'    => array( 
                      

                                      /* array(
                                              'type'    => 'heading',
                                              'content' => 'Caption Background Color',
                                            ),*/

                                        array(
                                              'id'    => 'caption_background',
                                              'type'  => 'color_picker',
                                              'title' => 'Caption Background',
                                                'rgba' => true
                                          ),

       
                         
 
                                        array(
                                              'id'    => 'title_color',
                                              'type'  => 'color_picker',
                                              'title' => 'Title Color',
                                                'default' => ''
                                          ),

      
 
                                        array(
                                              'id'    => 'text_color',
                                              'type'  => 'color_picker',
                                              'title' => 'Text Color',
                                                'default' => ''
                                          ),

      
                           
                          
                          
 
                                        array(
                                              'id'    => 'read_more_background',
                                              'type'  => 'colors',
                                              'title' => 'Read More Background Color',
                                                'default' => ''
                                          ),

      
 
                                        array(
                                              'id'    => 'read_more_text',
                                              'type'  => 'colors',
                                              'title' => 'Read More Text Color',
                                                'default' => ''
                                          ),
                     
                      
                      ),
                    ),
                    
                                            
                      
                      
                      array(
                      'id'        => 'layout_setting',
                      'type'      => 'fieldset',
                      'title'     => 'Layout Settings',
                      'fields'    => array( 
                      
                      
                      
                      
                      
                                              array(
                                                  'id'      => 'number_1',
                                                  'type'    => 'number',
                                                  'title'   => 'Number',
                                                  'default' => '10',
                                                  'after'   => ' <i class="cs-text-muted">$ (dollars)</i>',
                                                ),

                                                array(
                                                  'id'        => 'layout_settings',
                                                  'type'      => 'image_select',
                                                  'title'     => 'Select Layout',
                                                  'options'   => array(
                                                    'default' => 'http://codestarframework.com/assets/images/placeholder/100x80-2ecc71.gif',
                                                    'value-2' => 'http://codestarframework.com/assets/images/placeholder/100x80-e74c3c.gif',
                                                    'value-3' => 'http://codestarframework.com/assets/images/placeholder/100x80-ffbc00.gif',
                                                    'value-4' => 'http://codestarframework.com/assets/images/placeholder/100x80-3498db.gif',
                                                    'value-5' => 'http://codestarframework.com/assets/images/placeholder/100x80-555555.gif',
                                                  ),
                                                ),

                     


                                       array(
                                              'id'    => 'paralax',
                                              'type'  => 'switcher',
                                              'title' => 'Enable Paralax',
                                                'default' => true
                                          ),


     
      
                      
                          ),
                        ),

      
                       
                  ),
                ),
      ), // end: fields
    ), // end: a section

    // begin: a section
    array(
      'name'  => 'preview',
      'title' => 'Preview',
      'icon'  => 'fa fa-tint',
      'fields' => array(
                   array(
                      'id'      => 'slider_preview',
                      'type'    => 'preview',
                      'title'   => 'Color Picker 1',
                      'default' => '#2ecc71',
                    ),

 
      ),
    ),
    // end: a section

  ),
);
    
    return $options;

});


