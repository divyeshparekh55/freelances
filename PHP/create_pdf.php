<?php 

  include_once 'config.php';
  include_once '../config/config.php';

  session_start();

    if($_SESSION['user_type'] !== 'sub_admin') {
        session_unset();
        header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
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
    <b> Create PDF </b> 
  </div>  
      <form method="POST">

      <div class="input-group mb-3">
            <select name="ctg_nme[]" class="form-select form-select-lg">
            <?php
              include_once 'config.php';
              $admin_id = $_SESSION['user_id'];
              $sql = "SELECT * FROM sub_ctgy";
              $result = mysqli_query($conn,$sql);
    
              while($row = mysqli_fetch_assoc($result)){
              $value = $row['ctgy_name'];
              ?>
              <option value="<?php print_r($value); ?>">
          
                <?php echo $value?>
              </option>
        
              <?php  } ?>

              </select>

        </div>

        <div class="input-group mb-3">
            <select name="sub_ctg_nme" class="form-select form-select-lg">
            <?php
              include_once 'config.php';
              $admin_id = $_SESSION['user_id'];
              $sql = "SELECT * FROM category";
              $result = mysqli_query($conn,$sql);
    
              while($row = mysqli_fetch_assoc($result)){
              $ctg_id = $row['id'];
              $value = $row['ctgy_name'];
              ?>
              <option value="<?php print_r($value); ?>">
          
                <?php echo $value?>
              </option>
        
              <?php  } ?>

              </select>
        </div>

        <div class="input-group mb-3">
            <select name="img" class="form-select form-select-lg">
            <?php
              include_once 'config.php';
              $admin_id = $_SESSION['user_id'];
              $sql = "SELECT * FROM upload_image";
              $result = mysqli_query($conn,$sql);
    
              while($row = mysqli_fetch_assoc($result)){
              $value = $row['img_nme'];
              ?>
              <option value="<?php print_r($value); ?>">
          
                <?php echo $value?>
              </option>
        
              <?php  } ?>

              </select>
        </div>

        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-outline-danger" name="register">Create PDF</button>
          </div>
        </div>
        
      </form>
</div>
    </center>
</body>
</html>
<?php
  if(isset($_POST['register'])){
    foreach($_POST['ctg_nme'] as $select){
      echo $select;
    }
  }
?>

