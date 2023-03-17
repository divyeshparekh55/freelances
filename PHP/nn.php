<?php
  include_once 'config.php';
  include_once '../config/config.php';

  $sql = "SELECT category.user_id
  FROM category
  INNER JOIN register
  ON category.user_id=register.fname";

  $result = mysqli_query($conn,$sql);
  print_r($sql);
?>
SELECT category.ctgy_name,category.ctgy_type,register.fname FROM category INNER JOIN register ON category.user_id=register.id

spartan granito