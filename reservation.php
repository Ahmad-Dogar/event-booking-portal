<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if ($conn) {
} else {
	print('Could not connect: ');
	exit;
}

if (isset($_POST["submit"])) {
	$name = $_POST["name"];
	$CNIC = $_POST["CNIC"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$date = $_POST["date"];
	$time = $_POST["time"];
	$guest = $_POST["guest"];
	$ocassion = $_POST["ocassion"];
	$chair = $_POST["chair"];
	

	$sql="SELECT * from reservation_tbl where date='$date'";

	$sql=mysqli_query($conn,$sql);
	if(mysqli_num_rows($sql) <=4){
		$morning=0;
		$eve=0;
		
	while($row=mysqli_fetch_assoc($sql)){
		
		if($row['time']=='Morning'){
			$morning=$morning+1;
		}
		else
		{
			$eve=$eve+1;
		}
	}
	

	if(($morning>=2 && $time=="Morning")){
		
		//echo '<script>alert("MORNING HALL IS FULL")</script>';
		echo '<html><div class="alert alert-danger" role="alert">
		<h4 class="alert-heading">Sorry!</h4>
		<p>Already Reserved at Morning.</p>
		<hr>
		<p class="mb-0">Please try in the Evening or on an-other Date.</p>
	  </div></html>';
		
	}
	elseif(($eve>=2 && $time=="Evening")){
		//echo '<script>alert("EVENING HALL IS FULL")</script>';
		echo '<html><div class="alert alert-danger" role="alert">
		<h4 class="alert-heading">Sorry!</h4>
		<p>Already Reserved in Evening.</p>
		<hr>
		<p class="mb-0">Please try in the Morning or on  an-other Date.</p>
	  </div></html>';
	}
	elseif(($morning>=2) && ($eve>=2)){
		//echo '<script>alert("TODAY HALL IS FULL BOOK")</script>';
		echo '<html><div class="alert alert-danger" role="alert">
		<h4 class="alert-heading">Opsss!</h4>
		<p>Already Reserved at this Date.</p>
		<hr>
		<p class="mb-0">Please try an-other Date.</p>
	  </div></html>';
	}
	else{
		$result = mysqli_query($conn, "SELECT * FROM reservation_tbl WHERE CNIC = '$CNIC' && ocassion = '$ocassion'");
		$data = mysqli_num_rows($result);
	
		if (($data) == 0) {
			$query = "INSERT INTO reservation_tbl SET name = '$name', CNIC = '$CNIC', phone = '$phone', email = '$email', address = '$address', date = '$date', time = '$time', guest = '$guest', ocassion = '$ocassion', chair = '$chair',transaction_id ='1'";
			$query=mysqli_query($conn, $query);
	if($query){
		//echo '<script>alert("Information Inserted Successfully")</script>';
		echo "<script>window.location = 'menu.php?cnic=$CNIC' </script>";
	}
			
		} else {
			echo '<script>alert("User Already Exist")</script>';
			echo "<script>window.location = 'reservation.php' </script>";
		}
		exit;
		
	
	}
	}
	else{
	//	echo '<script>alert("FUNCTION HALL ALREADY BOOKED")</script>';
		echo '<html><div class="alert alert-danger" role="alert">
		<h4 class="alert-heading">Opsss!</h4>
		<p>Already Reserved at this Date.</p>
		<hr>
		<p class="mb-0">Please try an-other Date.</p>
	  </div></html>';
	}
	
	
}

?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

</head>

<body>

	<?php
	include_once 'navigation_bar.php';
	?>

	

	<div class="container " >
		<div class="row-jumbotron">
			<div class="container border border-5 rounded rounded-3 text-center bg-success" b style="font-size:20px; margin-bottom: 10px; margin-top: 10px ; padding: 10px;"><a style="color:black" href="view_booking_list.php">View Booking List</a></div>
		</div>
	</div>
			<div class="container bg-dark border border-5 rounded rounded-3" style="color:white ">
	Your progress of reservation
	<div class="progress" style="  margin:5px">
  <div class="progress-bar bg-success"  role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
  
</div>
	</div>
			<div class="container  ">
				<div class="panel panel-primary col-jumbotron">
					<div class="container border border-5 rounded rounded-3 bg-dark " style="margin-top: 10px ;margin-bottom: 10px ; color:white; padding: 5px;">
						<div class="panel-heading text-center">
							<h4><b>Reservation Form</b></h4>
						</div>
						<div class="row " style="margin:4px;">

							<div class="panel-body border border-3 rounded rounded-3 col bg-light " style="color:black; margin:4px">

								<div class="col-sm-6">
									<p style="font-family:georgia;">
									<h5><b>Personal details</b></h5>
									</p><br>
									<form action="reservation.php" method="post">
										<b>Your Name:</b><br><input style="width:165px; border-radius: 6px; " type="text" name="name" required="required" placeholder="Enter Your Name"><br><br>
										<b>Your CNIC:</b><br><input style="width:165px; border-radius: 6px;" type="number" name="CNIC" pattern='\d{5}\-\d{7}\-\d{1}' title="Example: 12345-1234567-1"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
										 oninput=" javascript: if (this.value.length < this.minLength) this.value = this.value.slice(0, this.minLength);" placeholder="xxxxx-xxxxxxx-x"  maxlength = "13" minlength="13"
										required="required"><br><br>
										<b>Your Telephone / Mobile:</b><br><input style="width:165px; border-radius: 6px;" type="number" name="phone" pattern='\d{11}' title="Example: 12345678901" required="required" placeholder="Enter Your Contact no."><br><br>
										<b>Your Email:</b><br><input style="width:165px; border-radius: 6px;" type="email" name="email" required="required" placeholder="Enter Your Email"><br><br>
										<b>Your Postal Address:</b><br><input style="width:165px; border-radius: 6px;" type="text" name="address" required="required "  placeholder="Enter Your Adress"><br><br>

								</div>
							</div>

							<div class="col border border-3 rounded rounde-3 bg-light" style="padding-bottom: 5px; color:black;margin: 4px; ">
								<p style=" font-family:georgia;"><b>
										<h5>Reservation details</h5>
									</b></p><br>

								<b>Date:</b><br><input id="date" style="width:165px; border-radius: 6px;" type="date" name="date" required="required"><br><br>
								<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date').attr('min',today);
</script>

								<b>Time:</b><br><select style="width:165px; border-radius: 6px; " name="time" required="required">
								<option value="" disabled selected hidden>Select Time</option>
								<option>Morning</option>
								<option>Evening</option></select><br><br>
								<b>No. of Guest:</b><br>Not less then 50 will be Entertained<br>
								<input style="width:165px; border-radius: 6px; " type="number" name="guest" min="50" max="500" pattern='\d*' title="only enter integer" required="required"><br><br>
								<b>Ocassion:</b><br><select style="width:165px; border-radius: 6px;" name="ocassion" placeholder="Ocassion" required="required" >
								
								<option value="" disabled selected hidden>Select Ocassion</option>
									<option>Engagement</option>
									<option>Nikaah</option>
									<option>Mahandi</option>
									<option>Baraat</option>
									<option>Valima</option>
									<option>Birthday</option>
									<option>Meetings</option>
									<option>Seminor</option>
									<option>Dinner Party</option>
									<option>Others</option>
								</select><br><br>

								
								<b>Chair Cover Color:</b><br><select style="width:165px; border-radius: 6px;" name="chair" placeholder="Cover Color" required="required">
								<option value="" disabled selected hidden>Select Chair Color</option>
									<option>Golden</option>
									<option>White</option>
									<option>Red</option>
									<option>Black</option>
									<option>Yellow</option>
									
								</select><br>

							</div>
						</div>
						<div class="container text-center">
							<input type="submit" name="submit" style=" font-size: 14px; margin: 20px; width: 120px; background: #43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="Reserve"><br>
							</form>
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