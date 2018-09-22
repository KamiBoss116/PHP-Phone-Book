<?php
require_once("connection.php");




	$id= $_GET["id"];
	
$user_name="SELECT user_name FROM users where id=".$id;

$result1=mysqli_query($conn,$user_name);

$row=mysqli_fetch_array($result1);


$name= $row['user_name'];


$user_contacts="SELECT * FROM contacts where user_id=".$id;

$result=mysqli_query($conn,$user_contacts);








?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashbord</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<style>
		body,th
		{
			text-align: center;
		}
		.h1
		{
			background-color: #F3F1ED;
			margin-top: 30px;
		}
		

	</style>
</head>
<body>
		<div class="container">
			<div class="col-md-2">
				
			</div>
			<div class="col-md-8">
				<h1>Welcome <?php echo $name ?></h1>
				<hr>

				<a href="phoneNumList.php?id=<?php echo $id ?>" class="btn btn-primary">ADD CONTACTS</a>
				<a href="login.php" class="btn btn-success">LOG OUT</a>
				<br>
			<br>
			<form method="POST" action="dashbord.php">
			<table class="table table-hover">

				<tr>
					<th>Contact ID</th>
					<th>Contacts Name</th>
					<th>Contact Number</th>
					<th>User ID</th>
					<th>Delete</th>
					<th>Update</th>
					<th>Share</th>
					



				</tr>
<i class="fas fa-share-alt"></i>	

				<?php
				
					while ($row11 = mysqli_fetch_assoc($result)) {

						
						echo "<tr><td>{$row11['contact_id']}</td><td>{$row11['contact_name']}</td><td>{$row11['mobile_number']}</td><td>{$row11['user_id']}</td><td><a href='delete.php?id=".$row11['contact_id']."&user_id=".$row11['user_id']."'  class='btn btn-danger' name='delete_id' type='submit'><span  class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td><td><a href='update.php?id=".$row11['contact_id']."&user_id=".$row11['user_id']."' class='btn btn-info' name='update_id' type='submit'><span  class='glyphicon glyphicon-repeat' aria-hidden='true'></span></a></td><td><a href='share.php?id=".$row11['contact_id']."&user_id=".$row11['user_id']."' class='btn btn-success' name='update_id' type='submit'><span class='glyphicon glyphicon-share-alt'></span></a></td></tr>";
					
				}

				
				?>





			</table>
		</form>



			</div>
			<div class="col-md-2">
				
			</div>
			
		</div>
</body>
</html>