<?php
require("library.php");

$em = $_POST["emailLogin"];
$p = $_POST["pass"];

if($em == "" || $p == "" ){
	echo "<script>alert('Your Email or Password is empty')</script>";
	echo "<script>window.open('Login.php', '_self')</script>";
}

else{
$auth=array();
$flag=0;
//LoadFromFile();
//LoadFromXML();
$sql="select * from users" ;

loadFromMySQL($sql);
//print_r($auth);
foreach($auth as $v){
	if($_POST["emailLogin"]==$v["user_email"] && $_POST["pass"]==$v["user_pass"]){
		session_start();
		$_SESSION['user_email'] = $_POST["emailLogin"];
		header("location: homepage.php");
		$flag=1;
	}	
}
if($flag == 0){
	echo "<script>alert('Your Email or Password is incorrect')</script>";
	echo "<script>window.open('Login.php', '_self')</script>";
	}
}
?>