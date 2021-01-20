<?php
include '../db_con.php';

// read form data and store in variables
$Eid = $_GET[ 'id' ];

	$sql = "DELETE FROM `regsystem`.`employee` WHERE `Em_ID`='$Eid'";


	if ( $conn->query( $sql ) === TRUE ) {
		echo header("location:../Employee_view.php");
	} else {
		echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
?>