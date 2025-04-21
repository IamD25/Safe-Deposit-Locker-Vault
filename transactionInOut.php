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
}
include "partials/connection.php";

if (isset($_POST['search'])) {
    $useridin = $_POST['useridin'];

    $searchQur = "SELECT * FROM `users` WHERE `user_id` = '$useridin'";
    $searchRes = mysqli_query($con, $searchQur);
    $searchRow = mysqli_fetch_assoc($searchRes);
    $fatcNum = mysqli_num_rows($searchRes);


    $searchQur2 = "SELECT * FROM `assign_lockers` WHERE `user_id` = '$useridin'";
    $searchRes2 = mysqli_query($con, $searchQur2);
    $searchRow2 = mysqli_fetch_assoc($searchRes2);
 

    if ($fatcNum == 1) {
        // echo "<script>alert('User Found')</script>";
    } else {
        echo "<script>alert('User Not Found')</script>";
    }
}
if (isset($_POST['submit'])) {
    $date = $_POST['checkdate'];
    $intime = $_POST['checkintime'];
    $outtime = $_POST['checkouttime'];
    $lockerno = $_POST['lockerno'];
    $accountno = $_POST['account_no'];
    $useridout = $_POST['user_id'];
    // echo $lockerno;
    $insertDataQur = "INSERT INTO `inouttransaction`(`date`, `locker_no`, `account_no`, `in_time`, `out_time`,`user_id`) VALUES ('$date','$lockerno','$accountno','$intime','$outtime','$useridout')";
    $insertDataRes = mysqli_query($con, $insertDataQur);
    if ($insertDataRes) {
        echo "<script>alert('Transaction Successfull')</script>";
        echo "<script>location.replace('adminDashboard.php')</script>";
    } else {
        echo "<script>alert('Transaction Failed')</script>";
        echo "Transaction Failed" . mysqli_connect_error();
    }
}

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
                <h3 class="py-2">Locker Check-In and Check-Out</h3>
                <div id="useridin" class="row my-2 ">
                    <form action="" class="searchuser" method="POST">
                        <!-- onsubmit="return false" -->
                        <h3 class="p-2">Search User</h3>
                        <div class="col-12 p-2">
                            <input class=" form-control" type="number" name="useridin" id="useridin" placeholder="User ID">
                        </div>
                        <div class="col-1 p-2">
                            <button type="submit" class="btn btn-md btn-primary" id="searchbtn" name="search">Search</button>
                        </div>
                    </form>
                </div>

                <div id="userdata">
                    <div class="row userdata my-2">
                        <h3 class="p-1">User Details</h3>
                        <div class="col-md-6 p-1"><strong>Customer Name : </strong> <?php echo $searchRow['fullname']; ?></div>
                        <div class="col-md-6 p-1"><strong>Username : </strong> <?php echo $searchRow['username']; ?></div>
                        <div class="col-md-6 p-1"><strong>Email : </strong> <?php echo $searchRow['email']; ?></div>
                        <div class="col-md-6 p-1"><strong>Locker Size : </strong> <?php echo $searchRow2['locker_size']; ?></div>
                        <div class="col-md-6 p-1"><strong>Locker Type : </strong> <?php echo $searchRow2['locker_type']; ?></div>
                        <div class="col-md-6 p-1"><strong>Locker Dimensions : </strong> <?php echo $searchRow2['locker_sizex']; ?></div>
                        <div class="col-md-6 p-1"><strong>Account No : </strong> <?php echo $searchRow2['account_no']; ?></div>
                        <div class="col-md-6 p-1"><strong>User ID : </strong> <?php echo $searchRow2['user_id']; ?></div>
                        <div class="col-md-6 p-1"><strong>Locker Number : </strong> <?php echo $searchRow2['locker']; ?></div>
                        <div class="col-md-6 p-1"><strong>Key Number : </strong> <?php echo $searchRow2['key_no']; ?></div>
                        <div class="col-md-6 p-1"><strong>Start Date : </strong> <?php echo $searchRow2['start_date']; ?></div>
                        <div class="col-md-6 p-1"><strong>Renew Date : </strong> <?php echo $searchRow2['renew_date']; ?></div>

                    </div>
                    <form id="assign" action="" method="POST">
                        <div class="row check my-2">
                            <div class="row m-2">
                                <label for="checkdate" class="col-sm-2 form-label">Date</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="checkdate" name="checkdate" required>
                                </div>
                            </div>
                            <div class="row m-2">
                                <label for="checkintime" class="col-sm-2 form-label">Check In Time</label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control" id="checkintime" name="checkintime" required>
                                </div>
                            </div>
                            <div class="row m-2">
                                <label for="checkouttime" class="col-sm-2 form-label">Check Out Time</label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control" id="checkouttime" name="checkouttime" required>
                                </div>
                            </div>
                            <input type="text" value="<?php echo $searchRow2['locker']; ?>" name="lockerno" hidden>
                            <input type="text" value="<?php echo $searchRow2['account_no']; ?>" name="account_no" hidden>
                            <input type="text" value="<?php echo $searchRow2['user_id']; ?>" name="user_id" hidden>
                            <div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

<script src="partials/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/sidebars.js"></script>


<script>
    // $(document).ready(function() {
    // $("#userdata").hide();
    // $("#searchbtn").click(function(){
    //     $("#userdata").show();
    //     $("#useridin").hide();
    // });
    // });

    let searchBtn = document.getElementById('searchbtn');
    let userData = document.getElementById('userdata');
    let useridin = document.getElementById('useridin');
    // searchBtn.addEventListener('click', function() {
    //     userData.style.display = 'block';
    //     useridin.style.display = 'none';
    // });
    <?php
    if($fatcNum == 1){
        ?>
        userData.style.display = 'block';
        // useridin.style.display = 'none';

   <?php } ?>
    // userData.style.display = 'block';
</script>

</html>