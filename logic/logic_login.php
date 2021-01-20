<?php

session_start();
//if login button clicked
if(isset($_POST['btnlog'])){
	
include( '../db_con.php' );
	//get user name and password from URL parameters
	$uname=$_POST['txtuname'];
	$pass= $_POST['txtpass'];
	
	$sql= "SELECT Em_Type, Full_Name FROM employee WHERE User_Name='$uname' and `Password`=md5('$pass');";
	$result= $conn->query($sql);
	
	//if result has one or more rows
	if($result->num_rows >0){
		//output data of each row
		while ($row= $result->fetch_assoc()){
			$_SESSION['utype']= $row['Em_Type'];
			$_SESSION['fullname']=$row['Full_Name'];
			$_SESSION['uname']=$uname;
			
			
			header("location:../index1.php");
		}
	}
		else {
            header("location: ../login.php?error");
		}
	$conn->close();
}
?>