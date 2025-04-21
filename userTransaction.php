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
$searchQur = "SELECT * FROM `inouttransaction` WHERE `user_id` = '$user_id'";
$result = mysqli_query($con, $searchQur);
$fatcNum = mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
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
                    <h1 class="h2">Locker Access History</h1>
                    <!-- <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search lockers..." id="searchInput">
                                <button class="btn btn-outline-secondary" type="button" onclick="searchLockers()">Search</button>
                            </div>
                        </div> -->
                </div>
                <!-- About Lockers -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <hr>
                                <th name="srno">S.R. No.</th>
                                <th name="date">Date</th>
                                <th name="locker_no">Locker No.</th>
                                <th name="account_no">Account No.</th>
                                <th name="in_time">In Time</th>
                                <th name="out_time">Out Time</th>
                                <!-- <th colspan="2" class="text-center">Action</th> -->

                            </tr>
                        </thead>
                        <tbody id="lockerTableBody">
                            <?php while ($datarow = mysqli_fetch_assoc($result)) {; ?>
                                <tr>
                                    <td> <?php echo $datarow['srno']; ?> </td>
                                    <td> <?php echo $datarow['date'] ?> </td>
                                    <td> <?php echo $datarow['locker_no'] ?> </td>
                                    <td> <?php echo $datarow['account_no'] ?> </td>
                                    <td> <?php echo $datarow['in_time'] ?> </td>
                                    <td> <?php echo $datarow['out_time'] ?> </td>
                                    <!-- <td><a class="btn btn-sm btn-danger" id="update" href="updatelocker.php?id=<?= $datarow['locker_id']; ?>">Update</a></td> -->
                                    <!-- <td><a class="btn btn-sm btn-warning" id="btndelete" href="deletelocker.php?id=<?= $datarow['locker_id']; ?>" onclick="confunc();">Delete</a></td> -->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <h5 class="text-center" id="notran">There is no Transaction..</h5>
                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/customerAdd.js"></script>
<script>
    $(document).ready(function() {
        $("#locker-collapse").addClass('show');
        $("#inouttran").addClass('btn-active');

    });
    let notran = document.getElementById('notran');
    <?php
    if ($fatcNum >= 0) {
    ?>
        notran.style.display = 'none';
        // useridin.style.display = 'none';

    <?php } ?>
</script>

</html>