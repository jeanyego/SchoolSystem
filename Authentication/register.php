<<<<<<< HEAD
<?php
      require '../connection.php';

 ?>
<?php
session_start();

$username = $email = $password = $encrypted_pass = $role = $reg_date='';
$usernameErr = $emailErr = $passwordErr = '';


$_SESSION["reg"] = "Registration Successful";
$_SESSION["noreg"] = "Registration not Successful";
$_SESSION['classTypeSuccess'] = "success";
$_SESSION['classTypeError'] = "danger";
$_SESSION['userTaken'] = "Wrong Credentials , try again or create an account";
if (isset($_POST['registerbtn']) ){

	if (empty($_POST['username'])) {
		$usernameErr = "username is required";
	} else {
		$usernames = $_POST['username'];
	}

if (empty($_POST['email'])) {
		$emailErr = "email is required";
	} else {
		$email = $_POST['email'];
	}

if (empty($_POST['password'])) {
		$passwordErr = "password is required";
	} else {
		$password = $_POST['password'];
		$encrypted_pass = md5($password);
	}
    
  $role = $_POST['role'];
  $reg_date = $_POST['reg_date'];

	$sql = "SELECT * FROM users WHERE username='$username' && email='$email'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	if ($num >= 1) {
		$_SESSION['userTaken'];
		header("location: ../index.php?wrongCred");
	} else {
		if (empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
		$stmt = $conn->prepare("INSERT INTO users (username,email,password,role,reg_date) VALUES (?,?,?,?,?)");
		$stmt->bind_param("ssss",$usernames,$email,$password,$role,$reg_date);

		if ($stmt->execute() === TRUE) {
            $_SESSION["reg"];
			$_SESSION['classTypeSuccess'];
			header('location: ../index.php?registered');

		} else {
            $_SESSION["noreg"];
			$_SESSION['classTypeError'];
			header('location: ../index.php?notreg');

		}
	}

	
	}
	

	



}


?>
=======
<?php 
include '../connection.php';
//variables
$username = $email = $password = $reg_date = $role =  "";
$usernameErr = $emailErr = $passwordErr = $reg_dateErr = $roleErr = "";

$_SESSION["reg"] = "Registration Successful";
$_SESSION["noreg"] = "Registration not Successful";
$_SESSION['classTypeSuccess'] = "success";
$_SESSION['classTypeError'] = "danger";
$_SESSION['userTaken'] = "Wrong Credentials , try again or create an account";
/*if ( isset($_POST['submit'])) {

  if (empty($_POST["username"])) {
    $usernameErr = "Userame is required";
  } else {
    $username = $_POST["username"];
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
  }

  if (empty($_POST["password"])) {
    $passwordErr ="password is required";
  } else {
    $password = $_POST["password"];
    $encryptedpwd=md5($password) 
  }*/
  if (isset($_POST['submit']) ){
  # code...

  if (empty($_POST['username'])) {
    # code...
    $usernameErr = "username is required";
  } else {
    $usernames = $_POST['username'];
  }

if (empty($_POST['email'])) {
    # code...
    $emailErr = "email is required";
  } else {
    $email = $_POST['email'];
  }

if (empty($_POST['password'])) {
    # code...
    $passwordErr = "password is required";
  } else {
    $password = $_POST['password'];
    //encrypting my password 
    $encrypted_pass = md5($password);
  }
    
  $role = $_POST['role'];

   $role = $_POST['role'];
   $reg_date = $_POST['reg_date'];

   $sql = "SELECT * FROM users WHERE username='$usernames' && email='$email'";
  
  $result = mysqli_query($conn,$sql);
 
  $num = mysqli_num_rows($result);
  
  if ($num >= 1) {
   
    $_SESSION['userTaken'];
    header("location: ../index.php?wrongCred");
  } else {
    if (empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
   
    $stmt = $conn->prepare("INSERT INTO users (username,email,password,role,reg_date) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssd",$usernames,$email,$encrypted_pass,$role,$reg_date);

    if ($stmt->execute() === TRUE) {
     
            $_SESSION["reg"];
      $_SESSION['classTypeSuccess'];
      header('location: ../index.php?registered');

    } else {
            # code...
            $_SESSION["noreg"];
      $_SESSION['classTypeError'];
      header('location: ../index.php?notreg');

    }
  }

  
  }
  

  
  
/*else{
$sql = "INSERT INTO users (username, email, password, role, reg_date )
VALUES ('$username', '$email', '$password', '$role','$reg_date')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}*/
 }
?>
>>>>>>> 9fdf3b7d31d8ddaff859ec61f22d4c17c98b5e65
