<?php

require '../src/Instagram.php';

$username = 'potterj412';
$password = 'abcd1234';
$debug = false;
$tag = $_GET["tag"];
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
    if ( isset($tag) ) {
      if ( isset($next_max_id) ) {
        $feeds = $i->tagFeed($tag, $next_max_id);
        echo json_encode($feeds);
      } else {
        $feeds = $i->tagFeed($tag);
        echo json_encode($feeds);
      }
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

