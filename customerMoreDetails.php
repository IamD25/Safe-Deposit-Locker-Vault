<?php
$user_id = $_GET['id'];
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


// $useridin = $_POST['useridin'];

$searchQur = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
$searchRes = mysqli_query($con, $searchQur);
$searchRow = mysqli_fetch_assoc($searchRes);
$fatcNum = mysqli_num_rows($searchRes);


$searchQur2 = "SELECT * FROM `assign_lockers` WHERE `user_id` = '$user_id'";
$searchRes2 = mysqli_query($con, $searchQur2);
$searchRow2 = mysqli_fetch_assoc($searchRes2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Out Transaction</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="partials/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <link href="css/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminDashboard.css">
    <link rel="stylesheet" href="css/inout.css">


</head>
<header>
    <?php
    require "partials/_header.php";
    ?>
</header>

<body>

    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-2 p-0">
                <?php
                require "partials/sidebar.php";
                ?>
                <!-- <div class="b-example-divider"></div> -->
            </div>
            <div class="col-md-10 ml-sm-auto content">
                <h3 class="py-2">User all Details</h3>
                <div id="userdata">
                    <div class="row userdata my-2">
                        <h3 class="p-1">User Details</h3>
                        <div class="col-md-6 p-1"><strong>Customer Name : </strong> <?php echo $searchRow['fullname']; ?></div>
                        <div class="col-md-6 p-1"><strong>Username : </strong> <?php echo $searchRow['username']; ?></div>
                        <div class="col-md-6 p-1"><strong>Email : </strong> <?php echo $searchRow['email']; ?></div>
                        <div class="col-md-6 p-1"><strong>Contact : </strong> <?php echo $searchRow['contact']; ?></div>
                        <div class="col-md-6 p-1"><strong>Gender : </strong> <?php echo $searchRow['gender']; ?></div>
                        <div class="col-md-6 p-1"><strong>Date of Birth : </strong> <?php echo $searchRow['dob']; ?></div>
                        <div class="col-md-6 p-1"><strong>Address : </strong> <?php echo $searchRow['address']; ?></div>
                        <div class="col-md-6 p-1"><strong>City : </strong> <?php echo $searchRow['city']; ?></div>
                        <div class="col-md-6 p-1"><strong>Sate : </strong> <?php echo $searchRow['state']; ?></div>
                        <div class="col-md-6 p-1"><strong>Pincode : </strong> <?php echo $searchRow['pincode']; ?></div>
                        <div class="col-md-12 p-1 pt-2"><h3>Locker Details   </h3></div>
                        <div class="col-md-6 p-1"><strong>Account No : </strong> <?php echo $searchRow2['account_no']; ?></div>
                        <!-- <div class="col-md-6 p-1"><strong>User ID : </strong> <?php echo $searchRow2['user_id']; ?></div> -->
                        <div class="col-md-6 p-1"><strong>Locker Size : </strong> <?php echo $searchRow2['locker_size']; ?></div>
                        <div class="col-md-6 p-1"><strong>Locker Type : </strong> <?php echo $searchRow2['locker_type']; ?></div>
                        <div class="col-md-6 p-1"><strong>Locker Dimensions : </strong> <?php echo $searchRow2['locker_sizex']; ?></div>
                        <div class="col-md-6 p-1"><strong>Locker Number : </strong> <?php echo $searchRow2['locker']; ?></div>
                        <div class="col-md-6 p-1"><strong>Key Number : </strong> <?php echo $searchRow2['key_no']; ?></div>
                        <div class="col-md-6 p-1"><strong>Start Date : </strong> <?php echo $searchRow2['start_date']; ?></div>
                        <div class="col-md-6 p-1"><strong>Renew Date : </strong> <?php echo $searchRow2['renew_date']; ?></div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="customerDetails.php">Back</a>
            </div>
        </div>
    </div>


</body>

<script src="partials/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/sidebars.js"></script>


<script>
    let userData = document.getElementById('userdata');

    userData.style.display = 'block';
    $(document).ready(function() {
        // $('#sidebar').on('click', function(){
        $("#customers-collapse").addClass('show');
        // });
        $("#customerdet").addClass('btn-active');
    });
</script>

</html>