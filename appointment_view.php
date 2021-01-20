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
						<h1>List Of Appointments</h1>
					</legend>
				</form>


				<table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px;">
					<tr style=" font-size:20px; color:#000">
						<td>Caller ID</td>
						<td>Caller Name</td>
						<td>Doctor's Name</td>
						<td>Age</td>
						<td>Address</td>
						<td>Contact No</td>
						<td>Date</td>
						
							<?php
			if($_SESSION['utype']=="Receptionist"){ ?>										
						<td>Action</td>
							<?php	} else {} ?>
					</tr>
					<?php
					//data include to rows
					include( 'db_con.php' );
					$sql = "SELECT `Cal_ID`, `Cal_Name`, `Doc_Name`, `Cal_Age`, `Cal_Address`, `Con_No`, `Date` FROM`regsystem`.`appointment`";
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							?>
					<tr>
						<td>
							<?php echo($row['Cal_ID'])?>
						</td>
						<td>
							<?php echo($row['Cal_Name'])?>
						</td>
						<td>
							<?php echo($row['Doc_Name'])?>
						</td>
						<td>
							<?php echo($row['Cal_Age'])?>
						</td>
						<td>
							<?php echo($row['Cal_Address'])?>
						</td>
						<td>
							<?php echo($row['Con_No'])?>
						</td>
						<td>
							<?php echo($row['Date'])?>
						</td>
						
						<?php if($_SESSION['utype']=="Receptionist"){ ?>		
						<td>
							<a name="btndelete" href="logic/logic_app_delete.php?cid=<?php echo($row['Cal_ID'])?>" class="btn btn-danger">Delete</a>
						</td>	
						<?php	} else {} ?>				
					</tr>
					<?php
					}
					} else {
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