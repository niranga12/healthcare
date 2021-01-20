<?php
include '../db_con.php';

// read form data and store in variables
$caller = $_POST[ 'Caller' ];
$docterlist = $_POST[ 'docterlist' ];
$age = $_POST[ 'Age' ];
$address = $_POST[ 'address' ];
$Contact = $_POST[ 'Contact' ];
$date = $_POST[ 'date' ];


	//create the MySQL insert query using form data above
	$sql = "INSERT INTO `appointment` (`Cal_Name`, `Doc_Name`, `Cal_Age`, `Cal_Address`, `Con_No`, `Date`) VALUES ('$caller','$docterlist','$age','$address','$Contact','$date')";


	if ( $conn->query( $sql ) === TRUE ) {
		echo header("location:../appointment_view.php");
	} else {
		echo "Error adding Appointment: " . $conn->error;
	}

	$conn->close();

 
