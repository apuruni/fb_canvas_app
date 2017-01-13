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
  $response = $fb->post('/me/photos', $data, 'EAAZA2BpuLIk0BAPO0nlKFSxgZAZBLzVS06B2IliQZB2AurINvotGZAVqaZCrwpNHdLQFJ3hqVqEsrxnjGgqi6ZAUkskwZAoLSL5GYAVWK1CZCH614ZBS7y4d5oGtxbO1BbxbtPsHElUThgIwIhXS6F8M2Ukm8p2Oey6AEVOfJuhtRndLR0fZBSFuWpCyUeZAav1YTDewlkrv9GsOzQZDZD');
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

