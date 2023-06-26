<?php

// $conn = mysqli_connect("localhost", "root", "", "telechat");
$conn = mysqli_connect("sql203.infinityfree.com", "if0_34496732", "AL7AzzqhrO", "if0_34496732_telechat");

if (!$conn) {
    echo "Database not connected" . mysqli_connect_error();
}

?>