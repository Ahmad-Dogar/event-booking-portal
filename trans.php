<?php session_start()?>

<!DOCTYPE html>
<html>

<head>
  <title>Transaction</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
    <?php
 
    include_once 'navigation_bar.php';





    if (isset($_POST['Submit'])) {
     

      $host = "localhost"; //host name  
      $username = "root"; //database username  
      $word = ""; //database word  
      $db_name = "food_order"; //database name  
       
      $con = mysqli_connect("$host", "$username", "$word", "$db_name") or die("cannot connect"); //connection string  
      $CNIC = $_POST['cnic'];
   
      $transaction_id = $_POST['transaction_id'];
      
      $chk = "";
      
      $in_ch = mysqli_query($con, "UPDATE `reservation_tbl` SET `transaction_id`='$transaction_id' WHERE `CNIC`='$CNIC'");
      //}
      
      if ($in_ch == 1) {
   
        
         $_SESSION['error']='<div class="alert alert-success d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
         <div>
           Successfully Reserved, Thankyou. Reservation will be confermed by admin through SMS ASAP.
         </div>
       </div>';
         //header('location:trans.php');
       
        // echo '<script>alert("Stage Design Inserted Successfully")</script>';
          echo "<script>window.location = 'thankyou.php' </script>";
         
         
      } else {
   echo "helo";
         /*echo'<script>alert("Failed To Insert")</script>';  */
      }
   }
   
    ?>
    <div class="container bg-dark border border-5 rounded rounded-3" style="color:white; margin-top: 10px">
	Your progress of reservation
	<div class="progress" style="margin:5px">
  <div class="progress-bar bg-success"  role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
  
</div>
	</div>
    <div class="container">
        <div class="row jumbotron" style="background:white;">

            <div class="panel panel-primary border border-5 rounded rounded-3" style="margin: 7px; padding:8px">
                <div class="panel-heading text-center bg-dark rounded rounded-5" style="padding: 12px; margin: 10px; color:white">
                    <h5><b> <p><b>Note:</b> Please Pay the given price and provide Transaction ID</p></b></h5>

                </div>
                <br>
               
                <div class="panel-body border border-5 rounded rounded-3" style="padding: 10px; margin: 10px; padding-left:50px">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <b>Double Check your CNIC before doing Transaction</b>
                    <?php
                    $cnic=$_SESSION['cnic'];
                    ?>
                      <form action="trans.php" method="post">
                           <input style="width:165px; border-radius:4px;" type="numeric" name="cnic" value='<?php echo $cnic; ?>' pattern='\d{5}\-\d{7}\-\d{1}' title="Example: 12345-1234567-1" required="required" placeholder="Please Enter CNIC"><br><br>
                    <p><h6>You can pay through Jazz Cash or EasyPasa on the account no.<br><b>"03147897256"</b><br>Mezan Bank Account no.<br><b>00123456341278</b> </h6>
                    <br>
                    <div class="container border border-5 rounded rounded-3" style="padding:5px; margin:5px">
                        <h6>You have to pay RS 3000/_ to confrm reservations.</h6><br>
                        <p><b>Note:</b> This 3000/_ is to confirm your reservation you have to pay your remaining dues after the Event. </p>
                        
                    </div>
                    <br>
                    <h5>Please Enter Your Transaction Id</h5><b>To confirm your reservations</b>
                    <center>
                      
                        <input style="width:100%; border-radius:4px;" type="numeric" name="transaction_id"  title="Example: 012345123456" required="required" placeholder="Enter Your Transection ID"><br><br>

                    </center>
                    <p style="font-size:16px;">e.g 012345123456 (12 Char)</p>
                    <input type="submit" name="Submit" style=" font-size: 14px;  margin-top: 2px; width: 110px; background:#43a286; color:white ; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" title="click here and print reservation detail" value="Submit">

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

</body>
</html>
