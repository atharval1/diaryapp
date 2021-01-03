<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital@1&display=swap');
        *{
            font-family: 'Work Sans', sans-serif;
        }
        body  {
                background-image: url("https://images.unsplash.com/photo-1548736614-128923fa2a11?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=968&q=80");
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                
            }
    </style>
</head>
<body class="bg-secondary text-dark">

    <nav class="navbar navbar-expand-lg navbar-light bg-light pb-2">
        <a class="navbar-brand font-weight-bold text-dark" href="#">My Diary</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-danger" href="diary.php">Compose</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="display.php">Display</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                
            </ul>
        </div>
    </nav>



    <h1 class="text-center text-dark mt-3" style="font-family:Architects Daughter;">My diary..</h1>
    <br />
    <div class="container">
        <form method="post">
        <div class="row">
        <div class="col-lg-4">
            <a href="home.php" class="btn btn-light mt-5 mb-5">Home</a><br>
            <a href="display.php" class="btn btn-light mb-5">Display</a><br>
            <a href="logout.php" class="btn btn-light mb-5">Logout</a><br>
            <input type="submit" name="submit" value="save" class="btn btn-light mb-5">
            <div class="form-group">
                <label for="Dob" class="w-50">Date:</label><br>
                <input type="number" name="date" id="Dob" class="form-control" placeholder="YYYYMMDD">
            </div>
          </div>
          <div class="col-lg-8">
            <div class="form-group">
              <label class="text-dark">Text:</label>
              <textarea class="form-control" rows="30" name="texts"></textarea>
            </div>
          </div>
        </div>
    </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

</body>
</html>


<?php
// Initialize the session
// session_start();
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    // header("location: index.php");
    // exit;
// }

include 'config.php';
if(isset($_POST['submit'])){

    $text = $_POST['texts'];
    $date = $_POST['date'];
    // print_r($text);
    $username = $_SESSION["username"];
    // print_r($username);
    $q = "INSERT INTO `account`(`username`, `texts`, `date`) VALUES ('$username','$text','$date')";

    $query = mysqli_query($link,$q);

 }
?>