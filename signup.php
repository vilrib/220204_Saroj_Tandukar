<!doctype html>
<html lang="en">
  <head>
  	<title>Signup</title>
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
			      			<h3 class="mb-4">Sign Up</h3>
							<form action="process-signup.php" method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Full Name</label>
			      			<input type="text" name="name" class="form-control" placeholder="e.g. Tony Stark" required>
			      		</div>
						  <div class="form-group mb-3">
							<label class="label" for="uname">Username</label>
							<input type="text" name="uname" class="form-control" placeholder="e.g. therealironman" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="email">Email Address</label>
							<input type="email" name="email" class="form-control" placeholder="e.g. tonythebillionaire@stark.com" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="phonenum">Phone Number</label>
							<input type="number" name="phonenum" class="form-control" placeholder="e.g. 9812121212" required>
						</div>

		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
		            </div>
		          </form>
		          <p class="text-center">Already have an account?? <a href="login.php">Login</a> | <a href="index.php">Go Home</a></p>
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

