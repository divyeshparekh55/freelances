<?php
session_start();

  include_once 'config.php';
  include_once '../config/config.php';

// if(isset($_POST['ctg_id'])){

//     $ctgy_id = $_POST['ctgy_id'];
//     print_r($ctgy_id);

        if(isset($_POST['image_submit']) && isset($_FILES['img'])){
            $image_name = $_FILES['img'];
            $admin_id = $_SESSION['user_id'];

            $num_of_imgs = count($image_name['name']);
            for($i = 0; $i < $num_of_imgs; $i++){

            
            $img_name = $image_name['name'][$i];
            $img_type = $image_name['type'][$i];
            $img_tmp_name = $image_name['tmp_name'][$i];
            $img_size = $image_name['size'][$i];
            $error = $image_name['error'][$i];

            if ($error === 0) {
                if ($img_size > 1250000) {
                    echo "Sorry, your file is too large.";
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png"); 
        
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'upload_images/'.$new_img_name;
                        move_uploaded_file($img_tmp_name, $img_upload_path);
        
                        $sql = "INSERT INTO upload_images (admin_id,img_nme,img_path) VALUES ('$admin_id','$new_img_name','$img_upload_path')";
                        mysqli_query($conn, $sql);
                    }else {
                        echo "You can't upload files of this type";
                    }
                }
            }else {
                echo "unknown error occurred!";
            }
        }

        }
    // }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/css/adminlte.min.css">

  <style>
    .btn {
      margin: 5px;
    }
    .member {
      margin:auto;
      /* margin-left:600%; */

    }
    .img-responsive{
        float: left;
    width:  230px;
    height: 230px;
    object-fit: cover;
    margin: 0px 10px 20px 30px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
  <form method="POST" enctype="multipart/form-data">
<div class="wrapper">
<!-- Header Section  -->
<?php 
  include_once './header.php';
  if($_SESSION['user_type'] !== 'sub_admin') {
    session_unset();
    header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
  } 
?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="col-2">
      <div class="member">
        <!-- <button type="button" class="btn btn-info" onclick="onMemberLocation()"> Add User</button> -->
        <input type="file" class="form-control-md" name="img[]" multiple>
        <input type="submit" class="btn btn-outline-info" value="Upload Images" name="image_submit">
      </div>
    </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                  
                  </tfoot>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/js/demo.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/summernote/summernote.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/daterangepicker/daterangepicker.js"></script>


<!-- Page specific script -->

<script>
    <?php
      $users = $db->select('upload_images',['*'])->results();
    ?>

    function deleteClick(id) {
      window.location.href = 'delete.php?id='+id;
    }

    $(document).ready(() => {
      let datas = <?php echo json_encode($users); ?>;
      var host = window.location.protocol + "//" + window.location.host;

      datas.map((item) => {
        item.path = host + '/freelances/PHP/upload_images/'+item.img_nme;
      })
      console.log(datas)
      $('#example2').DataTable({
        aoColumns: [
            { "mData": "id", "sTitle": "Id" },
            { "mData": "path", "sTitle": "Images", 
              "mRender": function (o) {
                return '<img src='+o+' class="img-responsive"/>'
              },
            },
            {
                "mData": null,
                "sTitle":"Action",
                 "mRender": function (o) {
                   return '<button class="btn btn-danger" name="delete" onclick="deleteClick('+o.id+')" >Delete</button>'; }
            }
        ],
        data: datas,
      });
    })

</script>
</form>
</body>
</html>
