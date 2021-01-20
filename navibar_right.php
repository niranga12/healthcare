
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="my nav navbar-nav side-nav"  >
		<li class="" style="" >
			<a href="index1.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
		</li>
		
		<?php
			if(isset($_SESSION['uname'])){ ?>
				<li><a name="regem" id="regem" href="#" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Employee Section <i class="fa fa-fw fa-caret-down"></i></a>
			<ul id="demo1" class="collapse">
			
			<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
				
				<li>
					<a href="Employee_reg.php">Register Employee</a>
				</li>
			<?php	} else {} ?>
				
				<li>
			<a href="Employee_view.php"><i class="fa fa-male"></i> List of Registered Employees</a>
		</li>
			</ul>
		</li>
		<?php	} else
				
			{}
		?>
			
			<?php
			if(isset($_SESSION['uname'])){ ?>
				<li><a name="regpa" id="regpa" href="#" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Patient Section <i class="fa fa-fw fa-caret-down"></i></a>
			<ul id="demo2" class="collapse">
							<?php
			if($_SESSION['utype']=="Receptionist"){ ?>
				<li>
					<a href="Patient_reg.php">Register Patient</a>
				</li>
					<?php	} else
				
			{}
		?>
				
				<li>
			<a href="Patient_view_table.php"><i class="fa fa-male"></i> List of Registered Patients</a>
		</li>
			</ul>
		</li>
		<?php	} else
				
			{}
		?>
		
		
		<?php
			if(isset($_SESSION['uname'])){ ?>
				<li><a name="repots" id="repots" href="#" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-arrows-v"></i>Reports & invoices <i class="fa fa-fw fa-caret-down"></i></a>
			<ul id="demo3" class="collapse">
				
				<li>
					<a href="Reports.php">Create Reports</a>
				</li>
				<li>
			<a href="Report_view.php">List of Reports</a>
		</li>
			</ul>
		</li>
		<?php	} else
				
			{}
		?>
		
		
		<?php
			if(isset($_SESSION['uname'])){ ?>
				<li><a name="theater" id="theater" href="Theater.php" ><i class="fa fa-fw fa-arrows-v"></i>Theater</a>

		</li>
		<?php	} else
				
			{}
		?>
		
		<?php
			if(isset($_SESSION['uname'])){ ?>
				<li><a name="room" id="room" href="Room.php"><i class="fa fa-fw fa-arrows-v"></i>Room Shedule</a>
		
		</li>
		<?php	} else
				
			{}
		?>
	
			<li>
			<a href="index1.php"><i class="fa fa-fw fa-bar-chart-o"></i> About Us</a>
		</li>
	
					
		<li>
		<?php if(isset($_SESSION['uname'])){?>
	<a href="logout.php"><i class="fa fa-user"></i> Log Out</a>
		</li>
	<?php } 
			else{?>
				<a href="login.php"><i class="fa fa-user"></i> Log in</a>
		</li>
			<?php }
			?>
				<div id="clockbox" style="color:lime;">
                                <script type="text/javascript" style=" margin-top:">
                                    tday = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                                            tmonth = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                            function GetClock() {
                                            var d = new Date();
                                                    var nday = d.getDay(), nmonth = d.getMonth(), ndate = d.getDate(), nyear = d.getYear();
                                                    if (nyear < 1000)
                                                    nyear += 1900;
                                                    var nhour = d.getHours(), nmin = d.getMinutes(), nsec = d.getSeconds(), ap;
                                                    if (nhour == 0) {
                                            ap = " AM";
                                                    nhour = 12;
                                            }
                                            else if (nhour < 12) {
                                            ap = " AM";
                                            }
                                            else if (nhour == 12) {
                                            ap = " PM";
                                            }
                                            else if (nhour > 12) {
                                            ap = " PM";
                                                    nhour -= 12;
                                            }

                                            if (nmin <= 9)
                                                    nmin = "0" + nmin;
                                                    if (nsec <= 9)
                                                    nsec = "0" + nsec;
                                                    document.getElementById('clockbox').innerHTML = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + ", " + nyear + " " + nhour + ":" + nmin + ":" + nsec + ap + "";
                                            }

                                    window.onload = function () {
                                    GetClock();
                                            setInterval(GetClock, 1000);
                                    }
                                </script>
                                
                                
	</div>
                     <p style="font-size: 15px; color: antiquewhite; margin-top: 10px;">
			<i class="fa fa-fw fa-bar-chart-o"></i> Developed by Niranga
		</p>         
                             
                               
		<!--<li>
			<h1 style="color:blue" >Contact Us</h1>
			<p style="color: white; font-size: 20px;">Call Now</p>
			<p style="color: red; font-size: 36px;">037-1112223</p>
			<p style="color: white; font-size: 20px;">Email</p>
			<p style="color: red; font-size: 20px;">healthcare@gmail.com</p>
	  </li>-->
	</ul>
	
	
</div>