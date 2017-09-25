<?php
include("connection.php");
$error="";

$sql = "SELECT * FROM `schedule`";
$result = mysqli_query($conn, $sql);
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
		  	
			<form action="#" method="POST">
			  <h1 id="head">View Schedule</h1><br>
				<div id="table">
				  <table>
				    <thead>
				    	<?php if (mysqli_num_rows($result) > 0) {?>
				        <tr>
				            <th>Schedule ID</th>
				            <th>Destination</th>
				            <th>Registration Name</th>
				            <th>Date</th>
				            <th>Depature Time</th>
				            <th>Arrival Time</th>
				            <th>Fare</th>
				            <th>Number of Passengers</th>
				        </tr>
				        <?php
							}
							else {
							    ?><h2><?php echo "0 results"; ?></h2><?php
							}
						?> 
				    </thead>
				    <tbody>
				        <!--Use a while loop to make a table row for every DB row-->
				        <?php
				        	while( $row = mysqli_fetch_assoc($result)){ ?>
				        <tr>
				            <!--Each table column is echoed in to a td cell-->
				            <td><?php echo $row["Schedule_ID"]; ?></td>
				            <td><?php echo $row["Destination"]; ?></td>
				            <td><?php echo $row["Registration_No"]; ?></td>
				            <td><?php echo $row["date"]; ?></td>
				            <td><?php echo $row["depature_time"]; ?></td>
				            <td><?php echo $row["arrival_time"]; ?></td>
				            <td><?php echo $row["fare"]; ?></td>
				            <td><?php echo $row["no_of_passengers"]; ?></td>
				        </tr>
				    <?php } ?>
				        
				    </tbody>
				  </table>
				</div> 
			</form>	
			<p>To add schedule, click <a href="schedule.php">here</a></p>
			<div id="logout">
				<h2><a href = "welcome.php">Exit</a></h2>
			</div>
		  </section>
		</div>
	</body>
</html>