<?php

require 'src/Instagram.php';
$username = 'gahong2527';
$password = 'matkhaudongian';
$debug = false;
$usernameId = $_GET["user_id"];
$next_max_id = $_GET["next_max_id"];

$i = new Instagram($username, $password, $debug);

$query = "selfie";

try {
    $i->login();
} catch (InstagramException $e) {
    echo $e->getMessage();
    exit();
}

try {
    if ( isset($usernameId) ) {
      if ( isset($next_max_id) ) {
        $feeds = $i->getUserFollowers($usernameId, $maxid = $next_max_id);
        echo json_encode($feeds);
      } else {
        $feeds = $i->getUserFollowers($usernameId, $maxid = null);
        echo json_encode($feeds);
      }
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

