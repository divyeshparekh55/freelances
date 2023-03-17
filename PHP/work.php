<?php
    include_once "header.php";
    include_once 'config.php';

    if($_SESSION['user_type'] !== 'sub_admin') {
        session_unset();
        header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
    }
?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .fld-responsive{
            margin: 10px 0px 10px 10px;
            height: 50%;
            width : 90%;
        }
        
    </style>
    </head>
    <body>
        <div class="content-wrapper"> 
            <div class="row">
                    <?php
                        $admin_id = $_SESSION['user_id'];  
                        $sql = "SELECT * FROM sub_ctgy";
                        $rel = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($rel)){
                            $_SESSION['sub_ctgy_id'] = $row['id'];
                            ?>
                                <br><div class="col-3">
                                <form method="GET" action="create_folder.php">
                                    <input type="hidden" name="view" value="<?php echo $row['id'] ?>">
                                    <button type="folder" class="btn btn-dark btn-lg fld-responsive"><i class="nav-icon fas fa-folder"></i> <b><?php echo $row['ctgy_name']; ?></b></button>
                                    
                                </form>     
                                </div>
                            <?php
                        }
                    ?> 
                
            </div>
        </div>
    </body>
</html>