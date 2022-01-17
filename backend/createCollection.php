<?php
header('Access-Control-Allow-Origin: *');
include "config.php";
$_GET['name'] = $argv[1];
$name=$_GET['name'];

$sqlInsertCollection="INSERT INTO `restoapp`.`collection`(`name`)VALUES('$name');";
$resultCollection = mysqli_query($conn, $sqlInsertCollection);

if($resultCollection){
    $result = array("status" => 1, "msg" => "Collection added!");
}
else
{
    $result = array("status" => 0, "msg" => "Error adding collection!");
}
mysqli_close($conn);

echo json_encode($result);

?>
