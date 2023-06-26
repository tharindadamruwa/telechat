<?php
$outgoing_id = $_COOKIE['uniq_id'];
include_once "config.php";
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$output = '';
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT uniq_id = '{$outgoing_id}' AND ( fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')");

if (mysqli_num_rows($sql) > 0) {
    include_once "data.php";
} else {
    $output .= "<div class='us-no'>No user found related to your search..!</div>";
}

echo $output;
?>