<?php 
namespace ST\Controller;
use \ST\Base\Base;

class Search extends Base
{
        
    
    public function __construct(){
        
    }
    
    
    public function register(){
            return 'search';
    }
    

    
      public static function Data(){ 
               return     get_search_form(false);
            } 
    
    
    public static function Form(){ 
               return     '<form role="search" method="get" class="form-inline my-2 my-lg-0 st-search-form" action="' . esc_url( GetConfig('global.site_url') ) . '" target="_self">
      <input class="form-control mr-sm-2" type="search" placeholder="Search string here" aria-label="Search" value="' . self::query() . '" name="s" id="s">
      <button class="btn ' . GetConfig('global.button_class'). ' my-2 my-sm-0" type="submit" id="searchsubmit">Search</button>
    </form>';
            } 
    
    
      public static function query(){
          return get_search_query();
      }  
    
    
    
    
    
}