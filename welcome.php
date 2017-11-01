<?php
    session_start();
   include('connection.php');

   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($conn,"select username from admin where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];

   if(!isset($_SESSION['login_user'])) {
       header("location:login.php");
   }

$sql1 = "SELECT * FROM `bus`";
$result1 = mysqli_query($conn,$sql1);
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheetFlosix - Bootstrap template, Creative One Page Template" href="css/font-icon.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

</head>

<body>
<!-- header section -->
<section class="hero" role="banner">
    <!--header navigation -->
    <header id="header" style="margin">
        <div class="header-content clearfix"> <a class="logo" href="#"><img src="images/icon.png" alt=""></a>
            <nav class="navigation" role="navigation">
                <ul class="primary-nav">
                    <a href="logout.php" class="btn btn-large">Logout</a>
                </ul>
            </nav>
            <a href="index.html" class="nav-toggle">Menu<span></span></a> </div>
    </header>
    <!--header navigation -->
    <!-- banner text -->
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="banner-text text-center">
                <h1>Nganya</h1>
                <p>Administrator Landing Page</p>
                <nav role="navigation"> <a href="#operations" class="banner-btn"><img src="images/down-arrow.png" alt=""></a></nav>
            </div>
            <!-- banner text -->
        </div>
    </div>
</section>
<!-- header section -->
<!-- Get a quote section -->
<section id="operations" class="section quote" style="height: 350px; margin-top: 40px">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h3>Please choose any of the following operations</h3>
            <a class="btn btn-large" data-toggle="modal" data-target="#schedule">Create New Schedule</a>
            <a href="viewschedule.php" class="btn btn-large">View Schedules</a>
            <a class="btn btn-large" data-toggle="modal" data-target="#addBus">Add Buses</a> </div>
    </div>
</section>
<form action="schedule.php" method="POST" role="form">
    <!-- Modal -->
    <div id="schedule" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add a new schedule</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="destination">Enter Destination</label>
                        <input type="text" class="form-control" id="txt1" name="dest" placeholder="Enter Destination">
                    </div>
                    <div class="form-group">
                        <label for="sel1">Select a bus</label>
                        <select class="form-control" id="txt1" name="Bus_ID">
                            <option value="select" disabled="disabled" selected="selected">-- Choose the Bus --</option>
                            <?php while ($row1 = mysqli_fetch_array($result1)) {
                                echo "<option value='" . $row1['Registration_No'] ."'>" .$row1['Registration_No']."</option>";
                            }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control" name="date" id="txt1"  placeholder="Date: yyyy-mm-dd">
                    </div>
                    <div class="form-group">
                        <label for="depTime">Departure Time</label>
                        <input type="text" class="form-control" name="dTime" id="txt1"  placeholder="Depature Time: hh:mm:ss">
                    </div>
                    <div class="form-group">
                        <label for="depTime">Arrival</label>
                        <input type="text" class="form-control" name="aTime" id="txt1"  placeholder="Arrival Time: hh:mm:ss">
                    </div>
                    <div class="form-group">
                        <label for="depTime">Fare Price</label>
                        <input type="text" class="form-control" name="fare" id="txt1"  placeholder="Enter fare charged">
                    </div>
                    <div class="form-group">
                        <label for="depTime">Bus Capacity</label>
                        <input type="text" class="form-control" name="NoP" id="txt1"  placeholder="Enter capacity of Passengers">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-default" name="submit" id="btn" value="Add">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>

<form action="added.php" method="POST" role="form">
    <div id="addBus" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Register a Bus</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="destination">Bus Registration Number</label>
                        <input type="text" class="form-control" id="txt1" name="number" placeholder="Registration Number">
                    </div>
                    <div class="form-group">
                        <label for="date">Driver Name</label>
                        <input type="text" class="form-control" name="driver" id="txt1"  placeholder="Driver's Name">
                    </div>
                    <div class="form-group">
                        <label for="depTime">Number of Seats</label>
                        <input type="text" class="form-control" name="seats" id="txt1"  placeholder="Capacity">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-default" name="submit" id="btn" value="Add">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
<!-- JS FILES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/main.js"></script>
<script src="dist/sweetalert.min.js"></script>
</body>
</html>
