<?php
session_start();

$where = '';
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if ($conn) {
} else {
   print('Could not connect: ' . mysql_error());
   exit;
}
$query = "SELECT * FROM menu_tbl $where limit 30";
$dataset1 = mysqli_query($conn, $query);

$CNIC = $_REQUEST['cnic'];
$queri = $conn->query("SELECT * FROM select_menu_tbl WHERE CNIC = '$CNIC'");
$row = $queri->fetch_all(MYSQLI_ASSOC);
$cheked  = array();
foreach ($row as $key => $val) {
   $cheked[] = $val["menu"];
}

if (isset($_POST['Submit'])) {
   $host = "localhost"; //host name  
   $username = "root"; //database username  
   $word = ""; //database word  
   $db_name = "decent"; //database name  
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
      echo '<script>alert("Menu Update Successfully")</script>';
      echo "<script>window.location = 'index.php' </script>";
   } else {

      /*echo'<script>alert("Failed To Insert")</script>';  */
   }
}
?>
<!DOCTYPE html>
<html>

<head>
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
   <div class="container">
      <div class="row jumbotron border border-4 rounded rounded-3" style="background:white; padding: 10px; margin: 10px;">
         <div class="col-sm-12">
            <div class="panel panel-primary">
               <div class="panel-heading border border-4 rounded rounded-3 text-center bg-dark" style="padding: 10px; margin:5px ;color:white">
                  <h4><b>Menu</b></h4>
               </div>
               <div class="panel-body">
                  <div class="col-sm-12">
                     <form action="menu_edit.php?cnic=<?php echo $CNIC; ?>" method="post"><a href="stage.php" style="color:#00795f;">
                           <p style="float:right; font-size:13px;"><b>Go to Stage Design</b></p>
                        </a>
                        <h4><b>Please Select Your Menu:</b></h4><br>
                        <input type="numeric" style="width:165px; border-radius:4px;" name="CNIC" pattern='\d{5}\-\d{7}\-\d{1}' title="Example: 12345-1234567-1" value="<?php echo $CNIC; ?>"><br><br>
                        <p style="font-size:16px;">e.g 12345-1234567-12 (15 Char)</p>
                        <?php while ($row = mysqli_fetch_assoc($dataset1)) { ?>
                           <form>
                              <input type="checkbox" name="chk1[]" style="width:18px; height:18px;" value="<?php echo $row['price'] . "..........." . $row['menu']; ?>" <?php echo in_array($row['price'] . "..........." . $row['menu'], $cheked) ? "checked" : ""; ?>>
                              <span class='title' style="font-size:18px"><?php echo $row['menu']; ?></span>
                              <span style="color:red; font-size:18px; float:right;" class='price'>Rs. <?php echo $row['price']; ?></span><br><br>
                           <?php } ?>
                           <br>
                           <input type="submit" name="Submit" style="float: left; font-size: 14px;  margin-top: 2px; width: 120px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="Submit">
                           </form>
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