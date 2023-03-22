<?php
$id = $_REQUEST['id'];
//database connection
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
$query = "DELETE FROM reservation_tbl WHERE id = $id";
mysqli_query($conn, $query);
echo "<script>window.location = 'index.php' </script>";
?>