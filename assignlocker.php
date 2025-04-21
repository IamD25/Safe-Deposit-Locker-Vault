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

// $userRecQur = "SELECT * FROM `users` WHERE `id` = '$id'";
// $userRecRes = mysqli_query($con, $userRecQur);
// $userData = mysqli_fetch_assoc($userRecRes);

$id = $_GET['id'];

$dataRequest = "SELECT * FROM `requests` WHERE `request_id` = '$id'";
$resRequest = mysqli_query($con, $dataRequest);
$resRow = mysqli_fetch_assoc($resRequest);

$locker_size = $resRow['locker_size'];


if ((isset($_POST['assign']))) {
    $accountno = $_POST['accountno'];
    $lockerno = $_POST['lockerno'];
    $keyno = $_POST['keyno'];
    $startdate = $_POST['startdate'];
    $renewdate = $_POST['renewdate'];
    $deposite = $_POST['deposite'];
    $rent = $_POST['rent'];
    $enrtyfee = $_POST['enrtyfee'];

    // $uid = $_POST['uid']; //Auto increment
    $username = $resRow['username'];
    $name = $resRow['fullname'];
    $email = $resRow['email'];
    $password = $resRow['password'];
    $contact = $resRow['contact'];
    $gender = $resRow['gender'];
    $dob = $resRow['dob'];
    $address = $resRow['address'];
    $city = $resRow['city'];
    $state = $resRow['state'];
    $pincode = $resRow['pincode'];
    $role = $resRow['role'];
    $status = "Active";

    $insUserData = "INSERT INTO `users`(`username`, `fullname`, `email`, `password`, `contact`, `gender`, `dob`, `address`, `city`, `state`, `pincode`, `role`, `status`,`request_id`) VALUES ('$username','$name','$email','$password','$contact','$gender','$dob','$address','$city','$state','$pincode','$role','$status','$id')";
    $insUserRes = mysqli_query($con, $insUserData);

    if ($insUserRes) {
        echo "<script>alert('Data Inserted')</script>";

        $fetchReq = "SELECT * FROM `users` WHERE `request_id` = '$id'";
        $fetchRes = mysqli_query($con, $fetchReq);
        $resRowData = mysqli_fetch_assoc($fetchRes);
        $fuser_id = $resRowData['user_id'];

        $insAssQur = "INSERT INTO `assign_lockers`(`account_no`, `locker`, `key_no`, `start_date`, `renew_date`, `deposite`, `rent`, `entry_fee`, `user_id`) VALUES ('$accountno','$lockerno','$keyno','$startdate','$renewdate','$deposite','$rent','$enrtyfee','$fuser_id')";
        $insAssRes = mysqli_query($con, $insAssQur);

        if ($insAssRes) {
            $status = "Aproved";
            $updReq = "UPDATE `requests` SET `status`='$status' WHERE `request_id`=$id";
            $updRes = mysqli_query($con, $updReq);
            echo $locker_size;

            if ($locker_size == "Small") {
                $getReq = "SELECT * FROM `locker_details` WHERE `locker_size`='Small'";
                $getRes = mysqli_query($con, $getReq);
                $resRowData = mysqli_fetch_assoc($getRes);

                $avilable_lockers = $resRowData['avilable_lockers'];
                $assign_locker = $resRowData['assign_lockers'];
                $total_lockers = $resRowData['total_lockers'];
                $avilable_lockers -= 1;
                $assign_locker += 1;
                $total_lockers -= 1;

                $updReq = "UPDATE `locker_details` SET `avilable_lockers`='$avilable_lockers',`assign_lockers`='$assign_locker',`total_lockers`='$total_lockers' WHERE `locker_size` = 'Small' ";
                $updRes = mysqli_query($con, $updReq);
            } else {
                echo "Locker Size is not Small";
            }
            if ($locker_size == "Medium") {
                $getReq = "SELECT * FROM `locker_details` WHERE `locker_size`='Medium'";
                $getRes = mysqli_query($con, $getReq);
                $resRowData = mysqli_fetch_assoc($getRes);

                $avilable_lockers = $resRowData['avilable_lockers'];
                $assign_locker = $resRowData['assign_lockers'];
                $total_lockers = $resRowData['total_lockers'];
                $avilable_lockers -= 1;
                $assign_locker += 1;
                $total_lockers -= 1;

                $updReq = "UPDATE `locker_details` SET `avilable_lockers`='$avilable_lockers',`assign_lockers`='$assign_locker',`total_lockers`='$total_lockers' WHERE `locker_size` = 'Medium' ";
                $updRes = mysqli_query($con, $updReq);

            } else {
                echo "Locker Size is not Medium";
            }
            if ($locker_size == "Large") {
                $getReq = "SELECT * FROM `locker_details` WHERE `locker_size`='Large'";
                $getRes = mysqli_query($con, $getReq);
                $resRowData = mysqli_fetch_assoc($getRes);

                $avilable_lockers = $resRowData['avilable_lockers'];
                $assign_locker = $resRowData['assign_lockers'];
                $total_lockers = $resRowData['total_lockers'];
                $avilable_lockers -= 1;
                $assign_locker += 1;
                $total_lockers -= 1;

                $updReq = "UPDATE `locker_details` SET `avilable_lockers`='$avilable_lockers',`assign_lockers`='$assign_locker',`total_lockers`='$total_lockers' WHERE `locker_size` = 'Large' ";
                $updRes = mysqli_query($con, $updReq);
            } else {
                echo "Locker Size is not Large";
            }
            echo "<script>alert('Locker Assigned Successfully');</script>";
            echo "<script>location.replace('requestPending.php')</script>";
        } else {
            echo "<script>alert('Error Occured');</script>";
        }
    } else {
        echo "<script>alert('Data Not Inserted')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Locker to User</title>
    <link rel="stylesheet" href="partials/bootstrap5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/assignlocker.css">
</head>
<header>
    <?php
    require "partials/_nheader.php";
    ?>
</header>

<body>
    <div class="container assign mt-2">
        <h5 class="m-1">Customer Basic Details</h5>
        <div class="userdata">
            <div class="row">
                <label for="fullname" class="col-sm-1">Customer Name</label>
                <div class="col-sm-3">
                    <input type="text" id="fullname" name="fullname" value=" <?php echo $resRow['fullname']; ?>" disabled>
                </div>
                <label for="username" class="col-sm-1">Username</label>
                <div class="col-sm-3">
                    <input type="text" id="username" name="username" value=" <?php echo $resRow['username']; ?>" disabled>
                </div>
                <label for="email" class="col-sm-1">Email Address</label>
                <div class="col-sm-3">
                    <input type="email" id="email" name="email" value=" <?php echo $resRow['email']; ?>" disabled>
                </div>
                <label for="locker_size" class="col-sm-1">Locker Size</label>
                <div class="col-sm-3">
                    <input type="text" id="locker_size" name="locker_size" value=" <?php echo $resRow['locker_size']; ?>" disabled>
                </div>
                <label for="locker_type" class="col-sm-1">Locker Type</label>
                <div class="col-sm-3">
                    <input type="text" id="locker_type" name="locker_type" value=" <?php echo $resRow['locker_type']; ?>" disabled>
                </div>
                <label for="locker_sizex" class="col-sm-1">Locker Dimensions</label>
                <div class="col-sm-3">
                    <input type="email" id="locker_sizex" name="locker_sizex" value=" <?php echo $resRow['locker_sizex']; ?>" disabled>
                </div>
            </div>
        </div>
        <form id="assign" action="" method="POST">
            <div class="row m-2">
                <label for="accountno" class="col-sm-2 form-label">Account No</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="accountno" name="accountno" required>
                </div>
                <label for="uid" class="col-sm-2 form-label">User ID</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="uid" name="uid" disabled>
                </div>
            </div>
            <div class="row m-2">
                <label for="lockerno" class="col-sm-2 form-label">Locker No</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="lockerno" name="lockerno" required>
                </div>
                <label for="keyno" class="col-sm-2 form-label">Key No</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="keyno" name="keyno">
                </div>
            </div>
            <div class="row m-2">
                <label for="startdate" class="col-sm-2 form-label">Start Date</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="startdate" name="startdate" required>
                </div>
                <label for="renewdate" class="col-sm-2 form-label">Renew Date</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="renewdate" name="renewdate" required>
                </div>
            </div>
            <div class="row m-2">
                <label for="deposite" class="col-sm-1 form-label">Deposite</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="deposite" name="deposite" required>
                </div>
                <label for="rent" class="col-sm-1 form-label rent">Rent</label>
                <div class="col-sm-2 ">
                    <input type="number" class="form-control" id="rent" name="rent" required>
                </div>
                <label for="enrtyfee" class="col-sm-1 form-label entry">Entry Fee</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="enrtyfee" name="enrtyfee" required>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="assign">Assign</button>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/.js"></script>

</html>