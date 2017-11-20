<?php 
namespace ST\Providers;
use \ST\Base\Provider;

class StyleProvider extends Provider
{
    
    private $style;
    
    private $option_name;
    
    
        public function __construct(){ 
            $this->style = GetConfig('global.print_style');
            $this->option_name = 'print_styles';
            self::Set();
        }
    
    public function Get($style){
        $this->style .= $style;
    }
    
    
    
    private function Set(){

            if ( get_option( $this->option_name ) !== false ) {

                // The option already exists, so we just update it.
                update_option( $this->option_name, $this->style );

                    } else {

                // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
                $deprecated = null;
                $autoload = 'no';
                add_option( $this->option_name, $this->style, $deprecated, $autoload );
            }

        }
    
    
}