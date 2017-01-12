<?php
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

// phpinfo();
include 'app-setting.php';

session_start();

$fb = new Facebook\Facebook($app_params);
$photo_file_path = dirname(__DIR__).'/img/pic_720p.png';

echo 'Sharing photo path: '. $photo_file_path;


$data = [
  'message' => 'My awesome photo upload example.',
  'source' => $fb->fileToUpload($photo_file_path),
];

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/photos', $data, 'EAAZA2BpuLIk0BAKo8AEWbWKcPMpiuYftA8t5HyE7lAbmZATkqN2OuZATGZCaUkS07ZBPDvswUjsqlrD4YPg7ZBXgXd149n3FKGqZAkzuBZA94R9bpz6evKzZCEo1grqGwBiY9rGhXb5DZCcD1MlwYepKH7zieq07kyNLFlTdq8n94fcy2U19ZAZCuEH1dVRjHzgyTNDMbzF6vij0RAZDZD');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Photo ID: ' . $graphNode['id'];
?>

