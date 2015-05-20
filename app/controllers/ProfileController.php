<?php

class ProfileController extends BaseController {
    
    public function getIndex(){
        
        return View::make('profile.index');
                    
                                            
        
    }
    
    public function editProfile(){
        return View::make('profile.index');
    }
    
    public function profileEditAction(){
        return View::make('profile.index');
    }
    
    function do_alert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
}