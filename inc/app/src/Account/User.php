<?php 
namespace /ST/Account;
 class User{
    // Check the accessability
    public static $ip;
    
    
     public function __construct(){
          
         
            
        }
    
     
     
    
    public static function GetUserIp(){
            if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
            //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
            //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
            $ip = $_SERVER['REMOTE_ADDR'];
            }
    
        return apply_filters( 'wpb_get_ip', $ip );
        
    }
    
    
    
}