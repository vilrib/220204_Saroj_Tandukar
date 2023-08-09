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
  <div  style="background-image: url(img/reservation.jpg); background-attachment: fixed; height: 600px; width: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">
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
            <span class="font-weight-bold">RESERVATION</span>
          </h1>
        </div>
        <a href="#" class="gotoupbtn"><i class="far fa-arrow-alt-circle-up"></i></a>
      </div>
    </div>
  </header>
  
  <section>
    <div class="container shadow py-5 my-5">
      <div class="row py-3">
        <div class="col-12 text-center px-md-5 px-sm-2 py-3">
          <h4>BOOK A TABLE</h4>
          <p>We look forward to welcoming you back</p>
          <hr>
        </div>
      </div> <!--row end-->
      <div class="row py-3 justify-content-center">
        <div class="col-md-8 col-sm-12">
        <?php if (isset($user)): ?>
          <p>Hello <?= htmlspecialchars($user["name"])?>! Please fill these details to make a reservation.</p>

          <form action="reservation-process.php" method="post">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="numberOfPerson">Number of person</label>
                <select name="guests" class="form-control border-dark" aria-placeholder="Number of person" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
            </div> <!--form-row end-->
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="date">Date</label>
                <input name="date" type="date" class="form-control border-dark" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="time">Time</label>
                <input name="time" type="time" class="form-control border-dark" required>
              </div>
            </div> <!--form-row end-->
            <div class="form-row">
              <div class="col-md-12 col-sm-12">
                <label for="message">Message</label>
                <textarea name="message" name="" class="form-control border-dark">Your messages</textarea>
              </div>
            </div> <!--form-row end-->
            <div class="form-row justify-content-center py-3">
              <div class="col-6 p-2">
                <button type="submit" class="col-12 btn border-dark custom-btn">Submit</button>
              </div>
            </div>
          </form>
        
    <?php else: ?>
          <form action="reservation-process.php" method="post">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="name">Full Name</label>
                <input name="name" type="text" class="form-control border-dark" placeholder="Name" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email Address</label>
                <input name="email" type="email" class="form-control border-dark" placeholder="Email" required>
              </div>
            </div> <!--form-row end-->
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="numberOfPerson">Number of person</label>
                <select name="guests" class="form-control border-dark" aria-placeholder="Number of person" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="phonenum">Phone Number</label>
                <input name="phonenum" type="number" class="form-control border-dark" placeholder="+1*********" required>
              </div>
            </div> <!--form-row end-->
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="date">Date</label>
                <input name="date" type="date" class="form-control border-dark" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="time">Time</label>
                <input name="time" type="time" class="form-control border-dark" required>
              </div>
            </div> <!--form-row end-->
            <div class="form-row">
              <div class="col-md-12 col-sm-12">
                <label for="message">Message</label>
                <textarea name="message" class="form-control border-dark">Your messages</textarea>
              </div>
            </div> <!--form-row end-->
            <div class="form-row justify-content-center py-3">
              <div class="col-6 p-2">
                <button type="submit" class="col-12 btn border-dark custom-btn">Submit</button>
              </div>
            </div>
          </form>
          <?php endif; ?>
        </div>
      </div> <!--row end-->
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