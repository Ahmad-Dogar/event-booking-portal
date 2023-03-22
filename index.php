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
  include_once 'slider.php';
  ?>
  <br>
  <div class="container-fluid border border-3 rounded-3" style="padding: 15px; margin: auto;" ;>
    <div class="row">
      <div class="col">
        <div class="card text-white bg-dark mb-3" style="max-width: auto; height:2in">
          <div class="card-header">Spacious</div>
          <div class="card-body">
            <h5 class="card-title">Marriage Halls</h5>
            <p class="card-text">Royal and Advance Halls right up to your standards</p><br>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-dark bg-light mb-3" style="max-width: auto;height:2in">
          <div class="card-header">Delicious</div>
          <div class="card-body">
            <h5 class="card-title">Food</h5>
            <p class="card-text">Delicious Pakistani dishes are speciality of Decent Palace. Enjoy our tasty menus for your Parties & Other functions.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-white bg-dark mb-3" style="max-width: auto;height:2in">
          <div class="card-header">Advance</div>
          <div class="card-body">
            <h5 class="card-title">Meeting / Conferance Rooms</h5>
            <p class="card-text">We got best Meeting / Conferance rooms in the town.</p>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div class="row jumbotron" style="background:white;">
    <div class="col-sm-8">
      <div class="panel panel-primary  container-fluid border border-5 rounded-3 " style="padding: 10px; margin: 5px;height: 504px;">
        <div class="panel-heading">
          <h4><b>We Welcome You</b></h4>
        </div>
        <div class="panel-body">
          <p style="font-size:14px; text-align:justify">Your wedding day should be the most special day in your life. So, at Decent Palace, we are committed
            to ensuring that everything is planned - down to the smallest detail. And that everything is as perfect as
            you could possibly wish for. We also ensure that on your big day - we take the strain, leaving you to enjoy the
            magic of the moment.<br>
            <br>
            Our wedding portfolio offers you the choice of a wedding in all the grandeur and elegance of a city hotel.<br>
            <br>
            Our range of wedding concepts also allows you to choose between a relaxed beachfront ceremony with a
            floral bower and a champagne toast against the palm trees... or an authentic Maasai ceremony complete<br>
            with
            a guard of honour of warriors, a local chief to bless the ceremony, and a traditional wedding dance or singing
            display.<br />
            <br>
            As to venues, we can offer everything from the rim of the famous Crater - the choice is yours.<br />
            <strong><br />
              Whatever you dream of...we can make it happen</strong><br />
            <strong>Wherever you wish it ... we have the venue </strong>
          </p>
          <br>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class=" border border-4 rounded-3" style="padding: 10px; margin: 5px; width:auto;">
        <div class="panel-heading">
          <h4><b>News Update</b></h4>
        </div>
        <div class="panel-body" style="height:248px;">
          <?php while ($row = mysqli_fetch_assoc($dataset01)) { ?>
            <marquee direction="left">
              <ul>
                <li>
                  <?php echo $row['news']; ?>
                </li>
              </ul>
            </marquee>
          <?php } ?>
        </div>
      </div>

              <?php 
              if(isset($_SESSION["loggedin"])){ ?>
      <div class="panel panel-primary  border border-4 rounded-3 padding:5px bg-dark" style="padding: 5px; margin: 5px; color:white ">
        <div class="panel-heading">
          <h4>Check your Reservation</h4>
        </div>
        <br>
        <div class="panel-body">

        To check or update Your Reservations click the button below.!
          <form action="print_reservation.php" style="margin-top:10px;" method="POST">

            <input type="submit" name="Submit" style=" font-size: 14px;  margin-top: 2px; width: 110px; background:#43a286; color:white ; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" title="click here and check your reservation detail" value="Check">

          </form>
        </div>
      </div>
              <?php 
              }
?>
    </div>
  </div>
  </div>
  <?php
  include_once 'footer.php';
  ?>

</body>

</html>