<?php 
    namespace ST\Less;
    require _APP."src/Less/lessc.inc.php";
    use lessc as nlessc;
    class Less{
        protected $init ;
        protected $less ;
        protected $var = [];
        public function __construct($LESS = array(), $VAR = array()){ 
             $this->less = $LESS;
            $this->var = $VAR;
            $this->init = new nlessc; 
            $this->SetVariables();
          //print_r(GetConfig('global.less'));
            }





        protected function SetVariables(){
       //     $this->init->setVariables(GetConfig('less')); 
            $this->init->setVariables($this->var); 
        }


        public function Build(){   
            return $this->init->compile($this->less);
        }


    }
