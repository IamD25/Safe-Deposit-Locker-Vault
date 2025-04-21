<?php


include_once "partials/connection.php";

    // $id = $_GET["id"];

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
 
$delUserQur = "DELETE FROM `users` WHERE `user_id` = '$id'";
$delUserRes = mysqli_query($con, $delUserQur);

$delAssignQur = "DELETE FROM `assign_lockers` WHERE `user_id` = '$id'";
$delAssignRes = mysqli_query($con, $delAssignQur);

$status = "Rejected";
$updReq = "UPDATE `requests` SET `status`='$status' WHERE `request_id`=$id";
$updRes = mysqli_query($con, $updReq);

if($delQur){
    echo "<script> alert('Locker deleted successfully'); </script>";
    echo "<script>location.replace('lockerdetails.php') </script>";

}



?>