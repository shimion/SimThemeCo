<?php 
namespace ST\Helpers;
use \ST\Base\Core;
class Sidebar extends Core{
   
    private $sidebar;
   public $templates = [];
        
  public function __construct() {
          //  $this->sidebar = self::GenerateDynamicSidebar();
            $this->templates = apply_filters('Filter_Template_Name_sidebar',
                                            array('home' => 'Home', 
                                                  'page' => 'Page', 
                                                  'archive' => 'Archives'
                                                 )
                                            );
            apply_filters('Filter_Register_Sidebar', $this->init());
            
        }
    
    
    
        private function init(){
            self::DefaultSidebar();
            $this->Sidebars();
            
        } 
    
    
           public static function DefaultSidebar(){

            register_sidebar(array(
                'id' => 'sidebar',
                'name' => 'Main Sidebar',
                'description' => 'Default sidebar for all the pages.',
                'before_widget' => '<div id="%1$s" class="widget list-group-item %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>',
            ));  



            register_sidebar(array(
                'id' => 'header-top',
                'name' => 'Header Top Area',
                'description' => 'Use this wisget to show widget on the very top. Specifically for phone number, social icons, text, call to action button etc ',
                'before_widget' => '<div id="%1$s" class="col-sm %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="before_title"><h4 class="widgettitle">',
                'after_title' => '</h4></div>',
            ));  



           register_sidebar(array(
                'id' => 'header-bottom',
                'name' => 'Header Bottom Area',
                'description' => 'Use this widget to show content after the header/menu section and before the main content and sidebar section',
                'before_widget' => '<div id="%1$s" class="col-sm %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="before_title"><h3 class="widgettitle">',
                'after_title' => '</h3></div>',
            ));  





       register_sidebar(array(
                'id' => 'bc',
                'name' => 'Before Content Area',
                'description' => 'It will show before main content area',
                'before_widget' => '<div id="%1$s" class="col list-group-item %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="before_title"><h3 class="widgettitle">',
                'after_title' => '</h3></div>',
            ));

            register_sidebar(array(
                'id' => 'ac',
                'name' => 'After Content Area',
                'description' => 'It will show after main content area',
                'before_widget' => '<div id="%1$s" class="col list-group-item %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="before_title"><h3 class="widgettitle">',
                'after_title' => '</h3></div>',
            ));


             register_sidebar(array(
                'id' => 'before-footer',
                'name' => 'Before Footer Widget Area',
                'description' => 'Use this widget to show content after the main content and sidebar section and before the footer section.',
                'before_widget' => '<div id="%1$s" class="col-sm list-group-item %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="before_title"><h3 class="widgettitle">',
                'after_title' => '</h3></div>',
            ));  



            register_sidebar(array(
                'id' => 'footer-widget-section',
                'name' => 'Footer Widget Area',
                'description' => 'Full wapper will be devided depends on the number of widget used on this section.',
                'before_widget' => '<div id="%1$s" class="col-sm list-group-item %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>',
            ));  



           register_sidebar(array(
                'id' => 'footer',
                'name' => 'Footer Coppyright Area',
                'description' => 'Full wapper will be devided depends on the number of widget used on this section.',
                'before_widget' => '<div id="%1$s" class="col-sm %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>',
            ));  


         //   self::GenerateDynamicSidebar('home', 'Archive');
          //  self::GenerateDynamicSidebar('archive', 'Archive');
           // self::GenerateDynamicSidebar('archive', 'Archive');   
               

        } 
    
    
    public function Sidebars(){
        if(!empty($this->templates && is_array($this->templates))){
            foreach($this->templates as $key=>$template){
                self::GenerateDynamicSidebar($key, $template);
            }
        }
    }
    
    public static function PreperSidebarSet($id, $name){
        if(!isset($id) && !isset($name)) return false; 
        $id = '-'. $id;
        // $name = '-'. $name;
        return  apply_filters( 'Filter_Template_Dynamic_Sidebar_Set',
                array(
                    array(
                    'id' => 'sidebar'.$id,
                    'name' => sprintf('%s: Main Sidebar', $name),
                    'description' => sprintf('Default sidebar for %s', $name),
                    'before_widget' => '<div id="%1$s" class="widget list-group-item %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3 class="widgettitle">',
                    'after_title' => '</h3>',
                    ),
                    array(
                    'id' => 'bc' . $id,
                    'name' => sprintf(' %s: Before Content', $name),
                    'description' => sprintf('It will show content before %s page content', $name),
                    'before_widget' => '<div id="%1$s" class="col list-group-item %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<div class="before_title"><h3 class="widgettitle">',
                    'after_title' => '</h3></div>',
                    ),
                    array(
                    'id' => 'ac' . $id,
                    'name' => sprintf('%s: After Content', $name),
                    'description' => sprintf('It will show content after %s page content', $name),
                    'before_widget' => '<div id="%1$s" class="col list-group-item %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<div class="before_title"><h3 class="widgettitle">',
                    'after_title' => '</h3></div>',
                    ),
                
                               
                               
                ), $id, $name
            ); //endfilter  

        } 
    
    
    
    public static function GenerateDynamicSidebar($templateid, $templatename){
            if(!isset($templateid) && !isset($templatename)) return false; 
            foreach(self::PreperSidebarSet($templateid, $templatename) as $sidebar){
                    register_sidebar( $sidebar );
            }
    }
    

    
 }




?>