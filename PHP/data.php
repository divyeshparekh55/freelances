<?php
session_start();

if($_SESSION['user_type'] !== 'admin') {
    session_unset();
    header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
}


  include_once 'config.php';
  include_once '../config/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data</title>

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
  </style>
</head>
<body class="hold-transition sidebar-mini">
  
<div class="wrapper">
<!-- Header Section  -->
<?php 
  include_once './header.php';
  if($_SESSION['user_type'] !== 'admin') {
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
        <button type="button" class="btn btn-info" onclick="onMemberLocation()"> Add Catogery </button>

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
      $admin_id = $_SESSION['user_id'];
      // $users = $db->select('category',['*'],['admin_id'=>$admin_id])->results();
      $users = $db->pdoQuery('SELECT category.ctgy_name,category.sub_ctgy_type,register.fname FROM category INNER JOIN register ON category.user_id=register.id')->results();
    ?>

    function editClick(id) {
      window.location.href = 'edit.php?id='+id;
    }

    function deleteClick(id) {
      window.location.href = 'delete.php?id='+id;
    }

    function assignClick(id) {
      window.location.href = 'assign_work.php?id='+id;
    }

    function messageClick(id) {
      window.location.href = 'user_msg.php?user_id='+id;
    }

    function downloadClick(id) {
      window.location.href = 'download.php?id='+id;
    }
    $(document).ready(() => {

      $('#example2').DataTable({
        aoColumns: [
            { "mData": "ctgy_name", "sTitle": "Category Name" },
            { "mData": "sub_ctgy_type","sTitle": "Category Type"},
            { "mData": "fname","sTitle": "User Name"},
            
        ],
        data: <?php echo json_encode($users); ?>,
      });
    })

    function onMemberLocation(memberLoation) {
    window.location.href = "add_ctgy.php";
  }
</script></body>
</html>
