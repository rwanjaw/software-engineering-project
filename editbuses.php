<?php
Require_once('connection.php');
$number = $_POST['number'];
$driver = $_POST['Driver'];
$seats = $_POST['Seats'];
$destination = $_POST['destination'];
$update="UPDATE buses SET Registration_number = '$number', driver = '$driver',seats = '$seats', destination = '$destination' WHERE Registration_number = '$number'";
mysqli_query($conn,$update) or die("Error: ".mysqli_error($conn));

mysqli_close($conn);
header("location: buses.html#ALL");


?>