<?php
   include("connection.php");
   $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT Admin_ID FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>        
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body> 
	 	<div class='myform'>
		  <section id="body_wrap">
        <center><h1 style="margin-bottom: 5px;">Transport Management System</h1></center>
		  	<div id="error">    
				  <?php
				  echo "<style='color:red'>".$error."</style>";
				  ?>  
			</div>
			<form action="login.php" method="POST">
			  <h1 id="head">Login</h1><br>
				
				<input type="text" name="uname" id="txt"  placeholder="Enter Username"> <br><br>
				<input type="password" name="password" id="txt" placeholder="Enter Password"><br><br>
				<input type="submit" name="submit" id="btn" value="Login"><br><br>
				
				
			</form>  
		  </section>
		</div>
	</body>
</html>
