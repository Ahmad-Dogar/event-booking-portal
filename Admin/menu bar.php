<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Document</title>
</head>

<body>
<nav class="navbar navbar-default" style="background-color:#43a286;">
<div class="navbar-header">
<b style="font-size:24px; margin-left:10px; color:white">Menu</b>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navmenu">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>

</button>
</div>
<div id="navmenu" class="collapse navbar-collapse">
	<ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="menu list.php">Menu</a></li>
      <li><a href="stage list.php">Stage</a></li>
      <li><a href="photo list.php">Photo Gallery</a></li>
      <li><a href="news list.php">News Update</a></li>
      <li><a href="feedback list.php">Feedback</a></li>
      <li><a href="contact list.php">Contact</a></li>
      <li><a href="sms.php">SMS</a></li>
      <li><a href="login.php?action=logout">Logout</a>
      <?php
		
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
	if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
	 
		session_start();
		if(!isset($_SESSION["is_admin_login"])){
			//echo "You need to login to view this page...";
			echo "<script>window.location = 'login.php' </script>";
			exit;
		}
		?></li>
    </ul>
</div>
</nav>
</body>
</html>
