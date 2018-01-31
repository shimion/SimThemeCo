<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;
use WP_Query as Query;
class LatestRequests extends Utilities
{
    public $data;
     
    public function __construct($DATA){
        parent::__construct($DATA);
      
        //echo $this->file;
       $this->data['requests'] = $this->Set();
        }
   
    public function register(){
                return 'latest-requests';
            }
    
    
    public function Set(){
        global $wp_query;
        $output = [];
        $array['post_type'] = 'request';
        $array['posts_per_page'] = $this->data['total_requests'] ?? '20';
        $array['time'] = $this->data['time'] ?? NULL;
        $array['date'] = $this->data['date'] ?? NULL;
        $array['register_button'] = $this->data['register_button'] ?? NULL;
        //print_r($array);
        $query = new Query($array);
         //
        $query = $query->posts;
       // print_r($query);
        $result = [];
        $result['more'] = array(
            'text' => $this->data['view_all_text'] ?? 'View All Request',
            'url' => $this->data['view_all_url']
        );
        if(!empty($query) && is_array($query)){
            foreach($query as $pt){
              $post_meta =  get_post_meta( $pt->ID, '_request_settings', true );
               // print_r($post_meta);
                $post_meta = collect($post_meta);
              //  print_r($post_meta);
              $date =   get_the_date(GetConfig('global.date_format'), $pt->ID) .' | '. get_the_date('g:i a', $pt->ID);
                
                //echo strtotime ($date);
               // $day = date('d', strtotime ($date));
               // $m = date('M', strtotime ($date));
               // $event_start_time =  !empty($date) ? $date : '';
                $output[] = array(
                    'post_title' => wp_trim_words($pt->post_title, $this->data['title_text_limit'] ?? 3, null),
                    'post_link' => get_permalink($pt->ID),
                    'post_date' => $date ,
                    'post_content' => wp_trim_words(get_the_excerpt($pt->ID), $this->data['content_text_limit'] ?? 3, null),
                    'post_meta' => get_post_meta( $pt->ID, '_request_settings', true ),
                        );
            }
        }
    
       if ( !empty($output) && is_array($output) )
          $result['query'] = $output;
        
           return $result;
    }
    
}