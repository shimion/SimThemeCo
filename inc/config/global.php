<?php 
/*
 * Must PreDefined ***
*/
return[
    'logo' => Helpers()->logo,
    'favicon' => get_theme_mod('site_icon', ASSETS . 'logo.jpg'),
    'date_format' => get_option('date_format'),
    'site_url'   =>  Helpers()->site['url'],
    'site_name'   =>  Helpers()->site['name'],
    'site_description'   =>  Helpers()->site['description'],
    'button_class'  => 'btn-outline-secondary', // ***
    'header_top' => Helpers()->DisplayHeaderTop(),
    'header' => true,
    'menu_search' => true,
    'menu_text' => true,
    'HBCWD'  => Helpers()->SideBar('HBCWD') ?? '', //home page before content widget
    'HACWD'  => Helpers()->SideBar('HACWD') ?? '', //home page before content widget
    'sidebar' => Helpers()->EnableSidebar(),
    'excerpt_limit' => Helpers()->ExcerptLimit(), //post excerpt limit
    'title_limit' => Helpers()->TitleLimit(),  //post Title limit
    // read more
    'readmore_text' => Helpers()->ReadMoreText(), //Read More text
    'readmore_class' => 'my-2 btn-outline-secondary',
    // pagination
    'post_per_page' => '3',
    'range' => '5',
    'default_pagination' => true,
    // Footer
    'footer' => true,
    'footer_widget' => true,
    'footer_menu' => true,
    'footer_text' => true,
    'footer_social' => true,
    
    
];