<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['uniq_id'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT uniq_id = '{$outgoing_id}'");
$output = '';
if (mysqli_num_rows($sql) == 1) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($sql) > 0) {
    include_once "data.php";
} elseif (mysqli_num_rows($sql) == 0) {
    unset($_SESSION['uniq_id']);
    header("location: index.php");
}

echo $output;