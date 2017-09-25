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
			  	
			  	<div id="logout">
			  	  <h2><a href = "logout.php">Sign Out</a></h2>
			  	</div>
			</form>	
		  </section>
		</div>
	</body>
</html>