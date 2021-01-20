<?php
include '../db_con.php';

$thtype =$_POST['Th_type'];
$pname =$_POST['Pa_name'];
$doname =$_POST['Do_name'];
$intime =$_POST['Intime'];
$outtime =$_POST['Outtime'];
$date =$_POST['Date'];

$sql="INSERT INTO `regsystem`.`theater` (`Th_type`, `Pa_name`, `Th_Doc_ID`, `Intime`, `Outtime`, `Date`) VALUES ('$thtype', '$pname', '$doname', '$intime', '$outtime', '$date')";
	
	if ( $conn->query( $sql ) === TRUE ) {
		echo header('location:../Theater.php?btnviewthe=');
	} else {
		echo "Error Adding record: " . $conn->error;
		}

	$conn->close();

?>