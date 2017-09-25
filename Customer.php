<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="customer.css"/>
</head>

<body>
<div class="container">
    <form id="contact" method="post" action="Customer.php">
        <h3>Booking Form</h3>
        <h4>Reserve your seat now</h4>
        <fieldset>
            <input name="fullname" placeholder="Your name" type="text" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
            <input name="email" placeholder="Your Email Address" type="email" tabindex="2" required>
        </fieldset>
        <fieldset>
            <input name="phoneNo" placeholder="Your Phone Number" type="tel" tabindex="3" required>
        </fieldset>
        <fieldset>
            <select name="schedule">
                <option value="select" disabled="disabled" selected="selected">-- Choose your Schedule --</option>
                <option name="user_type" value="1">1</option>
                <option name="user_type" value="2">2</option>
            </select>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit"  id="contact-submit" data-submit="...Sending">Book</button>
        </fieldset>
    </form>
</div>
</body>
</html>
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
$schedule = $_POST['schedule'];

$sql = "INSERT INTO `booking`(`Booking_ID`, `Customer_Name`, `Email`, `Phone`, `Schedule_ID`) VALUES (NULL,'$name','$email','$phoneNo','$schedule')";
$result = $conn->query($sql) or trigger_error($conn->error."[$sql]");
?>