<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if ($conn) {
} else {
	print('Could not connect: ');
	exit;
}
$query = "SELECT * FROM reservation_tbl ORDER by date DESC limit 16";
$dataset = mysqli_query($conn, $query);
?>
<?php
if (isset($_POST['search'])) {
	$valueToSearch = $_POST['valueToSearch'];
	$query1 = "SELECT * FROM reservation_tbl WHERE (`date`) LIKE '%" . $valueToSearch . "%'";
	$dataset = filterTable($query1);
} else {
	//$query1 = "SELECT * FROM wedding_reservation";
	//$dataset1 = filterTable($query1);
}
function filtertable($query1)
{
	$conn = mysqli_connect('localhost', 'root', '', 'food_order');
	$filter_Result = mysqli_query($conn, $query1);
	return $filter_Result;
}
?>





<html>

<head>
	<title>Booking List</title>
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
	<page size="A4">
		<div class="container-fluid"><center>
			<div class="container border border-3 rounded-3" style="padding: 15px; margin: 10px;">
				
				<center>
					<h1 style="padding: 0px;margin: 0px; ">Booking List</h1>
				</center>
			</div>
			</center>
			<form action="view_booking_list.php" style="float:right" method="post">
				<input style=" border-radius:6px; height:20px" type="text" name="valueToSearch" required="required" placeholder="YYYY-MM-DD">
				<input type="submit" name="search" style="font-size: 12px; width: 105px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="Search">
			</form>
			<table style='width:100%; border: 1px solid black;  border-radius:5px' style="margin: 10px;" >
				<tr style="background-color:#000; color:white; height:40px;  border: 1px solid black ; border-radius:5px" style="margin: 10px;">
					<th style="text-align:center">Name</th>
					<th style="text-align:center">Date</th>
					<th style="text-align:center">Time</th>
					<th style="text-align:center">Ocassion</th>
				</tr>

				<?php while ($row = mysqli_fetch_assoc($dataset)) { ?>
					<tr style="height:40px;">
						<td style="text-align:center"><?php echo $row['name']; ?></td>
						<td style="text-align:center"><?php echo $row['date']; ?></td>
						<td style="text-align:center"><?php echo $row['time']; ?></td>
						<td style="text-align:center"><?php echo $row['ocassion']; ?></td>
					</tr>

				<?php } ?>
			</table>
		</div>
	</page>
</body>

</html>