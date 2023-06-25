<?php

$conn = mysqli_connect("localhost", "root", "", "telechat");

if (!$conn) {
    echo "Database not connected" . mysqli_connect_error();
}

?>