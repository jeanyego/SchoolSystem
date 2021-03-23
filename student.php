 <html>
<head>
<title>Shoppers Hub</title>
 <meta charset="UTF-8">
            <meta name="keywords" content="HTML, CSS, Bootstrap, JavaScript">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/JavaScript" src="bootstrap/js/bootstrap.js"></script>
            <script type="text/JavaScript" src="bootstrap/js/bootstrap.min.js"></script>
             <script type="text/JavaScript" src="js/script.js"></script>
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
     <div class="d-flex justify-content-center align-items-center container ">
    <form id="myform" class="login-form" method=post action="" style="width: 100%; height: 100%">
      <h3 style="text-align: center;">Enter your school details</h3>
         <!--username-->
         <label for="action">Enter Student Name:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <span class="fa fa-user"></span>
                  </span>                    
              </div>
           
              <input type="text" name="studentname" class="form-control" placeholder="" required="required">
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
               <label for="action">Enter Phone number:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-phone"></i>
                  </span>                    
              </div>
              <input type="text" name="phonenumber" class="form-control" placeholder="" required="required">
          </div>
      </div>   

        <!--gender-->
        <label for="action">Gender:</label><br>
      <div class="form-group">
        <div class="input-group">
           <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-mars"></i>
                  </span> 
                  </div>   
          <select class="form-control" id="gender" name="gender">
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
      </div>
        <!--age-->
        <label for="action">Enter your age:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-lock"></i>
                  </span>                    
              </div>
              <input type="number" name="age" class="form-control" placeholder="" required="required">
          </div>
      </div>
      <!--Image-->   
      <label for="action">Upload Image:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-image"></i>
                  </span>                    
              </div>
              <input type="file" name="studentimage" class="form-control" placeholder="" required="required">
          </div>
      </div>   
      <!--registration date-->
         <label for="action">Enter Registration date:</label><br>
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-calendar"></i>
                  </span>                    
              </div>
              <input type="date" name="reg_date" class="form-control" placeholder="">
          </div>
      </div>  
        
           <!--Submit btn-->
           <button type="submit" name="registerbtn" class="btn btn-success btn-block">Submit</button>
          </div>    
    </form>
  </div>
  <?php
  if(isset($_POST['registerbtn']))
{  
   $studentname = $_POST['studentname'];
   $email = $_POST['email'];
   $phonenumber = $_POST['phonenumber'];
   $gender = $_POST['gender'];
   $age = $_POST['age'];
   $studentimage = $_POST['studentimage'];
   $reg_date = $_POST['reg_date'];
$sql = "INSERT INTO students (studentname, email, phonenumber, gender, age, studentimage, reg_date)
VALUES ('$studentname', '$email', '$phonenumber','$gender','$age','$studentimage','$reg_date')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

    </body>
</html>