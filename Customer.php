
<?php
/**
 * Created by PhpStorm.
 * User: Githinji Wanjohi
 * Date: 9/17/2017
 * Time: 4:25 PM
 */
require_once ('connection.php');

$name = $_POST['fullname'];
$email = $_POST['email'];
$phoneNo = $_POST['phoneNo'];
$email = $_POST['email'];
$sID = $_POST['schedule'];

$date = date('Y-m-d');

$scheduleSql = "SELECT * FROM `schedule` WHERE `Schedule_ID` = '$sID'";
$scheduleID = mysqli_query($conn,$scheduleSql) or trigger_error($conn->error."[$scheduleSql]");
$row1 = mysqli_fetch_array($scheduleID);
$s = $row1['Registration_No'];
$remSeats = $row1['seatsRemaining'] - 1;
$sql = "INSERT INTO `booking`(`Booking_ID`, `bookingDate`, `Customer_Name`, `Email`, `Phone`, `Schedule_ID`) VALUES (NULL,'$date','$name','$email','$phoneNo','$sID')";
$update = "UPDATE `schedule` SET `seatsRemaining` = '$remSeats' WHERE Schedule_ID = '$sID'";
if (mysqli_query($conn, $sql) && mysqli_query($conn, $update)) {
    echo "New booking added successfully";
    header('Refresh:3; URL=index.php');
} else {
    echo "Error entering data: " .mysqli_error($conn) ;
}
?>