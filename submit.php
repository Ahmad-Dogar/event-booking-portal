<?php
$conn = mysqli_connect('localhost', 'root', '', 'food_order');


if (isset($_POST["submit"]))

$query = "INSERT INTO reservation_tbl SET name = transaction_id = '$transaction_id'";
$run = mysqli_query($conn, $query);

if ($run){
echo"done";}
else
echo "error";

?>
