<?php 
// Configuration for specific template specific sidebar
return[
    //Basic
    'login_page' => '/login',
    'bc' => Helpers()->TemplateBasedSidebarDetector('bc'),
   // 'bc_enable' => Helpers()->Option('bc_enable'),
    'ac' => Helpers()->TemplateBasedSidebarDetector('ac'),
   // 'ac_enable' => Helpers()->Option('ac_enable'),
    
    
    
];