<?php
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        // $_SESSION['uniq_id'] = $row['uniq_id'];
        setcookie("uniq_id", $row['uniq_id'] , time() + 60 * 60 * 24 * 30, "/");
        echo "success";
    } else {
        echo "Email or Password is Incorrect !";
    }
} else {
    echo "All input field are  required";
}
