<?php
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
$query = "SELECT * FROM stage_tbl";
$dataset = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stage List</title>
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
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h4><b>Stage List</b></h4>
</div>
<div class="panel-body">
		<a href='add stage.php'><button style="font-size: 14px; width: 100px; float:right; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'">Add Stages</button></a><br><br>
<table style='width:100%; border:#43a286;' border="2">
	<tr style="background-color:#43a286; color:white; height:40px;">
		<th style="text-align:center; width:61%;">Stage</th>
		<th style="text-align:center;">Price</th>
		<th style="text-align:center;">Option</th>
	</tr>
	<?php while($row = mysqli_fetch_assoc($dataset)){ ?>
	<tr style="height:40px;">
    <td><img src='<?php echo $row['image']; ?>' width="100px" height="100px"></td>
		<td style="text-align:center"><?php echo $row['price']; ?></td>
		<td style="text-align:center">
		        <a href='update stage.php?id=<?php echo $row['stage_id'];?>'><button style="font-size: 14px; width: 70px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'">Edit</button></a>
        <a href='delete stage.php?id=<?php echo $row['stage_id'];?>'><button style="font-size: 14px; width: 70px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'">Delete</button></a>
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
