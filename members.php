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
	<title>Find people</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
<div class="row">
	
</div>
<div class="row">
	<div class="col-sm-12">
		<center><h2>Find new people</h2></center><br><br>
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<form class="search_form" action="">
					<input type="text" placeholder="Search Friend" name="search_user">
					<button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
				</form>
			</div>
			<div class="col-sm-4">
			</div>
		</div><br><br>
		<?php search_user(); ?>
	</div>
</div>
</body>
</html>