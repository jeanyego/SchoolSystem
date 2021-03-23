<?php
include '../connection.php';
session_start();

$email = $newPassword = '';
$emailErr = $newPasswordErr = $encrypted = '';

$_SESSION['updateSuccess'] = "reset successful login with new password";
$_SESSION['typeAlert'] = "info";

if (isset($_POST['update'])) {
	if (empty($_POST['emailReset'])) {
        $emailErr = "email is required";
	} else {
		$email = $_POST['emailReset'];
	}

		if (empty($_POST['passwordReset'])) {
        $newPassErr = "password is required";
	} else {
		$newPass = $_POST['passwordReset'];
		$encrypted = md5($newPass);
	}


   if (empty($emailErr) && empty($newPassErr)) {
	$resetSql = "UPDATE users SET userpassword='$encrypted' WHERE email='$email'";

	$result = mysqli_query($conn,$resetSql);

	if ($result) {
		$_SESSION['updateSuccess'];
		header('location: ../index.php?update');
	}
   } 
   else {
   	  echo "invalid details";
   }

}
 


?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Reset Password
	</title>
		 <meta charset="UTF-8">
            <meta name="keywords" content="HTML, CSS, Bootstrap, JavaScript">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
            <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:40px;">
  <a class="navbar-brand" href="">SchoolSystem</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Account</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="">Contact</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href=""></a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <a class="nav-link" href="">Login</a>
        <a class="nav-link" href="">Register</a>
    </ul>
  </div>
</nav>
	<div class="container" style="margin-top: 20px;">
		<form action="reset.php" method="post" >	
		<h3>Reset Password</h3>	
<label for="action">Enter Email Address:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <span class="fa fa-envelope"></span>
                  </span>                    
              </div>
              <input type="email" name="email" class="form-control" placeholder=""  required="required">
          </div>
      </div>
      <label for="action">Enter New Password:</label><br>
         <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-lock"></i>
                  </span>                    
              </div>
              <input type="password" id="password" onkeyup="check();" name="passwordReset" class="form-control" placeholder="" required="required">
          </div>
      </div>   
      <label for="action">Confirm New Password:</label><br>
         <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-lock"></i>
                  </span>                    
              </div>
              <input type="password" id="confirmpassword" onkeyup="check();" name="confirmpassword" class="form-control" placeholder="" required="required">
              <span id="message"></span>
          </div>
      </div>   
      
		         		<div class="col" style="text-align: center;">
		         			<input type="submit" name="update" id="update" class="btn btn-success btn-block" value="Reset Password">
		         		</div>
			    			
		</form>
		
	</div>
	<script type="text/javascript">
		 function check(){
		 	if (document.getElementById('password').value === document.getElementById('confirmpassword').value) {
                   
                   document.getElementById('message').style.color = "green";
                   document.getElementById('message').innerHTML = "passwords match";
                   document.getElementById('save').disabled = false;
		 	} else {

                   document.getElementById('message').style.color = "red";
                   document.getElementById('message').innerHTML = "passwords do not match";
                   document.getElementById('save').disabled = true;
		 	}
		 }



	</script>
</body>
</html>