<?php

//start the Yaf_Session
session_start();

//include autoload file from vendor folder
require './vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '286848069087196',
  'app_secret' => '4758f564f82eaad7226fb3ad8094aa0f',
  'default_graph_version' => 'v2.7'
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("https://localhost/loginFacebook/");

try {
  $accessToken = $helper->getAccessToken();
  if(isset($accessToken)){
    $_SESSION['$access_token'] = (string)$accessToken; //convert to string
    $_SESSION['facebook_token'] = $_SESSION['$access_token'];
    //if session is set we can redirect to the user to any page
    header("Location:../index.php");
  }
} catch (Exception $exc){
  echo $exc->getTraceAsString();
}

//get users first name, email, last xml_set_end_namespace_decl_handler
if(isset($_SESSION['$access_token'])){
 try{
   $fb->setDefaultAccessToken($_SESSION['$access_token']);
   $res = $fb->get('/me?locale=en_US&fields=name,email');
   $user = $res->getGraphUser();
   // echo "Hello, ", $user->getField('name');
   $_SESSION['fb_username'] = $user->getField('name');
   $_SESSION['fb_email'] = $user->getField('email');
 } catch (Exception $exc){
     echo $exc->getTraceAsString();
   }
}
?>
