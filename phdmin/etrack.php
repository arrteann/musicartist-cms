<?php
// CHECK SESSION
session_start();
if (isset($_SESSION['logined']) && isset($_SESSION['state'])) {
    if (!$_SESSION['logined'] == TRUE && $_SESSION['state'] == "ADMIN") {
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}
// LOAD CONFIG
include '../config/cofing.php';
$core = new Core();
$conn = $core->connection;
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="../styles/shared.css">
    <link rel="stylesheet" href="../styles/res.css">
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
            <h1 class="text text-white title">Edit Tracks</h1>
            <div class="line"></div>
            <!-- FORM -->
            <div class="form-container">
                <?php

                $getData = $conn->prepare("SELECT * FROM musics WHERE id=:id");
                $getData->bindValue(":id", $_GET['id']);
                $getData->execute();
                $getData = $getData->fetch(2);
                // OTHER
                if (isset($_POST['submited'])) {
                    // GET VALUE FROM INPUT
                    $title = htmlspecialchars(htmlentities($_POST['title']));
                    $spotify = htmlspecialchars(htmlentities($_POST['link']));
                    $file = $_FILES['photo'];
                    $fileName = $file['name'];
                    $filePath = $file['tmp_name'];
                    $fileExt = strtolower(end(explode('.', $fileName)));
                    $extentions = array("jpeg", "jpg", "png");
                    $name = '../images/assets/' . basename('/images/' . $fileName);
                    $path = './images/assets/' . basename('/images/' . $fileName);
                    if (in_array($fileExt, $extentions)) {
                        // GET DATA FROM WEB
                        if (!file_exists('../images/assets/' . $fileName)) {
                            move_uploaded_file($filePath, $name);
                        } else {
                            unlink($getData['image']);
                            move_uploaded_file($filePath, $name);
                        }
                    }
                    // ADD TO DATABSE
                    $add = $conn->prepare("UPDATE musics SET title = :title , image = :img , link = :link WHERE id=:id");
                    $add->bindValue(":title", $title);
                    $add->bindValue(":img", $path);
                    $add->bindValue(":link", $spotify);
                    $add->bindValue(":id", $_GET['id']);
                    if ($add->execute()) {
                        echo '<h1 class="text-white">Update Successfully</h1>';
                        header("Location: index.php");
                    }
                }
                // }
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="submited">
                    <input value="<?php echo $getData['title']; ?>" class="input" type="text" name="title" id="title" placeholder="Track Name : Sard-Tar" required>
                    <input value="<?php echo $getData['link']; ?>" class="input" type="text" name="link" id="link" placeholder="Spotify : https://.." required>
                    <label class="btn-upload" for="photo">COVER ART</label>
                    <input class="btn-upload__hide" type="file" name="photo" id="photo" accept=".jpg, .png, .jpeg">
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                </form>
            </div>
        </section>

        <!-- Nav -->
        <script src="../js/nav.js"></script>
        <!-- Upload -->
        <script src="../js/upload.js"></script>
</body>

</html>