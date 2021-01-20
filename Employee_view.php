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

<body>

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

				<form class="form-horizontal">
					<legend style="color:#F00; margin-left:50px;">
						<h1>List Of All Registered Employees</h1>
					</legend>
					<!-- Button -->
					<div class="form-group">

						<label class="col-md-4 control-label" for="btndoc">Please Select a button</label>
						<div class="col-md-6">
							<button id="btndoc" name="btndoc" class="btn btn-primary">List Of Doctors</button>
							<button id="btnnurse" name="btnnurse" class="btn btn-success">List Of Nurses</button>
							<button id="btnrece" name="btnrece" class="btn btn-warning">List Of Receptionists</button>
						</div>
					</div>
				</form>

				<?php
				if ( isset( $_GET[ 'btndoc' ] ) ) {
					?>
				<div style=" color:#00F; text-align:center">
					<h2>List of Registered Doctors</h2>
				</div>
				<table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px;">
					<tr style=" font-size:20px; color:#000">
						<td>Doctor ID</td>
						<td>Full Name</td>
						<td>Address</td>
						<td>Gender</td>
						<td>Birthday</td>
						<td>Marital status</td>
						<td>Age</td>
						<td>NIC No</td>
						<td>Contact No</td>
						<td>Email</td>
							
	<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
					
						<td class="col-md-2">Action</td>
					 <?php } else {}
					?>
					</tr>
					<?php
					//data include to rows
					include( 'db_con.php' );
					$sql = "SELECT `Em_ID`, `Em_Type`, `Full_Name`, `Address`, `Gender`, `NIC`, `Birthday`, `Age`, `Marital_Status`, `Contact_No`, `Email` FROM`regsystem`.`employee` WHERE Em_Type='Doctor'";
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							?>
					<tr>
						<td>
							<?php echo($row['Em_ID'])?>
						</td>
						<td>
							<?php echo($row['Full_Name'])?>
						</td>
						<td>
							<?php echo($row['Address'])?>
						</td>
						<td>
							<?php echo($row['Gender'])?>
						</td>
						<td>
							<?php echo($row['Birthday'])?>
						</td>
						<td>
							<?php echo($row['Marital_Status'])?>
						</td>
						<td>
							<?php echo($row['Age'])?>
						</td>
						<td>
							<?php echo($row['NIC'])?>
						</td>
						<td>
							<?php echo($row['Contact_No'])?>
						</td>
						<td>
							<?php echo($row['Email'])?>
						</td>

							<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
								<td>
							<a class="btn btn-info" href="Employee_reg.php?id=<?php echo($row['Em_ID'])?>">Edit</a>
							<a href="logic/logic_em_delete.php?id=<?php echo($row['Em_ID'])?>" class="btn btn-danger">Delete</a>
						</td>
							<?php } else {} ?>
						
					</tr>
					<?php
					}
					} else {
						echo "0 results";
					}
					$conn->close();
					?>

				</table>
				<?php } ?>


				<?php
				if ( isset( $_GET[ 'btnnurse' ] ) ) {
					?>
				<div style=" color:#00F; text-align:center">
					<h2>List of Registered Nurses</h2>
				</div>
				<table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px;">
					<tr style=" font-size:20px; color:#000">
						<td>Nurce ID</td>
						<td>Full Name</td>
						<td>Address</td>
						<td>Gender</td>
						<td>Birthday</td>
						<td>Marital status</td>
						<td>Age</td>
						<td>NIC No</td>
						<td>Contact No</td>
						<td>Email</td>
							<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
						<td class="col-md-2">Action</td> <?php } else {} ?>
					</tr>
					<?php
					//data include to rows
					include( 'db_con.php' );
					$sql = "SELECT `Em_ID`, `Em_Type`, `Full_Name`, `Address`, `Gender`, `NIC`, `Birthday`, `Age`, `Marital_Status`, `Contact_No`, `Email` FROM`regsystem`.`employee` WHERE Em_Type='Nurse'";
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							?>
					<tr>
						<td>
							<?php echo($row['Em_ID'])?>
						</td>
						<td>
							<?php echo($row['Full_Name'])?>
						</td>
						<td>
							<?php echo($row['Address'])?>
						</td>
						<td>
							<?php echo($row['Gender'])?>
						</td>
						<td>
							<?php echo($row['Birthday'])?>
						</td>
						<td>
							<?php echo($row['Marital_Status'])?>
						</td>
						<td>
							<?php echo($row['Age'])?>
						</td>
						<td>
							<?php echo($row['NIC'])?>
						</td>
						<td>
							<?php echo($row['Contact_No'])?>
						</td>
						<td>
							<?php echo($row['Email'])?>
						</td>
						
							<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
						<td>
							<a class="btn btn-info" href="Employee_reg.php?id=<?php echo($row['Em_ID'])?>">Edit</a>
							<a href="logic/logic_em_delete.php?id=<?php echo($row['Em_ID'])?>" class="btn btn-danger">Delete</a>
						</td>
						<?php } else{} ?>
					</tr>
					<?php
					}
					} else {
						echo "0 results";
					}
					$conn->close();
					?>

				</table>
				<?php } ?>

				<?php
				if ( isset( $_GET[ 'btnrece' ] ) ) {
					?>
				<div style=" color:#00F; text-align:center">
					<h2>List of Registered Receptionists</h2>
				</div>
				<table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px;">
					<tr style=" font-size:20px; color:#000">
						<td>Receptionist ID</td>
						<td>Full Name</td>
						<td>Address</td>
						<td>Gender</td>
						<td>Birthday</td>
						<td>Marital status</td>
						<td>Age</td>
						<td>NIC No</td>
						<td>Contact No</td>
						<td>Email</td>
							<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
						<td class="col-md-2">Action</td>
						<?php } else {} ?>
					</tr>
					<?php
					//data include to rows
					include( 'db_con.php' );
					$sql = "SELECT `Em_ID`, `Em_Type`, `Full_Name`, `Address`, `Gender`, `NIC`, `Birthday`, `Age`, `Marital_Status`, `Contact_No`, `Email` FROM`regsystem`.`employee` WHERE Em_Type='Receptionist'";
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							?>
					<tr>
						<td>
							<?php echo($row['Em_ID'])?>
						</td>
						<td>
							<?php echo($row['Full_Name'])?>
						</td>
						<td>
							<?php echo($row['Address'])?>
						</td>
						<td>
							<?php echo($row['Gender'])?>
						</td>
						<td>
							<?php echo($row['Birthday'])?>
						</td>
						<td>
							<?php echo($row['Marital_Status'])?>
						</td>
						<td>
							<?php echo($row['Age'])?>
						</td>
						<td>
							<?php echo($row['NIC'])?>
						</td>
						<td>
							<?php echo($row['Contact_No'])?>
						</td>
						<td>
							<?php echo($row['Email'])?>
						</td>

						<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
						<td>
							<a class="btn btn-info" href="Employee_reg.php?id=<?php echo($row['Em_ID'])?>">Edit</a>
							<a href="logic/logic_em_delete.php?id=<?php echo($row['Em_ID'])?>" class="btn btn-danger" name="btndelete">Delete</a>

						</td>
						<?php } else {} ?>
					</tr>
					<?php
					}
					} else {
						echo "0 results";
					}
					$conn->close();
					?>

				</table>
				<?php } ?>

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