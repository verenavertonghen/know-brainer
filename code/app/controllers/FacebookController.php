<?php

	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookAuthorizationException;
	use Facebook\FacebookRequestException;

class FacebookController extends \BaseController {

	public function login(){
		$facebook = new Facebook(Config::get('facebook'));
    	$params = array(
        	'redirect_uri' => url('/login/fb/callback'),
        	'scope' => 'email',
    	);
    	return Redirect::to($facebook->getLoginUrl($params));
	}

	public function fb_callback(){
		$code = Input::get('code');
    	if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    	$facebook = new Facebook(Config::get('facebook'));
    	$uid = $facebook->getUser();

    	if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    	$me = $facebook->api('/me');


    	$profile = Profile::whereUid($uid)->first();
    	if (empty($profile)) {

        	$user = new User;
        	$user->email = $me['email'];
        	$user->avatar = 'https://graph.facebook.com/'.$uid.'/picture?type=large';
        	$user->username = $me['first_name'].$me['last_name'];
        	$user->facebook = $me['id'];
        	$user->save();

        	$profile = new Profile();
        	$profile->uid = $uid;
        	//$profile->username = $me['username'];
        	$profile = $user->profiles()->save($profile);
    	}

    	$profile->access_token = $facebook->getAccessToken();
    	$profile->save();

    	$user = $profile->user;

    	Auth::login($user);
    	return Redirect::to('/')->with('message', 'Logged in with Facebook');
	}
}