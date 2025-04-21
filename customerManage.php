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

$dataFatchQur = "SELECT * FROM `users`";
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
            <div id="customer" class="col-md-10 ml-sm-auto px-4 content ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manage Customer's</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search lockers..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button" onclick="searchLockers()">Search</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th name="locker_size">User ID</th>
                                <th name="locker_price">Username</th>
                                <th name="avilable_lockers">Name</th>
                                <th name="assign_lockerss">Email</th>
                                <th name="maintanance_lockers">Contact</th>
                                <th name="total_lockers">Locker Status</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody id="lockerTableBody">
                            <?php while ($datarow = mysqli_fetch_assoc($dataFatchRes)) {; ?>
                                <tr>
                                    <td> <?php echo $datarow['user_id']; ?> </td>
                                    <td> <?php echo $datarow['username'] ?> </td>
                                    <td> <?php echo $datarow['fullname'] ?> </td>
                                    <td> <?php echo $datarow['email'] ?> </td>
                                    <td> <?php echo $datarow['contact'] ?> </td>
                                    <td> <?php echo $datarow['status'] ?> </td>
                                    <td><a class="btn btn-sm btn-danger" id="update" href="customerUpdateDetails.php?id=<?= $datarow['user_id']; ?>">Update</a></td>
                                    <!-- <td><a class="btn btn-sm btn-warning" id="btndelete" href="deletelocker.php?id=<?= $datarow['user_id']; ?>" onclick="confunc();">Delete</a></td> -->
                                    <!-- Button trigger modal -->
                                    <td><button type="button" class="btn btn-sm btn-warning" btn-sm data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Delete
                                    </button></td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div> -->
                                                <div class="modal-body">
                                                    Are you sure you want to delete this customer?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                     <!-- <button> -->
                                    <a class="btn btn-sm btn-warning" id="btndelete" href="customerDelete.php?id=<?= $datarow['user_id']; ?>" onclick="confunc();">Delete</a>
                                                     <!-- </button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        $("#customers-collapse").addClass('show');
        // });
        $("#customerman").addClass('btn-active');
    });
</script>

</html>