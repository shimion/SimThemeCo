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
    
    
    
    
    
 	public function __construct( $args = array() ) {
              $this->ID =   $args['ID'] ?? get_the_ID();
		      $this->GetMetaByObjectId();
                $this->UnserializeData();
               
	}
   
    
    public function GetID(){
        return $this->ID;
    }  
    
    
    public function GetTitle(){
        return $this->title;
    }
    
    
    public function GetContent(){
        return $this->content;
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