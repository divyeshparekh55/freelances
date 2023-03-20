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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>
<body>
  <center>
  
      <div class="register-box">
  <div class="register-logo">
    <b> Create PDF </b> 
  </div>  
      <form method="POST">

      <div class="input-group mb-3" id="main">
            <select name="ctg_nme" id="ctg_nme" class="form-select form-select-lg"><option value="0">SELECT</option>
            <?php
              include_once 'config.php';
              $admin_id = $_SESSION['user_id'];
              $sql = "SELECT * FROM sub_ctgy";
              $result = mysqli_query($conn,$sql);
    
              while($row = mysqli_fetch_assoc($result)){
              $value = $row['ctgy_name'];
              $id = $row['id'];
              ?>
              <option value="<?php print_r($id); ?>">
          
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
<script type="text/javascript">

                $("#ctg_nme").change(function(){
                var ctg_nme = this.value;
                console.log(ctg_nme);
                $.ajax({url: "./api/get_sub_ctgy.php?ctg_id="+ctg_nme, success: (res) => {
                  console.log(res);
                }})
                })
    </script>