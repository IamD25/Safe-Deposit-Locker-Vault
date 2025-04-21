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
$time = time();
$td = (date("Y-m-d", $time));
$currentDate = date('Y-m-d');
$lastDateOfMonth = date('Y-m-t');
if (isset($_POST['submit'])) {
    $useridin = $_POST['userid'];
    $accountnno = $_POST['accountno'];
    $amount = $_POST['amount'];
    $paymentdate = $_POST['paymentdate'];
    $duedate = $_POST['duedate'];
    $paymentstatus = $_POST['paymentstatus'];
    $paymentmethod = $_POST['paymentmethod'];
    if ($paymentstatus != "Select") {
        if ($paymentmethod != "Payment Method") {
            $insertDataQur = "INSERT INTO `payments`(`user_id`, `account_no`, `amount`, `payment_date`, `due_date`, `payment_status`, `payment_method`) VALUES ('$useridin','$accountnno','$amount','$paymentdate','$duedate','$paymentstatus','$paymentmethod')";
            $insertDataRes = mysqli_query($con, $insertDataQur);
            if ($insertDataRes) {
                echo "<script>alert('Transaction Successfull')</script>";
                echo "<script>location.replace('paymentToday.php')</script>";
            } else {
                echo "<script>alert('Transaction Failed')</script>";
                echo "Transaction Failed" . mysqli_connect_error();
            }
        } else {
        echo "<script>alert('Please Select Payment Method')</script>";
        
        }
    } else {
        echo "<script>alert('Please Select Payment Status')</script>";
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
            <div class="col-md-10  ml-sm-auto content">
                <h3 class="py-2">Locker Pay Rent</h3>
                <div id="useridin" class="row my-2 m-2 ">
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
                    <div class="row userdata my-2 m-2">
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
                        <div class="row check my-2 m-2">
                            <div class="row m-2">
                                <!-- <label for="userid" class="col-sm-2 form-label">User ID</label> -->
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="userid" value="<?php echo $searchRow2['user_id']; ?>" name="userid" hidden>
                                </div>
                                <!-- <label for="accountno" class="col-sm-2 form-label">Account No.</label> -->
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="accountno" value="<?php echo $searchRow2['account_no']; ?>" name="accountno" hidden>
                                </div>
                            </div>
                            <div class="row m-2">
                                <label for="amount" class="col-sm-2 form-label">Amount</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $searchRow2['rent']; ?>" disabled>
                                </div>
                            </div>
                            <div class="row m-2">
                                <label for="paymentdate" class="col-sm-2 form-label">Payment Date</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="paymentdate" name="paymentdate" value="<?php echo $currentDate; ?>" required>
                                </div>
                                <label for="duedate" class="col-sm-2 form-label">Due Date</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="duedate" name="duedate" value="<?php echo $lastDateOfMonth; ?>" required>
                                </div>
                            </div>
                            <div class="row m-2">
                                <label for="paymentstatus" class="col-md-2">Payment Status</label>
                                <div class="col-md-4">
                                    <select class="form-select" aria-label="Default select example" id="paymentstatus" name="paymentstatus" required>
                                        <option selected>Select</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Due">Due</option>
                                    </select>
                                    <small class="paymentstatus">Please Select Payment status</small>
                                </div>
                                <label for="paymentstatus" id="paymentstatus" class="col-md-2">Payment Method</label>
                                <div class="col-md-4">
                                    <select class="form-select" aria-label="Default select example" id="paymentmethod" name="paymentmethod" required>
                                        <option selected>Payment Method</option>
                                        <option value="Cash">Cash</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Card">Card</option>
                                    </select>
                                    <small class="paymentmethod" id="paymentmethod">Please Select Payment Method</small>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
<!-- <script src="partials/bootstrap5/js/bootstrap.min.js"></script> -->
<script src="partials/bootstrap5/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/sidebars.js"></script>


<script>
    $(document).ready(function() {
        $("#payment-collapse").addClass('show');
        $("#paymentAdd").addClass('btn-active');

    });
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
    if ($fatcNum == 1) {
    ?>
        userData.style.display = 'block';
        // useridin.style.display = 'none';

    <?php } ?>
    // userData.style.display = 'block';

    let notran = document.getElementById('notran');
</script>

</html>