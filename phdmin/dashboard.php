<?php
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

// GET ADMIN INFORMATION 
$getData = $conn->prepare("SELECT * FROM admin WHERE id=:id");
$getData->bindValue(":id", $_SESSION['id']);
$getData->execute();
$getData = $getData->fetch(2);
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
        <!-- INFO -->
        <section id="info">
            <?php
            $name = $getData['name'];
            echo '<h1 class="text text-white title">welcome ' . $name . "</h1>";
            ?>

            <a href="logout.php" class="text text-muted sub-title" style="text-decoration: none;font-size:1.3rem">Logout</a>

        </section>
        <!-- Tracks -->
        <section id="track" class="mt-6 mb-5">

            <h1 class="text text-white title">tracks</h1>

            <div class="line"></div>

            <div class="table-container">
                <div class="tables">
                    <!-- TABLE HEAD -->
                    <div class="table">
                        <ul class="table-items">
                            <li class="table-item">ID</li>
                            <li class="table-item">NAME</li>
                            <li class="table-item">ACTION</li>
                        </ul>
                    </div>
                    <!-- OTHER -->
                    <?php
                    // LIST TRACKS
                    $TracksList = $conn->prepare("SELECT * FROM musics");
                    $TracksList->execute();
                    $TracksList = $TracksList->fetchAll(2);
                    foreach ($TracksList as $track) {
                        echo '
                        <div class="table">
                            <ul class="table-items">
                                <li class="table-item">#'.$track['id'].'</li>
                                <li class="table-item">'.$track['title'].'</li>
                                <li class="table-item">
                                    <a href="etrack.php?id='.$track['id'].'"><i class="las la-pen"></i></a>
                                    <a href="delete.php?delete=musics&id='.$track['id'].'&page=dashboard"><i class="las la-trash"></i></a>
                                </li>
                            </ul>
                        </div>
                    ';
                    }
                    ?>

                    <!-- ADD TRACKS -->
                    <a href="track.php?mode=add" class="btn btn-primary mt-4" style="width:8rem;">ADD TRACK</a>
                </div>
            </div>


    </div>
    </section>
    <!-- Nav -->
    <script src="../js/nav.js"></script>
</body>

</html>