<?php 
namespace ST\Providers;
use \ST\Base\Provider;
use ST\Providers\TaxonomyProvider;
class PostTypeProvider extends Provider{
    
    private $name;
    private $slug;
    private $singular; 
    private $plural; 
    private $public; 
    private $capability_type; 
    private $supports;
    private $taxonomies = [];
     private $taxonomy_support;
    public function __construct($arr){  
                
                $this->name =  $arr['name'];
                $this->slug =  $arr['slug'] ?? $this->name;
                $this->singular =  $arr['singular'] ?? $this->name;
                $this->plural =  $arr['plural'] ?? $this->name;
                $this->public = $arr['plural'] ?? true;
                $this->capability_type = $arr['capacity'] ?? 'post';
                $this->supports = $arr['supports'] ?? array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' );
                $this->taxonomy_support = $arr['taxonomy_support'] ?? false;
                $this->taxonomies[] = $arr['taxonomies'];
                $this->PostTypeInit();
                $this->Taxonomy();
            }

    
    public function register(){
            return 'post-type-provider';
    }
    

    public function PostTypeInit() {
        $labels = array(
            'name'               => _x( $this->plural, 'post type general name', NAME ),
            'singular_name'      => _x( $this->singular, 'post type singular name', NAME ),
            'menu_name'          => _x( $this->plural, 'admin menu', NAME ),
            'name_admin_bar'     => _x( $this->singular, 'add new on admin bar', NAME ),
            'add_new'            => _x( 'Add New', $this->singular, NAME ),
            'add_new_item'       => __( 'Add New '.$this->singular, NAME ),
            'new_item'           => __( 'New '. $this->singular, NAME ),
            'edit_item'          => __( 'Edit '. $this->singular, NAME ),
            'view_item'          => __( 'View '. $this->singular, NAME ),
            'all_items'          => __( 'All '. $this->plural, NAME ),
            'search_items'       => __( 'Search '. $this->plural, NAME ),
            'parent_item_colon'  => __( 'Parent '. $this->plural .':', NAME ),
            'not_found'          => __( 'No '. $this->plural .' found.', NAME ),
            'not_found_in_trash' => __( 'No '. $this->plural .' found in Trash.', NAME )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', NAME ),
            'public'             => $this->public,
            'publicly_queryable' => $this->public,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $this->slug ),
            'capability_type'    => $this->capability_type,
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => $this->supports
        );

        register_post_type( $this->name, $args );  
    }
    
    
        public function Taxonomy(){
           // print_r($this->taxonomies);
            if($this->taxonomy_support){
                foreach($this->taxonomies as $tax){
                        new TaxonomyProvider($tax);
                }
            }
        }
    
     
}