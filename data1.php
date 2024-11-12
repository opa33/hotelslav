<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['checkin_date'] = $_POST['checkin_date'];
    $_SESSION['checkout_date'] = $_POST['checkout_date'];
    $_SESSION['adults'] = $_POST['adults'];
    $_SESSION['children'] = $_POST['children'];
    header("Location: reservation.php");
    exit();
}
?>