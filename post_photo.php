<?php
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

// phpinfo();
include 'app-setting.php';

session_start();

$fb = new Facebook\Facebook($app_params);

$helper = $fb->getRedirectLoginHelper();

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

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
  echo 'facebook_access_token=' . $_SESSION['facebook_access_token'];
  echo '<br/>';
}
?>

