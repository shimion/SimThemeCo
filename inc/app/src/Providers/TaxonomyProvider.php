<?php 
namespace ST\Providers;
use \ST\Base\Provider;
class TaxonomyProvider extends Provider{
    
    private $name;
    private $slug;
    private $singular; 
    private $plural; 
    private $public; 
    private $post_type;
    public function __construct($arr){  
                //print_r($arr);
                $this->name =  $arr['name'];
                $this->post_type =  $arr['post_type'];
                $this->slug =  $arr['slug'] ?? $this->name;
                $this->singular =  $arr['singular'] ?? $this->name;
                $this->plural =  $arr['plural'] ?? $this->name;
                
                $this->TaxonomyInit();
            }

    
    public function register(){
            return 'taxonomy-provider';
    }
    
    
    
    
    public function TaxonomyInit(){

            // Add new taxonomy, NOT hierarchical (like tags)
            $labels = array(
                'name'                       => _x( $this->name, 'taxonomy general name', NAME ),
                'singular_name'              => _x( $this->singular, 'taxonomy singular name', NAME ),
                'search_items'               => __( 'Search '. $this->plural, NAME ),
                'popular_items'              => __( 'Popular '.$this->plural, NAME ),
                'all_items'                  => __( 'All '.$this->plural, NAME ),
                'parent_item'                => null,
                'parent_item_colon'          => null,
                'edit_item'                  => __( 'Edit '.$this->singular, NAME ),
                'update_item'                => __( 'Update '.$this->singular, NAME ),
                'add_new_item'               => __( 'Add New '.$this->singular, NAME ),
                'new_item_name'              => __( 'New '.$this->singular.' Name', NAME ),
                'separate_items_with_commas' => __( 'Separate '.$this->plural.' with commas', NAME ),
                'add_or_remove_items'        => __( 'Add or remove '.$this->plural, NAME ),
                'choose_from_most_used'      => __( 'Choose from the most used '.$this->plural, NAME ),
                'not_found'                  => __( 'No '.$this->plural.' found.', NAME ),
                'menu_name'                  => __( $this->plural , NAME ),
            );

                $args = array(
                    'hierarchical'          => false,
                    'labels'                => $labels,
                    'show_ui'               => true,
                    'show_admin_column'     => true,
                    'update_count_callback' => self::update_count_callback(),
                    'query_var'             => true,
                    'rewrite'               => array( 'slug' => $this->slug ),
                );

            register_taxonomy( $this->name, $this->post_type, $args );
        }
    
        private function update_count_callback(){
            
        }
    
    
}