<?php

// open file
//parse data
// insert database
// close

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// die;



$txt_file = file_get_contents('hours.csv');
$rows = explode("\n", $txt_file);
$i = 0;
$j=0;
$jIdOrder="";
foreach ($rows as $row) {
    $restorant = explode(",\"", $row);
    $nameResto = str_replace("\"", "", $restorant[0]);
    $openingHours =  str_replace("\"", "", $restorant[1]);
    echo "nama resto :" . $nameResto;

    $sqlInsertResto = 'INSERT INTO `restoapp`.`restorant`(`name`)VALUES("' . $nameResto . '");';
    if ($conn->query($sqlInsertResto) === TRUE) {
        echo "New record created successfully";
        echo "ID :" . $idResto = $conn->insert_id;
    } else {
        echo "Error: " . $sqlInsertResto . "<br>" . $conn->error;
        die;
    }

    $listOpeningHours = explode(" / ", str_replace(",", " ", $openingHours));
    echo "\n";
    echo "total time:" . count($listOpeningHours);
    // print_r($listOpeningHours);
    foreach ($listOpeningHours as $dataOpeningHour) {
        $arrTime = explode(" ", $dataOpeningHour);
        echo "\n";
        echo count($arrTime);
        // print_r($arrTime);
        if (count($arrTime) == 6) {
            $day = $arrTime[0];
            $startAt = date("H:i", strtotime($arrTime[1] . "" . $arrTime[2]));
            $endAt = date("H:i", strtotime($arrTime[4] . "" . $arrTime[5]));
            echo "\n";
            echo $day . " " . $startAt . "-" . $endAt;

            $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("'.$idResto.'","'.$day.'","'.$startAt.'","'.$endAt.'");';
            if ($conn->query($sqlInsertScedule) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                die;
            }
        } else if (count($arrTime) == 8) {
            $day1 = $arrTime[0];
            $day2 = $arrTime[2];
            $startAt = date("H:i", strtotime($arrTime[3] . "" . $arrTime[4]));
            $endAt = date("H:i", strtotime($arrTime[6] . "" . $arrTime[7]));
            if ($arrTime[1] == "-") {
                echo "Test";
                $numDay1 = getNumday($day1);
                $numDay2 = getNumday($day2);
                while ($numDay1 != $numDay2) {
                    $day = getDayResult($numDay1);
                    if ($numDay1 == 6) {
                        $numDay1 = 0;
                    } else {
                        $numDay1++;
                    }
                    echo "\n";
                    echo $day . " " . $startAt . "-" . $endAt;


                    $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("' . $idResto . '","' . $day . '","' . $startAt . '","' . $endAt . '");';
                    if ($conn->query($sqlInsertScedule) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                        die;
                    }
                }
            } else {
                $day = $day1;
                echo "\n";
                echo $day . " " . $startAt . "-" . $endAt;
                $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("' . $idResto . '","' . $day . '","' . $startAt . '","' . $endAt . '");';
                if ($conn->query($sqlInsertScedule) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                    die;
                }


                $day = $day2;
                echo "\n";
                echo $day . " " . $startAt . "-" . $endAt;
                $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("' . $idResto . '","' . $day . '","' . $startAt . '","' . $endAt . '");';
                if ($conn->query($sqlInsertScedule) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                    die;
                }
            }
        } else if (count($arrTime) == 10) {
            $day1 = $arrTime[0];
            $day2 = $arrTime[2];
            $day3 = $arrTime[4];
            $startAt = date("H:i", strtotime($arrTime[5] . "" . $arrTime[6]));
            $endAt = date("H:i", strtotime($arrTime[8] . "" . $arrTime[9]));

            if ($arrTime[1] == "-") {
                $numDay1 = getNumday($day1);
                $numDay2 = getNumday($day2);
                while ($numDay1 != $numDay2) {
                    $day = getDayResult($numDay1);
                    if ($numDay1 == 6) {
                        $numDay1 = 0;
                    } else {
                        $numDay1++;
                    }
                    echo "\n";
                    echo $day . " " . $startAt . "-" . $endAt;
                    $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("' . $idResto . '","' . $day . '","' . $startAt . '","' . $endAt . '");';
                    if ($conn->query($sqlInsertScedule) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                        die;
                    }
                }
                $day = $day3;
                echo "\n";
                echo $day . " " . $startAt . "-" . $endAt;
                $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("' . $idResto . '","' . $day . '","' . $startAt . '","' . $endAt . '");';
                if ($conn->query($sqlInsertScedule) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                    die;
                }
            } elseif ($arrTime[3] == "-") {
                $day = $day1;
                echo "\n";
                echo $day . " " . $startAt . "-" . $endAt;

                $numDay1 = getNumday($day2);
                $numDay2 = getNumday($day3);
                while ($numDay1 != $numDay2) {
                    $day = getDayResult($numDay1);
                    if ($numDay1 == 6) {
                        $numDay1 = 0;
                    } else {
                        $numDay1++;
                    }
                    echo "\n";
                    echo $day . " " . $startAt . "-" . $endAt;
                    $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("' . $idResto . '","' . $day . '","' . $startAt . '","' . $endAt . '");';
                    if ($conn->query($sqlInsertScedule) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                        die;
                    }
                }
            } else {
                $day = $day1;
                echo "\n";
                echo $day . " " . $startAt . "-" . $endAt;
                $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("' . $idResto . '","' . $day . '","' . $startAt . '","' . $endAt . '");';
                if ($conn->query($sqlInsertScedule) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                    die;
                }

                $day = $day2;
                echo "\n";
                echo $day . " " . $startAt . "-" . $endAt;
                $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("' . $idResto . '","' . $day . '","' . $startAt . '","' . $endAt . '");';
                if ($conn->query($sqlInsertScedule) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                    die;
                }

                $day = $day3;
                echo "\n";
                echo $day . " " . $startAt . "-" . $endAt;
                $sqlInsertScedule = 'INSERT INTO `restoapp`.`restoschedule`(`id_resto`,`day`,`startat`,`endat`)VALUES("' . $idResto . '","' . $day . '","' . $startAt . '","' . $endAt . '");';
                if ($conn->query($sqlInsertScedule) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sqlInsertScedule . "<br>" . $conn->error;
                    die;
                }
            }
    } else if (count($arrTime) == 12) {$j++;$jIdOrder=$jIdOrder.",".$idResto;}else{die;}
        echo "\\\\\\\\\\";
    }
    echo "\n";
    echo "=================";
    $i++;
    // if($i==3)break;
}
echo "Total J:".$j;
echo "JOrder:".$jIdOrder;
$conn->close();


function getNumday($dayVar)
{
    if ($dayVar == "Sun") {
        $numDay = 0;
    } elseif ($dayVar == "Mon") {
        $numDay = 1;
    } elseif ($dayVar == "Tues") {
        $numDay = 2;
    } elseif ($dayVar == "Weds") {
        $numDay = 3;
    } elseif ($dayVar == "Thurs") {
        $numDay = 4;
    } elseif ($dayVar == "Fri") {
        $numDay = 5;
    } elseif ($dayVar == "Sat") {
        $numDay = 6;
    }else{echo "wrongDay :".$dayVar;die;}

    return $numDay;
}


function getDayResult($dayNum)
{
    if ($dayNum == 0) {
        $resultDay = "Sun";
    } elseif ($dayNum == 1) {
        $resultDay = "Mon";
    } elseif ($dayNum == 2) {
        $resultDay = "Tues";
    } elseif ($dayNum == 3) {
        $resultDay = "Weds";
    } elseif ($dayNum == 4) {
        $resultDay = "Thurs";
    } elseif ($dayNum == 5) {
        $resultDay = "Fri";
    } elseif ($dayNum == 6) {
        $resultDay = "Sat";
    }else{echo "wrongDay :".$dayNum; die;}

    return $resultDay;
}
