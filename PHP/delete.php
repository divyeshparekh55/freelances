<?php

	session_start();
	if($_SESSION['user_type'] !== 'sub_admin') {
			session_unset();
			header("location:".SERVER_NAME."/".FOLDER_NAME."/PHP/login.php");
		}

	include_once './config.php';
	
	if(isset($_GET['id']))
	{
		$user_id = $_GET['id'];
		// print_r($user_id);
		// exit;

		// $image_nme = $_GET['$randomname'];
		// $query = "DELETE FROM upload_image WHERE id='$user_id' ";
		$select_id = "SELECT * FROM upload_image where id='$user_id' ";
		$result = mysqli_query($conn,$select_id);
		$fetch_recs = mysqli_fetch_assoc($result);

		$fetch_img_nme = $fetch_recs['img_nme'];
		$delete_path = "upload_images/".$fetch_img_nme;

		if(unlink($delete_path)){
		$query = "DELETE FROM upload_image WHERE id= ".$fetch_recs['id'];
		$rel = mysqli_query($conn,$query);

			if($rel){
				header("location:./image.php?success=true");
			}
		}else{
			echo "something went wrong !";
		}

		if($result)
		{
			// echo "Record Deleted Successfully";

		// unlink($imagepath);
		
			echo "<script>alert('Record Deleted Successfully')</script>";
			header('location:./image.php');
			
		}
		else
		{
			echo "Something went wrong";
			header('location:./image.php');
			
		}
	}

	include_once './header.php';
?>