<?php

require 'src/Instagram.php';
// brian.khoidoan / abcd1234
// $username = 'potterj412';
// $password = 'abcd1234';
$username = 'brian.khoidoan';
$password = 'abcd1234';
$debug = false;
$user = $_GET["username"];

$i = new Instagram($username, $password, $debug);

$query = "selfie";

try {
    $i->login();
} catch (InstagramException $e) {
    echo $e->getMessage();
    exit();
}

try {
    if ( isset($user) ) {
      $feeds = $i->getUsernameInfo($user);
      echo json_encode($feeds);
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

