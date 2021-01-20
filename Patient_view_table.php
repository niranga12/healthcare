<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Health Care Hospital</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

   	
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="position: absolute;">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
          <?php
			include("navibar_top.php");
			include("navibar_right.php");
			
			?>
     
           <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
	<div class="container-fluid">
		
		  <div style="text-align:center">
                      <h2 style="color: red">List of registered Patients</h2>
	</div>
    
	
	<table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px; ">
		<tr style=" font-size:20px; color:#000">
			<td>Patient ID</td>
			<td>Full Name</td>
			<td>Address</td>
			<td>Gender</td>
			<td>NIC No</td>
			<td>Birthday</td>
			<td>Age</td>
			<td>Marital status</td>
			<td>Blood Type</td>
			<td>Contact No</td>
			<td>Email</td>
			<td>Reason</td>
			<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
	<td class="col-md-2">Action</td>
		</tr>
 <?php } else { ?>
		</tr>
		<?php }	?>
			
		<?php
		//data include to rows
		include('db_con.php');
		$sql = "SELECT `patient_ID`,`Full_Name`,Address,Gender,`NIC_No`,Birthday,Age,`Marital_Status`,`Blood_Type`,`Contact_No`,Email,Reason FROM patient_list";
		$result = $conn->query( $sql );

		if ( $result->num_rows > 0 ) {
			// output data of each row
			while ( $row = $result->fetch_assoc() ) {
				?>
		<tr>
			<td><?php echo($row['patient_ID'])?></td>
			<td><?php echo($row['Full_Name'])?></td>
			<td><?php echo($row['Address'])?></td>
			<td><?php echo($row['Gender'])?></td>
			<td><?php echo($row['NIC_No'])?></td>
			<td><?php echo($row['Birthday'])?></td>
			<td><?php echo($row['Age'])?></td>
			<td><?php echo($row['Marital_Status'])?></td>
			<td><?php echo($row['Blood_Type'])?></td>
			<td><?php echo($row['Contact_No'])?></td>
			<td><?php echo($row['Email'])?></td>
			<td><?php echo($row['Reason'])?></td>
		<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
			  <td>
				<a class="btn btn-info btn-xs" href="Patient_reg.php?id=<?php echo($row['patient_ID'])?>">Edit</a>
				<a href="logic/logic_pa_delete.php?id=<?php echo($row['patient_ID'])?>" name="btndelete" class="btn btn-danger btn-xs">Delete</a>
			</td>
			<?php } else {} ?>
		</tr>
		<?php
		}
		}
		else {
			echo "0 results";
		}
		$conn->close();
		?>

	</table>
		
	</div>

        </div>


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
