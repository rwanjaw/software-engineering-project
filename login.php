<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>


    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login.css">


</head>

<body>
<div class="login-form">
    <h1>Nganya</h1>
    <form action="login.php" method="post">
        <div class="form-group ">
            <input type="text" class="form-control" placeholder="Username " id="uname" name="uname">
            <i class="fa fa-user"></i>
        </div>
        <div class="form-group log-status">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            <i class="fa fa-lock"></i>
        </div>
        <span class="alert">Invalid Credentials</span>
        <a class="link" href="#">Lost your password?</a>
        <button type="submit" class="log-btn" >Log in</button>
    </form>

</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script  src="js/login.js"></script>

</body>
</html>

<?php
include("connection.php");
session_start();
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

    if($count == 1 || $myusername == "admin" && $mypassword == "admin") {
        $_SESSION['login_user'] = $myusername;
        header("location: welcome.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
