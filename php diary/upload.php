<!-- <?php
                //  include 'config.php';
                //  if(isset($_POST['submit'])){

                //     $text = $_POST['texts'];
                //     $username = trim($_GET["username"]);
                //     print_r($text);
                //     print_r($username);
                //  }
?> -->



<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

include 'config.php';
if(isset($_POST['submit'])){

    $text = $_POST['texts'];
    print_r($text);
    $username = $_SESSION["username"];
    print_r($username);
 }
?>