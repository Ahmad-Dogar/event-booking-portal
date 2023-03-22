
	 	<?php
			

			$conn = mysqli_connect('localhost', 'root', '', 'food_order');
			if ($conn) {
			} else {
				print('Could not connect: ');
				exit;
			}
			
			$CNIC = $_POST['CNIC'];
			$result = mysqli_query($conn, "SELECT * FROM reservation_tbl WHERE CNIC = '$CNIC'");
			$data = mysqli_num_rows($result);
			
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

    
  
					 
	 			<body>	
	 		
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
				
	 							
	 			</body>

	 			</html>
	 	<?php


										 }
			
			}

			?>