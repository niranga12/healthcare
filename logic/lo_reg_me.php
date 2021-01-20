<?php
include '../db_con.php';
	
	$pid =$_POST['Me_p_id'];
	
	$sql="SELECT patient_ID FROM regsystem.patient_list where patient_ID='$pid'";

$result = $conn->query( $sql );

		if ( $result->num_rows > 0 ) {
			// output data of each row
			while ( $row = $result->fetch_assoc() ){
		
if($pid===$row['patient_ID']){

$pid =$_POST['Me_p_id'];
$docname =$_POST['Doc_name'];
$blood =$_POST['Blood'];
$heart =$_POST['Heart'];
$liver =$_POST['Liver'];
$hiv =$_POST['Hiv'];
$sulevel =$_POST['Su_level'];

$sql="INSERT INTO `regsystem`.`medical_report` (`p_id`, `Doc_name`, `blood`, `heart`, `liver`, `hiv`, `su_level`) VALUES ('$pid', '$docname', '$blood', '$heart', '$liver', '$hiv', '$sulevel')";

	
	if ( $conn->query( $sql ) === TRUE ) {
		echo header('location:../Report_view.php?btnmed=');
	} else {
		echo "Error Adding record: " . $conn->error;
		}

	$conn->close();
} }
 } else echo header('location:../Patient_reg.php');
?>