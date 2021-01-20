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
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/sb-admin.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="css/plugins/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link href="css/custom.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		#h1 {
			font-family: Aclonica;
			color: red;
			font-size: 60px;
			font-style: normal;
			font-variant: small-caps;
			font-weight: 100;
			line-height: 49px;
		}
		
		#h2 {
			font-size: 25px;
			color: blue;
			font-weight: 500;
			line-height: 15.4px;
		}
	</style>
</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<?php
			include './navibar_top.php';
			include './navibar_right.php';
			?>

			<!-- /.navbar-collapse -->
		</nav>

		<div id="page-wrapper" style="background-image:url(images/); background-repeat: no-repeat; width: 1120px; height:1000px; background-color:white">
			<img src="images/p1.jpg" width="650" height="620" style="position: absolute; margin-left: 310px;">
			<div class="container-fluid">

				<section id="intro" class="intro">
					<div class="intro-content">
						<div class="container">
							<div class="row" style="position: absolute;">
								<div style="width: 700px; margin: 0px;">
									<p id="h1">HealthCare Hospital <i class="fa fa-hospital-o" aria-hidden="true"></i>
									</p>
								</div>

								<?php
								if ( isset( $_SESSION[ 'uname' ] ) ) {
									?>
								<div class="col-md-8" style="position: absolute; margin-top: 400px; margin-left: 800px;">
									<p style="font-weight: bold; color: green; font-size: 20px;">Available Rooms Lists</p>
									<select style="width: 230px;" id="avrooms" name="avrooms" class="form-control">

										<?php
										include( 'db_con.php' );



										$sql = "SELECT R_ID FROM room where R_ID Not IN (select Room_ID from patient_admission where Status='No');";



										$result = $conn->query( $sql );

										if ( $result->num_rows > 0 ) {
											// output data of each row
											while ( $row = $result->fetch_assoc() ) {
												?>

										<option checked="checked" value="">
											<?php echo $row['R_ID']?>
										</option>


										<?php
										}
										} else {
											echo "0 result";
										}
										$conn->close();
										?>
									</select>


								</div>

								<p id="message" style="width: 300px; position: absolute; margin-left: 820px; margin-top: -65px; font-size: 20px; color: red;"></p>
								<div class="input-group" style="width: 250px; position: absolute; margin-left: 820px; margin-top: -30px;">

									<input placeholder="Enter Name" id="input" class="form-control">
									<span class="input-group-btn">
													<button onClick="myFunction()" class="btn btn-primary">Search</button>
												</span>
								

								</div>


								<script>
									function myFunction() {
										var message, x;
										message = document.getElementById( "message" );
										message.innerHTML = "";
										x = document.getElementById( "input" ).value;
										try {
											if ( x == "" ) throw "empty";
											if ( x = Number( x ) ) throw "cannot enter numbers";
											x = Number( x );
										} catch ( err ) {
											message.innerHTML = "Input is " + err;
										}
									}
								</script>



								<div class="col-md-5" style="margin-left: 800px; margin-top: 20px; position: absolute">
									<div class="panel panel-info">
										<div class="panel-heading">
											<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Quantity of work</h3>
										</div>
										<div class="panel-body">
											<div class="list-group">
												<a href="#" class="list-group-item">
                                       
                                        <i class="fa fa-fw fa-calendar"></i> Available Rooms 
                                        	<?php
							include( 'db_con.php' );

							

							$sql = "SELECT count(R_ID) FROM room where R_ID Not IN (select Room_ID from patient_admission where Status='No');";
							


							$result=$conn->query($sql);
								
								if ( $result->num_rows > 0 ) {
									// output data of each row
									while ( $row = $result->fetch_assoc() ) {
									?>

							 <span class="badge"><?php echo $row['count(R_ID)']?></span>


								<?php
								}
								} else {
echo "0 result";
								}
								$conn->close();
								?>
						
                                        
                                    </a>

											

												<a href="#" class="list-group-item">
                                       
                                        <i class="fa fa-fw fa-calendar"></i> Doctors  
                                        	<?php
								include 'db_con.php';
								//values update kirimata data td thula pennimata
								$doclist ='';


								$sql = "SELECT count(Em_ID) FROM employee WHERE `Em_Type`='Doctor';";
								$result = $conn->query( $sql );

								
								if ( $result->num_rows > 0 ) {
									// output data of each row
									while ( $row = $result->fetch_assoc() ) {
									?>

							 <span class="badge"><?php echo $row['count(Em_ID)']?></span>


								<?php
								}
								} else {
echo "0 result";
								}
								$conn->close();
								?>
						
                                        
                                    </a>

											

												<a href="#" class="list-group-item">
                                       
                                        <i class="fa fa-fw fa-calendar"></i> Nurses  
                                        	<?php
								include 'db_con.php';
								//values update kirimata data td thula pennimata
								$doclist ='';


								$sql = "SELECT count(Em_ID) FROM employee WHERE `Em_Type`='Nurse';";
								$result = $conn->query( $sql );

								
								if ( $result->num_rows > 0 ) {
									// output data of each row
									while ( $row = $result->fetch_assoc() ) {
									?>

							 <span class="badge"><?php echo $row['count(Em_ID)']?></span>


								<?php
								}
								} else {
echo "0 result";
								}
								$conn->close();
								?>
						
                                        
                                    </a>

											

												<a href="#" class="list-group-item">
                                       
                                        <i class="fa fa-fw fa-calendar"></i> Receptionists 
                                        	<?php
								include 'db_con.php';


								$sql = "SELECT count(Em_ID) FROM employee WHERE `Em_Type`='Receptionist';";
								$result = $conn->query( $sql );

								
								if ( $result->num_rows > 0 ) {
									// output data of each row
									while ( $row = $result->fetch_assoc() ) {
									?>

							 <span class="badge"><?php echo $row['count(Em_ID)']?></span>


								<?php
								}
								} else {
echo "0 result";
								}
								$conn->close();
								?>
						
                                        
                                    </a>

											

												<a href="#" class="list-group-item">
                                       
                                        <i class="fa fa-fw fa-calendar"></i> Patients  
                                        	<?php
								include 'db_con.php';


								$sql = "SELECT count(patient_ID) FROM regsystem.patient_list";
								$result = $conn->query( $sql );

								
								if ( $result->num_rows > 0 ) {
									// output data of each row
									while ( $row = $result->fetch_assoc() ) {
									?>

							 <span class="badge"><?php echo $row['count(patient_ID)']?></span>


								<?php
								}
								} else {
echo "0 result";
								}
								$conn->close();
								?>
						
                                        
                                    </a>

											


												<a href="#" class="list-group-item">
                                       
                                        <i class="fa fa-fw fa-calendar"></i> Appointments
                                        	<?php
								include 'db_con.php';


								$sql = "SELECT count(Cal_ID) FROM regsystem.appointment;";
								$result = $conn->query( $sql );

								
								if ( $result->num_rows > 0 ) {
									// output data of each row
									while ( $row = $result->fetch_assoc() ) {
									?>

							 <span class="badge"><?php echo $row['count(Cal_ID)']?></span>


								<?php
								}
								} else {
echo "0 result";
								}
								$conn->close();
								?>
						
                                        
                                    </a>

											
											</div>
											<div class="text-right">
												<a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
											</div>
										</div>
									</div>
								</div>
								<?php
								} else

								{}
								?>

								<div>
									<P id="h2">Provide best quality healthcare for you <i class="fa fa-stethoscope" aria-hidden="true"></i>
									</p>
								</div>


								<!--Apointment form-->
								<?php
								include 'db_con.php';
								//values update kirimata data td thula pennimata
								$doclist = '';


								$sql = "SELECT Full_Name FROM employee WHERE `Em_Type`='Doctor';";
								$result = $conn->query( $sql );

								?>
								<?php
								if ( isset( $_SESSION[ 'uname' ] ) ) {
									if ( $_SESSION[ 'utype' ] == "Receptionist" ) {
										?>

								<div>
									<form class="form-horizontal" style="width: 500px; height: 380px; border: groove;" method="post" action="logic/logic_appointment.php">

										<!-- Form Name -->
										<legend>Online Appointment (E-Channeling)</legend>


										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="txtcaller">Caller Full Name</label>
											<div class="col-md-4">
												<input id="txtcaller" name="Caller" type="text" placeholder="" class="form-control input-md" required="">

											</div>
										</div>

										<!-- Select Basic -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="docterlist">Channel a Doctor</label>
											<div class="col-md-4">
												<select id="docterlist" name="docterlist" class="form-control">
													<?php
													if ( $result->num_rows > 0 ) {
														// output data of each row
														while ( $row = $result->fetch_assoc() ) {
															$doclist = $row[ 'Full_Name' ];
															?>

													<option checked="checked" value="<?php echo $doclist;?>">
														<?php echo $doclist;?>
													</option>


													<?php
													}
													} else {

													}
													$conn->close();
													?>
													<option checked="checked" value="None">
														Don't Know
													</option>

												</select>

											</div>
										</div>

										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="Age">Age</label>
											<div class="col-md-4">
												<input id="Age" name="Age" type="number" placeholder="" class="form-control input-md" required="">

											</div>
										</div>

										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="txtaddress">Address</label>
											<div class="col-md-4">
												<input id="txtaddress" name="address" type="text" placeholder="" class="form-control input-md" required="">

											</div>
										</div>

										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="Contact">Contact No</label>
											<div class="col-md-4">
												<input id="Contact" name="Contact" type="number" placeholder="" class="form-control input-md" required="">
											</div>



										</div>


										<div>
											<label class="col-md-4 control-label" for="date">Date</label>
											<div class="col-md-4">
												<input id="date" name="date" type="date" placeholder="" class="form-control input-md" required="">
											</div>
										</div>

										<div style="position: relative;margin-top: 60px; margin-left: 205px;">
											<button class="btn-primary" style="border-radius: 5px;">Submit</button>

										</div>


									</form>
								</div>

								<?php
								} else

								{}
								} else

								{}
								?>
							</div>
				</section>

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