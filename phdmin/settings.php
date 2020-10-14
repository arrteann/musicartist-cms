<?php
// LOAD CONFIG
include '../config/cofing.php';
$core = new Core();
$sql = $core->connection;
// GET DATA
$info = $sql->prepare("SELECT * FROM settings WHERE id=1;");
$info->execute();
$info = $info->fetch(2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prhm</title>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="../images/icon.jpg" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200;0,900;1,400&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="../styles/shared.css">
</head>

<body>
    <!-- HEADER -->
    <header class="header">
        <!-- Navigation -->
        <div class="header-wrap">
            <div class="menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <nav class="nav">
            <!-- CLOSE -->
            <div class="nav-wrap">
                <div class="nav-menu">
                    <span></span>
                    <span></span>
                </div>
            </div>

            <!-- Menu -->
            <h2 class="nav-title">Menu</h2>
            <ul class="nav-list">
                <li class="nav-item"><a href="./index.php">Home</a></li>
                <li class="nav-item"><a href="./contacts.php">Contacts</a></li>
                <li class="nav-item"><a href="./settings.php">Settings</a></li>
            </ul>
        </nav>
    </header>
    <!-- END HEADER -->
    <!-- CONTAINER -->
    <div class="container">
        <!-- Tracks -->
        <section id="track" class="mb-1">

            <h1 class="text text-white title">settings</h1>

            <div class="line"></div>

            <!-- FORM -->
            <div class="form-container">
                <?php
                // SEND DATA
                if (isset($_POST['log'])) {
                    $title = htmlspecialchars($_POST['title']);
                    $stitle = htmlspecialchars($_POST['stitle']);
                    $spotify = htmlspecialchars($_POST['spotify']);
                    $instagram = htmlspecialchars($_POST['instagram']);
                    $bio = htmlspecialchars($_POST['bio']);
                    // WRITE IN DB
                    $contact = $sql->prepare("UPDATE settings SET title=:title,second_title=:stitle,spotify=:spo,instagram=:insta,bio=:bio WHERE id=1");
                    $contact->bindValue(":title", $title);
                    $contact->bindValue(":stitle", $stitle);
                    $contact->bindValue(":spo", $spotify);
                    $contact->bindValue(":insta", $instagram);
                    $contact->bindValue(":bio", $bio);
                    if ($contact->execute()) {
                        echo '<h1 class="mt-2 mb-2 text-white">Update Is Successfully</h1>';
                        header("Location:index.php");
                    }
                }
                ?>
                <form method="POST">
                    <input type="hidden" name="log">
                    <input class="input" type="text" name="title" id="title" placeholder="Title : prhm" value="<?php echo $info['title'] ?>">
                    <input class="input" type="text" name="stitle" id="stitle" placeholder="Second Title : tracks" value="<?php echo $info['second_title'] ?>">
                    <input class="input" type="text" name="spotify" id="spotify" placeholder="Spotify : https://..." value="<?php echo $info['spotify'] ?>">
                    <input class="input" type="text" name="instagram" id="instagram" placeholder="Instagram : https://..." value="<?php echo $info['instagram'] ?>">
                    <textarea class="input input-area" name="bio" id="bio" cols="30" rows="10" placeholder="Bio :D"><?php echo $info['bio'] ?></textarea>
                    <button class="btn btn-primary" type="submit">UPADTE</button>
                </form>
            </div>
        </section>
    </div>
    <!-- END CONTAINER -->

    <!-- Nav -->
    <script src="../js/nav.js"></script>
</body>

</html>