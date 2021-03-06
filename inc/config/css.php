<?php 
/*
 * Must PreDefined ***
*/
return[
    'body' => array(
        'font-size' => '20px',
    ),
    
    'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a' =>array(
        'color' => '#111'
    ),
    
 
   /* 
    - Start Header
    */
    '.header > nav.navbar' => sprintf("background-color:%s !important", Helpers()->Option('header_background')), // header BG color
    
    
    
    '.header, .header p, .header ul > li, .header ul > li a, .navbar-nav .nav-link, .navbar-light .navbar-nav .nav-link ' => sprintf("color:%s", Helpers()->Option('header_textcolor')), //normal color
    '.header > nav.navbar ul > li a:hover, .header > nav.navbar ul > li a.active' => sprintf("color:%s", Helpers()->Option('header_menu_color')), //hover color
    '.header > nav.navbar ul > li a' => array(
                                'background' => Helpers()->Option('header_menu_bg_color'),
                                'color' => Helpers()->Option('header_menu_color') . '!important',
                    ), //Menu Background Color
    

   '.header > nav.navbar ul > li a:hover, .header > nav.navbar ul > li a.active' => array(
                                'background' => Helpers()->Option('header_menu_bg_color_hover'),
                                'color' => Helpers()->Option('header_menu_color_hover'). '!important',
                    ), //Menu Background Color
    
   '.header > nav.navbar .btn.btn-primary' => array(
                                'background-color' => Helpers()->Option('header_button_color'),
                                'border-color'    => 'transparent',
                                'color'         => Helpers()->Option('header_button_text_color'),
                    ), //Menu Background Color
   '.header > nav.navbar .btn.btn-primary:hover' => array(
                                'border-color' => Helpers()->Option('header_button_color_hover'),
                                'color' => Helpers()->Option('header_button_text_color_hover'),
                                'background-color' => 'transparent',
                    ), //Menu Background Color Hover

    
    
/*   '.header > nav.navbar .btn.btn-outline-primary' => array(
                                'border-color' => Helpers()->Option('header_button_color'),
                                'color'         => Helpers()->Option('header_button_text_color'),
                    ), //Menu Background Color
   '.header > nav.navbar .btn.btn-outline-primary:hover' => array(
                                'background-color' => Helpers()->Option('header_button_color_hover'),
                                'color' => Helpers()->Option('header_button_text_color_hover'),
                    ), //Menu Background Color Hover
    
    
    
*/    
    
    
   /* 
    - End Header
    */
    
    
    
       /* 
    - Start Footer Widget
    */
    '.footer-widget-section' => array(
            'background-color' => Helpers()->Option('footer_backgrounds_widget'),
                ),

    '.footer-widget-section a, .footer-widget-section p, .footer-widget-section ul li' => array(
            'color'            => Helpers()->Option('footer_color'),
            'text-align'            => Helpers()->Option('footer_alignment_widget')
                ),

   '.footer-widget-section a:hover, .footer-widget-section ul li a:hover' => array(
            'color'            => Helpers()->Option('footer_color_hover_widget')
                ),

    '.footer-widget-section h1, .footer-widget-section h2, .footer-widget-section h3, .footer-widget-section h4, .footer-widget-section h5, .footer-widget-section h6, .footer-widget-section h1 a, .footer-widget-section h2 a, .footer-widget-section h3 a, .footer-widget-section h4 a, .footer-widget-section h5 a, .footer-widget-section h6 a, .footer-widget-section .widgettitle' => array(
            'color'            => Helpers()->Option('footer_color_title_widget'),
                ),

    
    '.footer-widget-section h1 a:hover, .footer-widget-section h2 a:hover, .footer-widget-section h3 a:hover, .footer-widget-section h4 a:hover, .footer-widget-section h5 a:hover, .footer-widget-section h6 a:hover, .footer-widget-section .widgettitle' => array(
            'color'            => Helpers()->Option('footer_color_title_hover_widget'),
                ),

    
    /* 
    - End Footer Widget
    */  
    
   
       /* 
    - Start Footer
    */
    'footer.st-footer' => array(
            'background-color' => Helpers()->Option('footer_backgrounds'),
                ),

    'footer.st-footer, footer.st-footer a, footer.st-footer p, footer.st-footer ul li' => array(
            'color'            => Helpers()->Option('footer_color'),
            'text-align'            => Helpers()->Option('footer_alignment')
                ),

   'footer.st-footer a:hover, footer.st-footer ul li a:hover' => array(
            'color'            => Helpers()->Option('footer_color_hover')
                ),

    'footer.st-footer h1, footer.st-footer h2, footer.st-footer h3, footer.st-footer h4, footer.st-footer h5, footer.st-footer h6, footer.st-footer h1 a, footer.st-footer h2 a, footer.st-footer h3 a, footer.st-footer h4 a, footer.st-footer h5 a, footer.st-footer h6 a' => array(
            'color'            => Helpers()->Option('footer_color_title'),
                ),

    
    'footer.st-footer h1 a:hover, footer.st-footer h2 a:hover, footer.st-footer h3 a:hover, footer.st-footer h4 a:hover, footer.st-footer h5 a:hover, footer.st-footer h6 a:hover' => array(
            'color'            => Helpers()->Option('footer_color_title_hover'),
                ),

    
    /* 
    - End Footer
    */  
    
    
    
    
    
    
    
    
];
    
?>