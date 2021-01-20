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
			include './navibar_top.php';
			include './navibar_right.php';
			?>


			<!-- /.navbar-collapse -->
		</nav>

		<div id="page-wrapper">

			<div class="container-fluid">

				<form class="form-horizontal">

					<!-- Button -->
					<div class="form-group" style="margin-top: 20px;">

						<label class="col-md-4 control-label" for="btn_pa_admit">Please Select a Form</label>
						<div class="col-md-6">
							<button id="btn_pa_admit" name="btn_pa_admit" class="btn btn-primary">Patient Admit Form</button>
							<button id="btn_me_re" name="btn_me_re" class="btn btn-success">Medical Report</button>

							<?php
							if ( $_SESSION[ 'utype' ] == "Receptionist" ) {
								?>
							<button id="btninvoice" name="btninvoice" class="btn btn-warning">Invoices</button>
							<?php	} else {}?>

						</div>
					</div>
				</form>

				<!--Patient admision Form-->
				<?php
				if ( isset( $_GET[ 'btn_pa_admit' ] ) ) {
					?>

				<?php
				include 'db_con.php';
				//values update kirimata data td thula pennimata
				$adid = '';
				$pname = '';
				$Roomid = '';
				$Addate = '';
				$gname = '';
				$gcno = '';
				$gaddress = '';
				$disstatus = '';
				$disdate = '';

				//if url has parameter id

				if ( isset( $_GET[ 'id' ] ) ) {

					$sql = "SELECT Ad_ID,Pa_name,Room_ID,Admit_Date,Discharge_Date,Guardian_Name,Guardian_C_No,Guardian_Address,`Status` FROM regsystem.patient_admission WHERE `Ad_ID`='" . $_GET[ 'id' ] . "';";
					$result = $conn->query( $sql );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							$adid = $row[ 'Ad_ID' ];
							$pname = $row[ 'Pa_name' ];
							$Roomid = $row[ 'Room_ID' ];
							$Addate = $row[ 'Admit_Date' ];
							$gname = $row[ 'Guardian_Name' ];
							$gcno = $row[ 'Guardian_C_No' ];
							$gaddress = $row[ 'Guardian_Address' ];
							$disstatus = $row[ 'Status' ];
							$disdate = $row[ 'Discharge_Date' ];

						}
					} else {
						echo "0 results";
					}
					$conn->close();
				}
				?>
				<div class="col-md-8" style="position: absolute; margin-top: 125px; ; margin-left: 600px;">
					<p style="font-weight: bold; color: green; font-size: 20px;">Available Rooms</p>
					<select style="width: 100px;" id="avrooms" name="avrooms" class="form-control">

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

				<div style="width: 600px; height: auto; border: solid; margin-left: 200px;">
					<!--form1 div-->
					<div>
						<h2 style=" color: red; text-align:center">Patient Admit Form</h2>
					</div>

					<form class="form-horizontal" method="post" action="logic/lo_reg_rep_pa.php" onChange="validateForm()">
						<fieldset>


							<div class="form-group">
								<label class="col-md-4 control-label" for="Ad_ID">Admit ID</label>
								<div class="col-md-4">
									<input id="Ad_ID" disabled name="Ad_ID" value="<?php echo $adid;?>" type="number" placeholder="" class="form-control input-md">

								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Ad_p_name">Patient Name</label>
								<div class="col-md-4">
									<input id="Ad_p_name" name="Ad_p_name" type="text" value="<?php echo $pname;?>" placeholder="" class="form-control input-md">
									<p id="errorPName"></p>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Ro_ID">Room ID</label>
								<div class="col-md-4">
									<input id="Ro_ID" name="Ro_ID" type="text" value="<?php echo $Roomid;?>" placeholder="" class="form-control input-md">
									<p id="errorRID"></p>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Ad_date">Admit Date</label>
								<div class="col-md-4">
									<input id="Ad_date" name="Ad_date" type="date" value="<?php echo $Addate;?>" placeholder="" class="form-control input-md">
									<p id="erroraddate"></p>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="G_name">Guardian Name</label>
								<div class="col-md-4">
									<input id="G_name" name="G_name" type="text" placeholder="" value="<?php echo $gname;?>" class="form-control input-md">
									<p id="errorgname"></p>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="G_contact">Guardian Contact No</label>
								<div class="col-md-4">
									<input id="G_contact" name="G_contact" type="number" placeholder="" value="<?php echo $gcno;?>" class="form-control input-md">
									<p id="errorgcon"></p>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="G_Address">Guardian Address</label>
								<div class="col-md-4">
									<input id="G_Address" name="G_Address" type="text" value="<?php echo $gaddress;?>" placeholder="" class="form-control input-md">
									<p id="errorgaddress"></p>
								</div>
							</div>

							<!-- Multiple Radios (inline) -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Dis_status">Discharge Status</label>
								<div class="col-md-4">
									<label class="radio-inline" for="Dis_status-0">
      <input type="radio" name="Dis_status"  <?php echo($disstatus==='Yes'? 'checked':'')?> id="Dis_status-0" value="Yes" checked="checked">
      Yes
    </label>
								





									<label class="radio-inline" for="Dis_status-1">
      <input  <?php echo($disstatus==='No'? 'checked':'')?> type="radio" name="Dis_status" id="Dis_status-1" value="No">
      No
    </label>
								





								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Dis_date">Discharge Date</label>
								<div class="col-md-4">
									<input id="Dis_date" name="Dis_date" type="date" placeholder="" value="<?php echo $disdate;?>" class="form-control input-md">

								</div>
							</div>



							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="btnsubmit"></label>
								<div class="col-md-4">

									<?php if ( isset( $_GET[ 'id' ] ) ) {
							?>

									<input type="hidden" name="aid" value="<?php echo($_GET['id'])?>"/>
									<button id="btnupdate" name="btnupdate" class="btn btn-primary">Update</button>

									<?php } else { ?>
									<!-- Button -->
									<button id="btnsubmit" name="btnsubmit" class="btn btn-primary">Submit Form</button>
								</div>
							</div>

							<?php } ?>

						</fieldset>
					</form>
				</div>

				<?php } else {} ?>
				<!--form1 admit-->

				<script type="text/javascript">
					//create function to validate form
					function validateForm() {
						//clear errors lables
						document.getElementById( "errorPName" ).innerHTML = "";
						document.getElementById( "errorRID" ).innerHTML = "";
						document.getElementById( "erroraddate" ).innerHTML = "";
						document.getElementById( "errorgname" ).innerHTML = "";
						document.getElementById( "errorgcon" ).innerHTML = "";
						document.getElementById( "errorgaddress" ).innerHTML = "";

						var isvalid = true;
						//Get form input data

						var pname = document.getElementById( "Ad_p_name" ).value;
						var rid = document.getElementById( "Ro_ID" ).value;
						var addate = document.getElementById( "Ad_date" ).value;
						var gname = document.getElementById( "G_name" ).value;
						var gcon = document.getElementById( "G_contact" ).value;
						var gaddress = document.getElementById( "G_Address" ).value;

						if ( pname === "" ) {
							document.getElementById( "errorPName" ).innerHTML = "Enter patient name";
							document.getElementById( "errorPName" ).style.color = "red";
							isvalid = false;
						}
						if ( rid === "" ) {
							document.getElementById( "errorRID" ).innerHTML = "Enter Room ID";
							document.getElementById( "errorRID" ).style.color = "red";
							isvalid = false;
						}
						if ( addate === "" ) {
							document.getElementById( "erroraddate" ).innerHTML = "Enter Admit date";
							document.getElementById( "erroraddate" ).style.color = "red";
							isvalid = false;
						}
						if ( gname === "" ) {
							document.getElementById( "errorgname" ).innerHTML = "Enter Guardian Name";
							document.getElementById( "errorgname" ).style.color = "red";
							isvalid = false;
						}
						if ( gcon === "" ) {
							document.getElementById( "errorgcon" ).innerHTML = "Enter Guardian Contact No";
							document.getElementById( "errorgcon" ).style.color = "red";
							isvalid = false;
						}
						if ( gaddress === "" ) {
							document.getElementById( "errorgaddress" ).innerHTML = "Enter Gurdian Address";
							document.getElementById( "errorgaddress" ).style.color = "red";
							isvalid = false;
						}
						return isvalid;
					}
				</script>

				<?php
				if ( isset( $_GET[ 'btn_me_re' ] ) ) {
					?>
				<div style="width: 600px; height: auto; border: solid; margin-left: 200px;">
					<!--form1 div-->
					<div>
						<h2 style=" color: red; text-align:center">Medical Report Form</h2>
					</div>
					
					<form class="form-horizontal" method="post" action="logic/lo_reg_me.php">
						<fieldset>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Me_ID">Medical Report ID</label>
								<div class="col-md-4">
									<input id="Me_ID" disabled name="Me_ID" type="number" placeholder="" class="form-control input-md" required="">

								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Me_p_id">Patient ID</label>
								<div class="col-md-4">
									<input id="Me_p_id" name="Me_p_id" type="text" placeholder="" class="form-control input-md" >

								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Doc_name">Doctor's Name</label>
								<div class="col-md-4">
									<input id="Doc_name" name="Doc_name" type="text" placeholder="" class="form-control input-md">
									<p id="errorFName"></p>
								</div>
							</div>

							<!-- Multiple Radios (inline) -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Blood">Blood Pressure</label>
								<div class="col-md-4">
									<label class="radio-inline" for="Blood-0">
      <input type="radio" name="Blood" id="Blood-0" value="Normal" checked="checked">
      Normal
    </label>
								




									<label class="radio-inline" for="Blood-1">
      <input type="radio" name="Blood" id="Blood-1" value="Abnormal">
      Abnormal
    </label>
								




								</div>
							</div>

							<!-- Multiple Radios (inline) -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Heart">Heart Disease</label>
								<div class="col-md-4">
									<label class="radio-inline" for="Heart-0">
      <input type="radio" name="Heart" id="Heart-0" value="Normal" checked="checked">
      Normal
    </label>
								




									<label class="radio-inline" for="Heart-1">
      <input type="radio" name="Heart" id="Heart-1" value="Abnormal">
      Abnormal
    </label>
								




								</div>
							</div>

							<!-- Multiple Radios (inline) -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Liver">Liver Function</label>
								<div class="col-md-4">
									<label class="radio-inline" for="Liver-0">
      <input type="radio" name="Liver" id="Liver-0" value="Normal" checked="checked">
      Normal
    </label>
								




									<label class="radio-inline" for="Liver-1">
      <input type="radio" name="Liver" id="Liver-1" value="Abnormal">
      Abnormal
    </label>
								




								</div>
							</div>

							<!-- Multiple Radios (inline) -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Hiv">HIV Test</label>
								<div class="col-md-4">
									<label class="radio-inline" for="Hiv-0">
      <input type="radio" name="Hiv" id="Hiv-0" value="Positive" checked="checked">
      Positive
    </label>
								




									<label class="radio-inline" for="Hiv-1">
      <input type="radio" name="Hiv" id="Hiv-1" value="Negative">
      Negative
    </label>
								




								</div>
							</div>

							<!-- Select Basic -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Su_level">Sugar Level</label>
								<div class="col-md-4">
									<select id="Su_level" name="Su_level" class="form-control">
										<option value="Low">Low</option>
										<option value="Normal">Normal</option>
										<option value="High">High</option>
									</select>
								</div>
							</div>

							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="btnsubmit"></label>
								<div class="col-md-4">
									<button id="btnsubmit" name="btnsubmit" class="btn btn-primary">Submit Form</button>
								</div>
							</div>

						</fieldset>
					</form>
	

				</div>
				<!--form1 admit-->
				<?php } else {} ?>


				<?php
				if ( isset( $_GET[ 'btninvoice' ] ) ) {

					?>

				<div style="width: 600px; height: auto; border: solid; margin-left: 200px;">
					<!--form1 div-->
					<div style=" line-height: 15px;">
						<h2 style="color: red; text-align:right; margin-right: 50px;">INVOICE</h2>
						<p style="text-align:right; margin-right: 200px;font-weight: bold;">Date:

						</p>

						<div style="position: absolute; margin-top: -80px;">
							<p style="font-weight: bold; margin-left: 10px;">HealthCare Hospital,</p>
							<p style="font-weight: bold; margin-left: 10px;">Colombo 05.</p>
							<p style="font-weight: bold; margin-left: 10px;">Tel: 011-1234567</p>
							<p style="font-weight: bold; margin-left: 10px;">Email:healthcare@gmail.com</p>
						</div>
					</div>

					<form class="form-horizontal" method="post" action="logic/lo_re_invoi.php">
						<fieldset>

							<div class="col-md-3">
								<input style="position: absolute; margin-left:400px; margin-top: -35px;" id="date" name="date" type="date" required="" placeholder="" class="form-control input-md">
							</div>
							<!-- Text input-->
							<div class="form-group" style="margin-top: 60px;">
								<label class="col-md-4 control-label" for="In_ID">Invoice ID</label>
								<div class="col-md-4">
									<input id="In_ID" disabled name="In_ID" type="number" placeholder="" class="form-control input-md">

								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="In_p_name">Patient Name</label>
								<div class="col-md-4">
									<input id="In_p_name" name="In_p_name" type="text" placeholder="" class="form-control input-md" required="">

								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Doc_charge">Doctor Charge  (Rs.)</label>
								<div class="col-md-4">
									<input id="Doc_charge" onchange="Countvalue()" name="Do_ch" type="number" placeholder="" class="form-control input-md" required="">

								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Ro_charge">Room Charge  (Rs.)</label>
								<div class="col-md-4">
									<input id="Ro_charge" name="Ro_ch" onchange="Countvalue()" type="number" placeholder="" class="form-control input-md">

								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="O_charge">Other Charge  (Rs.)</label>
								<div class="col-md-4">
									<input id="Oth_charge" name="Oth_ch" onchange="Countvalue()" type="number" placeholder="" class="form-control input-md">

								</div>
							</div>

							<hr style="display: block;border-color: black; width: 500px;">

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="Net_total">Net total : (Rs.) </label>
								<div class="col-md-4">
									<input disabled id="Net_total" name="Net_total" type="number" placeholder="" class="form-control input-md">

								</div>


								<script type="text/javascript">
									function Countvalue() {
										var docc = parseFloat( document.getElementById( 'Doc_charge' ).value );
										var roomc = parseFloat( document.getElementById( 'Ro_charge' ).value );
										var other = parseFloat( document.getElementById( 'Oth_charge' ).value );


										var result = docc + roomc + other;

										// alert(result);

										document.getElementById( 'Net_total' ).value = result;
										return result;

									}
								</script>


							</div>


							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="btnbill"></label>
								<div class="col-md-8">
									<button id="btnbill" name="btnbill" class="btn btn-primary">Add Bill</button>

									<button id="btnprint" type="reset" name="btnprint" class="btn btn-warning">Print Bill</button>
								</div>
							</div>



						</fieldset>
					</form>



				</div>


				<!--form1 admit-->

				<?php } else { } ?>

			</div>

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