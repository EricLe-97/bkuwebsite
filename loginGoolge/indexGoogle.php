<?php

//index.php

//Include Configuration File
include('configGoogle.php');

$login_button = '';

// $_GET["code"] variable value received after users login into their Google Account redirct to PHP script
// then this variable value has been received
// After web server receives the authorization code, it can exchange the authorization code for an access token
if(isset($_GET["code"]))
{
// To exchange authorization code for an access token => use the authenticate method:
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
   // if stored the access token in a user session => use setAccessToken method
  $google_client->setAccessToken($token['access_token']);


  $_SESSION['access_token'] = $token['access_token'];
  $_SESSION['google_token'] = $_SESSION['access_token'];

  $google_service = new Google_Service_Oauth2($google_client);


  $data = $google_service->userinfo->get();


  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
   $_SESSION['gg_username'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
   $_SESSION['gg_username'] .= $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'" style = "background: #dd4b39; border-radius: 5px; color: white; display: block; font-weight: bold; padding: 20px; text-align: center; text-decoration: none; width: 200px;">Login With Google</a>';
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">PHP Login using Google Account</h2>
   <br />
   <div class="panel panel-default">
   <?php
   if($login_button == '')
   {
    header('location:index.php');
    echo '<div align="center" class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<div align="center"><img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail"/></div>';
    echo '<h3 align="center"><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3 align="center"><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
    echo '<h3 align="center"><a href="logoutGoogle.php">Logout</h3></div>';
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>
  </div>
 </body>
</html>
