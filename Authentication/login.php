<?php  
require_once '../connection.php';
session_start();
$email = $password = $encrypted = $userRole = $status  = '';
$emailErr = $passwordErr = '';

$_SESSION['userUnaivable'] = "Wrong credentials, try again or create an account";
$_SESSION['alertTypeError'] = "danger";
 
if (isset($_POST['loginbtn'])) {
  if (empty($_POST['emailLog'])) {
    $emailErr = "email required";
  } else {
    $email = $_POST['email'];
  }

  if (empty($_POST['password'])) {
        $passwordErr = "email required";
  } else {
    $password = $_POST['password'];
  }

  if (empty($emailErr) && empty($passwordErr)) {
  
    $loginSql = "SELECT * FROM users WHERE email='$email' && password='" .md5($password) .  "'";
        $result = mysqli_query($conn,$loginSql);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
     
      while ($row = mysqli_fetch_array($result)) {
        $userRole = $row['role'];
        $status = $row['verified_status']; 
      }
      switch ($userRole) {
        case 'Admin':
        
            if ($status == "yes") {

             $_SESSION['activeuser'] = $email;
                     header('location: ../admin.php?logged');

            } else {
              $_SESSION['notVerified'] = "not verified yet";
              header('location: ../index.php?nverified');
            }
          break;

          case 'Student':

                $_SESSION['activeuser'] = $email;
                      header('location: ../student.php?logged');
          break;
        
      }

    } else {
      $_SESSION['userUnaivable'];
      header('location: ../index.php?wrongCredLogin');
    }
  }



}



?>


