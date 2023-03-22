<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if ($conn) {
} else {
    print('Could not connect: ');
    exit;
}
if (isset($_POST['submit'])) {
    $query = "INSERT INTO feedback_tbl (city, atmosphere, clean, service, food, suggestion)
                               VALUES('" . $_POST['city'] . "', '" . $_POST['radio'] . "', '" . $_POST['radio1'] . "', '" . $_POST['radio2'] . "',
                               '" . $_POST['radio3'] . "', '" . $_POST['suggestion'] . "')";
    mysqli_query($conn, $query);
    echo '<script>alert("Feedback Inserted Successfully")</script>';
    echo "<script>window.location = 'feedback.php' </script>";
}

?>


<!DOCTYPE html>
<html>

<head>
<title>Feedback</title>
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
        <div class="row jumbotron" style="background:white;">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center border border-5 rounded rounded-3" style="padding: 10px; margin: 10px;">
                        <h4><b>Feedback</b></h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="border border-4 rounded rounded-3 bg-dark text-center" style="color:white; padding: 7px;margin: 7px;">
                                <p style="font-family:georgia; font-size:18px;">Decent Palace management always welcome to your precious suggestions.</p>
                                <p style="font-family:georgia; font-size:18px;">Send us your valued suggestions which help us to bring more improvements in our services to provide you high level quality services.</p>
                            </div>
                            <div class="container border border-4 rounded rounded-3  " style="margin-bottom: 10px">
                                <form action="feedback.php" method="post">

                                    <b style="font-family:georgia; font-size:16px;">Your City:</b><br><input style="border-radius: 6px; width:165px; " type="text" name="city" required="required" placeholder="Enter Your City Name"><br><br>
                                    <label style=" font-family:georgia; font-size:16px;"><b>Atmosphere</b></label><br>
                                    &nbsp;&nbsp;<input type="radio" name="radio" value="Excellent">Excellent &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radio" value="Good">Good &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radio" value="Fair">Fair<br><br>
                                    <label style=" font-family:georgia; font-size:16px;"><b>Hygienic &amp; Clean</b></label><br>
                                    &nbsp;&nbsp;<input type="radio" name="radio1" value="Excellent">Excellent &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radio1" value="Good">Good &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radio1" value="Fair">Fair<br><br>
                                    <label style=" font-family:georgia; font-size:16px;"><b>Service</b></label><br>
                                    &nbsp;&nbsp;<input type="radio" name="radio2" value="Excellent">Excellent &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radio2" value="Good">Good &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radio2" value="Fair">Fair<br><br>
                                    <label style=" font-family:georgia; font-size:16px;"><b>Food</b></label><br>
                                    &nbsp;&nbsp;<input type="radio" name="radio3" value="Excellent">Excellent &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radio3" value="Good">Good &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radio3" value="Fair">Fair<br><br>
                                    <label style=" font-family:georgia; font-size:16px;">Your Suggestions :</label><br>
                                    <textarea style="border-radius:8px;" placeholder="Enter your Comments!" name="suggestion" cols="21" rows="10"></textarea><br>
                                    <input  type="submit" name="submit" style=" font-size: 14px;  margin: 8px; width: 120px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="SEND">
                                    
                                    </form>
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