<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: Login.php");
}
?>
<html>
<head>
	<title>Edit Account settings</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">

</head>
<script>
function show_password() {
  var x = document.getElementById("mypass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<body>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-hover">
				<tr align="center">
					<td colspan="6" class="active"><h2>Edit your profile</h2></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Change Your Firstname</td>
					<td>
						<input class="form-control" type="text" name="f_name" required value="<?php echo $first_name;?>">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Change Your Lastname</td>
					<td>
						<input class="form-control" type="text" name="l_name" required value="<?php echo $last_name;?>">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Change Your Username</td>
					<td>
						<input class="form-control" type="text" name="u_name" required value="<?php echo $user_name; ?>">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Description</td>
					<td>
						<input class="form-control" type="text" name="describe_user" required value="<?php echo $describe_user;?>">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Relationship Status</td>
					<td>
						<select class="form-control" name="Relationship">
							<option><?php echo $Relationship_status; ?></option>
							<option>Engaged</option>
							<option>Married</option>
							<option>Single</option>
							<option>In a Relationship</option>
							<option>Its Complicated</option>
							<option>Separated</option>
							<option>Divorced</option>
							<option>Widowed</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Password</td>
					<td>
						<input class="form-control" type="password" name="u_pass" id="mypass" required value="<?php echo $user_pass;?>">
						<input type="checkbox" onclick="show_password()"><strong>Show Password</strong>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Email</td>
					<td>
						<input class="form-control" type="email" name="u_email" required value="<?php echo $user_email;?>">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Country</td>
					<td>
						<select class="form-control" name="u_country">
							<option><?php echo $user_country; ?></option>
							<option>Bangladesh</option>
							<option>UK</option>
							<option>USA</option>
							<option>Canada</option>
							<option>Germany</option>
							<option>Sweden</option>
							<option>Japan</option>
							<option>Korea</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Gender</td>
					<td>
						<select class="form-control" name="u_gender">
							<option><?php echo $user_gender; ?></option>
							<option>Male</option>
							<option>Female</option>
							<option>Other</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Birthdate</td>
					<td>
						<input class="form-control input-md" type="date" name="u_birthday" required value="<?php echo $user_birthday;?>">
					</td>
				</tr>

				<!-- Recover Password -->

				<tr>
					<td style="font-weight: bold;">Forgotten Password</td>
					<td>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Turn On</button>

						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Turn On Recovery</h4>
									</div>
									<div class="modal-body">
										<form action="recovery.php?id=<?php echo $user_id; ?>" method="post" id="f"><strong>What is your School best friend name?</strong>
											<textarea class="form-control" cols="83" rows="4" name="content" placeholder="Someone.."></textarea><br>
											<input class="btn btn-default" type="submit" name="sub" value="Submit" style="width: 100px;"><br><br>
											<pre>Answer the above question we will ask this question if you forgot your <br>password.</pre>
											<br><br>
										</form>
										<?php

										if (isset($_POST['sub']))
										{
											$bfn = htmlentities($_POST['content']);

											if ($bfn =='')
											{
												echo"<script> alert('Please Enter Something')</script>";
												echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
												exit();
											}
											else
											{
												$update = " update users set recovery_account='$bfn' where user_id='$user_id' ";

												$run = mysqli_query($con, $update);

												if($run)
												{
													echo"<script> alert('Working...')</script>";
													echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
												}
												else
												{
													echo"<script> alert('Error while updating information')</script>";
													echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
												}
											}
										}

										?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr align="center">
					<td colspan="6">
					<input type="submit" class="btn btn-info" name="update" style="width: 250px;" value="Update">
					</td>		
				</tr>
				<tr align="center">
					<td colspan="6"> 
						<button type="button" class="btn btn-danger" data-toggle="modal" style="width: 250px;" data-target="#myModal1">Delete Account</button>

						<div id="myModal1" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Delete Account</h4>
									</div>
									<div class="modal-body">
										<form action="delete.php" method="post" id="f2"><strong>Do you want to delete?</strong><br><br>
											<input class="btn btn-danger" type="submit" name="confirm" value="Confirm" style="width: 100px;"><br><br>
											<button type="button" class="btn btn-default" style="width: 100px;"data-dismiss="modal">Close</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>

			</table>
		</form>
	</div>
	<div class="col-sm-2">
	</div>
</div>
</body>
</html>

<?php

	if (isset($_POST['update']))
	{
		$f_name = htmlentities($_POST['f_name']);
		$l_name = htmlentities($_POST['l_name']);
		$u_name = htmlentities($_POST['u_name']);
		$describe_user = htmlentities($_POST['describe_user']);
		$Relationship_status = htmlentities($_POST['Relationship']);
		$u_pass = htmlentities($_POST['u_pass']);
		$u_email = htmlentities($_POST['u_email']);
		$u_country = htmlentities($_POST['u_country']);
		$u_gender = htmlentities($_POST['u_gender']);
		$u_birthday = htmlentities($_POST['u_birthday']);

		$update = "update users set f_name='$f_name', l_name='$l_name', user_name='$u_name', describe_user='$describe_user', Relationship='$Relationship_status', user_pass='$u_pass', user_email='$u_email', user_country='$u_country', user_gender='$u_gender', user_birthday='$u_birthday' where user_id='$user_id'" ;

		$run = mysqli_query($con, $update);

			if($run)
			{
				echo"<script> alert('Your profile updated.')</script>";
				echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
			}


	}

?>