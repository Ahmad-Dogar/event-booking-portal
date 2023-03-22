<?php
    
$con=mysql_connect("localhost","root","");
$db=mysql_select_db('decent',$con);

// Check connection
if (mysql_error())
  {
  echo "Failed to connect to MySQL: " . mysql_error();
  }
    if(isset($_POST['submit']) && $_POST['submit'] = "submit")
    {
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];

        $result = mysql_query("SELECT password FROM login");

            if(!$result)
            {
                echo "The email entered does not exist!";
            }
            else
            if($password != mysql_result($result, 0))
            {
               /* echo "Entered an incorrect password";*/
            }

            if($newpassword == $confirmnewpassword)
            {
                $sql = mysql_query("UPDATE login SET password = '$newpassword'");      
            }

            if(!$sql)
            {
                echo "Congratulations, password successfully changed!";
            }
            else
            {
                /*echo "New password and confirm password must be the same!";*/
            }
        }     
    ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reset Password</title>
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
<h4><b>Reset Password</b></h4>
</div>
<div class="panel-body">
<div class="col-sm-12">
<form action="reset password.php" name="newprwd" method="post" enctype="multipart/form-data" style="margin-top:7%; margin-left:10%;">

	<label>Current Password:</label><br>
	<input style="width:60%; height:30px; border-radius: 6px" type="password" name="password" required="required" value=""/><br /><br />

	<label>New Password:</label><br>
	<input style="width:60%; height:30px; border-radius: 6px" type="password" name="newpassword" required="required" value=""/><br /><br />

	<label>Confirm New Password:</label><br>
	<input style="width:60%; height:30px; border-radius: 6px" type="password" name="confirmnewpassword" required="required" value=""/><br /><br />
	<!--<label>Detail:</label>
	<textarea  style="width:60%; height:170px; margin-left:3%; border-radius: 6px" name="detail" required="required"></textarea><br /><br /><br>-->
    
	<input type="submit" name="submit" style="float: left; font-size: 14px; margin-top: 2px; width: 105px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="Submit"><br>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row jumbotron" style="background:#43a286;">
<p style="color:#FFFFFF;">Copyright © 2016 <b>Decent Palace, </b>All Rights Reserved. </p>
</div>
</div>

</body>
</html>
