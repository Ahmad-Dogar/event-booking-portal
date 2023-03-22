<?php
if(isset($_REQUEST["submit"])) {
	$menu = $_REQUEST["menu"];
	$price = $_REQUEST["price"];
	//$detail = $_REQUEST["detail"];
	 $conn = mysqli_connect('localhost', 'root', '', 'decent');
	 if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
	 $query = "INSERT INTO  menu_tbl SET menu = '$menu' ,price = '$price'";
	 mysqli_query($conn, $query);
	 echo "<script>window.location = 'menu list.php' </script>";
	 //print("Product saved");
	// print("<a href='listing_product.php'>Back to Listing</a> <br>");
	//exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Menu</title>
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
<div class="col-sm-6">
<div class="panel panel-primary">
<div class="panel-heading">
<h4><b>Wedding Menu</b></h4>
</div>
<div class="panel-body">
<div class="col-sm-12">
<form action="add menu.php" method="post" enctype="multipart/form-data" style="margin-top:10%; margin-left:10%;">

	<label>Menu:</label><br>
	<input style="width:70%; height:30px; margin-left:5.5%; border-radius: 6px" type="text" name="menu" required="required"/><br /><br />

	<label>Price:</label><br>
	<input style="width:70%; height:30px; margin-left:4.8%; border-radius: 6px" type="text" name="price" required="required"/><br /><br />

	<!--<label>Detail:</label>
	<textarea  style="width:60%; height:170px; margin-left:3%; border-radius: 6px" name="detail" required="required"></textarea><br /><br /><br>-->
	
	<input type="submit" name="submit" style="float: right; font-size: 14px; margin-right: 26.5%; margin-top: 2px; width: 105px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="SAVE" onClick="button()"><br>

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
