<?php
require("library.php");
session_start();
$own=$_GET["own"];
$other=$_GET["other"];
$sql = "select * from friends";
$auth=array();
loadFromMySQL($sql);
foreach($auth as $v){
	if(($v["user_id"] == $own && $v["f_id"] == $other)){
	echo "have";
	break;
	}
}
?>