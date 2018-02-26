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
        'Body'     =>          self::Body(),
        'Title'     =>          self::Title(),
        'Phone'     =>          self::Phone(),    
        'PostMeta'  =>          self::PostMeta(),
        'PostImage' =>          self::PostImage(),    
        'Menu'      =>           Nevi::Data(),
        'FooterMenu'      =>           FooterNevi::Data(),
        'CoppyRight'    => self::CoppyRight(), 
        'Socials'        => self::Socials(),    
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
     
   public static function Body(){
       $class =  get_body_class();
       $html = implode(" ",$class);
       $html .= self::AddClassToBoddyForBuilder();
       return apply_filters('Filter_Body_Classes', $html);
   }
    
    public static function PostMeta(){
           global $post;
            $html = sprintf('<div class="%s">Posted by %s on %s</div>', 'st-postmeta m-2 ml-lg-0 mb-lg-3', self::GetAuthorInfo( 'login' ), get_the_date('l, F j, Y'));
           
           return  html_entity_decode($html);
        }
    
    
    public static function AddClassToBoddyForBuilder(){
        if(self::GetPageMeta('customizer'))
            return ' st-customizer-enable';
    }
    
    public static function GetAuthorInfo($field = 'login'){
        global $post;
        $author = get_the_author_meta($field, $post->post_author);
       
        if(!empty($author)) return $author;
        
    }
    
 
    
    public static function GetPageMeta($fieldname, $single = false){
        global $post;
        if(!empty($fieldname)){
            $id = $post->ID ?? get_the_ID();
            $meta = get_post_meta($id, '_custom_page_options', $single);
        }
       
        if(!empty($meta[0][$fieldname])) return $meta[0][$fieldname];
        
    }    
    
    
    
    
    public static function PostImage(){
         global $post;
            $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
            $image = wp_get_attachment_image_src($post_thumbnail_id , add_filter('filter_product_size', 'large') );
            $image = $image[0];
            if(empty($image)) return false;
            $image = sprintf('<img src="%s"  alt="%s" />', $image, $post->post_title);
            if(!empty($image)){
            $image = sprintf('<a class="img-link" href="%s">%s</a>', get_permalink($post->ID), $image);
            $image = sprintf('%s%s%s', '<figure>', $image, '</figure>');
         }
        if(!empty($image))
            return $image;
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
    
    
        public static function CoppyRight(){
            $html = GetConfig('global.coppy_right');
            return sprintf('<div class="text-right">%s</div>', $html);
        }
    
        public static function Phone(){
            $html = GetConfig('global.business_phone');
            if(empty($html)) return false;
            return sprintf('<span class="business-phone">%s</span>', $html);
        }
    
        public static function Socials(){
            return GetConfig('social');
        }
    
    
}