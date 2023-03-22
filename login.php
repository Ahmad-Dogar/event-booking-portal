<?php
session_start();
require_once "config.php";
// Initialize the session

 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file

 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
      
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        $user=$_POST["username"];
        $pass=$_POST["password"];
        
        $sql = "SELECT id, username, password FROM users WHERE username = '$user' and password='$pass'";
        $sql=mysqli_query($conn,$sql);
        if(mysqli_num_rows($sql)==1){
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;                            
                                    
                                    // Redirect user to welcome page
        header("location: index.php");
        }
       
        
        } else{
                 // Password is not valid, display a generic error message
                $login_err = "Invalid username or password.";
        }

    //     echo 'hello i am ahtesham';
    //     exit;
    //     // Prepare a select statement
    //     $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
    //     if($stmt = mysqli_prepare($conn, $sql)){
    //         // Bind variables to the prepared statement as parameters
    //         mysqli_stmt_bind_param($stmt, "s", $param_username);
            
    //         // Set parameters
    //         $param_username = $username;
            
    //         // Attempt to execute the prepared statement
    //         if(mysqli_stmt_execute($stmt)){
    //             // Store result
    //             mysqli_stmt_store_result($stmt);
                
    //             // Check if username exists, if yes then verify password
    //             if(mysqli_stmt_num_rows($stmt) == 1){                    
    //                 // Bind result variables
    //                 mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
    //                 if(mysqli_stmt_fetch($stmt)){
    //                     if(password_verify($password, $hashed_password)){
    //                         // Password is correct, so start a new session
    //                         session_start();
                            
    //                         // Store data in session variables
    //                         $_SESSION["loggedin"] = true;
    //                         $_SESSION["id"] = $id;
    //                         $_SESSION["username"] = $username;                            
                            
    //                         // Redirect user to welcome page
    //                         header("location: index.php");
    //                     } else{
    //                         // Password is not valid, display a generic error message
    //                         $login_err = "Invalid username or password.";
    //                     }
    //                 }
    //             } else{
    //                 // Username doesn't exist, display a generic error message
    //                 $login_err = "Invalid username or password.";
    //             }
    //         } else{
    //             echo "Oops! Something went wrong. Please try again later.";
    //         }

    //         // Close statement
    //         mysqli_stmt_close($stmt);
    //     }
    // }
    
    // // Close connection
    // mysqli_close($conn);
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
<header>
<h1 class="" style="padding: 5px;">Online Reservation System</h1>
</header>

    <div class="container">

    <div class="row jumbotron border border-5 rounded rounded-3" style="background:white;margin:10px">
         <div class="col-sm-12">
            <div class="panel panel-primary">
               <div class="panel-heading text-center border border-3 rounded rounded-3 bg-dark "style="padding: 6px;margin: 10px; color:white">
                  <h4><b>Log In</b></h4>
                  <p> Please fill your Credentials to Login</p>
               </div>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group" style="margin:10px">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group" style="margin:10px">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group" style="padding: 6px;margin-top: 10px; color:white" style="margin:10px">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
        </form>
    </div>


</body>
</html>