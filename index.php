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
        <section class="form signup">
            <header>TeleChat</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field">
                        <label>Enter frist name :</label>
                        <input name="fname" type="text" placeholder="alex" required>
                    </div>
                </div>
                <div class="name-details">
                    <div class="field">
                        <label>Enter last name :</label>
                        <input name="lname" type="text" placeholder="ishu" required>
                    </div>
                </div>
                <div class="field">
                    <label>Email :</label>
                    <input type="text" name="email" placeholder="alex@isu.com" required>
                </div>
                <div class="field pw">
                    <label>Password :</label>
                    <input type="password" name="password" placeholder="*******" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field">
                    <label>Select Image:</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field">
                    <input id="signup" type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link">Already sign up ?<a href="login.php"> login now</a></div>
            <div class="loading"></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="javascript/signup.js"></script>

</body>

</html>