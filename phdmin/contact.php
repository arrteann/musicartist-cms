<?php
// LOAD CONFIG
include '../config/cofing.php';
$core = new Core();
$sql = $core->connection;
// Defualt DATA
$info = $sql->prepare("SELECT * FROM settings WHERE id=1");
$info->execute();
$info = $info->fetch(2);
$contact;
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $contact = $sql->prepare("SELECT * FROM contact WHERE id = :id");
    $contact->bindValue(":id", $id);
    $contact->execute();
    $contact = $contact->fetch(2);
}
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

            <h1 class="text text-white title"><?php echo $contact['subject'] ?></h1>
            <div></div>
            <p class="text">
                <?php echo $contact['message'] ?>
            </p>
            <a href="delete.php?delete=contact&id=<?php echo $contact['id'] ?>&page=contact" class="btn btn-primary mt-1">DELETE</a>
        </section>

    </div>
    <!-- END CONTAINER -->

    <!-- Nav -->
    <script src="../js/nav.js"></script>
</body>

</html>