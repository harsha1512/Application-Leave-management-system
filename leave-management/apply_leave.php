<?php
session_start();
include("db.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $uid = $_SESSION['user']['id'];
    $type = $_POST['leave_type_needed'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $reason = $_POST['reason'];
    $conn->query("INSERT INTO leaves (user_id, leave_type, from_date, to_date, reason) 
                  VALUES ($uid, '$type', '$from', '$to', '$reason')");
    echo "Leave Applied!";
}
?>

<form method="post">
    Type: <input type="text" name="leave_type" required /><br>
    From: <input type="date" name="from" required /><br>
    To: <input type="date" name="to" required /><br>
    Reason: <textarea name="reason" required></textarea><br>
    <input type="submit" value="Apply" />
</form>