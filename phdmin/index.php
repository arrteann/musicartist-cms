<?php
session_start();
if (isset($_SESSION['logined']) && isset($_SESSION['state'])) {
    if ($_SESSION['logined'] == TRUE && $_SESSION['state'] == "ADMIN") {
        header('Location: dashboard.php');
    } else {
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}
