<?php

include "partials/connection.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['emailAddress'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $hashPass = password_hash($password, PASSWORD_DEFAULT);

    $updReq = "UPDATE `users` SET `password`='$hashPass' WHERE email='$email'";
    // $2y$10$Bpmq8isKQNWCehnnJDZhre/IZ6yJr1NKsTXtwGcA78qjfwAAH3wkq
    // $2y$10$t/2pzXvPwXRJhdX45sE5t.or5vUrTpkLQ64sw3cLHh9ioq0XdYf3.
    $updRes = mysqli_query($con, $updReq);
    if ($updRes) {
        echo "<script> alert('Password updated successfully'); </script>";
    } else {
        echo "<script> alert('Password update failed'); </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">

</head>

<body>
    <div class="form-container container">
        <form action="" method="POST">
            <!-- onsubmit="return false" -->
            <div id="userdata" class="step active">
                <h6 class="text-center mb-4">Forget Password</h6>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Enter Email Address" required>
                    </div>
                    <div class="col">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter UserName" required>
                    </div>

                </div>
                <div class="col">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                        required>
                </div>
                <div class="row justify-content-between m-2">
                    <div class="col-3 px-4">
                        <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                    </div>
                </div>


            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

</script>

</html>