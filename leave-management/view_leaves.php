<?php
session_start();
include("db.php");
$uid = $_SESSION['user']['id'];
$result = $conn->query("SELECT * FROM leaves WHERE user_id=$uid");
while ($row = $result->fetch_assoc()) {
    echo $row['leave_type'] . " | " . $row['from_date'] . " - " . $row['to_date'] . " | " . $row['status'] . "<br>";
}
?>