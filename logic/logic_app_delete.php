<?php
include '../db_con.php';

// read form data and store in variables
$cid = $_GET[ 'cid' ];

	$sql = "DELETE FROM `regsystem`.`appointment` WHERE `Cal_ID`='$cid'";


	if ( $conn->query( $sql ) === TRUE ) {
		echo header("location:../appointment_view.php");
	} else {
		echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
