<?php
/*
 * Must PreDefined ***
*/
return[
    //Basic
    'logo' => Helpers()->SetLogo(),
    'favicon' => get_theme_mod('site_icon', ASSETS . 'logo.jpg'),
    'date_format' => get_option('date_format'),
    'site_url'   =>  Helpers()->site['url'],
    'site_name'   =>  Helpers()->site['name'],
    'site_description'   =>  Helpers()->site['description'],
    'business_address' => Helpers()->Option('business_address') ?? '',
    'business_phone' => Helpers()->Option('business_phone') ?? '',
    'coppy_right' => apply_filters('filter_copy_right_wapper', Helpers()->Option('coppy_right')) ?? '© Copyright 2017 by SimTheme.com',
    'dynamic_widgets' => Helpers()->GetAllDynamicWidget(),
    'dynamic_css'   => Helpers()->GenerateDynamicCss(),
    'dynamic_js'   => Helpers()->GenerateDynamicJs(),
    //Layout
    'wapper'        => true,
     'disable_content_section' =>  false, //it is currently apply on homepage only
    'disable_title' =>  false, //it is currently apply on homepage only
    'disable_content' =>  false, //it is currently apply on homepage only
    'fullwidth_layout'        => Helpers()->Option('fullwidth_layout') ?? false,
    'disable_sidebar'        => Helpers()->RestrictSidebar(),
    'button_class'  => 'btn-primary', // ***
    'header_top' => Helpers()->DisplayHeaderTop(),
    'header' => true,
    'menu_search' => Helpers()->Option('enable_search_header'),
    'menu_text' => apply_filters('filter_header_extra_text', Helpers()->Option('custom_text_on_the_header')) ?? '',
    'menu_button_enable' => Helpers()->Option('menu_button_enable') ?? '',
    'menu_button_text' => Helpers()->Option('menu_button_text') ?? 'Download',
    'menu_button_link' => Helpers()->Option('custom_text_on_the_header') ?? '',
    'HBCWD'  => Helpers()->SideBar('HBCWD') ?? '', //home page before content widget
    'HACWD'  => Helpers()->SideBar('HACWD') ?? '', //home page before content widget
    'sidebar' => Helpers()->EnableSidebar(),
    'excerpt_limit' => Helpers()->ExcerptLimit(), //post excerpt limit
    'title_limit' => Helpers()->TitleLimit(),  //post Title limit

    //Events/Posts
    'latest_events' => do_action('Action_Latest_Event_listing_config'),




    // read more
    'readmore_text' => Helpers()->ReadMoreText(), //Read More text
    'readmore_class' => 'my-2 btn-primary',
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
    'print_style' => Helpers()->CustomStyle(),
    'st_register_scripts' => get_option('st-scripts-register'),

];