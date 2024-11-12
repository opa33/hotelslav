<?php
session_start();

// Проверяем, было ли передано значение room
if (isset($_GET['room'])) {
    // Сохраняем значение room в сессии
    $_SESSION['selected_room'] = $_GET['room'];
}

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Подключение к базе данных
    $mysqli = new mysqli("31.129.99.31", "1is-a01_1is-a01", "g4lhzl4VgT", "1is-a01_1is-a01");
    if ($mysqli->connect_error) {
        die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
    }

    // Получение данных из сессии
    $checkin_date = $_SESSION['checkin_date'];
    $checkout_date = $_SESSION['checkout_date'];
    $adults = $_SESSION['adults'];
    $children = $_SESSION['children'];

    // Получение данных из формы
    $name = $mysqli->real_escape_string($_POST["name"]);
    $email = $mysqli->real_escape_string($_POST["email"]);

    // Получение выбранной комнаты из сессии
    $selected_room = $_SESSION['selected_room'];

    // Вставка данных в базу данных
    $sql = "INSERT INTO `bronn` (`id`, `name`, `email`, `datein`, `dateout`, `person`, `kids`, `room`) 
            VALUES (NULL, '$name', '$email', '$checkin_date', '$checkout_date', '$adults', '$children', '$selected_room')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: successfull.html");
        exit();
    } else {
        echo "Ошибка при сохранении данных: " . $mysqli->error;
    }
    $mysqli->close();
}
?>
