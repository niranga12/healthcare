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

					<!-- Button -->
					<div class="form-group" style="margin-top: 20px;">

						<label class="col-md-4 control-label" for="theater">Please Select a Button</label>
						<div class="col-md-6">
							<button id="btn_cre_ro" name="btnaddthe" class="btn btn-primary">Add Theater</button>
							<button id="btn_vie_ro" name="btnviewthe" class="btn btn-success">View Theater details</button>
						
						</div>
					</div>
				</form>
				
					<?php
				if ( isset( $_GET[ 'btnaddthe' ] ) ) {
					?>
				<div style="width: 600px; height: auto; border: solid; margin-left: 200px;">
					<!--form1 div-->
					<div>
						<h2 style=" color: red; text-align:center">Add Theater</h2>
					</div>
					<form class="form-horizontal" method="post" action="logic/logic_theater.php">
						<fieldset>
						
							<!-- Text input-->
							<div class="form-group" style="margin-top: 10px;">
								<label class="col-md-4 control-label" for="Th_ID">Theater ID</label>
								<div class="col-md-4">
									<input id="Th_ID" disabled name="Th_ID" type="number" placeholder="" class="form-control input-md">

								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Th_type">Theater Type</label>
								<div class="col-md-4">
									<input id="Th_type" name="Th_type" type="text" placeholder="" class="form-control input-md" required="">

								</div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Pa_name">Patient Name</label>
								<div class="col-md-4">
									<input id="Pa_name" name="Pa_name" type="text" placeholder="" class="form-control input-md" required="">

								</div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Do_name">Doctor Name</label>
								<div class="col-md-4">
									<input id="Do_name" name="Do_name" type="text" placeholder="" class="form-control input-md" required="">

								</div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Intime">Intime</label>
								<div class="col-md-4">
									<input id="Intime" name="Intime" type="time" placeholder="" class="form-control input-md" required="">

								</div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Outtime">Outtime</label>
								<div class="col-md-4">
									<input id="Outtime" name="Outtime" type="time" placeholder="" class="form-control input-md" required="">

								</div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Date">Date</label>
								<div class="col-md-4">
									<input id="Date" name="Date" type="date" placeholder="" class="form-control input-md" required="">

								</div>
							</div>

							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="btncreate"></label>
								<div class="col-md-8">
									<button id="btncreate" name="btncreate" class="btn btn-primary">Create</button>

								</div>
							</div>
							</fieldset>
					</form>

				</div>
				<!--form1 admit-->
				<?php } else {} ?>
				
				<?php
				if ( isset( $_GET[ 'btnviewthe' ] ) ) {
					?>
					
					<div style="text-align:center">
					<h2 style="color:blue;" >List of Theaters</h2>
				</div>
				
				<table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px;">
					<tr style=" font-size:20px; color:#000">
						<td>Theater ID</td>
						<td>Theater Type</td>
						<td>Patient's Name</td>
						<td>Doctor's Name</td>
						<td>Intime</td>
						<td>Outtime</td>							
						<td>Date</td>							
					</tr>
					<?php
					//data include to rows
					include( 'db_con.php' );
					$sql = "SELECT Th_ID,Th_type,Pa_name,Th_Doc_ID,Intime,Outtime,`Date` FROM regsystem.theater";
					
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							?>
					<tr>
						<td>
							<?php echo($row['Th_ID'])?>
						</td>
						<td>
							<?php echo($row['Th_type'])?>
						</td>
						<td>
							<?php echo($row['Pa_name'])?>
						</td>
						<td>
							<?php echo($row['Th_Doc_ID'])?>
						</td>
						<td>
							<?php echo($row['Intime'])?>
						</td>
						<td>
							<?php echo($row['Outtime'])?>
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
					
						<?php } else {} ?>
	
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
