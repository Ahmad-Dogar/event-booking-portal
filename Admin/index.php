<?php
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
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

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event Booking Portal </title>
<link rel="shortcut icon" href="img/fevicon icon.png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-state=1"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="css/override.css">
<!--<link rel="stylesheet" href="css/slider.css" />-->
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>

<body>
<header>
	<h1 style="color: white;"> Event Booking Portal </h1>
</header>
<?php
include_once'menu bar.php';
?>

<div class="container">
<div class="row jumbotron" style="background:white;">
<div class="col-sm-4">
<div class="panel panel-primary">
<div class="panel-heading">
<h4><b>Search Orders</b></h4>
</div>
<div class="panel-body">
		<form action="index.php" style="margin-top:10px;"  method="post">
        <input style="width:100%; border-radius:4px;" type="text" name="valueToSearch" required="required" placeholder="YYYY-MM-DD"><br><br>
        <input type="submit" name="search" style="float: left; font-size: 14px; margin-top: 2px; width: 105px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="Search"><br>
        </form>
</div>
</div>
</div>
<div class="col-sm-4">
</div>
<div class="col-sm-4">
<div class="panel panel-primary">
<div class="panel-heading">
<h4><b>Check More Detail</b></h4>
</div>
<div class="panel-body">
		<center><form action="print.php" style="margin-top:10px;" method="POST">
          <input style="width:100%; border-radius:4px;" type="numeric" name="CNIC" required="required"  placeholder="Enter CNIC"><br><br>
            </center>
	<input type="submit" name="Submit" style=" font-size: 14px;  margin-top: 2px; width: 110px; background:#43a286; color:white ; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" title="click here and print reservation detail" value="Check">
            
	</form>
</div>
</div>
</div>

<div class="container-fluid   col-sm-12 ">
<div class="panel panel-primary">
<div class="panel-heading">
<h4><b>Reservation List</b></h4>
</div>
<div class="panel-body">
<table style='width:100%; border:#43a286;' border="2" >
	<tr style="background-color:#43a286; color:white; height:40px;">
		<th style="text-align:center">CNIC</th>
		<th style="text-align:center">Name</th>
		<th style="text-align:center">Phone</th>
        <th style="text-align:center">Email</th>
        <th style="text-align:center">Address</th>
        <th style="text-align:center">Date</th>
        <th style="text-align:center">Time</th>
        <th style="text-align:center">Guest</th>
        <th style="text-align:center">Ocassion</th>
        <th style="text-align:center">Chair Cover</th>
		<th style="text-align:center">Transaction ID</th>
		<th style="text-align:center">Delete Reservation</th>
	</tr>
	
	<?php while($row = mysqli_fetch_assoc($dataset)){ ?>
	<tr style="height:40px;">
		<td style="text-align:center"><?php echo $row['CNIC']; ?></td>
        <td style="text-align:center"><?php echo $row['name']; ?></td>
        <td style="text-align:center"><?php echo $row['phone']; ?></td>
        <td style="text-align:center"><?php echo $row['email']; ?></td>
        <td style="text-align:center"><?php echo $row['address']; ?></td>
        <td style="text-align:center"><?php echo $row['date']; ?></td>
        <td style="text-align:center"><?php echo $row['time']; ?></td>
        <td style="text-align:center"><?php echo $row['guest']; ?></td>
        <td style="text-align:center"><?php echo $row['ocassion']; ?></td>
		<td style="text-align:center"><?php echo $row['chair']; ?></td>
		<td style="text-align:center"><?php echo $row['transaction_id']; ?></td>

		<td style="text-align:center ;margin: 3px; padding:auto">
		 <a href='del_reservation.php?id=<?php echo $row['id'];?>'><button style="font-size: 14px; width: 70px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'">Delete</button></a> 
		</td>
	</tr>

<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>

<div class="container-fluid">
<?php
include_once'footer.php';
?>
</div>
</body>
</html>
