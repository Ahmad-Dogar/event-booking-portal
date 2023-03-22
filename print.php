<center>
	 		<h2>Print your first page this is your latest order</h2>
	 	</center>
	 	<?php
			session_start();

			$conn = mysqli_connect('localhost', 'root', '', 'food_order');
			if ($conn) {
			} else {
				print('Could not connect: ');
				exit;
			}
			
			$CNIC = $_POST['CNIC'];
			$result = mysqli_query($conn, "SELECT * FROM reservation_tbl WHERE CNIC = '$CNIC'");
			$data = mysqli_num_rows($result);
			if (($data) == 0) {
				echo '<script>alert("User Invailid")</script>';
				echo "<script>window.location = 'index.php' </script>";
				
			}
				$query = "SELECT
				reservation_tbl.phone,
				reservation_tbl.CNIC,
				reservation_tbl.name,
				reservation_tbl.email,
				reservation_tbl.address,
				reservation_tbl.date,
				reservation_tbl.time,
				reservation_tbl.guest,
				reservation_tbl.ocassion,
				reservation_tbl.chair,
				select_stage_tbl.stage
				FROM
				reservation_tbl
				INNER JOIN select_stage_tbl ON select_stage_tbl.CNIC= reservation_tbl.CNIC
				WHERE select_stage_tbl.CNIC ='$CNIC'";



			$query1 = "SELECT menu FROM select_menu_tbl WHERE CNIC =  '$CNIC'";
			$query2 = "SELECT sum(menu) FROM select_menu_tbl WHERE CNIC =  '$CNIC'";
			$query3 = "SELECT sum(menu) FROM select_menu_tbl WHERE CNIC =  '$CNIC'";
			$query4 = "SELECT sum(menu) FROM select_menu_tbl WHERE CNIC =  '$CNIC'";
			$ds1 = mysqli_query($conn, $query1);
			$ds2 = mysqli_query($conn, $query2);
			$ds3 = mysqli_query($conn, $query3);
			$ds4 = mysqli_query($conn, $query4);
			$ds = mysqli_query($conn, $query,);
			if (mysqli_num_rows($ds) > 0) {

				while ($data = mysqli_fetch_assoc($ds)) {
					
					
						

		?>
<!DOCTYPE html>
<html>

<head>
<title>Print Profile</title>
				
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" style=" margin:0px">

    
  
					 
	 				
	 			<style>
	 					

	 					hr {
	 						border-color: #43a286;
	 					}

	 					page[size="A4"] {
	 						background: white;
	 						width: 21cm;
	 						height: 26cm;
	 						display: block;
	 						margin: 0 auto;
	 						margin-bottom: 0.5cm;
	 						box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
	 					}

	 					@media print {

	 						body,
	 						page[size="A4"] {
	 							margin: 0;
	 							box-shadow: 0;
	 						}

	 						.printhide {
	 							display: none;
	 						}

	 						.halfbox {
	 							width: 20cm;
	 							height: 11.5cm;
	 							padding: 20px;
	 						}
						}
	 				</style>
	 			</head>

	 			<body>
	 				
	 				<page size="A4">
	 					<div class="halfbox">
	 						<center>
	 							<h1 style="padding: 8px;">Event Booking Portal</h1>
	 						</center>

	 						<center>
	 							<h3 style="padding: 8px;margin: 8px; color:#00795f;">Order Details</h3>
	 						</center>

	 						<hr>
	 						<table width=100% style="padding:10px">

	 							<tr>
	 								<td><b>Name:</b></td>
	 								<td><?php echo $data["name"]; ?></td>
	 								<td><b>N.I.C:</b></td>
	 								<td><?php echo $data["CNIC"]; ?></td>
	 							</tr>
	 							<tr>
	 								<td><b>Phone:</b></td>
	 								<td><?php echo $data["phone"]; ?></td>
	 								<td><b>Email:</b></td>
	 								<td><?php echo $data["email"]; ?></td>
	 							</tr>
	 							<tr>
	 								<td><b>Address:</b></td>
	 								<td><?php echo $data["address"]; ?></td>
	 								<td><b>Date:</b></td>
	 								<td><?php echo $data["date"]; ?></td>
	 							</tr>
	 							<tr>
	 								<td><b>Time:</b></td>
	 								<td><?php echo $data["time"]; ?></td>
	 								<td><b>Guest:</b></td>
	 								<td><?php echo $data["guest"]; ?></td>
	 							</tr>
	 							<tr>
	 								<td><b>Ocassion:</b></td>
	 								<td><?php echo $data["ocassion"]; ?></td>
	 								<td><b>Chair Color:</b></td>
	 								<td><?php echo $data["chair"]; ?></td>
	 							</tr>
	 							<tr>
	 								<td><b>Stage:</b></td>
	 								<td><img src='Admin/<?php echo $data['stage']; ?>' width="150"></td>
	 							</tr>
	 						</table><br><br>
	 						<table width="100%">
	 							<tr>

	 								<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	 								<td><b style="font-size:18px">Your Select Item:</b><br><br><?php while ($row = mysqli_fetch_assoc($ds1)) {  ?>
	 										<span class='title' style="font-size:18px">Rs.<?php echo $row['menu']; ?></span><br>
	 									<?php } ?><br>
	 									<?php while ($row = mysqli_fetch_assoc($ds2)) {  ?>
	 										<span class='title' style="font-size:18px"><b>Menu Item Price : &nbsp;&nbsp;&nbsp;Rs.</b>&nbsp; <?php echo $row['sum(menu)']; ?>/=P.H </span><br>
	 									<?php } ?><br>
	 									<?php while ($row = mysqli_fetch_assoc($ds3)){  ?>
	 										<span class='title' style="font-size:18px"><b>Total Menu Price : &nbsp;&nbsp;&nbsp;</b>&nbsp; <?php echo $row['sum(menu)']; ?> x <?php echo $data["guest"]; ?> &nbsp;=&nbsp; <?php echo $row['sum(menu)'] * $data["guest"]; ?> Rs. </span><br>
	 									<?php } ?><br>

	 									<?php while ($row = mysqli_fetch_assoc($ds)) {  ?>
	 										<span class='title' style="font-size:18px"><b>Total Price with Stage : &nbsp;&nbsp;&nbsp;Rs.</b>&nbsp;<?php echo $row['sum(menu)'] * $data["guest"]; ?> +  <?php echo $row['price']; ?> </span><br>
	 									<?php } ?><br>
	 								</td>
	 							</tr>
				
	 							<tr>
	 								<td colspan="4">
	 									<br><br>
	 									<b>Instruction:</b>
	 									<p>This print form for customer's Knowledge.
	 										Advance payment should be pay within 24 hours otherwise your reservation will be cancelled.
	 									</p>
	 								</td>
	 							</tr>

	 						</table>
	 					</div>
	 				</page><center>
					 <div class="printhide">
	 					<center>

	 						<button onClick="window.print()" style="padding: 10px; background-color:#43a286;color:white;font-weight: bold;font-size: 16px;">Print Form</button>
	 						<a href="menu_edit.php?cnic=<?php echo $CNIC; ?>"><button style="padding: 10px; background-color: white; color:#43a286;font-weight: bold;font-size: 16px;">Edit Menu</button></a>
	 						<br>
	 					</center>
	 				</div></center>
	 			</body>

	 			</html>
	 	<?php


										 }
			
			}

			?>