 <?php
$id = $_REQUEST['id'];
//database connection
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
$query = "DELETE FROM menu_tbl WHERE menu_id = $id";
mysqli_query($conn, $query);
echo "<script>window.location = 'menu list.php' </script>";
?>