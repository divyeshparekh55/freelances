<?php 

  include_once '../config.php';
  include_once '../../config/config.php';

  session_start();

    if($_SESSION['user_type'] !== 'sub_admin') {
        session_unset();
        header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");

        
    }elseif(isset($_GET['ctg_id'])){
        $sub_id = $_GET['ctg_id'];
        $sql = "SELECT * FROM category WHERE sub_ctgy_type='$sub_id' ";
        $sub_ctgy=[];
        array_push($id,$value);
        $rel = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($rel)){
            $id = $row['id'];
            $value = $row['ctgy_name'];
        }
        print_r($row);
    }

?>