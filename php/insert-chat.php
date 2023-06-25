<?php
    session_start();
    if (isset($_SESSION['uniq_id'])) {
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $massage = mysqli_real_escape_string($conn, $_POST['massage']);

        if (!empty($massage)) {
            $sql = mysqli_query($conn, "INSERT INTO massage (incoming_msg_id, outgoing_msg_id, msg)
                                VALUE ({$incoming_id}, {$outgoing_id}, '{$massage}')") or die();
        }
    }else {
        header("../login.php");
    }
?>