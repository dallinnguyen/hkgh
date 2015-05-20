<?php

class AuthController extends BaseController {
    
//    public function login(){
//        $facebook = new Facebook(Config::get('facebook'));
//        $params = array(
//				'scope' => '',
//				'redirect_uri' => 'https://apps.facebook.com/hiep_khach_giang_ho/'
//			      );
//	$loginUrl = $facebook->getLoginUrl($params);
//	echo '<script>top.location.href="' . $loginUrl . '";</script>';
//    }
    public function getIndex(){
	
	return View::make('login.index');
    }

    public function showLogin(){
	
		return View::make('login.index');
	}
    public function getLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('auth'); // redirect the user to the login screen
	}

    public function postLogin(){
		// validate the info, create rules for the inputs
		
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		
		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			
			
			
			if (Auth::attempt($userdata)) {
			
				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				
				return Redirect::to('/');
			
			} else {	 	
			
				// validation not successful, send back to form	
				return Redirect::to('login');
				//return Redirect::intended('dashboard');
			
			}

		}
	}
    
	
}