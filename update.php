<?php
require_once("connection.php");



if (isset($_GET["id"])) {
	$id= $_GET["id"];
		echo $id;
}

if (isset($_GET["user_id"])) {
	$user_id=$_GET["user_id"];
	echo $user_id;
}

	$cnameErr="";
	$cnumberErr="";

	


if (isset($_POST["submit"])) {


	$cname=$_POST["cname"];
	$cnumber=$_POST["cnumber"];
	
$id_n=$_POST["id"];

	$id_user=$_POST["user_id"];
echo $id_user;
if ($cname=="") {
	$cnameErr="Contact Name is required";
}
if ($cnumber=="") {
	$cnumberErr="Contact Number is required";
}

if (!empty($cname) && !empty($cnumber)) {

	$sql="Update contacts SET contact_name="."'$cname'".",mobile_number="."'$cnumber'".",user_id=".$id_user." where contacts.contact_id=".$id_n;
	$result=mysqli_query($conn,$sql);
	header("Location: dashboard.php?id=".$id_user);

}



}


?>






<!DOCTYPE html>
<html>
<head>
	<title>ADD CONTACTS</title>

	<!-- Bootstrap CDN-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style>
		.col-md-6
		{
			background-color: #ECE9E2;
			margin-top: 70px;
			border-radius: 50px;


		}
		.error
		{
			color: #FF0000;
		}
		body
		{
			background-image: url("logBg.jpg");
			background-repeat: no-repeat;
			height: 100%;
			background-size: cover;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="col-md-3">
					
		</div>

		<div class="col-md-6">
			<center><h2>UPDATE CONTACT</h2></center>
			<hr>
			<form class="form-horizontal"  method="post" action="update.php">
				<br>
					<input type="hidden" class="form-control" name="id" id="id" value="<?php if(!empty($id))echo $id; else echo ''; ?>">
					<input type="hidden" class="form-control" name="user_id" id="uid" value="<?php if(!empty($user_id))echo $user_id; else echo ''; ?>">
					
			  	<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Contact Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="cname" id="inputEmail3" placeholder="Enter Context Name" value="<?php if (!empty($cname)) echo $cname;?>">
				        <span class="error"> <?php echo $cnameErr;?></span>
				       
				    </div>
			  	</div>

			  	<div class="form-group">
				    <label for="inputEmaila" class="col-sm-2 control-label">Contact Number</label>
				    <div class="col-sm-10">
				      <input type="number" class="form-control"  name="cnumber" id="inputEmaila" placeholder="e.g 0300-1234567" value="<?php if (!empty($cnumber)) echo $cnumber;?>">
				        <span class="error"> <?php echo $cnumberErr;?></span>
				       
				    </div>
			  	</div>
			 
			  	
			  	<div class="form-group">
				    <div class="col-sm-offset-1 col-sm-10">
				      <center><button type="submit" name="submit" class="btn btn-primary">Save</button></center>
				   
				    </div>
			  	</div>
			</form>
			
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</body>
</html>