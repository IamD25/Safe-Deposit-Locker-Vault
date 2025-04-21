<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "saftylocker";

$con = mysqli_connect($hostname, $username, $password, $database);

if($con){
    echo '<script> console.log("Connected to database");</script>';
}else{
    echo '<script> console.log("Not connected to database");</script>';
    die();
}

?>