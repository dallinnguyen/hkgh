<?php

class GameController extends BaseController {
    
    public function getIndex(){
        return View::make('game.index');
    }
    
    function do_alert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
}