<!DOCTYPE html>
<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
	header("location: Login.php");
}
?>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
	<title>Forgot Password</title>	
</head>
<style>
	body{
		overflow-x:hidden; 
	}
	.main-content{
		width: 50%;
		height: 40px;
		margin: 10px auto;
		background-color: #fff;
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
	}
	.header{
		border: 0px solid #000;
		margin-bottom: 5px;
	}
	.well{
		background-color: #187FAB;
	}
	#signup{
		width: 60%;
		border-radius: 30px;
	}
</style>
<body>
<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<center><h1 style="color: white"><strong>Chat Me</strong></h1></center>
		</div>	
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
			<div class="hearder">
				<h3 style="text-align: center;"> <strong>Change Password</strong></h3><hr>
			</div>
			<div class="l_pass">
				<form action="" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" class="form-control" type="password" name="pass" placeholder="New Password" required>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control" name="pass1" placeholder="Re-enter New Password" required>
					</div><br>
					
					<center><button id="signup" class="btn btn-info btn-lg" name="change">Change Password</button></center>
				</form>
			</div>	
		</div>
	</div>
</div>
</body>
</html>

<?php

	if (isset($_POST['change']))
	{
		if( $_POST['pass'] != "" && $_POST['pass1'] != "" ){
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user' ";

		$run_user = mysqli_query($con, $get_user);
		$row = mysqli_fetch_array($run_user);

		$user_id = $row ['user_id'];


		$pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
		$pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['pass1']));

		if ($pass==$pass1)
		{
			if (strlen($pass) >= 6 && strlen ($pass) <=60)
			{

			$update = "update users set user_pass='$pass' where user_id='$user_id' ";

			$run = mysqli_query ($con, $update);

			echo "<script>alert('Your Password is changed a moment ago')</script>";
			echo"<script>window.open('homepage.php','_self')</script>";
			}
			else
			{
				echo "<script>alert('Your Password should be greater than 6 character')</script>";

			}
		}
			else
			{
				echo "<script>alert('Your Password did not match')</script>";
			    echo"<script>window.open('change_password.php','_self')</script>";
			}
	}
	else {
		echo "<script>alert('Password or re-password can not Empty')</script>";
	}
}

?>