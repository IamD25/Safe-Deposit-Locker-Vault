<?php
$id = $_GET['id'];

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['role'] == "admin") {
        $username = $_SESSION['username'];
    } elseif ($_SESSION['role'] == "user") {
        echo "<script>location.replace('userDashboard.php')</script>";
    } else {
        echo "<script> alert('Please Login First..');</script>";
        echo "<script>location.replace('logout.php')</script>";
        // header('location: logout.php');
    }
} else {
    echo "<script> alert('Please Login First..');</script>";
    echo "<script>location.replace('login.php')</script>";
}

include "partials/connection.php";

$status = "Rejected";
$updReq = "UPDATE `requests` SET `status`='$status' WHERE `request_id`=$id";
$updRes = mysqli_query($con, $updReq);
if ($updRes) {
    echo "<script>alert('Locker Rejected Successfully');</script>";
    echo "<script>location.replace('requestPending.php')</script>";
}else{
    echo "<script>alert('Error Occured');</script>";
}
?>