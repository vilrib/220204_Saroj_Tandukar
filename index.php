<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel = "icon" type = "image/png" href = "img/favicon.jpg">
  <link rel="stylesheet" href="style.css">
  <title>Home | Roadhouse Cafe</title>
  
</head>
<body>
  <header>
    <div  style="background-image: url(img/home.jpeg); background-attachment: fixed; height: 600px; width: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">
      <nav class="nav navbar fixed-top navbar-expand-lg navbar-dark p-md-3 bg-dark-transparent">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="img/logo2.png" height="50" alt="Your choise logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active footer-link-item">
                <a class="nav-link text-dark" href="index.php">HOME</a>
              </li>
              <li class="nav-item footer-link-item">
                <a class="nav-link text-dark" href="menu.php">MENU</a>
              </li>
              <li class="nav-item footer-link-item">
                <a class="nav-link text-dark" href="reservation.php">RESERVATION</a>
              </li>
              <li class="nav-item footer-link-item">
                <a class="nav-link text-dark" href="contact.php">CONTACT US</a>
              </li>
              <li class="nav-item footer-link-item">
                <a class="nav-link text-dark" href="about.php">ABOUT US</a>
              </li>
              <?php if (isset($user)): ?>
                <li class="nav-item footer-link-item">
                <a class="nav-link text-dark" href="logout.php"><?= htmlspecialchars($user["uname"]) ?> | Logout</a>
              </li>
        
    <?php else: ?>
      <li class="nav-item footer-link-item">
                <a class="nav-link text-dark" href="login.php">LOGIN</a>
              </li>

        
    <?php endif; ?>
            </ul>
          </div>
        </div> 
      </nav> 
      
      <div class="container flex-column d-flex justify-content-center"style=" height: 600px;">
        <div class="text-center py-4" >
          <h1 class="text-white py-3">
            Welcome to <span class="font-weight-bold">Roadhouse</span> Cafe
          </h1>
          <h3 class="font-weight-normal text-white font-italic">
            Choose Delicious Food With Sweet Memo!
          </h3>
          <div class="p-5">
            <a href="reservation.php" class="btn btn-dark">RESERVATION</a>
          </div>
        </div>
        <a href="#" class="gotoupbtn"><i class="far fa-arrow-alt-circle-up"></i></a>
      </div>
    </div>
  </header>
  
  <section>
    <div class="container">
      <div class="row shadow py-3 my-3">
        <div class="col-12 py-md-5 py-sm-2 px-md-5 px-sm-2 text-center">
          <h3 class="p-3">About us</h3>
          <p>We're the best in our field, and it's all thanks to the incredible relationships we've formed with our clients. Unkike our competitors, we're invested in developing a personal connection with each and every one of our customers, by providing quality service and being available to you 24/7. Get in touch with us when you're ready to learn more: we can't wait to meet you!</p>
          <a href="about.php" class="btn btn-dark">Learn more</a>
        </div>
      </div> 
    </div> 
    <div class="container">
      
      <div class="row shadow py-3 my-3 justify-content-center">
        <div class="col-12 p-3 text-center">
          <h3>Special</h3>
        </div>
        <div class="col-md-3 col-sm-9 text-center p-md-5 p-sm-2">
          <i class="far fa-gem icon-style"></i>
          <h6 class="p-2">Best Quality</h6>
          <p class="text-muted px-2">We guarantee your full satisfaction</p>
        </div>
        <div class="col-md-3 col-sm-9 text-center p-md-5 p-sm-2">
          <i class="far fa-clock icon-style"></i>
          <h6 class="p-2">Fast and Quick Service</h6>
          <p class="text-muted px-2">Our servicemen will always be present to serve you.</p>
        </div>
        <div class="col-md-3 col-sm-9 text-center p-md-5 p-sm-2">
          <i class="fas fa-medal icon-style"></i>
          <h6 class="p-2">Award-winning dishes</h6>
          <p class="text-muted px-2">Our chef's special are regarded highly around the country.</p>
        </div>
        <div class="col-12 text-center">
          <a href="contact.php" class="btn btn-dark">Contact us</a>
        </div>
      </div> 
      <div class="row shadow py-3 my-3">
        <div class="col-12 p-3 text-center">
          <h3>Customer reviews</h3>
        </div>
        <div class="col-md-4 col-sm-12 p-md-5 p-sm-2">
          <div class="d-flex justify-content-center p-3">
            <div class="">
              <img src="img/homepage/awoman.jpg" class="card-img-top circle-img" height="150px" width="150px" alt="awoman">
            </div>
          </div>
          <div class="text-center">
            <h4>Aanchal Sharma Dawadi</h4>
            <p class="font-italic">"Wanted a break from nepali cousin.Being a pizza nerd, Pizza exceeded my expectations. Tried chicken tandoori, pistachio and mortadella half half. My friend tried Mexican and carbonara. My top vote goes to mortadella topping. Crispy and smoky like how wood pizza should be. Nice ambiance too. Went there 3 times in total. The taste consistency varied a bit."</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 p-md-5 p-sm-2">
          <div class="d-flex justify-content-center p-3">
            <div class="">
              <img src="img/homepage/aman2.jpg" class="card-img-top circle-img" height="150px" width="150px" alt="aman2">
            </div>
          </div>
          <div class="text-center">
            <h4>Dave Philip</h4>
            <p class="font-italic">"Great place for the thin crust pizza. I can only speak for the pizza, since that was all I tried.
