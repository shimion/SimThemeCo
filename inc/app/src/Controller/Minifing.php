<?php
namespace ST\Controller;
use \ST\Base\Base;
use \MatthiasMullie\Minify;
class Minifing {
   protected static $instance;
    protected $styles = [];
    protected $scripts = [];
    protected $option = [];
    protected $data = [];
    private $option_name;
    public $default = [];
    public $main = [];
    public static function get_instance(){
            if( is_null( self::$instance ) ){
                self::$instance = new self( $_REQUEST );
            }

            return self::$instance;
        }




    public function __construct(){

            $this->main['css'] = _CSS.'main.min.css';
            $this->main['js'] = _JS.'main.min.js';
            $this->default['css'] = _CSS .  'bootstrap.css';
            $this->default['js'] = _JS   .    'popper.min.js' ;
            //$this->styles['bootstrap'] = _CSS.'bootstrap.css';
            $this->styles['animation'] = _CSS.'animation.css';
            $this->styles['font-awesome'] = _CSS.'font-awesome.min.css';
            $this->styles['slide'] = _CSS.'slide.css';
            $this->styles['style'] = _CSS.'style.css';
            $this->styles['header'] = _CSS.'header.css';
            $this->styles['header'] = _CSS.'menu.css';
            $this->styles['wp'] = _CSS.'wp.css';
            $this->styles['form'] = _CSS.'form.css';
            $this->styles['loading'] = _CSS.'loading.css';
            $this->styles['post'] = _CSS.'post.css';
            $this->styles['comments'] = _CSS.'comments.css';
            $this->styles['wp-calender'] = _CSS.'wp-calender.css';
            $this->styles['sidebar'] = _CSS.'sidebar.css';
            $this->styles['footer'] = _CSS.'footer.css';
            /* Load all control css here */
            $this->styles['search'] = _CSS.'search.css';
            $this->styles['woo'] = _CSS.'woo.css';
            $this->styles['card'] = _CSS.'card.css';
            $this->styles['paralax'] = _CSS.'paralax.css';
            //$this->styles['theme'] = _CSS.'theme.css';
                $this->styles = apply_filters('filter_minify_css', $this->styles);
            //$this->scripts['popper'] =  _JS.'popper.min.js';
            $this->scripts['bootstrap'] =  _JS.'bootstrap.min.js';
            $this->scripts['jquery.waypoints.min'] =  _JS.'jquery.waypoints.min.js';
            $this->scripts['sticky'] =  _JS.'sticky.js';
            $this->scripts['wow'] =  _JS.'wow.js';
            $this->scripts['jquery.parallax'] =  _JS.'jquery.parallax-1.1.3.js';
            $this->scripts['simthemeco'] =  _JS.'simthemeco.js';
            $this->scripts = apply_filters('filter_minify_js', $this->scripts);

            $this->option_name = 'st-scripts-register';
            $this->option = Collect(unserialize (get_option( $this->option_name ))) ?? false;

            $this->data['css'] = $this->styles;
            $this->data['js'] = $this->scripts;
            if(empty($this->option)){
               update_option($this->option_name, serialize($this->data));
                $this->option_name = $this->data;
            }
       // print_r($this->data);
         //  $this->SaveScripts();
           $this->GetMinified();



        }




    public function register(){
            return 'scripts';
        }



    public function SaveScripts(){

            if ( $this->option !== false or !empty($this->option) ) {
                // The option already exists, so we just update it.
                /*array_diff_ukey($this->option, $this->data, function(){
                    foreach($this->data as $key=>$value){
                        if(!array_key_exists($key, $this->option))
                            array_merge($this->option, $value)
                    }
                });*/

                $this->data = array_merge($this->option, $this->data);

                update_option( $this->option_name, serialize ($this->data) );
            } else {
                // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
                $deprecated = null;
                $autoload = 'no';
                add_option( $this->option_name, serialize ($this->data), $deprecated, $autoload );
            }
    }

    public function GetMinified(){
        print_r($this->option);
        $minifier = new Minify\CSS($this->default['css']);
        $jsminifier = new Minify\JS($this->default['js']);

        $css = $this->option['css'] ?? $this->styles;
       // print_r($css);
        $js = $this->option['js'] ?? $this->scripts;
        foreach($css  as $key => $style){
            $minifier->add($style);
        }

       foreach($js  as $key => $j){
            $jsminifier->add($j);
        }

        echo $jsminifier->minify($this->main['js']);
        echo $minifier->minify($this->main['css']);


    }


    public static function Data(){

        }




}