<?php

require_once("connection.php");


$id=$_GET['id']; 
$user_id=$_GET['user_id'];
echo $user_id;
echo $id;
$sql="DELETE FROM contacts WHERE contact_id=".$id;
echo $sql;
$result = mysqli_query($conn,$sql);
  
header("Location: dashboard.php?id=".$user_id);






?>

