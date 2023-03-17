<?php
  include_once './config.php';
  include_once '../config/config.php'; 

  session_start();
  if((isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'] === true)) {
    header("location:index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> AdminLTE 3 | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>TEXTILE</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Name" name="name">
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
        <div class="row">
          <div class="col-8">
            <button type="reset" class="btn btn-danger">Reset</button>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
       
      </form>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/js/adminlte.min.js"></script>
</body>
</html>


<?php
  if(isset($_POST['name']) && isset($_POST['pass']))
  {
      $name = $_POST['name'];
      $pass = $_POST['pass'];
  
      $sql = "SELECT * FROM register where fname = '".$name."'AND password = '".$pass."'";
       $sql1 = "SELECT * FROM register where user_type = 'sub_admin'";
       $sql2 = "SELECT * FROM register";
      $result = mysqli_query($conn,$sql);
      $r = mysqli_query($conn,$sql1);
      $rel = mysqli_query($conn,$sql2);

      if($row = mysqli_fetch_assoc($result) AND mysqli_fetch_assoc($r))
      {
        $_SESSION['is_loggedin'] = true;
        $_SESSION['user_name'] = $_POST['name'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['user_id'] = $row['id'];
        $rows = $db->update('register',['is_loggedin' => 1],['fname' => $name , 'password' => $pass])->affectedRows();
        if($row['user_type']=='sub_admin'){
          header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/work.php");
        }
        else{
          header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/index.php");
        }
        
      }
      else
      {
        echo "Your Name and Password does not match Or Another User Is Already Logged In !";
      }
  }
?>