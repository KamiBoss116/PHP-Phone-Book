<?php
require_once("connection.php");


	$emailErr="";
	$passwordErr="";
	$MatchErr="";
	$userID="";


if (isset($_POST["submit"])) {


	$email=$_POST["email"];
	$password=$_POST["password"];


	


if ($email=="") {
	$emailErr="Email is required";
}
if ($password=="") {
	$passwordErr="Password is required";
}

if (!empty($email) && !empty($password)) {

	$sql="SELECT * FROM users where user_email="."'$email'"." && password="."'$password'";
	$user_id="SELECT id FROM users where user_email="."'$email'";
	$result=mysqli_query($conn,$sql);
	$result1=mysqli_query($conn,$user_id);

	$row=mysqli_fetch_array($result1);

  

	$rows = mysqli_num_rows($result);
	if ($rows==1) {
		
		$id=$row['id'];
		
		header("Location: dashboard.php?id=".$id);


	 exit();
	}
	else
	{
		$MatchErr="No such Record found.Email or Password Mismatch error!";
		
	}
	
}


}


?>





<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

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
			<center><h2>Login</h2></center>
			<?php echo $userID; ?>
			<hr>
			<form class="form-horizontal"  method="post" action="login.php">
				<center><span class="error"> <?php echo $MatchErr;?></span></center>
				<br>
				
			  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" value="<?php if (!empty($email)) echo $email;?>">
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
			  	<br>
			  	<center><p>If you have no account then first <a href="signup.php">Sign up</a></p></center>
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