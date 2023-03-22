<?php
if(isset($_POST["submit"])){
$username ="923136350169";
$password = "6432";
$mobile = $_POST['mobile'];
$sender = "Online Food Ordering";
$message = $_POST['message'];
$url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".$sender."&message=".urlencode($message)." ";

$ch = curl_init();
$timeout = 30;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$responce = curl_exec($ch);
curl_close($ch);
/*Print Responce*/
echo $responce;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMS</title>
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
<div class="col-sm-3">
</div>
<div class="col-sm-6">
<div class="panel panel-primary">
<div class="panel-heading">
<h4><b>SMS</b></h4>
</div>
<div class="panel-body">
<div class="col-sm-12">
<form action="http://sendpk.com/api/sms.php" method="POST" style="margin-top:10%; margin-left:10%;">
	<label>Username:</label><br>
	<input style="width:70%; height:30px; margin-left:5.5%; border-radius: 6px" type="text" name="username" value="923457209200" /><br /><br />
    
    <label>Password:</label><br>
	<input style="width:70%; height:30px; margin-left:5.5%; border-radius: 6px" type="text" name="password" value="4937" /><br /><br />
    
	<label>Sender:</label><br>
	<input style="width:70%; height:30px; margin-left:5.5%; border-radius: 6px" type="text" name="sender" value="Decent Palace" /><br /><br />

	<label>Mobile:</label><br>
	<input style="width:70%; height:30px; margin-left:4.8%; border-radius: 6px" type="text" name="mobile" required="required"/><br /><br />

	<label>Message:</label><br>
	<input style="width:70%; height:30px; margin-left:4.8%; border-radius: 6px" type="text" name="message" required="required"/><br /><br /><br />
	
	<input type="submit" name="submit" style="float: right; font-size: 14px; margin-right: 26.5%; margin-top: 2px; width: 105px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="SEND"><br>

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
