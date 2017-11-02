<?php
Require_once('connection.php');
$number = $_POST['number'];
$sql = "DELETE FROM bus WHERE Registration_No = '$number'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully...";
    header('Refresh:3; URL=welcome.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>