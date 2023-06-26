<?php
include_once "config.php";
$outgoing_id = $_COOKIE['uniq_id'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT uniq_id = {$outgoing_id}");
$output = '';
if (mysqli_num_rows($sql) == 0) {
    $output .= "<div class='us-no'>No users are available to chat</div>";
} elseif (mysqli_num_rows($sql) > 0) {
    include_once "data.php";
} elseif (mysqli_num_rows($sql) == 0) {
    unset($_COOKIE['uniq_id']);
    header("location: index.php");
}

echo $output;