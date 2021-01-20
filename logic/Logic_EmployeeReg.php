<?php
include( '../db_con.php' );

// read form data and store in variables
$Eid = $_POST[ 'Eid' ];
$Em_Type = $_POST[ 'Emtype' ];
$Fname = $_POST[ 'Fname' ];
$Address = $_POST[ 'Address' ];
$Gender = $_POST[ 'Gender' ];
$Bday = $_POST[ 'Bdy' ];
$Marital = $_POST[ 'Marital' ];
$Age = $_POST[ 'Age' ];
$Nic = $_POST[ 'Nic' ];
$Cno = $_POST[ 'Cno' ];
$Email = $_POST[ 'Email' ];
$Username = $_POST['Username'];
$Password = $_POST['Password'];



//if user clicked register button
if ( isset( $_POST[ 'btnreg' ] ) ) {
	//create the MySQL insert query using form data above

	$sql = "INSERT INTO `employee` (`Em_Type`, `Full_Name`, `Address`, `Gender`, `NIC`, `Birthday`, `Age`, `Marital_Status`, `Contact_No`, `Email`, `User_Name`, `Password`) VALUES ('$Em_Type', '$Fname', '$Address', '$Gender', '$Nic', '$Bday', '$Age', '$Marital', '$Cno', '$Email', '$Username', md5('$Password'))";

	if ( $conn->query( $sql ) === TRUE ) {
	echo header("location:../Employee_view.php");
} else {
	echo "Error add record: " . $conn->error;
}


$conn->close();

}

//if User clicked update button
if ( isset( $_POST[ 'btnupdate' ] ) ) {

	$sql = "UPDATE `regsystem`.`employee` SET `Em_Type`='$Em_Type', `Full_Name`='$Fname', `Address`='$Address', `Gender`='$Gender', `NIC`='$Nic', `Birthday`='$Bday', `Age`='$Age', `Marital_Status`='$Marital', `Contact_No`='$Cno', `Email`='$Email', `User_Name`='$Username', `Password`='$Password' WHERE `Em_ID`='$Eid';";


if ( $conn->query( $sql ) === TRUE ) {
	echo header("location:../Employee_view.php");
} else {
	echo "Error updating record: " . $conn->error;
}


$conn->close();}


?>