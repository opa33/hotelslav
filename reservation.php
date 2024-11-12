<?php
session_start();

// Получаем данные из сессии
$checkin_date = $_SESSION['checkin_date'];
$checkout_date = $_SESSION['checkout_date'];
// Вычисляем количество ночей
$nightCount = (strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24);
// Указываем стоимость за ночь
$oneroom = 6000;
$fulllux = 11000;
$fullhouse = 30000;
// Вычисляем общую стоимость
$totalPriceoneroom = $nightCount * $oneroom;
$totalPricefullux = $nightCount * $fulllux;
$totalPricefullhouse = $nightCount * $fullhouse;
// Сохраняем данные для след стр
$_SESSION['totalPriceoneroom'] = $totalPriceoneroom;
$_SESSION['totalPricefullux'] = $totalPricefullux;
$_SESSION['totalPricefullhouse'] = $totalPricefullhouse;
$_SESSION['nightCount'] = $nightCount;
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Славянка</title>
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
            

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li><a href="index.html">Главная</a></li>
                        <li><a href="rooms.php">Комнаты</a></li>
                        <li><a href="about.html">О нас</a></li>
                        <li><a href="news.html">Новости</a></li>
                        <li><a href="#" style="cursor: pointer;" data-toggle="modal" data-target="#auth">Личный кабинет</a></li>
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
   

    <section class="site-hero inner-page overlay" style="background-image: url(images/fonn.png);" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Выберите комнату</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Главная</a></li>
              <li>&bullet;</li>
              <li>Выбор комнат</li>
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

    
          <section class="section bg-light py-2" id="next">

            <div class="container">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                </div>
              </div>
            
              <div style="border-radius: 20px; margin-bottom: 1rem;" class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
                <span class="image d-block bg-image-2" style="background-image: url('images/oneroom.png');"></span>
                <div class="text">
                <span class="d-block mb-4"><span class="text-primary" style="font-size: 35px;"><?php echo number_format($totalPriceoneroom, 0, ',', ' '); ?> ₽ / <?php echo $nightCount; ?> nights</span> <span class="text-uppercase letter-spacing-2"></span></span>
                  <h2 class="mb-4">One room</h2>
                  <div style="display: flex; align-items: center;" class="dops">
                    <img style="width: 30px;height: auto;" src="images/tapok.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/vilka.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/wifi.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/bokal.png" alt="">
                    <p style="color: black; margin-left: 1rem;">23m<sup>2</sup></p>
                  </div>
                  <p>Идеально для парочки.</p>
                  <form action="choose.php" method="post">
                  <input type="hidden" name="room" value="one room">
                  <p><button type="submit" class="btn btn-primary text-white" id="oneroom">Выбрать</button></p>
                  </form>
                </div>
              </div>
              <div style="border-radius: 20px; margin-bottom: 1rem;" class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="200">
                <span class="image d-block bg-image-2 order-2" style="background-image: url('images/fulux.png');"></span>
                <div class="text order-1">
                  <span class="d-block mb-4"><span class="text-primary" style="font-size: 35px;"><?php echo number_format($totalPricefullux, 0, ',', ' '); ?> ₽ / <?php echo $nightCount; ?> nights</span> <span class="text-uppercase letter-spacing-2"></span> </span>
                  <h2 class="mb-4">Full lux</h2>
                  <div style="display: flex; align-items: center;" class="dops">
                    <img style="width: 30px;height: auto;" src="images/tapok.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/vilka.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/wifi.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/bokal.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/zov.png" alt="">
                    <p style="color: black; margin-left: 1rem;">40m<sup>2</sup></p>
                  </div>
                  <p>Несколько комнат, шикарный вид из окна.</p>
                  <form action="choose2.php" method="post">
                  <input type="hidden" name="room" value="full lux">
                  <p><button type="submit" class="btn btn-primary text-white">Выбрать</button></p>
                  </form>
                </div>
              </div>
              <div style="border-radius: 20px;" class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
                <span href="choose-fullhouse.html" class="image d-block bg-image-2" style="background-image: url('images/fullhouse.png');"></span>
                <div class="text">
                  <span class="d-block mb-4"><span class="text-primary" style="font-size: 35px;"><?php echo number_format($totalPricefullhouse, 0, ',', ' '); ?> ₽ / <?php echo $nightCount; ?> nights</span> <span class="text-uppercase letter-spacing-2"></span></span>
                  <h2 class="mb-4">Full house</h2>
                  <div style="display: flex; align-items: center;" class="dops">
                    <img style="width: 30px;height: auto;" src="images/tapok.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/vilka.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/wifi.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/bokal.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/zov.png" alt="">
                    <img style="width: 30px;height: auto; margin-left: 1rem;" src="images/car.png" alt="">
                    <p style="color: black; margin-left: 1rem;">100m<sup>2</sup></p>
                  </div>
                  <p>Все самое лучшее для лучших.</p>
                  <form action="choose3.php" method="post">
                    <input type="hidden" name="room" value="full house">
                  <p><button type="submit" class="btn btn-primary text-white">Выбрать</button></p>
                  </form>
                </div>
              </div>
      
            </div>
          </section>


    
    
          <section class="section bg-image overlay" style="background-image: url('images/fonn.png');">
            <div class="container" >
              <div class="row align-items-center">
                <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-center" data-aos="fade-up">
                  <h2 class="text-white font-weight-bold">Вы на верном пути!</h2>
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

          <div class="modal fade" id="auth" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="accc.php" method="POST">
            <div class="modal-body">
              <div class="card-body p-3 text-center">
                <div class="mb-md-5 mt-md-4 pb-2">
                  <h2 class="fw-bold mb-2">Авторизация</h2>
                  <div class="form-outline form-black mb-4">
                    <input type="email" name="email" placeholder="Ваша почта" id="typeEmailX" class="form-control form-control-lg" />
                  </div>
                  <div class="form-outline form-black mb-4">
                    <input type="password" name="pass" placeholder="Пароль" id="typePasswordX" class="form-control form-control-lg" />
                  </div>
                  <button class="btn btn-primary btn-block text-white" type="submit" name="login" style="font-size: 18px; height: 3rem;">Войти</button>
                </div>
                <div>
                  <a href="" data-toggle="modal" data-target="#reg" class="mb-0">Нету аккаунта? Зарегистрироваться</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
      
    <div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="accc.php" method="POST">
            <div class="modal-body">
              <div class="card-body p-5 text-center">
                <div class="mb-md-5 mt-md-4 pb-2">
                  <h2 class="fw-bold mb-2">Регистрация</h2>
                  <div class="form-outline form-black mb-4">
                    <input type="text" name="name" placeholder="Ваше ФИО" id="typeNameX" class="form-control form-control-lg" />
                  </div>
                  <div class="form-outline form-black mb-4">
                    <input type="email" name="email" placeholder="Ваша почта" id="typeEmailX" class="form-control form-control-lg" />
                  </div>
                  <div class="form-outline form-black mb-4">
                    <input type="password" name="pass" id="typePasswordX" placeholder="Пароль" class="form-control form-control-lg" />
                  </div>
                  <div class="form-outline form-black mb-4">
                    <input type="password" name="confirm_password" placeholder="Подтвердите пароль" id="typeConfirmPasswordX" class="form-control form-control-lg" />
                  </div>
                  <button class="btn btn-primary btn-block text-white" type="submit" name="register" style="font-size: 18px; height: 3rem;">Зарегистрироваться</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
          <script>
            // Функция для вычисления количества ночей и общей стоимости
            function calculatePriceAndNights() {
                var checkinDate = new Date(document.getElementById("checkinDate").value);
                var checkoutDate = new Date(document.getElementById("checkoutDate").value);
        
                // Проверяем, что дата выезда позже даты заезда
                if (checkoutDate > checkinDate) {
                    var nightCount = Math.ceil((checkoutDate - checkinDate) / (1000 * 60 * 60 * 24));
                    document.getElementById("nightCount").textContent = "Ночей: " + nightCount;
        
                    // Изменяем текст в зависимости от nightCount
                    document.getElementById("nightCountText").textContent = "/ за " + nightCount + " ночей";
        
                    // Вычисляем общую стоимость
                    var pricePerNight = 6000; // Пример: стоимость за ночь
                    var totalPrice = pricePerNight * nightCount;
                    document.getElementById("roomPrice").textContent = totalPrice.toLocaleString() + " ₽"; // Добавляем пробелы для тысяч и символ валюты
                } else {
                    // Если дата выезда раньше или равна дате заезда, выводим сообщение об ошибке
                    alert("Дата выезда должна быть позже даты заезда.");
                }
            }
        
            // Добавляем обработчик изменения дат
            document.getElementById("checkoutDate").addEventListener("change", calculatePriceAndNights);
            document.getElementById("checkinDate").addEventListener("change", calculatePriceAndNights);
        
            // Вызываем функцию при загрузке страницы, чтобы обновить стоимость и количество ночей, если даты уже выбраны
            calculatePriceAndNights();
        </script>
        

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