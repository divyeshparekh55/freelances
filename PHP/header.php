<?php

  include_once '../config/config.php';
  
  $usertype=null;
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  if(!(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'] === true)) {
    header("location:login.php");
  } else{
    $usertype=$_SESSION['user_type'];
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->

  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/summernote/summernote-bs4.min.css">

  <style>
    .hide {
      display: none;
    }
    .imageheightdiv {
      max-height: 350px;
      border: 1px solid black;
      overflow: auto;
    }
    .nav-link {
      padding: 10px !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	
<div class="">
    
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <!-- <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nam-link" role="button" href="./logout.php">LOGOUT
        </a>
      </li>
    </ul> -->
  </nav>

	<ul class="navbar-nav ml-auto">

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TEXTILE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/images/user_image.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          
          <a href="#" class="d-block"><?php echo $_SESSION['user_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if($usertype == 'admin') { ?>

            <li class="nav-item menu-open">
              <a href="./index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            
          <?php } ?>

          
          
        <?php if($usertype == 'admin') { ?>
          <li class="nav-item">
            <a href="data.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p><b>
              Category
              </b></p>
            </a>
          </li>
        <?php } ?>

        

        <?php if($usertype == 'admin') { ?>
          <li class="nav-item">
            <a href="sub_ctgy.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p><b>
             Sub Category
             </b></p>
            </a>
          </li>
        <?php } ?>


        <?php if($usertype == 'sub_admin') {?>
          <li class="nav-item">
            <a href="work.php" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p><b>
                Add Images
                </b></p>
            </a>
          </li>
        <?php } ?>

        <?php if($usertype == 'sub_admin') {?>
          <li class="nav-item">
            <a href="prefix.php" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p><b>
                Add Prefix Images
                </b></p>
            </a>
          </li>
        <?php } ?>

        <?php if($usertype == 'sub_admin') {?>
          <li class="nav-item">
            <a href="postfix.php" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p><b>
                Add Postfix Images
                </b></p>
            </a>
          </li>
        <?php } ?>

        <?php if($usertype == 'sub_admin') {?>
          <li class="nav-item">
            <a href="create_pdf.php" class="nav-link">
              <i class="nav-icon fas fa-fie-pdf"></i>
              <p><b>
                Create PDF
                </b></p>
            </a>
          </li>
        <?php } ?>

        <?php if($usertype == 'sub_admin') {?>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p><b>
                Logout
                </b></p>
            </a>
          </li>
        <?php } ?>

        <?php if($usertype == 'admin') {?>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p><b>
                Logout
              </b></p>
            </a>
          </li>
        <?php } ?>

        

         
   
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Images
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user_interface.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Generate Image</p>
                </a>
              </li>
            </ul>
          </li> -->
          
          
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/moment/moment.min.js"></script>
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo SERVER_NAME."/".FOLDER_NAME; ?>/dist/js/pages/dashboard.js"></script>
</body>

</html>