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

$dataFatchQur = "SELECT * FROM `locker_details`";
$dataFatchRes = mysqli_query($con, $dataFatchQur);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="partials/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <link href="css/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminDashboard.css">


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
            <div id="lockers" class="col-md-10 ml-sm-auto px-4 content ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">About Rentals Lockers</h1>
                    
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th name="locker_size">Locker Size</th>
                                <th name="locker_price">Locker Price</th>
                                <th name="avilable_lockers">Avilable Lokers</th>
                                <th name="assign_lockerss">Assign Lockers</th>
                                <th name="maintanance_lockers">Maintanance Lockers</th>
                                <th name="total_lockers">Total Lockers</th>
                                <th colspan="2" class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody id="lockerTableBody">
                            <?php while ($datarow = mysqli_fetch_assoc($dataFatchRes)) {; ?>
                                <tr>
                                    <td> <?php echo $datarow['locker_size']; ?> </td>
                                    <td> <?php echo $datarow['locker_price'] ?> </td>
                                    <td> <?php echo $datarow['avilable_lockers'] ?> </td>
                                    <td> <?php echo $datarow['assign_lockers'] ?> </td>
                                    <td> <?php echo $datarow['maintanance_lockers'] ?> </td>
                                    <td> <?php echo $datarow['total_lockers'] ?> </td>
                                    <td><a class="btn btn-sm btn-danger" id="update" href="updatelocker.php?id=<?= $datarow['locker_id'];?>">Update</a></td>
                                    <td><a class="btn btn-sm btn-warning" id="btndelete" href="deletelocker.php?id=<?= $datarow['locker_id']; ?>" onclick="confunc();">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
<script src="partials/bootstrap5/js/bootstrap.min.js"></script>
<script src="partials/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/sidebars.js"></script>
<script src="js/adminDashboard.js"></script>
<script>
    $(document).ready(function() {
        // $('#sidebar').on('click', function(){
        $("#lockers-collapse").addClass('show');
        // });
        $("#lockerdetails").addClass('btn-active');
    });
</script>

</html>