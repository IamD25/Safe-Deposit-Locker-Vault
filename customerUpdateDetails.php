<?php
$getid = $_GET['id'];
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

$getData = "SELECT * FROM `users` WHERE `user_id`='$getid'";
$result = mysqli_query($con, $getData);
$fetchData = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $name = $_POST['fullName'];
    $email = $_POST['emailAddress'];
    $username = strtok($name, " ");

    $contact = $_POST['contactNumber'];
    $dob = $_POST['dob'];

    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $updQur = "UPDATE `users` SET `username`='$username',`fullname`='$name',`contact`='$contact',`dob`='$dob',`address`='$address',`city`='$city',`state`='$state',`pincode`='$pincode' WHERE `user_id` = '$getid'";

            $updRes = mysqli_query($con, $updQur);

            if ($updRes) {
                echo '<script>alert("User Data updated successfull.");</script>';
                echo "<script>location.replace('customerManage.php')</script>";
                // header("location: ../login.php");
            } else {
                echo "Update details are invalid.." . mysqli_connect_error();
                die();
            }
    } else {
        echo "<script> alert('Invalid Email');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Details</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="partials/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminDashboard.css">
    <link rel="stylesheet" href="css/customerAdd.css">


</head>
<header>
    <?php
    require "partials/_header.php";
    ?>
</header>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0">
                <?php
                require "partials/sidebar.php";
                ?>
            </div>
            <div id="customer" class="container addForm p-3">
                <h1 class="text-center border-bottom py-1">Update User's Details</h1>
                <form id="customerAdd" action="" method="POST">
                    <div class=" row mb-3">
                        <div class="col">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Name Surname" value="<?php echo $fetchData['fullname']; ?>" required>
                        </div>
                        <div class="col">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="emailAddress" name="emailAddress" placeholder="Enter Email Address" value="<?php echo $fetchData['email']; ?>" disabled>
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="number" maxlength="10" class="form-control" id="contactNumber" name="contactNumber" minlength="2" value="<?php echo $fetchData['contact']; ?>" required>
                        </div>
                        <div class="col">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $fetchData['dob']; ?>" required>
                        </div>
                    </div>
                    <div class="row  mb-3">

                        <div class="col">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $fetchData['address']; ?>" required>
                        </div>
                        <div class="col">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $fetchData['city']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="<?php echo $fetchData['state']; ?>" required>
                        </div>
                        <div class="col">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $fetchData['pincode']; ?>" required>
                        </div>
                    </div>
                    <div class="align-item-center px-4">
                        <button type="submit" class="btn btn-dark" name="submit">Update</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>
<script src="partials/bootstrap5/js/bootstrap.min.js"></script>
<script src="partials/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/sidebars.js"></script>
<script src="js/adminDashboard.js"></script>
<script src="js/customerAdd.js"></script>
<script>
    $(document).ready(function() {
        $("#customers-collapse").addClass('show');

        $("#emailAddress").on('focusout', function emailAddress() {
            var email = $("#emailAddress").val();
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.(example@gmail.com)");
                $("#emailAddress").addClass('redclass');
            } else {
                $("#emailAddress").removeClass('redclass');

            }
        });

        $("#contactNumber").on('focusout', function contactNumber() {
            var contactNumber = $("#contactNumber").val();
            if (!/^\d{10}$/.test(contactNumber)) {
                alert("Please enter a valid 10-digit contact number");
                $("#contactNumber").addClass('redclass');
            } else {
                $("#contactNumber").removeClass('redclass');

            }
        });

        $('#gender').on('focusout', function gender() {
            var gender = document.getElementById("gender").value;
            if (gender == "") {
                alert("Please select a gender");
                $("#gender").addClass('redclass');
            } else {
                $("#gender").removeClass('redclass');

            }
        });

        $('#dob').on('focusout', function dob() {
            var dob = document.getElementById("dob").value;
            if (dob == "") {
                alert("Please select a date of birth");
                $("#dob").addClass('redclass');
            } else {
                $("#dob").removeClass('redclass');

            }
        });
    });
</script>

</html>