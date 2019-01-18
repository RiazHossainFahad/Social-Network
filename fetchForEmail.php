<?php
$auth=array();
require("library.php");
$sql="select user_email from users";
//echo $sql;
loadFromMySQL($sql);
echo json_encode($auth);

//print_r($data);
?>