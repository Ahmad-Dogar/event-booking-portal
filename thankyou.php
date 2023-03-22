<?php

session_start();
$where = '';
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if ($conn) {
} else {
  print('Could not connect: ');
  exit;
}
$query = "SELECT * FROM news_tbl $where";
$dataset01 = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Event Booking Portal</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>

  <?php
  include_once 'navigation_bar.php';
  ?>

    <div class="container-fluid" style="padding: 10px; margin:10px">
      <div class="row jumbotron bg-dark border border-5 rounded rounded-3" style="color:white; padding:10px; margin: 10px;">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4><b>Thankyou...!</b></h4>
            </div>
            <div class="panel-body">
              <p>You have compleated your Reservation. Your Reservations will be Confermed by the admin through SMS ASAP Inshallah.</p>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                <div class="panel panel-primary">
                  <div class="panel-body">

                  <div class="container bg-white border border-5 rounded rounded-3" style=" color:seagreen;margin-top: 10px">
	                    Your progress of reservation
	                    <div class="progress" style="margin:5px">
                        <div class="progress-bar bg-success"  role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
  
</div>
                  </div>
                  <br><br>
                  <button type="button" class="btn btn-outline-success">Home</button>
                  <a button type="button" class="btn btn-outline-success" href="print_reservation">Check Your Reservations</a></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>







<div class="container-fluid">
      <?php
      include_once 'footer.php';
      ?>
    </div>

</body>

</html>