<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use SammyK;

class FacebookController extends Controller
{
    public function redirect(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    	$login_link = $fb
            ->getRedirectLoginHelper()
            ->getLoginUrl('http://localhost:8000/social/facebook/callback', ['email', 'user_events']);
    
        return redirect($login_link);

    	echo '<a href="' . $login_link . '">Log in with Facebook</a>';
    }

    public function callback(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    	try {
	        $token = $fb
	            ->getRedirectLoginHelper()
	            ->getAccessToken();
	    } catch (Facebook\Exceptions\FacebookSDKException $e) {
	        // Failed to obtain access token
	        dd($e->getMessage());
	    }

	    if (! $token) {
	        // Get the redirect helper
	        $helper = $fb->getRedirectLoginHelper();

	        if (! $helper->getError()) {
	            abort(403, 'Unauthorized action.');
	        }

	        // User denied the request
	        dd(
	            $helper->getError(),
	            $helper->getErrorCode(),
	            $helper->getErrorReason(),
	            $helper->getErrorDescription()
	        );
	    }

	    if (! $token->isLongLived()) {
	        // OAuth 2.0 client handler
	        $oauth_client = $fb->getOAuth2Client();

	        // Extend the access token.
	        try {
	            $token = $oauth_client->getLongLivedAccessToken($token);
	        } catch (Facebook\Exceptions\FacebookSDKException $e) {
	            dd($e->getMessage());
	        }
	    }

	    $fb->setDefaultAccessToken($token);

	    // Save for later
	    Session::put('fb_user_access_token', (string) $token);

	    // Get basic info on the user from Facebook.
	    try {
	        $response = $fb->get('/me?fields=id,name,email',$token);
	    } catch (Facebook\Exceptions\FacebookSDKException $e) {
	        dd($e->getMessage());
	    }

	    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
	    $facebook_user = $response->getGraphUser();
	    return $facebook_user;
    }
}
