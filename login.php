<?php
session_start();
if (isset($_SESSION['uniq_id']) || isset($_COOKIE["uniq_id"])) {
    $_SESSION['uniq_id']=$_COOKIE['uniq_id'];
    header("location: users.php");
}
?>
<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="form login">
            <header>TeleChat</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field">
                    <label>Email :</label>
                    <input name="email" type="text" placeholder="alex@isu.com">
                </div>
                <div class="field pw">
                    <label>Password :</label>
                    <input name="password" type="password" placeholder="*******">
                    <i class="fas pw-i fa-eye"></i>
                </div>
                <div class="field">
                    <input id="login" type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link">Not yet sign up ?<a href="index.php"> SignUp now</a></div>
            <div class="loading"></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="javascript/login.js"></script>

</body>

</html>