<?php
session_start();
include("db.php");
if ($_SESSION['user']['role'] != 'admin') {
    die("Unauthorized");
}

if (isset($_GET['action'])) {
    $id = $_GET['id'];
    $status = $_GET['action'];
    $conn->query("UPDATE leaves SET status='$status' WHERE id=$id");
}

$result = $conn->query("SELECT leaves.*, users.username FROM leaves JOIN users ON leaves.user_id = users.id");
while ($row = $result->fetch_assoc()) {
    echo $row['username'] . ": " . $row['leave_type'] . " (" . $row['status'] . ")";
    echo " <a href='?id=" . $row['id'] . "&action=Approved'>Approve</a> ";
    echo "<a href='?id=" . $row['id'] . "&action=Rejected'>Reject</a><br>";
}
?>