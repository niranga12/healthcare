<?php session_start(); ?>
<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

	<?php
	
	//check whether user loged in
	if ( isset( $_SESSION[ 'uname' ] ) ) {
		?>
	<p style="color: white; font-size: 24px; line-height: 48px;">
		<?php echo"Welcome to Admin Panel in HealthCare Hospital"?>
	</p>
	
	
	<?php
	} else {
		?>
	<p style="color: white; font-size: 24px; line-height: 48px;">
		<?php echo"Welcome to HealthCare Hospital"?>
	</p>

	<?php
	}

	?>

</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
	
	<?php
			if(isset($_SESSION['uname'])){ ?>
				<li><a name="appointment" id="appointment" href="appointment_view.php" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-arrows-v"></i> View Appointment</a>
		</li>
		<?php	} else
				
			{}
		?>

	<li class="dropdown">
	<?php
	if(isset($_SESSION['uname'])){?>
		
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 
				echo("".$_SESSION['uname']);
				?> <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li>
				<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="Logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
			</li>
		</ul>

	<?php  }
	
	 else {?>
		
		<a href="Login.php"><i class="fa fa-user"></i> Log In</a>

	<?php  } ?>
	
	
	
		
	</li>
	
	
</ul>