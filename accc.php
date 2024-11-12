<?php
// Подключение к базе данных
$servername = "31.129.99.31";
$username = "1is-a01_1is-a01";
$password = "g4lhzl4VgT"; 
$dbname = "1is-a01_1is-a01";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка авторизации
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Авторизация успешна
        session_start();
        $_SESSION['email'] = $email;
        
        header("Location: lichnkab.php");
        exit();
    } else {
        // Неверные учетные данные
        echo "Неверные учетные данные. Пожалуйста, попробуйте еще раз. <br> <a href='index.html'>Вернуться на главную</a>";
    }
}

// Обработка регистрации
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirm_pass = $_POST['confirm_password'];
    
    // Проверка паролей на совпадение
    if($pass !== $confirm_pass) {
        echo "Пароли не совпадают.";
        exit();
    }
    
    // Проверка наличия пользователя с такой же почтой
    $check_email_query = "SELECT * FROM users WHERE email='$email'";
    $check_email_result = $conn->query($check_email_query);
    
    if($check_email_result->num_rows > 0) {
        echo "Пользователь с такой почтой уже существует. <br> <a href='index.html'>Вернуться на главную</a>";
        exit();
    }
    
    // Вставка нового пользователя в базу данных
    $insert_query = "INSERT INTO users (email, password, namesurn) VALUES ('$email', '$pass', '$name')";
    
    if ($conn->query($insert_query) === TRUE) {
        // Регистрация успешна
        header("Location: lichnkab.php");
        exit();
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }
}

$conn->close();
?>
