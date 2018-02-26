<?php
namespace ST\Providers;
use ST\Base\Provider;

class ScriptProvider extends Provider
{

    protected $script;
    protected $config = [];



        public function __construct($script){
            $this->Get($script);
            add_filter('filter_dynamic_js', array($this, 'Set'), 1);

        }




    public function Set($script){

             return $this->script;
        }



    public function Get( $script){
        //print_r($script);
        $this->script = $this->script . $script;
        //print_r($this->script);
    }


    public function GenerateDynamicJs(){
    $js = [];
    $output = '';
        $js = $this->script;
       // print_r($js);
         $ot = '';
        foreach($js as $key => $value){
                   if(!empty($value)){


                            $ot .= sprintf('%s', $value);

                      //  $value = $ot;
                    }
            }

    //$output = sprintf('<script>%s</script>', $output);
    return $ot;
    }




}