<?php 
  $db = mysqli_connect('localhost', 'root', '', 'textile');
  $username = "";
  $email = "";
  if (isset($_POST['register'])) {
  	$username = $_POST['username'];
  	$password = $_POST['password'];

  	$sql_u = "SELECT * FROM category WHERE ctgy_name='$username'";
  	$res_u = mysqli_query($db, $sql_u);
  	// $res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken"; 	
  	}else{
           $query = "INSERT INTO category (ctgy_name, ctgy_type) 
      	    	  VALUES ('$username', '$password')";
           $results = mysqli_query($db, $query);
           echo 'Saved!';
           exit();
  	}
  }
?>