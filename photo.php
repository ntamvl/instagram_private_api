<?php

require 'src/Instagram.php';
$username = 'khoanko';
$password = 'babeboo';
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

