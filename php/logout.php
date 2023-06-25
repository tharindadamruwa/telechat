<?php
session_start();
if (isset($_SESSION['uniq_id'])) {
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET["user_id"]);
    if (isset($logout_id)) {
        $status = "Offline now";
        $sql = mysqli_query($conn, "UPDATE users SET status='{$status}'  WHERE uniq_id = {$logout_id} LIMIT 1");
        if ($sql) {
            setcookie("uniq_id", null, -time() + 60 * 60 * 24, "/");
            session_unset();
            session_destroy();
            header("location: ../login.php");
        }
    } else {
        header("location: ../users.php");
    }
} else {
    header("location: ../login.php");
}
