<?php
require_once("connection.php");



if (isset($_GET["id"])) {
	$id= $_GET["id"];
	
}

if (isset($_GET["user_id"])) {
	$user_id=$_GET["user_id"];
	
}

	$EmailErr="";
	
$contact_id=1000;
	


if (isset($_POST["submit"])) {


	$email=$_POST["email"];
	$user_id1=$_POST["user_id"];

	$c_id=$_POST["id"];

$id_n=$_POST["id"];

	$id_user=$_POST["user_id"];

if ($email=="") {
	$EmailErr="Email is required";
}


if (!empty($email)) {

	$sql="SELECT * FROM users where user_email="."'$email'";
	$user_id="SELECT id FROM users where user_email="."'$email'";
	
	$c_user_email="SELECT user_email FROM users where id=".$user_id1;




	$result=mysqli_query($conn,$sql);
	$result1=mysqli_query($conn,$user_id);
	$result2=mysqli_query($conn,$c_user_email);

	
	$row=mysqli_fetch_array($result1);
	$rows = mysqli_num_rows($result);

	if ($rows==1) {
	$id11=$row['id'];

$sql="SELECT * FROM contacts where contact_id=".$c_id;

$res=mysqli_query($conn,$sql);
while ($ro = mysqli_fetch_array($res)) {
$contact_id=$contact_id+$ro['contact_id'];
$contact_name=$ro['contact_name'];
$contact_number=$ro['mobile_number'];
$u_id=$ro['user_id'];


$sqlq="INSERT INTO contacts (contact_id,contact_name,mobile_number,user_id) VALUES($contact_id,'$contact_name',$contact_number,$id11)";
$result=mysqli_query($conn,$sqlq);
header("Location: dashboard.php?id=".$id_user);

}
	}
	else
	{
		$EmailErr="No such Record found.Email Mismatch error!";
		
	}

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
		p
		{
			text-align: center;
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
			<p>Enter <strong>Email Address</strong> where you Want to share this Contact</p>
			
			<form class="form-horizontal"  method="post" action="share.php">
				<br>
					<input type="hidden" class="form-control" name="id" id="id" value="<?php if(!empty($id))echo $id; else echo ''; ?>">
					<input type="hidden" class="form-control" name="user_id" id="uid" value="<?php if(!empty($user_id))echo $user_id; else echo ''; ?>">
					
			  	<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Enter User Email" value="<?php if(!empty($email))echo $email; else echo ''; ?>">
				        <span class="error"> <?php echo $EmailErr;?></span>
				       
				    </div>
			  	</div>

			  	
			 
			  	
			  	<div class="form-group">
				    <div class="col-sm-offset-1 col-sm-10">
				      <center><button type="submit" name="submit" class="btn btn-primary">Share</button></center>
				   
				    </div>
			  	</div>
			</form>
			
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</body>
</html>