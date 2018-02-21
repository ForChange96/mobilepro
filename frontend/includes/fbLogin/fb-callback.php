<?php
	include_once "config.php";
	
	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if (! isset($accessToken)) {
	  header("location: http://localhost:81/mobilepro/frontend/index.phptrang-chu");
	  exit();
	}

	// The OAuth 2.0 client handler helps us manage access tokens
	$oAuth2Client = $fb->getOAuth2Client();
	if (! $accessToken->isLongLived()) {
	  $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
	}
	$response = $fb->get("/me?fields=id,name,email",$accessToken);
	$userData = $response->getGraphNode()->asArray();

    session_start();
	$_SESSION['user_fb']=$userData;
	header("location: http://localhost:81/mobilepro/frontend/index.php?mod=home&act=login_fb")
?>