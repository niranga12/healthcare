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
	include( 'db_con.php' );
	//values update kirimata data td thula pennimata
	$Em_Type = '';
	$Fname = '';
	$Address = '';
	$Gender = '';
	$Bday = '';
	$Marital = '';
	$Age = '';
	$Nic = '';
	$Cno = '';
	$Email = '';
	$Username = '';
	$Password = '';

	//if url has parameter id
	if ( isset( $_GET[ 'id' ] ) ) {
		$sql = "SELECT `Em_ID`, `Em_Type`, `Full_Name`, `Address`, `Gender`, `NIC`, `Birthday`, `Age`, `Marital_Status`, `Contact_No`, `Email`, `User_Name`, `Password` FROM`regsystem`.`employee` WHERE `Em_ID`='" . $_GET[ 'id' ] . "';";
		$result = $conn->query( $sql );

		if ( $result->num_rows > 0 ) {
			// output data of each row
			while ( $row = $result->fetch_assoc() ) {
				$Em_Type = $row['Em_Type'];
				$Fname = $row['Full_Name'];
				$Address = $row['Address'];
				$Gender = $row['Gender'];
				$Bday = $row['Birthday'];
				$Marital = $row['Marital_Status'];
				$Age = $row['Age'];
				$Nic = $row['NIC'];
				$Cno = $row['Contact_No'];
				$Email = $row['Email'];
				$Username = $row['User_Name'];
				$Password = $row['Password'];

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

        <div id="page-wrapper" >
	<div class="container-fluid">
		<form action="logic/Logic_EmployeeReg.php" method="post" class="form-horizontal">
		<fieldset>

			<!-- Form Name -->
			<legend style="color:#F00; margin-left:200px;">
				<h1>Employee Registration Form</h1>
			</legend>

			<!-- Select Basic -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="Emtype">Employee Type</label>
				<div class="col-md-2">
					<select id="Emtype" name="Emtype" class="form-control">
						<option value="Doctor" <?php echo $Em_Type ==='Doctor' ? 'selected' : ''; ?>>Doctor</option>
						<option value="Nurse" <?php echo $Em_Type ==='Nurse' ? 'selected' : ''; ?>>Nurse</option>
						<option value="Receptionist" <?php echo $Em_Type ==='Receptionist' ? 'selected' : ''; ?>>Receptionist</option>
					</select>
				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="Fname">Full Name</label>
				<div class="col-md-2">
					<input id="Fname" name="Fname" value="<?php echo $Fname;?>" type="text" placeholder="" class="form-control input-md" required="">

				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="addres">Address</label>
				<div class="col-md-2">
					<input id="addres" name="Address" type="text" value="<?php echo $Address;?>" placeholder="" class="form-control input-md" required="">

				</div>
			</div>

			<!-- Multiple Radios -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="Gender">Gender</label>
				<div class="col-md-4">
					<div class="radio">
						<label for="Gender-0">
      <input type="radio" name="Gender" id="Gender-0"  value="Male" <?php echo($Gender==='Male'? 'checked':'')?> checked="checked">
      Male
    </label>
					



					</div>
					<div class="radio">
						<label for="Gender-1">
      <input type="radio" name="Gender" id="Gender-1" value="Female" <?php echo($Gender==='Female'? 'checked':'')?>>
      Female
    </label>
					



					</div>
				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="bdy">Birthday</label>
				<div class="col-md-2">
					<input id="bdy" name="Bdy" type="date" value="<?php echo $Bday;?>" placeholder="" class="form-control input-md" required="">

				</div>
			</div>

			<!-- Multiple Radios (inline) -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="marital">Marital Status</label>
				<div class="col-md-4">
					<label class="radio-inline" for="marital-0">
      <input type="radio" name="Marital" id="marital-0" value="Married" <?php echo($Marital==='Married'? 'checked':'')?> checked="checked">
      Married
    </label>
				



					<label class="radio-inline" for="marital-1">
      <input type="radio" name="Marital" id="marital-1" value="Unmarried" <?php echo($Marital==='Unmarried'? 'checked':'')?>>
      Unmarried
    </label>
				



					<label class="radio-inline" for="marital-2">
      <input type="radio" name="Marital" id="marital-2" value="Divource" <?php echo($Marital==='Divource'? 'checked':'')?>>
      Divource
    </label>
				



				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="age">Age</label>
				<div class="col-md-2">
					<input id="age" name="Age" type="number" value="<?php echo $Age;?>" placeholder="" class="form-control input-md" required="">

				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="nic">NIC No</label>
				<div class="col-md-2">
					<input id="nic" name="Nic" type="text" value="<?php echo $Nic;?>" placeholder="" class="form-control input-md" required="">

				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="cno">Contact No</label>
				<div class="col-md-2">
					<input name="Cno" type="number" required="" class="form-control input-md" id="cno" placeholder="" value="<?php echo $Cno;?>">

				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="email">Email</label>
				<div class="col-md-2">
					<input id="email" name="Email" value="<?php echo $Email;?>" type="email" placeholder="" class="form-control input-md">

				</div>
			</div>
			
						<div class="form-group">
				<label class="col-md-4 control-label" for="Username">User Name</label>
				<div class="col-md-2">
					<input id="email" name="Username" value="<?php echo $Username;?>" type="text" placeholder="" class="form-control input-md">

				</div>
			</div>
			
						<div class="form-group">
				<label class="col-md-4 control-label" for="Password">Password</label>
				<div class="col-md-2">
					<input id="Password" name="Password" value="<?php echo $Password;?>" type="password" placeholder="" class="form-control input-md">

				</div>
			</div>

			<!-- Button -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="btnreg"></label>
				<div class="col-md-4">
				
				<?php
						//if url has parameter'id'
						//Show the update button else show register button
					if ( isset( $_GET[ 'id' ] ) ) {
					?>
					<input type="hidden" name="Eid" value="<?php echo($_GET['id'])?>"/>
					<button id="btnupdate" name="btnupdate" class="btn btn-warning" type="submit">Update</button>
					<?php } else {?>
					
					<button id="btnreg" name="btnreg" class="btn btn-primary">Register</button>
					<?php }?>
				</div>
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
