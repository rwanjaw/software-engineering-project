<?php
include("connection.php");

$error="";

if(isset($_POST['submit'])){
	$destination=$_POST['dest'];
	$BusID=$_POST['Bus_ID'];
	$date=$_POST['date'];
	$depaturetime=$_POST['dTime'];
	$arrivaltime=$_POST['aTime'];
	$fare=$_POST['fare'];
	$noP=$_POST['NoP'];

$sql = "INSERT INTO `schedule` (`Schedule_ID`, `Destination`, `Registration_No`, `date`, `depature_time`, `arrival_time`, `fare`, `no_of_passengers`) VALUES (NULL, '$destination', '$BusID', '$date', '$depaturetime', '$arrivaltime', '$fare', '$noP');";

if (mysqli_query($conn, $sql)) {
    $error= "New schedule added successfully";
} else {
    $error= "Error entering data: " . mysqli_error($conn);
}

/*mysqli_close($conn);*/
}
$sql1 = "SELECT * FROM `bus`";
$result1 = mysqli_query($conn,$sql1);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Schedule</title>        
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
			<form action="schedule.php" method="POST">
			  <h1 id="head">Add Schedule</h1><br>
				
				<input type="text" name="dest" id="txt1"  placeholder="Enter Destination"> <br><br>
				
				<select id="txt1" name="Bus_ID">
					<option value="select" disabled="disabled" selected="selected">-- Choose the Bus --</option>
				<?php while ($row1 = mysqli_fetch_array($result1)) {
				    echo "<option value='" . $row1['Registration_No'] ."'>" .$row1['Registration_No']."</option>";
				}?>
				</select>
				<br><br>

				<input type="text" name="date" id="txt1"  placeholder="Date: yyyy-mm-dd"> <br><br>
				<input type="text" name="dTime" id="txt1"  placeholder="Depature Time: hh:mm:ss"> <br><br>
				<input type="text" name="aTime" id="txt1"  placeholder="Arrival Time: hh:mm:ss"> <br><br>
				<input type="text" name="fare" id="txt1"  placeholder="Enter fare charged"> <br><br>
				
				<input type="text" name="NoP" id="txt1"  placeholder="Enter capacity of Passengers"> <br><br>
				<input type="submit" name="submit" id="btn" value="Add"><br><br>			
				
			</form>	
			<p>To view schedule, click <a href="viewschedule.php">here</a></p>

			<div id="logout">
				<h2><a href = "welcome.php">Exit</a></h2>
			</div>
		  </section>
		</div>
	</body>
</html>