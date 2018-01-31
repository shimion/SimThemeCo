<?php 
namespace ST\Base;
use    ST\Base\Core;
abstract class Post{
    
    
    protected $ID;
    
    protected $title;
    
    protected $content;
       
    protected $meta_data = [] ;
    
    protected $meta_type = 'post' ;
    
    
   protected $post_terms = []; 
   
    protected $post;
    
    
   protected $data = array();
    
    
    
    
    
    
 	public function __construct( $args = array() ) {
        global $post;
        $this->post = $post;
        $this->ID =   $args['ID'] ?? get_the_ID();
        $this->title = get_the_title($this->ID);
        $this->GetMetaByObjectId();
        $this->UnserializeData();
        $this->data = array(
   
        'Id' =>  $this->ID,
       
        'title' => $this->GetTitle(),
       
        'sub_title' => '',
       
        'content' => $this->GetContent(),
       
        'excerpt' => '',
       
        'date' => '',
       
        'image' => $this->PostImage(),
       
        'link' => '',
       
        'icon' => '',
       
        'gallery' => '',
       
        'enable_social' => '',
       
        'twitter_image' => '',
       
        'facebook_image' => '',
       
        'sidebar' => '',
       
        'customizer' => '',
       
        'permission' => '',
       
        'disable_page_title' => '',
       
        'disable_page_content' => '',
       
        'disable_page_meta' => '',
       
        'lead' => '',
       
        'taxonomies' => '',
       
        'categories' => '',
       
        'layer' => '',
       
   
        );
               
	}
   
    
    public function GetID(){
        return $this->ID;
    }  
    
    
    public function GetTitle(){
        return $this->title;
    }
    
    
    public function GetContent(){
        return $this->post->post_content;
    }
    
    
    
    public function GetMeta(){
        return $this->meta_data;
    }
    
    protected function GetMetaByObjectId(){
     $this->meta_data =  get_metadata($this->meta_type, $this->ID);
    }
    
    protected function UnserializeData(){
     $this->meta_data =  maybe_unserialize( $this->meta_data);
    }
    
    public function SetMeta(){
        return $this->meta_data;
    }
    
    protected function PostImage(){
         global $post;
            $post_thumbnail_id = get_post_thumbnail_id( $this->ID );
            $image = wp_get_attachment_image_src($post_thumbnail_id , add_filter('filter_product_size', 'large') );
            $image = $image[0];
            if(empty($image)) return false;
            $image = sprintf('<img src="%s"  alt="%s" />', $image, $post->post_title);
            if(!empty($image)){
            $image = sprintf('<a class="navbar-brand" href="%s">%s</a>', get_permalink($this->ID), $image);
            $image = sprintf('%s%s%s', '<figure>', $image, '</figure>');
         }
        if(!empty($image))
            return $image;
    }
    
    
    
    
    
	/**
	 * Get and store terms from a taxonomy.
	 *
	 * @since  3.0.0
	 * @param   $object
	 * @param  string $taxonomy Taxonomy name e.g. category
	 * @return array of terms
	 */
	protected function get_term_ids( $object, $taxonomy ) {
		if ( is_numeric( $object ) ) {
			$object_id = $object;
		} else {
			$object_id = $object->get_id();
		}
		$terms = get_the_terms( $object_id, $taxonomy );
		if ( false === $terms || is_wp_error( $terms ) ) {
			return array();
		}
		return wp_list_pluck( $terms, 'term_id' );
	}

    
    
    
}