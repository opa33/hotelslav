<?php
session_start();

// Проверяем, была ли отправлена форма методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, было ли передано значение room
    if (isset($_POST['room'])) {
        // Сохраняем значение room в сессии
        $_SESSION['selected_room'] = $_POST['room'];
    }

    // Перенаправляем пользователя на другую страницу
    header("Location: choose-fullhouse.php");
    exit(); // Обязательно завершаем выполнение скрипта после перенаправления
}
?>