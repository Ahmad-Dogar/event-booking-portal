

<?php
                            session_start();

$where = '';
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if($conn) { } else { print('Could not connect: '  ); exit;}
$query = "SELECT * FROM menu_tbl $where limit 30";
$dataset1 = mysqli_query($conn, $query);

?> 
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu</title>
 <!-- Required meta tags -->
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



</head>

<body>

<?php
include_once'navigation_bar.php';
?>
<div class="container " >
<div class="row jumbotron border border-5 rounded rounded-3" style="background:white; padding: 10px;margin: 10px; ">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading text-center border border-3 rounded rounded-3 bg-dark" style="padding:5px;margin:10px;color:white">
<h4><b>Menu</b></h4>
</div>
<div class="panel-body">
    <div class="col-sm-12">
      <form action="menu_package.php" method="post"><a href="stage_package.php" style="color:#00795f;"><p style="float:right; font-size:13px;"><b>Go to Stage Design</b></p></a>
      <h4><b>Menu Rates:</b></h4><br>
          <?php while($row = mysqli_fetch_assoc($dataset1)){ ?>
           <span class='title' style="font-size:18px"><?php echo $row['menu']; ?></span>
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
include_once'footer.php';
?>
</div>

</body>
</html>
