<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if ($conn) {
} else {
	print('Could not connect: ' . mysql_error());
	exit;
}

if (isset($_REQUEST['submit'])) {
	$date = $_REQUEST["date"];
	$name = $_REQUEST["name"];
	$phone = $_REQUEST["phone"];
	$email = $_REQUEST["email"];
	$message = $_REQUEST["message"];
	$query = "INSERT INTO contact_tbl SET email = '$email', `message` = '$message', name = '$name', phone = '$phone', date = '$date'";
	mysqli_query($conn, $query);
	echo '<script>alert("Your Message have been sent")</script>';
	echo "<script>window.location = 'contact_us.php' </script>";
	//$message = "Your Message have been sent";
	//print($message);//email send
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Contact Us!</title>
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
	<div class="container">
		<div class="row jumbotron" style="background:white;">
			<div class="col-sm-12 border border-4 rounded rounded-3 bg-dark" style="padding: 10px; margin: 10px;">
				<div class="panel panel-primary border bg-light border border-4 rounded rounded-3" style="margin: 10px; padding: 10px;">
					<div class="panel-heading border border-4 rounded rounded-3 text-center bg-dark" style="margin: 10px; padding: 10px; color:white">
						<h4><b>Contact Us!</b></h4>
					</div>
					<div class="panel-body row">
						<div class="col">
						<center><p style=" font-family:georgia;"><h3>Direct Message</h3></p><br></center>
							<form style=" margin-top:2%;" action="contact_us.php" method="post">
								Date:<br>
								<input style="border-radius: 6px; width:165px;" type="date" name="date" required="required"><br><br>
								Name:<br>
								<input style="border-radius: 6px; width:165px;" type="text" name="name" required="required" placeholder="Enter your Name"><br><br>
								Phone:<br>
								<input style="border-radius: 6px; width:165px;" type="text" name="phone" required="required" placeholder="Enter Your Number"><br><br>
								Email:<br>
								<input style="border-radius: 6px; width:165px;" type="email" name="email" required="required" placeholder="Enter your Email"><br><br>
								Message:<br>
								<textarea style=" border-radius: 6px" name="message" cols="21" rows="10" placeholder="Type Your Message!" required="required"></textarea><br><br>
								<input type="submit" name="submit" style="float: left; font-size: 14px;  margin-top: 2px; width: 120px; background: #43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="SEND"><br>
							</form>

						</div>
						<div class="col">
							<center>
								<h3><b>Phone numbers</b></h3>
							</center>
							<p>Cell No#.<br>+923147897256<br>
								+923081412977<br></p>
							<p style="font-size:16px;"><br>
								
							</p>
							<center>
							<p><h3>Email:</h3></p></center>
							<p style="font-size:16px;">onlinereservation@gmail.com</p><br>
							<center><h3>Address:</h3></center>
							<p style="font-size:16px;">Layyah<br>
								Layyah, Pak</p>

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