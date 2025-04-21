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
                        <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="bi bi-house"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="adminLocker.php"><i class="bi bi-lock"></i> Lockers</a></li>
                        <li class="nav-item"><a class="nav-link active" href="adminUsers.php"><i class="bi bi-people"></i> Customers</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-calendar"></i> Rentals</a></li>
                    </ul>
                </div>
            </nav>

            <div id="dashboard" class="col-md-10 ml-sm-auto px-4 content ">
                <div class="pt-3 pb-2 mb-3">
                    <h1 class="h2">Dashboard</h1>
                    <!--   <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search lockers..." id="searchInput">
                                <button class="btn btn-outline-secondary" type="button" onclick="searchLockers()">Search</button>
                            </div>
                        </div> -->
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Locker #</th>
                                <th>Customer</th>
                                <th>Rental Status</th>
                                <th>Expiration Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="lockerTableBody">
                            <!-- Locker data will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>