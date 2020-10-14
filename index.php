<?php
// LOAD CONFIG
include './config/cofing.php';
$core = new Core();
$sql = $core->connection;
// Defualt DATA
$info = $sql->prepare("SELECT * FROM settings WHERE id=1");
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
    <link rel="shortcut icon" href="./images/icon.jpg" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200;0,900;1,400&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="./styles/shared.css">
    <link rel="stylesheet" href="./styles/res.css">
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
                <li class="nav-item"><a href="/index.php">Home</a></li>
                <li class="nav-item"><a href="/tracks.php">Tracks</a></li>
                <li class="nav-item"><a href="/about.php">About</a></li>
                <li class="nav-item"><a href="/contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <!-- END HEADER -->
    <!-- CONTAINER -->
    <div class="container">
        <!-- INFO -->
        <section id="info">

            <h1 class="text text-white title"><?php echo $info['title'] ?></h1>

            <span class="text text-muted sub-title" id="typed"></span>

            <div></div>

            <a href="<?php echo $info['spotify'] ?>" target="__blank" class="btn btn-primary mt-1">Spotify</a>
        </section>
        <!-- Tracks -->
        <section id="track" class="mt-6 mb-5">

            <h1 class="text text-white title"><?php echo $info['second_title'] ?></h1>

            <div class="line"></div>

            <div class="image-container">
                <ul class="image-list">
                    <?php
                    $tracks = $sql->prepare("SELECT * FROM musics ORDER BY RAND() LIMIT 3");
                    $tracks->execute();
                    $tracks = $tracks->fetchAll(2);
                    foreach ($tracks as $track) {
                        echo '
                               <li class="image"><a href="' . $track['link'] . '"><img src="' . $track['image'] . '" alt="' . $track['title'] . '"></a></li>    
                            ';
                    }
                    ?>
                </ul>
            </div>

            <div class="right">
                <a href="tracks.php" class="btn btn-primary">MORE</a>
            </div>
        </section>
        <!-- Icons -->
        <section id="icons" class="mt-7 mb-6">
            <ul class="icons">
                <li class="icon"><a href="<?php echo $info['spotify'] ?>"><img src="./images/spotify.svg" alt="Spotify" style="width: 40px;"></a></li>
                <li class="icon"><a href="<?php echo $info['instagram'] ?>"><img src="./images/instagram.svg" alt="instagram" style="width: 40px;"></a></li>
            </ul>
        </section>
    </div>
    <!-- END CONTAINER -->

    <!-- FOOTER -->
    <footer class="footer">
        <p>DEVELOPED BY <a href="https://instagram.com/artiname">ARTIN</a></p>
    </footer>
    <!-- END FOOTER -->

    <!-- Typed.js -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <script src="./js/typedStyle.js"></script>
    <!-- Nav -->
    <script src="./js/nav.js"></script>
</body>

</html>