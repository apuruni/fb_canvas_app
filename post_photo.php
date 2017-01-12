<?php
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

// phpinfo();
include 'app-setting.php';

session_start();

$fb = new Facebook\Facebook($app_params);
// $photo_file_path = __DIR__ .'/img/pic_720p.png';
$photo_file_path = __DIR__ .'/img/Share01.jpg';

echo 'Sharing photo path: '. $photo_file_path . "\n";


$data = [
  // 'caption' => 'Caption of the photo. #TestShare',
  'caption' => 'Beautiful sea! #TestShare',
  'source' => $fb->fileToUpload($photo_file_path),
];

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/photos', $data, 'EAAZA2BpuLIk0BAEAHlRAL7mSr398m9LmgQZAKMmhZA878ZAiLsH8DRZBM5WkcYcFxLa4rfQwKaeWbpa7ceCtVrrheX5tJ9lviaGqwhR928E4QpJeF7AoZCHsZCHjy1ZAMq7Jt4tqFpJZBNv6ZAigrgLxsv7jF5LKK28Bay7shcAydVqYHJj7ZBSjwBX3zmPjrHaxs4OfduY1CxMNwZDZD');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage()  . "\n";
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage()  . "\n";
  exit;
} catch (Exception $e) {
  echo 'error: ' . $e->getMessage();
}


$graphNode = $response->getGraphNode();

echo 'Photo ID: ' . $graphNode['id']  . "\n";
?>

