<?php
require("library.php");
session_start();
$own=$_GET["own"];
$other=$_GET["other"];
$sql = "delete from friends where user_id = '$own' and f_id = '$other'";

$result = deleteFromMySQL($sql);
if($result == 1){
	echo "done";
	}
?>