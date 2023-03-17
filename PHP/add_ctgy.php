<?php 

  include_once 'config.php';
  include_once '../config/config.php';

  session_start();

    if($_SESSION['user_type'] !== 'admin') {
        session_unset();
        header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
    }

  if(isset($_POST['register'])){
    $admin_id = $_SESSION['user_id'];
    $cty_name = $_POST['cty_name'];
    $cty_type = $_POST['category'];
    $user_id  = $_POST['user_id'];

    $sql = "SELECT * FROM category WHERE ctgy_name = '$cty_name'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
      echo '<script>alert("Sorry!This user name is allready exists")</script>';
    }else{
      $query = "INSERT INTO category(admin_id,ctgy_name,sub_ctgy_type,user_id) VALUES('$admin_id','$cty_name','$cty_type','$user_id')";
      $reslt = mysqli_query($conn,$query);
      header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/data.php");
    }
  }

  include_once 'header.php ';
?>



<!DOCTYPE html>
<html>
<head>
  <title>Add Catogery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <center>
  
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

        <div class="input-group mb-3">
            <select name="category" class="form-select form-select-lg">
            <?php
        include_once 'config.php';
       $admin_id = $_SESSION['user_id'];
        $sql = "SELECT *FROM sub_ctgy WHERE admin_id='$admin_id' ";
        $result = mysqli_query($conn,$sql);
        

        while($row = mysqli_fetch_assoc($result)){
            $ctg_id = $row['id'];
            $value = $row['ctgy_name'];
          ?>
          <option value="<?php print_r($ctg_id); ?>">
          
            <?php echo $value?>
        </option>
        
      <?php  } ?>

            </select>
        
        </div>


        <div class="input-group mb-3">
            <select name="user_id" class="form-select form-select-lg">
            <?php
              include_once 'config.php';
              $admin_id = $_SESSION['user_id'];
              $sql = "SELECT * FROM register WHERE user_type = 'sub_admin' ";
              $result = mysqli_query($conn,$sql);
    
              while($row = mysqli_fetch_assoc($result)){
              $ctg_id = $row['id'];
              $value = $row['fname'];
              ?>
              <option value="<?php print_r($ctg_id); ?>">
          
                <?php echo $value?>
              </option>
        
              <?php  } ?>

              </select>
        </div>

        
      
      
        
        <div class="row">
          
          <!-- /.col -->
          <!-- <div class="col-4">
            <button type="button" class="btn btn-outline-info"><a href="data.php">Back</a></button>
          </div> -->

          <!-- <div class="col-4">
            <button type="submit" class="btn btn-light" name="register"><a href="data.php">Back</a></button>
          </div> -->

          <div class="col-4">
            <button type="submit" class="btn btn-outline-danger" name="register">Register</button>
          </div>

          <!-- /.col -->
        </div>
        
      </form>
</div>
    </center>
</body>
</html>

