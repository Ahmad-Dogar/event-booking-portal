<?php
if(isset($_REQUEST["submit"])) {
	//print_r($_FILES);
	//picture uploading code
	//print_r($_FILES['myimage']);
	$targetfolder = "images/";
	$imagepath = $targetfolder . $_FILES['myimage']['name'] ;
	if(move_uploaded_file($_FILES['myimage']['tmp_name'], $imagepath))
	{ 
		//echo "The file ".  $_FILES['myimage']['name']. " is uploaded";
	 } else {
		 //echo "Sorry file not uploaded";
	 }
	 
	 //database connection
	 $conn = mysqli_connect('localhost', 'root', '', 'food_order');
	 if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
	 $query = "INSERT INTO photo_gallery_tbl SET image = '$imagepath'";
	 mysqli_query($conn, $query);
	 echo "<script>window.location = 'photo list.php' </script>";
	 //print("Product saved");
	 //print("<a href='listing_product.php'>Back to Listing</a> <br>");
	exit;
	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Photo</title>
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
<h4><b>Add Photo</b></h4>
</div>
<div class="panel-body">
<div class="col-sm-12">
<form action="add photo.php" method="post" enctype="multipart/form-data" style="margin-top:5%">

 	<label style=" padding:2%; color:#00795f;"><b>Image:</b></label>
	<input style="font-size:9.5px" type="file" name="myimage" /><br /><br>
  
  <input type="submit" name="submit" style="float: left; font-size: 14px; margin-top: 2px; width: 105px; background: #43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0,    0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="SAVE"><br>
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
