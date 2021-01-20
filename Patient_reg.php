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
<?php
	include 'db_con.php';
	//values update kirimata data td thula pennimata
	$name = '';
	$address = '';
	$gender = '';
	$blood = '';
	$nic='';
	$bdy='';
	$age='';
	$marital='';
	$contact='';
	$email='';
	$reason='';
	
	//if url has parameter id

	if ( isset( $_GET[ 'id' ] ) ) {

		$sql = "SELECT `patient_ID`,`Full_Name`,Address,Gender,`NIC_No`,Birthday,Age,`Marital_Status`,`Blood_Type`,`Contact_No`,Email, Reason FROM patient_list WHERE `patient_ID`='" . $_GET[ 'id' ] . "';";
		$result = $conn->query( $sql );

		if ( $result->num_rows > 0 ) {
			// output data of each row
			while ( $row = $result->fetch_assoc() ) {
				$name = $row[ 'Full_Name' ];
				$address = $row[ 'Address' ];
				$gender = $row[ 'Gender' ];
				$blood= $row['Blood_Type'];
				$nic= $row['NIC_No'];
				$bdy=$row['Birthday'];
				$age=$row['Age'];
				$marital=$row['Marital_Status'];
				$contact=$row['Contact_No'];
				$email=$row['Email'];
				$reason=$row['Reason'];

			}
		} else {
			echo "0 results";
		}
		$conn->close();
	}
	?>
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

        <div id="page-wrapper" style="background-image:url(); background-repeat:no-repeat;">
	<div class="container-fluid" >
		<form class="form-horizontal" method="POST" action="logic/logic_patientreg.php">
			<fieldset>

				<!-- Form Name -->
				<legend style="color:#F00; margin-left:200px;">
					<h1>Patient Registration Form</h1>
				</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="name">Full Name</label>
					<div class="col-md-4">
						<input id="name" name="name" type="text" value="<?php echo $name;?>" placeholder="Enter Your Full Name" class="form-control input-md" required="">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="address">Address</label>
					<div class="col-md-4">
						<input id="address" name="address" value="<?php echo $address;?>" type="text" placeholder="Enter Your Address" class="form-control input-md" required="">

					</div>
				</div>

				<!-- Multiple Radios -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="gender">Gender</label>
					<div class="col-md-4">
						<div class="radio">
							<label for="gender-0">
      <input type="radio" name="gender" id="gender-0" value="Male" checked="checked" <?php echo($gender==='Male'? 'checked':'')?>></input>
      Male
    </label>
						




						</div>
						<div class="radio">
							<label for="gender-1">
      <input type="radio" name="gender" id="gender-1" value="Female" <?php echo($gender==='Female'? 'checked':'')?>>
      Female
    </label>
						

						</div>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="nic">NIC No</label>
					<div class="col-md-4">
						<input id="nic" name="nic" type="text" value="<?php echo $nic;?>" placeholder="National Identity Card Number" class="form-control input-md" required="">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="bday">Birthday</label>
					<div class="col-md-4">
						<input id="bday" value="<?php echo $bdy;?>" name="bday" type="date" placeholder="Enter your birthday" class="form-control input-md" required="">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="age">Age</label>
					<div class="col-md-4">
						<input id="age" value="<?php echo $age;?>" name="age" type="number" placeholder="" class="form-control input-md" required="">

					</div>
				</div>

				<!-- Multiple Radios -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="marital">Marital Status</label>
					<div class="col-md-4">
						<div class="radio">
							<label for="marital-0">
      <input type="radio" name="marital" id="marital-0" value="Married" checked="checked" <?php echo($marital==='Married'? 'checked':'')?>>
      Married
    </label>
						



						</div>
						<div class="radio">
							<label for="marital-1">
      <input type="radio" name="marital" id="marital-1" value="Unmarried" <?php echo($marital==='Unmarried'? 'checked':'')?>>
      Unmarried
    </label>
						


						</div>
						<div class="radio">
							<label for="marital-2">
      <input type="radio" name="marital" id="marital-2" value="Divorce" <?php echo($marital==='Divorce'? 'checked':'')?>>
      Divorce
    </label>
						

						</div>
					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="selectbasic">Blood Type</label>
					<div class="col-md-4">
						<select id="selectbasic" name="blood" class="form-control">
							<option <?php echo $blood ==='A+' ? 'selected' : ''; ?> checked="checked" value="A+">A+</option>
							<option <?php echo $blood ==='A-' ? 'selected' : ''; ?> checked="checked" value="A-">A-</option>
							<option <?php echo $blood ==='B+' ? 'selected' : ''; ?> checked="checked" value="B+">B+</option>
							<option <?php echo $blood ==='B-' ? 'selected' : ''; ?> checked="checked" value="B-">B-</option>
							<option <?php echo $blood ==='AB+' ? 'selected' : ''; ?> checked="checked" value="AB+">AB+</option>
							<option <?php echo $blood ==='AB-' ? 'selected' : ''; ?> checked="checked" value="AB-">AB-</option>
							<option <?php echo $blood ==='O+' ? 'selected' : ''; ?> checked="checked" value="O+">O+</option>
							<option <?php echo $blood ==='O-' ? 'selected' : ''; ?> checked="checked" value="O-">O-</option>
						</select>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="email">Contact No</label>
					<div class="col-md-4">
						<input id="email" value="<?php echo $contact;?>" name="contact" type="number" placeholder="Enter Contact Number" class="form-control input-md" required="">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="email">Email</label>
					<div class="col-md-4">
						<input id="email" name="email" value="<?php echo $email;?>" type="email" placeholder="Enter Your Email" class="form-control input-md">

					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="Reason">Reason</label>
					<div class="col-md-4">
						<textarea class="form-control" id="reason" name="reason" required><?php echo $reason;?></textarea>
					</div>
				</div>

				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="regbtn"></label>
					<div class="col-md-4">
						<?php
						//if url has parameter'id'
						//Show the update button else show register button
						if ( isset( $_GET[ 'id' ] ) ) {
							?>
						<input type="hidden" name="pid" value="<?php echo($_GET['id'])?>"/>
						<button id="btnupdate" name="btnupdate" class="btn btn-warning" type="submit">Update</button>
						

						<?php } else{?>
						<button id="regbtn" name="regbtn" class="btn btn-primary" type="submit">Register</button>
						<?php }?>
						
						

					</div>
				</div>
				
				<div class="date"> 
					<label> </label>
				</div>

			</fieldset>
		</form>
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