Quick and good. The though was thin and crispy. The flavor was good too. Decent price, around $10 for a large size, good for 2 people. The place was clean and nice atmosphere. Great ambience.
Service was good.
Easy access, outdoor and indoor seatings."</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 p-md-5 p-sm-2">
          <div class="d-flex justify-content-center p-3">
            <div class="">
              <img src="img/homepage/aman.jpg" class="card-img-top circle-img" height="150px" width="150px" alt="aman">
            </div>
          </div>
          <div class="text-center">
            <h4>Rajesh Hamal</h4>
            <p class="font-italic">"Love the food quality here! Caesar salad is probably the best I had, comparing to other western food restaurants in Thamel. Fish&chips is just nice. Wood fired pizza is also a good choice here. Sizzling brownie with ice cream is a must! Cool & relaxing atmosphere I enjoyed a lot, friendly staffs. Overall, really worth the price. I came here several times for lunch and dinner. Will definitely come back again!"</p>
          </div>
        </div>
      </div> 
    </div> 
  </section>
  
  <footer class="">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 text-center">
          <hr class="pt-5 mt-5">
        </div>
        <div class="col-lg-4 col-md-12 text-center">
          <img src="img/logo1.png" height="150" alt="Your choise logo">
        </div>
        <div class="col-lg-4 col-md-12 text-center">
          <hr class="pt-5 mt-5">
        </div>
      </div> 
      
      
      <div class="row justify-content-center">
        <div class="col-md-9 col-sm-10 px-2 py-3">
          <div class="d-flex justify-content-between py-3 my-2">
            <a href="www.twitter.com" class="icon-link"><i class="fab fa-twitter"></i></a>
            <a href="www.pinterest.com" class="icon-link"><i class="fab fa-pinterest"></i></a>
            <a href="www.instagram.com" class="icon-link"><i class="fab fa-instagram"></i></a>
            <a href="www.facebook.com" class="icon-link"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
      </div> 
      
      <div class="row">
        <div class="col-md-4 col-sm-12 py-4 text-sm-center text-md-left">
          <div class="flex-column">
            <div class="py-2 p-1 m-2"><a href="index.php" class="footer-link-item">HOME</a></div>
            <div class="py-2 p-1 m-2"><a href="menu.php" class="footer-link-item">MENU</a></div>
            <div class="py-2 p-1 m-2"><a href="reservation.php" class="footer-link-item">RESERVATION</a></div>
            <div class="py-2 p-1 m-2"><a href="about.php" class="footer-link-item">ABOUT US</a></div>
            <div class="py-2 p-1 m-2"><a href="contact.php" class="footer-link-item">CONTACT US</a></div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 py-4 text-sm-center text-md-left">
          <div class="flex-column">
            <div class="py-2 p-1 m-2">
              <i class="fas fa-phone-volume fs-30"></i>
              <a href="tel:+977 9820805958"><span class="footer-link-item">+977 98208059583</span></a>
            </div>
            <div class="py-2 p-1 m-2">
              <i class="fas fa-envelope-open-text fs-30"></i>
              <a href="mailto:marketing@roadhousenepal.com"><span class="footer-link-item"> marketing@roadhousenepal.com</span></a>
            </div>
            <div class="py-2 p-1 m-2">
              <i class="fas fa-map-marker fs-30"></i>
              <a href="https://www.google.com/maps/place/Roadhouse+Cafe/@27.7143996,85.307758,17z/data=!3m1!4b1!4m6!3m5!1s0x39eb18fcf090a315:0x4ecba2d034b5135b!8m2!3d27.7143996!4d85.3103329!16s%2Fg%2F1tjgm_wj?entry=ttu"><span class="footer-link-item">Chaksibari Road, Kathmandu 44600</span></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 py-4 text-sm-center text-md-left">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0934902192566!2d85.30775797487861!3d27.714399576178543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcf090a315%3A0x4ecba2d034b5135b!2sRoadhouse%20Cafe!5e0!3m2!1sen!2snp!4v1690561230072!5m2!1sen!2snp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div> 
    </div> 
    <div class="container-fluid bg-footer-dark text-white">
      <div class="row">
        <div class="col-12 text-center py-3 my-2">
          <small>Copyright &copy; 2023 Roadhouse. All rights reserved.</small>
        </div>
      </div>
    </div>
  </footer> 
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  
</body>
</html>