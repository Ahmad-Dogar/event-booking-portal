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
        <div class="row jumbotron" style="background:white;">
            <div class="col-sm-12 border border-5 rounded rounded-3 bg-dark" style="padding: 10px; margin:10px">
                <div class="panel panel-primary border bg-light border-3 rounded rounded-3" style="padding: 10px; margin:10px">
                    <div class="panel-heading text-center" style="padding: 10px; margin: 10px;">
                        <h4><b><div class="container-fluid border border-4 rounded rounded-5 bg-dark " style="color: white; padding: 10px; margin: 5px;">Stage</div></b></h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12  " style="padding: 10px; margin:10px">
                            <h4><b>Stage Pakage:</b></h4><br>
                            <form action="stage.php" method="post">
                                <?php while ($row = mysqli_fetch_assoc($dataset)) { ?>
                                    <img class='thumb' style="width:165px; border:1px solid #43a286; border-radius: 8px; height:100px;" src='Admin/<?php echo $row['image']; ?>' />
                                    <span style="color:red; font-size:18px; float:right;" class='price'>Rs. <?php echo $row['price']; ?></span><br><br>
                                <?php } ?>
                                <br>
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