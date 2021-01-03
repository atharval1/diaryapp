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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TG Data Management</title>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital@1&display=swap');
        *{
            font-family: 'Work Sans', sans-serif;
        }
        .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        background-color: rgba(245, 245, 245, 0.4);
        }

            .bg {
                    /* The image used */
                    background-image: url("https://images.unsplash.com/photo-1548736614-128923fa2a11?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=968&q=80");

                    /* Full height */
                    height: 100% !important; 

                    /* Center and scale the image nicely */
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    position: relative;
                    
                }
               
    </style>
   
</head>
<body class="text-dark bg">

    <nav class="navbar navbar-expand-lg navbar-light bg-light pb-2">
        <a class="navbar-brand font-weight-bold text-dark" href="#">My Diary</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-danger" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="diary.php">Compose</a>
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

    <div class="page-header text-center container pt-3">
        <h5 class="text">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site Diary Managment System.</h5>
    </div>
    
    <div class="container text-right">
        <h6>Date: <span id="datetime"></span></h6>
    </div>
    
    <div class="container text-center">
        <a href="diary.php" class="btn btn-light mb-5">Compose</a>
        <a href="logout.php" class="btn btn-light mb-5">Logout</a>
    </div>
    
    
    <section>
        <div class="container">
            <h4 class="text-center pt-1">good thoughts</h4>
            <hr class="w-25 mx-auto ">

            <div class="row">
                <div class="col-lg-6 col-md-2 col-12 ">
                    <div class="card text-dark bg-transparent mb-3" style="max-width: 18rem;">
                        <div class="card-header">Thoughts..</div>
                        <div class="card-body">
                            <p class="card-text">"Meomery..... is the Diary that We all Carry About With us..."</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-2 col-12 ">
                    <div class="card text-dark bg-transparent mb-3" style="max-width: 18rem;">
                        <div class="card-header">Thoughts..</div>
                        <div class="card-body">
                            <p class="card-text">"my Diary.... share your good thoughts...."</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
  
       <div class="container text-center">
                <p>Compose to write in diary</p>
                <hr class="w-25 mx-auto ">
                <p>display to see Entries</p>
                <hr class="w-25 mx-auto ">
       </div>  









<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleDateString();

var dt = new Date();
document.getElementById("time").innerHTML = dt.toLocaleTimeString();
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>