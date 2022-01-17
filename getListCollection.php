<?php

header('Access-Control-Allow-Origin: *');
include "config.php";
$whereQuery=" where id_collection=1 and status=1 ";


$result = array();
$i=0;
$sqlGetResto="select DISTINCT a.id,a.name from restoapp.restorant a left join restoapp.restocollection b on a.id=b.id_resto ".$whereQuery." order by id limit 10";
// echo $sqlGetResto;
$resultResto = mysqli_query($conn, $sqlGetResto);

if (mysqli_num_rows($resultResto) > 0) {
  while($row = mysqli_fetch_assoc($resultResto)) {
    $result[$i]=$row;
    $j=0;
    $sqlGetSchedule="select * from restoapp.restoschedule where id_resto=".$row['id'];
    $resultSchedule = mysqli_query($conn, $sqlGetSchedule);
    while($rowSchedule = mysqli_fetch_assoc($resultSchedule)) {
        $result[$i]['schedule'][$j]=$rowSchedule;
        $j++;
    }
    $i++;
  }
} 
mysqli_close($conn);

echo json_encode($result);
