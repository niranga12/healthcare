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
						<h1>List Of All Reports</h1>
					</legend>
					<!-- Button -->
					<div class="form-group">

						<label class="col-md-4 control-label" for="btnadm">Please Select a report</label>
						<div class="col-md-6">
							<button id="btnadm" name="btnadm" class="btn btn-primary">Patients Admit Reports</button>
							<button id="btnmed" name="btnmed" class="btn btn-success">Medical Reports</button>
							
										<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
							<button id="btninvo" name="btninvo" class="btn btn-warning">Inovoices</button>
							<?php	} else {} ?>
			
							
						</div>
					</div>
				</form>
		<?php
				if ( isset( $_GET[ 'btnadm' ] ) ) {
					?>
					
					<div style="text-align:center">
					<h2 style="color:blue;">List of Admit Patients</h2>
				</div>
				
				<table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px;">
					<tr style=" font-size:20px; color:#000">
						<td>Admission ID</td>
						<td>Patient Name</td>
						<td>Room ID</td>
						<td>Admit Date</td>
						<td>Status</td>
						<td>Discharge Date</td>
						<td>Guardian Name</td>
						<td>Guradian Address</td>
						<td>Guradian Contact No</td>
							<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
						
						<td class="col-md-2">Action</td>
						<?php	} else {} ?>
								
					</tr>
					<?php
					//data include to rows
					include( 'db_con.php' );
					$sql = "SELECT Ad_ID,Pa_name,Room_ID,Admit_Date,Discharge_Date,Guardian_Name,Guardian_C_No,Guardian_Address,`Status` FROM regsystem.patient_admission;";
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							?>
					<tr>
						<td>
							<?php echo($row['Ad_ID'])?>
						</td>
						<td>
							<?php echo($row['Pa_name'])?>
						</td>
						<td>
							<?php echo($row['Room_ID'])?>
						</td>
						<td>
							<?php echo($row['Admit_Date'])?>
						</td>
						<td>
							<?php echo($row['Status'])?>
						</td>
						<td>
							<?php echo($row['Discharge_Date'])?>
						</td>
						<td>
							<?php echo($row['Guardian_Name'])?>
						</td>
						<td>
							<?php echo($row['Guardian_Address'])?>
						</td>
						<td>
							<?php echo($row['Guardian_C_No'])?>
						</td>
						
									<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
						<td>
							<a class="btn btn-success" href="Reports.php?btn_pa_admit=&id=<?php echo $row['Ad_ID']?>">Edit</a>
							<a class="btn btn-danger" href="logic/pati_adm_delete.php?id=<?php echo $row['Ad_ID']?>">Delete</a>
							
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
				<?php } ?>
				
						<?php
				if ( isset( $_GET[ 'btnmed' ] ) ) {
					?>
					
					<div style="text-align:center">
					<h2 style="color:blue;">List of Medical Reports</h2>
				</div>
				
				<table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px;">
					<tr style=" font-size:20px; color:#000">
						<td>Medical ID</td>
						<td>Patient ID</td>
						<td>Doctor's Name</td>
						<td>Blood Pressure</td>
						<td>Heart Disease</td>
						<td>Liver Function</td>
						<td>HIV Test</td>
						<td>Suger Level</td>							
					</tr>
					<?php
					
					//data include to rows
					include( 'db_con.php' );
					$sql = "SELECT Re_ID,p_id,Doc_name,blood,heart,liver,hiv,su_level FROM regsystem.medical_report";
					
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							?>
					<tr>
						<td>
							<?php echo($row['Re_ID'])?>
						</td>
						<td>
							<?php echo($row['p_id'])?>
						</td>
						<td>
							<?php echo($row['Doc_name'])?>
						</td>
						<td>
							<?php echo($row['blood'])?>
						</td>
						<td>
							<?php echo($row['heart'])?>
						</td>
						<td>
							<?php echo($row['liver'])?>
						</td>
						<td>
							<?php echo($row['hiv'])?>
						</td>
						<td>
							<?php echo($row['su_level'])?>
						</td>
						
					</tr>
					<?php
					}
					} else {
						echo "0 results";
					}
					$conn->close()
					;
					?>

				</table>
				
				<?php  }?>
				
				
				<?php
				if ( isset( $_GET[ 'btninvo' ] ) ) {
					?>
					<div style="text-align:center">
					<h2 style="color:blue;" >List of Invoices</h2>
				</div>
					
					<table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px;">
					<tr style=" font-size:20px; color:#000">
						<td>Invoice ID</td>
						<td>Patient Name</td>
						<td>Doctor Charge (Rs.)</td>
						<td>Room Charge (Rs.)</td>
						<td>Other Charge (Rs.)</td>
						<td>Net Total (Rs.)</td>							
						<td>Date</td>							
					</tr>
					<?php
					//data include to rows
					include( 'db_con.php' );
					$sql = "SELECT I_ID,P_name,Doc_ch,Ro_ch,Oth_ch,Net_Total,Date FROM regsystem.invoice;";
					
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							?>
					<tr>
						<td>
							<?php echo($row['I_ID'])?>
						</td>
						<td>
							<?php echo($row['P_name'])?>
						</td>
						<td>
							<?php echo($row['Doc_ch'])?>
						</td>
						<td>
							<?php echo($row['Ro_ch'])?>
						</td>
						<td>
							<?php echo($row['Oth_ch'])?>
						</td>
						<td>
							<?php echo($row['Net_Total'])?>
						</td>
						<td>
							<?php echo($row['Date'])?>
						</td>
						
					</tr>
					<?php
					}
					} else {
						echo "0 results";
					}
					$conn->close();
					?>

				</table>
					
					<?php }?>

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
