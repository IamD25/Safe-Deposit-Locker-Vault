<?php
include "partials/connection.php";
$showAlert = false;
$showErrorUser = false;
$showErrorPass = false;

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['role'] == "admin") {
        header("location: adminDashboard.php");
    }
    if ($_SESSION['role'] == "user") {
        header("location: userDashboard.php");
    }
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['account_type'];

    $fatcQur = "SELECT * FROM `users` WHERE email='$email' && role='$role'";
    $fatcRes = mysqli_query($con, $fatcQur);
    $fatcNum = mysqli_num_rows($fatcRes);


    if ($fatcNum == 1) {
        while ($row = mysqli_fetch_assoc($fatcRes)) {
            if (password_verify($password, $row['password'])) {
                $showAlert = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $row['fullname'];
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['user_id'] = $row['user_id'];
                if ($row['role'] == "user") {
                    header("location: userDashboard.php");
                }
                if ($row['role'] == "admin") {
                    header("location: adminDashboard.php");
                }
            } else {
                $showErrorPass = true;
            }
        }
    } else {
        $showErrorUser = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>

    <link rel="stylesheet" href="partials/bootstrap5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="loginUser.css">
    <link rel="stylesheet" href="css/adminDashboard.css">
    <link rel="stylesheet" href="css/customerAdd.css">
    <style></style>
    <header>
        <?php require "partials/_nheader.php" ?>
    </header>

<body>

    <div class="error"> <?php
                        if ($showAlert) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Alert : </strong>You are successfuly login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
                        }
                        if ($showErrorUser) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alert : </strong>Please Enter valid Username.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
                        }
                        if ($showErrorPass) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alert : </strong>Please Enter Valid Password.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
                        } ?>
    </div>

    <div class="container login-container">
        <h3 class="text-center">Sign in</h3>
        <div class="text-center mb-3">Choose your account type</div>
        <form action="#" method="POST" id="login-form" class="mt-3">
            <div class="row btn-group">
                <div class="col-6">
                    <!-- <button type="button" class="btn btn1" id="admin-tab" name="admin">Admin</button> -->
                    <input type="radio" class="btn btn1" id="admin" name="account_type" value="admin" required>
                    <label for="admin">Admin</label>
                </div>
                <div class="col-6">
                    <!-- <button type="button" class="btn btn1 " id="user-tab" name="user">User</button> -->
                    <input type="radio" id="user" name="account_type" value="user" required>
                    <label class="" for="user">User</label>
                </div>
            </div>
            <div class="my-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="text-start">
                <a href="#" class="text-decoration-none">Forgot password?</a>
                <br>
                <a href="register.html" class="text-decoration-none">Don't have Account?</a>
            </div>
            <button type="submit" class="btn btn-dark w-100 mt-3" name="login">Sign in</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/login.js"></script>
    <script>
        $(document).ready(function() {

            $("#admin-tab").click(function() {
                $("#admin-tab").addClass('btn-active');
                $("#user-tab").addClass("btn-disable");

                $("#admin-tab").removeClass('btn-disable');
                $("#user-tab").removeClass("btn-active");
            });

            $('#user-tab').on('click', function() {
                $("#user-tab").addClass('btn-active');
                $("#admin-tab").addClass("btn-disable");

                $("#user-tab").removeClass('btn-disable');
                $("#admin-tab").removeClass("btn-active");
            });

            $("#email").on('focusout', function emailAddress() {
                var email = $("#email").val();
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!emailPattern.test(email)) {
                    alert("Please enter a valid email address.(example@gmail.com)");
                    $("#email").addClass('redclass');
                } else {
                    $("#email").removeClass('redclass');

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
                    console.log(!passwordPattern.test(password));
                    console.log(password);
                }
            });
        });
    </script>
</body>

</html>