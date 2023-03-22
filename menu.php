<?php
session_start();

$where = '';
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if ($conn) {
} else {
   print('Could not connect: ');
   exit;
}
$query = "SELECT * FROM menu_tbl $where limit 30";
$dataset1 = mysqli_query($conn, $query);
$CNIC = $_REQUEST['cnic'];
$queri = $conn->query("SELECT * FROM reservation_tbl WHERE CNIC = '$CNIC'");
?>
<?php
if (isset($_POST['Submit'])) {
   $host = "localhost"; //host name  
   $username = "root"; //database username  
   $word = ""; //database word  
   $db_name = "food_order"; //database name  
   $tbl_name = "select_menu_tbl"; //table name  
   $con = mysqli_connect("$host", "$username", "$word", "$db_name") or die("cannot connect"); //connection string  
   $CNIC = $_POST['CNIC'];
   $in_ch1 = mysqli_query($con, "DELETE FROM select_menu_tbl  WHERE CNIC = '$CNIC'");
   $checkbox1 = $_POST['chk1'];
   $chk = "";
   for ($i = 0; $i < sizeof($checkbox1); $i++) {
      $in_ch = mysqli_query($con, "INSERT INTO select_menu_tbl (menu, CNIC) VALUES ('" . $checkbox1[$i] . "' , '$CNIC')");
   }

   if ($in_ch == 1) {
     // echo '<script>alert("Menu Inserted Successfully")</script>';
      echo "<script>window.location = 'stage.php?cnic=$CNIC' </script>";
   } else {

      /*echo'<script>alert("Failed To Insert")</script>';  */
   }
}
?>






<!DOCTYPE html>
<html>

<head>
   <title>Menu</title>
   <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



</head>

<body>


   <?php
   include_once 'navigation_bar.php';
   ?>

<div class="container bg-dark border border-5 rounded rounded-3" style="color:white; margin-bottom:10px;margin-top: 10px">
	Your progress of reservation
	<div class="progress" style="margin:5px">
  <div class="progress-bar bg-success"  role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
  
</div>
	</div>

   <div class="container">
      <div class="row jumbotron border border-5 rounded rounded-3" style="background:white;margin:10px">
         <div class="col-sm-12">
            <div class="panel panel-primary">
               <div class="panel-heading text-center border border-3 rounded rounded-3 bg-dark "style="padding: 6px;margin: 10px; color:white">
                  <h4><b>Menu</b></h4>
               </div>
               <div class="panel-body" >
                  <div class="col-sm-12">
                     <form action="menu.php? cnic=<?php echo $CNIC; ?>" method="post"><a href="stage.php?cnic=<?php echo $CNIC; ?>" style="color:#00795f;">
                           <p style="float:right; font-size:13px;"><b>Go to Stage Design</b></p>
                        </a>
                        <h4><b>Please Select Your Menu:</b></h4><br>
                        <input type="numeric" style="width:165px; border-radius:4px;" name="CNIC" pattern='\d{5}\-\d{7}\-\d{1}' title="Example: 12345-1234567-1" required="required" placeholder="Please Enter CNIC" value="<?php echo $CNIC; ?>"><br><br>
                        <p style="font-size:16px;">e.g 12345-1234567-12 (15 Char)</p>
                        <?php while ($row = mysqli_fetch_assoc($dataset1)) { ?>
                           <form>
                              <input type="checkbox" name="chk1[]" style="width:20px; height:18px;" value="<?php echo $row['price'];
                                                                                                            echo "...........";
                                                                                                            echo $row['menu']; ?>">
                              <span class='title' style="font-size:18px"> &nbsp;<?php echo $row['menu']; ?></span>
                              <span style="color:red; font-size:18px; float:right;" class='price'>Rs. <?php echo $row['price']; ?></span><br><br>
                           <?php } ?>
                           <br>
                           <div class="text-center " style="margin: 7px; padding: 7px;"><input type="submit" name="Submit" 
                           style="float: left; font-size: 14px;  margin-top: 2px; width: 120px; background:#43a286; color: white; padding: 4px; border-radius: 6px; margin: 5px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="Submit"></div
                        ></form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid">
      <?php
      include_once 'footer.php';
      ?>
   </div>

</body>

</html>