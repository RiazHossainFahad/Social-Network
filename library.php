<?php
function LoadFromFile(){
	global $auth;
	$myfile=fopen("Database.txt","r") or die("File Not Found");
	while($line=fgets($myfile)){
		$line=trim($line);
		$cr=explode(" ",$line);
		$auth[]=array("em"=>$cr[3],"pass"=>$cr[5]);
	}
	fclose($myfile);	
}

function loadFromMySQL($sql){
	global $auth;
	$conn = mysqli_connect("localhost", "root", "","social_network");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$auth=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		$auth[]=$row;
	}
	//return $arr;
}

function deleteFromMySQL($sql){
	$conn = mysqli_connect("localhost", "root", "","social_network");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	mysqli_close($conn);
	return $result;
	
}

function addFriendToDB($own,$other){
	$sql="insert into friends values ('','$own','$other')";
	$conn = mysqli_connect("localhost", "root", "","social_network");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	return $result;
}

function updateSQL($sql){
	$conn = mysqli_connect("localhost", "root", "","social_network");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	return $result;
}
?>