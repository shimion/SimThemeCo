<?php 
namespace ST;
use Illuminate\Affiliate\Affiliate as Affiliate;
use Northwoods\Config\ConfigFactory;
use \ST\Controller;
use \ST\Controller\Nevi;
use \ST\Controller\FooterNevi;
use \ST\Controller\Config as DataResource;
use ST\Controller\Search;
use ST\Controller\Pagination;
use ST\Helpers;
class App
{
    
    
    
    
     /*
   *  $wp_fields
   *
   *  TL:DR !IMPORTANT ~ Array used to control what fields are returned
   *  Each value is all a method in the parent class to be called
   *
   *  @type	property | public | array
   *
   *  @param	n/a
   *  @return	n/a
   */
     
    public static function Data(){
        return [
        'Title'     =>          self::Title(),
        'PostMeta'  =>          self::PostMeta(),
        'Menu'      =>           Nevi::Data(),
        'FooterMenu'      =>           FooterNevi::Data(),    
        'Data'      =>           self::Config() ,
        'Search'      =>           Search::Data(), 
        'HBCWD'    => self::SideBar('HBCWD'),  
        'HACWD'    => self::SideBar('HACWD'),
        'ActionAfterContent' =>     self::AdditionalFieldAfterContent(),
        'Pagination'    => self::Pagination(),   
        ];
    }
    
    public static function me(){
        return self::Data();
    }
    
    public static function Config(){
        global $Data;
        
        $data = new ConfigFactory();
            
               $config = $data::make([
                    'directory' => _INC . 'config',
                ]); 
     return   $config;
            
    }
    
    public static function SideBar($name){
        ob_start();
       
        dynamic_sidebar( $name);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
     
   
    
    public static function PostMeta(){
           global $post;
            $html = sprintf('<div class="%s">Posted by %s on %s</div>', 'st-postmeta m-2 ml-lg-0 mb-lg-3', self::GetAuthorInfo( 'login' ), get_the_date('l, F j, Y'));
           
           return  html_entity_decode($html);
        }
    
    
    
    
    public static function GetAuthorInfo($field = 'login'){
        global $post;
        $author = get_the_author_meta($field, $post->post_author);
       
        if(!empty($author)) return $author;
        
    }
    
        
     
       public static function Title(){
           global $post;
           $html = Excerpt(get_the_title(), App::Config()->Get('global.title_limit'));
           return $html;
        }

      public static function Content(){
           global $post;
           $html = Excerpt(get_the_content(), App::Config()->Get('global.excerpt_limit'));
           return $html;
        }

      public static function AdditionalFieldAfterContent(){
           global $post;
           return apply_filters('action_addditional_fields_after_content', $post);
        }
    
    
        public static function Pagination(){
            $pagination = new Pagination();
            return $pagination->Output();
        }

    
    
}