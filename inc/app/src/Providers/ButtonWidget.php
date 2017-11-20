<?php 
namespace ST\Providers;
use ST\Providers\ExtendWidget;
// It is still  under Dev
class ButtonWidget extends ExtendWidget {
      
      
    function __construct() {
       
      $this->id = 'button_widget';
      $this->name = 'SimThemeco Widget';  

      parent::__construct( $this->id, $this->name ?? $this->id, $widget_ops );

    }


      
      
      public function GetWidget(){
        }
      
      
       public function GetForm(){          
            return array(
                array(
                    'id' => 'button_text',
                    'name' => 'button_text',
                    'type' => 'text',
                    'title' => 'Text',
                ),
                array(
                    'id' => 'text',
                    'name' => 'text',
                    'type' => 'textarea',
                    'title' => 'Textarea',
                ),
               array(
                    'id' => 'logo',
                    'name' => 'logo',
                    'type' => 'upload',
                    'title' => 'Logo',
                ),
          );
 
              
      }
     
      
       
      
      
  }


