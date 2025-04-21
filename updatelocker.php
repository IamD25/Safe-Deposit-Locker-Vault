<?php
include_once "partials/connection.php";

$id = $_GET["id"];
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['role'] == "admin") {
        $username = $_SESSION['username'];
    } else {
        // header('location: logout.php');
    }
} else {
    // header('location: logout.php');
    // header("location: login.php");
}


$insQur = "SELECT * FROM `locker_details` WHERE `locker_id` = $id";
$resQur = mysqli_query($con, $insQur);
$locker = mysqli_fetch_assoc($resQur);
if ($resQur) {
    // echo "<script> alert('Data fatched'); </script>";
    // echo "<script>location.replace('adminDashboard.php') </script>";
} else {
    echo "Server Error :" . mysqli_connect_error();
}

if (isset($_POST['update'])) {
    $locker_id = $_POST['lockerId'];
    $lockerSize = $_POST['lockerSize'];
    $lockerPrice = $_POST['lockerPrice'];
    $avilableLockers = $_POST['avilableLockers'];
    $assignlockers = $_POST['assignLockers'];
    $maintananceLockers = $_POST['maintananceLockers'];
    $totalLockers =  $avilableLockers + $assignlockers + $maintananceLockers;
    // $totalLockers = $_POST['totalLockers'];

    if (preg_match('/^[a-zA-Z]+$/', $lockerSize)) {
        if (preg_match('/^[0-9]+$/', $lockerPrice)) {
            if (preg_match('/^[0-9]+$/', $avilableLockers)) {
                if (preg_match('/^[0-9]+$/', $assignlockers)) {
                    if (preg_match('/^[0-9]+$/', $maintananceLockers)) {
                        $updQur = "UPDATE `locker_details` SET 
    `locker_size`='$lockerSize',
    `locker_price`='$lockerPrice',
    `avilable_lockers`='$avilableLockers',
    `assign_lockers`='$assignlockers',
    `maintanance_lockers`='$maintananceLockers',
    `total_lockers`='$totalLockers'
    WHERE `locker_id` = '$id'";

                        $updRes = mysqli_query($con, $updQur);

                        if ($updRes == TRUE) {
                            echo "<script> alert('Data Updated Successfully'); </script>";
                            echo "<script>location.replace('lockerdetails.php') </script>";
                        } else {
                            echo "Server Error :";
                        }
                        if ($resQur) {
                            echo "<script> alert('Locker Added Successfully'); </script>";
                            echo "<script>location.replace('lockerdetails.php') </script>";
                        } else {
                            echo "Server Error :" . mysqli_connect_error();
                        }
                    } else {
                        echo "<script> alert('Please Enter only Digits in Maintanance Locker Field'); </script>";
                    }
                } else {
                    echo "<script> alert('Please Enter only Digits in Assign Locker Field'); </script>";
                }
            } else {
                echo "<script> alert('Please Enter only Digits in Avilable Locker Field'); </script>";
            }
        } else {
            echo "<script> alert('Please Enter only Digits in Locker Price Field'); </script>";
        }
    } else {
        echo "<script> alert('Please Enter only Characters in Locker size Field'); </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="partials/bootstrap5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/adminDashboard.css">
    <style>
        .login-container {
            margin-top: 50px;
            width: 450px;
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
    <div class="container login-container">
        <div class="row">
            <div class="col">
                <h3 class="text-center">Update Locker Details</h3>
                <form action="" method="POSt">
                    <div>
                        <label for="lockerid" class="form-label">Locker ID</label>
                        <input type="text" class="form-control" id="lockerid" name="lockerId" value="<?php echo $locker['locker_id'] ?>" disabled>
                    </div>
                    <div>
                        <label for="lockerSize" class="form-label">Locker Size</label>
                        <input type="text" class="form-control" id="lockerSize" name="lockerSize" value="<?php echo $locker['locker_size'] ?>" required>
                    </div>
                    <div>
                        <label for="lockerPrice" class="form-label">Locker Price</label>
                        <input type="text" class="form-control" id="lockerPrice" name="lockerPrice" value="<?php echo $locker['locker_price'] ?>" required>
                    </div>

                    <div>
                        <label for="avilableLockers" class="form-label">Avilable Lockers</label>
                        <input type="text" class="form-control" id="avilableLockers" name="avilableLockers" value="<?php echo $locker['avilable_lockers'] ?>" required>
                    </div>
                    <div>
                        <label for="assignLockers" class="form-label">Assign Lockers</label>
                        <input type="text" class="form-control" id="assignLockers" name="assignLockers" value="<?php echo $locker['assign_lockers'] ?>" required>
                    </div>
                    <div>
                        <label for="maintananceLockers" class="form-label">Maintanance Lockers</label>
                        <input type="text" class="form-control" id="maintananceLockers" name="maintananceLockers" value="<?php echo $locker['maintanance_lockers'] ?>" required>
                    </div>
                    <div>
                        <label for="totalLockers" class="form-label">Total Lockers</label>
                        <input type="text" class="form-control" id="totalLockers" name="totalLockers" value="<?php echo $locker['total_lockers'] ?>" disabled>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mt-3" name="update">update Locker</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="partials/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/sidebars.js"></script>
<script>
    $(document).ready(function() {
        // $('#sidebar').on('click', function(){
        $("#lockers-collapse").addClass('show');
        // });
        $("#addlocker").addClass('btn-active');

        $("#lockerSize").on("focusout", function() {
            var size = $("#lockerSize").val();
            var character = /^[a-zA-Z]+$/;

            if (!character.test(size)) {
                alert("Please Enter only Characters.");
                $("#lockerSize").addClass('redclass');
            } else {
                $("#lockerSize").removeClass('redclass');
            }
        })
        $("#lockerPrice").on("focusout", function() {
            var price = $("#lockerPrice").val();
            var digits = /^[0-9]+$/;

            if (!digits.test(price)) {
                alert("Please Enter only Digits.");
                $("#lockerPrice").addClass('redclass');
            } else {
                $("#lockerPrice").removeClass('redclass');
            }
        })
        $("#avilableLockers").on("focusout", function() {
            var price = $("#avilableLockers").val();
            var digits = /^[0-9]+$/;

            if (!digits.test(price)) {
                alert("Please Enter only Digits.");
                $("#avilableLockers").addClass('redclass');
            } else {
                $("#avilableLockers").removeClass('redclass');
            }
        })
        $("#assignLockers").on("focusout", function() {
            var price = $("#assignLockers").val();
            var digits = /^[0-9]+$/;

            if (!digits.test(price)) {
                alert("Please Enter only Digits.");
                $("#assignLockers").addClass('redclass');
            } else {
                $("#assignLockers").removeClass('redclass');
            }
        })
        $("#maintananceLockers").on("focusout", function() {
            var price = $("#maintananceLockers").val();
            var digits = /^[0-9]+$/;

            if (!digits.test(price)) {
                alert("Please Enter only Digits.");
                $("#maintananceLockers").addClass('redclass');
            } else {
                $("#maintananceLockers").removeClass('redclass');
            }
        })
    });
</script>

</html>