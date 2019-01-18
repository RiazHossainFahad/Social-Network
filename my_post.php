<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
//include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
	header("location: Login.php");
}
?>
<html>
<head>
	
	<title>My Post</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
<div class="row">

	<div class="col-sm-12">
		<center><h2>Your Latest Posts</h2></center>
		<?php user_posts(); ?>
	</div>

</div>
</body>
</html>