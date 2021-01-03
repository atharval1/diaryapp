<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
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
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diary Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
       body, html {
                height: 100%;
                margin: 0;
            }

            .bg {
                    /* The image used */
                    background-image: url("https://images.unsplash.com/photo-1548736614-128923fa2a11?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=968&q=80");

                    /* Full height */
                    height: 100%; 

                    /* Center and scale the image nicely */
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                }
            @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital@1&display=swap');
        *{
            font-family: 'Work Sans', sans-serif;
        }
    </style>
</head>
<body>
<div class="bg">
    <div class="container-float text-center p-5">
        <div class="wrapper text-center ">
        <h2 class="text-dark">Diary App</h2>
        <h2 class="text-center font-weight-bolder text-dark pb-4 pt-3">Login</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label class="text-dark font-weight-bold">Username:</label>
            <center><input type="text" name="username" class="form-control w-25" value="<?php echo $username; ?>" autocomplete="off"></center>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group text-center<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label class="text-dark font-weight-bold">Password:</label>
            <center><input type="password" name="password" class="form-control w-25 "></center>
                <span class="help-block text-center"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-light border text-dark" value="Login">
            </div>
            <div class="from-group text-center">
            <p class="text-dark">Don't have an account? <a href="register.php" class="text-primary" style="text-decoration:underline;">Sign up now</a></p>
            </div>
        </form>
        </div> 
    </div>   

    
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>