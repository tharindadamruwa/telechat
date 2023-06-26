<?php
if (!isset($_COOKIE['uniq_id'])) {
    header("location: login.php");
} elseif (!isset($_GET['user_id'])) {
    header(("location: users.php"));
} elseif (empty($_GET['user_id'])) {
    header(("location: users.php"));
}
?>
<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                include_once "php/config.php";
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE uniq_id = {$_GET['user_id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="users.php"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat-box">
                <!-- <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nisi quibusdam corporis odit optio minus architecto earum exercitationem vero ea eum, adipisci quisquam. Maxime dolor consequatur itaque tenetur nam ipsum?xzaza</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <div class="details">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur nisi quibusdam corporis odit optio minus architecto earum exercitationem vero ea eum, adipisci quisquam. Maxime dolor consequatur itaque tenetur nam ipsum?xzaza</p>
                    </div>
                </div> -->
            </div>
            <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php echo $_COOKIE['uniq_id'] ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id ?>" hidden>
                <input type="text" id="input" name="massage" placeholder="Type massage here...">
                <button class="button"><ion-icon name="send"></ion-icon></button>
            </form>
        </section>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="javascript/chat.js"></script>
</body>

</html>