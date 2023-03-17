<?php
    include_once 'config.php';
    include_once '../config/config.php';
    session_start();
    if($_SESSION['user_type'] !== 'sub_admin') {
        session_unset();
        header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
    }
    
    if(isset($_POST['image_submit']) && isset($_FILES['img'])){
        
        // $ctgy_id = $_POST['ctgy_id'];

        // print_r($ctgy_id);
        // exit;
       
        // $img = $_POST['img'];
        // 
        // echo "<pre>";
        // print_r($_FILES['img']);
        // echo "</pre>";

        $image_name = $_FILES['img'];
        $admin_id = $_SESSION['user_id'];

        $num_of_imgs = count($image_name['name']);
        for($i = 0; $i < $num_of_imgs; $i++){

        
        $img_name = $image_name['name'][$i];
        $img_type = $image_name['type'][$i];
        $img_tmp_name = $image_name['tmp_name'][$i];
        $img_size = $image_name['size'][$i];
        $error = $image_name['error'][$i];

        // $sql = "INSERT INTO upload_images (img_nme,img_path,img_size) VALUES ('$img_name','$img_tmp_name','$img_size')";
        // if($rel = mysqli_query($conn,$sql)){
        //     echo "Images added successfully";
        // }else{
        //     echo "Something wwent wrong";
        // }

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
    
                    $sql = "INSERT INTO upload_images (admin_id,img_nme,img_path) VALUES ('$admin_id','$img_name','$new_img_name')";
                    mysqli_query($conn, $sql);
                }else {
                    echo "You can't upload files of this type";
                }
            }
        }else {
            echo "unknown error occurred!";
        }
     }
    }else{
        echo "Error!";
    }
?>
<?php
    include_once 'header.php';

?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <form method="POST"  enctype="multipart/form-data">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col">
                        <input type="file" class="form-control-md" name="img[]" multiple>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <input type="submit" class="form-contro-mdl" value="Upload Images" name="image_submit">
                        <!-- <button type="button" class="btn btn-outline-info" name="image_submit">Upload Images</button> -->
                    </div>
                </div>

                <div class="row">
                    <?php
                        include_once 'config.php';

                        $sql = "SELECT * FROM upload_images";
                        $rel = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($rel)){
                            $img_src = $row['img_path'];
                            ?>
                                <div class="col-2">
                                    <img src="<?php echo './upload_images/'.$img_src; ?>" class="img-responsive" >   
                                </div>
                            <?php
                        }
                    ?>
                
            </div>
            </div>
        </form>
        <div class="content-wrapper"> 
            
        </div>
    </body>
</html>