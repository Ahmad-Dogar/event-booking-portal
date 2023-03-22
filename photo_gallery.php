<?php
session_start();

$where = '';
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if ($conn) {
} else {
    print('Could not connect: ' );
    exit;
}
$query = "SELECT * FROM photo_gallery_tbl $where limit 35";
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

            <div class="panel panel-primary border border-5 rounded rounded-3" style="margin: 7px; padding:8px">
                <div class="panel-heading text-center bg-dark rounded rounded-5" style="padding: 12px; margin: 10px; color:white">
                    <h4><b>Photo Gallery</b></h4>
                </div>
                <div class="panel-body border border-5 rounded rounded-3" style="padding: 10px; margin: 10px; padding-left:50px">
                    <?php while ($row = mysqli_fetch_assoc($dataset)) { ?>
                        <img width="190px" height="130px" style="border-radius:10px; border:1px solid #43a286;  padding:5px;" src='Admin/<?php echo $row['image']; ?>' />&nbsp;&nbsp;


                    <?php } ?>

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