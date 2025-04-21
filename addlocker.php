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
include "partials/connection.php";

if (isset($_POST['addlocker'])) {
    $lockerSize = $_POST['lockerSize'];
    $lockerPrice = $_POST['lockerPrice'];

    if (preg_match('/^[a-zA-Z]+$/', $lockerSize)) {
        if (preg_match('/^[0-9]+$/', $lockerPrice)) {
            $insQur = "INSERT INTO `locker_details`(`locker_size`, `locker_price`) VALUES ('$lockerSize','$lockerPrice')";
            $resQur = mysqli_query($con, $insQur);

            if ($resQur) {
                echo "<script> alert('Locker Added Successfully'); </script>";
                echo "<script>location.replace('lockerdetails.php') </script>";
            } else {
                echo "Server Error :" . mysqli_connect_error();
            }
        } else {
            echo "<script> alert('Please Enter only Digits'); </script>";
        }
    } else {
        echo "<script> alert('Please Enter only Characters'); </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="partials/bootstrap5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminDashboard.css">


    <style>
        .login-container {
            margin-top: 50px;
            width: 450px;
            height: 400px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<header>
    <?php require "partials/_header.php" ?>
</header>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0">
                <?php
                require "partials/sidebar.php";
                ?>
            </div>
            <div class="container login-container">
                <div class="row">
                    <div class="col">
                        <h3 class="text-center">Add New Locker</h3>
                        <form action="addlocker.php" method="POST">
                            <div>
                                <label for="lockerSize" class="form-label">Locker Size</label>
                                <input type="text" class="form-control" id="lockerSize" name="lockerSize" required>
                            </div>
                            <div>
                                <label for="lockerPrice" class="form-label">Locker Price</label>
                                <input type="text" class="form-control" id="lockerPrice" name="lockerPrice" required>
                            </div>
                            <button type="submit" class="btn btn-dark w-100 mt-3" name="addlocker">Add Locker</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<!-- <script src="partials/bootstrap5/js/bootstrap.min.js"></script> -->
<script src="partials/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/sidebars.js"></script>
<script>
    $(document).ready(function() {
        // $('#sidebar').on('click', function(){
        $("#lockers-collapse").addClass('show');
        // });
        $("#addlocker").addClass('btn-active');

        $("#lockerSize").on("focusout", function(){
            var size = $("#lockerSize").val();
            var character = /^[a-zA-Z]+$/;

            if (!character.test(size)) {
                alert("Please Enter only Characters.");
                $("#lockerSize").addClass('redclass');
                } else {
                    $("#lockerSize").removeClass('redclass');
                }
        })
        $("#lockerPrice").on("focusout", function(){
            var price = $("#lockerPrice").val();
            var digits = /^[0-9]+$/;

            if (!digits.test(price)) {
                alert("Please Enter only Digits.");
                $("#lockerPrice").addClass('redclass');
                } else {
                    $("#lockerPrice").removeClass('redclass');
                }
        })
    });
</script>

</html>