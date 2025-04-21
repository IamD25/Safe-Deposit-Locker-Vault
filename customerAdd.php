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

if (isset($_POST['submit'])) {
    $name = $_POST['fullName'];
    $email = $_POST['emailAddress'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $hashPass = password_hash($password, PASSWORD_DEFAULT);

    $username = strtok($name, " ");

    $contact = $_POST['contactNumber'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    $locker_size = $_POST['lockersize'];
    $locker_type = $_POST['lockertype'];
    $locker_sizex = $_POST['sizex'];

    $role = "user";
    $status = "Pending";

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $checkEmail = "SELECT * FROM `requests` WHERE `email` = '$email'";
        $checkEmailRes = mysqli_query($con, $checkEmail);
        $checkEmailCount = mysqli_num_rows($checkEmailRes);

        if ($checkEmailCount == 0) {
            if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
                if ($password == $confirm_password) {
                    $insQur = "INSERT INTO `requests`(`username`, `fullname`, `email`, `password`, `contact`, `gender`, `dob`, `address`, `city`, `state`, `pincode`,`role`, `locker_size`, `locker_type`, `locker_sizex`,`status`) VALUES ('$username','$name', '$email', '$hashPass', '$contact', '$gender', '$dob', '$address', '$city', '$state', '$pincode', '$role','$locker_size','$locker_type','$locker_sizex','$status')";

                    $insRes = mysqli_query($con, $insQur);

                    if ($insRes) {
                        echo '<script>alert("Registration successfull.");</script>';
                        echo "<script>location.replace('login.php')</script>";
                        // header("location: ../login.php");
                    } else {
                        echo "Registration Failed" . mysqli_connect_error();
                        die();
                    }
                } else {
                    echo "<script>alert('Password and Confirm Password do not match..');</script>";
                }
            } else {
                echo "<script> alert('Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.');</script>";
            }
        } else {
            echo "<script> alert('Email already exist');</script>";
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
    <title>Add Customer</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="partials/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
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
                <h1 class="text-center border-bottom py-1">Add New Customer</h1>
                <form id="customerAdd" action="" method="POST">
                    <div class=" row mb-3">
                        <div class="col">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Name Surname" required>
                        </div>
                        <div class="col">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="emailAddress" name="emailAddress" placeholder="Enter Email Address" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input  maxlength="10" class="form-control" id="contactNumber" name="contactNumber" minlength="2" required>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>
                    </div>
                    <div class="row  mb-3">

                        <div class="col">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="col">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                        <div class="col">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Select Locker Size</label>
                        <select class="form-select form-select mb-3" id="lockersize" name="lockersize" aria-label="Default select example" required>
                            <option selected>Select Locker Size</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Select Loker Type</label>
                            <select class="form-select form-select mb-3" id="lockertype" name="lockertype" aria-label="Default select example" required>
                                <option selected>Select Locker Type</option>

                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Locker Dimensions</label>
                            <input type="text" id="sizex" class="form-control" name="sizex" placeholder="Locker Size">
                        </div>
                    </div>

                    <div class="align-item-center px-4">
                        <button type="submit" class="btn btn-dark" name="submit">Submit</button>
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
        $("#customeradd").addClass('btn-active');

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

        $("#password").on('focusout', function password() {
            var password = $("#password").val();

            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!passwordPattern.test(password)) {
                alert("Password must be at least 8 characters long, contain an uppercase letter, a lowercase letter, a digit, and a special character.");
                $("#password").addClass('redclass');

            } else {
                $("#password").removeClass('redclass');

            }
        });

        $("#confirmPassword").on('focusout', function confirmPassword() {
            var password = $("#password").val();
            var confirmPassword = $("#confirmPassword").val();

            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!passwordPattern.test(confirmPassword)) {
                alert("Confirm Password must be at least 8 characters long, contain an uppercase letter, a lowercase letter, a digit, and a special character.");
                $("#confirmPassword").addClass('redclass');
            } else {
                $("#confirmPassword").removeClass('redclass');

            }

            if (password !== confirmPassword) {
                alert("Passwords do not match");
                $("#confirmPassword").addClass('redclass');

            } else {
                $("#confirmPassword").removeClass('redclass');

            }
        });
        $("#contactNumber").on('input', function() {
            var contactNumber = $(this).val();
            contactNumber = contactNumber.replace(/\D/g, '').substring(0, 10);
            $(this).val(contactNumber);

            if (contactNumber.length !== 10) {
                $("#contactNumber").addClass('redclass'); 
            } else {
                $("#contactNumber").removeClass('redclass');
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

        // $('#customerAdd').on('submit', function() {
        //     emailAddress();
        //     password();
        //     confirmPassword();
        //     contactNumber();
        //     gender();
        //     dob();
        // })

    });
</script>

</html>