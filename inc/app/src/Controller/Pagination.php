<?php 
namespace ST\Controller;
use \ST\Base\Base;
use ST\Helpers;
class Pagination extends Base{
    private $default_pagination;
    private $post_per_page;
    private $range;
    private $max_number_pages;
    private $post = array();
    private $paged = array();
    private $page;
    private $data = array();
    public function __construct(){  
            global $wp_query;
            $this->default_pagination = GetConfig('global.default_pagination') ?? false;
            if($this->default_pagination != true){
            $this->post_per_page = GetConfig('global.post_per_page') ?? 9; // Need to implement with wordpress query and overwrite number of posts to show. (Currently not working) 
            $this->range = App::Config()->Get('global.range') ?? 5; // Need it to check farther.
            $this->page = get_query_var('page'); 
            $this->paged = get_query_var('paged');
            $this->paged = !empty($this->page) ? $this->page: $this->paged;
            $this->paged = !empty($this->paged) ? $this->paged : 1;
            $this->max_number_page = $wp_query->max_num_pages;
            $this->Pagination();
            }
        }
    
        public function register(){
            return 'pagination';
        }
    
   
    
    
        private function Pagination() {
        $output = [];
        $output['previous'] = [];
        $output['next'] = [];
        $html = '';         
        
        if($this->paged<9)
            $this->range = 9;
        $showitems = ($this->range * 2 ) + 1;  
        if(empty($this->paged)) 
            $this->paged = 1;
        if($this->paged == '') {
             if(!$this->max_number_page){ 
                 $this->max_number_page = 1;
             }
        }   
        if(1 != $this->max_number_page){
            if($this->paged > 2 && $this->paged > $this->range+1 && $showitems < $this->max_number_page) 
                $output['previous'] = ['href'=> get_pagenum_link(), 'text'=> 'First', 'class'=> 'prev'];      
            if($this->paged > 1 && $showitems < $this->max_number_page)
                $output['previous'] = ['href'=> get_pagenum_link(), 'text'=> 'Previous', 'class'=> 'disabled'];        
  
            for ($i = 1; $i <= $this->max_number_page; $i++){
                 if (1 != $this->max_number_page &&( !($i >= $this->paged + $this->range + 1 || $i <= $this->paged - $this->range - 1) || $this->max_number_page <= $showitems )){
                    $output['pages'][$i] = ['href'=> get_pagenum_link($i), 'number'=> $i, 'class'=> ($this->paged == $i)? 'active' : ''];     
                    }
                }
 
            if ($this->paged < $this->max_number_page && $showitems < $this->max_number_page) 
            $output['next'] = ['href'=> get_pagenum_link($this->paged + 1), 'text'=> 'Next', 'class'=> 'next'];
         
            if ($this->paged < $this->max_number_page-1 &&  $this->paged + $this->range - 1 < $this->max_number_page && $showitems < $this->max_number_page ) 
            $output['next'] = ['href'=> get_pagenum_link($this->max_number_page), 'text'=> 'Last', 'class'=> 'last'];
            }else{
         
        }

    
            $this->data = $output;
   
	}
    
    
    
    
    public function DefaultPagination(){
        $html = '';
        if(get_next_posts_link())
        $html .= sprintf('<div class="%s">%s</div>','btn '.GetConfig('global.button_class').' my-4 float-right',  get_next_posts_link()); 
        if(get_previous_posts_link())
        $html .= sprintf('<div class="%s">%s</div>','btn '.GetConfig('global.button_class').' my-4 float-left', get_previous_posts_link());
        if($html)
        $html = sprintf('<div class="clearfix">%s</div>', $html);
        return $html ;
    }
    
    
    
      public static function Data(){ 
               
            } 
    
        public function Output(){
           // print_r($this->data);
            if($this->default_pagination != true){
                return Helpers::Pagination($this->data);
            }else{
                return $this->DefaultPagination();
            }
        }
        
    

        
}