<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;
use WP_Query as Query;
class LatestEvents extends Utilities
{
    public $data;
     
    public function __construct($DATA){
        parent::__construct($DATA);
      
        //echo $this->file;
       $this->data['events'] = $this->Set();
        }
   
    public function register(){
                return 'latest-events';
            }
    
    
    public function Set(){
        global $wp_query;
        $output = [];
        $array['post_type'] = 'event';
        $array['posts_per_page'] = $this->data['total_posts'] ?? '4';
        $array['time'] = $this->data['time'] ?? NULL;
        $array['date'] = $this->data['date'] ?? NULL;
        $array['register_button'] = $this->data['register_button'] ?? NULL;
        //print_r($array);
        $query = new Query($array);
         //
        $query = $query->posts;
      
        if(!empty($query) && is_array($query)){
            foreach($query as $pt){
              $post_meta =  get_post_meta( $pt->ID, '_event_settings', true );
               // print_r($post_meta);
                $post_meta = collect($post_meta);
              //  print_r($post_meta);
              $date =   $post_meta['event_start_date'];
                //echo strtotime ($date);
                $day = date('d', strtotime ($date));
                $m = date('M', strtotime ($date));
                $event_start_time =  !empty($post_meta['event_start_time']) ? $post_meta['event_start_time'] . ':00' : '';
                $output[] = array(
                    'post_title' => $pt->post_title,
                    'post_link' => get_permalink($pt->ID),
                    'post_date' => $day.'<br>'.$m ,
                    'post_time' => $event_start_time,
                    'post_meta' => get_post_meta( $pt->ID, '_event_settings', true ),
                        );
            }
        }
    
       if ( !empty($output) && is_array($output) )
          return $output;
    }
    
}