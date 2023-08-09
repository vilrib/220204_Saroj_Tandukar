<?php

$is_invalid = false;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$mysqli = require __DIR__ . "/database.php";

    $username = mysqli_real_escape_string($mysqli,strtolower($_POST['uname']));
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    
    if($username == "admin" && $password == "admin"){
        session_start();  
        session_regenerate_id(); 
        $_SESSION["user_id"] = "admin";
        header('Location: reservations_details.php');
    }
    
    $is_invalid = true;
}
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Admin Login</h3>
							  <h3 class="mb-4"><?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?></h3>
							<form method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="uname">Username</label>
			      			<input type="text" name="uname" class="form-control" placeholder="Username"  required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		          </form>
		          <p class="text-center"><a href="index.php">Go to Website</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	</body>
</html>

