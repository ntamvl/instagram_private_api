<?php

require 'src/Instagram.php';
// brian.khoidoan / abcd1234
// $username = 'potterj412';
// $password = 'abcd1234';
$username = 'brian.khoidoan';
$password = 'abcd1234';
$debug = false;
$user_id = $_GET["user_id"];
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
    if ( isset($user_id) ) {
		if ( isset($next_max_id) ) {
	        $feeds = $i->getUserFeed($user_id, $next_max_id);
	        echo json_encode($feeds);
		} else {
			$feeds = $i->getUserFeed($user_id);
			echo json_encode($feeds);
		}
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

