<?php
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
	 
$id = $_REQUEST['id'];
$query = "SELECT * FROM stage_tbl WHERE stage_id = $id";
$dataset =	mysqli_query($conn, $query);
$product_data = mysqli_fetch_assoc($dataset);
if(isset($_REQUEST["submit"])) {
	$price = $_REQUEST["price"];
	 $query = "UPDATE stage_tbl SET price = '$price' WHERE stage_id=$id";
	 mysqli_query($conn, $query);
	echo "<script>window.location = 'stage list.php' </script>";
	exit;
	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Stage</title>
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
	<h1 style="color: white;"> Online Reservation System </h1>
</header>
<?php
include_once'menu bar.php';
?>

<div class="container">
<div class="row jumbotron" style="background:white;">
<div class="col-sm-3">
</div>
<div class="col-sm-5">
<div class="panel panel-primary">
<div class="panel-heading">
<h4><b>Update Stage</b></h4>
</div>
<div class="panel-body">
<div class="col-sm-12">
<form action="update stage.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" style="margin-top:8%; margin-left:5%;">
	<label>Stage:</label><br>
<img style="width:50%" src="<?php echo $product_data['image'] ?>">
	<br /><br />
	<label>Price:</label><br>
	<input style="width:165px; height:30px; border-radius: 6px" type="text" name="price" value='<?php echo $product_data['price']; ?>'/><br /><br />
	<input type="submit" name="submit" style="float: left; font-size: 14px;  margin-top: 2px; width: 105px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="SAVE" onClick="button()"><br>

</form>
</div>
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
