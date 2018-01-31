<?php 
namespace ST\Helpers;
class ModulesFieldsFactory{
    
    protected $total;
    public $fields = [];
    protected $unique_name;
    protected $default;
    protected $field = array(
                    'heading'    => true,
                    'title'    => true,
                    'subtitle'    => false,
                    'text'    => false,        
                    'image'    => false,
                    'video'    => false,
                    'icon'    => false,
                    'audio'    => false,
                    'social'    => false,
                    'link'    => false,
                    'readmore'    => false,
        
                );
    
    
    public function __construct() {
        $this->default = array(
                    'heading'    => 'Default Heading Here',
                    'title'    => 'Default Title Here',
                    'subtitle'    => 'Default Subtitle Here',
                    'text'    => 'Demo description section.',        
                    'image'    => 'placeholder.jpg',
                    'video'    => '',
                    'icon'    => '',
                    'audio'    => '',
                    'social'    => true,
                    'link'    => true,
                    'readmore'    => 'Read More',
        
                );
    }
    
 
    
    public function getdefaultfieldsbyfieldsid(){
        $dafault = [];
            foreach($this->default as $key => $def){
                $dafault['layout_'.$key] = $def;
            }
        return $dafault;
    }
    
    
   public function GetFieldsByNumber($unique_name, $args = [], $total = 4){
        $this->total = $total;
        $this->unique_name = $unique_name;
        $this->field = $args;
        $this->fields['id'] = $this->unique_name;
        $this->fields['title'] = 'Fields';
        $this->fields['button_title'] = 'Add New Field';
        $this->fields['type'] = 'group';
        $this->fields['fields'] =   $this->GenerateFieldSet('something');
         $return = array(); 
       // $this->fields = array_merge($this->fields, $fields) ; 
       $return[] = $this->fields;
         return  $return;
   } 
    
    
    
    
    
  protected  function GenerateFieldSet($i){
        $array = [];
        foreach($this->field as $key=>$value){
            $unique_name = $this->unique_name.'_'.$i;
                if($key == 'title' && $value == true ){
                $array[]  =    array(
                        'id' => $unique_name.'_'.$key,
                        'type'    => 'text',
                        'title'   => 'Title',
                        'default' => '',
                        
                );
                }elseif($key == 'subtitle' && $value == true ){
                $array[]  =    array(
                        'id' => $unique_name.'_'.$key,
                        'type'    => 'text',
                        'title'   => 'Sub Title',
                        'default' => '',
                        
                );
            }elseif($key == 'text' && $value == true ){
                $array[]  =    array(
                        'id' => $unique_name.'_'.$key,
                        'type'    => 'textarea',
                        'title'   => 'Text',
                        'default' => '',
                        
                );
            }elseif($key == 'image' && $value == true ){
               $array[]  =   array(
                        'id' => $unique_name.'_'.$key,
                        'title' => 'Image',
                         'type'  => 'upload',
                        'settings'      => array(
                            'upload_type'  => 'image',
                            'button_title' => 'Upload Image',
                            'frame_title'  => 'Select a image',
                            'insert_title' => 'Use this image',    
                            )
                        
                );
                
                
                
 /*               $array['id'] = $unique_name;
                $array['title'] = 'Image';
                 $array['type'] = 'upload';
                 $array['settings'] = array(
                            'upload_type'  => 'image',
                            'button_title' => 'Image',
                            'frame_title'  => 'Select a image',
                            'insert_title' => 'Use this image',    
                            );
                
*/                
            }elseif($key == 'video' && $value == true ){
                $array[]  =    array(
                        'id' => $unique_name.'_'.$key,
                        'title' => 'Video',
                        'type'  => 'upload',
                        'settings'      => array(
                            'upload_type'  => 'video',
                            'button_title' => 'Upload Video',
                            'frame_title'  => 'Select a video',
                            'insert_title' => 'Use this video',    
                            )
                        
                );
            }elseif($key == 'audio' && $value == true ){
                $array[]  =    array(
                        'id' => $unique_name.'_'.$key,
                        'title' => 'Audio',
                        'type'  => 'upload',
                        'settings'      => array(
                            'upload_type'  => 'audio',
                            'button_title' => 'Upload Audio',
                            'frame_title'  => 'Select a audio',
                            'insert_title' => 'Use this audio',    
                            )
                        
                );
            }elseif($key == 'icon' && $value == true ){
                $array[]  =    array(
                        'id' => $unique_name.'_'.$key,
                        'type'    => 'icon',
                        'title'   => 'Icon',
                        'default' => 'fa fa-heart',
                        
                );
            }elseif($key == 'social' && $value == true ){
                $array[]  =    array(
                        'id' => $unique_name.'_'.$key,
                        'type'    => 'switcher',
                        'title'   => 'Enable Social Buttons',
                        'default' => false,
                        
                );
           }elseif($key == 'link' && $value == true ){
                $array[]  =    array(
                        'id' => $unique_name.'_'.$key,
                        'type'    => 'text',
                        'title'   => 'Button URL',
                        'default' => '',
                        
                );
           }elseif($key == 'readmore' && $value == true ){
               $array[]  =   array(
                        'id' => $unique_name.'_'.$key,
                        'type'    => 'text',
                        'title'   => 'Button Text',
                        'default' => '',
                        
                );
           }elseif($key == 'heading' && $value == true ){
               $array[]  =   array(
                       'id' => $unique_name.'_'.$key,
                        'type'    => 'heading',
                        'title'   => 'Column: '.$i,
                        'default' => '',
                        
                );
            }
        }
        
      
      return $array;
        
    }
}
    