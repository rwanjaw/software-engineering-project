<?php
/**
 * Created by PhpStorm.
 * User: Githinji Wanjohi
 * Date: 9/17/2017
 * Time: 4:13 PM
 */

//Create an object from Class constant
include_once('constant.php');
$obj = new constant();

//Create a connection to the database
$conn=mysqli_connect($obj->host,$obj->username,$obj->password,$obj->db);

//Check for errors while connecting to the database
if (mysqli_connect_errno($conn)) {
    die("Connection failed: " . $conn->connect_error);
}
?>
