<?php
include '../db_con.php';

// read form data and store in variables
$pid = $_POST[ 'pid' ];
$fullname = $_POST[ 'name' ];
$address = $_POST[ 'address' ];
$gender = $_POST[ 'gender' ];
$nic = $_POST[ 'nic' ];
$bday = $_POST[ 'bday' ];
$age = $_POST[ 'age' ];
$marital = $_POST[ 'marital' ];
$blood = $_POST[ 'blood' ];
$contact = $_POST[ 'contact' ];
$email = $_POST[ 'email' ];
$reason=$_POST['reason'];



//if user clicked register button
if ( isset( $_POST[ 'regbtn' ] ) ) {
	//create the MySQL insert query using form data above
	$sql = "INSERT INTO `patient_list` (`Full_Name`, `Address`, `Gender`, `NIC_No`, `Birthday`, `Age`, `Marital_Status`, `Blood_Type`, `Contact_No`, `Email`,`Reason`) VALUES ('$fullname','$address','$gender','$nic','$bday','$age','$marital','$blood','$contact','$email','$reason')";

	if ( $conn->query( $sql ) === TRUE ) {
		echo header("location:../Patient_view_table.php");
	} else {
		echo "Error Adding record: " . $conn->error;
	}

	$conn->close();


}

//if User clicked update button
if ( isset( $_POST[ 'btnupdate' ] ) ) {
	//create the MySQL update query using form data above
	$sql = "UPDATE `patient_list` SET `Full_Name`='$fullname', `Address`='$address', `Gender`='$gender', `NIC_No`='$nic', `Birthday`='$bday', `Age`='$age', `Marital_Status`='$marital', `Blood_Type`='$blood', `Contact_No`='$contact', `Email`='$email',`Reason`='$reason' WHERE `patient_ID`='$pid';";

		if ( $conn->query( $sql ) === TRUE ) {
		echo header("location:../Patient_view_table.php");
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();

}


 
