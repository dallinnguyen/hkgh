<?php

class FacebookController extends BaseController {
    
    public function Deauthorize(){
        //get the signed_request and decode to see the data inside
    }
    
    public function login(){
        $facebook = new Facebook(Config::get('facebook'));
        $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
        );
        return Redirect::to($facebook->getLoginUrl($params));
    }
    
    public function loginCallback(){
        $code = Input::get('code');
        if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');
    
        $facebook = new Facebook(Config::get('facebook'));
        $uid = $facebook->getUser();
    
        if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');
    
        $me = $facebook->api('/me');
    
        dd($me);
    }
    
}