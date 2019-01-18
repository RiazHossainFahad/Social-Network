<?php
$auth=array();
require("library.php");
$sql="select * from users";
//echo $sql;
//loadFromText();
loadFromMySQL($sql);
foreach($auth as $v){
	if($_REQUEST["uname"] == $v["user_name"])
	echo "*UserName Already taken";
	else echo "";
}
//print_r($data);
?>