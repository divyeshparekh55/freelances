<?php 

  include_once '../../config/config.php';

    session_start();
    if($_SESSION['user_type'] !== 'sub_admin') {
        session_unset();
        header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
        
    } else if(isset($_GET['sub_ctg_id'])){
        $sub_id = $_GET['sub_ctg_id'];
        $user_id = $_SESSION['user_id'];

        $data = $db->select('upload_image',['*'],['category_id'=>$sub_id,'user_id'=>$user_id])->results();
        print_r(json_encode($data));
        exit();
    }

?>