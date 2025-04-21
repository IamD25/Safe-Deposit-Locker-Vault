<?php

include "partials/connection.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['emailAddress'];
    $contact = $_POST['contactNumber'];
    $dob = $_POST['dob'];

    $fetchReq = "SELECT * FROM user WHERE `email`= '$email'";
    $fetchRes = mysqli_query($con, $fetchReQ);
    $fatcNum = mysqli_num_rows($fetchRes);
    print_r($fatcRes);
    // }
    // if(isset($_POST['submit'])){
    // $email = $_POST['emailAddress'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $hashPass = password_hash($password, PASSWORD_DEFAULT);

    $updRes = "UPDATE  user SET `password`='$hashPass' WHERE `email`='$email'";

    $updRes = mysqli_query($con, $updres);
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
        <form action="" method="POST" >
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
                <div class="row mb-3">
                    <div class="mb-3">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" id="contactNumber" name="contactNumber" minlength="8" maxlength="10" required>
                    </div>
                    <div class="col">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>

                <div class="row px-2 justify-content-end">
                    <div class="col-2">
                        <button type="button" class="btn btn-dark" id="nextstep2" onclick="nextStep()">Next</button>
                    </div>
                </div>

            </div>
            <!-- </form> -->
            <!-- <form action="" method="POST"> -->
            <div id="step2" class="step">
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
                    <div class="row justify-content-between m-2">
                        <div class="col-3">
                            <button type="button" class="btn btn-secondary" id="previoususer" onclick="prevStep()">Previous</button>
                        </div>
                        <div class="col-3 px-4">
                            <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let step1 = document.querySelector("#userdata");
    let step2 = document.querySelector("#step2");
    let nextstep2 = document.querySelector("#nextstep2");
    nextstep2.addEventListener("click", function() {
        var fullName = document.getElementById("fullName").value;
        var emailId = document.getElementById("emailAddress").value;
        var contactNumber = document.getElementById("contactNumber").value;
        var dob = document.getElementById("dob").value;

        // console.log(fullName);
        if (
            fullName != "" &&
            emailAddress != "" &&
            contactNumber != "" &&
            dob != ""
        ) {
            step1.classList.remove("active");
            step2.classList.add("active");
        } else {
            alert("Please fill all fields");
        }
    });
    let previous1 = document.querySelector("#previoususer");
    previous1.addEventListener("click", function() {
        step1.classList.add("active");
        step2.classList.remove("active");
    });

    // function submit() {
    //     var password = document.getElementById("password").value;
    //     var confirmPassword = document.getElementById("confirmPassword").value;
    //     if (password == confirmPassword) {
    //         alert("Password and Confirm Password are same");
    //     } else {
    //         alert("Passwords do not match");
    //     }
    // }
</script>

</html>