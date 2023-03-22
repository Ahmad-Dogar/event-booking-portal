<?php
 $conn = mysqli_connect('localhost', 'root', '', 'food_order');
if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
$CNIC = $_POST['CNIC'];
$query ="SELECT
reservation_tbl.CNIC,
reservation_tbl.phone,
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
$ds1 = mysqli_query($conn, $query1);
$ds2 = mysqli_query($conn, $query2);

//print($query );
	 $ds = mysqli_query($conn, $query);
 if(mysqli_num_rows($ds) > 0) {
	 $data = mysqli_fetch_assoc($ds);
	// print_r($data);
	 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Print Profile</title>
<link rel="shortcut icon" href="img/fevicon icon.png">
	<style>
body {
  background: #00795f; 
}
hr{
border-color:#43a286;
}
page[size="A4"] {
  background: white;
  width: 21cm;
  height: 26cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
@media print {
	body, page[size="A4"] {
		margin: 0;
		box-shadow: 0;
	}
	.printhide {
		display:none;
	}

.halfbox{
	  width: 20cm;
	  height: 11.5cm;
	  padding:20px;
	}
	

</style>	
</head>
     <body>
	 <div class="printhide">
	 </div>
		<page size="A4">
		<div class="halfbox">

	<h1 style="color: white;"> Online Reservation System </h1>
<br>
			<center><h1 style="color:#00795f;">Decent Palace</h1></center>

			<center><h3 style="padding: 0px;margin: 0px; color:#00795f;">Reservation Details</h3></center>

			<hr >
			<table width="100%">
                <tr>
                	<td><b>N.I.C:</b></td>
					<td><?php echo $data["CNIC"]; ?></td>
				</tr>
                <tr>
					<td><b>Stage:</b></td>
                    <td><img src='<?php echo $data['stage']; ?>' width="150"></td>
				</tr>
                </table><br><br>
                <table width="100%">
                <tr>
                <td>
                <b>Your Select Item:</b></td>
                <td><?php while($row = mysqli_fetch_assoc($ds1)){  ?>
					 <span class='title' style="font-size:18px">Rs.<?php echo $row['menu']; ?></span><br>
					<?php } ?><br>
                    <?php while($row = mysqli_fetch_assoc($ds2)){  ?>
					 <span class='title' style="font-size:18px">Total : Rs.<strong></strong><?php echo $row['sum(menu)']; ?>/=P.H </span><br>
					<?php } ?><br>
                </td>
                </tr>
			</table>
		</div>
		</page>
    </body>
</html>