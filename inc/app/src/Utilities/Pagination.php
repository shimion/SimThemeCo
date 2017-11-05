<?php 
namespace ST\Utilities;
use \ST\Base\Utilities;


/* 
 * @parm Array $DATA
 * @ string as output
DATA: Structure and must needed Variables--
    --$previous_text | --- Check Status $status
        $Pages   {
                
                -- $page number |
                -- $page number | -- + add class $active 
                -- $page number |
            }
    --$next_text  | --- Check Status $status

*/
class Pagination extends Utilities
{
    public $data;
     
    public function __construct($DATA){
        parent::__construct($DATA);
      
        //echo $this->file;
        }
   
    public function register(){
                return 'pagination';
            }
    
    
    
    
}