<?php
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

    // header('location: logout.php');
    // header("location: login.php");
}
include "partials/connection.php";

$sumOfavilableLockersQur = "SELECT sum(avilable_lockers), sum(assign_lockers), sum(maintanance_lockers), sum(total_lockers) FROM `locker_details`";
$sumOfavilableLockersRes = mysqli_query($con, $sumOfavilableLockersQur);
$sumfatch = mysqli_fetch_assoc($sumOfavilableLockersRes);

$sumUser = "SELECT sum(request_id) FROM `requests`";
$sumUserRes = mysqli_query($con, $sumUser);
$totalUsers = mysqli_fetch_assoc($sumUserRes);


$totalUsers = 10;
$paidRentUsers = 20;
$unpaidRentUsers = 30;
$pendingUserReequests = 5;

?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="partials/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <link href="css/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminDashboard.css">
    


</head>
<header>
    <?php
    require "partials/_header.php";
    ?>
</header>

<body>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-2 p-0">
                <?php
                require "partials/sidebar.php";
                ?>
                <!-- <div class="b-example-divider"></div> -->
            </div>
            <div id="dashboard" class="col-md-10 ml-sm-auto content ">
                <div class="row">
                    <div class="col pt-2 pb-2 mb-3">
                        <h1 class="h2">Dashboard</h1>
                    </div>
                    <div class="col-md-2 pt-3 pb-2 mb-3">
                        <div class="input-group">
                            <ul>
                                <li class="nav-item list-unstyled inout">
                                <a href="transactionInOut.php" type="btn" class=" btn btn-primary">Check In and Out</a>   
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 pt-3 pb-2 mb-3">
                        <div class="input-group">
                            <ul>
                                <li class="nav-item list-unstyled inout">
                                <a href="paymentAdd.php" type="btn" class=" btn btn-primary">Add Rent</a>   
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- About Lockers -->
                <div class="overview-box">
                    <div class="head">
                        <h3 class="mt-4 mx-4">Overview of Lockers</h3>
                        <p class="mx-4 color-light">Key metics for your safe deposit locker business</p>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mt-4 text-center">
                            <h1 name="totalLockers"> <?php echo $sumfatch['sum(total_lockers)']; ?></h1>
                            <p>Total Lockers</p>
                        </div>
                        <div class="col-md-3 mt-4 text-center">
                            <h1 name="asignedLockers"><?php echo $sumfatch['sum(assign_lockers)']; ?></h1>
                            <p>Asigned Lockers</p>
                        </div>
                        <div class="col-md-3 mt-4  text-center">
                            <h1 name="avilableLockers"><?php echo $sumfatch['sum(avilable_lockers)']; ?></h1>
                            <p>Avilable Lockers</p>
                        </div>
                        <div class="col-md-3 mt-4  text-center">
                            <h1 name="MaintananceLocers"><?php echo $sumfatch['sum(maintanance_lockers)']; ?></h1>
                            <p>Maintanance Lockers</p>
                        </div>
                    </div>
                </div>
                <!-- About Users -->
                <div class="overview-box mt-3">
                    <div class="head">
                        <h3 class="mt-4 mx-4">Overview of Users</h3>
                        <p class="mx-4 color-light">Key metics for your safe deposit locker business</p>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mt-4 text-center">
                            <h1 name="totalUsers"> <?php echo $totalUsers; ?></h1>
                            <p>Total Users</p>
                        </div>
                        <div class="col-md-3 mt-4 text-center">
                            <h1 name="paidRentUsers"><?php echo $paidRentUsers; ?></h1>
                            <p>Paid Rent Users</p>
                        </div>
                        <div class="col-md-3 mt-4  text-center">
                            <h1 name="unpaidRentUsers"><?php echo $unpaidRentUsers; ?></h1>
                            <p>Unpaid Rent Users</p>
                        </div>
                        <div class="col-md-3 mt-4  text-center">
                            <h1 name="pendingUserReequests"><?php echo $pendingUserReequests; ?></h1>
                            <p>Pending User Requests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<!-- <script src="partials/bootstrap5/js/bootstrap.min.js"></script> -->
<script src="partials/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/sidebars.js"></script>
<!-- <script src="js/adminDashboard.js"></script> -->

<script>
    $(document).ready(function() {
        // $('#sidebar').on('click', function(){
        $("#dashboard-collapse").addClass('show');
        // });
        $("#dash").addClass('btn-active');

    });
</script>

</html>