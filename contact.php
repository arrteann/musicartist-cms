<?php
// LOAD CONFIG
include './config/cofing.php';
$core = new Core();
$sql = $core->connection;

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
        <!-- Tracks -->
        <section id="track" class="mb-1">

            <h1 class="text text-white title">contact</h1>

            <div class="line"></div>

            <!-- FORM -->
            <div class="form-container">
                <?php
                // SEND DATA
                if (isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
                    $mail = htmlspecialchars(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
                    $sub = htmlspecialchars(filter_var($_POST['subject'], FILTER_SANITIZE_STRING));
                    $msg = htmlspecialchars(filter_var($_POST['message'], FILTER_SANITIZE_STRING));
                    // WRITE IN DB
                    $contact = $sql->prepare("INSERT INTO contact(mail,subject,message) VALUES(:mail,:sub,:msg)");
                    $contact->bindValue(":mail",$mail);
                    $contact->bindValue(":sub",$sub);
                    $contact->bindValue(":msg",$msg);
                    if($contact->execute()){
                        echo '<h1 class="mt-2 mb-2 text-white">Send Message Is Successfully</h1>';
                    }
                }
                ?>
                <form method="POST">
                    <input class="input" type="email" name="email" id="email" placeholder="Email : hi@prhm.net">
                    <input class="input" type="text" name="subject" id="subject" placeholder="Subject : Contact">
                    <textarea class="input input-area" name="message" id="message" cols="30" rows="10" placeholder="Message :D"></textarea>
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                </form>
            </div>
        </section>
        <!-- Icons -->
        <section id="icons" class="mt-3 mb-1">
            <ul class="icons">
                <li class="icon"><a href="#"><img src="./images/spotify.svg" alt="Spotify" style="width: 40px;"></a></li>
                <li class="icon"><a href=""><img src="./images/instagram.svg" alt="instagram" style="width: 40px;"></a></li>
            </ul>
        </section>
    </div>
    <!-- END CONTAINER -->

    <!-- FOOTER -->
    <footer class="footer mt-3">
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