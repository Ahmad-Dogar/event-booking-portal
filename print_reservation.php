<!DOCTYPE html>
<html>

<head>

<body>
  <header>

    <?php
    session_start();

    $conn = mysqli_connect('localhost', 'root', '', 'food_order');
    if ($conn) {
    } else {
      print('Could not connect: ');
      exit;
    }

    

    include_once 'navigation_bar.php';
    ?>
    <div class="container" style="padding: 10px; margin:10px">
      <div class="row jumbotron bg-dark border border-5 rounded rounded-3" style="color:white; padding:10px; margin: 10px;">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4><b>Print Page</b></h4>
            </div>
            <div class="panel-body">
              <p>If you want to know about your reservation details, enter your CNIC number and get details of the reservation.</p>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <center>
                      <form action="print.php" style="margin-top:10px;" method="POST">
                        <input style="width:100%; border-radius:4px;" type="numeric" name="CNIC" pattern='\d{5}\-\d{7}\-\d{1}' title="Example: 12345-1234567-1" required="required" placeholder="Enter Your CNIC"><br><br>

                    </center>
                    <p style="font-size:16px;">e.g 12345-1234567-12 (15 Char)</p>
                    <input type="submit" name="Submit" style=" font-size: 14px;  margin-top: 2px; width: 110px; background:#43a286; color:white ; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" title="click here and print reservation detail" value="Print">

                    </form>
                  </div>
                </div>
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