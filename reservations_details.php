<?php
session_start();

if ($_SESSION["user_id"] != "admin") {
    header('Location: login_admin.php');
    exit;
}
$mysqli = require __DIR__ . "/database.php";
                                              
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/admin_table.css">

    <title>Reservations</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5"><a href="reservations_details.php" class="more">Reservations</a> | <a href="contact_details.php" class="more">Contact Requests</a> | <a href="logout_admin.php" class="more">Logout</a></h2>
      

      <div class="table-responsive">

        <table class="table table-striped custom-table">
          <thead>
            <tr>
              
              <th scope="col">Full Name</th>
              <th scope="col">Contact Number</th>
              <th scope="col">Reservation Time</th>
              <th scope="col">Email Address</th>
              <th scope="col">Number of Guests</th>
              <th scope="col">Message</th>
            </tr>
          </thead>
          <tbody>
          <?php
    $sql = "SELECT * FROM reservations ORDER BY reservations.id DESC";

$result = mysqli_query($mysqli, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
  ?>
            <tr scope="row"> 
                      <td>
                      <?php echo $row['name']; ?>
                      </td>
                      <td><?php echo $row['phonenum']; ?></td>
                      <td>
                      <?php echo $row['date']; ?>
                        <small class="d-block"><?php echo $row['time']; ?></small>
                      </td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['guests']; ?></td>
                      <td><?php echo $row['message']; ?></td>
            
            </tr>
            <?php 
        }
    }
    ?>
            
          </tbody>
        </table>
      </div>


    </div>

  </div>
    
    
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>