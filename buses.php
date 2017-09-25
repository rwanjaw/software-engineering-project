
<link  href= "customer.css" type="text/css" rel= "stylesheet">
<table class= "table">
<tr>
<th> Bus ID </th>
<th> Registration Number </th>
<th> Driver Name </th>
<th> Seats </th>
</tr>

<?php

include ('connection.php'); //includes the connection class

$sql = "SELECT * FROM bus";
$result = $conn->query($sql) or trigger_error($conn->error."[$sql]");

//$result = mysqli_query($db, "SELECT * FROM buses");//select all data in the buses table

while($row= mysqli_fetch_array ($result))
{      

 echo "<tr>";
 echo "<td>".$row['Bus_ID']. "</td>";
 echo "<td>".$row['Registration_No']. "</td>";
 echo "<td>".$row['DriverName']. "</td>";
 echo "<td>".$row['No_of_seats']. "</td>";
 echo "</tr>";
};

echo "</table>";//display the tale

