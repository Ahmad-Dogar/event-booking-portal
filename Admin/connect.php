<?php


// Create connection


$con=mysql_connect("localhost","root","");
$db=mysql_select_db('food_order',$con);

// Check connection
if (mysql_error())
  {
  echo "Failed to connect to MySQL: " . mysql_error();
  }
//else{echo "connection established";}
?>
