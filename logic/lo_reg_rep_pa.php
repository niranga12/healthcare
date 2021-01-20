<?php
include '../db_con.php';

$adid =$_POST['aid'];
$pname =$_POST['Ad_p_name'];
$rid =$_POST['Ro_ID'];
$ad_date =$_POST['Ad_date'];
$gname =$_POST['G_name'];
$gcon =$_POST['G_contact'];
$gaddress =$_POST['G_Address'];
$disstatus =$_POST['Dis_status'];
$disdate =$_POST['Dis_date'];

if ( isset( $_POST[ 'btnsubmit' ] ) ) {

$sql="INSERT INTO `regsystem`.`patient_admission` ( `Pa_name`, `Room_ID`, `Admit_Date`, `Discharge_Date`, `Guardian_Name`, `Guardian_C_No`, `Guardian_Address`, `Status`) VALUES ( '$pname', '$rid', '$ad_date', '$disdate', '$gname', '$gcon', '$gaddress', '$disstatus')";
	
	if ( $conn->query( $sql ) === TRUE ) {
		echo header('location:../Report_view.php?btnadm=');
	} else {
		echo "Error Adding record: " . $conn->error;
		}

	$conn->close();
}


if ( isset( $_POST[ 'btnupdate' ] ) ) {

$sql="UPDATE `regsystem`.`patient_admission` SET `Pa_name`='$pname', `Room_ID`='$rid', `Admit_Date`='$ad_date', `Discharge_Date`='$disdate', `Guardian_Name`='$gname', `Guardian_C_No`='$gcon', `Guardian_Address`='$gaddress', `Status`='$disstatus' WHERE `Ad_ID`='$adid'";

if ( $conn->query( $sql ) === TRUE ) {
		echo header('location:../Report_view.php?btnadm=');
	} else {
		echo "Error updating record: " . $conn->error;
		}

	$conn->close();
}

?>

