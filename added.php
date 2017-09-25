<?php
Require_once('connection.php');
$number = $_POST['number'];
$driver = $_POST['driver'];
$seats = $_POST['seats'];
$insert = "INSERT INTO `bus`(`Registration_No`, `No_of_seats`,'DriverName') VALUES ('$number','$seats','$driver')";
mysqli_query($conn,$insert) or die("Error: ".mysqli_error($conn));

mysqli_close($conn);
echo 'Succesfully added';
      
?>