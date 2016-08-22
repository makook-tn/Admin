<?php
session_start();
require_once  './Modeles/autoloader.php';
require_once("Modeles/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('Views/home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('Views/home.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Makook : Login</title>
<link href="Views/Ressources/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="Views/Ressources/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="Views/Ressources/style.css" type="text/css"  />
<link rel="icon" type="image/png" href="Views/Ressources/assets/img/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="Views/Ressources/assets/img/favicon-32x32.png" sizes="32x32">
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="Views/Ressources/bower_components/uikit/css/uikit.almost-flat.min.css"/>
<link rel="stylesheet" href="Views/Ressources/assets/css/login_page.min.css" />
</head>
<body>

<div class="signin-form">

    <div class="container">
        
        
       <form class="form-signin" method="post" id="login-form">
           <div class="login_heading login_page center-block">
                    <div class="user_avatar center-block"></div>
           </div>
        
        <h2 class="form-signin-heading">Log In to WebApp.</h2><hr />
        
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="md-btn md-btn-primary md-btn-block md-btn-large">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button>
        </div>  
      	<br />
            <label>Don't have account yet ! <a href="sign-up.php">Sign Up</a></label>
      </form>

    </div>
    
</div>

</body>
</html>