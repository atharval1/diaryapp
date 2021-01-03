<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" media="mediatype and|not|only (expressions)" href="print.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital@1&display=swap');
        *{
            font-family: 'Work Sans', sans-serif;
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
                    margin-bottom: 0em;
                    
                }
               
            
    </style>
  </head>
  <body class="bg">

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
                <li class="nav-item">
                    <a class="nav-link " href="diary.php">Compose</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-danger" href="display.php">Display</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                
            </ul>
        </div>
    </nav>

    <div class="conatiner text-center">
        <h3 class="text-dark mt-3">Saved information..</h3>
    </div>
    
    <div class="container text-center">
        <a href="diary.php" class="btn btn-light mb-5">Compose</a>
        <a href="logout.php" class="btn btn-light mb-5">Logout</a>
    </div>


    <div class="container text-center ">
    <table class="table table-bordered table-hover rounded" id="myTable">
        <thead>
            <tr>
                <th scope="col" class="text-center">Date</th>
                <th scope="col" class="text-center">Compose</th>
                <th scope="col" class="text-center">opration</th>
            </tr>
        </thead>
        <tbody>
        <?php
                    include 'config.php';
                    $sele = "select * from account";
                    $query = mysqli_query($link,$sele);
                    while($res = mysqli_fetch_array($query)){
                      if($res['username'] == $_SESSION["username"]){
        ?>
            <tr> 
                <th scope="row" class="text-center"><?php if($res['username'] == $_SESSION["username"]){ echo $res['date']; }?></th>
                <!-- <td class="text-center"><?php if($res['username'] == $_SESSION["username"]){ echo $res['username']; }?></td> -->
                <td class="text-center"><?php if($res['username'] == $_SESSION["username"]){ echo $res['texts']; }?></td>
                <td class="text-center"><button class="btn bg-transparent border"><a href="delete.php?id=<?php echo $res['id'];?>" class="text-dark">DELETE</a></button></td>
            </tr>
            <?php
                }
              }
            ?>
        </tbody>
        </table>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>