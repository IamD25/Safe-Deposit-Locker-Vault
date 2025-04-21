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

$dataRequest = "SELECT * FROM `requests` Where `status` = 'Pending'";
$resRequest = mysqli_query($con, $dataRequest);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Requests</title>

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
    <!-- <div class="b-example-divider"></div> -->
            </div>
            <div id="requests" class="col-md-10 ml-sm-auto px-4 content ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Pending User Requests</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <!-- <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search lockers..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button" onclick="searchLockers()">Search</button>
                        </div> -->
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th name="id">Request ID</th>
                                <th name="name">Name</th>
                                <th name="email">Email</th>
                                <th name="contact">Contact</th>
                                <th name="locker_size">Locker Size</th>
                                <th name="locker_type">Locker Type</th>
                                <th name="locker_sizex">Locker Size(00x00x00)</th>
                                <th colspan="2" class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody id="lockerTableBody">
                            <?php while ($resRow = mysqli_fetch_assoc($resRequest)) { ?>
                                <tr>
                                    <td> <?php echo $resRow['request_id']; ?> </td>
                                    <td> <?php echo $resRow['fullname']; ?> </td>
                                    <td> <?php echo $resRow['email']; ?> </td>
                                    <td> <?php echo $resRow['contact']; ?> </td>
                                    <td> <?php echo $resRow['locker_size']; ?> </td>
                                    <td> <?php echo $resRow['locker_type']; ?> </td>
                                    <td> <?php echo $resRow['locker_sizex']; ?> </td>
                                    <td><a class="btn btn-sm btn-danger" id="update" href="assignlocker.php?id=<?= $resRow['request_id']; ?>">Accept</a></td>
                                    <td><a class="btn btn-sm btn-warning" id="btndelete" href="requestRejectQ.php?id=<?= $resRow['request_id']; ?>">Reject</a></td>
                                </tr>
                        </tbody> <?php } ?>
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
    $(document).ready(function(){
        // $('#sidebar').on('click', function(){
            $("#request-collapse").addClass('show');
        // });
        $("#reqpen").addClass('btn-active');
    });

</script>

</html>