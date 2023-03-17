<?php include('test.php') ?>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form method="post" action="test1.php" id="register_form">
  	<h1>Register</h1>
  	<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
	  <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
	  <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
  	</div>
  	
  		<input type="password"  placeholder="Password" name="password">
  	</div>
  	<div>
  		<button type="submit" name="register" id="reg_btn">Register</button>
  	</div>
  </form>
	  </body>
</html>