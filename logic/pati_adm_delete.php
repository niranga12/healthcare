
<?php
	include '../db_con.php';
$id = $_GET[ 'id' ];
	$sql = "DELETE FROM `regsystem`.`patient_admission` WHERE `Ad_ID`='$id'";



	if ( $conn->query( $sql ) === TRUE ) {
		echo header("location:../Report_view.php?btnadm=");
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();
?>