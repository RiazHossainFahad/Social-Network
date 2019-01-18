<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
	
</head>
<style>
	body{
		overflow-x:hidden; 
	}
	.main-content{
		width: 50%;
		height: 20px;
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
		background-color: #1a1a1a;
		height: 80px;
	}
	#signup{
		width: 60%;
		border-radius: 30px;
	}
</style>
<body>
<div class="row">
	<div class="col-xs-12">
		<div class="well">
			<center><h1 style="color: white"><strong>Chat Me</strong></h1></center>
		</div>	
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="main-content">
			<h3 style="text-align: center;"> <strong style="padding-bottom: 40px">Forgot password</strong></h3><hr>
		
			<div class="l_pass">
				<form action="" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="email" class="form-control" type="email" name="email" placeholder="Enter your Email" required>
					</div><br><br>
					<pre class="text">Enter your Bestfriend name down below..</pre>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input id="msg" type="text" class="form-control" name="recovery_account" placeholder="Someone.." required>
					</div><br>
					<a style="text-decoration: none; float: right; color: #187fAB;" data-toggle="tooltip" title="Click to go to Login Page" href="Login.php">Back to Sign in</a><br><br>
					<center><button id="signup" class="btn btn-info btn-lg" name="submit">Submit</button></center>
				</form>
			</div>	
		</div>
	</div>
</div>
</body>
</html>
<?php
session_start();

include("includes/connection.php");

	if (isset($_POST['submit'])) {
		if( $_POST['email'] !="" &&  $_POST['recovery_account'] !=""){
		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));

		$recovery_account = htmlentities(mysqli_real_escape_string($con, $_POST['recovery_account']));
		

		$select_user = "select * from users where user_email='$email' AND recovery_account='$recovery_account' ";

		$query= mysqli_query($con, $select_user);
		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['user_email'] = $email;

			echo "<script>window.open('change_password.php', '_self')</script>";
		}else{
			echo"<script>alert('Your Email or Bestfriend name is incorrect')</script>";
		}
	}
	else {
		echo "<script>alert('Email Or Bestfriend Name can not Empty')</script>";
	}
}
?>