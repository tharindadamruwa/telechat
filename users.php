<?php
session_start();
if (!isset($_SESSION['uniq_id'])) {
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                include_once "php/config.php";
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status='{$status}'  WHERE uniq_id = {$_SESSION['uniq_id']} LIMIT 1");
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE uniq_id = {$_SESSION['uniq_id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                    <img src="php/images/<?php echo $row['img']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?user_id=<?php echo $_SESSION['uniq_id'] ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="titsp">Select an user to start chat</span>
                <div class="serch">
                    <input type="text" id="searchBar" placeholder="Enter name to search...">
                </div>
            </div>
            <div class="user-list">
                <!-- <a href="#">
                    <div class="content">
                        <img src="1641473827IMG_20211125_132327_009-01.jpeg" alt="">
                        <div class="details">
                            <span>Tharinda Damruwan</span>
                            <p>This is test msg</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a> -->
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="javascript/users.js"></script>

</body>

</html>