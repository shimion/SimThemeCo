<?php 


namespace ST;
use ST\Base\Base;

class Controller extends Base
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $data;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function register(){
        return 'welcome';
    }
    
    
    public static function Data(){
        return 'This is Welcome Massage';
    }
    
    
    
}