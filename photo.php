<?php

require 'src/Instagram.php';
// brian.khoidoan / abcd1234
// $username = 'potterj412';
// $password = 'abcd1234';
$username = 'brian.khoidoan';
$password = 'abcd1234';
$debug = false;
$photo_id = $_GET["photo_id"];

$i = new Instagram($username, $password, $debug);

$query = "selfie";

try {
    $i->login();
} catch (InstagramException $e) {
    echo $e->getMessage();
    exit();
}

try {
    if ( isset($photo_id) ) {
      $feeds = $i->mediaInfo($photo_id);
      echo json_encode($feeds);
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

