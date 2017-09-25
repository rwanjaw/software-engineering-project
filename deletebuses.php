<?php
Require_once('connection.php');
$number = $_POST['number'];
$sql = "DELETE FROM buses WHERE Registration_number = '$number'";
if ($db->query($sql) === TRUE) {
    echo "Record deleted successfully...";
} else {
    echo "Error deleting record: " . $db->error;
}

$db->close();
?>