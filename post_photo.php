<?php
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

// phpinfo();
include 'app-setting.php';

session_start();

$fb = new Facebook\Facebook($app_params);
$photo_file_path = __DIR__ .'/img/pic_720p.png';

echo 'Sharing photo path: '. $photo_file_path . "\n";


$data = [
  'caption' => 'Caption of the photo. #TestShare',
  'source' => $fb->fileToUpload($photo_file_path),
];

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/photos', $data, 'EAAZA2BpuLIk0BAMJt6Mn7OWdqlR9cZCzEJsFLH3ZAuO0z0uBvwUUUZB7F0FqT6PIZBhOafnruLihP9TMJWyGlFOwD1ZAaFnj4SU0qlw2JwMyryki1bTXwdtZBRpn7QB34ibYhyTgCZBIxZCyTrd3klESmxAZC77izcodfuzu659B0y791Lv7XOoqLVuPYWFK8mVFfQYY54l4eECwZDZD');
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

