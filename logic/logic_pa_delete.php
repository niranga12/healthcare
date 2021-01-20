
<?php
	include '../db_con.php';
$id = $_GET[ 'id' ];
	$sql = "DELETE FROM `regsystem`.`patient_list` WHERE `patient_ID`='$id'";



	if ( $conn->query( $sql ) === TRUE ) {
		echo header("location:../Patient_view_table.php");
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();
?>