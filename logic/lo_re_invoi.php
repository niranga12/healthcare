<?php
include '../db_con.php';

$pname = $_POST['In_p_name'];
$doccharge =$_POST['Do_ch'];
$roomcharge =$_POST['Ro_ch'];
$othcharge =$_POST['Oth_ch'];
$nettotall =$_POST['Do_ch']+$_POST['Ro_ch']+$_POST['Oth_ch'];
$date = $_POST['date'];


$sql="INSERT INTO `regsystem`.`invoice` (`P_name`, `Doc_ch`, `Ro_ch`, `Oth_ch`, `Net_Total`, `Date`) VALUES ('$pname', '$doccharge', '$roomcharge', '$othcharge', '$nettotall', '$date');
";

	
	if ( $conn->query( $sql ) === TRUE ) {
		echo header('location:../Report_view.php?btninvo=');
	} else {
		echo "Error Adding record: " . $conn->error;
		}

	$conn->close();

?>