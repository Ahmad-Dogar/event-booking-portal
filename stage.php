<?php
session_start();

$where = '';
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if ($conn) {
} else {
   print('Could not connect: ');
   exit;
}
$query = "SELECT * FROM stage_tbl $where limit 15";
$dataset = mysqli_query($conn, $query);
$CNIC = $_REQUEST['cnic'];
$queri = $conn->query("SELECT * FROM reservation_tbl WHERE CNIC = '$CNIC'");

?>
<?php
if (isset($_POST['Submit'])) {
   $host = "localhost"; //host name  
   $username = "root"; //database username  
   $word = ""; //database word  
   $db_name = "food_order"; //database name  
   $tbl_name = "select_stage_tbl"; //table name  
   $con = mysqli_connect("$host", "$username", "$word", "$db_name") or die("cannot connect"); //connection string  
   $CNIC = $_POST['CNIC'];
   $in_ch1 = mysqli_query($con, "DELETE FROM select_stage_tbl  WHERE CNIC = '$CNIC'");
   $stage = $_POST['radio'];
   $chk = "";
   $in_ch = mysqli_query($con, "INSERT INTO select_stage_tbl (stage, CNIC) VALUES ('$stage', '$CNIC')");
   //}

   if ($in_ch == 1) {


      $_SESSION['error']='<div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>
        Successfully Reserved, Thankyou. Reservation will be confermed by admin through SMS ASAP.
      </div>
    </div>';
      echo $_SESSION['cnic']=$CNIC;
      header('location:trans.php');
    
      //echo '<script>alert("Stage Design Inserted Successfully")</script>';
      // echo "<script>window.location = 'trans.php' </script>";
      
      
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

<div class="container bg-dark border border-5 rounded rounded-3" style="color:white; margin-top: 10px">
	Your progress of reservation
	<div class="progress" style="margin:5px">
  <div class="progress-bar bg-success"  role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
  
</div>
	</div>


   <div class="container">
      <div class="row jumbotron" style="background:white;">
         <div class="col-sm-12">
            <div class="panel panel-primary">
               <div class="panel-heading text-center" style="padding:10px">
                  <h4><b>Stage</b></h4>
               </div>
               <div class="panel-body">
                  <div class="col-sm-12 border border-5 rounded rounded-3" style="padding: 10px; margin: 10px;">
                     <h4><b>Please Choice the Stage Design:</b></h4><br>

                     <form action="stage.php?cnic=<?php echo $_GET['cnic']?>" method="post">
                        <input style="width:165px; border-radius:4px;" type="numeric" name="CNIC" pattern='\d{5}\-\d{7}\-\d{1}' title="Example: 12345-1234567-1" required="required" placeholder="Please Enter CNIC" value="<?php echo $CNIC; ?>"><br><br>

                        <?php while ($row = mysqli_fetch_assoc($dataset)) { ?>

                           <input type="hidden" name="cnic" value="<?php echo $_GET['cnic']; ?>">
                           <input type="radio" name="radio" style="width:18px; height:18px;" value="<?php echo $row['image']; ?>"><br>
                           <img class='thumb' style="width:165px; border:1px solid #43a286; border-radius: 8px; height:100px;" src='Admin/<?php echo $row['image']; ?>' />
                           <span style="color:red; font-size:18px; float:right;" class='price'>Rs. <?php echo $row['price']; ?></span><br><br>
                        <?php } ?>
                        <br>
                        <input type="submit" name="Submit" style="float: left; font-size: 14px;  margin-top: 2px; width: 120px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="Submit">
                     </form><br><br><br>
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