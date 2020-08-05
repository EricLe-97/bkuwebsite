<?php require './loginFacebook/fb-init.php';?>
<?php if(isset($_SESSION['$access_token'])):?>
    <a href="logout.php" style="background: #1a53ff; border-radius: 5px; color: white; display: block; font-weight: bold; padding: 10px; text-align: center; text-decoration: none; width: 50px;">Logout</a>
<?php else:?>
  <div align="center">
    <a href="<?php echo $login_url;?>" style = "background: #1a53ff; border-radius: 5px; color: white; display: block; font-weight: bold; padding: 20px; text-align: center; text-decoration: none; width: 200px;">Login with Facebook</a>
  </div>
<?php endif;?>
