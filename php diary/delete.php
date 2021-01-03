<?php

include 'config.php';

$id = $_GET['id'];
print_r($id);

$q = "DELETE FROM `account` WHERE id = $id";

mysqli_query($link,$q);

header('location:display.php');


?>