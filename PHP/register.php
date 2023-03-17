<?php 

  include_once 'config.php';
  include_once '../config/config.php';

  session_start();

    if($_SESSION['user_type'] !== 'admin') {
        session_unset();
        header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
    }

  if(isset($_POST['register']))
  {
     $fname = $_POST['fname'];
     $Email = $_POST['email'];
     $pass = $_POST['pass'];
     $add = $_POST['add'];
     $phone = $_POST['phone'];
      
     $sql = "INSERT INTO register (fname,email,password,address,phone_number) VALUES ('$fname','$Email','$pass','$add','$phone')";
    
     if(mysqli_query($conn,$sql))
     {
        header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/data.php");
     }else
     {
       echo "Something went wrong";
     }


  }

  include_once 'header.php ';
?>



<!DOCTYPE html>
<html>
<head>
  <title>Register Member</title>
</head>
<body>
  <center>
  
      <div class="register-box">
  <div class="register-logo">
    <b>Add </b> USER</a>
  </div>  
      <form method="POST">
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="fname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter your address" name="add">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-map-marker"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="enter your phone number" name="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-phone"></span>
            </div>
          </div>
        </div>

        

      
      
        
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="button" class="btn btn-outline-danger"><a href="data.php">Back</a></button>
          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-outline-primary" name="register">Register</button>
          </div>

          <!-- /.col -->
        </div>
        
      </form>
</div>
    </center>
</body>
</html>

