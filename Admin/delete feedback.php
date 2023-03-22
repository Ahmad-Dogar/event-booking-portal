 <?php
$id = $_REQUEST['id'];
//database connection
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
$query = "DELETE FROM feedback_tbl WHERE user_id = $id";
mysqli_query($conn, $query);
echo "<script>window.location = 'feedback list.php' </script>";
?>