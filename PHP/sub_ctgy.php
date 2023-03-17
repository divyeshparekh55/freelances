<?php 
  include_once 'header.php';
  include_once 'config.php';
  include_once '../config/config.php';


    if($_SESSION['user_type'] !== 'admin') {
        session_unset();
        header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
    }

  if(isset($_POST['register']))
  {

     $admin_id = $_SESSION['user_id'];
    //  print_r($admin_id);
    //  exit;
     $cty_name = $_POST['cty_name'];
      
     $sql = "INSERT INTO sub_ctgy (admin_id,ctgy_name) VALUES ('$admin_id',' $cty_name')";
    
     if(mysqli_query($conn,$sql))
     {
        echo "<html><body><div class='content-wrapper'><div class='alert alert-warning alert-dismissible fade show  sm' role='alert'>
        <strong>Category add successfully.</strong> 
        <a href='work.php'><button type='button' class='close' data-dismiss='alert' aria-hidden='true' aria-label='Close'>&times
        </button></a>
      </div></div></body></html>";
        // header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/index.php");
     }else
     {
      //  echo "Something went wrong";
       echo '<script>alert("Something went wrong")</script>';
     }


  }

?>



<!DOCTYPE html>
<html>
<head>
  <title>Add Catogery</title>
</head>
<body>
<center>

<div class='content-wrapper'>
<div class='content-fluid'>

      <div class="register-box">
  <div class="register-logo">
    <b>Add Catogery </b> 
  </div>  
      <form method="POST">
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Catogery Name" name="cty_name">
          <div class="input-group-append">
            
          </div>
        </div>
        <!-- <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="CatogeryType" name="cty_type">
          <div class="input-group-append">
            
          </div>
        </div> -->

        

        

      
      
        
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="button" class="btn btn-outline-info"><a href="data.php">Back</a></button>
          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-outline-danger" name="register">Register</button>
          </div>

          <!-- /.col -->
        </div>
        
      </form>
</div>
</div>
</div>
</center>

</body>
</html>

