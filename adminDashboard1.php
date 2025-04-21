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

$dataFatchQur = "SELECT * FROM `locker_details`";
$dataFatchRes = mysqli_query($con, $dataFatchQur);


$sumOfavilableLockersQur = "SELECT sum(avilable_lockers), sum(assign_lockers), sum(maintanance_lockers), sum(total_lockers) FROM `locker_details`";
$sumOfavilableLockersRes = mysqli_query($con, $sumOfavilableLockersQur);
$sumfatch = mysqli_fetch_assoc($sumOfavilableLockersRes);

$dataRequest = "SELECT * FROM `requests`";
$resRequest = mysqli_query($con, $dataRequest);

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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="partials/bootstrap5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/adminDashboard.css">

</head>
<header>
    <?php require "partials/_header.php" ?>
</header>

<body>
    <!-- <h3>User Dashboard</h3>
    <p>Welcome <?php echo $_SESSION['username']; ?></p>
    <a href="logout.php">Logout Now</a> -->

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h5 class="mb-4">Safe Deposit Locker</h5>
                    <button id="btnDashboard" class="sidebar-btn bi bi-house " data-page="dashboard"> Dashboard</button>
                    <button id="btnLockers" class="sidebar-btn bi bi-lock" data-page="lockers"> Lockers</button>
                    <button id="btnCustomers" class="sidebar-btn bi bi-people" data-page="customers"> Customers</button>
                    <button id="btnRequests" class="sidebar-btn bi bi-bell" data-page="request">Requests</button>
                </div>
            </nav>

            <!-- about locker content -->
            <div id="dashboard" class="col-md-10 ml-sm-auto px-4 content ">
                <div class="pt-3 pb-2 mb-3">
                    <h1 class="h2">Dashboard</h1>
                    <!-- <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search lockers..." id="searchInput">
                                <button class="btn btn-outline-secondary" type="button" onclick="searchLockers()">Search</button>
                            </div>
                        </div> -->
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

            <!-- about Rentals Lockers -->
            <div id="lockers" class="col-md-10 ml-sm-auto px-4 content ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">About Rentals Lockers</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search lockers..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button" onclick="searchLockers()">Search</button>
                            <div><a href="addlocker.php" class="btn btn-primary btn-md">Add New</a></div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th name="locker_size">Locker Size</th>
                                <th name="locker_price">Locker Price</th>
                                <th name="avilable_lockers">Avilable Lokers</th>
                                <th name="assign_lockerss">Assign Lockers</th>
                                <th name="maintanance_lockers">Maintanance Lockers</th>
                                <th name="total_lockers">Total Lockers</th>
                                <th colspan="2" class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody id="lockerTableBody">
                            <?php while ($datarow = mysqli_fetch_assoc($dataFatchRes)) {; ?>
                                <tr>
                                    <td> <?php echo $datarow['locker_size']; ?> </td>
                                    <td> <?php echo $datarow['locker_price'] ?> </td>
                                    <td> <?php echo $datarow['avilable_lockers'] ?> </td>
                                    <td> <?php echo $datarow['assign_lockers'] ?> </td>
                                    <td> <?php echo $datarow['maintanance_lockers'] ?> </td>
                                    <td> <?php echo $datarow['total_lockers'] ?> </td>
                                    <td><a class="btn btn-sm btn-danger" id="update" href="updatelocker.php?id=<?= $datarow['locker_id']; ?>">Update</a></td>
                                    <td><a class="btn btn-sm btn-warning" id="btndelete" href="deletelocker.php?id=<?= $datarow['locker_id']; ?>" onclick="confunc();">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- about Customers  -->
            <div id="customers" class="col-md-10 ml-sm-auto px-4 content ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">About Customers</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search lockers..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button" onclick="searchLockers()">Search</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Contact No.</th>
                                <th>Locker No.</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="lockerTableBody">

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- User Request -->
            <div id="requests" class="col-md-10 ml-sm-auto px-4 content ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">User Requests</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <!-- <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search lockers..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button" onclick="searchLockers()">Search</button>
                        </div> -->
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th name="id">ID</th>
                                <th name="name">Name</th>
                                <th name="email">Email</th>
                                <th name="contact">Contact</th>
                                <th name="locker_size">Locker Size</th>
                                <th name="locker_type">Locker Type</th>
                                <th name="locker_sizex">Locker Size(00x00x00)</th>
                                <th colspan="2" class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody id="lockerTableBody">
                            <?php while ($resRow = mysqli_fetch_assoc($resRequest)) { ?>
                                <tr>
                                    <td> <?php echo $resRow['request_id']; ?> </td>
                                    <td> <?php echo $resRow['fullname']; ?> </td>
                                    <td> <?php echo $resRow['email']; ?> </td>
                                    <td> <?php echo $resRow['contact']; ?> </td>
                                    <td> <?php echo $resRow['locker_size']; ?> </td>
                                    <td> <?php echo $resRow['locker_type']; ?> </td>
                                    <td> <?php echo $resRow['locker_sizex']; ?> </td>
                                    <td><a class="btn btn-sm btn-danger" id="update" href="assignlocker.php?id=<?= $resRow['request_id']; ?>">Accept</a></td>
                                    <td><a class="btn btn-sm btn-warning" id="btndelete" href="?id=<?= $resRow['request_id']; ?>" onclick="confunc();">Delete</a></td>
                                </tr>
                        </tbody> <?php } ?>
                    </table>
                </div>
            </div>


        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/adminDashboard.js"></script>
    <!-- <script lang="javascript">
            function confunc(){
               let conFunc =  confirm("Are you sure you want to Delete this Locker?");
               if(conFunc){
               alert('TRUE : Data Updated Successfully');

                let btnDelete = document.getElementById("btndelete");
                // btnDelete.setAttribute("href", "adminDashboard.php");
                location.replace('deletelocker.php');
               }else{
               alert('FALSE : Data Updated Successfully');
                let btnDelete = document.getElementById("btndelete");
                console.log(btnDelete);
                btnDelete.setAttribute("href", "register.php");
                // return false;
               }
            }
        </script> -->
    <script>
        $(document).ready(function() {
            $("#lockers").hide();
            $("#customers").hide();
            $("#requests").hide();
            $("#btnDashboard").addClass("btn-active");
            $("#btnDashboard").click(function() {
                $("#dashboard").show();
                $("#customers").hide();
                $("#lockers").hide();
                $("#requests").hide();
                $("#btnDashboard").addClass("btn-active");
                $("#btnCustomers").removeClass("btn-active");
                $("#btnLockers").removeClass("btn-active");
                $("#btnRequests").removeClass("btn-active");
            });

            $("#btnLockers").click(function() {
                $("#lockers").show();
                $("#dashboard").hide();
                $("#customers").hide();
                $("#requests").hide();
                $("#btnLockers").addClass("btn-active");
                $("#btnDashboard").removeClass("btn-active");
                $("#btnCustomers").removeClass("btn-active");
                $("#btnRequests").removeClass("btn-active");
            });

            $("#btnCustomers").click(function() {
                $("#customers").show();
                $("#dashboard").hide();
                $("#lockers").hide();
                $("#requests").hide();
                $("#btnCustomers").addClass("btn-active");
                $("#btnLockers").removeClass("btn-active");
                $("#btnDashboard").removeClass("btn-active");
                $("#btnRequests").removeClass("btn-active");
            });

            $("#btnRequests").click(function() {
                $("#requests").show();
                $("#customers").hide();
                $("#dashboard").hide();
                $("#lockers").hide();
                $("#btnRequests").addClass("btn-active");
                $("#btnCustomers").removeClass("btn-active");
                $("#btnLockers").removeClass("btn-active");
                $("#btnDashboard").removeClass("btn-active");
            });
        });
    </script>

</body>

</html>