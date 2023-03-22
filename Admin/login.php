<?php
 $conn = mysqli_connect('localhost', 'root', '', 'food_order');
	 if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
	 
session_start();
$message = "";
if(isset($_REQUEST['submit']))
{
	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];
	$query = "SELECT * FROM login WHERE `username` = '$username' AND `password` = '$password' ";
	$dataset = mysqli_query($conn, $query);
	$num_row = mysqli_num_rows($dataset);
	if($num_row == 1) {
	     ($_SESSION["is_admin_login"] = 1);
		echo "Login Success, Please wait redirecting...";
		echo "<script>window.location = 'index.php' </script>";
		exit;
	} else {
		$message = "Invalid Username and Password!";
	}
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "logout"){
	session_destroy();
	$message = "You are Logout successfully!";
}
		?>	 

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
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
<h1 class="" style="padding: 5px;">Event Booking Portal</h1>
</header>
<nav class="navbar navbar-default" style="background-color:#43a286;">

</nav>

<div class="container">
<div class="row jumbotron" style="background:white;">
<div class="col-sm-3">
</div>
<div class="col-sm-6">
<div class="panel panel-primary">
<div class="panel-heading">
<h4><b>Admin Login</b></h4>
</div>
<div class="panel-body">
<div class="col-sm-12">
<form action="login.php" method="post" enctype="multipart/form-data" style="margin-top:10%; margin-left:10%;">

	<label>User Name:</label><br>
	<input style="width:80%; height:30px; margin-left:5.5%; border-radius: 6px" type="text" name="username" required="required"/><br /><br />

	<label>Password:</label><br>
	<input style="width:80%; height:30px; margin-left:4.8%; border-radius: 6px" type="password" name="password" required="required"/><br /><br />

	
	<input type="submit" name="submit" style="float: left; font-size: 14px; margin-left:4.8%; margin-top: 2px; width: 105px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="Login" onClick="button()"><br>

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
