<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['role'] == "user") {
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
    } elseif ($_SESSION['role'] == "admin") {
        echo "<script>location.replace('adminDashboard.php')</script>";
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
    <title>Locker</title>
    <link rel="stylesheet" href="partials/bootstrap5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/userDashboard.css">
    <link rel="stylesheet" href="css/sidebars.css">
</head>
<header>
    <?php require "partials/_header.php" ?>
</header>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 p-0">
                <?php
                require "partials/userSidebar.php";
                ?>
            </div>
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
                <div class="row mb-4">
                    <!-- Locker Summary Card -->
                    <div class="col-md-6">
                        <div class="card p-3 ">
                            <h5>Personal Details</h5>
                            <p>Quick overview of your safe deposit lockers</p>
                            <div class="col-md-6 p-1"><strong>Name : </strong> <?php echo $searchRow['fullname']; ?></div>
                            <div class="col-md-6 p-1"><strong>Username : </strong> <?php echo $searchRow['username']; ?></div>
                            <div class="col-md-6 p-1"><strong>Email : </strong> <?php echo $searchRow['email']; ?></div>
                            <div class="col-md-6 p-1"><strong>Contact : </strong> <?php echo $searchRow['contact']; ?></div>
                            <div class="col-md-6 p-1"><strong>Gender : </strong> <?php echo $searchRow['gender']; ?></div>
                            <div class="col-md-6 p-1"><strong>Date of Birth : </strong> <?php echo $searchRow['dob']; ?></div>
                            <div class="col-md-6 p-1"><strong>Address : </strong> <?php echo $searchRow['address']; ?></div>
                            <div class="col-md-6 p-1"><strong>City : </strong> <?php echo $searchRow['city']; ?></div>
                            <div class="col-md-6 p-1"><strong>Sate : </strong> <?php echo $searchRow['state']; ?></div>
                            <div class="col-md-6 p-1"><strong>Pincode : </strong> <?php echo $searchRow['pincode']; ?></div>
                        </div>
                    </div>
                    <!-- Recent Activities Card -->
                    <div class="col-md-6">
                        <div class="card p-3 ">
                            <h5>Locker Details</h5>
                            <p>Your latest locker-related actions</p>
                            <div class="col-md-6 p-1"><strong>Account No : </strong> <?php echo $searchRow2['account_no']; ?></div>
                            <div class="col-md-6 p-1"><strong>User ID : </strong> <?php echo $searchRow2['user_id']; ?></div>
                            <div class="col-md-6 p-1"><strong>Locker Size : </strong> <?php echo $searchRow2['locker_size']; ?></div>
                            <div class="col-md-6 p-1"><strong>Locker Type : </strong> <?php echo $searchRow2['locker_type']; ?></div>
                            <div class="col-md-6 p-1"><strong>Locker Dimensions : </strong> <?php echo $searchRow2['locker_sizex']; ?></div>
                            <div class="col-md-6 p-1"><strong>Locker Number : </strong> <?php echo $searchRow2['locker']; ?></div>
                            <div class="col-md-6 p-1"><strong>Key Number : </strong> <?php echo $searchRow2['key_no']; ?></div>
                            <div class="col-md-6 p-1"><strong>Rent of Locker : </strong> <?php echo $searchRow2['rent']; ?></div>
                            <div class="col-md-6 p-1"><strong>Start Date : </strong> <?php echo $searchRow2['start_date']; ?></div>
                            <div class="col-md-6 p-1"><strong>Renew Date : </strong> <?php echo $searchRow2['renew_date']; ?></div>
                        </div>
                    </div>
                    <!-- Quick Actions Card -->
                    <!-- <div class="col-md-4">
                        <div class="card p-3 text-center">
                            <h5>Quick Actions</h5>
                            <p>Manage your locker access and settings</p>
                            <button class="btn btn-dark mb-2">Schedule Access</button><br>
                            <button class="btn btn-light">Update Information</button>
                        </div>
                    </div> -->
                </div>

                <!-- Your Lockers Section -->
                <!-- <div class="card p-3">
                    <h5>Your Lockers</h5>
                    <p>Detailed information about your safe deposit lockers</p>
                    <table class="table lockers-table">
                        <thead>
                            <tr>
                                <th>Locker ID</th>
                                <th>Size</th>
                                <th>Location</th>
                                <th>Last Accessed</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>L001</td>
                                <td>Small</td>
                                <td>Floor 1, Row A</td>
                                <td>2023-05-15</td>
                                <td><button class="btn btn-dark">Access</button></td>
                            </tr>
                            <tr>
                                <td>L002</td>
                                <td>Medium</td>
                                <td>Floor 2, Row C</td>
                                <td>2023-06-02</td>
                                <td><button class="btn btn-dark">Access</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/.js"></script>
<script>
    $(document).ready(function() {
        // $('#sidebar').on('click', function(){
        $("#dashboard-collapse").addClass('show');
        $("#udash").addClass('btn-active');
        // });

    });
</script>

</html>