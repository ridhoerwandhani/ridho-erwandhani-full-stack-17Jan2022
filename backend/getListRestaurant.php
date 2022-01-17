<?php

header('Access-Control-Allow-Origin: *');
include "config.php";
$whereQuery=" where 1=1 ";
if($_GET['name']=='undefined')$_GET="";
if($_GET['date']=='undefined')$_GET="";
if($_GET['time']=='undefined')$_GET="";
if($_GET['name']!=null){
  $whereQuery=$whereQuery." and UPPER(name) like '%".strtoupper($_GET['name'])."%'";
}
if($_GET['date']!=null){
  $timestamp = strtotime($_GET['date']);
  $day = date('D', $timestamp);
  $whereQuery=$whereQuery." and day like '%".$day."%'";
}
if($_GET['time']!=null){
  $whereQuery=$whereQuery." and startat<='".$_GET['time']."' and endat>='".$_GET['time']."'";
}

// echo $_GET['date'];
// echo $timestamp;
// echo $day;

$result = array();
$i=0;
$sqlGetResto="select DISTINCT a.id,a.name from restoapp.restorant a left join restoapp.restoschedule b on a.id=b.id_resto ".$whereQuery." order by id limit 10";
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
