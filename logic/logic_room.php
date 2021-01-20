<?php
include '../db_con.php';

$rid =$_POST['R_ID'];
$rhead =$_POST['R_head'];

$sql="INSERT INTO `regsystem`.`room` (`R_ID`, `R_Head`) VALUES ('$rid', '$rhead')";
	
	if ( $conn->query( $sql ) === TRUE ) {
		echo header('location:../Room.php?btn_vie_ro=');
	} else {
		echo "Error Adding record: " . $conn->error;
		}

	$conn->close();

?>