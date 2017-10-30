<?php
   include('connection.php');
   
   $user_check = $_SESSION['login_user'];   
   $ses_sql = mysqli_query($conn,"select username from admin where username = '$user_check' ");   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Admin</title>        
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>
    <!-- header section -->
    <section class="banner" role="banner">
        <!--header navigation -->
        <header id="header">
            <div class="header-content clearfix"> <a class="logo" href="#"><img src="images/icon.png" alt=""></a>
                <nav class="navigation" role="navigation">
                    <ul class="primary-nav">
                        <li><a href="#intro">Intro</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#works">Book</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <a href="login.php" class="btn btn-large">Admin Login</a>
                    </ul>
                </nav>
                <a href="#" class="nav-toggle">Menu<span></span></a> </div>
        </header>
        <!--header navigation -->
        <!-- banner text -->
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-text text-center">
                    <h1>Nganya</h1>
                    <p>Your Kenyan Transport Solution</p>
                    <nav role="navigation"> <a href="#services" class="banner-btn"><img src="images/down-arrow.png" alt=""></a></nav>
                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
    <!-- header section -->
    <div class='myform'>
		  <section id="body_wrap">
			<form action="#" method="POST">
			  <h1 id="head">Admin Page</h1><br>
				<div id="errorA">    
				  <h3><?php
				  $error="Welcome ".$login_session;
				  echo "<style='color:red'>".$error."</style>";
				  ?>  </h3>
				</div>
				<p>To make schedule, click <a href="schedule.php">here</a></p>
				<p>To view schedule, click <a href="viewschedule.php">here</a></p>
				<p>To manage buses, click <a href="#">here</a></p>
			  	
			  	<div id="logout">
			  	  <h2><a href = "logout.php">Sign Out</a></h2>
			  	</div>
			</form>	
		  </section>
		</div>
	</body>
</html>