<?php  
namespace ST\Ajax;
use \ST\Providers\FormData;
class Ajax{
    private $data = [];
    private $type;
    private $output;
    private $success;
    private $error = [];
    public $thankyou;
    public function __construct(){
        add_action('wp_ajax_AjaxData', [$this, 'AjaxData']);
        add_action('wp_ajax_nopriv_AjaxData', [$this, 'AjaxData']);
        $this->thankyou = 'Thank you for the submission';
    }
    
    
    public function AjaxData(){
        $this->data = json_decode((string)$this->strip_slashes_recursive($_POST['data']),true);
        //print_r($this->data);
        $this->type = $_POST['type'];
       
        $this->Validation();
        $this->ReArrangeFormValues();
        if($this->error){
        $this->output = $this->error;
        $this->success = false;    
        }else{
        $this->output = apply_filters('filter_AjaxData',  $this->data,  $this->type,  $this);
            if($this->output){
                $this->output = apply_filters('filter_form_thankyou_massage', $this->thankyou, $this->output);
            }
          //  $this->output = $this->PostSubmission();
        $this->success = true;
            
        }
       
         
        
        header('Content-Type: application/json');
        echo json_encode(
            [
                "output" => $this->output,
                "success" =>$this->success,
            ]);
        die();
        
    }
    
    
    
    
    
        
    
    private function Validation(){
        $post = [];
        foreach($this->data as $data){
            if(empty($data['value'])){
            $this->error[$data['name']] = '<div class="invalid-feedback st-fields-error-class">Required fields</div>';
            }
            
        }
        
        
    }
    
    
    public function ReArrangeFormValues(){
        $post = [];
        foreach($this->data as $data){
            $post[$data['name']] = $data['value'];
        }
        
        
        $this->data = $post;
        
    }
    
    
    
    
    
    
    
    private function strip_slashes_recursive( $variable )
    {
        if ( is_string( $variable ) )
            return stripslashes( $variable ) ;
        if ( is_array( $variable ) )
            foreach( $variable as $i => $value )
                $variable[ $i ] = $this->strip_slashes_recursive( $value ) ;
        return $variable ;
    }
    
    
    
    
    
    
    
}