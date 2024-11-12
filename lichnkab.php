<?php
session_start();

// Подключение к базе данных
$servername = "31.129.99.31";
$username = "1is-a01_1is-a01"; 
$password = "g4lhzl4VgT"; 
$dbname = "1is-a01_1is-a01";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка, авторизован ли пользователь
if(!isset($_SESSION['email'])) {
    header("Location: accc.php");
    exit();
}

$email = $_SESSION['email'];

// Получение информации о пользователе
$user_info_query = "SELECT * FROM users WHERE email='$email'";
$user_info_result = $conn->query($user_info_query);

if ($user_info_result->num_rows > 0) {
    $user_info = $user_info_result->fetch_assoc();
    $name = $user_info['namesurn'];
}

// Получение забронированных номеров пользователя
$bookings_query = "SELECT * FROM bronn WHERE email='$email'";
$bookings_result = $conn->query($bookings_query);
$bookings = array();

if ($bookings_result->num_rows > 0) {
    while($row = $bookings_result->fetch_assoc()) {
        $booking_info = array(
            'datein' => $row['datein'],
            'dateout' => $row['dateout'],
            'person' => $row['person'],
            'kids' => $row['kids'],
            'room' => $row['room']
        );
        $bookings[] = $booking_info;
    }
}

$conn->close();
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Личный кабинет</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.html"><img src="images/logo.png"></a></div>
          <div class="col-6 col-lg-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li><a href="index.html">Главная</a></li>
                        <li><a href="rooms.php">Комнаты</a></li>
                        <li><a href="about.html">О нас</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/fonn.png)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Личный кабинет</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Главная</a></li>
              <li>&bullet;</li>
              <li>Личный кабинет</li>
            </ul>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    <section class="py-5 bg-light" id="next">
        <div class="container">
            <div class="row py-5">
                <div class="col-sm">
                    <img src="images/user.png" alt="" style="height: 20rem; width: auto">
                </div>
                <div class="col-sm"> 
                  <h2><?php echo $name; ?></h2>
                  <p>Email: <?php echo $email; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <h2>Забронированные номера:</h2>
                    <?php // Вывод данных забронированных номеров
                    if (!empty($bookings)) {
                        foreach ($bookings as $booking) {
                            echo "<p>Дата заезда: {$booking['datein']}</p>";
                            echo "<p>Дата выезда: {$booking['dateout']}</p>";
                            echo "<p>Количество взрослых: {$booking['person']}</p>";
                            echo "<p>Количество детей: {$booking['kids']}</p>";
                            echo "<p>Номер: {$booking['room']}</p>";
                            echo "<hr>";
                        }
                    } else {
                        echo "<p>Нет забронированных номеров.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    
    

    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">О нас</a></li>
              <li><a href="#">Правила &amp; Рекомендации</a></li>
              <li><a href="#">Политика</a></li>
             <li><a href="#">Комнаты</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">Отзовы</a></li>
              <li><a href="#">Ресторан</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Адрес:</span> <span> г.Пермь, ул. Пушкина, дом 107а</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Телефон:</span> <span>+7 992 222 61 36</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> slavynka@gmail.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                  <a href=""><img src="images/logo.png" alt=""></a>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            
           &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены<i class="icon-heart-o" aria-hidden="true"></i> ООО "СлявянкаХотел"
          </p>
            
          <p class="col-md-6 text-right social">
            <a href=""><span class="fa fa-telegram"></span></a>
            <a href=""><span class="fa fa-vk"></span></a>
            <a href=""><span class="fa fa-instagram"></span></a>
          </p>
        </div>
      </div>
    </footer>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>
  </body>
</html>