<?php

use Dallin\Chat\ChatServiceProvider;

class ChatroomController extends BaseController {
    
    public function getIndex(){
        
        
        return View::make('chatroom.index');
    }
    
    function do_alert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
}