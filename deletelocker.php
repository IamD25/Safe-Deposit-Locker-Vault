<?php
include_once "partials/connection.php";

    $id = $_GET["id"];

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['role'] == "admin") {
        $username = $_SESSION['username'];
    } else {
        // header('location: logout.php');
    }
} else {
    // header('location: logout.php');
    // header("location: login.php");
}
 
$delQur = "DELETE FROM `locker_details` WHERE `locker_id` = '$id'";
$delRes = mysqli_query($con, $delQur);

if($delQur){
    echo "<script> alert('Locker deleted successfully'); </script>";
    echo "<script>location.replace('lockerdetails.php') </script>";

}

?>