<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Event Booking Portal</title>
</head>
<body>
	<h1 class="" style="padding: 5px;">Event Booking Portal</h1>

	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark 3-my">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">Home</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<?php 
if(isset($_SESSION["loggedin"])){ ?>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="reservation.php">Reservation</a>
					</li>
					<?php 
}
?>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="menu_package.php">Menu</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="stage_package.php">Stages</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="photo_gallery.php">Galery</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="instruction.php">Instructions</a>
					</li>
					<?php 
if(isset($_SESSION["loggedin"])){ ?>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="feedback.php">Feedback</a>
					</li>
					<?php 
}
?>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="contact_us.php">Contact US</a>
					</li>
					<?php 
					if(isset($_SESSION ["loggedin"])== true){ ?>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
					</li>
					<?php 
}
?>

					<?php 
					if(isset($_SESSION ["loggedin"])!== true){ ?>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="login.php">Log In</a>
					</li>
					<?php 
}
?>

				</ul>

			</div>
		</div>
	</nav>

	<?php 
					if(isset($_SESSION ["loggedin"])!== true){ ?>	
<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" margin:0px">
  <strong>For Reservations!</strong> Please, <a href="login.php" class="alert-link">Log In</a> to your Account, If don't have an Account <bold>Please..!  </bold><a href="signup.php" class="alert-link">SignUp</a> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php 
}
?>

	</body>
</html>