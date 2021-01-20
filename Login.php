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

		<div id="page-wrapper" style=" background-image:url(images/bb.jpg); position: fixed; background-repeat: no-repeat;">

			<div class="container-fluid">

				<p style="font-size:50px; color:#F00; margin-left:100px; margin-top:70px;">Welcome to Health Care Hospital </p>
				<form method="post" onsubmit="return validateForm()" class="form-horizontal" style="width:700px; height:400px; margin-top:100px;" action="logic/logic_login.php">
					<fieldset>

						<!-- Form Name -->
						<p style="text-align: left; margin-left: 100px; font-size: 18px; font-weight: bold; font-style: italic;">Log in</p>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="txtuname">User Name <i class="glyphicon glyphicon-user"></i></label>
							<div class="col-md-5">

								<input id="txtuname" name="txtuname" placeholder="" class="form-control input-md" type="text">
								<p id="errorFName"></p>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="txtpass">Passowrd <i class="glyphicon glyphicon-lock"></i></label>
							<div class="col-md-5">
								<input id="txtpass" name="txtpass" placeholder="" class="form-control input-md" type="password">
							<p id="errorLName"></p>
							
							</div>
						</div>

						<!-- Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="btnlog"></label>
							<div class="col-md-4">
								<button id="btnlog" name="btnlog" class="btn btn-primary" type="submit">Log In</button>
								<button id="btnlog" name="btnlog" class="btn btn-warning" type="reset">Cancel</button><br/>
								
							</div>
						</div>

					</fieldset>
				</form>
			</div>

		</div>


	</div>
<script type="text/javascript">
//create function to validate form
	function validateForm(){
		//clear errors lables
		document.getElementById("errorFName").innerHTML="";
		document.getElementById("errorLName").innerHTML="";
		
		var isvalid=true;
		//Get form input data
		
		var uname=document.getElementById("txtuname").value;
		var pass=document.getElementById("txtpass").value;
		
				
 if(uname=="" && pass===""){
		alert("Enter valid User Name and Password");
	 isvalid=false;}
	
	if(uname==="" && pass!==""){
		alert("Enter Valid User Name");
		isvalid=false;
		}
	if(pass==="" && uname!==""){
		alert("Enter Valid Passoword");
		isvalid=false;
		}

		return isvalid;
	}
</script>
	
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="../Full site/js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../Full site/js/bootstrap.min.js"></script>

	<!-- Morris Charts JavaScript -->
	<script src="../Full site/js/plugins/morris/raphael.min.js"></script>
	<script src="../Full site/js/plugins/morris/morris.min.js"></script>
	<script src="../Full site/js/plugins/morris/morris-data.js"></script>

</body>

</html>