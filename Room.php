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

                            <label class="col-md-4 control-label" for="btn_cre_ro">Please Select a Form</label>
                            <div class="col-md-6">
                                <button id="btn_cre_ro" name="btn_cre_ro" class="btn btn-primary">Create a Room</button>
                                <button id="btn_vie_ro" name="btn_vie_ro" class="btn btn-success">View Room details</button>

                            </div>

                        </div>
                    </form>

                    <!--Patient admision Form-->
                    <?php
                    if (isset($_GET['btn_cre_ro'])) {
                        ?>
                        <div style="width: 600px; height: auto; border: solid; margin-left: 200px;">
                            <!--form1 div-->
                            <div>
                                <h2 style=" color: red; text-align:center">Create a Room</h2>
                            </div>
                            

                            <form class="form-horizontal" method="post" action="logic/logic_room.php">
                                <fieldset>

                                    <!-- Text input-->
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label class="col-md-4 control-label" for="R_ID">Room ID</label>
                                        <div class="col-md-4">
                                            <input id="R_ID" name="R_ID" type="text" placeholder="" class="form-control input-md">

                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="R_head">Room Head Name</label>
                                        <div class="col-md-4">
                                            <input id="R_head" name="R_head" type="text" placeholder="" class="form-control input-md">
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="btncreate"></label>
                                        <div class="col-md-8">
                                            <button id="btncreate" onclick="create()" name="btncreate" class="btn btn-primary">Create</button>

                                        </div>
                                    </div>

                                    </div>


                                    <!--form1 admit-->
                                <?php } else {
                                    
                                } ?>

<?php
if (isset($_GET['btn_vie_ro'])) {
    ?>

                                    <div>


                                        <div class="row" style="float: left">
                                            <div class="col-md-6">
                                                <div style="">
                                                    <h2 style="color:red; text-align: center;">List of Available Rooms</h2>
                                                </div>


                                                <table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px; width: 500px;">
                                                    <tr style=" font-size:20px; color:#000">
                                                        <td>Room ID</td>
                                                        <td>Room Head</td>
                                                    </tr>
                                                    <?php
                                                    //Availables rooms withrak ganna query eka
                                                    include( 'db_con.php' );
                                                    $sql = "SELECT * FROM regsystem.room where R_ID Not IN (select Room_ID from regsystem.patient_admission where Status='No');;";

                                                    /* ookkoma rooms ganna query eka
                                                      $sql = "SELECT R_ID,R_Head,R_P_Name FROM regsystem.room;";
                                                     */

                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo($row['R_ID']) ?>
                                                                </td>
                                                                <td>
            <?php echo($row['R_Head']) ?>
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
                                            </div>
                                            <div class="col-md-6">
                                                <div style="">
                                                    <h2 style="color:red;text-align: center;">List of All Rooms</h2>
                                                </div>

                                                <table class="table table-hover table table-striped" border="1" cellpadding="1" style="margin-top:50px;width: 500px; ">
                                                    <tr style=" font-size:20px; color:#000">
                                                        <td>Room ID</td>
                                                        <td>Room Head</td>
                                                    </tr>
                                                    <?php
                                                    //Availables rooms withrak ganna query eka
                                                    include( 'db_con.php' );


                                                    $sql = "SELECT R_ID,R_Head,R_P_Name FROM regsystem.room;";

                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                            <tr>
                                                                <td>
            <?php echo($row['R_ID']) ?>
                                                                </td>
                                                                <td>
            <?php echo($row['R_Head']) ?>
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
                                            </div>
                                        </div>
                                    </div>
<?php } else {
    
} ?>

                                </div>

                                </div>


                                </div>
                                <!-- /#wrapper -->

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