<?php
session_start();
session_start();
if (isset($_SESSION['logined']) && isset($_SESSION['state'])) {
    if ($_SESSION['logined'] == TRUE && $_SESSION['state'] == "ADMIN") {
        header('Location: dashboard.php');
    }
}
// LOAD CONFIG
include '../config/cofing.php';
$core = new Core();
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
    <!-- CONTAINER -->
    <div class="container">
        <!-- Tracks -->
        <section id="track" class="mb-1">

            <h1 class="text text-white title res-text">login</h1>

            <div class="line"></div>

            <!-- FORM -->
            <div class="form-container">
                <?php
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $mail = htmlspecialchars(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
                    $password = htmlspecialchars(htmlentities($_POST['password'], FILTER_SANITIZE_STRING));
                    // echo md5($password);
                    // CHECK
                    $check = $core->login($mail, md5($password), "admin");
                    if ($check) {
                        session_regenerate_id();
                        $_SESSION['logined'] = TRUE;
                        $_SESSION['state'] = "ADMIN";
                        $_SESSION['id'] = $check['id'];
                        header("Location: index.php");
                    } else {
                        echo '<span class="text-white">Email Or Password is not True</span>';
                    }
                }
                ?>
                <form method="POST">
                    <input type="hidden" name="login">
                    <input class="input" type="email" name="email" id="email" placeholder="Email : hi@prhm.net" required>
                    <input class="input" type="password" name="password" id="password" placeholder="Password : ****" required>
                    <button class="btn btn-primary" type="submit">LOGIN</button>
                </form>
            </div>
        </section>
</body>

</html>