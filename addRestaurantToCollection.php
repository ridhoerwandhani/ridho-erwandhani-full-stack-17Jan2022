<?php
header('Access-Control-Allow-Origin: *');
include "config.php";
$idCollection=$_GET['collection'];
$idResto=$_GET['resto'];

$idResto=$_GET['resto'];
$idCollection=1;

$sqlAddToCollection="INSERT INTO `restoapp`.`restocollection`(`id_resto`,`id_collection`)VALUES($idResto,$idCollection);";
// echo $sqlAddToCollection;
$resultCollection = mysqli_query($conn, $sqlAddToCollection);

if($resultCollection){
    $result = array("status" => 1, "msg" => "Resto added!");
}
else
{
    $result = array("status" => 0, "msg" => "Error adding resto!");
}
mysqli_close($conn);

echo json_encode($result);

?>