<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
echo "Welcome " . $_SESSION['user']['username'];
echo "<br><a href='apply_leave.php'>Apply Leave</a>";
echo "<br><a href='view_leaves.php'>My Leaves</a>";
if ($_SESSION['user']['role'] == 'admin') {
    echo "<br><a href='admin.php'>Admin Panel</a>";
}
echo "<br><a href='logout.php'>Logout</a>";
?>