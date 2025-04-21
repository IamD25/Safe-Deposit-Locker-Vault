<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['role'] == "admin") {
        $username = $_SESSION['username'];
    } else {
        header('location: logout.php');
    }
} else {
    header('location: logout.php');
    // header("location: login.php");
}
$totalLockers = 45;
$asignedLockers = 30;
$avilableLockers = 10;
$maintananceLockers = 5;
$totalUsers = 30;
$paidRentUsers = 12;
$unpaidRentUsers = 18;
$pendingUserReequests = 2;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="partials/bootstrap5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<header>
<?php require "../partials/_header.php"?>
</header>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link active" href="dashboard.php"><i class="bi bi-house"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="adminLocker.php"><i class="bi bi-lock"></i> Lockers</a></li>
                        <li class="nav-item"><a class="nav-link" href="adminUsers.php"><i class="bi bi-people"></i> Customers</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-calendar"></i> Rentals</a></li>
                    </ul>
                    <!-- <h5 class="mb-4">Safe Deposit Locker</h5>
                <button id="btnDashboard" class="sidebar-btn bi bi-house " data-page="dashboard"> Dashboard</button>
                <button id="btnLockers" class="sidebar-btn bi bi-lock" data-page="lockers"> Lockers</button>
                <button id="btnCustomers" class="sidebar-btn bi bi-people" data-page="customers"> Customers</button> -->
                    <!-- <button id="btn" class="sidebar-btn bi bi-calendar" data-page="settings"> Settings</button> -->
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
                            <h1 name="totalLockers"> <?php echo $totalLockers; ?></h1>
                            <p>Total Lockers</p>
                        </div>
                        <div class="col-md-3 mt-4 text-center">
                            <h1 name="asignedLockers"><?php echo $asignedLockers; ?></h1>
                            <p>Asigned Lockers</p>
                        </div>
                        <div class="col-md-3 mt-4  text-center">
                            <h1 name="avilableLockers"><?php echo $avilableLockers; ?></h1>
                            <p>Avilable Lockers</p>
                        </div>
                        <div class="col-md-3 mt-4  text-center">
                            <h1 name="MaintananceLocers"><?php echo $maintananceLockers; ?></h1>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>