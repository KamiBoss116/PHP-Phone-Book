<?php
require_once("connection.php");

$usernameErr="";
	$emailErr="";
	$passwordErr="";
	$confirmPErr="";

if (isset($_POST["submit"])) {

	$usernamea=$_POST["usernamea"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$confirmP=$_POST["confirmPass"];

	

if ($usernamea=="") {
	$usernameErr="User Name is required";
}
if ($email=="") {
	$emailErr="Email is required";
}
if ($password=="") {
	$passwordErr="Password is required";
}
if ($confirmP=="") {
	$confirmPErr="Confirm Password is required";
}
elseif ($password!=$confirmP) {
		$confirmPErr="Confirm Password is not match with Password";
	}
else 
{
if (!empty($usernamea) && !empty($email) && !empty($password) && !empty($confirmP)) {

	$sql="INSERT INTO users (user_name,user_email,password,c_password) VALUES('$usernamea','$email','$password','$confirmP')";
	$result=mysqli_query($conn,$sql);
	header('Location: login.php');
	 exit();
}
}
}

?>








<!DOCTYPE html>
<html>
<head>
	<title>Sign UP</title>

	<!-- Bootstrap CDN-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	
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
			<center><h2>Registration</h2></center>
			<hr>
			<form class="form-horizontal" method="post" action="signup.php">
				<div class="form-group">
				    <label for="inputEmaila" class="col-sm-2 control-label">User Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="usernamea" id="inputEmaila" placeholder="User Name" value="<?php if (!empty($usernamea)) echo $usernamea;?>">
				      	
				      
				      <span class="error"><?php echo $usernameErr;?></span>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" value="<?php if (!empty($email)) echo $email;?>" >
				      <span class="error"> <?php echo $emailErr;?></span>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" value="<?php if (!empty($password)) echo $password;?>">
				      <span class="error"> <?php echo $passwordErr;?></span>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="inputPassword4" class="col-sm-2 control-label"> Confirm Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="confirmPass" id="inputPassword4" placeholder="Confirm Password" value="<?php if (!empty($password)) echo $password;?>">
				      <span class="error"> <?php echo $confirmPErr;?></span>
				    </div>
			  	</div>
			  	<center><p>If you have account then <a href="login.php">Login</a></p></center>
			  	<div class="form-group">
				    <div class="col-sm-offset-1 col-sm-10">
				      <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
				    </div>
			  	</div>
			</form>
			
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</body>
</html>