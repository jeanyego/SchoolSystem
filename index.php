<?php 
session_start();?>
<html>
<head>
<title>SchoolSystem</title>
            <meta charset="UTF-8">
            <meta name="keywords" content="HTML, CSS, Bootstrap, JavaScript">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
   <?php
      require 'connection.php';
    ?>
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
<div class="container">
  <div class="jumbotron" style="text-align: center;">
    <h1>School System</h1>      
    <p>Welcome to the School system, you can proceed to login if you have an account or sign up if you don't have an account.</p>
    <p>Remember to select your respective role.</p>  
  </div> 
</div>
<div class="container">
  <div class="jumbotron">
<div class="row">
   <div class="col-md-6">
      <p class="alert alert-<?php 
                        if (isset($_GET['registered'])) {
                          
                          echo $_SESSION['classTypeSuccess'];
                          session_unset();
                          session_destroy();
                       } elseif (isset($_GET['notreg'])) {
                          echo $_SESSION['classTypeError'];
                          session_unset();
                          session_destroy();
                       } elseif (isset($_GET['wrongCred'])){
                          echo $_SESSION['classTypeError'];
                          session_unset();
                          session_destroy();
                       }
                 ?>">
                    <?php
                       if (isset($_GET["registered"])) {
                          if (isset($_SESSION["reg"])) {
                          echo $_SESSION["reg"];
                          session_unset();
                          session_destroy();
                          } else {
                            echo "registration successfull";
                          }
                     

                       } elseif (isset($_GET["notreg"])) {
                           
                         if (isset($_SESSION["noreg"])) {
                          echo $_SESSION["noreg"];
                          session_unset();
                          session_destroy();
                         } else
                          {
                            echo "not registered";
                          }
                       
                       } elseif (isset($_GET['wrongCred'])) {
                         if (isset($_SESSION['userTaken'])) {
                           echo $_SESSION['userTaken'];
                           session_unset();
                           session_destroy();

                         } else {
                           echo "Credentials (Username or Email) currently exist. Try different credentials";
                         }
                       }

                    ?>


                </p>           
    <form id="myform" class="registration-form" method=post action="Authentication/register.php">
      <h3 style="text-align: center;">SignUp</h3>
         <!--username-->
         <label for="action">Enter Username:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <span class="fa fa-user"></span>
                  </span>                    
              </div>
           
              <input type="text" name="username" class="form-control" placeholder="" required="required">
          </div>
      </div>
       <!--Email Address-->
       <label for="action">Enter Email Address:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <span class="fa fa-envelope"></span>
                  </span>                    
              </div>
              <input type="email" name="email" class="form-control" placeholder=""  required="required" >
          </div>
      </div>
               <!--Password-->
              <label for="action">Enter Password:</label><br>
         <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-lock"></i>
                  </span>                    
              </div>
              <input type="password" id="password" onkeyup="check();" name="password" class="form-control" placeholder="" required="required">
          </div>
      </div>   
      <!--confirm password-->
      <label for="action">Confirm Password:</label><br>
         <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-lock"></i>
                  </span>                    
              </div>
              <input type="password" id="cpassword" onkeyup="check();" name="cpassword" class="form-control" placeholder="" required="required">
              <span id="message"></span>
          </div>
      </div>   
        <!--role-->
        <label for="action">Role:</label><br>
      <div class="form-group">
        <div class="input-group">
          
          <select class="form-control" id="role" name="role">
            <option>Admin</option>
            <option>Student</option>
          </select>
        </div>
        <br>
         <label for="action">Enter Registration date:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-calendar"></i>
                  </span>                    
              </div>
              <input type="date" name="reg_date" class="form-control" placeholder="" required="required">
          </div>
      </div>  
        <div class="bottom-action clearfix">
          <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>   
        </div> 
           <!--Registration btn-->
           <button type="submit" id="registerbtn" name="registerbtn" class="btn btn-danger btn-block">Register</button>
          </div>    
    </form>
  </div>
  <div class="col-md-6">
      <p class="alert alert-<?php 
      if (isset($_GET['wrongCredLogin'])) {
                      if (isset($_SESSION['alertTypeError'])) {
                        echo $_SESSION['alertTypeError'];
                        session_unset();
                        session_destroy();
                      } elseif($_GET['update']){
                        echo $_SESSION['alertTypeError'];
                        session_unset();
                        session_destroy();
                      } 
                      else {
                        echo "danger";
                      }
                   }

                            if (isset($_GET['nverified'])) {
                   
                      if (isset($_SESSION['alertTypeError'])) {
                        
                        echo $_SESSION['alertTypeError'];
                        session_unset();
                        session_destroy();
                      } elseif($_GET['update']){
                        echo $_SESSION['alertTypeError'];
                        session_unset();
                        session_destroy();
                      } 
                      else {
                        echo "danger";
                      }
                   }


                 ?>"> 
                <?php 
                   if (isset($_GET['wrongCredLogin'])) {
                      if (isset($_SESSION['userUnaivable'])) {
                        echo $_SESSION['userUnaivable'];
                        session_unset();
                        session_destroy();
                      }
                       else {
                        echo "user details are wrong, kindly check and try again";
                      }
                   }

                   if (isset($_GET['nverified'])) {
                      if (isset($_SESSION['notVerified'])) {
                        echo $_SESSION['notVerified'];
                        session_unset();
                        session_destroy();
                      } else {
                        echo "not verified yet";
                      }
                   }

                ?>
              </p>
              <p class="alert alert-<?php 
                      if(isset($_GET['update'])){
                          if($_SESSION['typeAlert']){
                            echo $_SESSION['typeAlert'];
                            session_unset();
                            session_destroy();
                          } else {
                            echo "info";
                          }
                      }

                ?>">
            <?php  
              if (isset($_GET['update'])) {
                        if (isset($_SESSION['updateSuccess'])) {
                         echo $_SESSION['updateSuccess'];
                        session_unset();
                        session_destroy();
                        } else {
                          echo "reset successful login with new password";
                        }
                      }
                 ?>    
              </p>
              <h3 style="text-align: center;">Login</h3>
    <form id="myform" class="login-form" method ="post" action="Authentication/login.php" >
      
         <!--username-->
         <label for="action">Enter Username:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <span class="fa fa-user"></span>
                  </span>                    
              </div>
           
              <input type="text" name="username" id="username" class="form-control" placeholder="" required="required">
          </div>
      </div>
       <!--Email Address-->
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
               <!--Password-->
               <label for="action">Enter Password:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-lock"></i>
                  </span>                    
              </div>
              <input type="password" id="password" name="password" class="form-control" placeholder="" required="required">
          </div>
      </div>   
       
        <!--role-->
        <label for="action">Role:</label><br>
      <div class="form-group">
        <div class="input-group">
          
          <select class="form-control" name="role" id="role">
            <option>Admin</option>
            <option>Student</option>
          </select>
        </div>
        <br>
        <div class="bottom-action clearfix">
          <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>   
        </div> 
           <!--Login btn-->
            <div class="form-group">
                  <input type="submit" name="login" id="loginbtn" class="btn btn-success btn-block" value="Login">
                </div>
          </div>
    
          <div class="bottom-action clearfix">
              <a class="link" href="Authentication/reset.php">Forgot password? click here</a>
          </div>        
    </form>
  </div>      
 </div>
</div>
</div>
<script type="text/javascript">
     function check(){
      if (document.getElementById('password').value === document.getElementById('cpassword').value) {
                   
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
</html>