<?php

require 'src/Instagram.php';
$username = 'khoanko';
$password = 'babeboo';
$debug = false;
$user_id = $_GET["user_id"];

$i = new Instagram($username, $password, $debug);

$query = "selfie";

try {
    $i->login();
} catch (InstagramException $e) {
    echo $e->getMessage();
    exit();
}

try {
    if ( isset($user_id) ) {
      $feeds = $i->getUsernameInfo($user_id);
      echo json_encode($feeds);
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

