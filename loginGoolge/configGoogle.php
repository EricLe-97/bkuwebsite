<?php

//start session on web page
session_start();

//configGoogle.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1005112560617-58vs79qeb37nbfsam4041i9ljod0j9pe.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('3_x3U8a6MGWUII3HtJnzf3fd');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://localhost/loginGoogle/indexGoogle.php');

// to get the email and profile
$google_client->addScope('email');

$google_client->addScope('profile');

?>
