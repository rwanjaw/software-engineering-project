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
?>

